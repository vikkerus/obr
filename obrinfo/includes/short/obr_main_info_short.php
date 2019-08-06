<?php $data = obr_main_front(); ?>

<div class="obr-front">
	<?php if(isset($data['info_name']) && !empty($data['info_name'])) : ?>
	<div class="info-block">
		<div class="title">Полное наименование образовательной организации (по уставу)</div>
		<div class="content">
			<?php echo wp_unslash($data['info_name'])?>
		</div>
	</div>
	<?php endif;?>
	
	<?php if(isset($data['info_date']) && !empty($data['info_date'])) : ?>
	<div class="info-block">
		<div class="title">Дата создания</div>
		<div class="content" itemprop="regDate">
			<?php echo wp_unslash($data['info_date'])?>
		</div>
	</div>
	<?php endif;?>
	
	<?php if(isset($data['info_place']) && !empty($data['info_place'])) : ?>
	<div class="info-block">
		<div class="title">Адрес</div>
		<div class="content" itemprop="address">
			<?php echo wp_unslash($data['info_place'])?>
		</div>
	</div>
	<?php endif;?>
	
	<?php if(isset($data['infouch']) && !empty($data['infouch'])) : ?>
	<div class="info-block">
		<div class="title">Учредители</div>
		<div class="content" itemprop="uchredLaw">
			<?php echo $data['infouch']?>
		</div>
	</div>
	<?php endif;?>
	
	<?php if(isset($data['infofil']) && !empty($data['infofil'])) : ?>
	<div class="info-block">
		<div class="title">Филиалы</div>
		<div class="content" itemprop="filInfo">
			<?php echo $data['infofil']?>
		</div>
	</div>
	<?php endif;?>
	
	<?php if(isset($data['infotime']) && !empty($data['infotime'])) : ?>
	<div class="info-block">
		<div class="title">Режим и график работы</div>
		<div class="content" itemprop="workTime">
			<?php echo $data['infotime']?>
		</div>
	</div>
	<?php endif;?>
	
	<?php if(isset($data['info_tel']) && !empty($data['info_tel'])) : ?>
	<div class="info-block">
		<div class="title">Контактные телефоны</div>
		<div class="content" itemprop="telephone fax">
			<?php echo wp_unslash($data['info_tel'])?>
		</div>
	</div>
	<?php endif;?>
	
	<?php if(isset($data['info_mail']) && !empty($data['info_mail'])) : ?>
	<div class="info-block">
		<div class="title">Электронный адрес</div>
		<div class="content" itemprop="email">
			<?php echo wp_unslash($data['info_mail'])?>
		</div>
	</div>
	<?php endif;?>
</div>