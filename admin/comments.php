
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
                            Welcome to Comments
                            <small> Author</small>
                        </h1>

<?php

  if(isset($_GET['source'])){

$source = $_GET['source'];

  } else {

      $source = '';
  }

switch($source){

case 'add_post';
echo "Add post";
include "includes/add_post.php";
break;

case 'edit_post';
echo 'Editing post ID ';
include "includes/edit_post.php";
break;

case 'delete_';
echo "nice";
break;

default:

include "includes/view_all_comments.php";

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
