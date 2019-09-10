<?php $data = obr_vac_front(); ?>

<div class="obr-front vac" itemprop="vacant">
	<?php if(isset($data['vacinfo']) && !empty($data['vacinfo'])) : ?>
	<div class="info-block">
		<div class="title">Вакантные места для приема (перевода)</div>
		<div class="content">
			<?php echo $data['vacinfo']?>
		</div>
	</div>
	<?php endif;?>
</div>