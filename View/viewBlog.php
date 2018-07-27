<?php $this->title = 'Billet simple pour l\'Alaska - Jean Forteroche'; ?>

<?php foreach ($posts as $post): ?>
<article class="col-xs-offset-1 col-xs-10">
    <div>
        <a href="<?="index.php?action=post&AMP;id=" . $post['id'] . "&page=1" ?>">
            <h1 class="titlePost"><?= $post['title'] ?></h1>
        </a>
        <time><?= $post['publication_date_fr'] ?></time>
    </div>
    <p><?= $post['content'] ?></p>
    <?php
            if (isset($_SESSION['id']) AND isset($_SESSION['login']))
            {?>
            <div class="gestionAdmin">
                <p>
                    <strong>Gestion du billet :</strong>
                    <span><a href="<?= "index.php?action=editPost&AMP;id=" . $post['id'] ?>">Modifier</a></span> /
                    <span><a href="<?= "index.php?action=deletePost&AMP;id=" . $post['id'] ?>">Supprimer</a></span>
               </p> 
            </div>
            <?php
             }
            ?>
</article>
<hr/>
<?php endforeach;?>

<div class="col-xs-offset-1 col-xs-10 pages">
<?php
if ($_GET['page'] > 1):
    ?><a href="?action=blog&AMP;page=<?= $_GET['page'] - 1; ?>">Page précédente</a> — <?php
endif;

/* On va effectuer une boucle autant de fois que l'on a de pages */
for ($i = 1; $i <= $nbPages; $i++):
    ?><a href="?action=blog&AMP;page=<?= $i; ?>"><?= $i; ?></a> <?php
endfor;

/* Avec le nombre total de pages, on peut aussi masquer le lien
 * vers la page suivante quand on est sur la dernière */
if ($_GET['page'] < $nbPages):
    ?>— <a href="?action=blog&AMP;page=<?= $_GET['page'] + 1; ?>">Page suivante</a><?php
endif;
?>

</div>

