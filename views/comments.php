<?php
error_reporting(0);
session_start();

    $routes = explode('/', $_SERVER['REQUEST_URI']);
    $routes = $routes[count($routes) - 1];
    if ($routes != "RSS" && $routes != "contact" && $routes != "FAQ" && $routes != "login" && $routes != "registration") {
        ?>
        <div class="comments">
            <?php
            if ($comments) {
                foreach ($comments as $comment) {
                    ?>
                    <ul class='mess'>
                        <li>
                            <div class='comment'><b><span class='name'><?php echo $comment['name'] . " " ?></span></b>left a
                                comment on
                                <span class='date'><?php echo $comment['date'] ?></span><br/><br/>
                                <span class='text'><?php echo $comment['text'] ?></span></div>
                            <br/>
                        </li>
                        <br/>
                    </ul>
                    <?php
                }
            } else { ?>
                <b><span class='noComments'>There are no comments. Be the first!</span></b>
                <?php
            }
            if (!empty($_SESSION)) {
                ?>
                <br/>
                <form method="POST" action="">
                    <label class="lbl">Leave your comment: <br/><textarea required cols="40" rows="6"
                                                                          name="text"></textarea><br/>
                        <input type="submit" value="OK">
                </form>
                </div>
                <?php
            } else {
                echo "<b><span class='noComments'>Sign in to leave the comment!</span></b>";
            }
    }

    ?>

<style>
    .noComments {
        font-family: "century gothic";
        font-variant: small-caps;
        margin-left: 12%;
        font-size: 20px;
        color: black;
    }

    .lbl {
        font-family: "century gothic";
        font-variant: small-caps;
        margin-left: 12%;
        color: rgb(59,123,246);
        font-weight: bold;
    }
    .name {
        font-size: 15px;
        color:rgb(59,123,246);
    }
    .date {
        font-size: 15px;
    }
    .text {
        font-size: 20px;
    }
    .mess {
        font-family: "century gothic";
        font-variant: small-caps;
        list-style: none;
    }
    .comment {
        padding:2%;
        max-width: 78.7%;
        margin-left: 7.3%;
        border: 2px solid rgba(0,169,0,0.5);
        background-color: whitesmoke;
    }
    textarea {
        border: 1px solid rgb(59,123,246);
        box-shadow: 0 0 3px rgba(59,123,246, 1);
        margin-left: 10%;
        width: 50%;
    }

    input[type="submit"] {
        width: 7%;
        margin-left: 10%;
        height: 5%;
        margin-top: 2%;
        background-color: white;
    }
</style>
