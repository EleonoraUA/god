<?php
if (empty($_SESSION['edit'])) {
    echo $content;
} else {
    echo $_SESSION['edit'];
    $_SESSION['edit'] = NULL;
}
