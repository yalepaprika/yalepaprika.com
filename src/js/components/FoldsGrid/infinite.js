export function parseBody(body, path, options, lastPageReached) {
  let { responseBody, domParseResponse } = options;
  let isDocument = responseBody === 'text' && domParseResponse;
  if (!isDocument)
    return;
  let items = body.querySelectorAll('.fold-grid-item');
  if (!items || !items.length) {
    if (lastPageReached) lastPageReached(body, path);
    return;
  }
  var fragment = document.createDocumentFragment();
  for (var i = 0; i < items.length; i++) {
    fragment.appendChild(items[i]);
  }

  return fragment;
}
