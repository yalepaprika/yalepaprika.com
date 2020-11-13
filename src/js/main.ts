import SimpleBar from 'simplebar';

function init(): void {
  Array.prototype.forEach.call(
    document.querySelectorAll('[data-simplebar]'),
    (el) => {
      if (
        el.getAttribute('data-simplebar') !== 'init' &&
        !SimpleBar.instances.has(el)
      )
        new SimpleBar(el);
    },
  );

  // get home fold, scroll to end
}

// function unload(): void {
//   Array.prototype.forEach.call(
//     document.querySelectorAll('[data-simplebar]'),
//     (el) => {
//       if (SimpleBar.instances.has(el))
//         (<any>SimpleBar.instances.get(el)).unMount();
//     },
//   );
// }

window.addEventListener('DOMContentLoaded', () => {
  init();
});
