import {
    TempNode,
    OperatorNode,
    UVNode,
    Vector2Node
} from 'three/examples/jsm/nodes/Nodes';

export default class UVFlipXNode extends TempNode {

    static nodeType = "UVFlipX";

    constructor() {
        super('v2');
    }

    generate(builder, output) {
        const Node = new OperatorNode(
            new OperatorNode(
                new OperatorNode(
                    new UVNode(),
                    new Vector2Node( 0.5, 0.5 ),
                    OperatorNode.SUB
                ),
                new Vector2Node( -1.0, 1.0 ),
                OperatorNode.MUL
            ),
            new Vector2Node( 0.5, 0.5 ),
            OperatorNode.ADD
        );
        return Node.generate(builder, output);
    }

    copy(source) {
        TempNode.prototype.copy.call(this, source);
        return this;
    }

    toJSON(meta) {
        let data = this.getJSONNode(meta);
        if (!data) data = this.createJSONNode(meta);
        return data;
    }

}