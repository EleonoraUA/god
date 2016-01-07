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
           // $res['name'] = mysql_fetch_assoc(mysql_query("SELECT `name` FROM users WHERE id='".$data['id']."'"));
        }

        return $res;
    }
}