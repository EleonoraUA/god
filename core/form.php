<?php
$result = array();
$link = mysql_connect("localhost", "root", "12345");
$db = mysql_select_db("hoverboard", $link);
if (!$db) die ("Unable to choose HB " . mysql_error());
if (!$link) die ("Unable to connect");
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $q = "SELECT `password`,`name`, `admin` FROM users WHERE email='" . $_POST['email'] . "' ";
    $arr = mysql_query($q);
    $row = mysql_fetch_assoc($arr);
    if (!$arr) die ("Error " . mysql_error());
    $passw = $row['password'];
    if (!strcmp($passw, $_POST['password'])) {
        session_start();
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['admin'] = $row['admin'];
        $result['admin'] = $row['admin'];
        $result['message'] = '';
    } else {
        $result['admin'] = 2;
        $result['message'] = "Re-enter your data";
    }

}
$result = json_encode($result);
echo $result;