<?php
include 'connect.php';
include 'functions/cartfunctions.php';
include 'includes/header.php';
$sql = $dbh->prepare("select mashorts_products.prodid, mashorts_products.prodname, mashorts_products.prodprice, mashorts_cartitems.qty
	from mashorts_products, mashorts_cartitems
	where mashorts_products.prodid = mashorts_cartitems.productid
	and mashorts_cartitems.sessionid = '$sessid'");
$sql->execute();
  

?>
<script>
	function sameship(){
		if (document.getElementById('ship').checked == true){
    document._xclick.billfirst_name.value = document._xclick.first_name.value;
    document._xclick.billlast_name.value = document._xclick.last_name.value;
    document._xclick.billaddress1.value = document._xclick.address1.value;
    document._xclick.billcity.value = document._xclick.city.value;
    document._xclick.billzip.value = document._xclick.zip.value;
	    }
	    else {
    document._xclick.billfirst_name.value = '';
    document._xclick.billlast_name.value = '';
    document._xclick.billaddress1.value = '';
    document._xclick.billcity.value = '';
    document._xclick.billzip.value = '';
	    }

	}


</script>

<form action= "https://www.sandbox.paypal.com/us/cgi-bin/webscr" 
method="post"  name="_xclick" class="cart-form pure-form pure-form-stacked">
<h2 class="your-cart-heading">Your Cart</h2>
<?php
$i=1;
while  ($row = $sql->fetch()){
  	$prodid = $row['prodid'];
	$prodname = $row['prodname'];
	$prodprice = $row['prodprice'];
	$qty = $row['qty'];
    echo '<img src = "prodimages/'.$prodid.'.jpg" height="200"><br>';
	echo $prodname.'<br>'.$prodprice.' QTY: '.$qty.'<br><br>';
echo '<input type = "hidden" name = "item_name_'.$i.'" value = "'.$prodname.'" /><input type = "hidden" name = "amount_'.$i.'" value = "'.$prodprice.'" /> 
<input type = "hidden" name = "quantity_'.$i.'" value = "'.$qty.'" /> ';
$i++;
}
?>

  <h3 class="form-heading--text">Shipping:</h3>
  First Name
  <input type = "text" id = "firstname" name = "first_name" />
  <br/>
  Last Name
  <input type = "text" name = "last_name" />
  <br/>
  Address
  <textarea name = "address1"></textarea>
  <br/>
  City
  <input type = "text" name = "city"  id = "city"/>
  <br/>
  State
  <input type = "text" name = "state"  id = "state" />
  <br/>
  Zip:
  <input type = "text" name = "zip" id = "zip"/>
  <br/>
  <h3 class="form-heading--text">Billing:</h3>
  Same as Shipping?
  <input type = "checkbox" id = "ship" onClick="sameship();"/>
  <br/>

  First Name
  <input type = "text" id = "billfirst_name" name = "billfirst_name" />
  <br/>
  Last Name
  <input type = "text" name = "billlast_name" />
  <br/>
  Address
  <textarea name = "billaddress1"></textarea>
  <br/>
  <span id = "citystate" style="display:none"> City
  <input type = "text" name = "billcity"/>
  <br/>
  State
  <input type = "text" name = "billstate"/>
  <br/>
  </span> 
  Zip:
  <input type = "text" name = "billzip" onblur="makeRequest('state');"/>
  <br/>
  Email:
  <input type = "text" name = "email" />
  <br/>
  Phone:
  <input type = "text" name = "night_phone_a" />
  <br/>
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="mayorga.ml-facilitator@gmail.com">
  <input type="hidden" name="upload" value="1">
  <input type="hidden" name="currency_code" value="USD">
  <input type = "hidden" name = "shipping_1" value = "0.00"/><input type ="hidden" id ="subtotal" name = "subtotal" value = "0.00"><br/>Subtotal:$ <div id = "copy">Shipping is</div>
  <input class="cart-submit-btn submit-btn" type="submit" name = "submit" value = "Check Out">
</form>
<?php
include 'includes/footer.php';
?>