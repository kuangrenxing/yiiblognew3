<?php foreach($models as $model): ?>
    <?php if($model->postId)
$this->renderPartial('../post/_post',array(
'model'=>Post::model()->findByPk($model->postId),
));
?>
<?php endforeach; ?>

<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>
