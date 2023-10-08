
<?php require_once "../layouts/header.php"; ?>

<?php 

if(!isset($_SESSION['admin_name'])){
  header("location:".url('admin-panel/index.php'));
}

$products = $conn->query("SELECT * FROM products");

$products->execute();

$AllProducts = $products->fetchAll(PDO::FETCH_OBJ);

?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Foods</h5>
              <a  href="create-products.php" class="btn btn-primary mb-4 text-center float-right">Create Products</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">price</th>
                    <th scope="col">type</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach ($AllProducts as $ea)  :?>
                  <tr>
                     <th scope="row"><?= $ea->id ?></th>
                     <td><?= $ea->name ?></td>
                     <td><img src=<?= url("images/".$ea->image) ?> style="width: 50px ; height : 50px" alt=""></td>
                     <td>$<?= $ea->price ?></td>
                     <td><?= $ea->type ?></td>
                     <td><a href=<?= url('admin-panel/products-admins/delete-products.php?id='.$ea->id) ?> class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                <?php endforeach; ?>
                  <!-- <tr>
                    <th scope="row">1</th>
                    <td>Pizza</td>
                    <td>image</td>
                    <td>$1300</td>
                    <td>drink</td>
                     <td><a href="delete-products.html" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Pizza</td>
                    <td>image</td>
                    <td>$1300</td>
                    <td>drink</td>
                     <td><a href="delete-products.html" class="btn btn-danger  text-center ">delete</a></td>
                  </tr> -->
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

<?php require_once "../layouts/footer.php" ?>
