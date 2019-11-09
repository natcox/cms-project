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

function deleteUser(){
    global $connection;
    $the_user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
    $delete_query = mysqli_query($connection,$query);
    if(!$delete_query){ echo "Error";}
   header("location: users.php");

}

function unapproveUser(){
    global $connection;
    $the_user_id = $_GET['unapprove'];
    $query = "UPDATE users SET user_status='Unapproved' WHERE user_id = {$the_user_id}";
    $unapprove_user_query = mysqli_query($connection,$query);
    if(!$unapprove_user_query){ echo "Error";}

   header("location: users.php");
}

function approveUser(){
    global $connection;
    $the_user_id = $_GET['approve'];
    $query = "UPDATE users SET user_status='Approved' WHERE user_id = {$the_user_id}";
    $approve_user_query = mysqli_query($connection,$query);
    if(!$approve_user_query){ echo "Error";}

   header("location: users.php");
}

function makeAdmin(){
    global $connection;
    $the_user_id = $_GET['make_admin'];
    $query = "UPDATE users SET user_role='Admin' WHERE user_id = {$the_user_id}";
    $make_admin_query = mysqli_query($connection,$query);
    if(!$make_admin_query){ echo "Error";}

   header("location: users.php");
}

function makeSubscriber(){
    global $connection;
    $the_user_id = $_GET['make_subscriber'];
    $query = "UPDATE users SET user_role='Subscriber' WHERE user_id = {$the_user_id}";
    $make_subscriber_query = mysqli_query($connection,$query);
    if(!$make_subscriber_query){ echo "Error";}

   header("location: users.php");
}


///// UPDATE USER FUNCTION

function updateUser(){
      global $connection;
$the_user_id = $_GET['user_id'];

$user_firstname = $_POST['user_firstname'];
$user_lastname = $_POST['user_lastname'];
$user_role = $_POST['user_role'];
$user_email = $_POST['user_email'];
$user_image = $_FILES['image']['name'];
$user_image_temp = $_FILES['image']['tmp_name'];
$user_username = $_POST['user_username'];
$user_password = $_POST['user_password'];

move_uploaded_file($user_image_temp, "../images/$user_image");

if(empty($user_image)) {

$query = "SELECT * FROM users WHERE user_id = $the_user_id ";

$select_image = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($select_image)){
  $user_image = $row['user_image'];
}
}
  $query = "UPDATE users SET ";
  $query .= "user_firstname = '{$user_firstname}', ";
  $query .= "user_lastname = '{$user_lastname}', ";
  $query .= "user_role = '{$user_role}', ";
  $query .= "user_email = '{$user_email}', ";
  $query .= "user_image = '{$user_image}', ";
  $query .= "user_username = '{$user_username}', ";
  $query .= "user_password = '{$user_password}' ";
  $query .= "WHERE user_id = '{$the_user_id}' ";

$update_user = mysqli_query($connection,$query);

  confirm($update_user);
  if($update_user){
?>
<script type="text/javascript">
window.alert("User updated");
</script>
<?php
  }
  header("Location: users.php?message=1");
}

///// 'USER EDITED' POP UP JAVASCRIPT MESSAGE
function updatedMessage(){
  echo "<SCRIPT type='text/javascript'>
  alert('User updated');
  </SCRIPT>";
}


?>
