import create from 'zustand';

const useStore = create((set) => ({
  scenes: [],
  addScene: (scene) => set((state) => ({ scenes: [...state.scenes, scene] })),
  removeScene: (scene) => set((state) => ({ scenes: state.scenes.filter(s => (s === scene))})),
}));

export { useStore };