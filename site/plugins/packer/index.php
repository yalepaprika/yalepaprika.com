<?php

// auto-generated on 2/28 by s3ththompson with https://github.com/sstur/js2php
// changes to generated output:
// - add Packer namespace
// - create layout function and marshall data in/out
// - fix bug in _doRectsOverlap (outermost negation operator needs parens)
// don't ask how long this took to get right

namespace Packer;

mb_internal_encoding("UTF-8");
function _void() {
  return null;
}
function _new($fn) {
  if (!($fn instanceof Func)) {
    throw new Ex(Err::create(_typeof($fn) . " is not a function"));
  }
  $args = array_slice(func_get_args(), 1);
  return call_user_func_array(array($fn, 'construct'), $args);
}
function _instanceof($obj, $fn) {
  if (!($obj instanceof ObjectClass)) {
    return false;
  }
  if (!($fn instanceof Func)) {
    throw new Ex(Err::create('Expecting a function in instanceof check'));
  }
  $proto = $obj->proto;
  $prototype = get($fn, 'prototype');
  while ($proto !== ObjectClass::$null) {
    if ($proto === $prototype) {
      return true;
    }
    $proto = $proto->proto;
  }
  return false;
}
function _divide($a, $b) {
  $a = to_number($a);
  $b = to_number($b);
  if ($b === 0.0) {
    if ($a === 0.0) return NAN;
    return ($a < 0.0) ? -INF : INF;
  }
  return $a / $b;
}
function _plus() {
  $total = 0;
  $strings = array();
  $isString = false;
  foreach (func_get_args() as $arg) {
    if (is_string($arg)) {
      $isString = true;
    }
    $strings[] = to_string($arg);
    if (!$isString) {
      $total += to_number($arg);
    }
  }
  return $isString ? join('', $strings) : $total;
}
function _concat() {
  $strings = array();
  foreach (func_get_args() as $arg) {
    $strings[] = to_string($arg);
  }
  return join('', $strings);
}
function _negate($val) {
  return (float)(0 - $val);
}
function _and($a, $b) {
  return $a ? $b : $a;
}
function _or($a, $b) {
  return $a ? $a : $b;
}
function _delete($obj, $key = null) {
  if (func_num_args() === 1) {
    return false;
  }
  if ($obj === null || $obj === ObjectClass::$null) {
    throw new Ex(Err::create("Cannot convert undefined or null to object"));
  }
  $obj = objectify($obj);
  $obj->remove($key);
  return true;
}
function _in($key, $obj) {
  if (!($obj instanceof ObjectClass)) {
    throw new Ex(Err::create("Cannot use 'in' operator to search for '" . $key . "' in " . to_string($obj)));
  }
  return $obj->hasProperty($key);
}
function _typeof($value) {
  if ($value === null) {
    return 'undefined';
  }
  if ($value === ObjectClass::$null) {
    return 'object';
  }
  $type = gettype($value);
  if ($type === 'integer' || $type === 'double') {
    return 'number';
  }
  if ($type === 'string' || $type === 'boolean') {
    return $type;
  }
  if ($value instanceof Func) {
    return 'function';
  }
  if ($value instanceof ObjectClass) {
    return 'object';
  }
  return 'unknown';
}
function _seq() {
  $args = func_get_args();
  return array_pop($args);
}
function is($x) {
  return $x !== false && $x !== 0.0 && $x !== '' && $x !== null && $x !== ObjectClass::$null && $x === $x ;
}
function not($x) {
  return $x === false || $x === 0.0 || $x === '' || $x === null || $x === ObjectClass::$null || $x !== $x ;
}
function eq($a, $b) {
  $typeA = ($a === null || $a === ObjectClass::$null ? 'null' : ($a instanceof ObjectClass ? 'object' : gettype($a)));
  $typeB = ($b === null || $b === ObjectClass::$null ? 'null' : ($b instanceof ObjectClass ? 'object' : gettype($b)));
  if ($typeA === 'null' && $typeB === 'null') {
    return true;
  }
  if ($typeA === 'integer') {
    $a = (float)$a;
    $typeA = 'double';
  }
  if ($typeB === 'integer') {
    $b = (float)$b;
    $typeB = 'double';
  }
  if ($typeA === $typeB) {
    return $a === $b;
  }
  if ($typeA === 'double' && $typeB === 'string') {
    return $a === to_number($b);
  }
  if ($typeB === 'double' && $typeA === 'string') {
    return $b === to_number($a);
  }
  if ($typeA === 'boolean') {
    return eq((float)$a, $b);
  }
  if ($typeB === 'boolean') {
    return eq((float)$b, $a);
  }
  if (($typeA === 'string' || $typeA === 'double') && $typeB === 'object') {
    return eq($a, to_primitive($b));
  }
  if (($typeB === 'string' || $typeB === 'double') && $typeA === 'object') {
    return eq($b, to_primitive($a));
  }
  return false;
}
function cmp($a, $operator, $b) {
    $typeA = ($a === null || $a === ObjectClass::$null ? 'null' : ($a instanceof ObjectClass ? 'object' : gettype($a)));
    $typeB = ($b === null || $b === ObjectClass::$null ? 'null' : ($b instanceof ObjectClass ? 'object' : gettype($b)));
    $isNumberA = in_array($typeA, ['integer', 'double']);
    $isNumberB = in_array($typeB, ['integer', 'double']);
    if ($isNumberA && $isNumberB) {
    } else
        if ($typeA === 'string' && $typeB === 'string') {
        $a = strcmp($a, $b);
        $b = 0;
    } else if ($typeA === 'string' && $isNumberB) {
        $a = to_number($a);
    } else if ($typeB === 'string' && $isNumberA) {
        $b = to_number($b);
    }
    switch ($operator) {
        case '<':
            return $a < $b;
        case '>':
            return $a > $b;
        case '<=':
            return $a <= $b;
        case '>=':
            return $a >= $b;
    }
}
function keys($obj, &$arr = array()) {
  if (!($obj instanceof ObjectClass)) {
    return $arr;
  }
  return $obj->getKeys($arr);
}
function is_primitive($value) {
  return ($value === null || $value === ObjectClass::$null || is_scalar($value));
}
function is_int_or_float($value) {
  return (is_int($value) || is_float($value));
}
function to_string($value) {
  if ($value === null) {
    return 'undefined';
  }
  if ($value === ObjectClass::$null) {
    return 'null';
  }
  $type = gettype($value);
  if ($type === 'string') {
    return $value;
  }
  if ($type === 'boolean') {
    return $value ? 'true' : 'false';
  }
  if ($type === 'integer' || $type === 'double') {
    if ($value !== $value) return 'NaN';
    if ($value === INF) return 'Infinity';
    if ($value === -INF) return '-Infinity';
    return $value . '';
  }
  if ($value instanceof ObjectClass) {
    $fn = $value->get('toString');
    if ($fn instanceof Func) {
      return $fn->call($value);
    } else {
      throw new Ex(Err::create('Cannot convert object to primitive value'));
    }
  }
  throw new Ex(Err::create('Cannot cast PHP value to string: ' . _stringify($value)));
}
function to_number($value) {
  if ($value === null) {
    return NAN;
  }
  if ($value === ObjectClass::$null) {
    return 0.0;
  }
  if (is_float($value)) {
    return $value;
  }
  if (is_numeric($value)) {
    return (float)$value;
  }
  if (is_bool($value)) {
    return ($value ? 1.0 : 0.0);
  }
  if ($value instanceof ObjectClass) {
    return to_number(to_primitive($value));
  }
  $value = preg_replace('/^[\s\x0B\xA0]+|[\s\x0B\xA0]+$/u', '', $value);
  if ($value === '') {
    return 0.0;
  }
  if ($value === 'Infinity' || $value === '+Infinity') {
    return INF;
  }
  if ($value === '-Infinity') {
    return -INF;
  }
  if (preg_match('/^([+-]?)(\d+\.\d*|\.\d+|\d+)$/i', $value)) {
    return (float)$value;
  }
  if (preg_match('/^([+-]?)(\d+\.\d*|\.\d+|\d+)e([+-]?[0-9]+)$/i', $value, $m)) {
    return pow($m[1] . $m[2], $m[3]);
  }
  if (preg_match('/^0x[a-z0-9]+$/i', $value)) {
    return (float)hexdec(substr($value, 2));
  }
  return NAN;
}
function to_primitive($obj) {
  $value = $obj->callMethod('valueOf');
  if ($value instanceof ObjectClass) {
    $value = to_string($value);
  }
  return $value;
}
function objectify($value) {
  $type = gettype($value);
  if ($type === 'string') {
    return new Str($value);
  } elseif ($type === 'integer' || $type === 'double') {
    return new Number($value);
  } elseif ($type === 'boolean') {
    return new Bln($value);
  }
  return $value;
}
function get($obj, $name) {
  if ($obj === null || $obj === ObjectClass::$null) {
    throw new Ex(Err::create("Cannot read property '" . $name . "' of " . to_string($obj)));
  }
  $obj = objectify($obj);
  return $obj->get($name);
}
function set($obj, $name, $value, $op = '=', $returnOld = false) {
  if ($obj === null || $obj === ObjectClass::$null) {
    throw new Ex(Err::create("Cannot set property '" . $name . "' of " . to_string($obj)));
  }
  $obj = objectify($obj);
  if ($op === '=') {
    return $obj->set($name, $value);
  }
  $oldValue = $obj->get($name);
  switch ($op) {
    case '+=':
      $newValue = _plus($oldValue, $value);
      break;
    case '-=':
      $newValue = $oldValue - $value;
      break;
    case '*=':
      $newValue = $oldValue * $value;
      break;
    case '/=':
      $newValue = $oldValue / $value;
      break;
    case '%=':
      $newValue = $oldValue % $value;
      break;
  }
  $obj->set($name, $newValue);
  return $returnOld ? $oldValue : $newValue;
}
function call($fn) {
  if (!($fn instanceof Func)) {
    throw new Ex(Err::create(_typeof($fn) . " is not a function"));
  }
  $args = array_slice(func_get_args(), 1);
  return $fn->apply(ObjectClass::$global, $args);
}
function call_method($obj, $name) {
  if ($obj === null || $obj === ObjectClass::$null) {
    throw new Ex(Err::create("Cannot read property '" . $name . "' of " . to_string($obj)));
  }
  $obj = objectify($obj);
  $fn = $obj->get($name);
  if (!($fn instanceof Func)) {
    throw new Ex(Err::create(_typeof($fn) . " is not a function"));
  }
  $args = array_slice(func_get_args(), 2);
  return $fn->apply($obj, $args);
}
function write_all($stream, $data, $bytesTotal = null) {
  if ($bytesTotal === null) {
    $bytesTotal = strlen($data);
  }
  $bytesWritten = fwrite($stream, $data);
  while ($bytesWritten < $bytesTotal) {
    $bytesWritten += fwrite($stream, substr($data, $bytesWritten));
  }
}
class ObjectClass {
  public $data = array();
  public $dscr = array();
  public $proto = null;
  public $className = "Object";
  static $protoObject = null;
  static $classMethods = null;
  static $protoMethods = null;
  static $null = null;
  static $global = null;
  function __construct() {
    $this->proto = self::$protoObject;
    $args = func_get_args();
    if (count($args) > 0) {
      $this->init($args);
    }
  }
  function init($arr) {
    $len = count($arr);
    for ($i = 0; $i < $len; $i += 2) {
      $this->set($arr[$i], $arr[$i + 1]);
    }
  }
  function get($key) {
    $key = (string)$key;
    if (method_exists($this, 'get_' . $key)) {
      return $this->{'get_' . $key}();
    }
    $obj = $this;
    while ($obj !== ObjectClass::$null) {
      if (array_key_exists($key, $obj->data)) {
        return $obj->data[$key];
      }
      $obj = $obj->proto;
    }
    return null;
  }
  function set($key, $value) {
    $key = (string)$key;
    if (method_exists($this, 'set_' . $key)) {
      return $this->{'set_' . $key}($value);
    }
    if (!array_key_exists($key, $this->dscr) || $this->dscr[$key]->writable) {
      $this->data[$key] = $value;
    }
    return $value;
  }
  function remove($key) {
    $key = (string)$key;
    if (array_key_exists($key, $this->dscr)) {
      if (!$this->dscr[$key]->configurable) {
        return false;
      }
      unset($this->dscr[$key]);
    }
    unset($this->data[$key]);
    return true;
  }
  function hasOwnProperty($key) {
    $key = (string)$key;
    if (method_exists($this, 'get_' . $key)) {
      return true;
    }
    return array_key_exists($key, $this->data);
  }
  function hasProperty($key) {
    $key = (string)$key;
    if ($this->hasOwnProperty($key)) {
      return true;
    }
    $proto = $this->proto;
    if ($proto instanceof ObjectClass) {
      return $proto->hasProperty($key);
    }
    return false;
  }
  function getOwnKeys($onlyEnumerable) {
    $arr = array();
    foreach ($this->data as $key => $value) {
      $key = (string)$key;
      if ($onlyEnumerable) {
        $dscr = isset($this->dscr[$key]) ? $this->dscr[$key] : null;
        if (!$dscr || $dscr->enumerable) {
          $arr[] = $key;
        }
      } else {
        $arr[] = $key;
      }
    }
    return $arr;
  }
  function getKeys(&$arr = array()) {
    foreach ($this->data as $key => $v) {
      $key = (string)$key;
      $dscr = isset($this->dscr[$key]) ? $this->dscr[$key] : null;
      if (!$dscr || $dscr->enumerable) {
        $arr[] = $key;
      }
    }
    $proto = $this->proto;
    if ($proto instanceof ObjectClass) {
      $proto->getKeys($arr);
    }
    return $arr;
  }
  function setProp($key, $value, $writable = null, $enumerable = null, $configurable = null) {
    $key = (string)$key;
    if (array_key_exists($key, $this->dscr)) {
      $result = $this->dscr[$key];
      unset($this->dscr[$key]);
    } else {
      $result = new Descriptor(true, true, true);
    }
    if ($writable !== null) {
      $result->writable = !!$writable;
    }
    if ($enumerable !== null) {
      $result->enumerable = !!$enumerable;
    }
    if ($configurable !== null) {
      $result->configurable = !!$configurable;
    }
    if (!$result->writable || !$result->enumerable || !$result->configurable) {
      $this->dscr[$key] = $result;
    }
    $this->data[$key] = $value;
    return $value;
  }
  function setProps($props, $writable = null, $enumerable = null, $configurable = null) {
    foreach ($props as $key => $value) {
      $this->setProp($key, $value, $writable, $enumerable, $configurable);
    }
  }
  function setMethods($methods, $writable = null, $enumerable = null, $configurable = null) {
    foreach ($methods as $name => $fn) {
      $func = new Func((string)$name, $fn);
      $func->strict = true;
      $this->setProp($name, $func, $writable, $enumerable, $configurable);
    }
  }
  function toArray() {
    $keys = $this->getOwnKeys(true);
    $results = array();
    foreach ($keys as $key) {
      $results[$key] = $this->get($key);
    }
    return $results;
  }
  function callMethod($name) {
    $fn = $this->get($name);
    if (!($fn instanceof Func)) {
      throw new Ex(Err::create('Invalid method called'));
    }
    $args = array_slice(func_get_args(), 1);
    return $fn->apply($this, $args);
  }
  function __call($name, $args) {
    if (isset($this->{$name})) {
      return call_user_func_array($this->{$name}, $args);
    } else {
      throw new Ex(Err::create('Internal method `' . $name . '` not found on ' . gettype($this)));
    }
  }
  static function getGlobalConstructor() {
    $Object = new Func(function($value = null) {
      if ($value === null || $value === ObjectClass::$null) {
        return new ObjectClass();
      } else {
        return objectify($value);
      }
    });
    $Object->set('prototype', ObjectClass::$protoObject);
    $Object->setMethods(ObjectClass::$classMethods, true, false, true);
    return $Object;
  }
}
class Descriptor {
  public $writable = true;
  public $enumerable = true;
  public $configurable = true;
  function __construct($writable = null, $enumerable = null, $configurable = null) {
    $this->writable = ($writable === null) ? true : !!$writable;
    $this->enumerable = ($enumerable === null) ? true : !!$enumerable;
    $this->configurable = ($configurable === null) ? true : !!$configurable;
  }
  function toObject($value = null) {
    $result = new ObjectClass();
    $result->set('value', $value);
    $result->set('writable', $this->writable);
    $result->set('enumerable', $this->enumerable);
    $result->set('configurable', $this->configurable);
    return $result;
  }
  static function getDefault($value = null) {
    return new ObjectClass('value', $value, 'writable', true, 'enumerable', true, 'configurable', true);
  }
}
ObjectClass::$classMethods = array(
  'create' => function($proto) {
      if (!($proto instanceof ObjectClass) && $proto !== ObjectClass::$null) {
        throw new Ex(Err::create('Object prototype may only be an Object or null'));
      }
      $obj = new ObjectClass();
      $obj->proto = $proto;
      return $obj;
    },
  'keys' => function($obj) {
      if (!($obj instanceof ObjectClass)) {
        throw new Ex(Err::create('Object.keys called on non-object'));
      }
      return Arr::fromArray($obj->getOwnKeys(true));
    },
  'getOwnPropertyNames' => function($obj) {
      if (!($obj instanceof ObjectClass)) {
        throw new Ex(Err::create('Object.getOwnPropertyNames called on non-object'));
      }
      return Arr::fromArray($obj->getOwnKeys(false));
    },
  'getOwnPropertyDescriptor' => function($obj, $key) {
      if (!($obj instanceof ObjectClass)) {
        throw new Ex(Err::create('Object.getOwnPropertyDescriptor called on non-object'));
      }
      $key = (string)$key;
      if (method_exists($obj, 'get_' . $key)) {
        $hasProperty = true;
        $value = $obj->{'get_' . $key}();
      } else {
        $hasProperty = array_key_exists($key, $obj->data);
        $value = $hasProperty ? $obj->data[$key] : null;
      }
      if (array_key_exists($key, $obj->dscr)) {
        return $obj->dscr[$key]->toObject($value);
      } else if ($hasProperty) {
        return Descriptor::getDefault($value);
      } else {
        return null;
      }
    },
  'defineProperty' => function($obj, $key, $desc) {
      $key = (string)$key;
      if (!($obj instanceof ObjectClass)) {
        throw new Ex(Err::create('Object.defineProperty called on non-object'));
      }
      $writable = $desc->get('writable');
      $enumerable = $desc->get('enumerable');
      $configurable = $desc->get('configurable');
      $updateValue = false;
      if (array_key_exists($key, $obj->data)) {
        if (array_key_exists($key, $obj->dscr)) {
          $result = $obj->dscr[$key];
        } else {
          $result = $obj->dscr[$key] = new Descriptor(true, true, true);
        }
        if (!$result->configurable) {
          throw new Ex(TypeErr::create('Cannot redefine property: ' . $key));
        }
        if ($writable !== null) {
          $result->writable = !!$writable;
        }
        if ($enumerable !== null) {
          $result->enumerable = !!$enumerable;
        }
        if ($configurable !== null) {
          $result->configurable = !!$configurable;
        }
        if ($result->writable && $result->enumerable && $result->configurable) {
          unset($obj->dscr[$key]);
        }
        if ($desc->hasProperty('value')) {
          $value = $desc->get('value');
          $updateValue = true;
        }
      } else {
        $writable = ($writable === null) ? false : !!$writable;
        $enumerable = ($enumerable === null) ? false : !!$enumerable;
        $configurable = ($configurable === null) ? false : !!$configurable;
        if (!$writable || !$enumerable || !$configurable) {
          $result = new Descriptor($writable, $enumerable, $configurable);
          $obj->dscr[$key] = $result;
        }
        $value = $desc->get('value');
        $updateValue = true;
      }
      if ($updateValue) {
        if (method_exists($obj, 'set_' . $key)) {
          $obj->{'set_' . $key}($value);
        } else {
          $obj->data[$key] = $value;
        }
      }
    },
  'defineProperties' => function($obj, $items) {
      if (!($obj instanceof ObjectClass)) {
        throw new Ex(Err::create('Object.defineProperties called on non-object'));
      }
      if (!($items instanceof ObjectClass)) {
        throw new Ex(Err::create('Object.defineProperties called with invalid list of properties'));
      }
      $defineProperty = ObjectClass::$classMethods['defineProperty'];
      foreach ($items->data as $key => $value) {
        $dscr = isset($items->dscr[$key]) ? $items->dscr[$key] : null;
        if (!$dscr || $dscr->enumerable) {
          $defineProperty($obj, $key, $value);
        }
      }
    },
  'getPrototypeOf' => function() {
      throw new Ex(Err::create('Object.getPrototypeOf not implemented'));
    },
  'setPrototypeOf' => function() {
      throw new Ex(Err::create('Object.getPrototypeOf not implemented'));
    },
  'preventExtensions' => function() {
    },
  'isExtensible' => function() {
      return false;
    },
  'seal' => function() {
    },
  'isSealed' => function() {
      return false;
    },
  'freeze' => function() {
    },
  'isFrozen' => function() {
      return false;
    }
);
ObjectClass::$protoMethods = array(
  'hasOwnProperty' => function($key) {
      $self = Func::getContext();
      return array_key_exists($key, $self->data);
    },
  'toString' => function() {
      $self = Func::getContext();
      if ($self === null) {
        $className = 'Undefined';
      } else if ($self === ObjectClass::$null) {
        $className = 'Null';
      } else {
        $obj = objectify($self);
        $className = $obj->className;
      }
      return '[object ' . $className . ']';
    },
  'valueOf' => function() {
      return Func::getContext();
    }
);
class NullClass {}
ObjectClass::$null = new NullClass();
ObjectClass::$protoObject = new ObjectClass();
ObjectClass::$protoObject->proto = ObjectClass::$null;
class Func extends ObjectClass {
  public $name = "";
  public $className = "Function";
  public $fn = null;
  public $meta = null;
  public $strict = false;
  public $callStackPosition = null;
  public $args = null;
  public $boundArgs = null;
  public $context = null;
  public $boundContext = null;
  public $arguments = null;
  public $instantiate = null;
  static $protoObject = null;
  static $classMethods = null;
  static $protoMethods = null;
  static $callStack = array();
  static $callStackLength = 0;
  function __construct() {
    parent::__construct();
    $this->proto = self::$protoObject;
    $args = func_get_args();
    if (gettype($args[0]) === 'string') {
      $this->name = array_shift($args);
    }
    $this->fn = array_shift($args);
    $this->meta = isset($args[0]) ? $args[0] : array();
    $this->strict = isset($this->meta['strict']);
    $prototype = new ObjectClass();
    $prototype->setProp('constructor', $this, true, false, true);
    $this->setProp('prototype', $prototype, true, false, true);
    $this->setProp('name', $this->name, false, false, false);
  }
  function construct() {
    if ($this->instantiate !== null) {
      $obj = call_user_func($this->instantiate);
    } else {
      $obj = new ObjectClass();
      $obj->proto = $this->get('prototype');
    }
    $result = $this->apply($obj, func_get_args());
    return is_primitive($result) ? $obj : $result;
  }
  function call($context = null) {
    return $this->apply($context, array_slice(func_get_args(), 1));
  }
  function apply($context, $args) {
    if ($this->boundContext !== null) {
      $context = $this->boundContext;
      if ($this->boundArgs) {
        $args = array_merge($this->boundArgs, $args);
      }
    }
    $this->args = $args;
    if (!$this->strict) {
      if ($context === null || $context === ObjectClass::$null) {
        $context = ObjectClass::$global;
      } else if (!($context instanceof ObjectClass)) {
        $context = objectify($context);
      }
    }
    $oldStackPosition = $this->callStackPosition;
    $oldArguments = $this->arguments;
    $oldContext = $this->context;
    $this->context = $context;
    $this->callStackPosition = self::$callStackLength;
    self::$callStack[self::$callStackLength++] = $this;
    $result = call_user_func_array($this->fn, $args);
    self::$callStack[--self::$callStackLength] = null;
    $this->callStackPosition = $oldStackPosition;
    $this->arguments = $oldArguments;
    $this->context = $oldContext;
    return $result;
  }
  function get_arguments() {
    $arguments = $this->arguments;
    if ($arguments === null && $this->callStackPosition !== null) {
      $arguments = $this->arguments = Args::create($this);
    }
    return $arguments;
  }
  function set_arguments($value) {
    return $value;
  }
  function get_caller() {
    $stackPosition = $this->callStackPosition;
    if ($stackPosition !== null && $stackPosition > 0) {
      return self::$callStack[$stackPosition - 1];
    } else {
      return null;
    }
  }
  function set_caller($value) {
    return $value;
  }
  function get_length() {
    $reflection = new ReflectionObject($this->fn);
    $method = $reflection->getMethod('__invoke');
    $arity = $method->getNumberOfParameters();
    if ($this->boundArgs) {
      $boundArgsLength = count($this->boundArgs);
      $arity = ($boundArgsLength >= $arity) ? 0 : $arity - $boundArgsLength;
    }
    return (float)$arity;
  }
  function set_length($value) {
    return $value;
  }
  function toJSON() {
    return null;
  }
  static function getCurrent() {
    return self::$callStack[self::$callStackLength - 1];
  }
  static function getContext() {
    $func = self::$callStack[self::$callStackLength - 1];
    return $func->context;
  }
  static function getArguments() {
    $func = self::$callStack[self::$callStackLength - 1];
    return $func->get_arguments();
  }
  static function getGlobalConstructor() {
    $Function = new Func(function($fn) {
      throw new Ex(Err::create('Cannot construct function at runtime.'));
    });
    $Function->set('prototype', Func::$protoObject);
    $Function->setMethods(Func::$classMethods, true, false, true);
    return $Function;
  }
}
class Args extends ObjectClass {
  public $args = null;
  public $length = 0;
  public $callee = null;
  static $protoObject = null;
  static $classMethods = null;
  static $protoMethods = null;
  function toArray() {
    return array_slice($this->args, 0);
  }
  function get_callee() {
    return $this->callee;
  }
  function set_callee($value) {
    return $value;
  }
  function get_caller() {
    return $this->callee->get_caller();
  }
  function set_caller($value) {
    return $value;
  }
  function get_length() {
    return (float)$this->length;
  }
  function set_length($value) {
    return $value;
  }
  static function create($callee) {
    $self = new Args();
    foreach ($callee->args as $i => $arg) {
      $self->set($i, $arg);
      $self->length += 1;
    }
    $self->args = $callee->args;
    $self->callee = $callee;
    return $self;
  }
}
Func::$classMethods = array();
Func::$protoMethods = array(
  'bind' => function($context) {
      $self = Func::getContext();
      $fn = new Func($self->name, $self->fn, $self->meta);
      $fn->boundContext = $context;
      $args = array_slice(func_get_args(), 1);
      if (!empty($args)) {
        $fn->boundArgs = $args;
      }
      return $fn;
    },
  'call' => function() {
      $self = Func::getContext();
      $args = func_get_args();
      return $self->apply($args[0], array_slice($args, 1));
    },
  'apply' => function($context, $args = null) {
      $self = Func::getContext();
      if ($args === null) {
        $args = array();
      } else
      if ($args instanceof Args || $args instanceof Arr) {
        $args = $args->toArray();
      } else {
        throw new Ex(Err::create('Function.prototype.apply: Arguments list has wrong type'));
      }
      return $self->apply($context, $args);
    },
  'toString' => function() {
      $self = Func::getContext();
      $source = array_key_exists('source_', $GLOBALS) ? $GLOBALS['source_'] : null;
      if ($source) {
        $meta = $self->meta;
        if (isset($meta['id']) && isset($source[$meta['id']])) {
          $source = $source[$meta['id']];
          return substr($source, $meta['start'], $meta['end'] - $meta['start'] + 1);
        }
      }
      return 'function ' . $self->name . '() { [native code] }';
    }
);
Func::$protoObject = new ObjectClass();
Func::$protoObject->setMethods(Func::$protoMethods, true, false, true);
ObjectClass::$protoObject->setMethods(ObjectClass::$protoMethods, true, false, true);
class GlobalObject extends ObjectClass {
  public $className = "global";
  static $immutable = array('Array' => 1, 'Boolean' => 1, 'Buffer' => 1, 'Date' => 1, 'Error' => 1, 'RangeError' => 1, 'ReferenceError' => 1, 'SyntaxError' => 1, 'TypeError' => 1, 'Function' => 1, 'Infinity' => 1, 'JSON' => 1, 'Math' => 1, 'NaN' => 1, 'Number' => 1, 'Object' => 1, 'RegExp' => 1, 'String' => 1, 'console' => 1, 'decodeURI' => 1, 'decodeURIComponent' => 1, 'encodeURI' => 1, 'encodeURIComponent' => 1, 'escape' => 1, 'eval' => 1, 'isFinite' => 1, 'isNaN' => 1, 'parseFloat' => 1, 'parseInt' => 1, 'undefined' => 1, 'unescape' => 1);
  static $OLD_GLOBALS = null;
  static $SUPER_GLOBALS = array('GLOBALS' => 1, '_SERVER' => 1, '_GET' => 1, '_POST' => 1, '_FILES' => 1, '_COOKIE' => 1, '_SESSION' => 1, '_REQUEST' => 1, '_ENV' => 1);
  static $protoObject = null;
  static $classMethods = null;
  function set($key, $value) {
    if (array_key_exists($key, self::$immutable)) {
      return $value;
    }
    $key = self::encodeVar($key);
    return ($GLOBALS[$key] = $value);
  }
  function get($key) {
    $key = self::encodeVar($key);
    $value = array_key_exists($key, $GLOBALS) ? $GLOBALS[$key] : null;
    return $value;
  }
  function remove($key) {
    if (array_key_exists($key, self::$immutable)) {
      return false;
    }
    $key = self::encodeVar($key);
    if (array_key_exists($key, $GLOBALS)) {
      unset($GLOBALS[$key]);
    }
    return true;
  }
  function hasOwnProperty($key) {
    $key = self::encodeVar($key);
    return array_key_exists($key, $GLOBALS);
  }
  function hasProperty($key) {
    $key = self::encodeVar($key);
    if (array_key_exists($key, $GLOBALS)) {
      return true;
    }
    $proto = $this->proto;
    if ($proto instanceof ObjectClass) {
      return $proto->hasProperty($key);
    }
    return false;
  }
  function getOwnKeys($onlyEnumerable) {
    $arr = array();
    foreach ($GLOBALS as $key => $value) {
      if (!array_key_exists($key, self::$SUPER_GLOBALS)) {
        $arr[] = self::decodeVar($key);
      }
    }
    return $arr;
  }
  function getKeys(&$arr = array()) {
    foreach ($GLOBALS as $key => $value) {
      if (!array_key_exists($key, self::$SUPER_GLOBALS)) {
        $arr[] = self::decodeVar($key);
      }
    }
    $proto = $this->proto;
    if ($proto instanceof ObjectClass) {
      $proto->getKeys($arr);
    }
    return $arr;
  }
  static function encodeVar($str) {
    if (array_key_exists($str, self::$SUPER_GLOBALS)) {
      return $str . '_';
    }
    $str = preg_replace('/_$/', '__', $str);
    $str = preg_replace_callback('/[^a-zA-Z0-9_]/', 'self::encodeChar', $str);
    return $str;
  }
  static function encodeChar($matches) {
    return '«' . bin2hex($matches[0]) . '»';
  }
  static function decodeVar($str) {
    $len = strlen($str);
    if ($str[$len - 1] === '_') {
      $name = substr($str, 0, $len - 1);
      if (array_key_exists($name, self::$SUPER_GLOBALS)) {
        return $name;
      }
    }
    $str = preg_replace('/__$/', '_', $str);
    $str = preg_replace_callback('/«([a-z0-9]+)»/', 'self::decodeChar', $str);
    return $str;
  }
  static function decodeChar($matches) {
    return pack('H*', $matches[1]);
  }
  static function unsetGlobals() {
    self::$OLD_GLOBALS = array();
    foreach ($GLOBALS as $key => $value) {
      if (!array_key_exists($key, self::$SUPER_GLOBALS)) {
        self::$OLD_GLOBALS[$key] = $value;
        unset($GLOBALS[$key]);
      }
    }
  }
}
GlobalObject::unsetGlobals();
ObjectClass::$global = new GlobalObject();
class Arr extends ObjectClass {
  public $className = "Array";
  public $length = 0;
  static $protoObject = null;
  static $classMethods = null;
  static $protoMethods = null;
  static $empty = null;
  function __construct() {
    parent::__construct();
    $this->proto = self::$protoObject;
    $this->setProp('length', null, true, false, false);
    if (func_num_args() > 0) {
      $this->init(func_get_args());
    } else {
      $this->length = 0;
    }
  }
  function init($arr) {
    $len = 0;
    foreach ($arr as $i => $item) {
      if ($item !== Arr::$empty) {
        $this->set($i, $item);
      }
      $len += 1;
    }
    $this->length = $len;
  }
  function push($value) {
    $i = $this->length;
    foreach (func_get_args() as $value) {
      $this->set($i, $value);
      $i += 1;
    }
    return ($this->length = $i);
  }
  function shift() {
    $el = $this->get(0);
    $this->shiftElementsBackward(1);
    return $el;
  }
  function unshift($value) {
    $num = func_num_args();
    $this->shiftElementsForward($num);
    foreach (func_get_args() as $i => $value) {
      $this->set($i, $value);
    }
    return $this->length;
  }
  function shiftElementsBackward($num, $startIndex = null) {
    if ($startIndex === null) {
      $startIndex = $num;
    }
    $len = $this->length;
    for ($pos = $startIndex; $pos < $len; $pos++) {
      $newPos = $pos - $num;
      if (array_key_exists($pos, $this->data)) {
        $this->data[$newPos] = $this->data[$pos];
      } else if (array_key_exists($newPos, $this->data)) {
        unset($this->data[$newPos]);
      }
      if (array_key_exists($pos, $this->dscr)) {
        $this->dscr[$newPos] = $this->dscr[$pos];
      } else if (array_key_exists($newPos, $this->dscr)) {
        unset($this->dscr[$newPos]);
      }
    }
    for ($pos = $len - $num; $pos < $len; $pos++) {
      unset($this->data[$pos]);
      unset($this->dscr[$pos]);
    }
    $this->length = $len - $num;
  }
  function shiftElementsForward($num, $startIndex = 0) {
    $pos = $this->length;
    while (($pos--) > $startIndex) {
      $newPos = $pos + $num;
      if (array_key_exists($pos, $this->data)) {
        $this->data[$newPos] = $this->data[$pos];
        unset($this->data[$pos]);
      } else if (array_key_exists($newPos, $this->data)) {
        unset($this->data[$newPos]);
      }
      if (array_key_exists($pos, $this->dscr)) {
        $this->dscr[$newPos] = $this->dscr[$pos];
        unset($this->dscr[$pos]);
      } else if (array_key_exists($newPos, $this->dscr)) {
        unset($this->dscr[$newPos]);
      }
    }
    $this->length += $num;
  }
  static function checkInt($s) {
    if (is_int($s) && $s >= 0) return $s;
    $s = to_string($s);
    return ((string)(int)$s === $s) ? (int)$s : null;
  }
  function set($key, $value) {
    $i = self::checkInt($key);
    if ($i !== null && $i >= $this->length) {
      $this->length = $i + 1;
    }
    return parent::set($key, $value);
  }
  function get_length() {
    return (float)$this->length;
  }
  function set_length($len) {
    $len = self::checkInt($len);
    if ($len === null) {
      throw new Ex(Err::create('Invalid array length'));
    }
    $oldLen = $this->length;
    if ($oldLen > $len) {
      for ($i = $len; $i < $oldLen; $i++) {
        $this->remove($i);
      }
    }
    $this->length = $len;
    return (float)$len;
  }
  function toArray() {
    $results = array();
    $len = $this->length;
    for ($i = 0; $i < $len; $i++) {
      $results[] = $this->get($i);
    }
    return $results;
  }
  static function fromArray($nativeArray) {
    $arr = new Arr();
    $arr->init($nativeArray);
    return $arr;
  }
  static function getGlobalConstructor() {
    $Array = new Func(function($value = null) {
      $arr = new Arr();
      $len = func_num_args();
      if ($len === 1 && is_int_or_float($value)) {
        $arr->length = (int)$value;
      } else if ($len > 0) {
        $arr->init(func_get_args());
      }
      return $arr;
    });
    $Array->set('prototype', Arr::$protoObject);
    $Array->setMethods(Arr::$classMethods, true, false, true);
    return $Array;
  }
}
Arr::$classMethods = array(
  'isArray' => function($arr) {
      return ($arr instanceof Arr);
    }
);
Arr::$protoMethods = array(
  'push' => function($value) {
      $self = Func::getContext();
      $length = call_user_func_array(array($self, 'push'), func_get_args());
      return (float)$length;
    },
  'pop' => function() {
      $self = Func::getContext();
      $i = $self->length - 1;
      $result = $self->get($i);
      $self->remove($i);
      $self->length = $i;
      return $result;
    },
  'unshift' => function($value) {
      $self = Func::getContext();
      $length = call_user_func_array(array($self, 'unshift'), func_get_args());
      return (float)$length;
    },
  'shift' => function() {
      $self = Func::getContext();
      return $self->shift();
    },
  'join' => function($str = ',') {
      $results = array();
      $self = Func::getContext();
      $len = $self->length;
      for ($i = 0; $i < $len; $i++) {
        $value = $self->get($i);
        $results[] = ($value === null || $value === ObjectClass::$null) ? '' : to_string($value);
      }
      return join(to_string($str), $results);
    },
  'indexOf' => function($value) {
      $self = Func::getContext();
      $len = $self->length;
      for ($i = 0; $i < $len; $i++) {
        if ($self->get($i) === $value) return (float)$i;
      }
      return -1.0;
    },
  'lastIndexOf' => function($value) {
      $self = Func::getContext();
      $i = $self->length;
      while ($i--) {
        if ($self->get($i) === $value) return (float)$i;
      }
      return -1.0;
    },
  'slice' => function($start = 0, $end = null) {
      $self = Func::getContext();
      $len = $self->length;
      if ($len === 0) {
        return new Arr();
      }
      $start = (int)$start;
      if ($start < 0) {
        $start = $len + $start;
        if ($start < 0) $start = 0;
      }
      if ($start >= $len) {
        return new Arr();
      }
      $end = ($end === null) ? $len : (int)$end;
      if ($end < 0) {
        $end = $len + $end;
      }
      if ($end < $start) {
        $end = $start;
      }
      if ($end > $len) {
        $end = $len;
      }
      $result = new Arr();
      for ($i = $start; $i < $end; $i++) {
        $value = $self->get($i);
        $result->push($value);
      }
      return $result;
    },
  'forEach' => function($fn, $context = null) {
      $self = Func::getContext();
      $len = $self->length;
      for ($i = 0; $i < $len; $i++) {
        if ($self->hasOwnProperty($i)) {
          $fn->call($context, $self->get($i), (float)$i, $self);
        }
      }
    },
  'map' => function($fn, $context = null) {
      $self = Func::getContext();
      $results = new Arr();
      $len = $results->length = $self->length;
      for ($i = 0; $i < $len; $i++) {
        if ($self->hasOwnProperty($i)) {
          $result = $fn->call($context, $self->get($i), (float)$i, $self);
          $results->set($i, $result);
        }
      }
      return $results;
    },
  'filter' => function($fn, $context = null) {
      $self = Func::getContext();
      $results = new Arr();
      $len = $self->length;
      for ($i = 0; $i < $len; $i++) {
        if ($self->hasOwnProperty($i)) {
          $item = $self->get($i);
          $result = $fn->call($context, $item, (float)$i, $self);
          if (is($result)) {
            $results->push($item);
          }
        }
      }
      return $results;
    },
  'sort' => function($fn = null) {
      $self = Func::getContext();
      if ($fn instanceof Func) {
        $results = $self->toArray();
        $comparator = function($a, $b) use (&$fn) {
          return $fn->call(null, $a, $b);
        };
        uasort($results, $comparator);
      } else {
        $results = array();
        $len = $self->length;
        for ($i = 0; $i < $len; $i++) {
          $results[$i] = to_string($self->get($i));
        }
        asort($results, SORT_STRING);
      }
      $i = 0;
      $temp = array();
      foreach ($results as $index => $str) {
        $temp[$i] = $self->data[$index];
        $i += 1;
      }
      foreach ($temp as $i => $prop) {
        $self->data[$i] = $prop;
      }
      return $self;
    },
  'concat' => function() {
      $self = Func::getContext();
      $items = $self->toArray();
      foreach (func_get_args() as $item) {
        if ($item instanceof Arr) {
          foreach ($item->toArray() as $subitem) {
            $items[] = $subitem;
          }
        } else {
          $items[] = $item;
        }
      }
      $arr = new Arr();
      $arr->init($items);
      return $arr;
    },
  'splice' => function($offset, $deleteCount) {
      $offset = (int)$offset;
      $deleteCount = (int)$deleteCount;
      $elements = array_slice(func_get_args(), 2);
      $self = Func::getContext();
      $data = &$self->data;
      unset($data['length']);
      $isSimpleArray = false;
      $len = $self->length;
      if (count($data) === $len) {
        $isSimpleArray = true;
        for ($i = 0; $i < $len; $i++) {
          if (!array_key_exists($i, $data) || array_key_exists($i, $self->dscr)) {
            $isSimpleArray = false;
            break;
          }
        }
      }
      if ($isSimpleArray) {
        array_splice($data, $offset, $deleteCount, $elements);
        $newLength = count($data);
      } else {
        $addCount = count($elements);
        $countChange = $addCount - $deleteCount;
        $nextOffset = $offset + $deleteCount;
        if ($countChange < 0) {
          $self->shiftElementsBackward(abs($countChange), $nextOffset);
        } else if ($countChange > 0) {
          $self->shiftElementsForward($countChange, $nextOffset);
        }
        foreach ($elements as $i => $el) {
          $data[$offset + $i] = $el;
          unset($self->dscr[$offset + $i]);
        }
        $newLength = $len + $countChange;
      }
      $data['length'] = null;
      $self->length = $newLength;
    },
  'reverse' => function() {
      $self = Func::getContext();
      $data = &$self->data;
      $newData = array();
      $dscr = &$self->dscr;
      $newDscr = array();
      $len = $self->length;
      for ($i = 0; $i < $len; $i++) {
        if (array_key_exists($i, $data)) {
          $newData[$len - $i - 1] = $data[$i];
          unset($data[$i]);
        }
        if (array_key_exists($i, $dscr)) {
          $newDscr[$len - $i - 1] = $dscr[$i];
        }
      }
      foreach ($data as $name => $value) {
        $newData[$name] = $value;
        if (array_key_exists($name, $dscr)) {
          $newDscr[$name] = $dscr[$name];
        }
      }
      $self->data = &$newData;
      $self->dscr = &$newDscr;
    },
  'some' => function($fn, $context = null) {
      $self = Func::getContext();
      $len = $self->length;
      for ($i = 0; $i < $len; $i++) {
        if ($self->hasOwnProperty($i)) {
          $item = $self->get($i);
          $result = $fn->call($context, $item, (float)$i, $self);
          if (is($result)) {
            return true;
          }
        }
      }
      return false;
    },
  'every' => function($fn, $context = null) {
      $self = Func::getContext();
      $len = $self->length;
      for ($i = 0; $i < $len; $i++) {
        if ($self->hasOwnProperty($i)) {
          $item = $self->get($i);
          $result = $fn->call($context, $item, (float)$i, $self);
          if (!is($result)) {
            return false;
          }
        }
      }
      return true;
    },
  'reduce' => function($fn, $initValue = null) {
      $self = Func::getContext();
      $value = $initValue;
      $len = $self->length;
      for ($i = 0; $i < $len; $i++) {
        if ($self->hasOwnProperty($i)) {
          $item = $self->get($i);
          $value = $fn->call(null, $value, $item, (float)$i, $self);
        }
      }
      return $value;
    },
  'reduceRight' => function($fn, $initValue = null) {
      $self = Func::getContext();
      $value = $initValue;
      $len = $self->length;
      for ($i = $len - 1; $i >= 0; $i--) {
        if ($self->hasOwnProperty($i)) {
          $item = $self->get($i);
          $value = $fn->call(null, $value, $item, (float)$i, $self);
        }
      }
      return $value;
    },
  'toString' => function() {
      $self = Func::getContext();
      return $self->callMethod('join');
    },
  'toLocaleString' => function() {
      $self = Func::getContext();
      return $self->callMethod('join');
    }
);
Arr::$protoObject = new ObjectClass();
Arr::$protoObject->setMethods(Arr::$protoMethods, true, false, true);
Arr::$empty = new \StdClass();
class Date extends ObjectClass {
  public $className = "Date";
  public $date = null;
  public $value = null;
  static $LOCAL_TZ = null;
  static $protoObject = null;
  static $classMethods = null;
  static $protoMethods = null;
  function __construct() {
    parent::__construct();
    $this->proto = Date::$protoObject;
    if (func_num_args() > 0) {
      $this->init(func_get_args());
    }
  }
  function init($arr) {
    $len = count($arr);
    if ($len === 1 && is_string($arr[0])) {
      $this->_initFromString($arr[0]);
    } else {
      $this->_initFromParts($arr);
    }
  }
  function _initFromString($str) {
    $a = Date::parse($str);
    if (!$a) {
        $a = array(
            'year' => 1970,
            'month' => 1,
            'day' => 1,
            'hour' => 0,
            'minute' => 0,
            'second' => 0,
            'ms' => 0,
            'isLocal' => false
        );
    }
    if ($a['isLocal']) {
      $arr = array($a['year'], $a['month'] - 1, $a['day'], $a['hour'], $a['minute'], $a['second'], $a['ms']);
      $this->_initFromParts($arr);
    } else {
      $date = Date::create('UTC');
      $date->setDate($a['year'], $a['month'], $a['day']);
      $date->setTime($a['hour'], $a['minute'], $a['second']);
      $ms = $date->getTimestamp() * 1000 + $a['ms'];
      $this->date = Date::fromMilliseconds($ms);
      $this->value = $ms;
    }
  }
  function _initFromParts($arr, $tz = null) {
    $len = count($arr);
    if ($len > 1) {
      $arr = array_pad($arr, 7, 0);
      $date = Date::create($tz);
      $date->setDate($arr[0], $arr[1] + 1, $arr[2]);
      $date->setTime($arr[3], $arr[4], $arr[5]);
      $this->date = $date;
      $this->value = (int)($date->getTimestamp() * 1000 + $arr[6]);
    } else {
      $ms = ($len === 1) ? (int)$arr[0] : (int)Date::now();
      $this->date = Date::fromMilliseconds($ms);
      $this->value = $ms;
    }
  }
  function toJSON() {
    $date = Date::fromMilliseconds($this->value, 'UTC');
    $str = $date->format('Y-m-d\TH:i:s');
    $ms = $this->value % 1000;
    if ($ms < 0) $ms = 1000 + $ms;
    if ($ms < 0) $ms = 0;
    return $str . '.' . substr('00' . $ms, -3) . 'Z';
  }
  static function now() {
    return floor(microtime(true) * 1000);
  }
  static function create($tz = null) {
    if ($tz === null) {
      return new DateTime('now', new DateTimeZone(Date::$LOCAL_TZ));
    } else {
      return new DateTime('now', new DateTimeZone($tz));
    }
  }
  static function fromMilliseconds($ms, $tz = null) {
    $date = Date::create($tz);
    $seconds = floor($ms / 1000);
    $date->setTimestamp($seconds);
    return $date;
  }
  static function parse($str) {
    $str = to_string($str);
    $a = date_parse($str);
    if ($a['error_count'] > 0 || $a['warning_count'] > 0) {
      return null;
    }
    $hasTime = ($a['hour'] !== false || $a['minute'] !== false || $a['second'] !== false);
    $tz = array_key_exists('tz_abbr', $a) ? $a['tz_abbr'] : null;
    if ($tz === 'Z' || $tz === 'GMT') {
      $tz = 'UTC';
    }
    $isLocal = ($tz === null && $hasTime === true);
    return array(
      'year' => $a['year'] ?: 1970,
      'month' => $a['month'] ?: 1,
      'day' => $a['day'] ?: 1,
      'hour' => $a['hour'] ?: 0,
      'minute' => $a['minute'] ?: 0,
      'second' => $a['second'] ?: 0,
      'ms' => (int)($a['fraction'] * 1000),
      'timezone' => $tz,
      'isLocal' => $isLocal
    );
  }
  static function getGlobalConstructor() {
    $Date = new Func(function() {
      $date = new Date();
      $date->init(func_get_args());
      return $date;
    });
    $Date->set('prototype', Date::$protoObject);
    $Date->setMethods(Date::$classMethods, true, false, true);
    return $Date;
  }
}
Date::$classMethods = array(
  'now' => function() {
      return Date::now();
    },
  'parse' => function($str) {
      $date = new Date($str);
      return (float)$date->value;
    },
  'UTC' => function() {
      $date = new Date();
      $date->_initFromParts(func_get_args(), 'UTC');
      return (float)$date->value;
    }
);
Date::$protoMethods = array(
  'valueOf' => function() {
      $self = Func::getContext();
      return (float)$self->value;
    },
  'toString' => function() {
      $self = Func::getContext();
      return str_replace('~', 'GMT', $self->date->format('D M d Y H:i:s ~O (T)'));
    },
  'toLocaleString' => function() {
      $self = Func::getContext();
      return str_replace('~', 'GMT', $self->date->format('n/j/Y, g:i:s A'));
    },
  'toJSON' => function() {
      $self = Func::getContext();
      return $self->toJSON();
    },
  'toISOString' => function() {
      $self = Func::getContext();
      return $self->toJSON();
    },
  'toUTCString' => function() {
      $self = Func::getContext();
      $date = Date::fromMilliseconds($self->value, 'UTC');
      return $date->format('D, d M Y H:i:s') . ' GMT';
    },
  'toGMTString' => function() {
      $self = Func::getContext();
      $date = Date::fromMilliseconds($self->value, 'UTC');
      return $date->format('D, d M Y H:i:s') . ' GMT';
    },
  'toDateString' => function() {
      throw new Ex(Err::create('date.toDateString not implemented'));
    },
  'toLocaleDateString' => function() {
      throw new Ex(Err::create('date.toLocaleDateString not implemented'));
    },
  'toTimeString' => function() {
      throw new Ex(Err::create('date.toTimeString not implemented'));
    },
  'toLocaleTimeString' => function() {
      throw new Ex(Err::create('date.toLocaleTimeString not implemented'));
    },
  'getDate' => function() {
      throw new Ex(Err::create('date.getDate not implemented'));
    },
  'getDay' => function() {
      throw new Ex(Err::create('date.getDay not implemented'));
    },
  'getFullYear' => function() {
      throw new Ex(Err::create('date.getFullYear not implemented'));
    },
  'getHours' => function() {
      throw new Ex(Err::create('date.getHours not implemented'));
    },
  'getMilliseconds' => function() {
      throw new Ex(Err::create('date.getMilliseconds not implemented'));
    },
  'getMinutes' => function() {
      throw new Ex(Err::create('date.getMinutes not implemented'));
    },
  'getMonth' => function() {
      throw new Ex(Err::create('date.getMonth not implemented'));
    },
  'getSeconds' => function() {
      throw new Ex(Err::create('date.getSeconds not implemented'));
    },
  'getUTCDate' => function() {
      throw new Ex(Err::create('date.getUTCDate not implemented'));
    },
  'getUTCDay' => function() {
      throw new Ex(Err::create('date.getUTCDay not implemented'));
    },
  'getUTCFullYear' => function() {
      throw new Ex(Err::create('date.getUTCFullYear not implemented'));
    },
  'getUTCHours' => function() {
      throw new Ex(Err::create('date.getUTCHours not implemented'));
    },
  'getUTCMilliseconds' => function() {
      throw new Ex(Err::create('date.getUTCMilliseconds not implemented'));
    },
  'getUTCMinutes' => function() {
      throw new Ex(Err::create('date.getUTCMinutes not implemented'));
    },
  'getUTCMonth' => function() {
      throw new Ex(Err::create('date.getUTCMonth not implemented'));
    },
  'getUTCSeconds' => function() {
      throw new Ex(Err::create('date.getUTCSeconds not implemented'));
    },
  'setDate' => function() {
      throw new Ex(Err::create('date.setDate not implemented'));
    },
  'setFullYear' => function() {
      throw new Ex(Err::create('date.setFullYear not implemented'));
    },
  'setHours' => function() {
      throw new Ex(Err::create('date.setHours not implemented'));
    },
  'setMilliseconds' => function() {
      throw new Ex(Err::create('date.setMilliseconds not implemented'));
    },
  'setMinutes' => function() {
      throw new Ex(Err::create('date.setMinutes not implemented'));
    },
  'setMonth' => function() {
      throw new Ex(Err::create('date.setMonth not implemented'));
    },
  'setSeconds' => function() {
      throw new Ex(Err::create('date.setSeconds not implemented'));
    },
  'setUTCDate' => function() {
      throw new Ex(Err::create('date.setUTCDate not implemented'));
    },
  'setUTCFullYear' => function() {
      throw new Ex(Err::create('date.setUTCFullYear not implemented'));
    },
  'setUTCHours' => function() {
      throw new Ex(Err::create('date.setUTCHours not implemented'));
    },
  'setUTCMilliseconds' => function() {
      throw new Ex(Err::create('date.setUTCMilliseconds not implemented'));
    },
  'setUTCMinutes' => function() {
      throw new Ex(Err::create('date.setUTCMinutes not implemented'));
    },
  'setUTCMonth' => function() {
      throw new Ex(Err::create('date.setUTCMonth not implemented'));
    },
  'setUTCSeconds' => function() {
      throw new Ex(Err::create('date.setUTCSeconds not implemented'));
    },
  'getTimezoneOffset' => function() {
      throw new Ex(Err::create('date.getTimezoneOffset not implemented'));
    },
  'getTime' => function() {
      throw new Ex(Err::create('date.getTime not implemented'));
    },
  'getYear' => function() {
      throw new Ex(Err::create('date.getYear not implemented'));
    },
  'setTime' => function() {
      throw new Ex(Err::create('date.setTime not implemented'));
    },
  'setYear' => function() {
      throw new Ex(Err::create('date.setYear not implemented'));
    }
);
Date::$protoObject = new ObjectClass();
Date::$protoObject->setMethods(Date::$protoMethods, true, false, true);
Date::$LOCAL_TZ = getenv('LOCAL_TZ');
if (Date::$LOCAL_TZ === false && defined('LOCAL_TZ')) {
  Date::$LOCAL_TZ = constant('LOCAL_TZ');
}
if (Date::$LOCAL_TZ === false) {
  Date::$LOCAL_TZ = 'UTC';
}
class RegExp extends ObjectClass {
  public $className = "RegExp";
  public $source = '';
  public $ignoreCaseFlag = false;
  public $globalFlag = false;
  public $multilineFlag = false;
  static $protoObject = null;
  static $classMethods = null;
  static $protoMethods = null;
  function __construct() {
    parent::__construct();
    $this->proto = self::$protoObject;
    $args = func_get_args();
    if (count($args) > 0) {
      $this->init($args);
    }
  }
  function init($args) {
    $this->source = ($args[0] === null) ? '(?:)' : to_string($args[0]);
    $flags = array_key_exists('1', $args) ? to_string($args[1]) : '';
    $this->ignoreCaseFlag = (strpos($flags, 'i') !== false);
    $this->globalFlag = (strpos($flags, 'g') !== false);
    $this->multilineFlag = (strpos($flags, 'm') !== false);
  }
  function get_source() {
    return $this->source;
  }
  function set_source($value) {
    return $value;
  }
  function get_ignoreCase() {
    return $this->ignoreCaseFlag;
  }
  function set_ignoreCase($value) {
    return $value;
  }
  function get_global() {
    return $this->globalFlag;
  }
  function set_global($value) {
    return $value;
  }
  function get_multiline() {
    return $this->multilineFlag;
  }
  function set_multiline($value) {
    return $value;
  }
  function toString($pcre = true) {
    $source = $this->source;
    $flags = '';
    if ($this->ignoreCaseFlag) {
      $flags .= 'i';
    }
    if (!$pcre && $this->globalFlag) {
      $flags .= 'g';
    }
    if ($pcre) {
      $flags .= 'u';
    }
    if ($this->multilineFlag) {
      $flags .= 'm';
    }
    return '/' . str_replace('/', '\\/', $source) . '/' . $flags;
  }
  static function toReplacementString($str) {
    $str = str_replace('\\', '\\\\', $str);
    $str = str_replace('$&', '$0', $str);
    return $str;
  }
  static function getGlobalConstructor() {
    $RegExp = new Func(function() {
      $reg = new RegExp();
      $reg->init(func_get_args());
      return $reg;
    });
    $RegExp->set('prototype', RegExp::$protoObject);
    $RegExp->setMethods(RegExp::$classMethods, true, false, true);
    return $RegExp;
  }
}
RegExp::$classMethods = array();
RegExp::$protoMethods = array(
  'exec' => function($str) {
      $self = Func::getContext();
      $str = to_string($str);
      $offset = 0;
      $result = preg_match($self->toString(true), $str, $matches, PREG_OFFSET_CAPTURE, $offset);
      if ($result === false) {
        throw new Ex(Err::create('Error executing Regular Expression: ' . $self->toString()));
      }
      if ($result === 0) {
        return ObjectClass::$null;
      }
      $index = $matches[0][1];
      $self->set('lastIndex', (float)($index + strlen($matches[0][0])));
      $arr = new Arr();
      foreach ($matches as $match) {
        $arr->push($match[0]);
      }
      $arr->set('index', (float)$index);
      $arr->set('input', $str);
      return $arr;
    },
  'test' => function($str) {
      $self = Func::getContext();
      $result = preg_match($self->toString(true), to_string($str));
      return ($result !== false);
    },
  'toString' => function() {
      $self = Func::getContext();
      return $self->toString(false);
    }
);
RegExp::$protoObject = new ObjectClass();
RegExp::$protoObject->setMethods(RegExp::$protoMethods, true, false, true);
class Str extends ObjectClass {
  public $className = "String";
  public $value = null;
  static $protoObject = null;
  static $classMethods = null;
  static $protoMethods = null;
  function __construct($str = null) {
    parent::__construct();
    $this->proto = self::$protoObject;
    if (func_num_args() === 1) {
      $this->value = $str;
      $this->length = mb_strlen($str);
    }
  }
  function get_length() {
    return (float)$this->length;
  }
  function set_length($len) {
    return $len;
  }
  function get($key) {
    if (is_float($key)) {
      if ((float)(int)$key === $key && $key >= 0) {
        return $this->callMethod('charAt', $key);
      }
    }
    return parent::get($key);
  }
  static function getGlobalConstructor() {
    $String = new Func(function($value = '') {
      $self = Func::getContext();
      if ($self instanceof Str) {
        $self->value = to_string($value);
        return $self;
      } else {
        return to_string($value);
      }
    });
    $String->instantiate = function() {
      return new Str();
    };
    $String->set('prototype', Str::$protoObject);
    $String->setMethods(Str::$classMethods, true, false, true);
    return $String;
  }
}
Str::$classMethods = array(
  'fromCharCode' => function($code) {
      return chr($code);
    }
);
Str::$protoMethods = array(
  'charAt' => function($i) {
      $self = Func::getContext();
      $ch = mb_substr($self->value, $i, 1);
      return ($ch === false) ? '' : $ch;
    },
  'charCodeAt' => function($i) {
      $self = Func::getContext();
      $ch = mb_substr($self->value, $i, 1);
      if ($ch === false) return NAN;
      $len = strlen($ch);
      if ($len === 1) {
        $code = ord($ch[0]);
      } else {
        $ch = mb_convert_encoding($ch, 'UCS-2LE', 'UTF-8');
        $code = ord($ch[1]) * 256 + ord($ch[0]);
      }
      return (float)$code;
    },
  'indexOf' => function($search, $offset = 0) {
      $self = Func::getContext();
      $index = mb_strpos($self->value, $search, $offset);
      return ($index === false) ? -1.0 : (float)$index;
    },
  'lastIndexOf' => function($search, $offset = null) {
      $self = Func::getContext();
      $str = $self->value;
      if ($offset !== null) {
        $offset = to_number($offset);
        if ($offset > 0 && $offset < $self->length) {
          $str = mb_substr($str, 0, $offset + 1);
        }
      }
      $index = mb_strrpos($str, $search);
      return ($index === false) ? -1.0 : (float)$index;
    },
  'split' => function($delim) {
      $self = Func::getContext();
      $str = $self->value;
      if ($delim instanceof RegExp) {
        $arr = preg_split($delim->toString(true), $str);
      } else {
        $delim = to_string($delim);
        if ($delim === '') {
          $len = mb_strlen($str);
          $arr = array();
          for ($i = 0; $i < $len; $i++) {
            $arr[] = mb_substr($str, $i, 1);
          }
        } else {
          $arr = explode($delim, $str);
        }
      }
      return Arr::fromArray($arr);
    },
  'substr' => function($start, $num = null) {
      $self = Func::getContext();
      $len = $self->length;
      if ($len === 0) {
        return '';
      }
      $start = (int)$start;
      if ($start < 0) {
        $start = $len + $start;
        if ($start < 0) $start = 0;
      }
      if ($start >= $len) {
        return '';
      }
      if ($num === null) {
        return mb_substr($self->value, $start);
      } else {
        return mb_substr($self->value, $start, $num);
      }
    },
  'substring' => function($start, $end = null) {
      $self = Func::getContext();
      $len = $self->length;
      if (func_num_args() === 1) {
        $end = $len;
      }
      $start = (int)$start;
      $end = (int)$end;
      if ($start < 0) $start = 0;
      if ($start > $len) $start = $len;
      if ($end < 0) $end = 0;
      if ($end > $len) $end = $len;
      if ($start === $end) {
        return '';
      }
      if ($end < $start) {
        list($start, $end) = array($end, $start);
      }
      return mb_substr($self->value, $start, $end - $start);
    },
  'slice' => function($start, $end = null) {
      $self = Func::getContext();
      $len = $self->length;
      if ($len === 0) {
        return '';
      }
      $start = (int)$start;
      if ($start < 0) {
        $start = $len + $start;
        if ($start < 0) $start = 0;
      }
      if ($start >= $len) {
        return '';
      }
      $end = ($end === null) ? $len : (int)$end;
      if ($end < 0) {
        $end = $len + $end;
      }
      if ($end < $start) {
        $end = $start;
      }
      if ($end > $len) {
        $end = $len;
      }
      return mb_substr($self->value, $start, $end - $start);
    },
  'trim' => function() {
      $self = Func::getContext();
      return preg_replace('/^[\s\x0B\xA0]+|[\s\x0B\​xA0]+$/u', '', $self->value);
    },
  'match' => function($regex) use (&$RegExp) {
      $self = Func::getContext();
      $str = $self->value;
      if (!($regex instanceof RegExp)) {
        $regex = $RegExp->construct($regex);
      }
      if (!$regex->globalFlag) {
        return $regex->callMethod('exec', $str);
      }
      $results = new Arr();
      $index = 0;
      $preg = $regex->toString(true);
      while (preg_match($preg, $str, $matches, PREG_OFFSET_CAPTURE, $index) === 1) {
        $foundAt = $matches[0][1];
        $foundStr = $matches[0][0];
        $index = $foundAt + strlen($foundStr);
        $results->push($foundStr);
      }
      return $results;
    },
  'replace' => function($search, $replace) {
      $self = Func::getContext();
      $str = $self->value;
      $isRegEx = ($search instanceof RegExp);
      $limit = ($isRegEx && $search->globalFlag) ? -1 : 1;
      $search = $isRegEx ? $search->toString(true) : to_string($search);
      if ($replace instanceof Func) {
        if ($isRegEx) {
          $count = 0;
          $offset = 0;
          $result = array();
          $success = null;
          while (
              ($limit === -1 || $count < $limit) &&
              ($success = preg_match($search, $str, $matches, PREG_OFFSET_CAPTURE, $offset))
            ) {
            $matchIndex = $matches[0][1];
            $args = array();
            foreach ($matches as $match) {
              $args[] = $match[0];
            }
            $result[] = substr($str, $offset, $matchIndex - $offset);
            $mbIndex = mb_strlen(substr($str, 0, $matchIndex));
            array_push($args, $mbIndex);
            array_push($args, $str);
            $result[] = to_string($replace->apply(null, $args));
            $offset = $matchIndex + strlen($args[0]);
            $count += 1;
          }
          if ($success === false) {
            throw new Ex(Err::create('String.prototype.replace() failed'));
          }
          $result[] = substr($str, $offset);
          return join('', $result);
        } else {
          $matchIndex = strpos($str, $search);
          if ($matchIndex === false) {
            return $str;
          }
          $before = substr($str, 0, $matchIndex);
          $after = substr($str, $matchIndex + strlen($search));
          $args = array($search, mb_strlen($before), $str);
          return $before . to_string($replace->apply(null, $args)) . $after;
        }
      }
      $replace = to_string($replace);
      if ($isRegEx) {
        $replace = RegExp::toReplacementString($replace);
        return preg_replace($search, $replace, $str, $limit);
      } else {
        $parts = explode($search, $str);
        $first = array_shift($parts);
        return $first . $replace . implode($search, $parts);
      }
    },
  'concat' => function() {
      $self = Func::getContext();
      $result = array($self->value);
      foreach (func_get_args() as $arg) {
        $result[] = to_string($arg);
      }
      return implode('', $result);
    },
  'search' => function($regex) use (&$RegExp) {
      $self = Func::getContext();
      if (!($regex instanceof RegExp)) {
        $regex = $RegExp->construct($regex);
      }
      $preg = $regex->toString(true);
      $success = preg_match($preg, $self->value, $matches, PREG_OFFSET_CAPTURE);
      if (!$success) {
        return -1;
      }
      $start = substr($self->value, 0, $matches[0][1]);
      $startLen = mb_strlen($start);
      return (float)$startLen;
    },
  'toLowerCase' => function() {
      $self = Func::getContext();
      return mb_strtolower($self->value);
    },
  'toLocaleLowerCase' => function() {
      $self = Func::getContext();
      return mb_strtolower($self->value);
    },
  'toUpperCase' => function() {
      $self = Func::getContext();
      return mb_strtoupper($self->value);
    },
  'toLocaleUpperCase' => function() {
      $self = Func::getContext();
      return mb_strtoupper($self->value);
    },
  'localeCompare' => function($compareTo) {
      $self = Func::getContext();
      return (float)strcmp($self->value, to_string($compareTo));
    },
  'valueOf' => function() {
      $self = Func::getContext();
      return $self->value;
    },
  'toString' => function() {
      $self = Func::getContext();
      return $self->value;
    }
);
Str::$protoObject = new ObjectClass();
Str::$protoObject->setMethods(Str::$protoMethods, true, false, true);
class Number extends ObjectClass {
  public $className = "Number";
  public $value = null;
  static $protoObject = null;
  static $classMethods = null;
  static $protoMethods = null;
  function __construct($value = null) {
    parent::__construct();
    $this->proto = self::$protoObject;
    if (func_num_args() === 1) {
      $this->value = (float)$value;
    }
  }
  static function getGlobalConstructor() {
    $Number = new Func(function($value = 0) {
      $self = Func::getContext();
      if ($self instanceof Number) {
        $self->value = to_number($value);
        return $self;
      } else {
        return to_number($value);
      }
    });
    $Number->instantiate = function() {
      return new Number();
    };
    $Number->set('prototype', Number::$protoObject);
    $Number->setMethods(Number::$classMethods, true, false, true);
    $Number->set('NaN', NAN);
    $Number->set('MAX_VALUE', 1.8e308);
    $Number->set('MIN_VALUE', -1.8e308);
    $Number->set('NEGATIVE_INFINITY', -INF);
    $Number->set('POSITIVE_INFINITY', INF);
    return $Number;
  }
}
Number::$classMethods = array(
  'isFinite' => function($value) {
      $value = to_number($value);
      return !($value === INF || $value === -INF || is_nan($value));
    },
  'parseInt' => function($value, $radix = null) {
      $value = to_string($value);
      $value = preg_replace('/^[\\t\\x0B\\f \\xA0\\r\\n]+/', '', $value);
      $sign = ($value[0] === '-') ? -1 : 1;
      $value = preg_replace('/^[+-]/', '', $value);
      if ($radix === null && strtolower(substr($value, 0, 2)) === '0x') {
        $radix = 16;
      }
      if ($radix === null) {
        $radix = 10;
      } else {
        $radix = to_number($radix);
        if (is_nan($radix) || $radix < 2 || $radix > 36) {
          return NAN;
        }
      }
      if ($radix === 10) {
        return preg_match('/^[0-9]/', $value) ? (float)(intval($value) * $sign) : NAN;
      } elseif ($radix === 16) {
        $value = preg_replace('/^0x/i', '', $value);
        return preg_match('/^[0-9a-f]/i', $value) ? (float)(hexdec($value) * $sign) : NAN;
      } elseif ($radix === 8) {
        return preg_match('/^[0-7]/', $value) ? (float)(octdec($value) * $sign) : NAN;
      }
      $value = strtoupper($value);
      $len = strlen($value);
      $numValidChars = 0;
      for ($i = 0; $i < $len; $i++) {
        $n = ord($value[$i]);
        if ($n >= 48 && $n <= 57) {
          $n = $n - 48;
        } elseif ($n >= 65 && $n <= 90) {
          $n = $n - 55;
        } else {
          $n = 36;
        }
        if ($n < $radix) {
          $numValidChars += 1;
        } else {
          break;
        }
      }
      if ($numValidChars > 0) {
        $value = substr($value, 0, $numValidChars);
        return floatval(base_convert($value, $radix, 10));
      }
      return NAN;
    },
  'parseFloat' => function($value) {
      $value = to_string($value);
      $value = preg_replace('/^[\\t\\x0B\\f \\xA0\\r\\n]+/', '', $value);
      $sign = ($value[0] === '-') ? -1 : 1;
      $value = preg_replace('/^[+-]/', '', $value);
      if (preg_match('/^(\d+\.\d*|\.\d+|\d+)e([+-]?[0-9]+)/i', $value, $m)) {
        return (float)($sign * $m[1] * pow(10, $m[2]));
      }
      if (preg_match('/^(\d+\.\d*|\.\d+|\d+)/i', $value, $m)) {
        return (float)($m[0] * $sign);
      }
      return NAN;
    },
  'isNaN' => function($value) {
      return is_nan(to_number($value));
    }
);
Number::$protoMethods = array(
  'valueOf' => function() {
      $self = Func::getContext();
      return $self->value;
    },
  'toString' => function($radix = null) {
      $self = Func::getContext();
      return to_string($self->value);
    }
);
Number::$protoObject = new ObjectClass();
Number::$protoObject->setMethods(Number::$protoMethods, true, false, true);
class Bln extends ObjectClass {
  public $className = "Boolean";
  public $value = null;
  static $protoObject = null;
  static $classMethods = null;
  static $protoMethods = null;
  function __construct($value = null) {
    parent::__construct();
    $this->proto = self::$protoObject;
    if (func_num_args() === 1) {
      $this->value = $value;
    }
  }
  static function getGlobalConstructor() {
    $Boolean = new Func(function($value = false) {
      $self = Func::getContext();
      if ($self instanceof Bln) {
        $self->value = $value ? true : false;
        return $self;
      } else {
        return $value ? true : false;
      }
    });
    $Boolean->instantiate = function() {
      return new Bln();
    };
    $Boolean->set('prototype', Bln::$protoObject);
    $Boolean->setMethods(Bln::$classMethods, true, false, true);
    return $Boolean;
  }
}
Bln::$classMethods = array();
Bln::$protoMethods = array(
  'valueOf' => function() {
      $self = Func::getContext();
      return $self->value;
    },
  'toString' => function() {
      $self = Func::getContext();
      return to_string($self->value);
    }
);
Bln::$protoObject = new ObjectClass();
Bln::$protoObject->setMethods(Bln::$protoMethods, true, false, true);
class Err extends ObjectClass {
  public $className = "Error";
  public $stack = null;
  static $protoObject = null;
  static $classMethods = null;
  static $protoMethods = null;
  function __construct($str = null) {
    parent::__construct();
    $this->proto = self::$protoObject;
    if (func_num_args() === 1) {
      $this->set('message', to_string($str));
    }
  }
  public function getMessage() {
    $message = $this->get('message');
    return $this->className . ($message ? ': ' . $message : '');
  }
  static function create($str, $framesToPop = 0) {
    $error = new Err($str);
    $stack = debug_backtrace();
    while ($framesToPop--) {
      array_shift($stack);
    }
    $error->stack = $stack;
    return $error;
  }
  static function getGlobalConstructor() {
    $Error = new Func(function($str = null) {
      $error = new Err($str);
      $error->stack = debug_backtrace();
      return $error;
    });
    $Error->set('prototype', Err::$protoObject);
    $Error->setMethods(Err::$classMethods, true, false, true);
    return $Error;
  }
}
class RangeErr extends Err {
  public $className = "RangeError";
}
class ReferenceErr extends Err {
  public $className = "ReferenceError";
}
class SyntaxErr extends Err {
  public $className = "SyntaxError";
}
class TypeErr extends Err {
  public $className = "TypeError";
}
Err::$classMethods = array();
Err::$protoMethods = array(
  'toString' => function() {
      $self = Func::getContext();
      return $self->get('message');
    }
);
Err::$protoObject = new ObjectClass();
Err::$protoObject->setMethods(Err::$protoMethods, true, false, true);
class Ex extends \Exception {
  const MAX_STR_LEN = 32;
  public $value = null;
  static $errorOutputHandlers = array();
  function __construct($value) {
    if ($value instanceof Err) {
      $message = $value->getMessage();
    } else {
      $message = to_string($value);
    }
    parent::__construct($message);
    $this->value = $value;
  }
  static function handleError($level, $message, $file, $line, $context = null) {
    if ($level === E_NOTICE) {
      return false;
    }
    $err = Err::create($message, 1);
    $err->set('level', $level);
    throw new Ex($err);
  }
  static function handleException($ex) {
    global $console;
    $stack = null;
    $output = array();
    if ($ex instanceof Ex) {
      $value = $ex->value;
      if ($value instanceof Err) {
        $stack = $value->stack;
        $frame = array_shift($stack);
        if (isset($frame['file'])) {
          $output[] = $frame['file'] . "(" . $frame['line'] . ")\n";
        }
        $output[] = $value->getMessage() . "\n";
      }
    }
    if ($stack === null) {
      $output[] = $ex->getFile() . "(" . $ex->getLine() . ")\n";
      $output[] = $ex->getMessage() . "\n";
      $stack = $ex->getTrace();
    }
    $output[] = self::renderStack($stack) . "\n";
    $output[] = "----\n";
    $output = implode('', $output);
    foreach(self::$errorOutputHandlers as $fn) {
      $fn($output);
    }
    if (isset($console) && ($console instanceof ObjectClass)) {
      $console->callMethod('log', $output);
    } else {
      echo $output;
    }
    exit(1);
  }
  static function renderStack($stack) {
    $lines = array();
    foreach ($stack as $frame) {
      $args = isset($frame['args']) ? $frame['args'] : array();
      $list = array();
      foreach ($args as $arg) {
        if (is_string($arg)) {
          $list[] = self::stringify($arg);
        } else if (is_array($arg)) {
          $list[] = 'array()';
        } else if (is_null($arg)) {
          $list[] = 'null';
        } else if (is_bool($arg)) {
          $list[] = ($arg) ? 'true' : 'false';
        } else if (is_object($arg)) {
          $class = get_class($arg);
          if ($arg instanceof ObjectClass) {
            $constructor = $arg->get('constructor');
            if ($constructor instanceof Func && $constructor->name) {
              $class .= '[' . $constructor->name . ']';
            }
          }
          $list[] = $class;
        } else if (is_resource($arg)) {
          $list[] = get_resource_type($arg);
        } else {
          $list[] = $arg;
        }
      }
      $function = $frame['function'];
      if ($function === '{closure}') {
        $function = '<anonymous>';
      }
      if (isset($frame['class'])) {
        $function = $frame['class'] . '->' . $function;
      }
      $line = '    at ';
      if (isset($frame['file'])) {
        $line .= $frame['file'] . '(' . $frame['line'] . ') ';
      }
      $line .= $function . '(' . join(', ', $list) . ') ';
      array_push($lines, $line);
    }
    return join("\n", $lines);
  }
  static function stringify($str) {
    $len = strlen($str);
    if ($len === 0) {
      return "''";
    }
    $str = preg_replace('/^[^\x20-\x7E]+/', '', $str, 1);
    $trimAt = null;
    $hasExtendedChars = preg_match('/[^\x20-\x7E]/', $str, $matches, PREG_OFFSET_CAPTURE);
    if ($hasExtendedChars === 1) {
      $trimAt = $matches[0][1];
    }
    if ($len > self::MAX_STR_LEN) {
      $trimAt = ($trimAt === null) ? self::MAX_STR_LEN : min($trimAt, self::MAX_STR_LEN);
    }
    if ($trimAt !== null) {
      return "'" . substr($str, 0, $trimAt) . "...'($len)";
    } else {
      return "'" . $str . "'";
    }
  }
}
if (function_exists('set_error_handler')) {
  set_error_handler(array('Packer\Ex', 'handleError'));
}
if (function_exists('set_exception_handler')) {
  set_exception_handler(array('Packer\Ex', 'handleException'));
}
class Buffer extends ObjectClass {
  public $raw = '';
  public $length = 0;
  static $protoObject = null;
  static $classMethods = null;
  static $protoMethods = null;
  static $SHOW_MAX = 51;
  function __construct() {
    parent::__construct();
    $this->proto = self::$protoObject;
    if (func_num_args() > 0) {
      $this->init(func_get_args());
    }
  }
  function init($args) {
    global $Buffer;
    list($subject, $encoding, $offset) = array_pad($args, 3, null);
    $type = gettype($subject);
    if ($type === 'integer' || $type === 'double') {
      $this->raw = str_repeat("\0", (int)$subject);
    } else if ($type === 'string') {
      $encoding = ($encoding === null) ? 'utf8' : to_string($encoding);
      if ($encoding === 'hex') {
        $this->raw = pack('H*', $subject);
      } else if ($encoding === 'base64') {
        $this->raw = base64_decode($subject);
      } else {
        $this->raw = $subject;
      }
    } else if (_instanceof($subject, $Buffer)) {
      $this->raw = $subject->raw;
    } else if ($subject instanceof Arr) {
      $this->raw = $util['arrToRaw']($subject);
    } else {
      throw new Ex(Err::create('Invalid parameters to construct Buffer'));
    }
    $len = strlen($this->raw);
    $this->length = $len;
    $this->set('length', (float)$len);
  }
  function toJSON($max = null) {
    $raw = $this->raw;
    if ($max !== null && $max < strlen($raw)) {
      return '<Buffer ' . bin2hex(substr($raw, 0, $max)) . '...>';
    } else {
      return '<Buffer ' . bin2hex($raw) . '>';
    }
  }
  static function getGlobalConstructor() {
    $Buffer = new Func('Buffer', function() {
      $self = new Buffer();
      $self->init(func_get_args());
      return $self;
    });
    $Buffer->set('prototype', Buffer::$protoObject);
    $Buffer->setMethods(Buffer::$classMethods, true, false, true);
    return $Buffer;
  }
}
Buffer::$classMethods = array(
  'isBuffer' => function($obj) {
      global $Buffer;
      return _instanceof($obj, $Buffer);
    },
  'concat' => function( $list, $totalLength = null) {
      if (!($list instanceof Arr)) {
        throw new Ex(Err::create('Usage: Buffer.concat(array, [length])'));
      }
      $rawList = array();
      $length = 0;
      foreach ($list->toArray() as $buffer) {
        if (!($buffer instanceof Buffer)) {
          throw new Ex(Err::create('Usage: Buffer.concat(array, [length])'));
        }
        $rawList[] = $buffer->raw;
        $length += $buffer->length;
      }
      $newRaw = join('', $rawList);
      if ($totalLength !== null) {
        $totalLength = (int)$totalLength;
        if ($totalLength > $length) {
          $newRaw .= str_repeat("\0", $totalLength - $length);
        } else if ($totalLength < $length) {
          $newRaw = substr($newRaw, 0, $totalLength);
        }
        $length = $totalLength;
      }
      $newBuffer = new Buffer();
      $newBuffer->raw = $newRaw;
      $newBuffer->length = $length;
      $newBuffer->set('length', (float)$length);
      return $newBuffer;
    },
  'byteLength' => function($string, $enc = null) {
      $b = new Buffer($string, $enc);
      return $b->length;
    }
);
Buffer::$protoMethods = array(
  'get' => function($index) {
      $self = Func::getContext();
      $i = (int)$index;
      if ($i < 0 || $i >= $self->length) {
        throw new Ex(Err::create('offset is out of bounds'));
      }
      return (float)ord($self->raw[$i]);
    },
  'set' => function($index, $byte) {
      $self = Func::getContext();
      $i = (int)$index;
      if ($i < 0 || $i >= $self->length) {
        throw new Ex(Err::create('offset is out of bounds'));
      }
      $old = $self->raw;
      $self->raw = substr($old, 0, $i) . chr($byte) . substr($old, $i + 1);
      return $self->raw;
    },
  'write' => function($data ) {
      $self = Func::getContext();
      $args = array_slice(func_get_args(), 1);
      $count = func_num_args() - 1;
      $offset = null; $len = null; $enc = null;
      if ($count > 0) {
        if (is_string($args[0])) {
          $enc = array_shift($args);
          $offset = array_shift($args);
          $len = array_shift($args);
        } else if (is_int_or_float($args[0])) {
          $offset = array_shift($args);
          $enc = array_pop($args);
          $len = array_pop($args);
          if (is_int_or_float($enc)) {
            list($len, $enc) = array($enc, $len);
          }
        }
      }
      if (!($data instanceof Buffer)) {
        $data = new Buffer($data, $enc);
      }
      $new = $data->raw;
      if ($len !== null) {
        $newLen = (int)$len;
        $new = substr($new, 0, $newLen);
      } else {
        $newLen = $data->length;
      }
      $offset = (int)$offset;
      $old = $self->raw;
      $oldLen = $self->length;
      if ($offset + $newLen > strlen($old)) {
        $newLen = $oldLen - $offset;
      }
      $pre = ($offset === 0) ? '' : substr($old, 0, $offset);
      $self->raw = $pre . $new . substr($old, $offset + $newLen);
    },
  'slice' => function($start, $end = null) {
      $self = Func::getContext();
      $len = $self->length;
      if ($len === 0) {
        return new Buffer(0);
      }
      $start = (int)$start;
      if ($start < 0) {
        $start = $len + $start;
        if ($start < 0) $start = 0;
      }
      if ($start >= $len) {
        return new Buffer(0);
      }
      $end = ($end === null) ? $len : (int)$end;
      if ($end < 0) {
        $end = $len + $end;
      }
      if ($end < $start) {
        $end = $start;
      }
      if ($end > $len) {
        $end = $len;
      }
      $new = substr($self->raw, $start, $end - $start);
      return new Buffer($new, 'binary');
    },
  'toString' => function($enc = 'utf8', $start = null, $end = null) {
      $self = Func::getContext();
      $raw = $self->raw;
      if (func_num_args() > 1) {
        $raw = substr($raw, $start, $end - $start + 1);
      }
      if ($enc === 'hex') {
        return bin2hex($raw);
      }
      if ($enc === 'base64') {
        return base64_encode($raw);
      }
      return $raw;
    },
  'toJSON' => function() {
      $self = Func::getContext();
      return $self->toJSON();
    },
  'inspect' => function() {
      $self = Func::getContext();
      return $self->toJSON(Buffer::$SHOW_MAX);
    }
);
Buffer::$protoObject = new ObjectClass();
Buffer::$protoObject->setMethods(Buffer::$protoMethods, true, false, true);

function layout($slots, $totalWidth, $totalHeight) {
  $global = ObjectClass::$global;
  $undefined = null;
  $Infinity = INF;
  $NaN = NAN;
  $Object = ObjectClass::getGlobalConstructor();
  $Function = Func::getGlobalConstructor();
  $Array = Arr::getGlobalConstructor();
  $Boolean = Bln::getGlobalConstructor();
  $Number = Number::getGlobalConstructor();
  $String = Str::getGlobalConstructor();
  $Date = Date::getGlobalConstructor();
  $Error = Err::getGlobalConstructor();
  $RangeError = RangeErr::getGlobalConstructor();
  $ReferenceError = ReferenceErr::getGlobalConstructor();
  $SyntaxError = SyntaxErr::getGlobalConstructor();
  $TypeError = TypeErr::getGlobalConstructor();
  $RegExp = RegExp::getGlobalConstructor();
  $Buffer = Buffer::getGlobalConstructor();
  call_user_func(function() use (&$escape, &$unescape, &$encodeURI, &$decodeURI, &$encodeURIComponent, &$decodeURIComponent) {
    $ord = function($ch) {
      $i = ord($ch[0]);
      if ($i <= 0x7F) {
        return $i;
      } else if ($i < 0xC2) {
        return $i; 
      } else if ($i <= 0xDF) {
        return ($i & 0x1F) << 6 | (ord($ch[1]) & 0x3F);
      } else if ($i <= 0xEF) {
        return ($i & 0x0F) << 12 | (ord($ch[1]) & 0x3F) << 6 | (ord($ch[2]) & 0x3F);
      } else if ($i <= 0xF4) {
        return ($i & 0x0F) << 18 | (ord($ch[1]) & 0x3F) << 12 | (ord($ch[2]) & 0x3F) << 6 | (ord($ch[3]) & 0x3F);
      } else {
        return $i; 
      }
    };
    $chr = function($i) {
      if ($i <= 0x7F) return chr($i);
      if ($i <= 0x7FF) return chr(0xC0 | ($i >> 6)) . chr(0x80 | ($i & 0x3F));
      if ($i <= 0xFFFF) return chr(0xE0 | ($i >> 12)) . chr(0x80 | ($i >> 6) & 0x3F) . chr(0x80 | $i & 0x3F);
      return chr(0xF0 | ($i >> 18)) . chr(0x80 | ($i >> 12) & 0x3F) . chr(0x80 | ($i >> 6) & 0x3F) . chr(0x80 | $i & 0x3F);
    };
    $escape = new Func(function($str) use (&$ord) {
      $result = '';
      $length = mb_strlen($str);
      for ($i = 0; $i < $length; $i++) {
        $ch = mb_substr($str, $i, 1);
        $j = $ord($ch);
        if ($j <= 41 || $j === 44 || ($j >= 58 && $j <= 63) || ($j >= 91 && $j <= 94) || $j === 96 || ($j >= 123 && $j <= 255)) {
          $result .= '%' . strtoupper($j < 16 ? '0' . dechex($j) : dechex($j));
        } else if ($j > 255) {
          $result .= '%u' . strtoupper($j < 4096 ? '0' . dechex($j) : dechex($j));
        } else {
          $result .= $ch;
        }
      }
      return $result;
    });
    $unescape = new Func(function($str) use (&$chr) {
      $result = '';
      $length = strlen($str);
      for ($i = 0; $i < $length; $i++) {
        $ch = $str[$i];
        if ($ch === '%' && $length > $i + 2) {
          if ($str[$i + 1] === 'u') {
            if ($length > $i + 4) {
              $hex = substr($str, $i + 2, 4);
              if (ctype_xdigit($hex)) {
                $result .= $chr(hexdec($hex));
                $i += 5;
                continue;
              }
            }
          } else {
            $hex = substr($str, $i + 1, 2);
            if (ctype_xdigit($hex)) {
              $result .= $chr(hexdec($hex));
              $i += 2;
              continue;
            }
          }
        }
        $result .= $ch;
      }
      return $result;
    });
    $encodeURI = new Func(function($str) {
      $result = '';
      $length = strlen($str);
      for ($i = 0; $i < $length; $i++) {
        $ch = substr($str, $i, 1);
        $j = ord($ch);
        if ($j === 33 || $j === 35 || $j === 36 || ($j >= 38 && $j <= 59) || $j === 61 || ($j >= 63 && $j <= 90) || $j === 95 || ($j >= 97 && $j <= 122) || $j === 126) {
          $result .= $ch;
        } else {
          $result .= '%' . strtoupper($j < 16 ? '0' . dechex($j) : dechex($j));
        }
      }
      return $result;
    });
    $decodeURI = new Func(function($str) {
      $result = '';
      $length = strlen($str);
      for ($i = 0; $i < $length; $i++) {
        $ch = $str[$i];
        if ($ch === '%' && $length > $i + 2) {
          $hex = substr($str, $i + 1, 2);
          if (ctype_xdigit($hex)) {
            $j = hexdec($hex);
            if ($j !== 35 && $j !== 36 && $j !== 38 && $j !== 43 && $j !== 44 && $j !== 47 && $j !== 58 && $j !== 59 && $j !== 61 && $j !== 63 && $j !== 64) {
              $result .= chr($j);
              $i += 2;
              continue;
            }
          }
        }
        $result .= $ch;
      }
      return $result;
    });
    $encodeURIComponent = new Func(function($str) {
      $result = '';
      $length = strlen($str);
      for ($i = 0; $i < $length; $i++) {
        $ch = substr($str, $i, 1);
        $j = ord($ch);
        if ($j === 33 || ($j >= 39 && $j <= 42) || $j === 45 || $j === 46 || ($j >= 48 && $j <= 57) || ($j >= 65 && $j <= 90) || $j === 95 || ($j >= 97 && $j <= 122) || $j === 126) {
          $result .= $ch;
        } else {
          $result .= '%' . strtoupper($j < 16 ? '0' . dechex($j) : dechex($j));
        }
      }
      return $result;
    });
    $decodeURIComponent = new Func(function($str) {
      return rawurldecode($str);
    });
  });
  $isNaN = $Number->get('isNaN');
  $isFinite = $Number->get('isFinite');
  $parseInt = $Number->get('parseInt');
  $parseFloat = $Number->get('parseFloat');
  $Math = call_user_func(function() {
    $randMax = mt_getrandmax();
    $methods = array(
      'random' => function() use (&$randMax) {
          return (float)(mt_rand() / ($randMax + 1));
        },
      'round' => function($num) {
          $num = to_number($num);
          return is_nan($num) ? NAN : (float)round($num);
        },
      'ceil' => function($num) {
          $num = to_number($num);
          return is_nan($num) ? NAN : (float)ceil($num);
        },
      'floor' => function($num) {
          $num = to_number($num);
          return is_nan($num) ? NAN : (float)floor($num);
        },
      'abs' => function($num) {
          $num = to_number($num);
          return is_nan($num) ? NAN : (float)abs($num);
        },
      'max' => function() {
          $max = -INF;
          foreach (func_get_args() as $num) {
            $num = to_number($num);
            if (is_nan($num)) return NAN;
            if ($num > $max) $max = $num;
          }
          return (float)$max;
        },
      'min' => function() {
          $min = INF;
          foreach (func_get_args() as $num) {
            $num = to_number($num);
            if (is_nan($num)) return NAN;
            if ($num < $min) $min = $num;
          }
          return (float)$min;
        },
      'pow' => function($num, $exp) {
          $num = to_number($num);
          $exp = to_number($exp);
          if (is_nan($num) || is_nan($exp)) {
            return NAN;
          }
          return (float)pow($num, $exp);
        },
      'log' => function($num) {
          $num = to_number($num);
          return is_nan($num) ? NAN : (float)log($num);
        },
      'exp' => function($num) {
          $num = to_number($num);
          return is_nan($num) ? NAN : (float)exp($num);
        },
      'sqrt' => function($num) {
          $num = to_number($num);
          return is_nan($num) ? NAN : (float)sqrt($num);
        },
      'sin' => function($num) {
          $num = to_number($num);
          return is_nan($num) ? NAN : (float)sin($num);
        },
      'cos' => function($num) {
          $num = to_number($num);
          return is_nan($num) ? NAN : (float)cos($num);
        },
      'tan' => function($num) {
          $num = to_number($num);
          return is_nan($num) ? NAN : (float)tan($num);
        },
      'atan' => function($num) {
          $num = to_number($num);
          return is_nan($num) ? NAN : (float)atan($num);
        },
      'atan2' => function($y, $x) {
          $y = to_number($y);
          $x = to_number($x);
          if (is_nan($y) || is_nan($x)) {
            return NAN;
          }
          return (float)atan2($y, $x);
        }
    );
    $constants = array(
      'E' => M_E,
      'LN10' => M_LN10,
      'LN2' => M_LN2,
      'LOG10E' => M_LOG10E,
      'LOG2E' => M_LOG2E,
      'PI' => M_PI,
      'SQRT1_2' => M_SQRT1_2,
      'SQRT2' => M_SQRT2
    );
    $Math = new ObjectClass();
    $Math->setMethods($methods, true, false, true);
    $Math->setProps($constants, true, false, true);
    return $Math;
  });
  $JSON = call_user_func(function() {
    $decode = function($value) use (&$decode) {
      if ($value === null) {
        return ObjectClass::$null;
      }
      $type = gettype($value);
      if ($type === 'integer') {
        return (float)$value;
      }
      if ($type === 'string' || $type === 'boolean' || $type === 'double') {
        return $value;
      }
      if ($type === 'array') {
        $result = new Arr();
        foreach ($value as $item) {
          $result->push($decode($item));
        }
      } else {
        $result = new ObjectClass();
        foreach ($value as $key => $item) {
          if ($key === '_empty_') {
            $key = '';
          }
          $result->set($key, $decode($item));
        }
      }
      return $result;
    };
    $escape = function($str) {
      return str_replace("\\/", "/", json_encode($str));
    };
    $encode = function($parent, $key, $value, $opts, $encodeNull = false) use (&$escape, &$encode) {
      if ($value instanceof ObjectClass) {
        if (method_exists($value, 'toJSON')) {
          $value = $value->toJSON();
        } else
        if (($toJSON = $value->get('toJSON')) instanceof Func) {
          $value = $toJSON->call($value);
        } else
        if (($valueOf = $value->get('valueOf')) instanceof Func) {
          $value = $valueOf->call($value);
        }
      }
      if ($opts->replacer instanceof Func) {
        $value = $opts->replacer->call($parent, $key, $value, $opts->level + 1);
      }
      if ($value === null) {
        return $encodeNull ? 'null' : $value;
      }
      if ($value === ObjectClass::$null || $value === INF || $value === -INF) {
        return 'null';
      }
      $type = gettype($value);
      if ($type === 'boolean') {
        return $value ? 'true' : 'false';
      }
      if ($type === 'integer' || $type === 'double') {
        return ($value !== $value) ? 'null' : $value . '';
      }
      if ($type === 'string') {
        return $escape($value);
      }
      $opts->level += 1;
      $prevGap = $opts->gap;
      if ($opts->gap !== null) {
        $opts->gap .= $opts->indent;
      }
      $result = null;
      if ($value instanceof Arr) {
        $parts = array();
        $len = $value->length;
        for ($i = 0; $i < $len; $i++) {
          $parts[] = $encode($value, $i, $value->get($i), $opts, true);
        }
        if ($opts->gap === null) {
          $result = '[' . join(',', $parts) . ']';
        } else {
          $result = (count($parts) === 0) ? "[]" :
            "[\n" . $opts->gap . join(",\n" . $opts->gap, $parts) . "\n" . $prevGap . "]";
        }
      }
      if ($result === null) {
        $parts = array();
        $sep = ($opts->gap === null) ? ':' : ': ';
        foreach ($value->getOwnKeys(true) as $key) {
          $item = $value->get($key);
          if ($item !== null) {
            $parts[] = $escape($key) . $sep . $encode($value, $key, $item, $opts);
          }
        }
        if ($opts->gap === null) {
          $result = '{' . join(',', $parts) . '}';
        } else {
          $result = (count($parts) === 0) ? "{}" :
            "{\n" . $opts->gap . join(",\n" . $opts->gap, $parts) . "\n" . $prevGap . "}";
        }
      }
      $opts->level -= 1;
      $opts->gap = $prevGap;
      return $result;
    };
    $methods = array(
      'parse' => function($string, $reviver = null) use(&$decode) {
          $string = '{"_":' . $string . '}';
          $value = json_decode($string);
          if ($value === null) {
            throw new Ex(SyntaxErr::create('Unexpected end of input'));
          }
          return $decode($value->_);
        },
      'stringify' => function($value, $replacer = null, $space = null) use (&$encode) {
          $opts = new stdClass();
          $opts->indent = null;
          $opts->gap = null;
          if (is_int_or_float($space)) {
            $space = floor($space);
            if ($space > 0) {
              $space = str_repeat(' ', $space);
            }
          }
          if (is_string($space)) {
            $length = strlen($space);
            if ($length > 10) $space = substr($space, 0, 10);
            if ($length > 0) {
              $opts->indent = $space;
              $opts->gap = '';
            }
          }
          $opts->replacer = ($replacer instanceof Func) ? $replacer : null;
          $opts->level = -1.0;
          $obj = ($opts->replacer !== null) ? new ObjectClass('', $value) : null;
          return $encode($obj, '', $value, $opts);
        }
    );
    $JSON = new ObjectClass();
    $JSON->setMethods($methods, true, false, true);
    $JSON->fromNative = $decode;
    return $JSON;
  });
  $console = call_user_func(function() {
    $stdout = defined('STDOUT') ? STDOUT : null;
    $stderr = defined('STDERR') ? STDERR : null;
    $toString = function($value) {
      if ($value instanceof ObjectClass) {
        if (class_exists('Debug')) {
          return call_user_func(Debug::$inspect->fn, $value);
        }
        $toString = $value->get('inspect');
        if (!($toString instanceof Func)) {
          $toString = $value->get('toString');
        }
        if (!($toString instanceof Func)) {
          $toString = ObjectClass::$protoObject->get('toString');
        }
        return $toString->call($value);
      }
      return to_string($value);
    };
    $console = new ObjectClass();
    $console->set('log', new Func(function() use (&$stdout, &$toString) {
      if ($stdout === null) {
        $stdout = fopen('php://stdout', 'w');
      }
      $output = array();
      foreach (func_get_args() as $value) {
        $output[] = $toString($value);
      }
      write_all($stdout, join(' ', $output) . "\n");
    }));
    $console->set('error', new Func(function() use (&$stderr, &$toString) {
      if ($stderr === null) {
        $stderr = fopen('php://stderr', 'w');
      }
      $output = array();
      foreach (func_get_args() as $value) {
        $output[] = $toString($value);
      }
      write_all($stderr, join(' ', $output) . "\n");
    }));
    return $console;
  });
  $process = new ObjectClass();
  $process->set('sapi_name', php_sapi_name());
  $process->set('exit', new Func(function($code = 0) {
    $code = intval($code);
    exit($code);
  }));
  $process->set('binding', new Func(function($name) {
    $module = Module::get($name);
    if ($module === null) {
      throw new Ex(Err::create("Binding `$name` not found."));
    }
    return $module;
  }));
  $process->argv = isset(GlobalObject::$OLD_GLOBALS['argv']) ? GlobalObject::$OLD_GLOBALS['argv'] : array();
  $process->argv = array_slice($process->argv, 1);
  $process->set('argv', Arr::fromArray($process->argv));


  $Packer = new Func("Packer", function() {
    $this_ = Func::getContext();
    set($this_, "_slots", new Arr());
    set($this_, "_slotSizes", new Arr());
    set($this_, "_freeSlots", new Arr());
    set($this_, "_newSlots", new Arr());
    set($this_, "_rectItem", new ObjectClass());
    set($this_, "_rectStore", new Arr());
    set($this_, "_rectId", 0.0);
    set($this_, "_layout", new ObjectClass("slots", ObjectClass::$null, "setWidth", false, "setHeight", false, "width", false, "height", false));
    set($this_, "_sortRectsLeftTop", call_method(get($this_, "_sortRectsLeftTop"), "bind", $this_));
    set($this_, "_sortRectsTopLeft", call_method(get($this_, "_sortRectsTopLeft"), "bind", $this_));
  });
  set(get($Packer, "prototype"), "getLayout", new Func(function($items = null, $width = null, $height = null, $slots = null, $options = null) use (&$Math) {
    $this_ = Func::getContext();
    $layout = null; $fillGaps = null; $isHorizontal = null; $alignRight = null; $alignBottom = null; $rounding = null; $slotSizes = null; $i = null;
    $layout = get($this_, "_layout");
    $fillGaps = !not((is($and_ = $options) ? get($options, "fillGaps") : $and_));
    $isHorizontal = !not((is($and_ = $options) ? get($options, "horizontal") : $and_));
    $alignRight = !not((is($and_ = $options) ? get($options, "alignRight") : $and_));
    $alignBottom = !not((is($and_ = $options) ? get($options, "alignBottom") : $and_));
    $rounding = !not((is($and_ = $options) ? get($options, "rounding") : $and_));
    $slotSizes = get($this_, "_slotSizes");
    set($layout, "slots", is($slots) ? $slots : get($this_, "_slots"));
    set($layout, "width", is($isHorizontal) ? 0.0 : (is($rounding) ? call_method($Math, "round", $width) : $width));
    set($layout, "height", not($isHorizontal) ? 0.0 : (is($rounding) ? call_method($Math, "round", $height) : $height));
    set($layout, "setWidth", $isHorizontal);
    set($layout, "setHeight", not($isHorizontal));
    set(get($layout, "slots"), "length", 0.0);
    set($slotSizes, "length", 0.0);
    if (not(get($items, "length"))) {
      return $layout;
    }
    for ($i = 0.0; cmp($i, '<', get($items, "length")); $i++) {
      call_method($this_, "_addSlot", get($items, $i), $isHorizontal, $fillGaps, $rounding, true);
    }
    if (is($alignRight)) {
      for ($i = 0.0; cmp($i, '<', get(get($layout, "slots"), "length")); $i = _plus($i, 2.0)) {
        set(get($layout, "slots"), $i, to_number(get($layout, "width")) - to_number(_plus(get(get($layout, "slots"), $i), get($slotSizes, $i))));
      }
    }
    if (is($alignBottom)) {
      for ($i = 1.0; cmp($i, '<', get(get($layout, "slots"), "length")); $i = _plus($i, 2.0)) {
        set(get($layout, "slots"), $i, to_number(get($layout, "height")) - to_number(_plus(get(get($layout, "slots"), $i), get($slotSizes, $i))));
      }
    }
    set(get($this_, "_freeSlots"), "length", 0.0);
    set(get($this_, "_newSlots"), "length", 0.0);
    set($this_, "_rectId", 0.0);
    set($layout, "slotSizes", $slotSizes);
    return $layout;
  }));
  set(get($Packer, "prototype"), "_addSlot", call(new Func(function() use (&$Math, &$Infinity) {
    $leeway = null; $itemSlot = null;
    $leeway = (float)0.001;
    $itemSlot = new ObjectClass();
    return new Func(function($item = null, $isHorizontal = null, $fillGaps = null, $rounding = null, $trackSize = null) use (&$itemSlot, &$Math, &$leeway, &$Infinity) {
      $this_ = Func::getContext();
      $layout = null; $freeSlots = null; $newSlots = null; $rect = null; $rectId = null; $potentialSlots = null; $ignoreCurrentSlots = null; $i = null; $ii = null;
      $layout = get($this_, "_layout");
      $freeSlots = get($this_, "_freeSlots");
      $newSlots = get($this_, "_newSlots");
      set($newSlots, "length", 0.0);
      set($itemSlot, "left", ObjectClass::$null);
      set($itemSlot, "top", ObjectClass::$null);
      set($itemSlot, "width", _plus(get($item, "_width"), get($item, "_marginLeft"), get($item, "_marginRight")));
      set($itemSlot, "height", _plus(get($item, "_height"), get($item, "_marginTop"), get($item, "_marginBottom")));
      if (is($rounding)) {
        set($itemSlot, "width", call_method($Math, "round", get($itemSlot, "width")));
        set($itemSlot, "height", call_method($Math, "round", get($itemSlot, "height")));
      }
      for ($i = 0.0; cmp($i, '<', get($freeSlots, "length")); $i++) {
        $rectId = get($freeSlots, $i);
        if (not($rectId)) {
          continue;
        }
        $rect = call_method($this_, "_getRect", $rectId);
        if (cmp(get($itemSlot, "width"), '<=', _plus(get($rect, "width"), $leeway)) && cmp(get($itemSlot, "height"), '<=', _plus(get($rect, "height"), $leeway))) {
          set($itemSlot, "left", get($rect, "left"));
          set($itemSlot, "top", get($rect, "top"));
          break;
        }
      }
      if (get($itemSlot, "left") === ObjectClass::$null) {
        set($itemSlot, "left", not($isHorizontal) ? 0.0 : get($layout, "width"));
        set($itemSlot, "top", not($isHorizontal) ? get($layout, "height") : 0.0);
        if (not($fillGaps)) {
          $ignoreCurrentSlots = true;
        }
      }
      if (not($isHorizontal) && cmp(_plus(get($itemSlot, "top"), get($itemSlot, "height")), '>', get($layout, "height"))) {
        if (cmp(get($itemSlot, "left"), '>', 0.0)) {
          call_method($newSlots, "push", call_method($this_, "_addRect", 0.0, get($layout, "height"), get($itemSlot, "left"), $Infinity));
        }
        if (cmp(_plus(get($itemSlot, "left"), get($itemSlot, "width")), '<', get($layout, "width"))) {
          call_method($newSlots, "push", call_method($this_, "_addRect", _plus(get($itemSlot, "left"), get($itemSlot, "width")), get($layout, "height"), to_number(get($layout, "width")) - to_number(get($itemSlot, "left")) - to_number(get($itemSlot, "width")), $Infinity));
        }
        set($layout, "height", _plus(get($itemSlot, "top"), get($itemSlot, "height")));
      }
      if (is($isHorizontal) && cmp(_plus(get($itemSlot, "left"), get($itemSlot, "width")), '>', get($layout, "width"))) {
        if (cmp(get($itemSlot, "top"), '>', 0.0)) {
          call_method($newSlots, "push", call_method($this_, "_addRect", get($layout, "width"), 0.0, $Infinity, get($itemSlot, "top")));
        }
        if (cmp(_plus(get($itemSlot, "top"), get($itemSlot, "height")), '<', get($layout, "height"))) {
          call_method($newSlots, "push", call_method($this_, "_addRect", get($layout, "width"), _plus(get($itemSlot, "top"), get($itemSlot, "height")), $Infinity, to_number(get($layout, "height")) - to_number(get($itemSlot, "top")) - to_number(get($itemSlot, "height"))));
        }
        set($layout, "width", _plus(get($itemSlot, "left"), get($itemSlot, "width")));
      }
      for ($i = is($fillGaps) ? 0.0 : (is($ignoreCurrentSlots) ? get($freeSlots, "length") : $i); cmp($i, '<', get($freeSlots, "length")); $i++) {
        $rectId = get($freeSlots, $i);
        if (not($rectId)) {
          continue;
        }
        $rect = call_method($this_, "_getRect", $rectId);
        $potentialSlots = call_method($this_, "_splitRect", $rect, $itemSlot);
        for ($ii = 0.0; cmp($ii, '<', get($potentialSlots, "length")); $ii++) {
          $rectId = get($potentialSlots, $ii);
          $rect = call_method($this_, "_getRect", $rectId);
          if (cmp(get($rect, "width"), '>', (float)0.49) && cmp(get($rect, "height"), '>', (float)0.49) && (not($isHorizontal) && cmp(get($rect, "top"), '<', get($layout, "height")) || is($isHorizontal) && cmp(get($rect, "left"), '<', get($layout, "width")))) {
            call_method($newSlots, "push", $rectId);
          }
        }
      }
      if (is(get($newSlots, "length"))) {
        call_method(call_method($this_, "_purgeRects", $newSlots), "sort", is($isHorizontal) ? get($this_, "_sortRectsLeftTop") : get($this_, "_sortRectsTopLeft"));
      }
      if (is($isHorizontal)) {
        set($layout, "width", call_method($Math, "max", get($layout, "width"), _plus(get($itemSlot, "left"), get($itemSlot, "width"))));
      } else {
        set($layout, "height", call_method($Math, "max", get($layout, "height"), _plus(get($itemSlot, "top"), get($itemSlot, "height"))));
      }

      call_method(get($layout, "slots"), "push", get($itemSlot, "left"), get($itemSlot, "top"));
      if (is($trackSize)) {
        call_method(get($this_, "_slotSizes"), "push", get($itemSlot, "width"), get($itemSlot, "height"));
      }
      set($this_, "_freeSlots", $newSlots);
      set($this_, "_newSlots", $freeSlots);
    });
  })));
  set(get($Packer, "prototype"), "_addRect", new Func(function($left = null, $top = null, $width = null, $height = null) {
    $this_ = Func::getContext();
    $rectId = null; $rectStore = null;
    $rectId = set($this_, "_rectId", 1, "+=", false);
    $rectStore = get($this_, "_rectStore");
    set($rectStore, $rectId, (is($or_ = $left) ? $or_ : 0.0));
    set($rectStore, set($this_, "_rectId", 1, "+=", false), (is($or_ = $top) ? $or_ : 0.0));
    set($rectStore, set($this_, "_rectId", 1, "+=", false), (is($or_ = $width) ? $or_ : 0.0));
    set($rectStore, set($this_, "_rectId", 1, "+=", false), (is($or_ = $height) ? $or_ : 0.0));
    return $rectId;
  }));
  set(get($Packer, "prototype"), "_getRect", new Func(function($id = null, $target = null) {
    $this_ = Func::getContext();
    $rectItem = null; $rectStore = null;
    $rectItem = is($target) ? $target : get($this_, "_rectItem");
    $rectStore = get($this_, "_rectStore");
    set($rectItem, "left", (is($or_ = get($rectStore, $id)) ? $or_ : 0.0));
    set($rectItem, "top", (is($or_ = get($rectStore, ++$id)) ? $or_ : 0.0));
    set($rectItem, "width", (is($or_ = get($rectStore, ++$id)) ? $or_ : 0.0));
    set($rectItem, "height", (is($or_ = get($rectStore, ++$id)) ? $or_ : 0.0));
    return $rectItem;
  }));
  set(get($Packer, "prototype"), "_splitRect", call(new Func(function() {
    $results = null;
    $results = new Arr();
    return new Func(function($rect = null, $hole = null) use (&$results) {
      $this_ = Func::getContext();
      set($results, "length", 0.0);
      if (not(call_method($this_, "_doRectsOverlap", $rect, $hole))) {
        call_method($results, "push", call_method($this_, "_addRect", get($rect, "left"), get($rect, "top"), get($rect, "width"), get($rect, "height")));
        return $results;
      }
      if (cmp(get($rect, "left"), '<', get($hole, "left"))) {
        call_method($results, "push", call_method($this_, "_addRect", get($rect, "left"), get($rect, "top"), to_number(get($hole, "left")) - to_number(get($rect, "left")), get($rect, "height")));
      }
      if (cmp(_plus(get($rect, "left"), get($rect, "width")), '>', _plus(get($hole, "left"), get($hole, "width")))) {
        call_method($results, "push", call_method($this_, "_addRect", _plus(get($hole, "left"), get($hole, "width")), get($rect, "top"), to_number(_plus(get($rect, "left"), get($rect, "width"))) - to_number(_plus(get($hole, "left"), get($hole, "width"))), get($rect, "height")));
      }
      if (cmp(get($rect, "top"), '<', get($hole, "top"))) {
        call_method($results, "push", call_method($this_, "_addRect", get($rect, "left"), get($rect, "top"), get($rect, "width"), to_number(get($hole, "top")) - to_number(get($rect, "top"))));
      }
      if (cmp(_plus(get($rect, "top"), get($rect, "height")), '>', _plus(get($hole, "top"), get($hole, "height")))) {
        call_method($results, "push", call_method($this_, "_addRect", get($rect, "left"), _plus(get($hole, "top"), get($hole, "height")), get($rect, "width"), to_number(_plus(get($rect, "top"), get($rect, "height"))) - to_number(_plus(get($hole, "top"), get($hole, "height")))));
      }
      return $results;
    });
  })));
  set(get($Packer, "prototype"), "_doRectsOverlap", new Func(function($a = null, $b = null) {
    return !(cmp(_plus(get($a, "left"), get($a, "width")), '<=', get($b, "left")) || cmp(_plus(get($b, "left"), get($b, "width")), '<=', get($a, "left")) || cmp(_plus(get($a, "top"), get($a, "height")), '<=', get($b, "top")) || cmp(_plus(get($b, "top"), get($b, "height")), '<=', get($a, "top")));
  }));
  set(get($Packer, "prototype"), "_isRectWithinRect", new Func(function($a = null, $b = null) {
    return cmp(get($a, "left"), '>=', get($b, "left")) && cmp(get($a, "top"), '>=', get($b, "top")) && cmp(_plus(get($a, "left"), get($a, "width")), '<=', _plus(get($b, "left"), get($b, "width"))) && cmp(_plus(get($a, "top"), get($a, "height")), '<=', _plus(get($b, "top"), get($b, "height")));
  }));
  set(get($Packer, "prototype"), "_purgeRects", call(new Func(function() {
    $rectA = null; $rectB = null;
    $rectA = new ObjectClass();
    $rectB = new ObjectClass();
    return new Func(function($rectIds = null) use (&$rectA, &$rectB) {
      $this_ = Func::getContext();
      $i = null; $ii = null;
      $i = get($rectIds, "length");
      while (is($i--)) {
        $ii = get($rectIds, "length");
        if (not(get($rectIds, $i))) {
          continue;
        }
        call_method($this_, "_getRect", get($rectIds, $i), $rectA);
        while (is($ii--)) {
          if (not(get($rectIds, $ii)) || $i === $ii) {
            continue;
          }
          if (is(call_method($this_, "_isRectWithinRect", $rectA, call_method($this_, "_getRect", get($rectIds, $ii), $rectB)))) {
            set($rectIds, $i, 0.0);
            break;
          }
        }
      }
      return $rectIds;
    });
  })));
  set(get($Packer, "prototype"), "_sortRectsTopLeft", call(new Func(function() {
    $rectA = null; $rectB = null;
    $rectA = new ObjectClass();
    $rectB = new ObjectClass();
    return new Func(function($aId = null, $bId = null) use (&$rectA, &$rectB) {
      $this_ = Func::getContext();
      call_method($this_, "_getRect", $aId, $rectA);
      call_method($this_, "_getRect", $bId, $rectB);
      return cmp(get($rectA, "top"), '<', get($rectB, "top")) ? -1.0 : (cmp(get($rectA, "top"), '>', get($rectB, "top")) ? 1.0 : (cmp(get($rectA, "left"), '<', get($rectB, "left")) ? -1.0 : (cmp(get($rectA, "left"), '>', get($rectB, "left")) ? 1.0 : 0.0)));
    });
  })));
  set(get($Packer, "prototype"), "_sortRectsLeftTop", call(new Func(function() {
    $rectA = null; $rectB = null;
    $rectA = new ObjectClass();
    $rectB = new ObjectClass();
    return new Func(function($aId = null, $bId = null) use (&$rectA, &$rectB) {
      $this_ = Func::getContext();
      call_method($this_, "_getRect", $aId, $rectA);
      call_method($this_, "_getRect", $bId, $rectB);
      return cmp(get($rectA, "left"), '<', get($rectB, "left")) ? -1.0 : (cmp(get($rectA, "left"), '>', get($rectB, "left")) ? 1.0 : (cmp(get($rectA, "top"), '<', get($rectB, "top")) ? -1.0 : (cmp(get($rectA, "top"), '>', get($rectB, "top")) ? 1.0 : 0.0)));
    });
  })));

  $slotsArray = new Arr();

  foreach ($slots as $slot) {
    $slotObject = new ObjectClass();
    set($slotObject, "_width", $slot['width']);
    set($slotObject, "_height", $slot['height']);
    set($slotObject, "_marginLeft", $slot['marginLeft']);
    set($slotObject, "_marginRight", $slot['marginRight']);
    set($slotObject, "_marginTop", $slot['marginTop']);
    set($slotObject, "_marginBottom", $slot['marginBottom']);
    $slotsArray->push($slotObject);
  }
  
  $packer = _new($Packer);
  $layoutObject =  call_method($packer, 'getLayout', $slotsArray, $totalWidth, $totalHeight);
  
  $layout = [
    'width' => get($layoutObject, 'width'),
    'height' => get($layoutObject, 'height'),
    'setHeight' => get($layoutObject, 'setHeight'),
    'setWidth' => get($layoutObject, 'setWidth'),
    'slots' => get($layoutObject, 'slots')->toArray(),
    'slotSizes' => get($layoutObject, 'slotSizes')->toArray(),
  ];

  return $layout;
}