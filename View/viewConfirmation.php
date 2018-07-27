<?php
$this->titre = "Supression du billet";
if (isset($_SESSION['id']) AND isset($_SESSION['login']))
    {
?>
<div class="vueConfirmation">
    <div class="col-lg-offset-3 col-lg-6 col-xs-offset-1 col-xs-10 messageAdmin">
        <h2>Etes-vous sûre <?=  $_SESSION['login'] ?> de vouloir supprimer ce <?php if(isset($post['id']) AND $post['id']) {?> billet<?php } elseif(isset($comment['id']) AND $comment['id']) {;?> commentaire<?php }?> ?</h2>
    </div>

    <div class="col-lg-offset-3 col-lg-6 col-xs-offset-1 col-xs-10 articleBlog">
        <?php if(isset($post['id']) AND $post['id']) {?>
        <h2><?= strip_tags($post['title']); ?></h2>
        <p>
            <?= $post['content']; ?>
        </p>
        <h5> Le <em><?= $post['publication_date_fr']; ?></em>  Par <em><?= strip_tags($post['author']); ?></em></h5>
        <?php } elseif(isset($comment['id']) AND $comment['id']) {;?>
        <h4> Le <em><?= $comment['comment_date_fr']; ?></em>  Par <em><?= strip_tags($comment['author']); ?></em></h4>
        <p>
            <?= nl2br(strip_tags($comment['comment'])); ?>
        </p>
        <?php } ?>
    </div>
        <div class="col-lg-offset-3 col-lg-6 col-xs-offset-1 col-xs-10 messageAdmin">
            <?php if(isset($post['id']) AND $post['id']) {?>
            <form action="index.php?action=confirm" method="post">
                <input type="hidden" value="<?= $post['id']?>" name="postId"/>
                <input  class="confirmer" type="submit" value="OUI">
            </form>
             <?php } elseif(isset($comment['id']) AND $comment['id']) {;?>
            <form action="index.php?action=confirmCom" method="post">
                <input type="hidden" value="<?= $comment['id']?>" name="id_com"/>
                <input  class="confirmer" type="submit" value="OUI">
            </form>
        <?php } ?>
            <form action="index.php?action=blog&AMP;page=1" method="post">
                <input  class="confirmer" type="submit" value="NON">
            </form>
        </div>
</div>
 <?php
    }
?>
