<?php

/**
 * Created by PhpStorm.
 * User: Eleonora
 * Date: 07.01.2016
 * Time: 17:28
 */
class Model_Profile extends Model
{
    function getUserInfo()
    {
        $id = mysql_query("SELECT `id`, `email` FROM users WHERE name='".$_GET['who']."'");
        if (!$id = mysql_fetch_assoc($id)) {
            echo "There is no such user";
            exit();
        } else {
            //$id = mysql_fetch_assoc($id);
            $sql = mysql_query("SELECT * FROM user_info WHERE id='".$id['id']."'");
            $data = mysql_fetch_assoc($sql);
            $data['name'] = $_GET['who'];
            return $data;
        }
    }

    function getAllUsers()
    {
        $sql = mysql_query("SELECT * FROM user_info JOIN users on users.id=user_info.id");
        while ($data = mysql_fetch_array($sql)) {
            $res[] = $data;
            $friends[$data['id']] = $this->areFriends($data['id']);
        }
        return array($res, $friends);
    }

    function addToFriends($id)
    {
        $id_second = mysql_query("SELECT `id` FROM users WHERE name='".$_SESSION['name']."' OR name='".$_GET["who"]."'");
        while ($data = mysql_fetch_array($id_second)) {
            $res[] = $data["id"];
        }
        if (!mysql_query("INSERT INTO friends VALUES ('".$res[0]."','".$res[1]."')")) {
            echo "ERROR";
        }
    }

    function areFriends($id)
    {
        $id_u = mysql_fetch_array(mysql_query("SELECT `id` FROM users WHERE name='".$_SESSION['name']."'"));
        $sql = mysql_fetch_array(mysql_query("SELECT * FROM friends WHERE (userId1='".$id."' AND userId2='".$id_u['id']."') OR (userId2='".$id."' AND userId1='".$id_u['id']."')"));
        //var_dump($sql);
        if ($sql != NULL) {
            return true;
        } else {
            return false;
        }
    }

    function listOfFriends()
    {
        $sql = mysql_query("SELECT * FROM friends WHERE (userId2='".$_SESSION['name']."' OR userId1='".$_SESSION['name']."')");
        while ($data = mysql_fetch_array($sql)) {
            $res[] = $data;
        }
        return $res;
    }

    function getChecked()
    {
        $id_u = mysql_fetch_array(mysql_query("SELECT `id` FROM users WHERE name='".$_SESSION['name']."'"));
        return mysql_fetch_assoc(mysql_query("SELECT public_phone, public_birthday FROM user_info WHERE id='".$id_u['id']."'"));
    }

    function getFriends()
    {
        $friends_id = array();
        $result = array();
        $id_u = mysql_fetch_array(mysql_query("SELECT `id` FROM users WHERE name='".$_SESSION['name']."'"));
        $sql = mysql_query("SELECT `userId2` FROM friends WHERE userId1 = '".$id_u['id']."'");
        while ($data = mysql_fetch_array($sql)) {
                $friends_id[] = $data;
        }
        $sql_2 =  mysql_query("SELECT `userId1` FROM friends WHERE userId2 =  '".$id_u['id']."'");
        while ($data = mysql_fetch_array($sql_2)) {
            $friends_id[] = $data;
        }
        foreach ($friends_id as $friend) {
            $sql = mysql_query("SELECT `name`,`photo` FROM user_info INNER JOIN users on users.id = user_info.id WHERE users.id = '".$friend[0]."'");
            while ($data = mysql_fetch_array($sql)) {

                    $result[$friend[0]]['name'] = $data['name'];
                    $result[$friend[0]]['photo'] = $data['photo'];
            }
        }
        return $result;
    }

    function  saveChanges()
    {
        $id_u = mysql_fetch_array(mysql_query("SELECT `id` FROM users WHERE name='".$_SESSION['name']."'"));
        if (!empty($_POST['name'])) {
            mysql_query("UPDATE users SET `name`='".$_POST['name']."' WHERE id='".$id_u['id']."'");
            $_SESSION['name'] = $_POST['name'];
        }
        if (!empty($_POST['city'])) {
            mysql_query("UPDATE user_info SET `city`='".$_POST['city']."' WHERE id='".$id_u['id']."'");
        }
        if (!empty($_POST['birthday'])) {
            mysql_query("UPDATE user_info SET `birthday`='".$_POST['birthday']."' WHERE id='".$id_u['id']."'");
        }
        if (!empty($_POST['phone'])) {
            mysql_query("UPDATE user_info SET `phone`='".$_POST['phone']."' WHERE id='".$id_u['id']."'");
        }
        if (!empty($_POST['about'])) {
            mysql_query("UPDATE user_info SET `about`='".$_POST['about']."' WHERE id='".$id_u['id']."'");
        }
        if (!empty($_POST['check'])) {
            if (isset($_POST['public_phone'])) {
                $_POST['public_phone'] = 1;
            }
            if (isset($_POST['public_birthday'])) {
                $_POST['public_birthday'] = 1;
            }
            mysql_query("UPDATE user_info SET `public_phone`='".$_POST['public_phone']."', `public_birthday`='".$_POST['public_birthday']."' WHERE id='".$id_u['id']."'");
        }
        if (!empty($_POST['photo'])) {
            $path = "views/user/".$_POST['photo'];
            mysql_query("UPDATE user_info SET `photo`='".$path."' WHERE id='".$id_u['id']."'");
        }

    }

    function getAllMessages()
    {

    }

    function send()
    {
        if (!empty($_GET['s']) && $_GET['s'] === 'send') {
            return $this->getFriends();
        }
    }

}