<?php
/**
 * @var  Page $model
 */

use app\modules\cpanel\models\Page;

$this->title = $model->name . ' CAFFÉ L\'Antico';
$this->params['breadcrumbs'][] = $this->title;
?>
<article class="page fs-4 text-light">
    <?php echo $model->body; ?>
</article>

