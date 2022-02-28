import * as FoldViewer from './components/FoldViewer';
import * as FoldScene from './components/FoldScene';

export const load = () => {
  FoldViewer.load();
  FoldScene.load();
}

export const unload = () => {
  FoldViewer.unload();
  FoldScene.unload();
};
