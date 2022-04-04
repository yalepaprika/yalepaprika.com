import * as FoldViewer from './components/FoldViewer';
import * as FoldViewerSummary from './components/FoldViewerSummary';
import * as Nav from './components/Nav';
import * as Pagination from './components/Pagination'

export const load = () => {
  FoldViewer.load();
  FoldViewerSummary.load();
  Nav.load();
  Pagination.load();
}

export const unload = () => {
  FoldViewer.unload();
  FoldViewerSummary.unload();
  Nav.unload();
  Pagination.unload();
};
