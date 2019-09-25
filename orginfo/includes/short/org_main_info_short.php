<?php $data = org_main_front(); ?>

<div class="org-front">
	<div class="info-block">
		<div class="title">Полное наименование образовательной организации (по уставу)</div>
		<div class="content">
			<?php if(isset($data['info_name']) && !empty($data['info_name'])) : ?>
			<?php echo wp_unslash($data['info_name'])?>
			<?php else:?>
				<div class="none-data">нет данных</div>
			<?php endif;?>
		</div>
	</div>

	
	<div class="info-block">
		<div class="title">Дата создания</div>
		<?php if(isset($data['info_date']) && !empty($data['info_date'])) : ?>
			<div class="content" itemprop="regDate">
			<?php echo wp_unslash($data['info_date'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
	
	<div class="info-block">
		<div class="title">Адрес</div>	
		<?php if(isset($data['info_place']) && !empty($data['info_place'])) : ?>
			<div class="content" itemprop="address">
			<?php echo wp_unslash($data['info_place'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
	
	<div class="info-block">
		<div class="title">Учредители</div>
		<?php if(isset($data['infouch']) && !empty($data['infouch'])) : ?>
			<div class="content" itemprop="uchredLaw" itemscope itemtype="http://obrnadzor.gov.ru/microformats/UchredLaw">
			<?php echo $data['infouch']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>

	
	<div class="info-block">
		<div class="title">Филиалы</div>	
		<?php if(isset($data['infofil']) && !empty($data['infofil'])) : ?>
			<div class="content" itemprop="filInfo">
			<?php echo $data['infofil']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>

	
	<div class="info-block">
		<div class="title">Режим и график работы</div>				
		<?php if(isset($data['infotime']) && !empty($data['infotime'])) : ?>
			<div class="content" itemprop="workTime">
			<?php echo $data['infotime']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
	

	<div class="info-block">
		<div class="title">Контактные телефоны</div>	
		<?php if(isset($data['info_tel']) && !empty($data['info_tel'])) : ?>
			<div class="content" itemprop="telephone fax">
			<?php echo wp_unslash($data['info_tel'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
	

	<div class="info-block">
		<div class="title">Электронный адрес</div>	
		<?php if(isset($data['info_mail']) && !empty($data['info_mail'])) : ?>
			<div class="content" itemprop="email">
			<?php echo wp_unslash($data['info_mail'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
</div>