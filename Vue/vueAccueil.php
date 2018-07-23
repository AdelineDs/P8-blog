<?php $titre = 'Billet simple pour l\'Alaska - Jean Forteroche'; 
ob_start(); 
foreach ($billets as $billet): ?>
<article class="col-xs-offset-1 col-xs-10">
    <div>
        <a href="<?="billet.php?id=" . $billet['id'] ?>">
            <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
        </a>
        <time><?= $billet['date_publication_fr'] ?></time>
    </div>
    <p><?= $billet['contenu'] ?></p>
</article>
<hr />
<?php endforeach;
$contenu = ob_get_clean(); 

require 'gabarit.php'; ?>


