<?php
require ("Database/DBController.php");
require ("Database/Product.php");
require ("Database/Cart.php");

$db = new DBController();
$product = new Product($db);
$Cart = new Cart($db);

