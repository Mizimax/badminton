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

?>