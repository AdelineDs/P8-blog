<?php $this->title = 'Billet simple pour l\'Alaska - Jean Forteroche'; ?>

<section class="col-xs-offset-1 col-xs-10 presentation">
    <h2>Bienvenue !</h2>
    <p>Je vous souhaite la bienvenue sur ce blog spécialement créé pour mon nouveau roman "Billet simple pour l'Alaska".
    J'ai décidé de publié ce noubeau roman par étapes que vous pourrez suivre régulièrement ici
    </p>
</section>

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
<hr />
<?php endforeach;?>


