<?php

class Model_Main extends Model
{
    public function get_data()
    {
        $queryNLogged = "SELECT `topic` FROM articles  WHERE (`loggedIn`=0 AND state=1) ORDER BY order_num";
        $qLogged = "SELECT `topic` FROM `articles` WHERE state=1 ORDER BY order_num";
        session_start();
        if (!isset($_SESSION['name'])) {
            if (!$get = mysql_query($queryNLogged)) echo mysql_error();
        } else {
            if (!$get = mysql_query($qLogged)) echo mysql_error();
        }
        $i = 0;
        while ($articles = mysql_fetch_array($get)) {
            $data[$i] = $articles['topic'];
            $i++;
        }
        return $data;
    }

    public function get_content($topic)
    {
        $query = "SELECT `text` FROM content WHERE topic='" . $topic . "'";
        if (!$query) die("loh");
        $get = mysql_query($query);
        if (!$get) die (mysql_error());
        return $text = mysql_fetch_row($get);
    }

    public function RSS_topic($switch = null, $topic = null, $rss_xml = null)
    {
        if (!$switch) {
            session_start();
            if (empty($_SESSION))
                $qNotLoggedTopic = "SELECT articles.topic,content.short FROM articles INNER JOIN content ON content.topic=articles.topic WHERE articles.topic != 'contact' AND articles.topic != 'FAQ' AND articles.topic != 'RSS' AND articles.loggedIn = 0 AND articles.state = 1 AND content.short!= '';";
            else $qNotLoggedTopic = "SELECT articles.topic,content.short FROM articles INNER JOIN content ON content.topic=articles.topic WHERE articles.topic != 'contact' AND articles.topic != 'FAQ' AND articles.topic != 'RSS' AND articles.loggedIn = 1 OR articles.loggedIn=0 AND articles.state = 1 AND content.short!= ''";
        } else {
            $qNotLoggedTopic = "SELECT articles.topic,content.text FROM articles INNER JOIN content ON content.topic=articles.topic WHERE articles.topic = '" . $topic . "'";
        }
        if (!($arr = mysql_query($qNotLoggedTopic))) die(mysql_error());
        while ($data = mysql_fetch_array($arr)) {
            if (!$switch)
                $result[$data['topic']] = $data['short'];
            else $result[$data['topic']] = $data['text'];
        }
        return $result;
    }

    public function getComments($topic)
    {
        $query = "SELECT * FROM comments JOIN user_info ON user_info.id = comments.author_id JOIN users ON comments.author_id = users.id WHERE article_topic='" . $topic . "' AND status = 1";
        $get = mysql_query($query);
        while ($arr = mysql_fetch_array($get)) {
            $result[] = $arr;
        }
        return $result;
    }

    public function addComment($article)
    {
        if (!empty($_POST)) {
            $id_u = mysql_fetch_array(mysql_query("SELECT `id` FROM users WHERE name='" . $_SESSION['name'] . "'"));
            $id_u = $id_u['id'];
            $date = date('Y-m-d H:i:s');
            $ip = $_SERVER['REMOTE_ADDR'];
            $text = $_POST['text'];
            if (!mysql_query("INSERT INTO comments VALUES ('', '$id_u', '$article', '$date', '$ip', '$text', '0')")) {
                echo mysql_error();
            }
        }
    }

    public function getPreview($prev)
    {
        $_SESSION['edit'] = $prev;
        header("Location: /web/4/god/main/home");

    }

    public function get_json($topic)
    {
        $result = array();
        $query = "SELECT `text` FROM content WHERE topic='" . $topic . "'";
        if (!$query) die("loh");
        $get = mysql_query($query);
        if (!$get) die (mysql_error());
        while ($arr = mysql_fetch_array($get)) {
            $result['topic'] = $topic;
            $result['content'] = htmlspecialchars($arr["text"], ENT_SUBSTITUTE);
        }
        return $result;
    }
}