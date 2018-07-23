<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Billet simple pour l'Alaska - Jean Forteroche</title>
  </head>
  <body>
      <header>
        <h1 id="titreBlog">Billet simple pour l'Alaska</h1>
        <p>Je vous souhaite la bienvenue sur ce blog.</p>
      </header>
      <div id="contenu">
        <?php
        foreach ($billets as $billet): ?>
          <article>
            <div>
              <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
              <time><?= $billet['date_publication_fr'] ?></time>
            </div>
            <p><?= $billet['contenu'] ?></p>
          </article>
          <hr />
        <?php endforeach; ?>
      </div> <!-- #contenu -->
      <footer id="piedBlog">
        Blog réalisé avec PHP, HTML5 et CSS.
      </footer>
  </body>
</html>

