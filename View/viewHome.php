<?php $title = 'Billet simple pour l\'Alaska - Jean Forteroche'; 
ob_start(); 
foreach ($posts as $post): ?>
<article class="col-xs-offset-1 col-xs-10">
    <div>
        <a href="<?="post.php?id=" . $post['id'] ?>">
            <h1 class="titlePost"><?= $post['titre'] ?></h1>
        </a>
        <time><?= $post['date_publication_fr'] ?></time>
    </div>
    <p><?= $post['contenu'] ?></p>
</article>
<hr />
<?php endforeach;
$content = ob_get_clean(); 

require 'template.php'; ?>


