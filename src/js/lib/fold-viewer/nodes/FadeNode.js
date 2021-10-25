import {
    TempNode,
    OperatorNode,
    FloatNode
} from 'three/examples/jsm/nodes/Nodes';

export default class FadeNode extends TempNode {

    static nodeType = "FadeNode";

    constructor(color, amount) {
        super('v4');
        this.color = color;
        this.amount = amount;
    }

    generate(builder, output) {
        const Node = new OperatorNode(
            new OperatorNode(
                this.color,
                this.amount,
                OperatorNode.MUL
            ),
            new OperatorNode(
                new FloatNode(1.0),
                this.amount,
                OperatorNode.SUB
            ),
            OperatorNode.ADD
        );
        return Node.generate(builder, output);
    }

    copy(source) {
        TempNode.prototype.copy.call(this, source);
        this.color = source.color;
        this.amount = source.amount;
        return this;
    }

    toJSON(meta) {
        let data = this.getJSONNode(meta);
        if (!data) {
            data = this.createJSONNode(meta);
            data.color = this.color.toJSON( meta ).uuid;
            data.amount = this.amount;    
        }
        return data;
    }

}