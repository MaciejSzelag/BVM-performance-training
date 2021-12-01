<div class="table-wrap">
    <table class="t-list">
    
        <?php
    $_GET['user_id'];
      $select_user_query = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($select_user_query);
          $user_id = $row['user_id'];
          $user_login = $row['user_login'];
        ?>
    <?php
    if(isset($_GET['user_id'])){
      $select_user_query = mysqli_query($connection, $query);
      while($row = mysqli_fetch_assoc($select_user_query)){
          $user_id = $row['user_id'];
          $user_login = $row['user_login'];
          $user_firstname = $row['user_firstname'];
          $user_lastname = $row['user_lastname'];
          $user_passwword = $row['user_password'];
          $date_of_registration = $row['date'];
          $user_supervisor = $row['supervisor'];
    ?>
        <tr>
          <th>Name</th>
          <td><?php echo  $user_firstname;?></td>
        </tr>
        <th>Last Name</th>
          <td><?php echo  $user_lastname; ?></td>
        </tr>
        <th>Login</th>
          <td><?php echo  $user_login;?></td>
        </tr>
        <th>Password</th>
          <td><?php echo  $user_passwword;?></td>
        </tr>
        <th>Supervisor</th>
          <td><?php echo  $user_supervisor;?></td>
        </tr>
        <th>Date</th>
          <td><?php echo  $date_of_registration;?></td>
        </tr>
        <tr>
          <th>Edit</th>
          <td><a href="users.php?source=edit_user&user_id=<?php echo $user_id; ?>">Edit User</a></td>
        </tr>
    <?php }}?>
    </table>
</div>
