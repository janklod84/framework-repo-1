<?php

/* @var $model models\Task */
/* @var $action string */

?>

<div class="row">
    <form action="" method="post" enctype="multipart/form-data">
 
        <div class="col-md-12">
            <button type="submit" class="btn btn-success">Сохранить</button>
            <a class="btn btn-default" href="<?= Url::to('task/index') ?>">Отменить</a>
        </div>
    </form>
</div>