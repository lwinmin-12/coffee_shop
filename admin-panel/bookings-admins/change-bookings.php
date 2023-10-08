<?php require_once "../layouts/header.php"; ?>

<?php

if(!isset($_SESSION['admin_name'])){
    header('location:'.url('admin-panel/admins/login-admins.php'));
  }


if(isset($_GET['id'])){
  $id = $_GET['id'];
  if(isset($_POST['submit'])){
    if(empty($_POST['status'])){
        echo "<script> alert('You need fill inputs') </script>";
    }else{
        $status = $_POST['status'];
  
        $update = $conn->prepare("UPDATE bookings SET status = :status WHERE id='$id' ");
  
        $update->execute([
          ":status" => $status,
        ]);
  
        header("location:".url('admin-panel/bookings-admins/show-bookings.php'));
  
    }
  
  }
}
?>
<div class="row">
<div class="col">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title mb-5 d-inline">Update Booking Status</h5>
      <form method="POST" action="change-bookings.php?id=<?= $id ?>">
        <div class="form-outline mb-4 mt-4">

        <select name="status" class="form-select  form-control" aria-label="Default select example">
          <option selected>Choose Type</option>
          <option value="Pending">Pending</option>
          <option value="Done">Done</option>
        </select>

        </div>

       
        <!-- Submit button -->
        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

  
  </form>

    </div>
  </div>
</div>
</div>

<?php require_once "../layouts/footer.php"; ?>
