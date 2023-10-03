<?php require_once "../template/header.php"; ?>

<?php
    if(!isset($_SESSION['user_id'])){
        $_SESSION['status'] = [
            'message' => 'you need to login',
            'color' => 'danger'
        ];
            header("location:" .url("index.php"));
    }

    $orders = $conn->query("SELECT * FROM orders WHERE user_id='$_SESSION[user_id]'");
    $orders->execute();

    $allOrders = $orders->fetchAll(PDO::FETCH_OBJ);

?>

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(<?= url('images/bg_3.jpg')?>);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
    <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Your Orders</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?= url("index.php") ?>">Home</a></span> <span>Your Orders</span></p>
        </div>

        </div>
    </div>
    </div>
</section>

    <section class="ftco-section ftco-cart">
      <div class="container">
          <div class="row">
          <div class="col-md-12 ftco-animate">

              <div class="cart-list">
              <?php if(count($allOrders)> 0): ?>
                <table class="table">
                    <thead class="thead-primary">
                    <tr class="text-center">
                        <th>first_name</th>
                        <th>last_name</th>
                        <th>state</th>
                        <th>street_address</th>
                        <th>phone</th>
                        <th>status</th>
                        <th>total_price</th>
                        <th>Write Review</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($allOrders as $ea) : ?>

                    <tr class="text-center">
                        <td class="total"><?= $ea->first_name ?></span></a></td>
                        
                        <td class="total">
                            <?= $ea->last_name ?>
                        </td>
                        
                        <td class="text-white">
                            <?= $ea->state ?>
                        </td>

                        <td class="text-white">
                        <?= $ea->street_address ?>
                        </td>
                        
                        <td class="price"><?= $ea->phone ?></td>
                        
                        
                        <td class="total"><?= $ea->status ?></td>

                        <td class="total">$ <?= $ea->total_price ?></td>
                        <td class="total">
                        <?php if($ea->status == "Delivered") : ?>
                            <a class="btn btn-primary text-white" href="<?= url("reviews/writeReview.php") ?>">
                                write review
                            </a>
                        <?php endif;?>
                        </td>


                    </tr>


                    <?php endforeach ; ?>
                    </tbody>
                </table>
                <?php else : ?>
                    There is no Booking.
                <?php endif;?>
              </div>


          </div>
      </div>

    </section>




  <?php require_once "../template/footer.php" ?>
