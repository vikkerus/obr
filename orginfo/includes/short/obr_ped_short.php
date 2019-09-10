<?php $data = obr_ped_front(); ?>

<div class="obr-front ped">
	<?php if(isset($data['ped_name']) && !empty($data['ped_name'])) : ?>
	<div class="ruc-block" itemprop="rucovodstvo rucovodstvoFil">
		<div class="ruc-title">Руководитель:</div>
		<div class="content-block">
			<?php if(isset($data['ped_ruc_url']) && !empty($data['ped_ruc_url'])) : ?>
			<div class="img-block">
				<img alt="Руководитель" src="<?php echo $data['ped_ruc_url'];?>"/>
			</div>
			<?php endif;?>
			<div class="text-block">
					<div class="title">Ф.И.О. руководителя</div>
					<?php if(isset($data['ped_name']) && !empty($data['ped_name'])) : ?>
						<div class="content"  itemprop="fio">
						<?php echo wp_unslash($data['ped_name'])?>
						</div>
					<?php else:?>
						<div class="none-data">нет данных</div>
					<?php endif;?>				
				
					<div class="title">Должность</div>				
					<?php if(isset($data['ped_pos']) && !empty($data['ped_pos'])) : ?>
						<div class="content" itemprop="post">
						<?php echo wp_unslash($data['ped_pos'])?>
						</div>
					<?php else:?>
						<div class="none-data">нет данных</div>
					<?php endif;?>
					
				
					<div class="title">Контактные телефоны</div>					
					<?php if(isset($data['ped_tel']) && !empty($data['ped_tel'])) : ?>
						<div class="content" itemprop="telephone">
						<?php echo wp_unslash($data['ped_tel'])?>
						</div>
					<?php else:?>
						<div class="none-data">нет данных</div>
					<?php endif;?>
					
				
					<div class="title">Электронная почта</div>			
					<?php if(isset($data['ped_mail']) && !empty($data['ped_mail'])) : ?>
						<div class="content" itemprop="email">
						<?php echo wp_unslash($data['ped_mail'])?>
						</div>
					<?php else:?>
						<div class="none-data">нет данных</div>
					<?php endif;?>					
			</div>
		</div>
	</div>
	<?php else:?>
	<div>Руководитель:</div>
	<div class="none-data">нет данных</div>
	
	<?php endif;?>
	
	<div class="zam-block" itemprop="rucovodstvo rucovodstvoFil">
		<div class="ruc-title">Заместители руководителя:</div>
		<?php if(isset($data['zam']) && is_array($data['zam'])) : $zam = $data['zam']; ?>
		<div class="panel-group" id="obr_zam" role="tablist" aria-multiselectable="true">
			<?php foreach($zam as $key => $val):?>
			<?php if(isset($val['name']) && !empty($val['name'])) :?>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="heading<?php echo $key?>">
					<?php if(isset($val['name']) && !empty($val['name'])) : ?>			
					<a href="javascript:;" data-parent="#obr_zam" class="panel-title" role="button" data-toggle="collapse" data-target="#collapse<?php echo $key?>" aria-expanded="false" aria-controls="collapse<?php echo $key?>">
						<?php echo wp_unslash($val['name']);?>
					</a>
					<?php endif;?>
				</div>

				<div id="collapse<?php echo $key?>" class="panel-collapse collapse" aria-labelledby="heading<?php echo $key?>" data-parent="#obr_zam" role="tabpanel">
					<div class="panel-body">
						<?php if(isset($val['url']) && !empty($val['url'])) : ?>
						<div class="img-block">
							<img alt="Заместитель" src="<?php echo $val['url'];?>"/>
						</div>
						<?php endif;?>
						
						<?php if(isset($val['name']) && !empty($val['name'])) : ?>
						<div class="zam-item">
							<div class="title">Ф.И.О. заместителя</div>
							<div class="content" itemprop="fio">
								<?php echo wp_unslash($val['name'])?>
							</div>
						</div>
						<?php endif;?>
						

						<div class="zam-item">
							<div class="title">Должность</div>							
							<?php if(isset($val['post']) && !empty($val['post'])) : ?>
								<div class="content" itemprop="post">
								<?php echo wp_unslash($val['post'])?>
								</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>					
						</div>

						
						<div class="zam-item">
							<div class="title">Контактные телефоны</div>						
							<?php if(isset($val['tel']) && !empty($val['tel'])) : ?>
								<div class="content" itemprop="telephone">
								<?php echo wp_unslash($val['tel'])?>
								</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>			
						</div>

						
						<div class="zam-item">
							<div class="title">Электронная почта</div>						
							<?php if(isset($val['mail']) && !empty($val['mail'])) : ?>
								<div class="content" itemprop="email">
								<?php echo wp_unslash($val['mail'])?>
								</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>					
						</div>
					</div>
				</div>
			</div>
			<?php endif;?>
			<?php endforeach;?>
		</div>
		<?php endif;?>
	</div>
	
	<div class="ped-block" itemprop="teachingStaff">
		<div class="ruc-title">Педагогические работники:</div>
		<?php if(isset($data['ped']) && is_array($data['ped'])) : $ped = $data['ped']; ?>
		<div class="panel-group" id="obr_ped" role="tablist" aria-multiselectable="true">
			<?php foreach($ped as $key => $val):?>
			<?php if(isset($val['name']) && !empty($val['name'])) :?>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="heading<?php echo $key?>">
					<?php if(isset($val['name']) && !empty($val['name'])) : ?>			
					<a href="javascript:;" data-parent="#obr_ped" class="panel-title" role="button" data-toggle="collapse" data-target="#collapse<?php echo $key?>" aria-expanded="false" aria-controls="collapse<?php echo $key?>">
						<?php echo wp_unslash($val['name']);?>
					</a>
					<?php endif;?>
				</div>

				<div id="collapse<?php echo $key?>" class="panel-collapse collapse" aria-labelledby="heading<?php echo $key?>" data-parent="#obr_ped" role="tabpanel">
					<div class="panel-body">
						<?php if(isset($val['url']) && !empty($val['url'])) : ?>
						<div class="img-block">
							<img alt="Заместитель" src="<?php echo $val['url'];?>"/>
						</div>
						<?php endif;?>
						
						<?php if(isset($val['name']) && !empty($val['name'])) : ?>
						<div class="zam-item">
							<div class="title">Ф.И.О. педагогического работника</div>
							<div class="content" itemprop="fio">
								<?php echo wp_unslash($val['name'])?>
							</div>
						</div>
						<?php endif;?>
						
						<div class="zam-item">
							<div class="title">Должность</div>					
							<?php if(isset($val['post']) && !empty($val['post'])) : ?>
								<div class="content" itemprop="post">
								<?php echo wp_unslash($val['post'])?>
								</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>			
						</div>
						
						<div class="zam-item">
							<div class="title">Преподаваемые дисциплины</div>				
							<?php if(isset($val['dis']) && !empty($val['dis'])) : ?>
								<div class="content" itemprop= "teachingDiscipline">
								<?php echo wp_unslash($val['dis'])?>
								</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>						
						</div>
						
						<div class="zam-item">
							<div class="title">Ученая степень (или уровень образования)</div>				
							<?php if(isset($val['step']) && !empty($val['step'])) : ?>
								<div class="content" itemprop= "teachingLevel degree">
								<?php echo wp_unslash($val['step'])?>
								</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>						
						</div>

						
						<div class="zam-item">
							<div class="title">Ученое звание (или квалификация)</div>						
							<?php if(isset($val['zvan']) && !empty($val['zvan'])) : ?>
								<div class="content" itemprop= "teachingQual academStat">
								<?php echo wp_unslash($val['zvan'])?>
								</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>					
						</div>

						
						<div class="zam-item">
							<div class="title">Направления подготовки (или специальности)</div>					
							<?php if(isset($val['spec']) && !empty($val['spec'])) : ?>
								<div class="content" itemprop= "employeeQualification">
								<?php echo wp_unslash($val['spec'])?>
								</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>						
						</div>

						
						<div class="zam-item">
							<div class="title">Данные о повышении квалификации (или профессиональной переподготовке) </div>
							<?php if(isset($val['qual']) && !empty($val['qual'])) : ?>
								<div class="content" itemprop= "profDevelopment">
								<?php echo wp_unslash($val['qual'])?>
								</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>						
						</div>
						
						<div class="zam-item">
							<div class="title">Общий стаж работы</div>			
							<?php if(isset($val['sum']) && !empty($val['sum'])) : ?>
								<div class="content" itemprop= "genExperience">
								<?php echo wp_unslash($val['sum'])?>
								</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>						
						</div>
						
						<div class="zam-item">
							<div class="title">Педагогический стаж работы</div>						
							<?php if(isset($val['ped']) && !empty($val['ped'])) : ?>
								<div class="content" itemprop= "specExperience">
								<?php echo wp_unslash($val['ped'])?>
								</div>
							<?php else:?>
								<div class="none-data">нет данных</div>
							<?php endif;?>					
						</div>
					</div>
				</div>
			</div>
			<?php endif;?>
			<?php endforeach;?>
		</div>
		<?php endif;?>
	</div>
</div>