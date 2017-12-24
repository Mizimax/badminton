<?php

function checkRoute($name) {
  return \Request::is($name);
}

?>