import React, { Suspense, useEffect } from 'react';
import FoldsGridItem from './FoldsGridItem';
import ScissorRenderer from '../../lib/components/ScissorRenderer';

export default function FoldsGrid({
  elements = [],
  elementProps = [],
  ...props
}) {
  return (
    <ScissorRenderer>
      {elements.map((element, index) => {
        return (
          <FoldsGridItem element={element} {...elementProps[index]} />
        )
      })}
    </ScissorRenderer>
  );
}
