<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/'.$news_item['slug'].'/edit'); ?>

    <label for="title">Title</label>
    <input type="text" name="title"  value="<?= $news_item['title']?>"/><br />

    <label for="text">Text</label>
    <textarea name="text"> <?= $news_item['text']?></textarea><br />

    <input type="submit" name="submit" value="Edit news item" />

</form>
<p><a href="<?= site_url('news/');?>">Back</a></p>
