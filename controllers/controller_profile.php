<?php

error_reporting(E_ALL);
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
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $this->view = new View();
        $this->view->generate("profile_header.html");
    }
    function action_view()
    {

    }

}