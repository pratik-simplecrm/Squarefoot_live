<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class quote_ProductsViewEdit extends ViewEdit
{
 	public function __construct()
 	{
 		parent::ViewEdit();
 		$this->useForSubpanel = true;
 		$this->useModuleQuickCreateTemplate = true;

 	}
 	function display()
 	{
    echo $js =<<<EOD
    <script>
    $(document).ready(function(){
      $('#hsn_code_c').hide();
      $('#hsn_code_c_label').parent().hide();
      $('#sac_code_c').hide();
      $('#sac_code_c_label').parent().hide();
      var type = $('#type_c').val();
      if(type=='Products')
      {
        $('#hsn_code_c').show();
        $('#hsn_code_c_label').parent().show();
        $('#sac_code_c').hide();
        $('#sac_code_c_label').parent().hide();
      }
      else if(type=='Installation')
      {
        $('#hsn_code_c').hide();
        $('#hsn_code_c_label').parent().hide();
        $('#sac_code_c').show();
        $('#sac_code_c_label').parent().show();
      }
      else {
        $('#hsn_code_c').hide();
        $('#hsn_code_c_label').parent().hide();
        $('#sac_code_c').hide();
        $('#sac_code_c_label').parent().hide();
      }
      $('#type_c').change(function(){
        var type = $('#type_c').val();
        if(type=='Products')
        {
          $('#hsn_code_c').show();
          $('#hsn_code_c_label').parent().show();
          $('#sac_code_c').hide();
          $('#sac_code_c_label').parent().hide();
        }
        else if(type=='Installation')
        {
          $('#hsn_code_c').hide();
          $('#hsn_code_c_label').parent().hide();
          $('#sac_code_c').show();
          $('#sac_code_c_label').parent().show();
        }
        else {
          $('#hsn_code_c').hide();
          $('#hsn_code_c_label').parent().hide();
          $('#sac_code_c').hide();
          $('#sac_code_c_label').parent().hide();
        }
      });
    });
    </script>
EOD;
//written by pratik on 08072019 (to hide and show SQM/Box field)
echo $SQM = <<<SQM
     <script>
    $(document).ready(function(){
		var dropdown_val = $('#uom_c :selected').text();
		if(dropdown_val=='SQM')
		{
			$('#sqm_value_c_label').css('visibility','visible');
			$('#sqm_value_c').show();
		}else{
				$('#sqm_value_c').hide();
				$('#sqm_value_c_label').css('visibility','hidden');
				
		}	
		$("#uom_c").change(function(){
				
		var box_size = $(this).children("option:selected").val();
		if(box_size == 'SQM')
		{
			    $('#sqm_value_c_label').css('visibility','visible');
				$('#sqm_value_c').show();
				
		}else{
			$('#sqm_value_c').hide();
			$('#sqm_value_c_label').css('visibility','hidden');
		}
});
});
       </script>
SQM;
		parent::display();
	}
}
?>
