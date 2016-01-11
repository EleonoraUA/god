
<div class="friends_send_to">
    <?php
        foreach ($friends as $friend) {
            ?>
            <div class = "p_n">
                <div class="profile_photo_friend">
                    <img class="photo" src="<?php echo "/web/4/god/" . $friend['photo'] ?>" width=20% height=20%>
                </div>
                <div class="profile_name_friend_sendTo">
                    <a href="/web/4/god/profile/view/?who=<?php echo $friend['name'] ?>"><?php echo $friend['name'] ?></a>
                    <a name = 'send' class = 'add_send' href="/web/4/god/profile/send/?to=<?php echo $friend['name'] ?>">Send a message</a>
                </div>
            </div>

            <?php
        }
    ?>
</div>
<?php
if (!empty($_GET['to'])) {
    ?>
    <div class="mail_form">
    <form method="POST" action="?to=<?php echo $_GET['to']?>">
        <label><?php echo "Your message to ".$_GET['to']?>
            <textarea name = 'mail' class="mail" required></textarea>
        </label>
        <input type="submit" value="Send">
    </form>
    <div>
<?php

}