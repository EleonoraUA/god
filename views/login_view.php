<form id="form_login" action="" method="POST">
    <label class="lbl">E-mail: <br/><input type="text" id="email" placeholder="Enter your e-mail" name="email">
        <br/><br/></label>

    <label class="lbl">Password: <br/><input type="password" id="pass" name="password">
        <br/><br/></label>

    <input type="submit" value="OK">
</form>

<style>
    input {
        padding: 1%;
        width: 50%;
        height: 8%;
        border: 1px solid rgb(59, 123, 246);
        box-shadow: 0 0 3px rgba(59, 123, 246, 1);
    }

    input[type="submit"] {
        width: 10%;
        height: 6%;
        margin-left: 63%;
        background-color: azure;
        border-radius: 10%;
        cursor: pointer;
    }
</style>