<?php

function checkRoute($name) {
  return \Request::is($name);
}

function isAdmin() {
  $user = \Auth::user();
  return $user ? $user->user_level === 3 : false;
}

function isOrganizer() {
  $user = \Auth::user();
  return $user ? $user->user_level === 2 : false;
}

function isUser() {
  $user = \Auth::user();
  return $user ? $user->user_level <= 1 : false;
}

if(!function_exists('array_swap_assoc')) {
  function array_swap_assoc($key1, $key2, $array) {
      $newArray = array ();
      foreach ($array as $key => $value) {
          if ($key == $key1) {
              $newArray[$key2] = $array[$key2];
          } elseif ($key == $key2) {
              $newArray[$key1] = $array[$key1];
          } else {
              $newArray[$key] = $value;
          }
      }
      return $newArray;
  }
}

?>