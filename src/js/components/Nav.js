function show() {
  const toggle = document.getElementById('page-nav__toggle');
  const nav = document.getElementById('page-nav');
  nav.classList.add('page-nav--expanded');
  toggle.setAttribute('aria-expanded', true);
  toggle.innerHTML = 'Close';
  window.addEventListener('click', handleClose);
  window.addEventListener('focusin', handleClose);
}

function hide() {
  const toggle = document.getElementById('page-nav__toggle');
  const nav = document.getElementById('page-nav');
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
  const nav = document.getElementById('page-nav');
  if (!nav.contains(event.target)) {
    event.stopPropagation();
    event.preventDefault();
    hide();
  }
}

export const load = () => {
  const toggle = document.getElementById('page-nav__toggle');
  if (!toggle) return;

  toggle.addEventListener('click', handleToggle);
};

export const unload = () => {
  const toggle = document.getElementById('page-nav__toggle');
  if (!toggle) return;

  toggle.removeEventListener('click', handleToggle);
};
