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
    /**
     * @var
     */
    protected $user_id;

    /**
     *
     */
    function __construct()
    {
        session_start();
        $this->model = new Model_Profile();
        $this->view = new View();
        $this->view->generate("profile_header.html");
    }

    /**
     *
     */
    function action_view()
    {
        $info = $this->model->getUserInfo();
        $friends = $this->model->getFriends();
        $this->user_id = $info['id'];
        include_once("views/user/profile.php");
    }

    /**
     *
     */
    function action_all()
    {
        $result = $this->model->getAllUsers();
        $all = $result[0];
        $friends = $result[1];
        include_once("views/user/all.php");
    }

    /**
     *
     */
    function action_add()
    {
        $this->model->addToFriends($this->user_id);
    }

    /**
     *
     */
    function action_settings()
    {
        if (!empty($_POST)) {
            $this->model->saveChanges();
        } else {
            $checked = $this->model->getChecked();
            include_once("views/profile_settings.html");
        }
    }

    /**
     *
     */
    function action_messages()
    {
        $messages = $this->model->getAllMessages();
        include_once("views/user/mails.php");
    }

    /**
     *
     */
    function action_send()
    {
        $this->model->send();
        $friends = $this->model->sendTo();
        include_once("views/user/sendTo.php");
    }

    function action_addquiz()
    {
        if (!empty($_POST)) {
            $this->model->addQuiz();
        } else {
            include_once("views/addquiz.php");
        }
    }

    function action_seequiz()
    {
        $quizes = $this->model->getQuizes();
        $votes = $this->model->getVotes();
        $voted = $this->model->voted();
        include_once("views/quizes.php");
    }

    function action_vote()
    {
        $this->model->vote();
    }


}