import { $, convertRemToPixels } from '../lib/utils';
import { scaleLinear, scalePow } from 'd3-scale';

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

let lastTransformOriginX = null;
let lastScale = null;

function handleMouseMove(event) {
  window.requestAnimationFrame(() => {
    const transformOriginX = scaleLinear()
      .domain([
        0.08 * window.innerWidth,
        0.1 * window.innerWidth,
        0.9 * window.innerWidth,
        0.92 * window.innerWidth,
      ])
      .range([
        convertRemToPixels(20 / 22),
        convertRemToPixels(20 / 22) + 0.1 * window.innerWidth,
        0.9 * window.innerWidth - convertRemToPixels(20 / 22),
        window.innerWidth - convertRemToPixels(20 / 22),
      ])
      .clamp(true);

    const scale = scalePow()
      .exponent(1 / 10)
      .domain([0.3 * window.innerHeight, 0.1 * window.innerHeight])
      .range([1, 44 / 22])
      .clamp(true);

    lastTransformOriginX = transformOriginX(event.clientX);
    lastScale = scale(event.clientY);
    setNavStyles();
  });
}

function setNavStyles() {
  const nav = $('#page-nav');
  if (lastTransformOriginX) {
    nav.style.setProperty(
      '--page-nav-transform-origin',
      `${lastTransformOriginX}px`,
    );
  }
  if (lastScale) {
    nav.style.setProperty('--page-nav-scale', lastScale);
  }
}

export const load = () => {
  const toggle = $('#page-nav__toggle');
  if (!toggle) return;

  setNavStyles();
  toggle.addEventListener('click', handleToggle);
  document.addEventListener('mousemove', handleMouseMove);
};

export const unload = () => {
  const toggle = $('#page-nav__toggle');
  if (!toggle) return;

  toggle.removeEventListener('click', handleToggle);
  document.removeEventListener('mousemove', handleMouseMove);
};
