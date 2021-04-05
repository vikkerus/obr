<?php $data = org_main_front(); ?>

<div class="org-front" itemprop="osnovSveden">
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
		<div class="title">Краткое наименование образовательной организации</div>
		<div class="content">
			<?php if(isset($data['short_name']) && !empty($data['short_name'])) : ?>
			<?php echo wp_unslash($data['short_name'])?>
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
		<div class="title">Представительства</div>	
		<?php if(isset($data['inforep']) && !empty($data['inforep'])) : ?>
			<div class="content" itemprop="repInfo">
			<?php echo $data['inforep']?>
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
			<div class="content" itemprop="telephone">
			<?php echo wp_unslash($data['info_tel'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
	
	<div class="info-block">
		<div class="title">Факс</div>	
		<?php if(isset($data['info_fax']) && !empty($data['info_fax'])) : ?>
			<div class="content" itemprop="fax">
			<?php echo wp_unslash($data['info_fax'])?>
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
    
    
    <div class="info-block">
		<div class="title">Сведения о каждом месте осуществления образовательной деятельности</div>	
		<?php if(isset($data['infoplace']) && !empty($data['infoplace'])) : ?>
			<div class="content" itemprop="addressPlace">
			<?php echo $data['infoplace']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Информация о местах осуществления образовательной деятельности, в том числе не указанных в приложении к лицензии</div>	
		<?php if(isset($data['placesinfo']) && !empty($data['placesinfo'])) : ?>
			<div class="content">
			<?php echo $data['placesinfo']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    
    
    
    
    <div class="info-block">
		<div class="title">Адреса официальных сайтов представительств и филиалов (при наличии) или страницах в информационно-телекоммуникационной сети интернет</div>	
		<?php if(isset($data['siteaddress']) && !empty($data['siteaddress'])) : ?>
			<div class="content">
			<?php echo $data['siteaddress']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    
</div>