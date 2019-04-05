<!DOCTYPE html>
<?= HTML::lang('ru') ?>
<head>
    <?= HTML::metas() ?>
    <link rel="icon" href="favicon.ico">
    <title><?= HTML::title() ?></title>
    <?= Asset::renderCss() ?>
</head>
<body style="background: #eee;">
   <div class="container" style="margin-top: 30px;">
   	    <?= $content; ?>
   </div>

   <!-- scripts -->
   <?= Asset::renderJs() ?>
</body>
</html>