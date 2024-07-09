<?php
    include "../classes/User.php";

    # Create an object
    $user = new User;

    # Call the update method
    $user->update($_POST, $_FILES);
    # $_POST = [firstname, lastname, username]
    # $_FILES = image uploded by the user (photo/avatar)
    #update (method) ... create in User.php
?>