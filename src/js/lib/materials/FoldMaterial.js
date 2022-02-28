import {
  MeshStandardNodeMaterial,
  FloatNode,
  TextureNode,
  OperatorNode,
  CondNode,
  BoolNode,
} from 'three/examples/jsm/nodes/Nodes';
import UVFlipXNode from '../nodes/UVFlipXNode';
import FadeNode from '../nodes/FadeNode';
import FrontFacingNode from '../nodes/FrontFacingNode';
import { DoubleSide, Vector2 } from 'three';
import { LinearTosRGBNode } from '../nodes/LinearTosRGBNode';

class FoldMaterial extends MeshStandardNodeMaterial {

    static nodeType = "FoldMaterial";

    constructor (frontMap, backMap, normalMap) {
      super();
      this.side = DoubleSide;
      this.morphNormals = true;
      this.morphTargets = true;
      this.bleed = new FloatNode(0.0);
      this.darkness = new FloatNode(0.4);

      const backMapNode = new TextureNode(backMap, new UVFlipXNode());
      const normalMapNode = new TextureNode(normalMap);

      const frontMapNode = new TextureNode(frontMap);

      const frontNode = new OperatorNode(
        frontMapNode,
        new FadeNode(backMapNode, this.bleed),
        OperatorNode.MUL,
      );

      const backNode = new OperatorNode(
        backMapNode,
        new FadeNode(frontMapNode, this.bleed),
        OperatorNode.MUL,
      );

      const frontFacingNode = new FrontFacingNode();

      const { EQUAL } = CondNode;
      const frontBackNode = new CondNode(
        frontFacingNode,
        new BoolNode(true),
        EQUAL,
        frontNode,
        backNode,
      );

      const linearColor = new OperatorNode(
        frontBackNode,
        new OperatorNode(
          new FloatNode(1.0),
          this.darkness,
          OperatorNode.SUB,
        ),
        OperatorNode.MUL,
      );

      // TODO: figure out why LINEAR_TO_SRGB is not happening automatically
      this.color = new LinearTosRGBNode(linearColor, LinearTosRGBNode.LINEAR_TO_SRGB);

      this.dithering = true;
      this.normalMap = normalMapNode;
      this.normalScale = new Vector2(0.8, 0.8);
      this.metalness = 0;
      this.roughness = 0.7;
    }
};

export default FoldMaterial;