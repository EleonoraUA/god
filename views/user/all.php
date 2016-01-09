<?php
/**
 * Created by PhpStorm.
 * User: Eleonora
 * Date: 07.01.2016
 * Time: 21:08
 */
foreach ($all as $user) {
    if ($user['name'] != $_SESSION['name']) {
        ?>
        <div class="profile_photo_all">
            <img class="photo" src="<?php echo "/web/4/god/" . $user['photo'] ?>" width=20% height=20%>
        </div>
        <div class="profile_name_all"><a
                href="/web/4/god/profile/view/?who=<?php echo $user['name'] ?>"><?php echo $user['name'] ?></a></div>
        <div class="profile_contact">
            <b>City:</b> <?php echo $user['city']; ?>
            <br/>
            <b>About: </b>
    <span class="about_text">
    <?php echo $user['about']; ?>
    </span>
            <br/>

            <a class = 'add_send' href="/web/4/god/profile/add/?who=<?php echo $user['name']?>"> <?php if (!$friends[$user['id']]) {?>Add to Friends<?php } ?></a>

            <a class = 'add_send' href="/web/4/god/profile/send">Send a message</a>
        </div>
        <br/><br/><br/><br/><br/><br/>
        <?php
    }
}