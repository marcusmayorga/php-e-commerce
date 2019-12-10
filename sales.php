<?php
include 'connect.php';
include 'functions/cartfunctions.php';
include 'includes/header.php';
error_reporting(0);
$prodid = $_POST['prodid'];
$qty = $_POST['qty'];

if (isset($qty)){
    addtocart($prodid,$qty);
}

?>
      <section class="products">
        <h2 class="products__section-title">Sales</h2>
        <?php

    $sql = $dbh->prepare("select * from mashorts_products where featured = 'yes'");
    $sql->execute();
    $i=1;
    while ($row = $sql->fetch()){
        $prodid = $row['prodid'];
        $prodname = $row['prodname'];
        $proddesc = $row['proddesc'];
        $prodprice = $row['prodprice'];
        $picname = 'prodimages/'.$prodid.'.jpg';

        echo '
        <div class="products__card products__card--long prod'.$i.'">
          <div class="products__card--sale">
            <p class="products__card--sale-text">On Sale</p>
          </div>
          <img
            src="'.$picname.'"
            alt="'.$prodname.'"
            class="products__card--image"
          />
          <div class="products__card--contain">
            <h3 class="products__card--title">'.$prodname.'</h3>
            <p class="products__card--price">
              '.$prodprice.' <span class="products__card--price-strike">$69.99</span>
            </p>
            <div>
            
            </div>

            <div class="products__card--reviews">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <span class="products__card--reviews-text">(104 Reviews)</span>
            </div>
            <form action = "index.php" method="post">
           <input type="hidden" name="qty" value="1" required="required"/>

           <input type="hidden" name="prodid" value="'.$prodid.'" required="required"/>
             <input type="submit" class="cart-submit-btn cart-submit-btn--small fas fa-shopping-cart" value="Add to Cart">
           </form>
          </div>
        </div>
        
        ';
        $i++;
    } ?>
      </section>
      <?php
      include 'includes/footer.php';
      ?>