<?php $data = org_sotrud_front();?>

<div class="org-front"> 
    <div class="info-block">
		<div class="title">Информация о заключенных и планируемых к заключению договорах с иностранными и (или) международными организациями по вопросам образования и науки</div>
		<?php if(isset($data['dog']) && !empty($data['dog'])) : ?>
			<div class="content">
			<?php echo $data['dog']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
    
    <div class="info-block">
		<div class="title">Информация о международной аккредитации</div>
		<?php if(isset($data['accr']) && !empty($data['accr'])) : ?>
			<div class="content">
			<?php echo $data['accr']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
</div>