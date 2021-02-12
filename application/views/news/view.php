<?php
echo '<h2>'.$news_item['title'].'</h2>';
echo $news_item['text'];

?>
<p><a href="<?= site_url('news/');?>">Back</a></p>
<p><a href="<?= site_url('news/'.$news_item['slug'].'/edit');?>">Edit</a></p>
<p><a href="<?php echo site_url('news/'.$news_item['id'].'/delete/');?>">Delete</a></p>



