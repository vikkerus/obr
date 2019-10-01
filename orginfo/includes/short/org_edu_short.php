<?php $data = org_edu_front(); ?>

<div class="org-front edu">
	<div class="info-block">
		<div class="title">Общая информация об образовательных программах</div>	
		<?php if(isset($data['eduaccred']) && !empty($data['eduaccred'])) : ?>
			<div class="content">
			<?php echo $data['eduaccred']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Информация о численности по каждой образовательной программе</div>	
		<?php if(isset($data['educhislen']) && !empty($data['educhislen'])) : ?>
			<div class="content">
			<?php echo $data['educhislen']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
</div>
