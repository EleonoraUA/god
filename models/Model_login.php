<?php

class Model_login extends Model
{
    public function get_data($email, $password)
    {
        $q = "SELECT `id`, `password`,`name`, `admin` FROM users WHERE email='" . $_POST['email'] . "' ";
        $arr = mysql_query($q);
        $row = mysql_fetch_assoc($arr);
        if (!$arr) die ("Error " . mysql_error());
        $passw = $row['password'];
        if (!strcmp($passw, $_POST['password'])) {
            session_start();
            unset($_SESSION);
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['admin'] = $row['admin'];
            if ($row['admin'] == 1) header("Location: http://localhost/web/4/god/admin");
            else {
                header("Location: http://localhost/web/4/god/main/home");
            }
        } else echo "ERROR!";
    }

    public function registration()
    {
        $email = $_POST["email"];
        $name = $_POST["name"];
        $pass = $_POST["password"];

        $sql = "INSERT INTO `users` (`name`, `email`,`password` ) VALUES ('$name' ,'$email', '$pass')";
        if (!mysql_query($sql)) echo '<p><b>Error with adding data</b></p>';
        $id_u = mysql_fetch_array(mysql_query("SELECT `id` FROM users WHERE name='" . $name . "'"));
        $sql_u = "INSERT INTO `user_info` (`id`, `photo`) VALUES ('" . $id_u['id'] . "' ,'views/user/default_avatar.jpg')";
        if (!mysql_query($sql_u)) echo mysql_error();
        else echo '<p><b>Success</b></p>';
    }
}