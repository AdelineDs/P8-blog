<?php $this->title = 'Billet simple pour l\'Alaska - Jean Forteroche'; ?>

<?php foreach ($posts as $post): ?>
<article class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 post">
    <div>
        <a href="<?="index.php?action=post&AMP;id=" . $post['id'] . "&page=1" ?>">
            <h1 class="titlePost"><?= strip_tags($post['title']) ?></h1>
        </a>
        <time class="datePost"><?= $post['publication_date_fr'] ?></time>
    </div>
    <div class="textPost"><?php if(strlen($post['content']) > 500){
            $space = strpos($post['content'], ' ', 500);
            $post['content'] = substr($post['content'], 0, $space);
            echo strip_tags($post['content']) . ' ...';?>
        <a href="<?="index.php?action=post&AMP;id=" . $post['id'] . "&page=1" ?>">
            <p class="linkPost">Lire la suite</p>
        </a>
        <?php } else {
            echo strip_tags($post['content']);
        }    
 ?></div>
    <?php
            if (isset($_SESSION['id']) AND isset($_SESSION['login']))
            {?>
            <div class="gestionAdmin">
                <p>
                    <strong>Gestion du billet :</strong>
                    <span><a href="<?= "index.php?action=editPost&AMP;id=" . $post['id'] ?>">Modifier</a></span> /
                    <span><a href="<?= "index.php?action=deletePost&AMP;id=" . $post['id'] ?>">Supprimer</a></span>
               </p> 
               <p>
                   <strong>Gestion des commentaires :</strong>
                   <span><a href="<?= "index.php?action=manageCom&id=" . $post['id']  .'&AMP;page=1' ?>">Gestion des commentaires</a></span>
               </p>
            </div>
            <?php
             }
            ?>
</article>
<?php endforeach;?>

<div class="col-xs-offset-1 col-xs-10 pages">
<?php
if ($_GET['page'] > 1):
    ?><a href="?action=blog&AMP;page=<?= $_GET['page'] - 1; ?>">Page précédente</a> — <?php
endif;

if($nbPages > 1 ){
/* On va effectuer une boucle autant de fois que l'on a de pages */
for ($i = 1; $i <= $nbPages; $i++):
    ?><a href="?action=blog&AMP;page=<?= $i; ?>"><?= $i; ?></a> <?php
endfor;
}
/* Avec le nombre total de pages, on peut aussi masquer le lien
 * vers la page suivante quand on est sur la dernière */
if ($_GET['page'] < $nbPages):
    ?>— <a href="?action=blog&AMP;page=<?= $_GET['page'] + 1; ?>">Page suivante</a><?php
endif;
?>

</div>

