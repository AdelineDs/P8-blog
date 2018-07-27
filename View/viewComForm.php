<?php $this->titre = "Supression d'un commentaire";
if (isset($_SESSION['id']) AND isset($_SESSION['login']))
    {
?>
<div class="vueModifCom">
    <div class="col-lg-offset-3 col-lg-6 col-xs-offset-1 col-xs-10 messageAdmin">
        <h2>Bonjour <?=  $_SESSION['login'] ?> !</h2>
        <h3> Vous pouvez modérer ce commentaire ! </h3>
    </div>

    <?php
        }
    ?>
    <div class="col-lg-offset-3 col-lg-6 col-xs-offset-1 col-xs-10 newCom">
        <h2>Moderer le commentaire</h2>
        <form action="index.php?action=modifyCom" method="post" class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6">
            <input type="hidden" value="<?= $comment['id']?>" name="id_com"/>
            <div class="form-group">
                <label for="author">Nom ou pseudo:</label> 
                <input name="author" id="author" type=text value="<?= $comment['author'];?>" required="">
            </div>
            <div class="form-group">
                <label for="comment">Modifier le commentaire :</label> 
                <textarea name="comment" id="comment" required=""><?= $comment['comment'];?></textarea>
            </div>
            <input type="submit" value="Enregistrer les modifications du commentaire">
        </form>
    </div>
</div>