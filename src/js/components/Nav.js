import { $, $$ } from '../lib/utils';
import { Spring } from 'wobble';

async function show() {
  const toggle = $('#page-nav__toggle');
  const nav = $('#page-nav');
  nav.classList.add('page-nav--expanded');
  toggle.setAttribute('aria-expanded', true);
  toggle.innerHTML = 'Close';
  window.addEventListener('click', handleClose);
  window.addEventListener('focusin', handleClose);
}

async function hide() {
  const toggle = $('#page-nav__toggle');
  const nav = $('#page-nav');
  nav.classList.remove('page-nav--expanded');
  toggle.setAttribute('aria-expanded', false);
  toggle.innerHTML = 'Menu';
  window.removeEventListener('click', handleClose);
  window.removeEventListener('focusin', handleClose);
}

function handleToggle(event) {
  event.stopPropagation();
  event.target.getAttribute('aria-expanded') === 'true' ? hide() : show();
}

function handleClose(event) {
  const nav = $('#page-nav');
  if (!nav.contains(event.target)) {
    event.stopPropagation();
    event.preventDefault();
    hide();
  }
}

const clamp = (num, min, max) => Math.min(Math.max(num, min), max);

/*
 * Based on mouse position and direction, guess the x position of its intended nav target
 * allow user to pass a nudge function which can be used to snap target to position
 */
function calculateTarget(x, y, deltaX, deltaY, width, nudge) {
  let targetX = deltaY !== 0 ? (-1 * y) / (deltaY / deltaX) + x : 0;
  targetX = clamp(targetX, 0, width);
  if (nudge && typeof nudge === 'function') {
    targetX = nudge(targetX);
  }
  return targetX / width;
}

/*
 * get the closest element on the x axis to the given position.
 * assumes elements are already sorted by x position
 */
function closestElementX(x, sortedElements) {
  let closestElement = null;
  let closestDistance = null;
  for (let element of sortedElements) {
    const rect = element.getBoundingClientRect();
    if (x >= rect.left && x <= rect.right) {
      return element;
    }
    const distance = x > rect.right ? x - rect.right : rect.left - x;
    if (closestDistance === null || distance < closestDistance) {
      closestDistance = distance;
      closestElement = element;
    }
  }
  return closestElement ? closestElement : sortedElements[0];
}

function setScale(scale) {
  // [0, 1] -> [1, 44 / 22]
  const nav = $('#page-nav');
  nav.style.setProperty('--page-nav-scale', scale * (44 / 22 - 1) + 1);
}

function setOriginTarget(originTarget) {
  // [0, 1] -> [0%, 100%]
  const nav = $('#page-nav');
  nav.style.setProperty(
    '--page-nav-transform-origin',
    `${originTarget * 100}%`,
  );
}

let scaleSpring = null;
let lastScale = 0;
let lastOriginTarget = 0.5;

function handleMouseMove(event) {
  window.requestAnimationFrame(() => {
    const scale = event.clientY < window.innerHeight * 0.15 ? 1 : 0;
    if (scale !== lastScale) {
      lastScale = scale;
      scaleSpring
        .updateConfig({
          toValue: scale,
        })
        .start();
      if (scale > 0) {
        const originTarget = calculateTarget(
          event.clientX,
          event.clientY,
          event.movementX,
          event.movementY,
          window.innerWidth,
          /*
           * snap target to the middle of the closest nav element.
           * if element farthest left, snap to left edge
           * if element is farthest right, snap to right edge,
           * to ensure element does not scale off the screen
           */
          (targetX) => {
            const elements = $$('.page-nav__menu a');
            const element = closestElementX(targetX, elements);
            const rect = element.getBoundingClientRect();
            targetX = (rect.left + rect.right) / 2.0;
            if (element === elements[0]) targetX = rect.left;
            if (element === elements[elements.length - 1]) targetX = rect.right;
            return targetX;
          },
        );
        if (originTarget !== lastOriginTarget) {
          lastOriginTarget = originTarget;
          setOriginTarget(originTarget);
        }
      }
    }
  });
}

export const load = () => {
  const toggle = $('#page-nav__toggle');
  if (!toggle) return;

  setScale(lastScale);
  setOriginTarget(lastOriginTarget);

  scaleSpring = new Spring({
    fromValue: lastScale,
    toValue: lastScale,
    stiffness: 400,
    damping: 28,
    mass: 1,
  })
    .onUpdate((s) => {
      setScale(s.currentValue);
    })
    .start();

  toggle.addEventListener('click', handleToggle);
  document.addEventListener('mousemove', handleMouseMove);
};

export const unload = () => {
  const toggle = $('#page-nav__toggle');
  if (!toggle) return;

  if (scaleSpring) {
    scaleSpring.removeAllListeners();
  }

  toggle.removeEventListener('click', handleToggle);
  document.removeEventListener('mousemove', handleMouseMove);
};
