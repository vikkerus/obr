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
		var zamBlock = jQuery('#obr_zam .panel').length;
		var pedBlock = jQuery('#obr_ped .panel').length;
		var obrBlock = jQuery('.signal-line').length;
		var obrUch = jQuery('#obr_uch .panel-body').length;
		var obrNorm = jQuery('#obr_norm .panel-body').length;
		var obrFHD = jQuery('#obr_fhd .panel-body').length;
		var obrSam = jQuery('#obr_sam .panel-body').length;
		var obrPred = jQuery('#obr_pred .panel-body').length;
		var obrOtch = jQuery('#obr_otch .panel-body').length;
		var obrStand = jQuery('#stand_links').length;
		var obrPlat = jQuery('#paid_links').length;
		
		if(zamBlock == 0)
		{
			jQuery('.zam-block').html('<div>Заместители руководителя:</div><div class="none-data">нет данных</div>');
		}
		
		if(pedBlock == 0)
		{
			jQuery('.ped-block').html('<div>Педагогические работники:</div><div class="none-data">нет данных</div>');
		}
		
		// скрытие шапки таблицы на странице образования, если программ нет и показ фразы "нет данных по образовательным программам"
		if(obrBlock == 0)
		{
			jQuery('#obr_edu table').hide();
			
			jQuery('#obr_edu').html('<div class="none-data">нет данных по образовательным программам</div>');	
		}
		
		// показ фразы "нет данных" на странице образовательных стандартов, если документы отсутствуют
		if(obrStand != 0)
		{
			if (jQuery('#stand_links').html().trim() === '')
			{
				jQuery('#stand_links').html('<div class="none-data">нет данных</div>');
			}
		}
		
		// показ фразы "нет данных" на странице платных услуг, если ссылки отсутствуют
		if(obrPlat != 0)
		{
			if (jQuery('#paid_links').html().trim() === '')
			{
				jQuery('#paid_links').html('<div class="none-data">нет данных</div>');
			}
		}
		
		// скрытие коллапса а странице документов, если содержимого нет
		if(obrUch != 0)
		{
			if (jQuery('#obr_uch .panel-body').html().trim() === '')
			{
				jQuery('#obr_uch').hide();
			}
		}
		
		if(obrNorm != 0)
		{
			if (jQuery('#obr_norm .panel-body').html().trim() === '')
			{
				jQuery('#obr_norm').hide();
			}
		}
		
		if(obrFHD != 0)
		{
			if (jQuery('#obr_fhd .panel-body').html().trim() === '')
			{
				jQuery('#obr_fhd .panel-body').html('<div class="none-data">нет данных</div>');
			}
		}
		
		if(obrSam != 0)
		{
			if (jQuery('#obr_sam .panel-body').html().trim() === '')
			{
				jQuery('#obr_sam .panel-body').html('<div class="none-data">нет данных</div>');
			}
		}
		
		if(obrPred != 0)
		{
			if (jQuery('#obr_pred .panel-body').html().trim() === '')
			{
				jQuery('#obr_pred .panel-body').html('<div class="none-data">нет данных</div>');
			}
		}
		
		if(obrOtch != 0)
		{
			if (jQuery('#obr_otch .panel-body').html().trim() === '')
			{
				jQuery('#obr_otch .panel-body').html('<div class="none-data">нет данных</div>');
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
