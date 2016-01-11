<div class="profile_photo">
    <img class="photo" src="<?php echo "/web/4/god/".$info['photo']?>" width=50% height=50%>
</div>
<div class="profile_name"><?php echo $info['name']?></div>
<div class="profile_contact">
    <?php if ($info['public_birthday']) { ?>
        <b>Birthday:</b> <?php echo date('F j, Y', strtotime($info['birthday']));
    }?>
    <br />
    <b>City:</b> <?php echo $info['city'];?>
    <br />
    <?php if ($info['public_phone']) { ?>
        <b>Phone:</b> <?php echo $info['phone'];
    }?>
    <br />
    <b>About: </b>
    <span class="about_text">
    <?php echo $info['about'];?>
    </span>
</div>
<div class="friends">
    <span class="your_friends">You are friends with:</span>
    <hr>
    <?php
        foreach ($friends as $friend) {
            ?>
            <div class = "p_n">
            <div class="profile_photo_friend">
                <img class="photo" src="<?php echo "/web/4/god/" . $friend['photo'] ?>" width=20% height=20%>
            </div>
            <div class="profile_name_friend">
                <a href="/web/4/god/profile/view/?who=<?php echo $friend['name'] ?>"><?php echo $friend['name'] ?></a>
                <a name = 'send' class = 'add_send' href="/web/4/god/profile/send/?to=<?php echo $friend['name']?>">Send a message</a>

            </div>
            </div>

            <?php
        }
    ?>
</div>
