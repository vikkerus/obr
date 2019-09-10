<?php $data = obr_net_page();?>

<h2 class="obr_title">Отчёт о датах заполнения разделов на сайтах образовательных организаций</h2>

<?php if($file = obr_net_csv())
{
	echo '<a class="link-csv" href="'.$file.'" download><i class="fa fa-file-text-o" aria-hidden="true"></i>
Скачать отчёт</a>';
}
?>

<?php if(is_array($data) && !empty($data)) : ?>
<?php foreach ($data as $key => $val) : ?>
<div class="info-table table-responsive">
	<table>
		<thead>
			<tr>
				<th class="title-th" colspan="2">
				<a title="Ссылка на сайт" href="<?php echo (isset($val['url']) && !empty ($val['url'])) ? $val['url'] : ''?>" target="_blank"><?php echo (isset($val['name']) && !empty ($val['name'])) ? $val['name'] : 'Ссылка на сайт'?></a>
				<?php echo (isset($val['id']) && !empty ($val['id'])) ? ' (ID сайта в сети - '.$val['id'].')' : 'Ссылка на сайт'?>
				</th>
			</tr>
			<tr>
				<th>Наименование раздела</th>
				<th>Дата внесения изменений</th>
			</tr>
		</thead>
		<tbody>
		<?php if(isset($val['info']) && is_array($val['info'])) : foreach($val['info'] as $item) : ((is_object($item) ? $item = (array)$item : ''));?>

			<tr>
				<td>
					<?php echo (isset($item['section_name']) && !empty($item['section_name'])) ? $item['section_name'] : ''?>
				</td>
				<td>
					<?php echo (isset($item['section_update_date']) && !empty($item['section_update_date'])) ? (($item['section_update_date'] !='0000-00-00 00:00:00') ? $item['section_update_date'] : '<span class="none">Изменения не вносились</span>') : ''?>
				</td>
			</tr>

		<?php endforeach; endif?>	
		</tbody>
	</table>	
</div>
<?php endforeach;?>
<?php endif;?>
