<?php
class UserController{
    public static function create(){
        $pass = md5('CA-'.rand(11111, 99999));
        $role = mysqli_real_escape_string(conn(), $_POST['role']);
        $fname = mysqli_real_escape_string(conn(), $_POST['fname']);
        $lname = mysqli_real_escape_string(conn(), $_POST['lname']);
        $email = mysqli_real_escape_string(conn(), $_POST['email']);

        $sql = "SELECT count(usermail) as exist FROM users WHERE usermail = '$email'";
        $res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));
        if($res['exist'] > 0){
            echo 'user Email address alrealdy exists';
        }else{
            $sql = "INSERT INTO users VALUES (DEFAULT, '$fname', '$lname', '$email', '$role', '$pass', DEFAULT, DEFAULT, DEFAULT, DEFAULT)";
            if(mysqli_query(conn(), $sql)){echo 'success';
                }else{echo 'Could not create user';
            }
        }
    }

    public static function fetch(){
        $sql[0] = "SELECT * FROM users WHERE userrole = 'admin' AND `status` = 'active'";
        $sql[1] = "SELECT * FROM users WHERE userrole = 'stake' AND `status` = 'active'";
        $sql[2] = "SELECT * FROM users WHERE userrole = 'school' AND `status` = 'active'";
        $sql[3] = "SELECT * FROM users WHERE `status` != 'active'";

        foreach($sql as $key => $value){
            if(mysqli_num_rows(mysqli_query(conn(), $value)) > 0){
                $res[$key] = mysqli_fetch_all(mysqli_query(conn(), $value), MYSQLI_ASSOC);
            }else{
                $res[$key] = 0;
            }
        }

        return print_r($res);
        
    }
}
?>