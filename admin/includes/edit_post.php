<?php

if(isset($_GET['p_id'])){

    echo " " . $_GET['p_id'] . "<br><br>";
    $post_edit_id = $_GET['p_id'];

}

$query = "SELECT * FROM posts WHERE post_id = $post_edit_id";
$select_posts = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_posts))
{
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];


}

?>

  <?php

if(isset($_POST['update_post'])){


$post_title = $_POST['post_title'];
$post_author = $_POST['post_author'];
$post_category_id = $_POST['post_category'];
$post_status = $_POST['post_status'];
$post_image = $_FILES['image']['name'];
$post_image_temp = $_FILES['image']['tmp_name'];
$post_tags = $_POST['post_tags'];
$post_content = $_POST['post_content'];

move_uploaded_file($post_image_temp, "../images/$post_image");

if(empty($post_image)) {

  $query = "SELECT * FROM posts WHERE post_id = $post_edit_id ";

  $select_image = mysqli_query($connection, $query);

  while($row = mysqli_fetch_array($select_image)){

    $post_image = $row['post_image'];

  }

  }

    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = '{$post_edit_id}' ";

$update_post = mysqli_query($connection,$query);

    confirm($update_post);
}

   ?>


<form action ="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="post_title">Post Title</label>
    <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="post_title">
</div>

<div class="form-group">







<label for="post_category">Post Category</label>
<select name="post_category" id="post_category">

           <!-- DROPDOWN MENU DYNAMICALLY RETRIEVING CATEGORIES -->
            <?php
            $query = "SELECT * FROM categories ";
            $select_categories = mysqli_query($connection, $query);
            confirm($select_categories);
            while($row = mysqli_fetch_assoc($select_categories))
                {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                ?>
                <option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
                <
                <?php
                }
            ?>

</select>

</div>

<div class="form-group">
    <label for="post_author">Post Author</label>
    <input type="text" value="<?php echo $post_author; ?>" class="form-control" name="post_author">
</div>

<div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" value="<?php echo $post_status; ?>" class="form-control" name="post_status">
</div>

 <div class="form-group">
    <label for="image">Post Image</label>
    <img width="200" src="../images/<?php echo $post_image; ?>">
    <input type="file" name="image">
</div>

<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="post_tags">
</div>

<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" value="" name="post_content" id="" cols="30" rows="10"><?php echo $post_content ?>
</textarea>
</div>

<div class="form-group">
    <label for="post_submit">Post Submit</label>
    <input class="btn btn-primary" type="submit" class="form-control" name="update_post" value="Publish">
</div>

</form>
