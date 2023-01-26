<?php
include_once "../core/database.php";
include_once "../config/constants.php";

class users extends DbConnector
{

    public function __construct($user_name, $first_name, $last_name, $email, $password)
    {
        $this->user_name = $user_name;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;

    }

    public function createUser()
    {

        $pre_stmt = $this->con->prepare(
            "INSERT INTO `registered_users`(`user_name`,`first_name`, `last_name`,`email`,`password`) VALUES (?,?,?,?,? )"
        );
        $pre_stmt->bind_param(
            "sssss",
            $this->user_name,
            $this->first_name,
            $this->last_name,
            $this->email,
            $this->password,

        );
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            header(
          
                  "Location:http://localhost/5StarTrading/view/signUp.php"
            );
            exit();

        } else {

        }
    }

}