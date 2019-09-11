var front_class = function () {
	
    var self = this;
	var nophoto = '/wp-content/plugins/orginfo/assets/img/no-photo.jpg';


    self.events = function () {
		self.InitHideBlock();
		self.InitAddTag();
    }

    /****************************** METHOD'S ******************************/
	
	// функция скрытия шапки блока замов и педагогов на странице педсостава, если замов или педагогов нет
	// показ фразы "нет данных" на странице документов, если документы отсутствуют (для предписаний, фхд, отчетов, самообследований)
	self.InitHideBlock = function()
	{
		var zamBlock = jQuery('#org_zam .panel').length;
		var pedBlock = jQuery('#org_ped .panel').length;
		var orgBlock = jQuery('.signal-line').length;
		var orgUch = jQuery('#org_uch .panel-body').length;
		var orgNorm = jQuery('#org_norm .panel-body').length;
		var orgFHD = jQuery('#org_fhd .panel-body').length;
		var orgSam = jQuery('#org_sam .panel-body').length;
		var orgPred = jQuery('#org_pred .panel-body').length;
		var orgOtch = jQuery('#org_otch .panel-body').length;
		var orgStand = jQuery('#stand_links').length;
		var orgPlat = jQuery('#paid_links').length;
		
		if(zamBlock == 0)
		{
			jQuery('.zam-block').html('<div>Заместители руководителя:</div><div class="none-data">нет данных</div>');
		}
		
		if(pedBlock == 0)
		{
			jQuery('.ped-block').html('<div>Педагогические работники:</div><div class="none-data">нет данных</div>');
		}
		
		// скрытие шапки таблицы на странице образования, если программ нет и показ фразы "нет данных по образовательным программам"
		if(orgBlock == 0)
		{
			jQuery('#org_edu table').hide();
			
			jQuery('#org_edu').html('<div class="none-data">нет данных по образовательным программам</div>');	
		}
		
		// показ фразы "нет данных" на странице образовательных стандартов, если документы отсутствуют
		if(orgStand != 0)
		{
			if (jQuery('#stand_links').html().trim() === '')
			{
				jQuery('#stand_links').html('<div class="none-data">нет данных</div>');
			}
		}
		
		// показ фразы "нет данных" на странице платных услуг, если ссылки отсутствуют
		if(orgPlat != 0)
		{
			if (jQuery('#paid_links').html().trim() === '')
			{
				jQuery('#paid_links').html('<div class="none-data">нет данных</div>');
			}
		}
		
		// скрытие коллапса а странице документов, если содержимого нет
		if(orgUch != 0)
		{
			if (jQuery('#org_uch .panel-body').html().trim() === '')
			{
				jQuery('#org_uch').hide();
			}
		}
		
		if(orgNorm != 0)
		{
			if (jQuery('#org_norm .panel-body').html().trim() === '')
			{
				jQuery('#org_norm').hide();
			}
		}
		
		if(orgFHD != 0)
		{
			if (jQuery('#org_fhd .panel-body').html().trim() === '')
			{
				jQuery('#org_fhd .panel-body').html('<div class="none-data">нет данных</div>');
			}
		}
		
		if(orgSam != 0)
		{
			if (jQuery('#org_sam .panel-body').html().trim() === '')
			{
				jQuery('#org_sam .panel-body').html('<div class="none-data">нет данных</div>');
			}
		}
		
		if(orgPred != 0)
		{
			if (jQuery('#org_pred .panel-body').html().trim() === '')
			{
				jQuery('#org_pred .panel-body').html('<div class="none-data">нет данных</div>');
			}
		}
		
		if(orgOtch != 0)
		{
			if (jQuery('#org_otch .panel-body').html().trim() === '')
			{
				jQuery('#org_otch .panel-body').html('<div class="none-data">нет данных</div>');
			}
		}
	}
	
	// функция добавления тега с атрибутом к кнопке для слабовидящих
	self.InitAddTag = function()
	{
		var button1 = jQuery('.bt_widget-vi').length;
		var button2 = jQuery('#cr_widget').length;
		
		if(button1 != 0)
		{
			jQuery('.bt_widget-vi').wrap('<div itemprop="copy"></div>');
		}
		
		if(button2 != 0)
		{
			jQuery('#cr_widget').wrap('<div itemprop="copy"></div>');
		}
	}
	
}

var template = new front_class();

jQuery(document).ready(function($)
{
    template.events();
});
