<?php
require_once("Controller_main.php");
require_once("models/Model_main.php");

class Controller_Login extends Controller_main
{
    function action_index()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->model = new Model_login();
            $this->model->setId($email);
            $this->model->get_data($email, $password);
            $this->view->generate('template_view.php');
        } else {
            $this->view->generate('login_view.php');
        }
    }

    function action_out()
    {
        session_destroy();
        unset($_SESSION);
        header("Location: http://localhost/web/4/god/main/home");
    }

    function action_registration()
    {
        $this->model = new Model_login();
        if (!empty($_POST)) {
            $this->model->registration();
        } else {
            include_once('views/form.php');
        }
    }
}
