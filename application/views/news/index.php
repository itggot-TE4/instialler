<h2><?php echo $title; ?></h2>

<p><a href="<?= site_url('news/create');?>">Create new article</a></p>

<?php foreach ($news as $news_item): ?>

        <h3><?php echo $news_item['title']; ?></h3>
        <div class="main">
                <?php echo $news_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>
        <p><a href="<?= site_url('news/'.$news_item['slug'].'/edit');?>">Edit</a></p>
        <hr>
<?php endforeach; ?>