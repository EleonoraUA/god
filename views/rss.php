 <link rel="stylesheet" href="http://localhost/web/4/god/views/rss.css">
<?php
foreach($xml->children() as $article)
    {
    	$a = $article->link;
    		
    	?>
    	<div class="article">
    	<a href="<?php echo $a?>">
    <?php
        echo $article->title."<br />"; ?>
        </a>
        <?php
        echo $article->short."...";
    ?>
        </div>
    <?php
       
    }