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

