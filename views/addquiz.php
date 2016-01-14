<form id="form_contact" method="post" action="">
    <label class="lbl">Topic: <br/><input type="text" placeholder="Enter topic" name="topic" required> <br/><br/></label>
    <label class="lbl">Enter variants(no more than 4): <br/><input type="text" name="1" required>
        <br/><br/></label>
    <br/><input type="text" name="2" value=''><br/><br/>
    <br/><input type="text" name="3"> <br/><br/>
    <br/><input type="text"name="4"> <br/><br/>
    <br/><br/>
    <input type="submit" value="OK">
</form>

<style>
    input {
        padding: 1%;
        width: 50%;
        height: 8%;
        border: 1px solid rgb(59,123,246);
        box-shadow: 0 0 3px rgba(59,123,246, 1);
    }
    input[type="submit"]
    {
        width:10%;
        height:7%;
        background-color: azure;
        border-radius: 10%;
        cursor: pointer;
        margin-left: 65%;
    }
    form {
        width:90%;
        height: 80%;
        background-color: white;
        border:1px dotted darkslateblue;
        padding:2%;
        margin-left: 2%;
        border-radius: 5%;
    }

    textarea {
        margin-left: 25%;
    }
</style>