<?php $this->title = 'Administration'; ?> 

<?php
//if admin is connect : displaying of admin interface
if (isset($_SESSION['id']) AND isset($_SESSION['login']))
{ ?>
    <div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 homeConnectAdmin">
        <h1>Bonjour <?=  $_SESSION['login'] ?> ! Que voulez vous faire ?</h1>
    </div>
    <div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 resportedComList">
        <?php foreach ($reportedCom as $com): ?>
            <div class="warning">
                Le commentaire de "<?= $com['author']?>" a été signaler sur le billet : <?= $com['title']?>
            </div>
        <?php endforeach;?>
    </div>
    <div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 actionLink">
        <a href="index.php?action=postForm">Ecrire un nouveau billet</a>
        <a href="index.php?action=blog&AMP;page=1">Gestion des billets ou des commentaires</a>
        <form action="index.php?action=disconnect" method="post">
            <input type="submit" value="Déconnexion" name="Deconnexion" class="disconnectAdmin"/>
        </form>
    </div>
    <?php
}
//if admin is not connect : displaying of connection interface
else { ?>
    <div class="col-xs-offset-1 col-xs-10 homeAdmin">
        <h2>Bienvenue dans l'interface d'administration</h2>
        <p>Pour vous connecter à votre espace d'administration, veuillez compléter ce formulaire :</p>
        <?php
        //if login or password error : displaying error message
        if(isset($insert_erreur) && !empty($insert_erreur)) : ?>
            <p class="warning"><?= $insert_erreur ?></p>
        <?php endif;?>
    </div>
    <div class="row">
        <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10 adminForm">
        <form action="index.php?action=manageAdmin" method="post">
            <div class="form-group">
                <label for="login">Entrez votre login : </label>
                <input name="login" id="login" type=text class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="pass">Entrez votre mot de passe : </label>
                <input name="pass" id="pass" class="form-control" type=password required=""></input>
            </div>
            <input type="submit" value="Se connecter" class="connectAdmin">
        </form>
        </div>
    </div>
<?php } ?>

             
