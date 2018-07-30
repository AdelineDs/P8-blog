<?php $this->title = 'Billet simple pour l\'Alaska - Jean Forteroche'; ?>

<section class="col-lg-offset-3 col-lg-6 col-xs-offset-1 col-xs-10 presentation">
    <h2>Bienvenue !</h2>
    <p>Je vous souhaite la bienvenue sur ce blog spécialement créé pour mon nouveau roman "Billet simple pour l'Alaska".
    J'ai décidé de publié ce nouveau roman par étapes que vous pourrez suivre régulièrement ici. Je vous souhaite une bonne lecture.
    </p>
    <p>- Jean Forteroche -</p>
</section>
<div class="col-xs-12 separation">
    <div class="circle"></div>
</div>

<?php foreach ($posts as $post): ?>
<article class="col-lg-offset-3 col-lg-6 col-xs-offset-1 col-xs-10 post">
    <div>
        <a href="<?="index.php?action=post&AMP;id=" . $post['id'] . "&AMP;page=1" ?>">
            <h1 class="titlePost"><?= $post['title'] ?></h1>
        </a>
        <time class="datePost"><?= $post['publication_date_fr'] ?></time>
    </div>
    <div class="textPost">
        <?php if(strlen($post['content']) > 450){
            $space = strpos($post['content'], ' ', 450);
            $post['content'] = substr($post['content'], 0, $space);
            echo strip_tags($post['content']) . ' ...';?>
        <a href="<?="index.php?action=post&AMP;id=" . $post['id'] . "&page=1" ?>">
            <p class="linkPost">Lire la suite</p>
        </a>
        <?php } else {
            echo strip_tags($post['content']);
        }    
 ?></div>
</article>
<?php endforeach;?>


