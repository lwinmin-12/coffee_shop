<?php require_once "layouts/header.php"; ?>
<?php
  if(!isset($_SESSION['admin_name'])){
    header('location:'.url('admin-panel/admins/login-admins.php'));
  }
  //orders
  $orders =  $conn->query("SELECT COUNT(*) AS count_orders FROM orders");
  $orders->execute();

  $ordersCounts = $orders->fetch(PDO::FETCH_OBJ);

  //booking
  $bookings =  $conn->query("SELECT COUNT(*) AS count_bookings FROM bookings");
  $bookings->execute();

  $bookingCounts = $bookings->fetch(PDO::FETCH_OBJ);

  //products
  $products =  $conn->query("SELECT COUNT(*) AS count_products FROM products");
  $products->execute();

  $productCounts = $products->fetch(PDO::FETCH_OBJ);

  //admin
  $admins =  $conn->query("SELECT COUNT(*) AS count_admins FROM admins");
  $admins->execute();

  $adminCounts = $admins->fetch(PDO::FETCH_OBJ);

?>
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Products</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of products: <?= $productCounts->count_products ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Orders</h5>
              
              <p class="card-text">number of orders: <?= $ordersCounts->count_orders ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bookings</h5>
              
              <p class="card-text">number of bookings: <?= $bookingCounts->count_bookings ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?= $adminCounts->count_admins ?></p>
              
            </div>
          </div>
        </div>
      </div>
     <!--  <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> -->
<?php require_once "layouts/footer.php"; ?>
