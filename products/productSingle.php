<?php require_once "../template/header.php"; ?>

<?php
    session_start();

if(isset($_GET["id"])){
    $id = $_GET['id'];
    $query = $conn -> query("SELECT * FROM products WHERE id='$id'");
    $query ->execute();

    $singleProducts = $query->fetch(PDO :: FETCH_OBJ);

    $relatedProducts = $conn -> query("SELECT * FROM products WHERE type='$singleProducts->type' AND id != '$singleProducts->id' ");

    $relatedProducts->execute();

    $relatedProducts = $relatedProducts->fetchAll(PDO :: FETCH_OBJ);

    if(isset($_POST['submit'])){

      if(!isset($_SESSION['user_id'])){
        $_SESSION['status'] = [
            'message' => 'you need to login',
            'color' => 'danger'
        ];
            header("location:" .url("index.php"));
    }

      $name =  $_POST['name'];
      $image = $_POST['image'];
      $price = $_POST['price'];
      $pro_id = $_POST['pro_id'];
      $description = $_POST['description'];
      $quantity = $_POST['quantity'];
      $user_id = $_SESSION['user_id'];



      $insert_cart = $conn->prepare("INSERT INTO cart (name , image , price, pro_id , description, quantity , user_id ) VALUES (:name , :image , :price ,:pro_id , :description, :quantity ,:user_id)" );

      try{

        $insert_cart->execute([
          ":name" => $name,
          ":image"=> $image,
          ":price" => $price,
          ":pro_id" => $pro_id,
          ":description" => $description,
          ":quantity" => $quantity,
          ":user_id" => $user_id
        ]);

        if(isset($_SESSION['user_id'])){
          $validateCart = $conn ->query("SELECT * FROM cart WHERE pro_id='$id' AND user_id = '$_SESSION[user_id]'");

          $validateCart->execute();

          $rowCount = $validateCart -> rowCount();

          $_SESSION['status'] = [
            'message' => 'added to cart',
            'color' => 'success'
          ];
          

        }
  
      }catch(PDOException $e){
        print_r($e);
      }



    }

}else{
  header("location:" .url("404.php"));

}


?>

<?php 

    
    if(!empty($_SESSION['status'])){
        echo alert($_SESSION['status']['message'], $_SESSION['status']['color']);
        $_SESSION['status'] = null;
    }

?>
<section class="home-slider owl-carousel">

<div class="slider-item" style="background-image: url(<?= url("images/bg_3.jpg") ?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
  <div class="container">
    <div class="row slider-text justify-content-center align-items-center">

      <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Product Detail</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="<?= url('index.php') ?>">Home</a></span> <span>Product Detail</span></p>
      </div>

    </div>
  </div>
</div>
</section>

<section class="ftco-section">
  <div class="container">
      <div class="row">
          <div class="col-lg-6 mb-5 ftco-animate">
              <a href="<?= url("images/".$singleProducts->image) ?>" class="image-popup"><img src="<?= url("images/".$singleProducts->image) ?>" class="img-fluid" alt="Colorlib Template"></a>
          </div>
          <div class="col-lg-6 product-details pl-md-5 ftco-animate">
              <h3><?= $singleProducts->name ?></h3>
              <p class="price"><span>$<?= $singleProducts->price ?></span></p>
              <p><?= $singleProducts->description ?></p>
                  </p>
                  <div class="row mt-4">
                      <div class="col-md-6">
                          <div class="form-group d-flex">
                              <div class="select-wrap">
                                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                   <select name="" id="" class="form-control">
                                    <option value="">Small</option>
                                    <option value="">Medium</option>
                                    <option value="">Large</option>
                                    <option value="">Extra Large</option>
                                  </select>
                          </div>
              </div>
              </div>
              <div class="w-100"></div>
        <form method="POST" action="<?= url("products/productSingle.php?id=$singleProducts->id") ?>">

              <div class="input-group col-md-6 d-flex mb-3">
                  <span class="input-group-btn mr-2">
                      <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                    <i class="icon-minus"></i>
                      </button>
                      </span>

                  <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                  <span class="input-group-btn ml-2">
                      <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                      <i class="icon-plus"></i>
                  </button>
                  </span>
            </div>
        </div>
          <input name = "name" value = "<?= $singleProducts->name ?>" type="hidden">
          <input name = "image" value = "<?= $singleProducts->image ?>" type="hidden">
          <input name = "price" value = "<?= $singleProducts->price ?>" type="hidden">
          <input name = "pro_id" value = "<?= $singleProducts->id ?>" type="hidden">
          <input name = "description" value = "<?= $singleProducts->description ?>" type="hidden">

          <?php if(isset($_SESSION['user_id'])) : ?>
              <?php if($rowCount > 0 ) : ?>
              <p><button style="color: white !important;" name = "submit" type="submit" class="btn btn-primary py-3 px-5" disabled >Add to Cart</button></p>

              <?php else : ?>
                <p><button style="color: white !important;" name = "submit" type="submit" class="btn btn-primary py-3 px-5"  >Add to Cart</button></p>

              <?php endif ?>
            <?php else : ?>

              <p><a href="<?= url('auth/login.php') ?>"  style="color: white !important;" class="btn btn-primary py-3 px-5"  >login</a></p>

          <?php endif ;?>



        </form>
          </div>
      </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
    <div class="col-md-7 heading-section ftco-animate text-center">
        <span class="subheading">Discover</span>
      <h2 class="mb-4">Related products</h2>
      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
    </div>
  </div>
  <div class="row  justify-content-around">
    <?php foreach($relatedProducts as $ea) : ?>
      <div class="col-md-3">
          <div class="menu-entry">
                  <a href="<?= url("products/productSingle.php?id=$ea->id") ?>" class="img" style="background-image: url(<?= url("images/".$ea->image) ?>);"></a>
                  <div class="text text-center pt-4">
                      <h3><a href="<?= url("products/productSingle.php?id=$ea->id") ?>"><?= $ea ->name ?></a></h3>
                      <p><?= $ea ->description ?></p>
                      <p class="price"><span>$<?= $ea ->price ?></span></p>
                      <p><a href="<?= url("products/productSingle.php?id=$ea->id") ?>" class="btn btn-primary btn-outline-primary px-3 py-2">show details</a></p>
                  </div>
              </div>
      </div>
      <?php endforeach; ?>
      <!-- <div class="col-md-3">
          <div class="menu-entry">
                  <a href="#" class="img" style="background-image: url(images/menu-2.jpg);"></a>
                  <div class="text text-center pt-4">
                      <h3><a href="#">Coffee Capuccino</a></h3>
                      <p>A small river named Duden flows by their place and supplies</p>
                      <p class="price"><span>$5.90</span></p>
                      <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                  </div>
              </div>
      </div>
      <div class="col-md-3">
          <div class="menu-entry">
                  <a href="#" class="img" style="background-image: url(images/menu-3.jpg);"></a>
                  <div class="text text-center pt-4">
                      <h3><a href="#">Coffee Capuccino</a></h3>
                      <p>A small river named Duden flows by their place and supplies</p>
                      <p class="price"><span>$5.90</span></p>
                      <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                  </div>
              </div>
      </div>
      <div class="col-md-3">
          <div class="menu-entry">
                  <a href="#" class="img" style="background-image: url(images/menu-4.jpg);"></a>
                  <div class="text text-center pt-4">
                      <h3><a href="#">Coffee Capuccino</a></h3>
                      <p>A small river named Duden flows by their place and supplies</p>
                      <p class="price"><span>$5.90</span></p>
                      <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                  </div>
              </div>
      </div> -->
  </div>
  </div>
</section>

<?php require_once "../template/footer.php"; ?>

