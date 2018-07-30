<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
        crossorigin="anonymous">
        <link rel="stylesheet" href="public/style.css" />
        <title><?= $title ?></title>
    </head>
    <body>
        <div class="container-fluid">
            <header class="row header">
                <div class="col-xs-12">
                    <h1 id="titleBlog">Billet simple pour l'Alaska</h1>
                </div>
                <!-- nav menu -->
                <div class="col-xs-12 menu">
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="index.php?action=blog&AMP;page=1">Blog</a></li>
                        <li><a href="index.php?action=contact">A Propos</a></li>
                        <?php
                             if (isset($_SESSION['id']) AND isset($_SESSION['login']))
                            { ?>
                            <li><a href="index.php?action=admin">Administration</a></li>
                            <?php
                             }
                            ?>
                    </ul>
                </div>
            </header>
            <div class="row content">
                <?= $content ?>
            </div> <!-- #contenu -->
            <footer class="row footer">
                <div class="col-xs-12 textFooter">
                    <p>Blog réalisé avec PHP, HTML5 et CSS.</p>
                    <a href="index.php?action=admin" class="adminLink">Administration</a>
                </div>
            </footer>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
        crossorigin="anonymous"></script> 
        <script type="text/javascript" src="public/js/tinymce/tinymce.min.js"></script>
         <script type="text/javascript">
            tinymce.init({
              selector: '#content',
              language : "fr_FR",
              height : 300,
              menubar: false,
              plugins: [
              'advlist autolink lists link image charmap print preview anchor textcolor',
              'searchreplace visualblocks code fullscreen',
              'insertdatetime media table contextmenu paste code wordcount'
              ],
              toolbar: 'insert | undo redo |  formatselect | fontsizeselect | bold italic backcolor underline strikethrough forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent  | help',
              });
         </script>
    </body>
</html>
