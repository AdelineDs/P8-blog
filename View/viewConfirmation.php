<?php
$this->title = "Supression du billet";
if (isset($_SESSION['id']) AND isset($_SESSION['login']))
{ ?>
    <div class="vueConfirmation">
        <div class="col-lg-offset-3 col-lg-6 col-xs-offset-1 col-xs-10 messageAdmin">
            <h2>Etes-vous sûre <?=  $_SESSION['login'] ?> de vouloir supprimer ce <?php if(isset($post['id']) AND $post['id']) {?> billet<?php } elseif(isset($comment['id']) AND $comment['id']) {;?> commentaire<?php }?> ?</h2>
        </div>

        <div class="col-lg-offset-3 col-lg-6 col-xs-offset-1 col-xs-10 onePost">
            <?php if(isset($post['id']) AND $post['id'])
            {?>
                <h2 class="onePostTitle"><?= strip_tags($post['title']); ?></h2>
                <p>
                    <?= $post['content']; ?>
                </p>
                <p class="onePostDate"> Le <em><?= $post['publication_date_fr']; ?></em>  Par <em><?= strip_tags($post['author']); ?></em></p>
            <?php } elseif(isset($comment['id']) AND $comment['id'])
            {;?>
                <div class="comment">
                    <h3><?= strip_tags($comment['author']); ?></h3>
                    <h4> Le <em><?= $comment['comment_date_fr']; ?></em></h4>
                    <p><?= nl2br(strip_tags($comment['comment'])); ?><p>
                </div>
            <?php } ?>
        </div>
        <div class="col-lg-offset-3 col-lg-6 col-xs-offset-1 col-xs-10 buttonsConfirmation">
            <?php if(isset($post['id']) AND $post['id'])
            { ?>
                <form action="index.php?action=confirm" method="post">
                    <input type="hidden" value="<?= $post['id']?>" name="postId"/>
                    <input  class="confirm" type="submit" value="OUI">
                </form>
            <?php } elseif(isset($comment['id']) AND $comment['id'])
            { ?>
                <form action="index.php?action=confirmCom" method="post">
                    <input type="hidden" value="<?= $comment['id']?>" name="id_com"/>
                    <input  class="confirm" type="submit" value="OUI">
                </form>
            <?php } ?>
            <form action="index.php?action=admin" method="post">
                <input  class="cancel" type="submit" value="NON">
            </form>
        </div>
    </div>
 <?php } ?>

