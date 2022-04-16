import {
  MeshStandardNodeMaterial,
  StandardNodeMaterial,
  FloatNode,
  TextureNode,
  OperatorNode,
  CondNode,
  BoolNode,
  ColorNode,
  SwitchNode,
  PositionNode,
  MathNode,
  Noise2DNode,
  UVNode,
  Noise3DNode,
  JoinNode,
  Vector2Node,
  NormalMapNode
} from 'three/examples/jsm/nodes/Nodes';
import UVFlipXNode from '../nodes/UVFlipXNode';
import FadeNode from '../nodes/FadeNode';
import FrontFacingNode from '../nodes/FrontFacingNode';
import { DoubleSide, Vector2 } from 'three';
import { LinearTosRGBNode } from '../nodes/LinearTosRGBNode';

class FoldMaterial extends StandardNodeMaterial {

    static nodeType = "FoldMaterial";

    constructor (frontMap, backMap, normalMap = null) {
      super();
      this.side = DoubleSide;
      this.morphNormals = true;
      this.morphTargets = true;
      this.bleed = new FloatNode(0.0);
      this.brightness = new FloatNode(0.6);
      this.noiseScale = new Vector2Node(1.0, 1.0);
      this.noiseAmplitude = new FloatNode(0.0);
      this.normalScale = new Vector2Node(1.0, 1.0);

      const backMapNode = new TextureNode(backMap, new UVFlipXNode());
      const normalMapNode = normalMap ? new TextureNode(normalMap) : new ColorNode(0, 0, 255);

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

      const normalNode = new NormalMapNode(normalMapNode, this.normalScale);

      const frontFacingNode = new FrontFacingNode();

      const frontBackNode = new CondNode(
        frontFacingNode,
        new BoolNode(true),
        CondNode.EQUAL,
        frontNode,
        backNode,
      );

      const linearColor = new OperatorNode(
        frontBackNode,
        this.brightness,
        OperatorNode.MUL,
      );

      // TODO: figure out why LINEAR_TO_SRGB is not happening automatically
      this.color = new LinearTosRGBNode(linearColor, LinearTosRGBNode.LINEAR_TO_SRGB);

      const position = new PositionNode();
      const x = new SwitchNode(position, 'x');
      const y = new SwitchNode(position, 'y');
      const z = new SwitchNode(position, 'z');
      const noise = new Noise2DNode(
        new OperatorNode(new UVNode(), this.noiseScale, OperatorNode.MUL),
        this.noiseAmplitude,
      );
      const offset = new OperatorNode(z, noise, OperatorNode.ADD);
      this.position = new JoinNode(x, y, offset);

      this.mask = new SwitchNode(frontMapNode, 'a');
      this.dithering = new BoolNode(true);
      this.normal = normalNode;
      this.metalness = new FloatNode(0);
      this.roughness = new FloatNode(0.7);
    }
};

export default FoldMaterial;
