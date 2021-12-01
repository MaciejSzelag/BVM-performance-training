<?php
    $the_last_id_was_created = mysqli_insert_id($connection);
    $alert_message;
    echo '<p class="alert alert-success">
    ' . $alert_message .' <a href="users.php?source=view_user&user_id='. $the_last_id_was_created . '">View User</a>
  </p>';
?>