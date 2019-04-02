<!DOCTYPE html>
<?= HTML::lang('ru') ?>
<head>
    <?= HTML::metas() ?>
    <link rel="icon" href="favicon.ico">
    <?= HTML::title() ?>
    <?= Asset::renderCss() ?>
</head>
<body>

   <div class="container" style="margin-top: 30px;">
   	    <?= $content; ?>
   </div>

   <!-- scripts -->
   <?= Asset::renderJs() ?>
</body>
</html>