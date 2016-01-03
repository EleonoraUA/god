<script src="/web/4/god/views/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="http://localhost/web/4/god/views/script.js"></script>
 <div class="nav"> <ul>
<?php
for ($i = 1; $i < $pages + 1; $i++) { ?>
<li><a id='faq' name='1' href='http://localhost/web/4/god/main/FAQ/<?php echo $i?>'><?php echo $i ?> </a></li>; 
<?php } ?>
</ul></div>
<div class="mes">
<b> <br /> <br />
<?php 
$i = $start;
    while ($row = mysql_fetch_array($array))
    {
        $delete = $row['email'];
        echo "<ul class='mess'>";
        echo "<li>";
        echo "<div class='question'>".++$i.". "."<b>Name:</b> ".$row['name']."<br/>";
        echo "<b>Date:</b> ".$row['date']."<br/>";
        echo "<b>Asked:</b> ".$row['message']."</div><br/>";
        echo "<div class='answer'><b>Admin:</b> ".$row['answer']."</div><br/>";
        echo "</li>";
        echo "<br/>";
        echo "</ul>";
    } 
    ?>
    </div>
    <style>
       .question {
        border:2px solid rgba(255,0,0,0.5);
        background-color: rgba(255,0,0,0.1);
       }
       .answer {
        border: 2px solid rgba(0,169,0,0.5);
        background-color: rgba(0,169,0,0.1);
       }

       .question, .answer {
        width:300%;
        padding:10 10 10 10px;
        margin-left:12%;
        border-radius: 6%;
       }
        li {
            display: inline;
        }
        .mes{
            font-size:20px;
            margin-top: -5%;
            margin-left: 4%;
            position: absolute;
        }
        .nav
        {
            display:inline;
            width: 100px;
            height:10px;
        }
        a[name='1'] {
            text-decoration: none;
            margin-top: -20%;
            margin-left:0%;
            width:12%;
            height:10px;
        }

        a[name='wo'] {
            position: absolute;
            margin-top: -6%;
            text-decoration: none;
            margin-left:7%;
        }

    </style>












