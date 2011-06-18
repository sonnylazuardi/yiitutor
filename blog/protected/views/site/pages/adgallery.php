<?php
$this->pageTitle=Yii::app()->name . ' - Ad Gallery';
$this->breadcrumbs=array(
	'AD',
);
?>
<h1>About</h1>

<p>lagi coba nieh...</p>

<?php $this->widget('application.extensions.adGallery.adGallery', array( 'imageList' => array(Yii::app()->baseUrl.'/uploads/1/icys2.jpg', Yii::app()->baseUrl.'/uploads/1/icys3.jpg')));?>