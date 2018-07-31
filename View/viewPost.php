<?php $this->title = strip_tags($post['title']); ?>

    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 onePost">
            <h2 class="onePostTitle"><?= strip_tags($post['title']); ?></h2>
                <p class="postContent">
                    <?= $post['content']; ?>
                </p>
                <h5 class="onePostDate"> Le <em><?= $post['publication_date_fr']; ?></em>  Par <strong><?= strip_tags($post['author']); ?></strong></h5>
        </div>
    </div> 
<div class="row">
    <div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 commentForm">
    <h2>Laisser un commentaire :</h2>
    <form action="index.php?action=comment&AMP;page=1" method="post">
        <input type="hidden" value="<?= $post['id']?>" name="id"/>
        <div class="form-group">
            <label for="author">Nom ou pseudo: </label>
            <input name="author" id="author" type=text class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="comment">Votre commentaire : </label>
            <textarea name="comment" id="comment" class="form-control" rows="5" required=""></textarea>
            <p class="help-block">Vous pouvez agrandir la zone de texte</p>
        </div>
        <input type="submit" value="Commenter" class="submitCom">
    </form>
    </div>
</div>
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10  listCom">
            <?php
            foreach($comments as $com): ?>
            <div class="comment">
                    <?php
                        if (isset($_SESSION['id']) && isset($_SESSION['login']) && $com['reported'] == 1 )
                        { ?>
                            <p class="warning">Commentaire à modérer</p>
                        <?php
                         }
                         ?>
                    <h3><?= strip_tags($com['author']); ?></h3>
                    <h4> Le <em><?= $com['comment_date_fr']; ?></em></h4>
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
                            <p class="comAdminManagement">
                                <span><a href="<?= "index.php?action=moderateCom&AMP;id=" . $com['id'] ?>">Modérer le commentaire</a></span> /
                                <span><a href="<?= "index.php?action=deleteCom&id=" . $com['id'] ?>">Supprimer le commentaire</a></span>
                            </p> 
                        <?php
                         } ?>
                <?php if($com['reported'] == 0){ ?>
                       <form method="post" action="index.php?action=report">
                           <input type="hidden" name="comId" value="<?= $com['id'] ?>" />
                           <input type="hidden" name="postId" value="<?= $post['id'] ?>" />
                           <input type="hidden" name="page" value="<?= $_GET['page'] ?>" />
                           <input type="submit" value="Signaler le commentaire" class="reportButton"/>
                       </form> 
                <?php } ?>
            </div>
             <?php endforeach;?>
        </div>

 <div class="col-xs-offset-1 col-xs-10 pages">
    <nav aria-label="PageNavigation">
        <ul class="pagination">
            <?php if (isset($_GET['page']) && $_GET['page'] > 1):
            ?><li class="page-item">
                    <a class="page-link" href="<?="?action=post&AMP;id=" . $post['id'] . "&page=" .($_GET['page'] - 1)?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Page Précedente</span>
                    </a>
            </li>
            <?php
            endif;
            if($nbPages > 1 ){
            /* On va effectuer une boucle autant de fois que l'on a de pages */
            for ($i = 1; $i <= $nbPages; $i++):
            ?> <li class="page-item <?php if($i == $_GET['page']) : ?> active<?php endif;?>">
                    <a class="page-link" href="<?="?action=post&AMP;id=" . $post['id'] . "&page=" . $i ?>">
                        <?= $i; ?>
                    </a>
                </li>
            <?php
            endfor;
            }
            /* Avec le nombre total de pages, on peut aussi masquer le lien
            * vers la page suivante quand on est sur la dernière */
            if (isset($_GET['page']) && $_GET['page'] < $nbPages):
            ?><li class="page-item">
                    <a class="page-link" href="<?="?action=post&AMP;id=" . $post['id'] . "&page=" .($_GET['page'] - 1)?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Page suivante</span>
                    </a>
                </li>
            <?php
            endif;
            ?>
        </ul>
    </nav>
</div>