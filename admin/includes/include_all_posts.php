<?php
if(isset($_POST['checkBoxArray'])){

foreach($_POST['checkBoxArray'] as $postIdValue ){

$bulk_options = $_POST['bulk_options'];

  switch($bulk_options){

    case 'Published':
        $query = "UPDATE posts SET post_status = 'Published' WHERE post_id = $postIdValue ";
        $publish_query = mysqli_query($connection, $query);
    break;

    case 'Draft';
        $query = "UPDATE posts SET post_status = 'Draft' WHERE post_id = {$postIdValue} ";
        $draft_query = mysqli_query($connection, $query);
    break;

    case 'delete';
        $query = "DELETE FROM posts WHERE post_id = {$postIdValue} ";
        $delete_query = mysqli_query($connection, $query);
    break;
  }


  }
}


 ?>


<form action="" method='post'>
    <table class="table table-bordered table-hover">

      <div id="bulkOptionsContainer" class="col-xs-4" style="padding-left: 0px;">
        <select class="form-control" name="bulk_options" id="" style="padding-left: 0px;">
        <option value="">Select Options</option>
        <option value="Published">Publish</option>
        <option value="Draft">Draft</option>
        <option value="delete">Delete</option>
        </select>
      </div>

<div class="col-xs-4">
  <input type="submit" name="submit" class="btn btn-success" value="Apply">
  <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
  </div>


        <thead>
            <tr>
                <th><input id="selectAllBoxes" type="checkbox"></th>
                <th>ID</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>


<tbody>

<?php

$query = "SELECT * FROM posts";
$select_posts = mysqli_query($connection, $query);
// LOOP FOR TABLE DATA
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

?>
        <tr>
        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="<?php echo $post_id; ?>"></td>
        <td><?php echo $post_id; ?></td>
        <td><?php echo $post_author; ?></td>
        <td><?php echo $post_title; ?></td>

<?php

$query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
$select_categories_id = mysqli_query($connection, $query);


while($row = mysqli_fetch_assoc($select_categories_id))
{
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];



?>
        <td><?php echo $cat_title; ?></td>
<?php
}
?>


        <td><?php echo $post_status; ?></td>
        <td><img width='100' src='../images/<?php echo $post_image;?>'></td>
        <td><?php echo $post_tags; ?></td>
        <td><?php echo $post_comment_count; ?></td>
        <td><?php echo $post_date; ?></td>
        <td><a href='../post.php?p_id=<?php echo $post_id; ?>'>View Post</a></td>
        <td><a href='posts.php?source=edit_post&p_id=<?php echo $post_id; ?>'>Edit</a></td>
        <td><a href='posts.php?delete=<?php echo $post_id; ?>'>Delete</a></td>
    </tr>
  <?php
   }

?>

</tbody>
    </table>
</form>
<?php
//// CALL DELETE POST FUNCTION

if(isset($_GET['delete'])){ deletePost(); }

?>
