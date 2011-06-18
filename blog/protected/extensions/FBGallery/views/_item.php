<div class="gTh">
		<?php if($this->item['thTitleShow']): ?>
			<div class="topImageItem">
				<div id="<?php echo $this->idPrefix.$this->item['fileName'];?>" class="gImgName<?php echo $this->item['text_field'];?>">
					<?php echo $this->item['title'];?>
				</div>
				<?php if($this->item['deleteIcon']): ?>
					<div class="deleteIcon" title="<?php echo $this->item['fileName'];?>">
						<?php echo $this->item['deleteIcon'];?>
					</div>
				<?php endif;?>
			</div>
		<?php endif;?>

		<div class="imageItem">
			<a class="gImg" rel="<?php echo $this->item['rel'];?>" title="<?php echo $this->item['title'];?>" href="<?php echo $this->item['urlImg'];?>">
				<img src="<?php echo $this->item['imgSrc'];?>" alt="<?php echo $this->item['title'];?>" />
			</a>
		</div>
</div>
