<?php

?>
<html>
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="http://localhost/web/4/god/views/index.css">
    <link rel="stylesheet" href="http://localhost/web/4/god/views/admin.css">
</head>
<body class="news">
    <header>
    <img alt="hendo" src="http://localhost/web/4/god/views/hendo.png"/>
    <?php
    if (isset($_GET['state'])) {
        session_destroy();
        header("Location: index.php?action=home");
    }

?>
   <a name='12' href = "http://localhost/web/4/god/admin/out">Sign out</a>

    <ul>
        <li><a href="http://localhost/web/4/god/admin/pages"> Page control</a></li><br/><br/>
        <li><a href="http://localhost/web/4/god/admin/messages"> Messages control</a></li>
        <li><a name='new' href="http://localhost/web/4/god/admin/addPage">New page</a></li>
    </ul>
    </header>
<hr/>