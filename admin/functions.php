<?php
// CONFIRM A QUERY HAS WORKED

function confirm($result)

{
    global $connection;
    if(!$result)
        {
        die("QUERY FAILED . " . mysqli_error($connection));
        }

}

////// INSERT CATEGORIES
function insert_categories(){
global $connection;
if(isset($_POST['submit']))
{
$cat_title = $_POST['cat_title'];
echo $cat_title;
if($cat_title == "" || empty($cat_title))
{
echo "Cannot leave field empty";
}
else
{
$query = "INSERT INTO categories (cat_title) ";
$query .= "VALUE('{$cat_title}')";
$create_category_query = mysqli_query($connection, $query);
if(!$create_category_query)
{
die('QUERY FAILED' . mysqli_error($connection));
}
}
}
?>
<form action="" method="post">
<div class="form-group">
<label for="cat_title">Add category</label>
<input class="form-control" type="text"  name="cat_title">
</div>
<div class="form-group">
<input class="btn btn-primary" type="submit"  name="submit" value="Add Category">
</div>
</form>
<?php
}



////// FIND ALL CATEGORIES AND DISPLAY TABLE
function findALLcategories(){
global $connection;

$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection, $query);
// LOOP FOR TABLE DATA
while($row = mysqli_fetch_assoc($select_categories))
{
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
echo "<tr>";
echo "<td>{$cat_id}</td>";
echo "<td>{$cat_title}</td>";
echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
echo "</tr>";
}


}


////DELETE CATEGORIES
function deleteCategories(){
global $connection;

if(isset($_GET['delete']))
{
$cat_id_to_delete = $_GET['delete'];
$query = "DELETE FROM categories WHERE cat_id = {$cat_id_to_delete} ";
$delete_query = mysqli_query($connection,$query);
header("Location: categories.php");
}
}


//// UPDATE CATEGORIES
function updateCategories(){
global $connection;
?>
<form action="" method="post">
<div class="form-group">
<?php
// UPDATE FORM
if(isset($_GET['edit'])){
$cat_id = $_GET['edit'];
$query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
$select_categories_id = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_categories_id))
{
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
?>
<label for="cat_title">Update category name for <?php if(isset($cat_title)){echo $cat_title;} ?> </label> <input value="" type="text" class="form-control" name="cat_title">
<input class="btn btn-primary" type="submit"  name="update_category" value="Update Category">
<?php }} ?>
<?php
/////////// UPDATE QUERY
if(isset($_POST['update_category']))
{
$the_cat_title = $_POST['cat_title'];
$query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
$update_query = mysqli_query($connection,$query);
if(!$update_query){
die("query failed" . mysqli_error($connection));
}
}
?>
</div>
<div class="form-group">
</div>
</form>
<?php
}

function deletePost(){
    global $connection;
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
    $delete_query = mysqli_query($connection,$query);
    if(!$delete_query){ echo "Error";}
   header("location: posts.php");

}

function deleteComment(){
    global $connection;
    $the_comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
    $delete_query = mysqli_query($connection,$query);
    if(!$delete_query){ echo "Error";} else

    {
          $comment_post_id = $_GET['p_id'];
          $post_id = $_GET['delete'];
          $query = "UPDATE posts SET post_comment_count = post_comment_count - 1 ";
          $query .= "WHERE post_id = $comment_post_id ";
          $delete_update_comment_count = mysqli_query($connection,$query);
          if(!$delete_update_comment_count){ die(mysqli_error($connection));}
    }


   header("location: comments.php");

}
function unapproveComment(){
    global $connection;
    $the_comment_id = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status='Unapproved' WHERE comment_id = {$the_comment_id} ";
    $unapprove_query = mysqli_query($connection,$query);
    if(!$unapprove_query){ echo "Error";} else

      {
          $comment_post_id = $_GET['p_id'];
          $post_id = $_GET['unapprove'];
          $query = "UPDATE posts SET post_comment_count = post_comment_count - 1 ";
          $query .= "WHERE post_id = $comment_post_id ";
          $unapprove_update_comment_count = mysqli_query($connection,$query);
          if(!$unapprove_update_comment_count){ die(mysqli_error($connection));}
      }

   header("location: comments.php");
}


function approveComment(){
    global $connection;
    $the_comment_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status='Approved' WHERE comment_id = {$the_comment_id}";
    $approve_query = mysqli_query($connection,$query);
    if(!$approve_query){ echo "Error";}
else {

$comment_post_id = $_GET['p_id'];
    $post_id = $_GET['approve'];
    $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
    $query .= "WHERE post_id = $comment_post_id ";
    $approve_update_comment_count = mysqli_query($connection,$query);
    if(!$approve_update_comment_count){ die(mysqli_error($connection));}

}
   header("location: comments.php");
}


?>
