<?php $data = org_dostup_front();?>

<div class="org-front">
    
    <div class="info-block">
		<div class="title">Сведения о специально оборудованных учебных кабинетах</div>
		<?php if(isset($data['dostcab']) && !empty($data['dostcab'])) : ?>
			<div class="content">
			<?php echo $data['dostcab']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
    
    <div class="info-block">
		<div class="title">Сведения о приспособленных объектах для проведения практических занятий</div>
		<?php if(isset($data['dostprac']) && !empty($data['dostprac'])) : ?>
			<div class="content">
			<?php echo $data['dostprac']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
    
    <div class="info-block">
		<div class="title">Сведения о библиотеке(ах)</div>
		<?php if(isset($data['dostlib']) && !empty($data['dostlib'])) : ?>
			<div class="content">
			<?php echo $data['dostlib']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
    
    <div class="info-block">
		<div class="title">Сведения об объектах спорта</div>
		<?php if(isset($data['dostsport']) && !empty($data['dostsport'])) : ?>
			<div class="content">
			<?php echo $data['dostsport']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
    
    <div class="info-block">
		<div class="title">Сведения об условиях питания обучающихся</div>
		<?php if(isset($data['dostfood']) && !empty($data['dostfood'])) : ?>
			<div class="content">
			<?php echo $data['dostfood']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
    
    <div class="info-block">
		<div class="title">Сведения об условиях охраны здоровья обучающихся</div>
		<?php if(isset($data['dostohran']) && !empty($data['dostohran'])) : ?>
			<div class="content">
			<?php echo $data['dostohran']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
    
    <div class="info-block">
		<div class="title">Информация о приспособленных средствах обучения и воспитания</div>	
		<?php if(isset($data['facil']) && !empty($data['facil'])) : ?>
			<div class="content" itemprop="purposeFacilOvz">
			<?php echo wp_unslash($data['facil'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
    
    <div class="info-block">
		<div class="title">Информация об обеспечении беспрепятственного доступа в здания образовательной организации</div>	
		<?php if(isset($data['ovz']) && !empty($data['ovz'])) : ?>
			<div class="content" itemprop="ovz">
			<?php echo wp_unslash($data['ovz'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
    
    <div class="info-block">
		<div class="title">Информация о доступе к приспособленным информационным системам и информационно- телекоммуникационным сетям</div>	
		<?php if(isset($data['net']) && !empty($data['net'])) : ?>
			<div class="content" itemprop="comNetOvz">
			<?php echo wp_unslash($data['net'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
    
    <div class="info-block">
		<div class="title">Информация о приспособленных электронных образовательных ресурсах, к которым обеспечивается доступ</div>
		<?php if(isset($data['eorlink']) && !empty($data['eorlink'])) : ?>
			<div class="content" itemprop="erListOvz">
			<?php echo $data['eorlink']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
    
    <div class="info-block">
		<div class="title">Информация о наличии специальных технических средств обучения коллективного и индивидуального пользования</div>	
		<?php if(isset($data['tech']) && !empty($data['tech'])) : ?>
			<div class="content" itemprop="techOvz">
			<?php echo wp_unslash($data['tech'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
    
    <div class="info-block">
		<div class="title">Инфомация о наличии условий для беспрепятственного доступа в общежитии, интернате</div>	
		<?php if(isset($data['hostel']) && !empty($data['hostel'])) : ?>
			<div class="content" itemprop="hostelInterOvz">
			<?php echo wp_unslash($data['hostel'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
    
    <div class="info-block">
		<div class="title">Количество жилых помещений в общежитии, приспособленных для использования инвалидами и лицами с ограниченными возможностями здоровья</div>	
		<?php if(isset($data['hostelnum']) && !empty($data['hostelnum'])) : ?>
			<div class="content" itemprop="hostelNumOvz">
			<?php echo wp_unslash($data['hostelnum'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
    
    <div class="info-block">
		<div class="title">Количество жилых помещений в интернате, приспособленных для использования инвалидами и лицами с ограниченными возможностями здоровья</div>	
		<?php if(isset($data['internum']) && !empty($data['internum'])) : ?>
			<div class="content" itemprop="interNumOvz">
			<?php echo wp_unslash($data['internum'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>
	</div>
    
    <?php if(isset($data['other']) && !empty($data['other'])) : ?>
    <div class="info-block">
		<div class="title">Дополнительная информация</div>
		
        <div class="content">
            <?php echo $data['other']?>
        </div>
	</div>
    <?php else:?>
			
    <?php endif;?>
    
</div>