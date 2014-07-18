<?php
/* @var $this CompanyController */
/* @var $model Company */



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#company-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="headers">
	<a href="<?php echo Yii::app()->createUrl('company/create', array())?>"><div id="button-box-admin"> </div></a>
	<h1></h1>
</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'company-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{manageIdentities}{update}{delete}',
			'buttons'=>array(
			  'manageIdentities'=> array(
			    'label'=>'Users',
			    'imageUrl'=>Yii::app()->request->baseUrl.'/images/users_logo.png',
			    'url'=>'Yii::app()->createUrl("identityCompany/admin", array("company_id"=>$data->id))',
			  ),
			)
		),
	),
)); ?>
