<?php

use Doctrine\Inflector\InflectorFactory;

function pluralize($singular, $count = 1, $plural = null) {
  if ($count == 1) {
    return $singular;
  }
  $inflector = InflectorFactory::create()->build();
  return is_null($plural) ? $inflector->pluralize($singular) : $plural;
}

function quantify($singular, $count = 1, $plural = null) {
  $noun = pluralize($singular, $count, $plural);
  return $count . ' ' . $noun;
}

function removeorphans($text,$minWords = 3) {
  $return = $text;
  $arr = explode(' ',$text);
  if(count($arr) >= $minWords) {
          $arr[count($arr) - 2].= '&nbsp;'.$arr[count($arr) - 1];
          array_pop($arr);
          $return = implode(' ',$arr);
  }
  return $return;
}
