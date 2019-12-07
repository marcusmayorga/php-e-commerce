<?php
error_reporting(E_ALL);
session_start();
$sessid = session_id();
$dbh = new PDO("mysql:host=localhost;dbname=mayo85_mashorts", "mayo85_mashorts", "HRx*@W+[0AKj");
$admin = 'mashorts_admin';
$categories = 'mashorts_categories';
$products = 'mashorts_products';
$cartitems = 'mashorts_cartitems';
?>