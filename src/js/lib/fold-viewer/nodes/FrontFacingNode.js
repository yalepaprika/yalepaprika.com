import { TempNode } from 'three/examples/jsm/nodes/core/TempNode.js';

class FrontFacingNode extends TempNode {

    static nodeType = "FrontFacing";
    
    constructor() {
        super('b');
    }
    
    generate(builder, output) {
        let result;
        if (builder.isShader('fragment')) {
            result = '( gl_FrontFacing )';
        } else {
            console.warn("THREE.FrontFacingNode is not compatible with " + builder.shader + " shader.");
            result = 'true';
        }

        return builder.format(result, this.getType(builder), output);
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



export default FrontFacingNode;