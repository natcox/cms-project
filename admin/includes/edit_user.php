
<?php

if(isset($_GET['user_id'])){

$the_user_id = $_GET['user_id'];

} else {echo "NOT SET"; }
?>

<?php
/////////// UPDATE USER QUERY ///////////
if(isset($_POST['update_user'])){ updateUser(); }

 ?>

<?php

$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
$select_users_query = mysqli_query($connection, $query);
// LOOP FOR TABLE DATA
while($row = mysqli_fetch_assoc($select_users_query))
{
$user_id = $row['user_id'];
$user_username = $row['user_username'];
$user_password = $row['user_password'];
$user_firstname = $row['user_firstname'];
$user_lastname = $row['user_lastname'];
$user_role = $row['user_role'];
$user_email = $row['user_email'];
$user_image = $row['user_image'];
$user_status = $row['user_status'];
$user_date = $row['user_date'];

}
?>




<form action ="" method="post" enctype="multipart/form-data">

  <div class="form-group">
      <label for="user_firstname">First Name</label>
      <input type="text" value ="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
  </div>

  <div class="form-group">
      <label for="user_lastname">Last Name</label>
      <input type="text" value ="<?php echo $user_lastname; ?>"  class="form-control" name="user_lastname">
  </div>

<div>
  <select name="user_role" id="">
<option value = "<?php echo $user_role; ?>"><?php echo $user_role; ?></options>
<?php
if($user_role=='Admin'){
?>
<option value ="Subscriber">Subscriber</options>
<?php
} else {
?>
  <option value="Admin">Admin</option>
<?php
}

?>


    </select>
</div>

<br>
<div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" value ="<?php echo $user_email; ?>" class="form-control" name="user_email">
</div>

<div class="form-group">
   <label for="image">User Image</label>
       <img width="100" src="../images/<?php echo $user_image; ?>">
   <input type="file" name="image" value ="<?php echo $user_image; ?>" >
</div>


<div class="form-group">
    <label for="user_username">Username</label>
    <input type="text"  value ="<?php echo $user_username; ?>" class="form-control" name="user_username">
</div>

<div class="form-group">
    <label for="user_password">Password</label>
    <input type="password"  value ="<?php echo $user_password; ?>" class="form-control" name="user_password">
</div>




<div class="form-group">
    <input class="btn btn-primary" type="submit" class="form-control" name="update_user" value="Update User">
</div>

</form>
