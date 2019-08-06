var front_class = function () {
	
    var self = this;
	var nophoto = '/wp-content/plugins/obrinfo/assets/img/no-photo.jpg';


    self.events = function () {
		self.InitHideBlock();
		self.InitAddTag();
    }

    /****************************** METHOD'S ******************************/
	
	// функция скрытия шапки блока замов и педагогов на странице педсостава, если замов или педагогов нет
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
		
		if(zamBlock == 0)
		{
			jQuery('.zam-block').hide();
		}
		
		if(pedBlock == 0)
		{
			jQuery('.ped-block').hide();
		}
		
		// скрытие шапки таблицы на странице образования, если программ нет
		if(obrBlock == 0)
		{
			jQuery('#obr_edu').hide();
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
				jQuery('#obr_fhd').hide();
			}
		}
		
		if(obrSam != 0)
		{
			if (jQuery('#obr_sam .panel-body').html().trim() === '')
			{
				jQuery('#obr_sam').hide();
			}
		}
		
		if(obrPred != 0)
		{
			if (jQuery('#obr_pred .panel-body').html().trim() === '')
			{
				jQuery('#obr_pred').hide();
			}
		}
		
		if(obrOtch != 0)
		{
			if (jQuery('#obr_otch .panel-body').html().trim() === '')
			{
				jQuery('#obr_otch').hide();
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
