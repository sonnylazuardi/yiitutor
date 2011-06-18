<?php
class Uploader{
	public function loadUploaderConfiguration()
	{
		$uploaderConfig = GalleryConfig::model()->find(array('condition'=>"type='uploader'"))->config;
		$this->uploaderConfig = unserialize($uploaderConfig);
	}

	public function maxLenghtUploader()
	{
		if($this->uploaderConfig['max'] != '-1')
		{
			$filesInGallery = count($this->imgsOrder);
			if($filesInGallery >= intval($this->uploaderConfig['max']))
				return intval('0');
			else
				return intval($this->uploaderConfig['max']) - $filesInGallery;
		}

		return $this->uploaderConfig['max'];
	}

	public function preUpload()
	{
		if(Yii::app()->user->isGuest)
			return false;

		//if is a new gallery
		if(!file_exists($this->tmpPath))
			self::createFoldersStructure();

		//we resize original pictures and move to image/thumbs folders, then remove originals to save disk space
		if(self::uploadFiles($this->tmpPath))
			$this->resizeAllNew();
	}

	public function createFoldersStructure()
	{
		$dirs = array(
			$this->originalPath, 
			$this->imgsPath, 
			$this->thPath,
			$this->tmpPath
		);

		foreach($dirs as $dir){
			MyFiles::NewFolder($dir);
		}
	}

	public function uploadFiles($path)
	{
		if(isset($_FILES["uploader"]))
		{
			//limit to maxim accepted if not unlimited
			$max = self::maxLenghtUploader();
			$max = $max == '-1' ? count($_FILES["uploader"]['name']): $max;

			for($i=0; $i < $max; $i++)
			{
				if ($_FILES["uploader"]["error"][$i] == UPLOAD_ERR_OK) 
				{
					$tmp_name = $_FILES["uploader"]["tmp_name"][$i];
					$name = MyFiles::cleanFileName($_FILES["uploader"]["name"][$i]);
					$my_path = $path.DIRECTORY_SEPARATOR.$name;
					move_uploaded_file($tmp_name, $my_path);
				}
				else
					throw new Exception(Yii::t('app', 'Error: Couldn\'t upload files! Please check permissions.'));
			}
			return true;
		}
	}
}
?>