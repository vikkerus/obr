// очистка несохраненных данных после обновления страницы, фикс для Firefox
$('form').trigger('reset');


var script_class = function()
{	
    var self = this;
	var nophoto = '/wp-content/plugins/orginfo/assets/img/no-photo.jpg';


    self.events = function()
	{
		self.InitUploadDocs();
		self.InitCloneStruct();
		self.InitRemoveStruct();
		self.InitRemoveDocs();
		self.InitCloneEdu();
		self.InitRemoveEdu();
		self.InitCloneStand();
		self.InitRemoveStand();
		self.InitCloneZam();
		self.InitCloneFil();
		self.InitClonePed();
		self.InitRemoveZam();
		self.InitRemoveFil();
		self.InitRemovePed();
		self.InitCloneOtch();
		self.InitRemoveOtch();
		self.InitClonePred();
		self.InitRemovePred();
		self.InitCloneSam();
		self.InitRemoveSam();
		self.InitCloneDFhd();
		self.InitRemoveDFhd();
		self.InitClonePlat();
		self.InitRemovePlat();
    }

    /****************************** METHOD'S ******************************/
		
	// функция загрузки докумнта
	self.InitUploadDocs = function()
	{					
		jQuery(document).on('click','.doc_upload', function(event)
		{
			var button = $(event.target);		
			var parent = button.parent();
			var idInput = parent.find('.doc_id');
			var urlInput = parent.find('.doc_url');
			var uploader = parent.find('.doc_upload');
			var remover = parent.find('.doc_remove');
			var send_attachment_bkp = wp.media.editor.send.attachment;
			
			wp.media.editor.send.attachment = function(props, attachment) {
				$(idInput).val(attachment.id);
				$(urlInput).val(attachment.url);
				
				// проверка кнопки загрузки на наличие класса изображений
				if(uploader.hasClass('img'))
				{
					parent.find('.img-preview img').attr('src', attachment.url);
				}
				
				wp.media.editor.send.attachment = send_attachment_bkp;
				
				if(!uploader.hasClass('block-hidden'))
				{
					uploader.addClass('block-hidden');
				}

				if(remover.hasClass('block-hidden'))
				{
					remover.removeClass('block-hidden');
				}
			}
			wp.media.editor.open();
			
			return false;
		});
	}
	
	// функция клонирования блока структурного подразделения
	self.InitCloneStruct = function()
	{		
		jQuery('#add_struct').click(function (){
			var clone = $('.struct_item').filter(':last').clone(false);
			var cloneItems = clone.find('*[id]').andSelf();
			var cloneIds = clone.find('*[name]').andSelf();
			var uploader = clone.find('.doc_upload');
			var remover = clone.find('.doc_remove');
			
			cloneItems.each(function()
			{ 				
				var tmp_id;
				tmp_id = $(this).attr('id');
				var result = tmp_id.match(/(\d+)/g);
				$(this).attr('id',tmp_id.replace(result[0], parseInt(result[0], 10)+1));
				
			});
			
			cloneIds.each(function()
			{ 								
				var tmp_name;
				tmp_name = $(this).attr('name');
				var resultName = tmp_name.match(/(\d+)/g);
				$(this).attr('name',tmp_name.replace(resultName[0], parseInt(resultName[0], 10)+1));
				
			});
			
			clone.insertBefore('#add_block').find("input[type='text']").val('');
			
			// для нескольких doc_upload и doc_remove
			uploader.each(function(indx, element){
				if($(element).hasClass('block-hidden'))
				{
					$(element).removeClass('block-hidden');
				}
			});
			
			remover.each(function(indx, element){
				if(!$(element).hasClass('block-hidden'))
				{
					clone.find('.doc_remove').addClass('block-hidden');
				}
			});
		});
		
	}
	
	// функция удаления блока структурного подразделения (кроме первого)
	self.InitRemoveStruct = function()
	{
		jQuery(document).on('click','.struct_remove', function(event)
		{
			var button = $(event.target);		
			var parent = button.parent();
			var parentId = parent.attr('id');
			
			if (parentId != 'struct_struct_1')
			{
				parent.remove();
				alert('Структурное подразделение удалено');
			}
		});
	}
	
	// функция очистки полей документов
	self.InitRemoveDocs = function()
	{
		jQuery(document).on('click','.doc_remove', function(event)
		{
			var button = $(event.target);		
			var parent = button.parent();
			var uploader = parent.find('.doc_upload');
			var remover = parent.find('.doc_remove');
			
			parent.find('.doc_id').val('');
			parent.find('.doc_url').val('');
			
			// проверка кнопки загрузки на наличие класса изображений
			if(uploader.hasClass('img'))
			{
				parent.find('.img-preview img').attr('src', nophoto);				
			}
			
			if(uploader.hasClass('block-hidden'))
			{
				uploader.removeClass('block-hidden');
			}
			
			if(!remover.hasClass('block-hidden'))
			{
				remover.addClass('block-hidden');
			}
			
		});
	}
	
	// функция клонирования блока образовательной программы
	self.InitCloneEdu = function()
	{		
		jQuery('#add_edu').click(function (){
			var clone = $('.edu_item').filter(':last').clone(false);
			var cloneItems = clone.find('*[id]').andSelf();
			var cloneIds = clone.find('*[name]').andSelf();
			var uploader = clone.find('.doc_upload');
			var remover = clone.find('.doc_remove');
			
			cloneItems.each(function()
			{ 				
				var tmp_id;
				tmp_id = $(this).attr('id');
				var result = tmp_id.match(/(\d+)/g);
				$(this).attr('id',tmp_id.replace(result[0], parseInt(result[0], 10)+1));
				
			});
			
			cloneIds.each(function()
			{ 								
				var tmp_name;
				tmp_name = $(this).attr('name');
				var resultName = tmp_name.match(/(\d+)/g);
				$(this).attr('name',tmp_name.replace(resultName[0], parseInt(resultName[0], 10)+1));
				
			});
			
			clone.insertBefore('#add_prog').find('input, textarea').val('');
			
			
			// для нескольких doc_upload и doc_remove
			uploader.each(function(indx, element){
				if($(element).hasClass('block-hidden'))
				{
					$(element).removeClass('block-hidden');
				}
			});
			
			remover.each(function(indx, element){
				if(!$(element).hasClass('block-hidden'))
				{
					clone.find('.doc_remove').addClass('block-hidden');
				}
			});
			
		});
		
	}
	
	// функция удаления блока образовательной программы
	self.InitRemoveEdu = function()
	{
		jQuery(document).on('click','.edu_remove', function(event)
		{
			var button = $(event.target);		
			var parent = button.parent();
			var parentId = parent.attr('id');
			
			if (parentId != 'edu_edu_1')
			{
				parent.remove();
				alert('Образовательная программа удалена');
			}
		});
	}
	
	// функция клонирования блока ссылки на стандарт
	self.InitCloneStand = function()
	{		
		jQuery('#add_link').click(function (){
			var clone = $('.stand_item').filter(':last').clone(false);
			var cloneItems = clone.find('*[id]').andSelf();
			var cloneIds = clone.find('*[name]').andSelf();
			
			cloneItems.each(function()
			{ 				
				var tmp_id;
				tmp_id = $(this).attr('id');
				var result = tmp_id.match(/(\d+)/g);
				$(this).attr('id',tmp_id.replace(result[0], parseInt(result[0], 10)+1));
				
			});
			
			cloneIds.each(function()
			{ 								
				var tmp_name;
				tmp_name = $(this).attr('name');
				var resultName = tmp_name.match(/(\d+)/g);
				$(this).attr('name',tmp_name.replace(resultName[0], parseInt(resultName[0], 10)+1));
				
			});
			
			clone.insertBefore('#add_stand').find("input[type='text']").val('');
			
			if(clone.find('.reg-alert').length > 0)
			{
				clone.find('.reg-alert').remove();
			};

		});
		
	}
	
	// функция удаления ссылки на стандарт
	self.InitRemoveStand = function()
	{
		jQuery(document).on('click','.stand_remove', function(event)
		{
			var button = $(event.target);		
			var parent = button.parent();
			var parentId = parent.attr('id');
			
			if (parentId != 'stand_links_1')
			{
				parent.remove();
				alert('Ссылка на стандарт удалена');
			}
		});
	}
	
	// функция клонирования блока зама
	self.InitCloneZam = function()
	{		
		jQuery('#add_zam').click(function (){
			var clone = $('.zam_item').filter(':last').clone(false);
			var cloneItems = clone.find('*[id]').andSelf();
			var cloneIds = clone.find('*[name]').andSelf();
			var uploader = clone.find('.doc_upload');
			var remover = clone.find('.doc_remove');
			
			cloneItems.each(function()
			{ 				
				var tmp_id;
				tmp_id = $(this).attr('id');
				var result = tmp_id.match(/(\d+)/g);
				$(this).attr('id',tmp_id.replace(result[0], parseInt(result[0], 10)+1));
				
			});
			
			cloneIds.each(function()
			{ 								
				var tmp_name;
				tmp_name = $(this).attr('name');
				var resultName = tmp_name.match(/(\d+)/g);
				$(this).attr('name',tmp_name.replace(resultName[0], parseInt(resultName[0], 10)+1));
				
			});
			
			clone.insertBefore('#add_zamblock').find("input[type='text']").val('');
			
			// для нескольких doc_upload и doc_remove
			uploader.each(function(indx, element){
				if($(element).hasClass('block-hidden'))
				{
					$(element).removeClass('block-hidden');
				}
			});
			
			remover.each(function(indx, element){
				if(!$(element).hasClass('block-hidden'))
				{
					clone.find('.doc_remove').addClass('block-hidden');
				}
			});
			
			if(clone.find('.img-preview img'))
			{
				clone.find('.img-preview img').attr('src', nophoto);
			}

		});
	}
	
	// функция клонирования блока руководителя филиала
	self.InitCloneFil = function()
	{		
		jQuery('#add_fil').click(function (){
			var clone = $('.fil_item').filter(':last').clone(false);
			var cloneItems = clone.find('*[id]').andSelf();
			var cloneIds = clone.find('*[name]').andSelf();
			var uploader = clone.find('.doc_upload');
			var remover = clone.find('.doc_remove');
			
			cloneItems.each(function()
			{ 				
				var tmp_id;
				tmp_id = $(this).attr('id');
				var result = tmp_id.match(/(\d+)/g);
				$(this).attr('id',tmp_id.replace(result[0], parseInt(result[0], 10)+1));
				
			});
			
			cloneIds.each(function()
			{ 								
				var tmp_name;
				tmp_name = $(this).attr('name');
				var resultName = tmp_name.match(/(\d+)/g);
				$(this).attr('name',tmp_name.replace(resultName[0], parseInt(resultName[0], 10)+1));
				
			});
			
			clone.insertBefore('#add_filblock').find("input[type='text']").val('');
			
			// для нескольких doc_upload и doc_remove
			uploader.each(function(indx, element){
				if($(element).hasClass('block-hidden'))
				{
					$(element).removeClass('block-hidden');
				}
			});
			
			remover.each(function(indx, element){
				if(!$(element).hasClass('block-hidden'))
				{
					clone.find('.doc_remove').addClass('block-hidden');
				}
			});
			
			if(clone.find('.img-preview img'))
			{
				clone.find('.img-preview img').attr('src', nophoto);
			}

		});
	}
	
	// функция клонирования блока педагога
	self.InitClonePed = function()
	{		
		jQuery('#add_ped').click(function (){
			var clone = $('.ped_item').filter(':last').clone(false);
			var cloneItems = clone.find('*[id]').andSelf();
			var cloneIds = clone.find('*[name]').andSelf();
			var uploader = clone.find('.doc_upload');
			var remover = clone.find('.doc_remove');
			
			cloneItems.each(function()
			{ 				
				var tmp_id;
				tmp_id = $(this).attr('id');
				var result = tmp_id.match(/(\d+)/g);
				$(this).attr('id',tmp_id.replace(result[0], parseInt(result[0], 10)+1));
				
			});
			
			cloneIds.each(function()
			{ 								
				var tmp_name;
				tmp_name = $(this).attr('name');
				var resultName = tmp_name.match(/(\d+)/g);
				$(this).attr('name',tmp_name.replace(resultName[0], parseInt(resultName[0], 10)+1));
				
			});
			
			clone.insertBefore('#add_pedblock').find("input[type='text'],textarea").val('');
			
			// для нескольких doc_upload и doc_remove
			uploader.each(function(indx, element){
				if($(element).hasClass('block-hidden'))
				{
					$(element).removeClass('block-hidden');
				}
			});
			
			remover.each(function(indx, element){
				if(!$(element).hasClass('block-hidden'))
				{
					clone.find('.doc_remove').addClass('block-hidden');
				}
			});
			
			if(clone.find('.img-preview img'))
			{
				clone.find('.img-preview img').attr('src', nophoto);
			}

		});
	}
	
	// функция удаления зама
	self.InitRemoveZam = function()
	{
		jQuery(document).on('click','.zam_remove', function(event)
		{
			var button = $(event.target);		
			var parent = button.parent();
			var parentId = parent.attr('id');
			
			if (parentId != 'zam_zam_1')
			{
				parent.remove();
				alert('Заместитель руководителя удалён');
			}
		});
	}
	
	// функция удаления руководителя филиала
	self.InitRemoveFil = function()
	{
		jQuery(document).on('click','.fil_remove', function(event)
		{
			var button = $(event.target);		
			var parent = button.parent();
			var parentId = parent.attr('id');
			
			if (parentId != 'fil_fil_1')
			{
				parent.remove();
				alert('Руководитель филиала удалён');
			}
		});
	}
	
	// функция удаления педагога
	self.InitRemovePed = function()
	{
		jQuery(document).on('click','.ped_remove', function(event)
		{
			var button = $(event.target);		
			var parent = button.parent();
			var parentId = parent.attr('id');
			
			if (parentId != 'ped_ped_1')
			{
				parent.remove();
				alert('Педагог удалён');
			}
		});
	}
	
	// функция клонирования отчёта
	self.InitCloneOtch = function()
	{		
		jQuery('#clone_otch').click(function (){
			var clone = $('.otch_item').filter(':last').clone(false);
			var cloneItems = clone.find('*[id]').andSelf();
			var cloneIds = clone.find('*[name]').andSelf();
			var uploader = clone.find('.doc_upload');
			var remover = clone.find('.doc_remove');
			
			cloneItems.each(function()
			{ 				
				var tmp_id;
				tmp_id = $(this).attr('id');
				var result = tmp_id.match(/(\d+)/g);
				$(this).attr('id',tmp_id.replace(result[0], parseInt(result[0], 10)+1));
				
			});
			
			cloneIds.each(function()
			{ 								
				var tmp_name;
				tmp_name = $(this).attr('name');
				var resultName = tmp_name.match(/(\d+)/g);
				$(this).attr('name',tmp_name.replace(resultName[0], parseInt(resultName[0], 10)+1));
				
			});
			
			clone.insertBefore('#add_otch').find("input[type='text']").val('');
			
			if(clone.find('.reg-alert').length > 0)
			{
				clone.find('.reg-alert').remove();
			};
			
			
			// для нескольких doc_upload и doc_remove
			uploader.each(function(indx, element){
				if($(element).hasClass('block-hidden'))
				{
					$(element).removeClass('block-hidden');
				}
			});
			
			remover.each(function(indx, element){
				if(!$(element).hasClass('block-hidden'))
				{
					clone.find('.doc_remove').addClass('block-hidden');
				}
			});
			
		});
		
	}
	
	// функция удаления отчёта
	self.InitRemoveOtch = function()
	{
		jQuery(document).on('click','.otch_remove', function(event)
		{
			var button = $(event.target);		
			var parent = button.parent();
			var parentId = parent.attr('id');
			
			if (parentId != 'otch_otch_1')
			{
				parent.remove();
				alert('Отчёт удалён');
			}
		});
	}
	
	// функция клонирования предписания
	self.InitClonePred = function()
	{		
		jQuery('#clone_pred').click(function (){
			var clone = $('.pred_item').filter(':last').clone(false);
			var cloneItems = clone.find('*[id]').andSelf();
			var cloneIds = clone.find('*[name]').andSelf();
			var uploader = clone.find('.doc_upload');
			var remover = clone.find('.doc_remove');
			
			cloneItems.each(function()
			{ 				
				var tmp_id;
				tmp_id = $(this).attr('id');
				var result = tmp_id.match(/(\d+)/g);
				$(this).attr('id',tmp_id.replace(result[0], parseInt(result[0], 10)+1));
				
			});
			
			cloneIds.each(function()
			{ 								
				var tmp_name;
				tmp_name = $(this).attr('name');
				var resultName = tmp_name.match(/(\d+)/g);
				$(this).attr('name',tmp_name.replace(resultName[0], parseInt(resultName[0], 10)+1));
				
			});
			
			clone.insertBefore('#add_pred').find("input[type='text']").val('');
			
			if(clone.find('.reg-alert').length > 0)
			{
				clone.find('.reg-alert').remove();
			};
			
			
			// для нескольких doc_upload и doc_remove
			uploader.each(function(indx, element){
				if($(element).hasClass('block-hidden'))
				{
					$(element).removeClass('block-hidden');
				}
			});
			
			remover.each(function(indx, element){
				if(!$(element).hasClass('block-hidden'))
				{
					clone.find('.doc_remove').addClass('block-hidden');
				}
			});
			
		});
		
	}
	
	// функция удаления предписания
	self.InitRemovePred = function()
	{
		jQuery(document).on('click','.pred_remove', function(event)
		{
			var button = $(event.target);		
			var parent = button.parent();
			var parentId = parent.attr('id');
			
			if (parentId != 'pred_pred_1')
			{
				parent.remove();
				alert('Предписание удалено');
			}
		});
	}
	
	// функция клонирования самообследования
	self.InitCloneSam = function()
	{		
		jQuery('#clone_sam').click(function (){
			var clone = $('.sam_item').filter(':last').clone(false);
			var cloneItems = clone.find('*[id]').andSelf();
			var cloneIds = clone.find('*[name]').andSelf();
			var uploader = clone.find('.doc_upload');
			var remover = clone.find('.doc_remove');
			
			cloneItems.each(function()
			{ 				
				var tmp_id;
				tmp_id = $(this).attr('id');
				var result = tmp_id.match(/(\d+)/g);
				$(this).attr('id',tmp_id.replace(result[0], parseInt(result[0], 10)+1));
				
			});
			
			cloneIds.each(function()
			{ 								
				var tmp_name;
				tmp_name = $(this).attr('name');
				var resultName = tmp_name.match(/(\d+)/g);
				$(this).attr('name',tmp_name.replace(resultName[0], parseInt(resultName[0], 10)+1));
				
			});
			
			clone.insertBefore('#add_sam').find("input[type='text']").val('');
			
			if(clone.find('.reg-alert').length > 0)
			{
				clone.find('.reg-alert').remove();
			};
			
			
			// для нескольких doc_upload и doc_remove
			uploader.each(function(indx, element){
				if($(element).hasClass('block-hidden'))
				{
					$(element).removeClass('block-hidden');
				}
			});
			
			remover.each(function(indx, element){
				if(!$(element).hasClass('block-hidden'))
				{
					clone.find('.doc_remove').addClass('block-hidden');
				}
			});
			
		});
		
	}
	
	// функция удаления самообследования
	self.InitRemoveSam = function()
	{
		jQuery(document).on('click','.sam_remove', function(event)
		{
			var button = $(event.target);		
			var parent = button.parent();
			var parentId = parent.attr('id');
			
			if (parentId != 'sam_sam_1')
			{
				parent.remove();
				alert('Самообследование удалено');
			}
		});
	}
	
	// функция клонирования плана фхд на странице документов
	self.InitCloneDFhd = function()
	{		
		jQuery('#clone_fhd').click(function (){
			var clone = $('.fhd_item').filter(':last').clone(false);
			var cloneItems = clone.find('*[id]').andSelf();
			var cloneIds = clone.find('*[name]').andSelf();
			var uploader = clone.find('.doc_upload');
			var remover = clone.find('.doc_remove');
			
			cloneItems.each(function()
			{ 				
				var tmp_id;
				tmp_id = $(this).attr('id');
				var result = tmp_id.match(/(\d+)/g);
				$(this).attr('id',tmp_id.replace(result[0], parseInt(result[0], 10)+1));
				
			});
			
			cloneIds.each(function()
			{ 								
				var tmp_name;
				tmp_name = $(this).attr('name');
				var resultName = tmp_name.match(/(\d+)/g);
				$(this).attr('name',tmp_name.replace(resultName[0], parseInt(resultName[0], 10)+1));
				
			});
			
			clone.insertBefore('#add_fhd').find("input[type='text']").val('');
			
			if(clone.find('.reg-alert').length > 0)
			{
				clone.find('.reg-alert').remove();
			};
			
			
			// для нескольких doc_upload и doc_remove
			uploader.each(function(indx, element){
				if($(element).hasClass('block-hidden'))
				{
					$(element).removeClass('block-hidden');
				}
			});
			
			remover.each(function(indx, element){
				if(!$(element).hasClass('block-hidden'))
				{
					clone.find('.doc_remove').addClass('block-hidden');
				}
			});
			
		});
		
	}
	
	// функция удаления плана фхд на странице документов
	self.InitRemoveDFhd = function()
	{
		jQuery(document).on('click','.fhd_remove', function(event)
		{
			var button = $(event.target);		
			var parent = button.parent();
			var parentId = parent.attr('id');
			
			if (parentId != 'fhd_fhd_1')
			{
				parent.remove();
				alert('План ФХД удалён');
			}
		});
	}
	
	// функция клонирования блока на странице платных услуг
	self.InitClonePlat = function()
	{		
		jQuery('#clone_plat').click(function (){
			var clone = $('.plat_item').filter(':last').clone(false);
			var cloneItems = clone.find('*[id]').andSelf();
			var cloneIds = clone.find('*[name]').andSelf();
			var uploader = clone.find('.doc_upload');
			var remover = clone.find('.doc_remove');
			
			cloneItems.each(function()
			{ 				
				var tmp_id;
				tmp_id = $(this).attr('id');
				var result = tmp_id.match(/(\d+)/g);
				$(this).attr('id',tmp_id.replace(result[0], parseInt(result[0], 10)+1));
				
			});
			
			cloneIds.each(function()
			{ 								
				var tmp_name;
				tmp_name = $(this).attr('name');
				var resultName = tmp_name.match(/(\d+)/g);
				$(this).attr('name',tmp_name.replace(resultName[0], parseInt(resultName[0], 10)+1));
				
			});
			
			clone.insertBefore('#add_plat').find("input[type='text']").val('');
			
			if(clone.find('.reg-alert').length > 0)
			{
				clone.find('.reg-alert').remove();
			};
			
			
			// для нескольких doc_upload и doc_remove
			uploader.each(function(indx, element){
				if($(element).hasClass('block-hidden'))
				{
					$(element).removeClass('block-hidden');
				}
			});
			
			remover.each(function(indx, element){
				if(!$(element).hasClass('block-hidden'))
				{
					clone.find('.doc_remove').addClass('block-hidden');
				}
			});
			
		});
		
	}
	
	// функция удаления блока на странице платных услуг
	self.InitRemovePlat = function()
	{
		jQuery(document).on('click','.plat_remove', function(event)
		{
			var button = $(event.target);		
			var parent = button.parent();
			var parentId = parent.attr('id');
			
			if (parentId != 'plat_plat_1')
			{
				parent.remove();
				alert('Документ удалён');
			}
		});
	}	
}

var template = new script_class();

jQuery(document).ready(function(jQuery)
{
    template.events();
});