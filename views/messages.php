 <link rel="stylesheet" href="http://localhost/web/4/god/views/index.css">
  <link rel="stylesheet" href="http://localhost/web/4/god/views/admin.css">
<?php

while ($row = mysql_fetch_array($array))
    {
        echo "<div class='question'";
        $delete = $row['email'];
        echo "<ul>";
        echo "<li>";
        echo ++$i.". "."<b>Name:</b> ".$row['name']."<br/>";
        echo "<b>Email:</b> ".$row['email']."<br/>";
        echo "<b>Date:</b> ".$row['date']."<br/>";
        echo "<b>Comment:</b> ".$row['message']."<br/>";
        echo "<a name='1' href=\"http://localhost/web/4/god/admin/messages/?delete=$delete\">Delete</a>";
        echo "<span> </span>";
        echo "<a name='1' href=\"http://localhost/web/4/god/admin/messages/?answer=$delete\">Answer</a>";
        echo "</li>";
        echo "<hr/>";
        echo "<br/>";
        echo "</ul>";
        echo "</div>";
    }

 ?>

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
         width:20%;
         height:10%;
         background-color: azure;
         border-radius: 10%;
         cursor: pointer;
     }
 </style>
