<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>
<body>

<?php if(isset($_GET['loginerror'])){   echo "<SCRIPT type='text/javascript'>
  alert('LOGIN FAILED. Please check username and password.');
  </SCRIPT>";

} ?>


<!-- NAVIGATION <--!></--!>
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->





            <div class="col-md-8">
<?php
      $query = "SELECT * FROM posts WHERE post_status = 'Published'";
      $select_all_posts_query = mysqli_query($connection, $query);

      $number_of_results = mysqli_num_rows($select_all_posts_query);
      if($number_of_results == 0) { echo "<h1 class='text-center'>No posts to display</h1>"; }

while($row = mysqli_fetch_assoc($select_all_posts_query)){

     $post_id = $row['post_id'];
     $post_title = $row['post_title'];
     $post_author = $row['post_author'];
     $post_date = $row['post_date'];
     $post_image = $row['post_image'];
     $post_content = substr($row['post_content'],0,400);
     $post_status = $row['post_status'];



?>

 <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                  <a href="post.php?p_id=<?php echo $post_id ?>">

                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                  </a>
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

<?php
}
?>

<!-- this is where i removed the second 2 blog posts --!>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
        <!-- /.row -->

        <hr>
<?php include "includes/footer.php"; ?>
