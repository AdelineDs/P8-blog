<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="Contenu/style.css" />
    <title><?= $titre ?></title>
  </head>
  <body>
      <div class="container-fluid">
          <header class="row header">
              <div class="col-xs-12">
                  <h1 id="titreBlog">Billet simple pour l'Alaska</h1>
              </div>
              <div class="col-xs-offset-3 col-xs-6">
                  <p>Je vous souhaite la bienvenue sur ce blog.</p>
              </div>
          </header>
          <div id="contenu" class="row">
        <?= $contenu ?>
      </div> <!-- #contenu -->
      <footer class="row footer">
          <div class="col-xs-12">
              <p>Blog réalisé avec PHP, HTML5 et CSS.</p>
          </div>
      </footer>
      </div>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>