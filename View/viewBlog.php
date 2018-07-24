<?php $this->title = 'Billet simple pour l\'Alaska - Jean Forteroche'; ?>

<?php foreach ($posts as $post): ?>
<article class="col-xs-offset-1 col-xs-10">
    <div>
        <a href="<?="index.php?action=post&id=" . $post['id'] ?>">
            <h1 class="titlePost"><?= $post['title'] ?></h1>
        </a>
        <time><?= $post['publication_date_fr'] ?></time>
    </div>
    <p><?= $post['content'] ?></p>
</article>
<hr/>
<?php endforeach;?>


