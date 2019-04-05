<?php use \app\library\Menu; ?>
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base() ?>">
                <span class="head-task">Задачик</span>
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php if (Auth::isLogged()): ?>
                    <li><a href="">[ доброе пожаловать в админ-панель ]</a></li>
                    <li><?= Menu::link("/dashboard/logout", 'Выход') ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>