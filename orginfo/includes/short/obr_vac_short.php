<?php $data = obr_vac_front(); ?>

<div class="obr-front vac">
	<div class="info-block">
		<div class="title">Вакантные места для приема (перевода)</div>		
		<?php if(isset($data['vacinfo']) && !empty($data['vacinfo'])) : ?>
			<div class="content" itemprop="vacant">
			<?php echo $data['vacinfo'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
</div>