<?php  

$data = org_vacancy_page();

// проверяем, есть ли в переданном массиве элемент action
if(isset($data['action'])) : ?>
<div class="page-vac">
	<form name="vac_form" id="vac_form" method="post" action="<?php echo (is_string($data['action']) ? $data['action'] : '')?>">

		<?php 	
			if (function_exists('wp_nonce_field'))
			{
				wp_nonce_field('vac_form');
			}
		?>
		
		<?php 
			// проверяем наличие в массиве элемента restored
			if(isset($data['restored']) && is_array($data['restored']))
			{
				$field = $data['restored'];
			}
		?>
		<div class="alert">Обязательно заполните поле "Наименование образовательной программы", иначе информация по данной программе не будет отображена на сайте. </div>
		<div class="vacant-list">
			<div class="vacant-block">
				<?php if(isset($data['restored']['vac']) && is_array($data['restored']['vac'])) : $vac = $data['restored']['vac']; ?>

				<?php foreach($vac as $key => $val):?>

					<div class="vac_item" id="vac_<?php echo $key?>" name="vac_<?php echo $key?>">						
						<div class="input-block">
							<label>Код направления (при наличии)</label>
							<input type="text" name="vac[<?php echo $key?>][code]" class="field" value="<?php echo (isset($val['code']) ? wp_unslash(htmlspecialchars($val['code'])) : '')?>">
						</div>
						<div class="input-block">
							<label>Наименование образовательной программы</label>
							<input type="text" name="vac[<?php echo $key?>][op]" class="field" value="<?php echo (isset($val['op']) ? wp_unslash(htmlspecialchars($val['op'])) : '')?>">
						</div>
						<div class="input-block">
							<label>Наименование специальности/направления подготовки</label>
							<input type="text" name="vac[<?php echo $key?>][name]" class="field" value="<?php echo (isset($val['name']) ? wp_unslash(htmlspecialchars($val['name'])) : '')?>">
						</div>
						<div class="input-block">
							<label>Уровень образования</label>
							<select name="vac[<?php echo $key?>][level]" class="level-list">
								<option value="none" <?php if ( $val['level'] === 'none' ) echo 'selected="selected"'; ?>>не выбран</option>
								<option value="bac" <?php if ( $val['level'] === 'bac' ) echo 'selected="selected"'; ?>>бакалавриат</option>
								<option value="spec" <?php if ( $val['level'] === 'spec' ) echo 'selected="selected"'; ?>>специалитет</option>
								<option value="mag" <?php if ( $val['level'] === 'mag' ) echo 'selected="selected"'; ?>>магистратура</option>
								<option value="asp" <?php if ( $val['level'] === 'asp' ) echo 'selected="selected"'; ?>>аспирантура</option>
							</select>						
						</div>
						<div class="input-block">
							<label>Количество вакантных мест для приема (перевода) за счёт <u>бюджетных ассигнований федерального бюджета</u></label>
							<input type="text" name="vac[<?php echo $key?>][fb]" class="field" value="<?php echo (isset($val['fb']) ? wp_unslash(htmlspecialchars($val['fb'])) : '')?>">
						</div>
						<div class="input-block">
							<label>Количество вакантных мест для приема (перевода) за счёт <u>бюджетов субъектов Российской Федерации</u></label>
							<input type="text" name="vac[<?php echo $key?>][sr]" class="field" value="<?php echo (isset($val['sr']) ? wp_unslash(htmlspecialchars($val['sr'])) : '')?>">
						</div>
						<div class="input-block">
							<label>Количество вакантных мест для приема (перевода) за счёт <u>местных бюджетов</u></label>
							<input type="text" name="vac[<?php echo $key?>][mb]" class="field" value="<?php echo (isset($val['mb']) ? wp_unslash(htmlspecialchars($val['mb'])) : '')?>">
						</div>
						<div class="input-block">
							<label>Количество вакантных мест для приема (перевода) за счёт <u>редств физических и (или) юридических лиц</u></label>
							<input type="text" name="vac[<?php echo $key?>][sl]" class="field" value="<?php echo (isset($val['sl']) ? wp_unslash(htmlspecialchars($val['sl'])) : '')?>">
						</div>
						<a href="javascript:;" class="vac_remove link_remove">Удалить запись</a>
					</div>

				<?php endforeach;?>

				<?php else:?>
				
					<div class="vac_item" id="vac_vac_1" name="vac_vac_1">						
						<div class="input-block">
							<label>Код направления (при наличии)</label>
							<input type="text" name="vac[vac_1][code]" class="field">
						</div>
						<div class="input-block">
							<label>Наименование образовательной программы</label>
							<input type="text" name="vac[vac_1][op]" class="field">
						</div>
						<div class="input-block">
							<label>Наименование специальности/направления подготовки</label>
							<input type="text" name="vac[vac_1][name]" class="field">
						</div>
						<div class="input-block">
							<label>Уровень образования (если нижеперечисленные уровни не подходят, то выберите  вариант "не выбран")</label>
							<select name="vac[vac_1][level]" class="level-list">
								<option value="none" selected="selected">не выбран</option>
								<option value="bac">бакалавриат</option>
								<option value="spec">специалитет</option>
								<option value="mag">магистратура</option>
								<option value="asp">аспирантура</option>
							</select>						
						</div>
						<div class="input-block">
							<label>Количество вакантных мест для приема (перевода) за счёт <u>бюджетных ассигнований федерального бюджета</u></label>
							<input type="text" name="vac[vac_1][fb]" class="field">
						</div>
						<div class="input-block">
							<label>Количество вакантных мест для приема (перевода) за счёт <u>бюджетов субъектов Российской Федерации</u></label>
							<input type="text" name="vac[vac_1][sr]" class="field">
						</div>
						<div class="input-block">
							<label>Количество вакантных мест для приема (перевода) за счёт <u>местных бюджетов</u></label>
							<input type="text" name="vac[vac_1][mb]" class="field">
						</div>
						<div class="input-block">
							<label>Количество вакантных мест для приема (перевода) за счёт <u>редств физических и (или) юридических лиц</u></label>
							<input type="text" name="vac[vac_1][sl]" class="field">
						</div>
						<a href="javascript:;" class="vac_remove link_remove">Удалить запись</a>
					</div>

				<?php endif?>
				
				<div id="add_vacblock">
					<input class="form_btn" type="button" value="Добавить запись" id="add_vac">
				</div>
			</div>
		</div>
				
		<div class="vacancy">
			<div class="input-block editor-block">
				<label>Информация о количестве вакантных мест для приема (перевода) (общая информация в свободной форме, необязательно)</label>
				<?php 
					wp_editor(
						(isset($field['vacinfo']) ? $field['vacinfo'] : ''), 
						'vacinfo', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'vacinfo',
							'tabindex'      => null,
							'textarea_rows' => 10,
							'teeny'         => 0,
							'dfw'           => 0,
							'tinymce'       => 1,
							'quicktags'     => 1,
							'drag_drop_upload' => true
						)
					);
				?>
			</div>
			<div class="input-block">
				<button class="form_btn" name="vac_btn" type="submit">Сохранить</button>
			</div>
		</div>	
		
	</form>
</div>
<?php endif; ?>