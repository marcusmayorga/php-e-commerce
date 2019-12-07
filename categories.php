<?php
include 'connect.php';
include 'functions/cartfunctions.php';
include 'includes/header.php';

$catid = $_GET['catid'];

$sql = $dbh->prepare("select * from mashorts_products where catid = '$catid'");
$sql->execute();
while ($row = $sql->fetch()){
	$prodid = $row['prodid'];
	$prodname = $row['prodname'];
	$proddesc = $row['proddesc'];
	$prodprice = $row['prodprice'];

	echo '<a href="products.php?prodid='.$prodid.'"><img src = "catimages/'.$catid.'.jpg" height="100"></a>';
	echo '<a href="products.php?prodid='.$prodid.'">'.$prodname.' ...Read more</a><br><br> ';

}

include 'includes/footer.php';
?>