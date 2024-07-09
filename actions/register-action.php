<?php

    include "../classes/User.php";

    # Create an object
    $user = new User;

    # Call the register method
    $user->store($_POST);
    # $_POST --> holds the data coming from the form
    # Datas: firstname, last, username and password
    # $_POST[
    #    'first_name' => 'John',
    #    'last_name'  => 'Smith',
    #     'username'  => 'John',
    #     'password'  => 
    # ]