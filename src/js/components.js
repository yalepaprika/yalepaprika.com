import * as FoldViewer from './components/FoldViewer';
import * as FoldViewerSummary from './components/FoldViewerSummary';

export const load = () => {
  FoldViewer.load();
  FoldViewerSummary.load();
}

export const unload = () => {
  FoldViewer.unload();
  FoldViewerSummary.load();
};
