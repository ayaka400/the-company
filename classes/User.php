<?php

    require_once "Database.php";

    # The logic of the app will here
    class User extends Database{
    
        public function store($request){
            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $username = $request['username'];
            $password = $request['password'];

            $password = password_hash($password, PASSWORD_DEFAULT);
            # admin12345 ---> aiw590938(8*o$234...

            # Query string
            $sql = "INSERT INTO users(`first_name`, `last_name`, `username`, `password`) VALUES('$first_name', '$last_name', '$username', '$password')";

            #Excute the query
            if ($this->conn->query($sql)) {
                header('location: ../views'); //go to index.php (login page)
                exit(); //same as die()
            }else {
                die("Error in creating the user: " . $this->conn->error);
            }



        }

        public function login($request){
            $username = $request['username'];
            $password = $request['password'];

            #Query String
            $sql = "SELECT * FROM users WHERE username = '$username'";

            $result = $this->conn->query($sql);

            # Check for the username
            if ($result->num_rows == 1) {
                # Check for the password
                $user = $result->fetch_assoc(); //retrieve everything from the row(Associative array)
                # user = [ 'id => 1, 'username => 'John', 'password' => 'tei35ty46gf'...]

                if (password_verify($password, $user['password'])) { 
                  //$password = came from login session  
                  //$user['password']= already in database  
                  //* only whe we user password_hash
                  #Create a session variables for future use
                  session_start(); //★Important!  (Neccessary before session)
                  $_SESSION['id'] = $user['id'];
                  $_SESSION['username'] = $user['username'];
                  $_SESSION['full_name'] = $user['first_name'] . " " . $user['last_name'];
                  

                  header('location: ../views/dashbord.php'); //main dashbord..  we'll create this later on 
                  exit();
                }else {
                    die("Password is incorrect.");
                }
            } else{
              die("Username does not exits.");
          }

      }

      # logout
      public function logout(){
            session_start();  //start the session
            session_unset();  // unset the session
            session_destroy();  //delete or destroy the session

            header('location: ../views'); //Redirect the user to Login page
            exit;
      }

      # Get or returieved all the users from the users table
      public function getAllUsers(){
            # Query string
            $sql = "SELECT id, first_name, last_name, username, photo FROM users";

            # Excute the query
            if ($result = $this->conn->query($sql)) {
                return $result;
            } else{
                die("Error retrieving users. " . $this->conn->error);
            }
      }

      # Get or retrieve a specific user (the user to edit)
    public function getUser($id){
        $sql = "SELECT * FROM users WHERE id = $id";

        if ($result = $this->conn->query($sql)) {
            return $result->fetch_assoc();
        }else{
            die("Error in retrieving the user." . $this->conn->error);
        }
    }

    public function update($request, $files){
        session_start();
        $id = $_SESSION['id'];

        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];

        $photo = $files['photo']['name']; // From input field (name = name of the uploaded file)(two dimentional array)
        $tmp_photo = $files['photo']['tmp_name']; // tem_name = temporary storage location for photo

        //$request[], $file ... from $_POST, $_FILES  (= bulit-in)

        # Sql query string 
        $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' WHERE id = $id ";

        # xcute the query
        if ($this->conn->query($sql)) { //if everything is okay during excuting of the query
                $_SESSION['username'] = $username;
                $_SESSION['full_name'] = "$first_name $last_name";

                # Check if there is an uploaded image/photo, save it to the Db and save the file to image folder
                if($photo) {   //If there is image uploaded?
                    $sql = "UPDATE users SET photo = '$photo' WHERE id = $id";
                    $destination = "../assets/images/$photo";

                    if ($this->conn->query($sql)) { //save the image to the Db
                        # Save the file to the image folder
                        if (move_uploaded_file($tmp_photo, $destination) ){ //built-in function (move $tmp_photo to $destination)   //is okay?
                            header('location: ../views/dashbord.php');
                            exit;
                        }else {
                            die("Error in moving the photo.");
                        }
                    }else {
                        die("Error in uploading image. " . $this->conn->error);
                    }
                }

                header('location: ../views/dashbord.php'); // If it dosent any photo file (then the code above will not be excuted at all)
                exit;
        }else {
            die("Error in updating the user. " . $this->conn->error);
        }
    }

    public function delete(){
        session_start();
        $id = $_SESSION['id']; // id pf the currently logged-in user

        $sql = "DELETE FROM users WHERE id = $id";

        if ($this->conn->query($sql)) {
            $this->logout(); //call the logout method
        }else {
            die("Error in deleting your account. " . $this->conn->error);
        }
    }

   }

    
?>