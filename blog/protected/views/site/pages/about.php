<?php
$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<h1>About</h1>

<p>This is the "about" page for my blog site.</p>

<?php $this->widget('application.extensions.FBGallery.FBGallery', array('pid'=>'1'));?>