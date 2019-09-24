<?php $data = org_struct_front(); ?>

<div class="org-front structure">
	<?php if(isset($data['struct_img_url']) && !empty($data['struct_img_url'])) : ?>
	<div class="info-block image">	
		<img src="<?php echo $data['struct_img_url']?>" alt="Схема структуры"/>
	</div>
	<?php endif;?>
	
	<?php if(isset($data['structs']) && is_array($data['structs'])) : $structs = $data['structs']; ?>
	
	<div id="org_struct">
		<?php foreach($structs as $key => $val):?>
		<?php if(isset($val['name']) && !empty($val['name'])) :?>
		<div class="spoiler-box closed">
			<div class="spoiler-panel">
				<div class="clicker h2">
					<?php if(isset($val['name']) && !empty($val['name'])) : ?>				
						<?php echo wp_unslash($val['name']);?>
					<?php endif;?>
				</div>
				<div class="spoiler-block">
					<div class="spoiler-block_in">
						<div class="str-block">
							<div class="title">Наименование</div>				
							<?php if(isset($val['name']) && !empty($val['name'])) : ?>
								<div class="content" itemprop="name">
								<?php echo wp_unslash($val['name'])?>
								</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>		
						</div>


						<div class="str-block">
							<div class="title">Ф.И.О. руководителя</div>				
							<?php if(isset($val['fio']) && !empty($val['fio'])) : ?>
								<div class="content" itemprop="fio post">
								<?php echo wp_unslash($val['fio'])?>
								</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>	
						</div>


						<div class="str-block">
							<div class="title">Адрес</div>		
							<?php if(isset($val['place']) && !empty($val['place'])) : ?>
								<div class="content" itemprop="addressStr">
								<?php echo wp_unslash($val['place'])?>
								</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>					
						</div>


						<div class="str-block">
							<div class="title">Сайт</div>					
							<?php if(isset($val['site']) && !empty($val['site'])) : ?>
								<div class="content" itemprop="site">
								<?php echo wp_unslash($val['site'])?>
								</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>		
						</div>


						<div class="str-block">
							<div class="title">Электронная почта</div>				
							<?php if(isset($val['mail']) && !empty($val['mail'])) : ?>
								<div class="content" itemprop="email">
								<?php echo wp_unslash($val['mail'])?>
								</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>
						</div>


						<div class="str-block">
							<div class="title">Положение с приложением копии</div>			
							<?php if(isset($val['url']) && !empty($val['url'])) : ?>
							<div class="content" itemprop="divisionClauseDocLink">
								<a href="<?php echo (isset($val['url']) && !empty($val['url'])) ? $val['url'] : ''?>" title="Положение" target="_blank"><?php echo (isset($val['docs_name']) && !empty($val['docs_name'])) ? wp_unslash($val['docs_name']) : 'Положение о структурном подразделении'?></a>
							</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>						
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif;?>
		<?php endforeach;?>
	</div>
	<?php else:?>
			<div class="none-data">нет данных</div>
	<?php endif;?>
</div>