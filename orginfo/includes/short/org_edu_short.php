<?php $data = org_edu_front(); ?>

<div class="org-front edu" itemprop="eduObrProg">
    <div class="info-block">
		<div class="title">Реализуемые уровни образования</div>
		<div class="content">
			<?php if(isset($data['edu_level']) && !empty($data['edu_level'])) : ?>
			<?php echo wp_unslash($data['edu_level'])?>
			<?php else:?>
				<div class="none-data">нет данных</div>
			<?php endif;?>
		</div>
	</div>
    <div class="info-block">
		<div class="title">Формы обучения</div>
		<div class="content">
			<?php if(isset($data['edu_form']) && !empty($data['edu_form'])) : ?>
			<?php echo wp_unslash($data['edu_form'])?>
			<?php else:?>
				<div class="none-data">нет данных</div>
			<?php endif;?>
		</div>
	</div>
    <div class="info-block">
		<div class="title">Нормативные сроки обучения</div>
		<div class="content">
			<?php if(isset($data['edu_time']) && !empty($data['edu_time'])) : ?>
			<?php echo wp_unslash($data['edu_time'])?>
			<?php else:?>
				<div class="none-data">нет данных</div>
			<?php endif;?>
		</div>
	</div>
    
    <div class="info-block">
		<div class="title">Сроки действия государственной аккредитации образзовательной программы</div>	
		<?php if(isset($data['accredtime']) && !empty($data['accredtime'])) : ?>
			<div class="content">
			<?php echo $data['accredtime']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Описание образовательной программы с приложением её копии</div>	
		<?php if(isset($data['programinfo']) && !empty($data['programinfo'])) : ?>
			<div class="content">
			<?php echo $data['programinfo']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Учебный план</div>	
		<?php if(isset($data['teachplan']) && !empty($data['teachplan'])) : ?>
			<div class="content">
			<?php echo $data['teachplan']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Аннотации к рабочим программам</div>	
		<?php if(isset($data['workannot']) && !empty($data['workannot'])) : ?>
			<div class="content">
			<?php echo $data['workannot']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Календарный учебный график</div>	
		<?php if(isset($data['calendargraf']) && !empty($data['calendargraf'])) : ?>
			<div class="content">
			<?php echo $data['calendargraf']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Методические и иные документы, разработанные образовательной организацией для обеспечания образовательного процесса</div>	
		<?php if(isset($data['metoddocs']) && !empty($data['metoddocs'])) : ?>
			<div class="content">
			<?php echo $data['metoddocs']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Реализуемые образовательные программы с указанием учебных предметов, курсов, дисциплин (модулей), практики, предусмотренных соответствующей образовательной программой</div>	
		<?php if(isset($data['programs']) && !empty($data['programs'])) : ?>
			<div class="content">
			<?php echo $data['programs']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Информация об использовании при реализации образовательной программы электронного обучения и дистанционных образовательных технологий</div>	
		<?php if(isset($data['electron']) && !empty($data['electron'])) : ?>
			<div class="content">
			<?php echo $data['electron']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Информация о численности обучающихся по реализуемым образовательным программам</div>	
		<?php if(isset($data['educhisl']) && !empty($data['educhisl'])) : ?>
			<div class="content">
			<?php echo $data['educhisl']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Языки, на которых осуществляется образование (обучение)</div>
		<div class="content">
			<?php if(isset($data['edu_lang']) && !empty($data['edu_lang'])) : ?>
			<?php echo wp_unslash($data['edu_lang'])?>
			<?php else:?>
				<div class="none-data">нет данных</div>
			<?php endif;?>
		</div>
	</div>
    <div class="info-block">
		<div class="title">Лицензия на осуществление образовательной деятельности</div>	
		<?php if(isset($data['licenz']) && !empty($data['licenz'])) : ?>
			<div class="content">
			<?php echo $data['licenz']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    
    
    
    
    
    
    
    
    
    
    <div class="info-block">
		<div class="title">Информация о результатах приема с различными условиями приема (на места, финансируемые за счет бюджетных ассигнований федерального бюджета, бюджетов субъектов Российской Федерации, местных бюджетов, по договорам об образовании за счет средств физических и (или) юридических лиц)</div>	
		<?php if(isset($data['edupriem']) && !empty($data['edupriem'])) : ?>
			<div class="content">
			<?php echo $data['edupriem']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	<div class="info-block">
		<div class="title">Информация о сроке действия государственной аккредитации образовательной программы, о языках, на которых осуществляется образование (обучение)</div>	
		<?php if(isset($data['eduaccred']) && !empty($data['eduaccred'])) : ?>
			<div class="content">
			<?php echo $data['eduaccred']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>

    <div class="info-block">
		<div class="title">Наличие специальных <u>(адаптированных)</u> образовательных программ и методов обучения</div>	
		<?php if(isset($data['eduadop']) && !empty($data['eduadop'])) : ?>
			<div class="content">
			<?php echo $data['eduadop']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    
    <div class="info-block">
		<div class="title">Наличие специальных <u>(неадаптированных)</u> образовательных программ и методов обучения</div>	
		<?php if(isset($data['eduop']) && !empty($data['eduop'])) : ?>
			<div class="content">
			<?php echo $data['eduop']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    
    <div class="info-block">
		<div class="title">Информация о результатах перевода, восстановления и отчисления</div>	
		<?php if(isset($data['eduperevod']) && !empty($data['eduperevod'])) : ?>
			<div class="content">
			<?php echo $data['eduperevod']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    
    <div class="info-block">
		<div class="title">Информация о научно-исследовательской работе по каждой образовательной программе</div>	
		<?php if(isset($data['edunir']) && !empty($data['edunir'])) : ?>
			<div class="content">
			<?php echo $data['edunir']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    
    <div class="info-block">
		<div class="title">Наличие практики</div>	
		<?php if(isset($data['eduprac']) && !empty($data['eduprac'])) : ?>
			<div class="content">
			<?php echo $data['eduprac']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
</div>
