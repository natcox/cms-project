        <?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?> 
<body>
<!-- NAVIGATION <--!></--!>
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
<?php
    
    
    if(isset($_POST['submit'])){
        //echo  <-- optional echo here if I want their  search query to appear on page when they hit search. i.e. echoing the line of code below.
        $search = $_POST['search'];      
        
     $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
    $search_query = mysqli_query($connection, $query);
    
    if(!$search_query){ 
        
        die("QUERY FAILED" . mysqli_error($connection));
    }
        
    $count = mysqli_num_rows($search_query);
    
    if($count == 0){
        
    echo "<h1>No results</h1>";
    } else {

      $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";         $select_all_posts_query = mysqli_query($connection, $query);
                    
while($row = mysqli_fetch_assoc($select_all_posts_query)){
       
     $post_title = $row['post_title'];
     $post_author = $row['post_author'];
     $post_date = $row['post_date'];
     $post_image = $row['post_image'];    
     $post_content = $row['post_content'];

?>
 <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <h2>
                    <a href="#"><?php echo $post_title; ?> </a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr><?php
    }
    }
    }
       ?>
    
    

            
            
            

                
        
             
               
<!-- this is where i removed the second 2 blog posts --!>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
        <!-- /.row -->

        <hr>
<?php include "includes/footer.php"; ?>
