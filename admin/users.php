
<!DOCTYPE html>

<html lang="en">

<?php include "includes/admin_header.php"; ?>

<body>

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
                            <small> Author</small>
                        </h1>

<?php

  if(isset($_GET['source'])){

$source = $_GET['source'];

  } else {

      $source = '';
  }

switch($source){

case 'add_user';
echo "Add user <br><br>";
include "includes/add_user.php";
break;

case 'edit_user';
echo 'Editing user<br><br>';
include "includes/edit_user.php";
break;

case 'useradded';
echo "User Added<br><br>";
include "includes/view_all_users.php";
break;

case 'userupdated';
echo "User updated<br><br>";
include "includes/view_all_users.php";
break;

default:

include "includes/view_all_users.php";

break;
}



?>
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
