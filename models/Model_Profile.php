<?php

/**
 * Created by PhpStorm.
 * User: Eleonora
 * Date: 07.01.2016
 * Time: 17:28
 */
class Model_Profile extends Model
{
    /**
     * @return array
     */
    function getUserInfo()
    {
        $id = mysql_query("SELECT `id`, `email` FROM users WHERE name='" . $_GET['who'] . "'");
        if (!$id = mysql_fetch_assoc($id)) {
            echo "There is no such user";
            exit();
        } else {
            //$id = mysql_fetch_assoc($id);
            $sql = mysql_query("SELECT * FROM user_info WHERE id='" . $id['id'] . "'");
            $data = mysql_fetch_assoc($sql);
            $data['name'] = $_GET['who'];
            return $data;
        }
    }

    /**
     * @return array
     */
    function getAllUsers()
    {
        $sql = mysql_query("SELECT * FROM user_info JOIN users on users.id=user_info.id");
        while ($data = mysql_fetch_array($sql)) {
            $res[] = $data;
            $friends[$data['id']] = $this->areFriends($data['id']);
        }
        return array($res, $friends);
    }

    /**
     * @param $id
     */
    function addToFriends($id)
    {
        $id_second = mysql_query("SELECT `id` FROM users WHERE name='" . $_SESSION['name'] . "' OR name='" . $_GET["who"] . "'");
        while ($data = mysql_fetch_array($id_second)) {
            $res[] = $data["id"];
        }
        if (!mysql_query("INSERT INTO friends VALUES ('" . $res[0] . "','" . $res[1] . "')")) {
            echo "ERROR";
        }
    }

    /**
     * @param $id
     * @return bool
     */
    function areFriends($id)
    {
        $id_u = mysql_fetch_array(mysql_query("SELECT `id` FROM users WHERE name='" . $_SESSION['name'] . "'"));
        $sql = mysql_fetch_array(mysql_query("SELECT * FROM friends WHERE (userId1='" . $id . "' AND userId2='" . $id_u['id'] . "') OR (userId2='" . $id . "' AND userId1='" . $id_u['id'] . "')"));
        //var_dump($sql);
        if ($sql != NULL) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return array
     */
    function listOfFriends()
    {
        $sql = mysql_query("SELECT * FROM friends WHERE (userId2='" . $_SESSION['name'] . "' OR userId1='" . $_SESSION['name'] . "')");
        while ($data = mysql_fetch_array($sql)) {
            $res[] = $data;
        }
        return $res;
    }

    /**
     * @return array
     */
    function getChecked()
    {
        $id_u = mysql_fetch_array(mysql_query("SELECT `id` FROM users WHERE name='" . $_SESSION['name'] . "'"));
        return mysql_fetch_assoc(mysql_query("SELECT public_phone, public_birthday FROM user_info WHERE id='" . $id_u['id'] . "'"));
    }

    /**
     * @return array
     */
    function getFriends()
    {
        $friends_id = array();
        $result = array();
        $id_u = mysql_fetch_array(mysql_query("SELECT `id` FROM users WHERE name='" . $_SESSION['name'] . "'"));
        $sql = mysql_query("SELECT `userId2` FROM friends WHERE userId1 = '" . $id_u['id'] . "'");
        while ($data = mysql_fetch_array($sql)) {
            $friends_id[] = $data;
        }
        $sql_2 = mysql_query("SELECT `userId1` FROM friends WHERE userId2 =  '" . $id_u['id'] . "'");
        while ($data = mysql_fetch_array($sql_2)) {
            $friends_id[] = $data;
        }
        foreach ($friends_id as $friend) {
            $sql = mysql_query("SELECT `name`,`photo` FROM user_info INNER JOIN users on users.id = user_info.id WHERE users.id = '" . $friend[0] . "'");
            while ($data = mysql_fetch_array($sql)) {

                $result[$friend[0]]['name'] = $data['name'];
                $result[$friend[0]]['photo'] = $data['photo'];
            }
        }
        return $result;
    }

    /**
     *
     */
    function  saveChanges()
    {
        $id_u = mysql_fetch_array(mysql_query("SELECT `id` FROM users WHERE name='" . $_SESSION['name'] . "'"));
        if (!empty($_POST['name'])) {
            mysql_query("UPDATE users SET `name`='" . $_POST['name'] . "' WHERE id='" . $id_u['id'] . "'");
            $_SESSION['name'] = $_POST['name'];
        }
        if (!empty($_POST['city'])) {
            mysql_query("UPDATE user_info SET `city`='" . $_POST['city'] . "' WHERE id='" . $id_u['id'] . "'");
        }
        if (!empty($_POST['birthday'])) {
            mysql_query("UPDATE user_info SET `birthday`='" . $_POST['birthday'] . "' WHERE id='" . $id_u['id'] . "'");
        }
        if (!empty($_POST['phone'])) {
            mysql_query("UPDATE user_info SET `phone`='" . $_POST['phone'] . "' WHERE id='" . $id_u['id'] . "'");
        }
        if (!empty($_POST['about'])) {
            mysql_query("UPDATE user_info SET `about`='" . $_POST['about'] . "' WHERE id='" . $id_u['id'] . "'");
        }
        if (!empty($_POST['check'])) {
            if (isset($_POST['public_phone'])) {
                $_POST['public_phone'] = 1;
            }
            if (isset($_POST['public_birthday'])) {
                $_POST['public_birthday'] = 1;
            }
            mysql_query("UPDATE user_info SET `public_phone`='" . $_POST['public_phone'] . "', `public_birthday`='" . $_POST['public_birthday'] . "' WHERE id='" . $id_u['id'] . "'");
        }
        if (!empty($_POST['photo'])) {
            $path = "views/user/" . $_POST['photo'];
            mysql_query("UPDATE user_info SET `photo`='" . $path . "' WHERE id='" . $id_u['id'] . "'");
        }

    }

    /**
     *
     */
    function getAllMessages()
    {
        $mes = array();
        $id_u = mysql_fetch_array(mysql_query("SELECT `id` FROM users WHERE name='" . $_SESSION['name'] . "'"));
        if ($_GET['s'] === 'received') {
            $mes_sql = mysql_query("SELECT * FROM mails JOIN users on u_from = users.id JOIN user_info ON u_from = user_info.id WHERE u_to='" . $id_u['id'] . "' ORDER BY time DESC");
        } else if ($_GET['s'] === 'sended') {
            $mes_sql = mysql_query("SELECT * FROM mails  JOIN users on u_to = users.id JOIN user_info ON u_to = user_info.id WHERE u_from='" . $id_u['id'] . "' ORDER BY time DESC");
        } else {
            return;
        }
        while ($data = mysql_fetch_assoc($mes_sql)) {
            $mes[] = $data;
        }
        return $mes;
    }

    /**
     * @return array
     */
    function sendTo()
    {
        return $this->getFriends();
    }

    /**
     *
     */
    function send()
    {
        if (!empty($_POST)) {
            $u_from = mysql_fetch_array(mysql_query("SELECT `id` FROM users WHERE name='" . $_SESSION['name'] . "'"));
            $u_from = $u_from['id'];
            $u_to = mysql_fetch_array(mysql_query("SELECT `id` FROM users WHERE name='" . $_GET['to'] . "'"));
            $u_to = $u_to['id'];
            $text = $_POST['mail'];
            $time = date('Y-m-d H:i:s');
            if (!mysql_query("INSERT INTO mails(`u_from`, `u_to`, `time`, `state`, `text`) VALUES ('$u_from', '$u_to','$time' , '0', '$text')")) {
                echo mysql_error();
            } else {
                echo "Your message to " . $_GET['to'] . " is sended";
            }
        }
    }

    function addQuiz()
    {
        $id_u = mysql_fetch_array(mysql_query("SELECT `id` FROM users WHERE name='" . $_SESSION['name'] . "'"));
        $id_u = $id_u['id'];
        $topic = $_POST['topic'];
        $ans_1 = $_POST['1'];
        $ans_2 = $_POST['2'];
        $ans_3 = $_POST['3'];
        $ans_4 = $_POST['4'];
        if (!mysql_query("INSERT INTO quiz_topic VALUES ('', '$id_u', '$topic', '$ans_1', '$ans_2', '$ans_3', '$ans_4')")) {
            echo mysql_error();
        } else {
            echo "Your quiz " . $topic . " is added";
        }
    }

    function getQuizes()
    {
        $sql = mysql_query("SELECT * FROM quiz_topic");
        while ($data = mysql_fetch_assoc($sql)) {
            $quiz[$data['id']][] = $data;
        }
        return $quiz;
    }

    function vote()
    {
        $id_us = mysql_fetch_array(mysql_query("SELECT `id` FROM users WHERE name='" . $_SESSION['name'] . "'"));
        $id_us = $id_us['id'];
        $id_vote = $_GET['vote'];
        $id_u = mysql_fetch_array(mysql_query("SELECT `id` FROM quiz_topic WHERE topic='" . $_GET['topic'] . "'"));
        $id_u = $id_u['id'];
        $sql = mysql_query("INSERT INTO quiz_vote VALUES ('', '$id_u', '$id_us', '$id_vote')");
    }

    function getVotes()
    {
        $result = array();
        $quiz_ids = mysql_query("SELECT `quiz_id` FROM quiz_vote");
        while ($quiz_id = mysql_fetch_assoc($quiz_ids)) {
            $result[$quiz_id['quiz_id']]['votes_1'] = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS number FROM quiz_vote WHERE answer_id = '1' AND quiz_id='" . $quiz_id['quiz_id'] . "'"));
            $result[$quiz_id['quiz_id']]['votes_2'] = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS number FROM quiz_vote WHERE answer_id = '2' AND quiz_id='" . $quiz_id['quiz_id'] . "'"));
            $result[$quiz_id['quiz_id']]['votes_3'] = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS number FROM quiz_vote WHERE answer_id = '3' AND quiz_id='" . $quiz_id['quiz_id'] . "'"));
            $result[$quiz_id['quiz_id']]['votes_4'] = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS number FROM quiz_vote WHERE answer_id = '4' AND quiz_id='" . $quiz_id['quiz_id'] . "'"));
        }
        return $result;
    }

    function voted()
    {
        $result = array();
        $id_us = mysql_fetch_array(mysql_query("SELECT `id` FROM users WHERE name='" . $_SESSION['name'] . "'"));
        $id_us = $id_us['id'];
        $quiz_ids = mysql_query("SELECT `quiz_id` FROM quiz_vote WHERE voter_id='" . $id_us . "'");
        while ($quiz_id = mysql_fetch_assoc($quiz_ids)) {
            $result[$quiz_id['quiz_id']] = true;
        }
        return $result;
    }

}