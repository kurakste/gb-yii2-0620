<?php

use app\objects\ViewModels\NoteView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Note */
/* @var $viewModel NoteView */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Notes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="note-view">

    <h1><?= Html::encode($this->title) ?></h1>

	<?php if ($viewModel->canWrite($model)): ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
	<?php endif; ?>

	<?php if ($this->beginCache('note-view-' . $model->id, ['duration' => 10])):?>
		<div>
			Текущее время:
			<?=date('d.m.Y H:i:s');?>
		</div>
		<?=$this->endCache();?>
	<?php endif;?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'created_at',
            'updated_at',
            'author_id',
        ],
    ]) ?>

	<?=\artem\foobar\AutoloadExample::widget([
			'db' => \Yii::$app->db,
	]);?>
</div>

