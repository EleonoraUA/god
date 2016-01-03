
 <?php

    if ($content['state'] === "YES")
    echo "<tr>"."<td>"."<a href=\"http://localhost/web/4/god/main/$topic\">".$content['topic']."</a>"."</td>";
    else echo "<tr>"."<td>".$content['topic']."</td>";
    ?>
   <td><?php echo $content['author']?></td>
   <td><a href="http://localhost/web/4/god/admin/pages/?stat=<?php echo $state?>&topic=<?php echo $topic?>"><?php echo $content['state']?></a></td>
   <td><a href="http://localhost/web/4/god/admin/pages/?log=<?php echo $logged?>&topic=<?php echo $topic?>"><?php echo $content['loggedIn']?></td>
   <td><?php echo $content['order_num']?></td>
   <td><a href="http://localhost/web/4/god/admin/pages/?delete=<?php echo $topic?>"><?php echo $content['topic']?></a></td>
    <td><a href="http://localhost/web/4/god/admin/editPage/?edit=<?php echo$topic?>"><img src="http://localhost/web/4/god/views/edit.png"></a></td>
    </tr>


