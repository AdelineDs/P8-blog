
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=P8;charset=utf8', 
          'root', 'root');
        $billets = $bdd->query('SELECT id, titre, contenu, auteur, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_publication_fr'
                . ' FROM billets ORDER BY date_publication DESC');
        
        require 'Vue/vueAccueil.php';
  