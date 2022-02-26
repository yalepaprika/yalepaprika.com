/* vendored by s3ththompson on 2/26 to work around ColorSpaceNode bug */

import {
  GammaEncoding,
  LinearEncoding,
  RGBEEncoding,
  RGBM7Encoding,
  RGBM16Encoding,
  RGBDEncoding,
  sRGBEncoding,
} from 'three';

import {
  TempNode,
  FloatNode,
  FunctionNode,
  ExpressionNode,
} from 'three/examples/jsm/nodes/Nodes';

class LinearTosRGBNode extends TempNode {
  constructor(input, method) {
    super('v4');

    this.input = input;

    this.method = method || LinearTosRGBNode.LINEAR_TO_SRGB;
  }

  generate(builder, output) {
    const input = this.input.build(builder, 'v4');
    const outputType = this.getType(builder);

    const methodNode = LinearTosRGBNode.Nodes[this.method];
    const method = builder.include(methodNode);

    if (methodNode.inputs.length === 2) {
      const factor = this.factor.build(builder, 'f');

      return builder.format(
        method + '( ' + input + ', ' + factor + ' )',
        outputType,
        output,
      );
    } else {
      return builder.format(method + '( ' + input + ' )', outputType, output);
    }
  }

  fromEncoding(encoding) {
    const components = LinearTosRGBNode.getEncodingComponents(encoding);

    this.method = 'LinearTo' + components[0];
    this.factor = components[1];
  }

  fromDecoding(encoding) {
    const components = LinearTosRGBNode.getEncodingComponents(encoding);

    this.method = components[0] + 'ToLinear';
    this.factor = components[1];
  }

  copy(source) {
    super.copy(source);

    this.input = source.input;
    this.method = source.method;

    return this;
  }

  toJSON(meta) {
    let data = this.getJSONNode(meta);

    if (!data) {
      data = this.createJSONNode(meta);

      data.input = this.input.toJSON(meta).uuid;
      data.method = this.method;
    }

    return data;
  }
}

LinearTosRGBNode.Nodes = (function () {
  const LinearTosRGB = new FunctionNode(/* glsl */ `
		vec4 LinearTosRGB2( in vec4 value ) {

			return vec4( mix( pow( value.rgb, vec3( 0.41666 ) ) * 1.055 - vec3( 0.055 ), value.rgb * 12.92, vec3( lessThanEqual( value.rgb, vec3( 0.0031308 ) ) ) ), value.w );

		}`);

  return {
    LinearTosRGB: LinearTosRGB,
  };
})();

LinearTosRGBNode.LINEAR_TO_SRGB = 'LinearTosRGB';

LinearTosRGBNode.getEncodingComponents = function (encoding) {
  switch (encoding) {
    case LinearEncoding:
      return ['Linear'];
    case sRGBEncoding:
      return ['sRGB'];
    case RGBEEncoding:
      return ['RGBE'];
    case RGBM7Encoding:
      return ['RGBM', new FloatNode(7.0).setReadonly(true)];
    case RGBM16Encoding:
      return ['RGBM', new FloatNode(16.0).setReadonly(true)];
    case RGBDEncoding:
      return ['RGBD', new FloatNode(256.0).setReadonly(true)];
    case GammaEncoding:
      return ['Gamma', new ExpressionNode('float( GAMMA_FACTOR )', 'f')];
  }
};

LinearTosRGBNode.prototype.nodeType = 'ColorSpace';
LinearTosRGBNode.prototype.hashProperties = ['method'];

export { LinearTosRGBNode };
