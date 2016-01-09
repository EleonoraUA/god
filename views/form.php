
<form id="form" action="" method="POST">
    <label class = "lbl">Name: <br/><input type="text" id="name" placeholder="Enter your name" name="name">
        <span class="error">*<?php echo $nameErr ?></span> <br /><br/></label>

    <label class = "lbl">E-mail: <br/><input type="text" id="email" placeholder="Enter your e-mail" name="email">
        <span class="error">*<?php echo $emailErr ?></span><br /><br/></label>

    <label class = "lbl">Password: <br/><input type="password" id="pass" name="password">
        <span class="error">*<?php echo $passErr ?></span><br /><br/></label>

    <input type="submit" value="OK">
</form>
<style>
    input[type='text'] {
        padding: 1%;
        width: 50%;
        height: 5%;
        border: 1px solid rgb(59,123,246);
        box-shadow: 0 0 3px rgba(59,123,246, 1);
    }
    input[type="submit"]
    {
        width:7%;
        height:4%;
        background-color: azure;
        border-radius: 10%;
        cursor: pointer;
    }
    form {
        width:90%;
        background-color: white;
        margin-left: 2%;
        margin-top: 2%;
    }
</style>



