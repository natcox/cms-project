<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Content</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approval</th>
            <!-- <th>Unapprove</th> -->
            <th>Delete</th>

        </tr>
    </thead>


<tbody>

<?php

$query = "SELECT * FROM comments";
$select_posts = mysqli_query($connection, $query);
// LOOP FOR TABLE DATA
while($row = mysqli_fetch_assoc($select_posts))
{
$comment_id = $row['comment_id'];
$comment_post_id = $row['comment_post_id'];
$comment_author = $row['comment_author'];
$comment_content = $row['comment_content'];
$comment_email = $row['comment_email'];
$comment_status = $row['comment_status'];
$comment_date = $row['comment_date'];


?>
    <tr>
    <td><?php echo $comment_id; ?></td>
    <td><?php echo $comment_author; ?></td>
    <td><?php echo $comment_content; ?></td>
    <td><?php echo $comment_email; ?></td>
    <td><?php echo $comment_status; ?></td>

<?php

$query = "SELECT * FROM posts where post_id = $comment_post_id ";
$select_post_id_query = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_post_id_query))
  {

  $post_id = $row['post_id'];
  $post_title = $row['post_title'];



 echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

  }
?>
    <td><?php echo $comment_date; ?></td>


<td>
  <?php
    // $query = "SELECT * FROM comments where comment_post_id = $comment_post_id ";
    // $select_comment_status = mysqli_query($connection,$query);
    // confirm($select_comment_status);
    //
    // while($row = mysqli_fetch_assoc($select_comment_status))
    //   {
    //   $comment_status = $row['comment_status'];
    //   // $comment_id = $ row['comment_id'];
    //   }
    //

  if($comment_status == 'Unapproved')
    {
      ?> <a href='comments.php?approve=<?php echo $comment_id; ?>&p_id=<?php echo $comment_post_id; ?>'>Approve</a><?php
    }
else
   {
?>

    <a href='comments.php?unapprove=<?php echo $comment_id; ?>&p_id=<?php echo $comment_post_id; ?>'>Unapprove</a>

<?php
}
?>
</td>


    <td><a href='comments.php?delete=<?php echo $comment_id; ?>&p_id=<?php echo $comment_post_id; ?>'>Delete</a></td>



</tr>
<?php

}

?>

</tbody>
</table>

<?php

//// CALL DELETE Comments FUNCTION
if(isset($_GET['delete'])){ deleteComment(); }

//// CALL APPROVE Comments FUNCTION
if(isset($_GET['approve'])){ approveComment(); }

//// CALL UNAPPROVE Comments FUNCTION
if(isset($_GET['unapprove'])){ unapproveComment(); }
?>
