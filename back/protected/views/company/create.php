<?php

Yii::app()->clientScript->registerScript('submitForm', "
$('#button-box').click( function(){
  $('#company-form input').click();
});");
?>

<div class="headers">
	<div id="button-box" onclick=""> </div>
	<h1>Create Fleet</h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
