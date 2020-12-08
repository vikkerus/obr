<?php $data = org_mto_front(); ?>

<div class="org-front mto" itemprop="mto">
      
    <div class="info-block">
		<div class="title">Сведения о каждом месте осуществления образовательной деятельности</div>	
		<?php if(isset($data['mtoplace']) && !empty($data['mtoplace'])) : ?>
			<div class="content">
			<?php echo $data['mtoplace']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    
    
	
	<div class="info-block">
		<div class="title">Сведения о наличии оборудованных учебных кабинетов</div>	
		<?php if(isset($data['pcab']) && !empty($data['pcab'])) : ?>
			<div class="content">
			<?php echo $data['pcab']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
	
	<div class="info-block">
		<div class="title">Сведения о наличии объектов для проведения практических занятий</div>	
		<?php if(isset($data['pprac']) && !empty($data['pprac'])) : ?>
			<div class="content">
			<?php echo $data['pprac']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
	
	<div class="info-block">
		<div class="title">Сведения о наличии библиотек</div>	
		<?php if(isset($data['plib']) && !empty($data['plib'])) : ?>
			<div class="content">
			<?php echo $data['plib']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
	
	<div class="info-block">
		<div class="title">Сведения об объектах спорта</div>	
		<?php if(isset($data['psport']) && !empty($data['psport'])) : ?>
			<div class="content">
			<?php echo $data['psport']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    <div class="info-block">
		<div class="title">Сведения об условиях питания обучающихся</div>	
		<?php if(isset($data['meal']) && !empty($data['meal'])) : ?>
			<div class="content">
			<?php echo $data['meal']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    <div class="info-block">
		<div class="title">Сведения об условиях охраны здоровья обучающихся</div>	
		<?php if(isset($data['guard']) && !empty($data['guard'])) : ?>
			<div class="content">
			<?php echo $data['guard']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    
    
    
    
    <div class="info-block">
		<div class="title">Сведения о средствах обучения и воспитания</div>	
		<?php if(isset($data['facil']) && !empty($data['facil'])) : ?>
			<div class="content" itemprop="purposeFacil">
			<?php echo $data['facil']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    <div class="info-block">
		<div class="title">Сведения о доступе к информационным системам и информационно-телекоммуникационным сетям</div>	
		<?php if(isset($data['comnet']) && !empty($data['comnet'])) : ?>
			<div class="content" itemprop="comNet">
			<?php echo $data['comnet']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    <div class="info-block">
		<div class="title">Наличие в образовательной организации электронной информационно-образовательной среды</div>	
		<?php if(isset($data['eios']) && !empty($data['eios'])) : ?>
			<div class="content" itemprop="purposeEios">
			<?php echo $data['eios']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    <div class="info-block">
		<div class="title">Количество собственных электронных образовательных и информационных ресурсов</div>	
		<?php if(isset($data['own']) && !empty($data['own'])) : ?>
			<div class="content" itemprop="eoisOwn">
			<?php echo $data['own']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    <div class="info-block">
		<div class="title">Количество сторонних электронных образовательных и информационных ресурсов</div>	
		<?php if(isset($data['side']) && !empty($data['side'])) : ?>
			<div class="content" itemprop="eoisSide">
			<?php echo $data['side']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    <div class="info-block">
		<div class="title">Количество баз данных электронного каталога</div>	
		<?php if(isset($data['bdec']) && !empty($data['bdec'])) : ?>
			<div class="content" itemprop="bdec">
			<?php echo $data['bdec']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    <div class="info-block">
		<div class="title">Ссылка на электронный образовательный ресурс, к которым обеспечивается доступ обучающихся</div>	
		<?php if(isset($data['list']) && !empty($data['list'])) : ?>
			<div class="content" itemprop="erList">
			<?php echo $data['list']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    
    
    
    
    
    
    
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    
    
</div>













