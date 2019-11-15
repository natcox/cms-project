
<!DOCTYPE html>

<html lang="en">

<?php include "includes/admin_header.php"; ?>
<?php  if(isset($_POST['update_profile'])){ updateProfile(); } ?>
<?php if(isset($_SESSION['username'])) {

  $username = $_SESSION['username'];

  $query = "SELECT * FROM users WHERE user_username = '{$username}' ";
  $select_user_profile_query = mysqli_query($connection, $query);


  while($row = mysqli_fetch_array($select_user_profile_query)){
    $user_id = $row['user_id'];
    $user_username = $row['user_username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_role = $row['user_role'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_status = $row['user_status'];
    $user_date = $row['user_date'];


  }
}


?>

<body>
<?php



 ?>


    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>
            <!-- /.navbar-collapse -->


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Users
                            <small> <?php if(isset($_SESSION['username'])) {echo $_SESSION['username']; } ?></small>
                        </h1>

                        <form action ="" method="post" enctype="multipart/form-data">

                          <div class="form-group">
                              <label for="user_firstname">First Name</label>
                              <input type="text" value ="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
                          </div>

                          <div class="form-group">
                              <label for="user_lastname">Last Name</label>
                              <input type="text" value ="<?php echo $user_lastname; ?>"  class="form-control" name="user_lastname">
                          </div>

                        <div>
                          <select name="user_role" id="">
                        <option value = "<?php echo $user_role; ?>"><?php echo $user_role; ?></options>
                        <?php
                        if($user_role=='Admin'){
                        ?>
                        <option value ="Subscriber">Subscriber</options>
                        <?php
                        } else {
                        ?>
                          <option value="Admin">Admin</option>
                        <?php
                        }

                        ?>


                            </select>
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="email" value ="<?php echo $user_email; ?>" class="form-control" name="user_email">
                        </div>

                        <div class="form-group">
                           <label for="image">User Image</label>
                               <img width="100" src="../images/<?php echo $user_image; ?>">
                           <input type="file" name="image" value ="<?php echo $user_image; ?>" >
                        </div>


                        <div class="form-group">
                            <label for="user_username">Username</label>
                            <input type="text"  value ="<?php echo $user_username; ?>" class="form-control" name="user_username">
                        </div>

                        <div class="form-group">
                            <label for="user_password">Password</label>
                            <input type="password" value ="<?php echo $user_password; ?>" class="form-control" name="user_password">
                        </div>


                        <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">


                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" class="form-control" name="update_profile" value="Update Profile">
                        </div>

                        </form>


                <div class="col-xs-6">


                </div>
                </div>
                </div>
                <!-- /.row

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>
