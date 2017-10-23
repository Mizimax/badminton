<?php
/**
 * Created by PhpStorm.
 * User: meenkx
 * Date: 10/19/2017 AD
 * Time: 3:35 AM
 */
function current_page($uri = "/") {
    return strstr(request()->path(), $uri);
}