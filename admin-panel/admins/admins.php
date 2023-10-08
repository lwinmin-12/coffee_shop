<?php require_once "../layouts/header.php"; ?>

<?php

if(!isset($_SESSION['admin_name'])){
  header('location:'.url('admin-panel/admins/login-admins.php'));
}

  $admins = $conn->query("SELECT * FROM admins");

  $admins->execute();

  $allAdmins = $admins->fetchAll(PDO::FETCH_OBJ);

?>

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4 d-inline">Admins</h5>
            <a  href="create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">username</th>
                  <th scope="col">email</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($allAdmins as $ea) : ?>
                <tr>
                  <th scope="row"><?= $ea->id ?></th>
                  <td><?= $ea->adminname ?></td>
                  <td><?= $ea->email ?></td>
                  
                </tr>

              <?php endforeach; ?>
                <!-- <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                  
                </tr> -->
              </tbody>
            </table> 
          </div>
        </div>
      </div>
    </div>

<?php require_once "../layouts/footer.php"; ?>
