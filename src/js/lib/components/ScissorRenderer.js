import { useFrame } from '@react-three/fiber';
import React, { forwardRef, useEffect, useRef } from 'react';
import { useStore } from './scissorStore';

export default function ScissorRenderer({ children, ...props }) {
  useFrame(({ gl }) => {
    const scenes = useStore.getState().scenes;

    gl.setClearColor(0xffffff);
    gl.setScissorTest(false);
    gl.clear();
    gl.setClearColor(0xe0e0e0);
    gl.setScissorTest(true);

    for (let { scene, element, camera } of [scenes[3]]) {
      const rect = element.getBoundingClientRect();
      const { left, right, top, bottom, width, height } = rect;

      const isOffscreen =
        bottom < 0 ||
        top > gl.domElement.clientHeight ||
        right < 0 ||
        left > gl.domElement.clientWidth;

      if (!isOffscreen) {
        const positiveYUpBottom = gl.domElement.clientHeight - bottom;
        gl.setViewport(left, positiveYUpBottom, width, height);
        gl.setScissor(left, positiveYUpBottom, width, height);

        camera.aspect = rect.width / rect.height;
        camera.updateProjectionMatrix();

        gl.render(scene, camera);
      }
    }
   }, 1);

  return <>{children}</>;
}
