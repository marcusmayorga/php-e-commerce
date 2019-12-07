<?php
function numcartitems($sessid){
	$dbh = new PDO("mysql:host=localhost;dbname=mayo85_mashorts", "mayo85_mashorts", "HRx*@W+[0AKj");
   $sql = $dbh->prepare("select count(productid) from mashorts_cartitems where sessionid = '$sessid'");
   $sql->execute();	
   $row = $sql->fetch();
   $num = $row[0];
   return $num;
}






function addtocart($pid,$qty){
	$sessid = session_id();
	$dbh = new PDO("mysql:host=localhost;dbname=mayo85_mashorts", "mayo85_mashorts", "HRx*@W+[0AKj");
	$checksql = $dbh->prepare("select productid from mashorts_cartitems where productid = ? and sessionid = '$sessid'");
	$checksql->bindValue(1,$pid);
	$checksql->execute();
	$checkpid = $checksql->fetch();
	$existingpid = $checkpid[0];
	if (is_numeric($existingpid)){
		$sql = $dbh->prepare(" update mashorts_cartitems set qty = ? where productid = '$pid' and sessionid = '$sessid'");
		$sql->bindValue(1,$qty);
		$sql->execute();
		    echo '<script>alert("Quantity updated!");</script>';

	}
	else {
	$sql = $dbh->prepare("insert into mashorts_cartitems (productid,qty,sessionid) values (?,?,?)");
	$sql->bindValue(1,$pid);
	$sql->bindValue(2,$qty);
	$sql->bindValue(3,$sessid);
	$sql->execute();
	//print_r($sql->errorInfo());
    echo '<script>alert("Added to Cart!");</script>';
  }
}
?>