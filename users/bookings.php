<?php require_once "../template/header.php"; ?>

<?php
    if(!isset($_SESSION['user_id'])){
        $_SESSION['status'] = [
            'message' => 'you need to login',
            'color' => 'danger'
        ];
            header("location:" .url("index.php"));
    }

    $bookings = $conn->query("SELECT * FROM bookings WHERE user_id='$_SESSION[user_id]'");
    $bookings->execute();

    $allBookings = $bookings->fetchAll(PDO::FETCH_OBJ);

?>

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(<?= url('images/bg_3.jpg')?>);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
    <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Your Bookings</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?= url("index.php") ?>">Home</a></span> <span>Your Bookings</span></p>
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
              <?php if(count($allBookings)> 0): ?>
                <table class="table">
                    <thead class="thead-primary">
                    <tr class="text-center">
                        <th>First_name</th>
                        <th>Last_name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($allBookings as $ea) : ?>

                    <tr class="text-center">
                        <td class="product-remove"><?= $ea->first_name ?></span></a></td>
                        
                        <td class="image-prod">
                            <?= $ea->last_name ?>
                        </td>
                        
                        <td class="text-white">
                            <?= $ea->date ?>
                        </td>

                        <td class="text-white">
                        <?= $ea->time ?>
                        </td>
                        
                        <td class="price"><?= $ea->phone ?></td>
                        
                        <td><?= $ea->message ?></td>
                        
                        <td class="total"><?= $ea->status ?></td>
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