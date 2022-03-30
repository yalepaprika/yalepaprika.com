import React, { forwardRef, useEffect, useRef } from "react";
import { useStore } from './scissorStore'

export default function ScissorScene({element, camera = null, children, ...props})  {
  const ref = useRef();
  const addScene = useStore((state) => state.addScene);
  const removeScene = useStore((state) => state.removeScene);

  useEffect(() => {
    if (!camera) {
      ref.current.traverse((o) => {
        if (
          (o.type === 'PerspectiveCamera') |
          (o.type === 'OrthographicCamera') |
          (o.type === 'StereoCamera')
        )
          camera = o;
      });
    }
    if (!camera) throw new Error('ScissorScene: camera expected in scene or as prop.')

    const scene = {
      scene: ref.current,
      element,
      camera,
    };
    addScene(scene);
    return () => removeScene(scene);
  }, []);

  return (
    <scene ref={ref} {...props} >
      {children}
    </scene>
  );
};

