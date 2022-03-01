import * as FoldViewer from './components/FoldViewer';
import * as FoldScene from './components/FoldScene';
import * as FoldsGrid from './components/FoldsGrid';

export const load = () => {
  FoldViewer.load();
  FoldScene.load();
  FoldsGrid.load();
}

export const unload = () => {
  FoldViewer.unload();
  FoldScene.unload();
  FoldsGrid.unload();
};
