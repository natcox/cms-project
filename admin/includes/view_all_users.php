<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date created</th>
            <th>Image</th>
            <th>Edit User</th>
            <th>Edit Role</th>
            <th>Edit Status</th>
            <th>Delete</th>



        </tr>
    </thead>


<tbody>

<?php

$query = "SELECT * FROM users";
$select_users = mysqli_query($connection, $query);
// LOOP FOR TABLE DATA
while($row = mysqli_fetch_assoc($select_users))
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


?>
    <tr>
    <td><?php echo $user_id ?></td>
    <td><?php echo $user_username; ?></td>
    <td><?php echo $user_firstname; ?></td>
    <td><?php echo $user_lastname; ?></td>
    <td><?php echo $user_email; ?></td>
    <td><?php echo $user_role; ?></td>
    <td><?php echo $user_date; ?></td>
    <td><img width='100' src='../images/<?php echo $user_image;?>'></td>
    <td><a href='users.php?source=edit_user&user_id=<?php echo $user_id; ?>'>Edit user</a></td>
    <td>      <?php if($user_role == 'Subscriber')
            {
              ?> <a href='users.php?make_admin=<?php echo $user_id; ?>'>Make admin</a><?php

            }
          else
           {
          ?>
            <a href='users.php?make_subscriber=<?php echo $user_id; ?>'>Make subscriber</a>
          <?php
          }
          ?>
    </td>
    <td>
      <?php if($user_status == 'Unapproved')
        {
          ?> <a href='users.php?approve=<?php echo $user_id; ?>'>Approve</a><?php

        }
      else
       {
      ?>

        <a href='users.php?unapprove=<?php echo $user_id; ?>'>Unapprove</a>

      <?php
      }
      ?>
    </td>
  <td><a href='users.php?delete=<?php echo $user_id; ?>'>Delete</a></td>


      <?php
      // $query = "SELECT * FROM posts where post_id = $comment_post_id ";
      // $select_post_id_query = mysqli_query($connection,$query);
      //
      // while($row = mysqli_fetch_assoc($select_post_id_query))
      //   {
      //   $post_id = $row['post_id'];
      //   $post_title = $row['post_title'];
      //
      //  echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
      //   }
      ?>






</tr>
<?php

}

?>

</tbody>
</table>

<?php

//// CALL DELETE Users FUNCTION
if(isset($_GET['delete'])){ deleteUser(); }

//// CALL APPROVE Users FUNCTION
if(isset($_GET['approve'])){ approveUser(); }

//// CALL UNAPPROVE Users FUNCTION
if(isset($_GET['unapprove'])){ unapproveUser(); }

//// CALL MAKE ADMIN FUNCTION
if(isset($_GET['make_admin'])){ makeAdmin(); }

//// CALL MAKE SUBSCRIBER FUNCTION
if(isset($_GET['make_subscriber'])){ makeSubscriber(); }

///// 'USER EDITED' POP UP JAVASCRIPT MESSAGE
if(isset($_GET['message'])){ updatedMessage();}

?>
