<form method="post" action="">
    <textarea name="article"><?php echo $row ?></textarea>
    <input name="publish" type="submit" value="Publish">
    <input name="preview" type="submit" value="Preview">

</form>
<style>
    textarea {
        width: 50%;
        height: 70%;
    }

    form {
        position: absolute;
        margin-top:;
    }
</style>

<style>
    form {
        width: 90%;
        height: 80%;
        background-color: white;
        border: 1px dotted darkslateblue;
        padding: 2%;
        margin-left: 2%;
        margin-top: 5%;
        border-radius: 5%;
    }

    input {
        padding: 1%;
        width: 50%;
        height: 8%;
        border: 1px solid rgb(59, 123, 246);
        box-shadow: 0 0 3px rgba(59, 123, 246, 1);
    }

    input[type="submit"] {
        width: 10%;
        height: 8%;
        background-color: azure;
        border-radius: 10%;
        cursor: pointer;
    }
</style>