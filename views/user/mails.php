
<div class="select_mail">
    <a href="/web/4/god/profile/send">Send a message</a>
    <a href="/web/4/god/profile/messages/?s=received">Received</a> <br>
    <a href="/web/4/god/profile/messages/?s=sended">Sended</a>
</div>
<div class="mails">
    <h2><span class="your_friends"><?php if ($_GET['s'] === 'received') {?>Your received messages: <?php } else {?> Your sended messages:<?php }?></span></h2> <hr>
<?php
foreach ($messages as $message) {
    ?>
    <div class = "one_mail">
        <div class="profile_photo_mail">
            <img class="photo" src="<?php echo "/web/4/god/" . $message['photo'] ?>" width=20% height=20%>
        </div>
        <div class="profile_name_mail">
            <a href="/web/4/god/profile/view/?who=<?php echo $message['name'] ?>"><?php echo $message['name'] ?></a>
            <br><span class="time"><?php echo $message['time']?></span>
            <span class="mail_text"><?php echo $message['text']?></span>
        </div>
    </div>
    <?php
}

?>
</div>