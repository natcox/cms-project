


<?php
if(isset($_POST['add_user'])){


$user_firstname = $_POST['user_firstname'];
$user_lastname = $_POST['user_lastname'];
$user_role = $_POST['user_role'];
$user_email = $_POST['user_email'];
$user_username = $_POST['user_username'];
$user_password = $_POST['user_password'];
$user_image = $_FILES['image']['name'];
$user_image_temp = $_FILES['image']['tmp_name'];
$user_date = date('d-m-y');

move_uploaded_file($user_image_temp, "../images/$user_image");

$query = "INSERT INTO users(user_firstname, user_lastname, user_role, user_email, user_username, user_password, user_image, user_date) ";

$query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$user_email}','{$user_username}','{$user_password}','{$user_image}', now()) ";

   $add_user_query =  mysqli_query($connection,$query);

confirm($add_user_query);
}
?>
<form action ="" method="post" enctype="multipart/form-data">

  <div class="form-group">
      <label for="user_firstname">First Name</label>
      <input type="text" class="form-control" name="user_firstname">
  </div>

  <div class="form-group">
      <label for="user_lastname">Last Name</label>
      <input type="text" class="form-control" name="user_lastname">
  </div>

<div>
  <select name="user_role" id="">
<option value ="Subscriber">Select Role </options>
<option value ="Subscriber">Subscriber</options>
  <option value="Admin">Admin</option>
    </select>
</div>

<br>
<div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" class="form-control" name="user_email">
</div>

<div class="form-group">
   <label for="image">User Image</label>
   <input type="file" name="image">
</div>

     <!-- <div class="form-group">
        <label for="image"></label>
        <input type="file" name="image">
    </div> -->

<div class="form-group">
    <label for="user_username">Username</label>
    <input type="text" class="form-control" name="user_username">
</div>

<div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" class="form-control" name="user_password">
</div>




<div class="form-group">
    <input class="btn btn-primary" type="submit" class="form-control" name="add_user" value="Add User">
</div>

</form>
