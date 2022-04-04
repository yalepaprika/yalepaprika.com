import * as FoldViewer from './components/FoldViewer';
import * as FoldViewerSummary from './components/FoldViewerSummary';
import * as Nav from './components/Nav';

export const load = () => {
  FoldViewer.load();
  FoldViewerSummary.load();
  Nav.load();
}

export const unload = () => {
  FoldViewer.unload();
  FoldViewerSummary.load();
  Nav.load();
};
