<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title><?= $title ?? 'Заголовок' ?></title>
    <?php Asset::renderCss() ?>
</head>
<body>

   <div class="container">
   	    <?= $content; ?>
   </div>

   <!-- scripts -->
   <?php Asset::renderJs() ?>
</body>
</html>