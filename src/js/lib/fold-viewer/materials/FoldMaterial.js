import * as Nodes from 'three/examples/jsm/nodes/Nodes';
import UVFlipXNode from '../nodes/UVFlipXNode';
import FadeNode from '../nodes/FadeNode';
import FrontFacingNode from '../nodes/FrontFacingNode';
import * as THREE from 'three';

class FoldMaterial extends Nodes.MeshStandardNodeMaterial {

    static nodeType = "FoldMaterial";

    constructor (frontMap, backMap, normalMap) {
        super();
        this.side = THREE.DoubleSide;
        this.morphNormals = true;
        this.morphTargets = true;
        this.bleed = new Nodes.FloatNode(0.0);
        this.darkness = new Nodes.FloatNode(0.4);

        const backMapNode = new Nodes.TextureNode( backMap, new UVFlipXNode() );
        const normalMapNode = new Nodes.TextureNode( normalMap );

        const frontMapNode = new Nodes.TextureNode( frontMap );

        const frontNode = new Nodes.OperatorNode(
            frontMapNode,
            new FadeNode(backMapNode, this.bleed),
            Nodes.OperatorNode.MUL
        )

        const backNode = new Nodes.OperatorNode(
            backMapNode,
            new FadeNode(frontMapNode, this.bleed),
            Nodes.OperatorNode.MUL
        )

        const frontFacingNode = new FrontFacingNode();
        
        const { EQUAL } = Nodes.CondNode;
        const frontBackNode = new Nodes.CondNode(
            frontFacingNode,
            new Nodes.BoolNode(true),
            EQUAL,
            frontNode,
            backNode
          );
      
        this.color = new Nodes.OperatorNode(
            frontBackNode,
            new Nodes.OperatorNode(
                new Nodes.FloatNode(1.0),
                this.darkness,
                Nodes.OperatorNode.SUB
            ),
            Nodes.OperatorNode.MUL
        );
        this.dithering = true;
        this.normalMap = normalMapNode;
        this.normalScale = new THREE.Vector2( 0.8, 0.8 );
        this.metalness = 0;
        this.roughness = 0.7;
    }
};

export default FoldMaterial;