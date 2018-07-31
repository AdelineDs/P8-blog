<?php $this->title = "Ecrire un nouveau billet";
if (isset($_SESSION['id']) AND isset($_SESSION['login']))
    {
?>
<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 messageAdmin">
    <h2>Bonjour <?php echo  $_SESSION['login'] ?> !</h2>
    <h3> Vous pouvez <?php if(isset($post['id']) AND $post['id']) {?> modifier votre billet.<?php } else {;?> rédiger un nouveau billet !<?php }?></h3>
</div>
<?php
    }
?>
<div class="col-xs-offset-1 col-xs-10 newArticle">
    <h2>Ecrire un nouveau billet</h2>
        <?php
        if(isset($insert_erreur) AND $insert_erreur) :
            ?>
    <p><strong>Veuillez renseigner tout les champs, merci !</strong></p>
        <?php                            endif;?>
    <form <?php if(isset($post['id']) AND $post['id']) {?> action="index.php?action=recordPost&amp;id=<?= $post['id'] ?>&AMP;age=1"<?php } else {;?> action="index.php?action=createPost&AMP;page=1" <?php }?>method="post" class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8">
        <div class="form-group">
            <label for="title">Titre :
                    <input name="title" id="title" type=text <?php if(isset($post['id']) AND $post['id']) :?> value="<?= strip_tags($post['title']);?>"<?php endif;?> required="" class="form-control">
            </label>    
        </div>
        <div class="form-group">
            <label for="content">Contenu : 
                <textarea name="content" id="content"><?php if(isset($post['id']) AND $post['id']) :?><?= $post['content'];?><?php endif;?></textarea>
            </label>
        </div>
        <div class="form-group">
            <label for="author">Auteur: 
                <input name="author" id="author" type=text <?php if(isset($post['id']) AND $post['id']) :?> value="<?= strip_tags($post['author']);?>"<?php else : ?>value="Jean Forteroche" <?php endif;?> required="" class="form-control"/>
            </label>
        </div>
        <input type="submit" value="Enregistrer le billet" class="submitPost"/>
    </form>
</div>
