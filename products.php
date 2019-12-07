<?php
include 'connect.php';
include 'functions/cartfunctions.php';
include 'includes/header.php';
//require 'search.php';

$prodid = $_GET['prodid'];
$qty = $_POST['qty'];

if (isset($qty)){
	addtocart($prodid,$qty);
}

$sql = $dbh->prepare("select * from mashorts_products where prodid = '$prodid'");
$sql->execute();
   $row = $sql->fetch();
	$prodid = $row['prodid'];
	$prodname = $row['prodname'];
	$proddesc = $row['proddesc'];
	$prodprice = $row['prodprice'];
    echo '<img src = "prodimages/'.$prodid.'.jpg" height="200"><br>';
	echo $prodname.'<br>'.$proddesc.'<br>'.$prodprice;
	echo '<form action = "'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'" method="post">
	<input type="number" name="qty" class="small" size="5" value="1" required="required"/>
	<input type="submit" value="Add to Cart">
	</form>
	';
	include 'includes/footer.php';

?>
