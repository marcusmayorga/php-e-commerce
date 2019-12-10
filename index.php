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
      <div class="hero">
        <div class="hero__overlay"></div>
        <div class="hero__title">
          <h1 class="hero__title--text">New</h1>
          <h1>
            <span class="hero__title--text hero__title--text-break-line"
              >Arrivals</span
            >
          </h1>
        </div>
      </div>
      <section class="products">
        <h2 class="products__section-title">Featured Releases</h2>
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
        <a id="modalBtn'.$i.'" class="button">
        <div class="products__card prod'.$i.'">
          <div class="products__card--sale">
            <p class="products__card--sale-text">On Sale</p>
          </div>
          <img
            src="'.$picname.'"
            alt="'.$prodname.'"
            title="'.$prodname.'"
            class="products__card--image"
          />
          <div class="products__card--contain">
            <h3 class="products__card--title">'.$prodname.'</h3>
            <p class="products__card--price">
              '.$prodprice.' <span class="products__card--price-strike">$69.99</span>
            </p>

            <div class="products__card--reviews">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <span class="products__card--reviews-text">(104 Reviews)</span>
            </div>
          </div>
        </div>
        </a>

        <div id="simpleModal'.$i.'" class="modal">
        <div class="modal-content">
          <div class="modal-header">
          <span class="closeBtn">&times;</span>
          <h2 class="modal-header--text">'.$prodname.'</h2>
          </div>
            <div class="modal-body">
            <!-- Product Card -->
              <div class="products__card prod'.$i.'">
                <div class="products__card--sale">
                  <p class="products__card--sale-text">On Sale</p>
                </div>
                <img
                  src="'.$picname.'"
                  alt="'.$prodname.'"
                  title="'.$prodname.'"
                  class="products__card--image"
                />
                <div class="products__card--contain">
                  <h3 class="products__card--title">'.$prodname.'</h3>
                  
                  <p class="products__card--price">
                    '.$prodprice.' <span class="products__card--price-strike">$69.99</span>
                  </p>
      
                </div>
              </div>
              <h3>Product<h3>
              <p class="products__card--desc">'.$proddesc.'</p>
              <!-- END Product Card -->
            </div>
            <div class="modal-footer">
            <form action = "index.php" method="post">
           <input type="hidden" name="qty" value="1" required="required"/>

           <input type="hidden" name="prodid" value="'.$prodid.'" required="required"/>
             <input type="submit" class="fas fa-shopping-cart modal-footer--text" value="Add to Cart">
           </form>
            </div>
        </div>
      </div>
        ';
        $i++;
    } ?>
      </section>
      <?php
      include 'includes/footer.php';
      ?>