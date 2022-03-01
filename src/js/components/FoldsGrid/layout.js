import Packer from 'muuri/src/Packer/Packer';

export function layout() {
  const element = document.querySelector('#folds-grid');
  if (!element)
    return;

  const packer = new Packer();
  const items = element.querySelectorAll('.fold-grid-item');
  const packerItems = Array.from(items).map((item) => ({
    _width: parseFloat(item.style.width),
    _height: parseFloat(item.style.height),
    _marginLeft: 0,
    _marginRight: 0,
    _marginTop: 0,
    _marginBottom: 0
  }));
  const packerLayout = packer.getLayout(packerItems, 100, 100);

  for (let [index, item] of Object.entries(items)) {
    item.style.left = `${packerLayout.slots[index * 2]}vw`;
    item.style.top = `${packerLayout.slots[index * 2 + 1]}vw`;
  }
  element.style.height = `${packerLayout.height}vw`;
}