<?php

$connection = mysqli_connect(
  'localhost', 'root', '', 'tienda'
);

// for testing connection
#if($connection) {
 # echo 'database is connected';
#}

?>
