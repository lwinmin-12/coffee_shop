
<?php require_once "../layouts/header.php"; ?>

<?php

if(!isset($_SESSION['admin_name'])){
  header('location:'.url('admin-panel/admins/login-admins.php'));
}
$orders = $conn->query("SELECT * FROM orders");

$orders->execute();

$allorders = $orders->fetchAll(PDO::FETCH_OBJ);



?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">first_name</th>
                    <th scope="col">last_name</th>
                    <th scope="col">town</th>
                    <th scope="col">state</th>
                    <th scope="col">zip_code</th>
                    <th scope="col">phone</th>
                    <th scope="col">street_address</th>
                    <th scope="col">total_price</th>
                    <th scope="col">status</th>
                    <!-- <th scope="col">update</th> -->
                    <th scope="col">action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allorders as $ea) : ?>
                  <tr>
                    <th scope="row"><?= $ea->id ?></th>
                    <td><?= $ea->first_name ?></td>
                    <td><?= $ea->last_name ?></td>
                    <td><?= $ea->town ?></td>
                    <td><?= $ea->state ?></td>
                    <td>
                    <?= $ea-> zip_code ?>
                    </td>
                    <td><?= $ea->phone ?></td>
                    <td><?= $ea->street_address ?></td>
                    <td>$<?= $ea->total_price ?></td>

                    <td><?= $ea->status ?></td>
                    <td class="d-flex row btn-group">
                      <a href=<?= url("admin-panel/orders-admins/change-status.php?id=".$ea->id) ?> class="btn btn-warning  text-center col-6 px-1 py-0">edit</a>  
                      <a href=<?= url("admin-panel/orders-admins/delete-orders.php?id=".$ea->id) ?> class="btn btn-danger  text-center col-6 px-1 py-0">del</a>
                    </td>
                  </tr>
                    <?php endforeach;?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
<?php require_once "../layouts/footer.php"; ?>
