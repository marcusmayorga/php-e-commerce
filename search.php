<?php
include 'connect.php';
include 'functions/cartfunctions.php';
include 'includes/header.php';
?>

<form action ="search.php" method="get">
<input type="text" name="qry">
<button>Search</button>
</form>	
<?php
require 'connect.php';

if ($_GET['qry']  == ''){
	$qry = ' ';
}
else {
  $qry = $_GET['qry'];
}

	//how to write difficult queries
	
   //get the number of results....
if (!empty($qry) && $qry != ' '){
?>
<script>
    var current = localStorage.getItem('recent');
    localStorage.setItem('recent',current + ',<?php echo $qry;?>');
  </script>  
<?php
}
	$num = $dbh->prepare("select  count(fa19_products.prodid) as numres
       from fa19_categories, fa19_products
       where (fa19_categories.catname like '%$qry%' or 
       fa19_products.prodname like '%$qry%' or fa19_products.proddesc like '%$qry%') and fa19_categories.catid = fa19_products.catid");


	$num->execute();
	$row = $num->fetch();
		echo " Your search for ".$qry." generated ".$row['numres']." results<br>";

    

	//get what you want how you want....
   $sql = $dbh->prepare("select fa19_categories.catid, fa19_categories.catname, fa19_products.prodid, fa19_products.prodname, fa19_products.proddesc,fa19_products.prodprice
       from fa19_categories, fa19_products
       where (fa19_categories.catname like '%$qry%' or 
       fa19_products.prodname like '%$qry%' or fa19_products.proddesc like '%$qry%') and fa19_categories.catid = fa19_products.catid");


  
   $sql->execute();


   while ($row = $sql->fetch()){
   	$catid = $row['catid'];
   	$catname = $row['catname'];
   	$prodid = $row['prodid'];
   	$prodname = $row['prodname'];
   	$proddesc = $row['proddesc'];
   	$prodprice = $row['prodprice'];
   	echo '<h3>'.$prodname.'</h3>
   	<p><a href="products.php?prodid='.$prodid.'" title="click to see more"><img src = "prodimages/'.$prodid.'.jpg" height="200"></a></p>
   	<p>'.$proddesc.'</p>
   	<p><strong>$'.money_format('%i',$prodprice).'</strong></p>
 	<br><br>';
   	
   }





?>


