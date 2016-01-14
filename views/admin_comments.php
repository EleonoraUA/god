<?php
/**
 * Created by PhpStorm.
 * User: Eleonora
 * Date: 11.01.2016
 * Time: 15:03
 */
if ($comments) {
    foreach ($comments as $comment) {
        ?>
        <div class='question'>
            <ul>
                <li>
                    <b>Name:</b><?php echo $comment['name'] ?><br/>
                    <b>Email:</b><?php echo $comment['email'] ?><br/>
                    <b>IP:</b><?php echo $comment['ip'] ?><br/>
                    <b>Topic:</b><?php echo $comment['article_topic'] ?><br/>
                    <b>Date:</b><?php echo $comment['date'] ?><br/>
                    <b>Comment:</b><?php echo $comment['text'] ?><br/>
                    <a name='1' href="/web/4/god/admin/comments/?delete=<?php echo $comment['comment_id'] ?>">Delete</a>
                    <a name='1' href="/web/4/god/admin/comments/?publ=<?php echo $comment['comment_id'] ?>">Publish</a>
                </li>
            </ul>
        </div>
        <?php
    }
} else {
    echo "There are no new comments yet";
}
?>