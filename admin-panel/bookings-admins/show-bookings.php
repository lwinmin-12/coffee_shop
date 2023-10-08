<?php require_once "../layouts/header.php"; ?>

<?php 

if(!isset($_SESSION['admin_name'])){
  header("location:".url('admin-panel/index.php'));
}

$bookings = $conn->query("SELECT * FROM bookings");

$bookings->execute();

$AllBookings = $bookings->fetchAll(PDO::FETCH_OBJ);


?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Bookings</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">first_name</th>
                    <th scope="col">last_name</th>
                    <th scope="col">date</th>
                    <th scope="col">time</th>
                    <th scope="col">phone</th>
                    <th scope="col">message</th>
                    <th scope="col">status</th>
                    <th scope="col">created_at</th>
                    <th scope="col">action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($AllBookings as $ea) : ?>

                  <tr>
                    <th scope="row"><?= $ea->id ?></th>
                    <td><?= $ea->first_name?></td>
                    <td><?= $ea->last_name?></td>
                    <td><?= $ea->date?> </td>
                    <td><?= $ea->time?></td>
                    <td><?= $ea->phone?></td>
                    <td><?= $ea->message?></td>
                    <td><?= $ea->status?></td>
                    <td><?= $ea->create_at?></td>
                     <td class="d-flex row btn-group">
                      <a href=<?= url("admin-panel/bookings-admins/change-bookings.php?id=".$ea->id) ?> class="btn btn-warning  text-center col-6 px-1 py-0">edit</a>  
                      <a href=<?= url("admin-panel/bookings-admins/delete-bookings.php?id=".$ea->id) ?> class="btn btn-danger  text-center col-6 px-1 py-0">del</a>
                    </td>
                  </tr>
                
                <?php endforeach; ?>
                
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

<?php require_once "../layouts/footer.php" ?>
