<?php
// $_COOKIE["user"] = "aaa";
// if (!isset($_COOKIE["user"]) || empty(($_COOKIE["user"])) ) {
// echo "hakan2";
// } else {
//   setcookie("login", "hakan", time()+60*60*24);
//   echo $_COOKIE["login"];
//
// }

setcookie("mycookie", "This cookie tastes good", time()+3600);

echo $_COOKIE["mycookie"];



 ?>
