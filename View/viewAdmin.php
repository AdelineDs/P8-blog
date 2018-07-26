<?php $this->title = 'Administration'; ?> 

<?php
            if (isset($_SESSION['id']) AND isset($_SESSION['login']))
            { ?>
            <div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 accueilConnectAdmin"> 
                <h1>Bonjour <?=  $_SESSION['login'] ?> ! Que voulez vous faire ?</h1>         
                <br/>
                <a href="index.php?action=postForm">Ecrire un nouveau billet</a>
                <br/>
                <a href="index.php?action=blog">Gestion des billets existants</a>
                <br/>
                <a href="index.php?action=blog">Gestion des commentaires</a>
                <br/>
                <form action="index.php?action=disconnect" method="post">
                    <input type="submit" value="Déconnexion" name="Deconnexion" class="disconnectAdmin"/>
                </form>
            </div>
            <?php
             }
             else {
             ?>

<div class="col-xs-offset-1 col-xs-10"> 
    <h2>Bienvenue dans l'interface d'administration</h2>
    <p>Pour vous connecter à votre espace d'administration, veuillez compléter ce formulaire :</p>
    <?php
                    if(isset($insert_erreur) && !empty($insert_erreur)) :
                    ?>
        <p class="warning"><?= $insert_erreur ?></p>
                <?php                            endif;?>
        <form action="index.php?action=manageAdmin" method="post">
            <p><label for="login">Entrez votre login : <input name="login" id="login" type=text required=""></label></p>
            <p><label for="pass">Entrez votre mot de passe : <input name="pass" id="pass" type=password required=""></label></p>
            <input type="submit" value="Se connecter" class="connectAdmin">
        </form>
</div>
             <?php }
