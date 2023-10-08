<?php require_once "../layouts/header.php"; ?>
<?php 

if(isset($_SESSION['admin_name'])){
  header("location:".url('admin-panel/index.php'));
}


if(isset($_POST['submit'])){
   if(empty($_POST['email']) OR empty($_POST['password'])){
       echo "<script> alert('You need fill inputs') </script>";
   }else{
       $email =  $_POST['email'];
       $password =  $_POST['password'];


       $query = $conn ->query("SELECT * FROM admins WHERE email = '$email' ");
       $query->execute();



       $fetch = $query->fetch(PDO::FETCH_ASSOC);

       if($query->rowCount() > 0) {
          if(password_verify($password , $fetch['password'])){
              //start 

              $_SESSION["admin_name"] = $fetch['adminname'];
              $_SESSION["email"] = $fetch['email'];
              $_SESSION["admin_id"] = $fetch['id'];


              header("location:" .url("admin-panel/index.php"));



          }else{
              echo "<script> alert('email or password is worng') </script>";
          }
       } else {
          echo "<script> alert('email or password is worng') </script>";
       }

       
   }
   
   
}

?>
<div class="row">
        <div class="col-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form method="POST"  class="p-auto" action="login-admins.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
     </div>
    


 <?php require_once "../layouts/footer.php" ?>