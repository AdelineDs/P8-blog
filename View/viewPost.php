<?php $this->title = strip_tags($post['title']); ?>

    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 articleBlog">
            <div>
                <h2><?= strip_tags($post['title']); ?></h2>
                <p class="articleContent">
                    <?= $post['content']; ?>
                </p>
                <h5> Le <em><?= $post['publication_date_fr']; ?></em>  Par <strong><?= strip_tags($post['author']); ?></strong></h5>
            </div>
        </div>
        <div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10  listeCom">
            <?php
            foreach($comments as $com): ?>
            <div class="comment">
                <div>
                    <?php
                        if (isset($_SESSION['id']) && isset($_SESSION['login']) && $com['reported'] == 1 )
                        { ?>
                            <p class="warning">Commentaire à modérer</p>
                        <?php
                         }
                         ?>
                    <h3><?= strip_tags($com['author']); ?></h3>
                    <h5> Le <em><?= $com['comment_date_fr']; ?></em></h5>
                    <?php if($com['reported'] == 0 || $com['reported'] == 2 ){ ?>
                        <p>
                            <?= nl2br(strip_tags($com['comment'])); ?>
                            <?php if( $com['reported'] == 2 ){ ?>
                                <p class="moderate">Ce commentaire a été modéré par l'administrateur du site.</p>
                            <?php } ?>
                        </p>
                    <?php } else { ?>
                        <p>
                            Ce commentaire a été signalé par un internaute et est en attente de modération. Merci de votre compréhension.                   
                       </p>
                       <?php } ?>
                       <?php
                        if (isset($_SESSION['id']) && isset($_SESSION['login']) )
                        { ?>
                            <p class="gestionCom">
                                <span><a href="<?= "index.php?action=moderateCom&AMP;id=" . $com['id'] ?>">Modérer le commentaire</a></span> /
                                <span><a href="<?= "index.php?action=deleteCom&id=" . $com['id'] ?>">Supprimer le commentaire</a></span>
                            </p> 
                        <?php
                         } ?>
                </div>
                <?php if($com['reported'] == 0){ ?>
                       <form method="post" action="index.php?action=report">
                           <input type="hidden" name="comId" value="<?= $com['id'] ?>" />
                           <input type="hidden" name="postId" value="<?= $post['id'] ?>" />
                           <input type="hidden" name="page" value="<?= $_GET['page'] ?>" />
                           <input type="submit" value="Signaler le commentaire" />
                       </form> 
                <?php } ?>
            </div>
             <?php endforeach;?>
        </div>
    </div>

<div class="col-xs-offset-1 col-xs-10 pages">
<?php
if (isset($_GET['page']) && $_GET['page'] > 1):
    ?><a href="<?="?action=post&AMP;id=" . $post['id'] . "&page=" .($_GET['page'] - 1)?>">Page précédente</a> — <?php
endif;

if($nbPages > 1 ){
/* On va effectuer une boucle autant de fois que l'on a de pages */
for ($i = 1; $i <= $nbPages; $i++):
    ?><a href="<?="?action=post&AMP;id=" . $post['id'] . "&page=" . $i ?>"><?= $i; ?></a> <?php
endfor;
}
/* Avec le nombre total de pages, on peut aussi masquer le lien
 * vers la page suivante quand on est sur la dernière */
if (isset($_GET['page']) && $_GET['page'] < $nbPages):
    ?>— <a href="<?="?action=post&AMP;id=" . $post['id'] . "&AMP;page=" . ($_GET['page'] + 1) ?>">Page suivante</a><?php
endif;
?>

<form method="post" action="index.php?action=comment&AMP;page=1">
    <input id="author" name="author" type="text" placeholder="Votre pseudo" required /><br />
    <textarea id="txtComment" name="comment" rows="4"  placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $post['id'] ?>" />
    <input type="submit" value="Commenter" />
</form>