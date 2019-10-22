
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
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                <div class="col-xs-6">
               

       <!--BELOW IS ADDING / insert_categories CATEGORIES -->
       
       
       <?php insert_categories(); ?>
    
            
                      
                      <?php 
                    if(isset($_GET['edit'])){
                   
                    $cat_id = $_GET['edit'];
                        updateCategories();
                        //include "includes/update_categories.php"; 
                        // CHANGED THE ABOVE TO A FUNCTION - keeping just in case!
                    }
                    
                   ?> 
                </div>
            
                <div class="col-xs-6">    
          
                
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category title </th>
                              <th> </th>
                                <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                    
<!-- BELOW IS DISPLAY TABLE DATA / FIND ALL CATEGORIES -->
<?php findALLcategories(); ?>

  
  <!-- below is DELETING CATEGORIES -->
<?php deleteCategories();  ?>                   
                    </tbody>
                </table>  
                    
                </div> 
                </div>   
                </div>
                <!-- /.row 

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>

