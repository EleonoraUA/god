<?php
$xml = new DomDocument('1.0', "UTF-8");
if ($rss)
    $posts = $xml->appendChild($xml->createElement('posts'));
foreach ($result as $topic => $text) {
    $a = "http://localhost/web/4/god/main/" . $topic;
    if ($rss)
        $post = $posts->appendChild($xml->createElement('document'));
    else $post = $xml->appendChild($xml->createElement('document'));
    $link = $post->appendChild($xml->createElement('link'));
    $link->appendChild($xml->createTextNode($a));
    $title = $post->appendChild($xml->createElement('title'));
    $title->appendChild($xml->createTextNode($topic));
    $short = $post->appendChild($xml->createElement('short'));
    //$short->appendChild($xml->createTextNode("<![CDATA[".$text."]]>"));
    $stirn = htmlspecialchars($text);
    $short->appendChild($xml->createTextNode($stirn));
}

$xml->formatOutput = true; #-> устанавливаем выходной формат документа в true
$xml->save('goods.xml');   #-> сохраняем файл

