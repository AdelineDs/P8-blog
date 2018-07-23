<?php $titre = 'Billet simple pour l\'Alaska - Jean Forteroche'; 
ob_start(); 
foreach ($billets as $billet): ?>
<article class="col-xs-offset-1 col-xs-10">
    <div>
        <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
        <time><?= $billet['date_publication_fr'] ?></time>
    </div>
    <p><?= $billet['contenu'] ?></p>
</article>
<hr />
<?php endforeach;
$contenu = ob_get_clean(); 

require 'gabarit.php'; ?>


