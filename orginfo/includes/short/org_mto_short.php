<?php $data = org_mto_front(); ?>

<div class="org-front mto" itemprop="mto">
	<?php if(isset($data['mat_copy_id']) && !empty($data['mat_copy_id'])) : ?>
	<div class="info-block">
		<div class="title">Копия документа о материально-техническом обеспечении</div>
		<div class="content">
			<a href="<?php echo (isset($data['mat_copy_url']) && !empty($data['mat_copy_url'])) ? $data['mat_copy_url'] : ''?>" title="Материально-техническое обеспечение" target="_blank"><?php echo (isset($data['mat_copy_name']) && !empty($data['mat_copy_name'])) ? wp_unslash($data['mat_copy_name']) : 'Материально-техническое обеспечение'?></a>
		</div>
	</div>
	<?php endif;?>
	
	<div class="info-block">
		<div class="title">Сведения о наличии оборудованных учебных кабинетов, в том числе приспособленных для использования инвалидами и лицами с ОВЗ</div>	
		<?php if(isset($data['pcab']) && !empty($data['pcab'])) : ?>
			<div class="content">
			<?php echo $data['pcab']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
	
	<div class="info-block">
		<div class="title">Сведения о наличии объектов для проведения практических занятий, в том числе приспособленных для использования инвалидами и лицами с ОВЗ</div>	
		<?php if(isset($data['pprac']) && !empty($data['pprac'])) : ?>
			<div class="content">
			<?php echo $data['pprac']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
	
	<div class="info-block">
		<div class="title">Сведения о наличии библиотек, в том числе приспособленных для использования инвалидами и лицами с ОВЗ</div>	
		<?php if(isset($data['plib']) && !empty($data['plib'])) : ?>
			<div class="content">
			<?php echo $data['plib']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
	
	<div class="info-block">
		<div class="title">Сведения об объектах спорта, в том числе приспособленных для использования инвалидами и лицами с ОВЗ</div>	
		<?php if(isset($data['psport']) && !empty($data['psport'])) : ?>
			<div class="content">
			<?php echo $data['psport']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
	
	<div class="info-block">
		<div class="title">Средства обучения и воспитания</div>	
		<?php if(isset($data['mat_vos']) && !empty($data['mat_vos'])) : ?>
			<div class="content" itemprop="purposeFacil">
			<?php echo wp_unslash($data['mat_vos'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Средства обучения и воспитания для лиц с ОВЗ</div>	
		<?php if(isset($data['mat_ovz']) && !empty($data['mat_ovz'])) : ?>
			<div class="content" itemprop="purposeFacilOvz">
			<?php echo wp_unslash($data['mat_ovz'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Сведения об обеспечении доступа в здания образовательной организации инвалидов и лиц с ОВЗ</div>	
		<?php if(isset($data['ovz']) && !empty($data['ovz'])) : ?>
			<div class="content" itemprop="ovz">
			<?php echo wp_unslash($data['ovz'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<?php if(isset($data['mat_meals_id']) && !empty($data['mat_meals_id'])) : ?>
	<div class="info-block">
		<div class="title">Сведения об условиях питания обучающихся (документ)</div>
		<div class="content" itemprop="mealsDocLink">
			<a href="<?php echo (isset($data['mat_meals_url']) && !empty($data['mat_meals_url'])) ? $data['mat_meals_url'] : ''?>" title="Сведения об условиях питания обучающихся" target="_blank"><?php echo (isset($data['mat_meals_name']) && !empty($data['mat_meals_name'])) ? wp_unslash($data['mat_meals_name']) : 'Сведения об условиях питания обучающихся'?></a>
		</div>
	</div>
	<?php endif;?>
	
	<div class="info-block">
		<div class="title">Сведения об условиях питания обучающихся</div>	
		<?php if(isset($data['mat_meals']) && !empty($data['mat_meals'])) : ?>
			<div class="content" itemprop="meals">
			<?php echo wp_unslash($data['mat_meals'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Сведения об условиях питания обучающихся с ОВЗ и инвалидов</div>	
		<?php if(isset($data['mat_meals_ovz']) && !empty($data['mat_meals_ovz'])) : ?>
			<div class="content" itemprop="mealsOvz">
			<?php echo wp_unslash($data['mat_meals_ovz'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Сведения об условиях охраны здоровья обучающихся</div>	
		<?php if(isset($data['mat_heal']) && !empty($data['mat_heal'])) : ?>
			<div class="content" itemprop="health">
			<?php echo wp_unslash($data['mat_heal'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Сведения об условиях охраны здоровья обучающихся с ОВЗ и инвалидов</div>	
		<?php if(isset($data['mat_heal_ovz']) && !empty($data['mat_heal_ovz'])) : ?>
			<div class="content" itemprop="healthOvz">
			<?php echo wp_unslash($data['mat_heal_ovz'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Сведений о доступе к электронной информационно-образовательной среде, информационным системам и информационно-телекоммуникационным сетям и электронным ресурсам, к которым обеспечивается доступ обучающихся</div>	
		<?php if(isset($data['pel']) && !empty($data['pel'])) : ?>
			<div class="content">
			<?php echo $data['pel']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    <div class="info-block">
		<div class="title">Размещение  на  сайте  информации об электронных  образовательных  ресурсах,  к  которым обеспечивается доступ обучающихся</div>	
		<?php if(isset($data['eios']) && !empty($data['eios'])) : ?>
			<div class="content">
			<?php echo $data['eios']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
</div>













