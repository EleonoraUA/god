<?php

error_reporting(0);
/**
 * Created by PhpStorm.
 * User: Eleonora
 * Date: 07.01.2016
 * Time: 17:27
 */
class Controller_Profile extends Controller
{
    function __construct()
    {
        session_start();
        $this->model = new Model_Profile();
        $this->view = new View();
        $this->view->generate("profile_header.html");
    }
    function action_view()
    {
        $info = $this->model->getUserInfo();
        include_once("views/user/profile.php");
    }

    function action_all()
    {
        $all = $this->model->getAllUsers();
        include_once("views/user/all.php");
    }

    function action_add()
    {
        var_dump($_GET);
    }

}