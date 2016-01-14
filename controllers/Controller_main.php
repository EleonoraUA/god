<?php
require_once("models/Model_contact.php");
require_once("models/Model_FAQ.php");
error_reporting(0);

class Controller_Main extends Controller
{

    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
        if (!empty($_SESSION['edit'])) {
            $content = $_SESSION['edit'];
            include_once('views/template_view.php');
            include_once('views/main_view.php');
            /*$this->view->generate('main_view.php', 'template_view.php', $data, $_GET['preview']);*/

        } else {
            $routes = explode('/', $_SERVER['REQUEST_URI']);
            $data = $this->model->get_data();
            if (isset($routes[5]) || $routes[4] === "login") {
                $data = $this->model->get_data();
                $this->model->addComment($routes[5]);
                $comments = $this->model->getComments($routes[5]);
                $content = $this->model->get_content($routes[5]);
                $topic = explode('.', $routes[5]);
                $this->view->generate('main_view.php', 'template_view.php', $data, $content[0]);
                include_once('views/comments.php');
            }
        }

    }

    function action_index()
    {

        /*var_dump($_POST);
        $data = $this->model->get_data();
        $this->model->addComment();
        $comments = $this->model->getComments();
        include_once("views/main_view.php");
        $this->view->generate('main_view.php', 'template_view.php', $data);*/
    }

    function action_contact()
    {
        $this->view->generate('contact.html');
        include_once("views/footer.html");
        $this->model = new Model_contact();
        $this->model->get_data();
    }

    function action_FAQ()
    {
        $this->model = new Model_FAQ();
        $pages = $this->model->get_data();
        $array = $this->model->next();
        require_once("views/faq.html");
    }

    function action_RSS()
    {
        $this->model = new Model_Main();
        $result = $this->model->RSS_topic();
        $rss = true;
        include_once("core/rss.php");
        $xml = simplexml_load_file('http://localhost/web/4/god/goods.xml');
        require_once("views/rss.php");
    }


}