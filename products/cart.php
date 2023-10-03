<?php require_once "../template/header.php"; ?>

<?php 

try{

    if(!isset($_SESSION['user_id'])){
        $_SESSION['status'] = [
            'message' => 'you need to login',
            'color' => 'danger'
        ];
            header("location:" .url("index.php"));
    }

    $products = $conn->query("SELECT * FROM cart WHERE user_id='$_SESSION[user_id]'");

    $products->execute();

    $productsAll = $products->fetchAll(PDO::FETCH_OBJ);

    $cartTotal = $conn -> query("SELECT SUM(quantity * price) AS total FROM cart WHERE user_id='$_SESSION[user_id]'");
    $cartTotal->execute();

    $allCartTotal = $cartTotal->fetch(PDO :: FETCH_OBJ);

    $relatedQuery =$conn->query("SELECT * FROM products");
    $relatedQuery->execute();

    $relatedProducts = $relatedQuery->fetchAll(PDO::FETCH_OBJ);


    if(isset($_POST['checkout'])){
        $_SESSION['total_price'] = $_POST['total_price'];

        header("location:" .url("products/checkout.php"));
    }

}catch(PDOException $e) {
    print_r($e);
}

   


?>

<section class="home-slider owl-carousel">
<div class="slider-item" style="background-image: url(<?= url('images/bg_3.jpg')?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
  <div class="container">
    <div class="row slider-text justify-content-center align-items-center">

      <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Cart</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="<?= url("index.php") ?>">Home</a></span> <span>Cart</span></p>
      </div>

    </div>
  </div>
</div>
</section>
<?php if(count($productsAll)> 0): ?>
  
  <section class="ftco-section ftco-cart">
      <div class="container">
          <div class="row">
          <div class="col-md-12 ftco-animate">

              <div class="cart-list">
                <table class="table">
                    <thead class="thead-primary">
                    <tr class="text-center">
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($productsAll as $ea) : ?>

                    <tr class="text-center">
                        <td class="product-remove"><a href="<?= url('products/deleteProduct.php?id='.$ea->id) ?>"><span class="icon-close"></span></a></td>
                        
                        <td class="image-prod"><div class="img" style="background-image:url(<?= url('images/'.$ea->image) ?>);"></div></td>
                        
                        <td class="product-name">
                            <h3><?= $ea->name ?></h3>
                            <p><?= $ea->description ?></p>
                        </td>
                        
                        <td class="price">$<?= $ea->price ?></td>
                        
                        <td>
                            <div class="input-group mb-3">
                                <input disabled type="text" name="quantity" class="quantity form-control input-number" value="<?= $ea->quantity ?>" min="1" max="100">
                            </div>
                        </td>
                        
                        <td class="total">$<?= $ea->price * $ea->quantity ?></td>
                    </tr><!-- END TR-->


                    <?php endforeach ; ?>

                    <!-- <tr class="text-center">
                        <td class="product-remove"><a href="#"><span class="icon-close"></span></a></td>
                        
                        <td class="image-prod"><div class="img" style="background-image:url(images/dish-2.jpg);"></div></td>
                        
                        <td class="product-name">
                            <h3>Grilled Ribs Beef</h3>
                            <p>Far far away, behind the word mountains, far from the countries</p>
                        </td>
                        
                        <td class="price">$15.70</td>
                        
                        <td class="quantity">
                            <div class="input-group mb-3">
                            <input disabled type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                        </div>
                    </td>
                        
                        <td class="total">$15.70</td>
                    </tr>END TR -->
                    </tbody>
                </table>
              </div>


          </div>
      </div>
      <div class="row justify-content-end">
          <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
              <div class="cart-total mb-3">
                  <h3>Cart Totals</h3>
                  <p class="d-flex">
                      <span>Subtotal</span>
                      <span>$<?= $allCartTotal->total ?></span>
                  </p>
                  <p class="d-flex">
                      <span>Delivery</span>
                      <span>$0.00</span>
                  </p>
                  <p class="d-flex">
                      <span>Discount</span>
                      <span>$3.00</span>
                  </p>
                  <hr>
                  <p class="d-flex total-price">
                      <span>Total</span>
                      <span>$<?= $allCartTotal->total + 0 - 3 ?></span>
                  </p>
              </div>
              <form method="POST" action="cart.php" >
              <input name="total_price" value="<?= $allCartTotal->total + 0 - 3 ?>" type="hidden">
              <?php if(count($productsAll)> 0): ?>
              <p class="text-center"><button  style="color: white !important;"  name="checkout" type="submit" class="btn btn-primary py-3 px-4">Proceed to Checkout</button></p>
              <?php endif;?>
              </form>
             
          </div>
      </div>
      </div>
  </section>
<?php endif;?>

<section class="ftco-section">
  <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
    <div class="col-md-7 heading-section ftco-animate text-center">
        <span class="subheading">Discover</span>
      <h2 class="mb-4">Related products</h2>
      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
    </div>
  </div>
  <div class="row">
    <?php foreach( $relatedProducts as $ea ) : ?>
        <div class="col-md-3">
                <div class="menu-entry">
                    <a target="_blank" href="<?= url("images/$ea->image") ?>" class="img" style="background-image: url(<?= url("images/$ea->image") ?>);"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#"><?= $ea->name ?></a></h3>
                        <p><?= $ea->description ?></p>
                        <p class="price"><span>$<?= $ea->price ?></span></p>
                        <p><a href="<?= url("products/productSingle.php?id=$ea->id") ?>" class="btn btn-primary btn-outline-primary px-3 py-2">Add to Cart</a></p>
                    </div>
                </div>
            </div>
      <?php endforeach; ?>
  </div>
  </div>
</section>

<?php require_once "../template/footer.php"; ?>