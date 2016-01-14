<?php
include_once("Model_main.php");

/**
 * Class Model_admin
 */
class Model_admin extends Model
{

    protected $main;
    /**
     *
     */
    public function getNewComments()
    {
        $sql = mysql_query("SELECT *, comments.id AS 'comment_id' FROM comments JOIN users on users.id = comments.author_id WHERE status=0");
        while ($data = mysql_fetch_assoc($sql)) {
            $comments[] = $data;
        }
        return $comments;

    }

    /**
     * @return int|resource
     */
    public function next()
    {
        if (!isset($_GET['sort'])) {
            $qArticles = "SELECT * FROM articles";
            $articles = mysql_query($qArticles);
            $content = mysql_fetch_assoc($articles);
            return $articles;
        } else return 0;
    }


    /**
     *
     */
    public function get()
    {
        if (isset($_GET['sort']))
            include_once("if.php");
    }

    /**
     * @return resource
     */
    public function admin_messages()
    {
        $messages = 10;
        if (isset($_GET['sort'])) {
            $query = "SELECT count(*) FROM `messages` WHERE answer = '0'";
        } else
            $query = "SELECT count(*) FROM `messages`";
        $arr = mysql_query($query);
        $row = mysql_fetch_row($arr);
        if (!$arr) die ("Error " . mysql_error());
        $count = $row[0];
        $pages = ceil($count / $messages);
        $num_page = $_GET['page'] - 1;
        $start = abs($num_page * $messages);
        $q = "SELECT * FROM `messages` LIMIT $start, $messages";
        if (!$array = mysql_query($q)) die(mysql_error());
        $i = $start;
        return $array;
    }

    public function deleteAndPublish()
    {
        if (!empty($_GET)) {
            if (!empty($_GET['delete'])) {
                if (!mysql_query("DELETE FROM comments WHERE id='" . $_GET['delete'] . "'")) {
                    echo mysql_error();
                }
            } else if (!empty($_GET['publ'])) {
                if (!mysql_query("UPDATE comments SET status = 1 WHERE id='" . $_GET['publ'] . "'")) {
                    echo mysql_error();
                }
            } else {

            }
        }
    }

    private function getPreview()
    {

    }

    public function preview()
    {
        if (!empty($_POST['preview'])) {
            $this->main = new Model_Main();
            $this->main->getPreview($_POST['article']);
        } else if (!empty($_POST['publish'])) {
            $this->updateArticle();
        }
    }

    /**
     *
     */
    public function addPage()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['topic'])) {
                $topic = $_POST["topic"];
                $order = $_POST["order"];
                $state = $_POST["state"];
                $loggedIn = $_POST["loggedIn"];
                $article = $_POST["article"];
                $author = $_SESSION["email"];
                $q = "INSERT INTO `articles` (`topic`, `order_num`, `loggedIn`, `state`, `author`) VALUES('$topic', '$order', '$loggedIn', '$state', '$author')";
                $content = "INSERT INTO `content` (`topic`, `text`, `author`) VALUES('$topic', '$article', '$author')";
                mysql_query($q);
                mysql_query($content);

            }
            unset($_POST);
        }
    }


    /**
     *
     */
    function delete_message()
    {
        if (isset($_GET['delete'])) {
            $q = "DELETE FROM `messages` WHERE email='" . $_GET['delete'] . "'";
            if (!mysql_query($q)) die (mysql_error());
            header("Location: http://localhost/web/4/god/admin/messages");
        }
    }

    /**
     *
     */
    function answer()
    {
        if (isset($_GET['answer'])) {
            ?>
            <form method="post" action="">
                <textarea name="article" style="width:50%;height:35%"></textarea>
                <input type="submit">
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST['article'])) {
                    $q = "UPDATE messages SET answer='$_POST[article]' WHERE email='$_GET[answer]' ";
                    if (!mysql_query($q)) die(mysql_error());
                    header("Location: http://localhost/web/4/god/admin/messages");
                }

            }

        }
    }


    /**
     *
     */
    function editing_data()
    {
        if (isset($_GET['stat'])) {
            $top = $_GET['topic'];
            $st = ($_GET['stat'] ? 0 : 1);
            $qS = "UPDATE articles SET state=$st WHERE topic='" . $top . "'";
            if (!mysql_query($qS)) die(mysql_error());
            header("Location: http://localhost/web/4/god/admin/pages");

        }
        if (isset($_GET['log'])) {
            $top = $_GET['topic'];
            $st = ($_GET['log'] ? 0 : 1);
            $qS = "UPDATE articles SET loggedIn=$st WHERE topic='" . $top . "'";
            if (!mysql_query($qS)) die(mysql_error());
            header("Location: http://localhost/web/4/god/admin/pages");

        }
        if (isset($_GET['delete'])) {
            $qoff = "SET FOREIGN_KEY_CHECKS=0";
            if (!mysql_query($qoff)) die(mysql_error());
            $qArt = "DELETE `articles`, `content` FROM articles INNER JOIN content WHERE articles.topic = content.topic AND content.topic='" . $_GET['delete'] . "'";
            if (!mysql_query($qArt)) die(mysql_error());
            $qon = "SET FOREIGN_KEY_CHECKS=1";
            if (!mysql_query($qon)) die(mysql_error());
            header("Location: http://localhost/web/4/god/admin/pages");

        }
    }


    private function updateArticle()
    {
        if (empty($_POST["article"])) die(mysql_error());
        $art = $_POST['article'];
        $top = $_GET['edit'];
        $sql = "UPDATE content SET text='" . $art . "' WHERE topic='" . $top . "'";
        if (!mysql_query($sql)) echo '<p><b>Oops</b></p>';
        else echo "Everything is okay";
    }

    /**
     * @return mixed
     */
    function edit()
    {
        if (isset($_GET['edit'])) {
            $title = $_GET['edit'];
            $q = "SELECT `text` FROM content WHERE topic='" . $title . "'";
            $temp = mysql_query($q);
            if (!$temp) die(mysql_error());
            $row = mysql_fetch_array($temp);
            echo "<h1><pre>                                    Editing " . $title . " </pre></h1>";
            return $row[0];
        }
    }


} 