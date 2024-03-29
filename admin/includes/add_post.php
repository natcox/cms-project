

<?php
if(isset($_POST['create_post'])){

$post_title = $_POST['post_title'];
$post_author = $_POST['post_author'];
$post_category_id = $_POST['post_category'];
$post_status = $_POST['post_status'];

$post_image = $_FILES['image']['name'];
$post_image_temp = $_FILES['image']['tmp_name'];

$post_tags = $_POST['post_tags'];
$post_content = $_POST['post_content'];
$post_date = date('d-m-y');
 // comment count removed as this is automatically updated


move_uploaded_file($post_image_temp, "../images/$post_image");

$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";

$query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}', now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}') ";

   $add_post_query =  mysqli_query($connection,$query);
z
confirm($add_post_query);

$the_post_id = mysqli_insert_id($connection);

echo "<p class='bg-success'>Post Added. <a href='../post.php?p_id={$the_post_id}'>View your post</a> or <a href='posts.php' >View all posts</a>";

}
?>
<form action ="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="post_title">Post Title</label>
    <input type="text" class="form-control" name="post_title">
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
                  <?php
                  }
              ?>

  </select>
</div>

<div class="form-group">
    <label for="post_author">Post Author</label>
    <input type="text" class="form-control" name="post_author">
</div>

<div class="form-group">
<select name="post_status" id="">
  <option value='Draft'>Draft</option>
<option value='Published'>Published</option>
</select>
</div>

 <div class="form-group">
    <label for="image">Post Image</label>
    <input type="file" name="image">
</div>

<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
</div>

<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="editor" cols="30" rows="10">
   </textarea>
</div>

<div class="form-group">
    <!-- <label for="post_tags">Publish</label> -->
    <input class="btn btn-primary" type="submit" class="form-control" name="create_post" value="Publish">
</div>

</form>
