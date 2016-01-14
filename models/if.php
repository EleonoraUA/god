<?php
if ($_GET['sort'] === "topic") {
    $q = "SELECT * FROM articles ORDER BY topic DESC";
    if (!$articles = mysql_query($q))
        die(mysql_error());
}
if ($_GET['sort'] === "topicD") {
    $q = "SELECT * FROM articles ORDER BY topic";
    if (!$articles = mysql_query($q))
        die(mysql_error());
}
if ($_GET['sort'] === "author") {
    $q = "SELECT * FROM articles ORDER BY author DESC";
    if (!$articles = mysql_query($q))
        die(mysql_error());
}
if ($_GET['sort'] === "authorD") {
    $q = "SELECT * FROM articles ORDER BY author";
    if (!$articles = mysql_query($q))
        die(mysql_error());
}
if ($_GET['sort'] === "published") {
    $q = "SELECT * FROM articles ORDER BY state DESC";
    if (!$articles = mysql_query($q))
        die(mysql_error());
}
if ($_GET['sort'] === "publishedD") {
    $q = "SELECT * FROM articles ORDER BY state";
    if (!$articles = mysql_query($q))
        die(mysql_error());
}
if ($_GET['sort'] === "authorized") {
    $q = "SELECT * FROM articles ORDER BY loggedIn DESC";
    if (!$articles = mysql_query($q))
        die(mysql_error());
}
if ($_GET['sort'] === "authorizedD") {
    $q = "SELECT * FROM articles ORDER BY loggedIn";
    if (!$articles = mysql_query($q))
        die(mysql_error());
}
if ($_GET['sort'] === "order") {
    $q = "SELECT * FROM articles ORDER BY order_num DESC";
    if (!$articles = mysql_query($q))
        die(mysql_error());
}
if ($_GET['sort'] === "orderD") {
    $q = "SELECT * FROM articles ORDER BY order_num";
    if (!$articles = mysql_query($q))
        die(mysql_error());
}