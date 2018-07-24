<?php $title = 'Billet simple pour l\'Alaska - Jean Forteroche'; 
ob_start();?>
<p>Une erreur est survenue : <?= $msgError?></p>
<?php $content = ob_get_clean();

require 'template.php'; ?>

