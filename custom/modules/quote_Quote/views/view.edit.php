<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');
require_once('modules/Users/User.php');

class quote_QuoteViewEdit extends ViewEdit {

    function quote_QuoteViewEdit() {
        parent::ViewEdit();
    }

    function display() {

        global $db, $current_user, $sugar_config;
        //echo 'Hi'.$_REQUEST['parent_id'];
        //echo 'Hi'.$_REQUEST['record'];
        //$this->bean->quote_quote_accountsaccounts_ida = '41000dbe-e00c-95e6-60fa-51c29709c04a';
        //$this->bean->quote_quote_accounts_name = '3S Interiors Pvt Ltd';

        $return_module = $_REQUEST['return_module'];
        $account_id = $_REQUEST['account_id'];
        $account_name = $_REQUEST['account_name'];
        $check_val = intval($this->bean->copy_address_c);

        //~ $isOld = $this->bean->fetched_row;
        $UserBranch = $bean->branch_c;

        $query = "SELECT name, tax_value from quote_quotetax,quote_quotetax_cstm where id = id_c AND  branch_c ='$UserBranch' AND deleted=0";
        $query = $db->query($query);

        $i = 0;
        while ($row = $db->fetchByAssoc($query)) {
            $tax_array[$i]['name'] = $row['name'];
            $tax_array[$i]['value'] = $row['tax_value'];
            $i++;
        }
        array_unshift($tax_array, array('name' => '', 'value' => ''));
        $json_tax_array = json_encode($tax_array);
        echo '<div id="dialog" title="Warning !!!"> <p> Please select Branch...</p> </div>';
        echo $ro = <<<BOC
		<script>
		var count = 0;
		var p_count =0;
		var j=0;
		var service_tax = '$json_tax_array';
		$(document).ready(function() {
			$('#name').parent().append('<div style="color:green;">Please Enter Project Name </div>'); 
			addToValidate('EditView','contact_name_c','contact_name_c',true,'Billing Contact Name');
			$('#contact_name_c_label').text('Billng Contact Name:').append('<span style="color:red;">*</span>');
			
			//$('#quotation_status').attr('disabled',true);
			var status = $('#quotation_status option:selected').val();
			$('#quotation_status option').each(function(index) {
				if($(this).val() != status) {
					$(this).attr('disabled',true);
				}
			});
			
			//$('#quotation_status').attr('disabled',true);
			$('#structure_details_c').attr('readonly', true);
			if( $("#sub_total").val() =='' ){
				$("#sub_total,#discounted_total,#new_subtotal,#discount,#total_tax,#grand_total,#shipping_c").val('0.00');
			}
			$('#dialog').hide();
			$("#sub_total,#discounted_total,#new_subtotal,#discount,#total_tax,#grand_total,#shipping_c").prop("readOnly", true).css("background-color", "#DDDDDD");
			$("#_label").hide();
			start();

			$('#contact_name_c').change(function(){
				auto_contact_info();
			});

			$(window).focus( function(){
				auto_contact_info();
			});
			auto_contact_info();

			$('#branch_c').change(function(){
				var branch = $('#branch_c').val();
				$.ajax({
					url: 'vatDetails.php',
					async:false,
					type:'GET',
					data:{branch:branch},
					success: function(result) {
						$("#company_vat_details_c").val(result);
					}
				});
			});

			$('#packing_charges_c').change(function(){
				var packing_charges = $('#packing_charges_c').val().replace(",","");
				var freight_charges = $('#freight_charges_c').val().replace(",","");
				var loading_charges = $('#loading_unloading_charges_c').val().replace(",","");
				var other_charges = $('#other_charges_c').val().replace(",","");

				var structure_details = parseFloat(Number(packing_charges) + Number(freight_charges) + Number(loading_charges) + Number(other_charges)).toFixed(2);
				$('#structure_details_c').val(structure_details);
				
				add_other_charges_grand_total(structure_details);

			});

			$('#freight_charges_c').change(function(){
				var packing_charges = $('#packing_charges_c').val().replace(",","");
				var freight_charges = $('#freight_charges_c').val().replace(",","");
				var loading_charges = $('#loading_unloading_charges_c').val().replace(",","");
				var other_charges = $('#other_charges_c').val().replace(",","");

				var structure_details = parseFloat(Number(packing_charges) + Number(freight_charges) + Number(loading_charges) + Number(other_charges)).toFixed(2);
				$('#structure_details_c').val(structure_details);
				
				add_other_charges_grand_total(structure_details);

			});


			$('#loading_unloading_charges_c').change(function(){
				var packing_charges = $('#packing_charges_c').val().replace(",","");
				var freight_charges = $('#freight_charges_c').val().replace(",","");
				var loading_charges = $('#loading_unloading_charges_c').val().replace(",","");
				var other_charges = $('#other_charges_c').val().replace(",","");

				var structure_details = parseFloat(Number(packing_charges) + Number(freight_charges) + Number(loading_charges) + Number(other_charges)).toFixed(2);
				$('#structure_details_c').val(structure_details);
				
				add_other_charges_grand_total(structure_details);

			});

			$('#other_charges_c').change(function(){
				var packing_charges = $('#packing_charges_c').val().replace(",","");
				var freight_charges = $('#freight_charges_c').val().replace(",","");
				var loading_charges = $('#loading_unloading_charges_c').val().replace(",","");
				var other_charges = $('#other_charges_c').val().replace(",","");

				var structure_details = parseFloat(Number(packing_charges) + Number(freight_charges) + Number(loading_charges) + Number(other_charges)).toFixed(2);
				$('#structure_details_c').val(structure_details);
				
				add_other_charges_grand_total(structure_details);
			});
		});
		
		
		function add_other_charges_grand_total(structure_details) {
		
			if($('#shipping_amt_1').val()) {
					//Add other charges in the line item
					$('#shipping_amt_1').val(structure_details);
					
					//var sub_total = $('#sub_total_1').val().replace(",","");
					//var	discount = $('#discounted_total_1').val().replace(",","");
					var	discounted_total = $('#new_subtotal_1').val().replace(",","");
					var	shipping_c = $('#shipping_amt_1').val().replace(",","");
					var	total_tax = $('#total_tax_1').val().replace(",","");
					
					var total = parseFloat(Number(discounted_total) + Number(shipping_c) + Number(total_tax)).toFixed(2);
					$('#grand_total_1').val(total);
					
					//Add other charges in the Grand total
					$('#shipping_c').val(structure_details);
					
					//var sub_total = $('#sub_total').val().replace(",","");
					//var	discount = $('#discount').val().replace(",","");
					var	discounted_total = $('#discounted_total').val().replace(",","");
					var	shipping_c = $('#shipping_c').val().replace(",","");
					var	total_tax = $('#total_tax').val().replace(",","");
					
					var total = parseFloat(Number(discounted_total) + Number(shipping_c) + Number(total_tax)).toFixed(2);
					$('#grand_total').val(total);
					
					// code written by pratik on 16082019 start (kerala 1% cess)
					
					 var state_name1 = $( "#branch_c option:selected" ).text();
					if($("#unregistered_user_c").prop('checked') == true && state_name1 == 'Kerala')
					{
						
					    if(shipping_c>0 && shipping_c!=0)
						{
							
							var one_per_of_ship = (1 / 100) * shipping_c;
					
							var final_Cess_amt = $("#one_per_cess_1").val();
							var final_cess_for_kerala_amt = parseFloat(Number(one_per_of_ship) + Number(final_Cess_amt)).toFixed(2);
							$("#one_per_cess_1").val(final_cess_for_kerala_amt);
							$("#cess_amount_c").val(final_cess_for_kerala_amt);
							
							var total1 = parseFloat(Number(discounted_total) + Number(shipping_c) + Number(total_tax) + Number(final_cess_for_kerala_amt)).toFixed(2);
							$('#grand_total_1').val(total1);
							$('#grand_total').val(total1);
							
							
							
						}else if(shipping_c=='0.00')
						{
												
								var discounted_subtotal_1 =  $("#new_subtotal_1").val();
								var discounted_subtotal_3 =  $("#discounted_total").val();
								if(discounted_subtotal_1>=0)
								{
									var one_per_of_discounted_subtotal_1 = (1 / 100) * discounted_subtotal_1;
									var one_percent_1 = parseFloat(Number(one_per_of_discounted_subtotal_1)).toFixed(2);
									
									$("#one_per_cess_1").val(one_percent_1);
									
									var total1 = parseFloat(Number(discounted_total) + Number(shipping_c) + Number(total_tax) + Number(one_percent_1)).toFixed(2);
									$('#grand_total_1').val(total1);
									
									//modify final grand total value
									var one_per_of_discounted_subtotal_3 = (1 / 100) * discounted_subtotal_3;
									var one_percent_3 = parseFloat(Number(one_per_of_discounted_subtotal_3)).toFixed(2);
									$("#cess_amount_c").val(one_percent_3);
									
									var total2 = parseFloat(Number(discounted_total) + Number(shipping_c) + Number(total_tax) + Number(one_percent_3)).toFixed(2);
									$('#grand_total').val(total2);
						
									
								}
	
						} 
	
					} 
					// code written by pratik on 16082019 End (kerala 1% cess)
				
			}
		}

		function auto_contact_info(){
			$('#contact_name_shipping_c').val( $('#contact_name_c').val() );
			$('#contact_id1_c').val( $('#contact_id_c').val() );
			removeFromValidate('EditView', 'contact_id1_c');
			removeFromValidate('EditView', 'contact_name_shipping_c');
		}

		function addPackage()
		{
			count++;
			var package_row = addPackagePanel();
			$('#mainQuoteLineItem').append(package_row);
			var branch = $('#branch_c').val();
			// $.ajax({
			// 	url: 'taxDropdown.php',
			// 	async:false,
			// 	type:'GET',
			// 	data:{branch:branch},
			// 	success: function(result) {
			// 		$("#service_tax_"+count).html(result);
			// 	}
			// });
//~
			//~ //$('[id*="in_"]').change(function(){
			//~ $('#in_1_1').change(function(){
				//~ alert('Hi');
				//~ /*var disc_check = $(this).attr('id');
				//~ alert(disc_check);
				//~ var arr = disc_check.split('_');
				//~ if( $("#"+disc_check).is(":checked") ){
					//~ alert(arr[1]+'_'+arr[2]);
					//~ //element10.value = '1';
				//~ }
				//~ */
			//~ });
//~ $('[id*="service_tax_"]').change(function(){ alert('Change') });

			var shippingVal = $('#shipping_'+count+'_c').val();
			if( typeof shippingVal != 'undefined' && shippingVal != ''){
				$("#shipping_amt_"+count).val(shippingVal);
			}

			$('[id*="service_tax_"]').change(function(){
				var service_tax = $(this).attr('id');
				var arr = service_tax.split('_');
				var taxName = $('#'+service_tax).val();
				$.ajax({
					url: 'taxValue.php',
					async:false,
					type:'GET',
					data:{branch:branch,taxName:taxName},
					success: function(result) {
						$('#service_tax_val_'+arr[2]).val( result );
					}
				});

				var baseTable = $('#'+service_tax).parent().parent().parent().parent().attr('id');
				var lastchild = $("#"+baseTable+" tbody tr:last-child").attr('id');
				var arr1 = lastchild.split('_');
				//alert( arr1[2] );
				for (var i = 1; i <= arr1[2]; i++) {
					$('#service_tax_'+arr[2]+'_'+i).val(taxName);
					$('#service_tax_val_'+arr[2]+'_'+i).val($('#service_tax_val_'+arr[2]).val());
					calculate(i+'_'+arr[2],arr[2]);
				}

				//$('#service_tax_val_'+arr[2]).val(  );
			});

			$('[id*="group_id_"]').change(function(){

				var group_type = $(this).attr('id');
				var arr = group_type.split('_');
				var type = $('#group_id_'+arr[2]).val();


				if( type =='Product'){
					$("#hsn_code_"+arr[2]).text('HSN CODE');
					$("#service_tax_"+arr[2]).val('');
					//$("#service_tax_"+arr[2]+" option[value='Service Tax']").prop("disabled",true);
					$("#service_tax_"+arr[2]+" option[value='Service Tax']").hide();
					$("#service_tax_"+arr[2]+" option[value='VAT']").show();
					$("#service_tax_"+arr[2]+" option[value='CST Without C Form']").show();
					$("#service_tax_"+arr[2]+" option[value='CST With C Form']").show();
				}
				else if( type =='Installation'){
					$("#hsn_code_"+arr[2]).text('SAC CODE');
					$("#service_tax_"+arr[2]).val('');
					$("#service_tax_"+arr[2]+" option[value='CST Without C Form']").hide();
					$("#service_tax_"+arr[2]+" option[value='CST With C Form']").hide();
					$("#service_tax_"+arr[2]+" option[value='VAT']").hide();
					$("#service_tax_"+arr[2]+" option[value='Service Tax']").show();
				}


			});
		}

		function addPackagePanel()
		{
			//alert("Called");
			var id_name = 'package_'+count;
			var id_value = 'hidden_package_'+count;

			var group_count = parseInt($('#group_counts').val()) + parseInt(1);
			
			//Did changes in htmlData for Kerala 1% cess functionality
			// 1) added table id 2) added one tr for one_per_cess after total GST

			var htmlData = "<div class='package_row' id='package_panel_"+count+"' ><br><table id='QuotesLineTable_"+count+"' width='100%' border=0 class='detail view'><tr><td colspan =3 id='GroupName_"+count+"'>&nbsp;&nbsp;<span><b>Group Name</b></span>&nbsp;&nbsp;<select id='group_id_"+count+"'><option value='Product'>Product</option><option value='Installation'>Installation</option></select></td>&nbsp;&nbsp;&nbsp; <td colspan =6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> <td style='width:10%'><input type='button' id='remove_group_"+count+"' onclick='removeGroup("+count+")' value='Remove Group' /></td><input type='hidden' id='rowcount' name='rowcount' value=''></tr><tr style='height:25px'><th style='width:10%'>Quantity</th><th style='width:30%'>Product</th><th id='hsn_code_"+count+"' style='width:10%'>HSN CODE</th><th style='width:10%'>UOM</th><th style='width:10%'>Unit Price</th><th style='width:10%'>Tax</th><th style='width:10%'>Discount</th><th style='width:10%'>Percentage</th><th style='width:10%'>GST %</th><th style='width:10%'><input type='button' onclick='addRow("+count+")' value='Add' /></th></tr></table><table id ='inner_table_"+count+"' border='0' cellspacing='0' cellpadding='0' style='float:right'><tr><td style='font-weight:bold' scope='row' NOWRAP style='text-align: left;'>Subtotal:</td><td scope='row' NOWRAP><input type='text' style='background-color: #DDDDDD;' size='10' class='SubTotal' name='sub_total' id='sub_total_"+count+"' value='0' readonly /></td></tr><tr><td style='font-weight:bold' scope='row' NOWRAP style='text-align: left;'>Discount:</td><td scope='row' NOWRAP><input type='text' style='background-color: #DDDDDD;' size='10' name='discounted_total' class='Discount' id='discounted_total_"+count+"' value='0' readonly /></td></tr><tr><td style='font-weight:bold' scope='row' NOWRAP style='text-align: left;'>Discounted Subtotal:</td><td scope='row' NOWRAP><input type='text' style='background-color: #DDDDDD;' size='10' class='DiscountSubtotal' name='new_subtotal' id='new_subtotal_"+count+"' value='0' readonly /></td></tr><tr><td style='font-weight:bold' scope='row' NOWRAP style='text-align: left;'> Other Charges:</td><td scope='row' NOWRAP><input type='text' style='background-color: #DDDDDD;' size='10' class='ShippingAmt'  name='shipping' id='shipping_amt_"+count+"' value='0.00' readonly /></td></tr><tr><td style='font-weight:bold' scope='row' NOWRAP style='text-align: left;'> Tax Amount:</td><td scope='row' NOWRAP><input type='text' style='background-color: #DDDDDD;' size='10' class='TotalTax'  name='total_tax' id='total_tax_"+count+"' value='0' readonly /></td></tr><tr><td style='font-weight:bold' scope='row' NOWRAP style='text-align: left;'> kerala Cess 1%:</td><td scope='row' NOWRAP><input type='text' style='background-color: #DDDDDD;' size='10' class='one_per_cess'  name='one_per_cess' id='one_per_cess_"+count+"' value='0.00' readonly /></td></tr><tr><td style='font-weight:bold' scope='row' NOWRAP style='text-align: left;'>Total:</td><td scope='row' NOWRAP><input type='text' style='background-color: #DDDDDD;' size='10'  class='GrandTotal' name='grand_total' id='grand_total_"+count+"'  value='0.00' readonly /></td></tr> </table><br/><hr></hr></div>";

			$('#group_counts').val(group_count);

			return htmlData;

		}

		function setTotal(index){
			//var grand_total = $("#grand_total_"+count).val();
			var subTotal = $("#new_subtotal_"+index).val();
			var totalTax = $("#total_tax_"+index).val();
			var shipping_amt = $("#shipping_amt_"+index).val();
			$("#grand_total_"+index).val(parseFloat( parseFloat(shipping_amt) + parseFloat(subTotal) + parseFloat(totalTax)).toFixed(2));
			$("#shipping_"+index+"_c").val( parseFloat(shipping_amt) );
			//~ alert( $("#shipping_"+index+"_c").val() );
			grandTotal();
		}

		function addGroupPanel(){

			var id_name = 'package_'+count;
			var id_value = 'hidden_package_'+count;

			var html = "<div><br><button class='add_package' type='button' onclick='addPackagePanel()'>Add Group</button><br><input type='hidden' id='group_counts' value='0'/></div>";
			return html;
		}

		function getMainDiv()
        {
            var html = "<div id='mainQuoteLineItem'></div>";
            return  html;
        }

		function start()
        {
            //START Layout
            var main_div = getMainDiv();
            $('#quote_line_item_layout_c').parent().parent().html(main_div);

            var package_row = addGroupPanel();
            $('#mainQuoteLineItem').append(package_row);

			$('.add_package').click(function(){

				var branch = $('#branch_c').val();
				branch = $.trim(branch);
				if( typeof branch == 'undefined' || branch =='' ) {
					$('#dialog').html('<p>Please select Branch !!</p>');
					$( "#dialog" ).dialog();
					return '';
				}
				addPackage();
            });
        }

        function Editstart()
        {
            //START Layout
            var main_div = getMainDiv();
            $('#quote_line_item_layout_c').parent().parent().html(main_div);

           // var package_row = addPackagePanel();
            var package_row = addPackage();
            $('#mainQuoteLineItem').append(package_row);

        }


		</script>
BOC;

        $this->ss->assign("sub", $this->bean->sub_total);
        $this->ss->assign("tot_dis", $this->bean->discounted_total);
        $this->ss->assign("new_sub", $this->bean->new_subtotal);
        $this->ss->assign("tax", $this->bean->total_tax);
        $this->ss->assign("total", $this->bean->grand_total);

        if (isset($_REQUEST['record'])) {
            $this->bean->old_pli_c = '';
            $this->bean->new_pli_c = '';
            //check if inline products present
            $inline = $this->bean->is_line;
            $quote_id = $this->bean->id;
            if ($inline) {
                $bean1 = BeanFactory::getBean('quote_QuoteProducts');
                $qp_list = $bean1->get_list("", "quote_quoteproducts.quote_id = '" . $quote_id . "'");
                //echo "<pre>";
                //print_r($qp_list);exit;

                global $db;
                $prods = array();
                $i = 0;
				//changes done by pratik and anjali on 15072019 start
				$pc = 1;
				$ic =1;
				//changes done by pratik and anjali on 15072019 end
                //Commented on 09/10/2014
                //~ $select_lineItem = "SELECT *
                //~ FROM quote_quoteproducts,quote_quoteproducts_cstm
                //~ WHERE id = id_c
                //~ AND quote_id = '$quote_id' AND deleted =0 order by group_id_c";
                $select_lineItem = "SELECT *,SUBSTRING(group_id_c,1,1) as GroupID1,SUBSTRING(group_id_c,3,2) as GroupID2
					FROM quote_quoteproducts,quote_quoteproducts_cstm
					WHERE id = id_c
					AND quote_id = '$quote_id' AND deleted =0 order by GroupID1,abs(GroupID2)";

                $res_lineItem = $db->query($select_lineItem);
                while ($rec_lineItem = $db->fetchByAssoc($res_lineItem)) {

                    $prods[$i]['name'] = $rec_lineItem['name'];
                    $prods[$i]['uom'] = $rec_lineItem['uom_c'];
                    $prods[$i]['price'] = $rec_lineItem['price_c'];
                    $prods[$i]['tax'] = $rec_lineItem['tax'];
                    $prods[$i]['disc'] = $rec_lineItem['discount_c'];
                    $prods[$i]['dis_check'] = $rec_lineItem['dis_check'];
                    $prods[$i]['qty'] = $rec_lineItem['quantity'];
                    $prods[$i]['prod_id'] = $rec_lineItem['product_id'];
                    $prods[$i]['recId'] = $rec_lineItem['id'];
                    $prods[$i]['groupType'] = $rec_lineItem['group_type_c'];
                    $prods[$i]['serviceTax'] = $rec_lineItem['service_tax_c'];
                    $prods[$i]['serviceTaxVal'] = $rec_lineItem['service_tax_val_c'];
                    $prods[$i]['Prod_Spec'] = $rec_lineItem['product_specification_c'];
                    $prods[$i]['shipping'] = $rec_lineItem['shipping_c'];
                    $prods[$i]['code'] = $rec_lineItem['code_c'];

                    $prods[$i]['pliID'] = $rec_lineItem['id'];
                    $i++;
					
					//written by pratik and anjali on 15072019 start
                    $get_pre_assID = "SELECT `unit_price_c` FROM `quote_products_cstm` WHERE id_c = '".$rec_lineItem['product_id']."'";
					$Result = $db->query($get_pre_assID);
					$data2 = $db->fetchByAssoc($Result);
					
					 if($rec_lineItem['group_type_c'] == 'Product')
						{
							
							
							if($rec_lineItem['price_c'] < $data2['unit_price_c'])
							{
								//echo $rec_lineItem['price_c'];echo "<br>";
								//echo $data2['unit_price_c'];echo "<br>";
								echo $disabled_feild = <<<DOF
								<script>
								$(document).ready(function() {
									var prod_cc= $pc;
								$("#discount_1_"+prod_cc).prop('disabled', true);
								$("#in_1_"+prod_cc).attr("disabled", true);
								});
								</script>
DOF;
							}
							$pc++;
							

						}
						if($rec_lineItem['group_type_c'] == 'Installation')
						{
							
							if($rec_lineItem['price_c'] < $data2['unit_price_c'])
							{
								echo $disabled_field = <<<DDOF
								<script>
								$(document).ready(function() {
									var install_countt= $ic;
								$("#discount_2_"+install_countt).prop('disabled', true);
								$("#in_2_"+install_countt).attr("disabled", true);
								});
								</script>
DDOF;
							}
							$ic++;
						
							
						}
						//written by pratik and anjali on 15072019 start
                }
                //print_r($prods);exit;
                /*
                  $i = 0;
                  $prods = array();
                  foreach($qp_list['list'] as $list) {
                  $prods[$i]['name']		 = $list->name;
                  $prods[$i]['uom']		 = $list->uom_c;
                  $prods[$i]['price']		 = $list->price_c;
                  $prods[$i]['tax']		 = $list->tax;
                  $prods[$i]['disc']		 = $list->discount_c;
                  $prods[$i]['dis_check']	 = $list->dis_check;
                  $prods[$i]['qty']		 = $list->quantity;
                  $prods[$i]['prod_id']	 = $list->product_id;
                  $prods[$i]['recId']		 = $list->id;
                  $prods[$i]['groupType']	 = $list->group_type_c;
                  $prods[$i]['serviceTax']	 = $list->service_tax_c;
                  $prods[$i]['serviceTaxVal']	 = $list->service_tax_val_c;
                  $prods[$i]['Prod_Spec']	 = $list->product_specification_c;
                  $i++;
                  } */

                $j = 1;
                $productRecord = 0;
                $installtionRecord = 0;

                foreach ($prods as $prod) {
                    if ($prod['groupType'] == 'Product') {
                        $productRecord = 1;
                    }
                    if ($prod['groupType'] == 'Installation') {
                        $installtionRecord = 1;
                    }
                }
                foreach ($prods as $prod) {
                    if ($prod['groupType'] == 'Product') {
                        //echo $prod['disc'];
                        $productRecord = 1;

                        if (intval($prod['disc']) <= 50)
                            $discCheck = 1;
                        else {
                            //~ $discCheck = 0;
                            if (intval($prod['dis_check']) == 1) {
                                $discCheck = 1;
                            } else {
                                $discCheck = 0;
                            }
                        }
                        /*
                          if( intval($prod['dis_check']) == 1 ){
                          $discCheck = 1;
                          }
                          else{
                          $discCheck = 0;
                          }
                         */
                        $new_spec_val = $prod['Prod_Spec'];
                        $new_spec_val = str_replace("\n", " ", $new_spec_val);
                        $new_spec_val = str_replace("\r", "", $new_spec_val);

                        //$qp_inline .= "addRow('".$j."','".$prod['qty']."','".$prod['name']."','".$prod['prod_id']."','".$prod['uom']."','".$prod['price']."','".$prod['tax']."','".$prod['disc']."','".$discCheck."','".$prod['recId']."','".$prod['groupType']."','".$prod['serviceTax']."','".$prod['serviceTaxVal']."','".$new_spec_val."');";
						// written by pratik and anjali added last parameter as Sqm_box as blank we are not passing any value so keep as blank
                        $qp_inline .= "addRow('" . $productRecord . "','" . $prod['qty'] . "','" . $prod['name'] . "','" . $prod['prod_id'] . "','" . $prod['code'] . "','" . $prod['uom'] . "','" . $prod['price'] . "','" . $prod['tax'] . "','" . $prod['disc'] . "','" . $discCheck . "','" . $prod['recId'] . "','" . $prod['groupType'] . "','" . $prod['serviceTax'] . "','" . $prod['serviceTaxVal'] . "','" . $new_spec_val . "','" . $prod['pliID'] . "','');";
                        //echo $qp_inline;exit;
                        //$j++;
                    } elseif ($prod['groupType'] == 'Installation') {
                        if ($productRecord) {
                            $installtionRecord = 2;
                        } else {
                            $installtionRecord = 1;
                        }


                        if (intval($prod['disc']) < 50)
                            $discCheck = 1;
                        else {
                            //~ $discCheck = 0;
                            if (intval($prod['dis_check']) == 1) {
                                $discCheck = 1;
                            } else {
                                $discCheck = 0;
                            }
                        }
                        /*
                          if( intval($prod['dis_check']) == 1 ){
                          $discCheck = 1;
                          }
                          else{
                          $discCheck = 0;
                          }
                         */
                        $new_spec_val = $prod['Prod_Spec'];
                        $new_spec_val = str_replace("\n", " ", $new_spec_val);
                        $new_spec_val = str_replace("\r", "", $new_spec_val);

                        //$qp_inline .= "addRow('2','".$prod['qty']."','".$prod['name']."','".$prod['prod_id']."','".$prod['uom']."','".$prod['price']."','".$prod['tax']."','".$prod['disc']."','".$discCheck."','".$prod['recId']."','".$prod['groupType']."','".$prod['serviceTax']."','".$prod['serviceTaxVal']."','".$new_spec_val."');";
						// written by pratik and anjali added last parameter as Sqm_box as blank we are not passing any value so keep as blank
                        $qp_inline .= "addRow('" . $installtionRecord . "','" . $prod['qty'] . "','" . $prod['name'] . "','" . $prod['prod_id'] . "','" . $prod['code'] . "','" . $prod['uom'] . "','" . $prod['price'] . "','" . $prod['tax'] . "','" . $prod['disc'] . "','" . $discCheck . "','" . $prod['recId'] . "','" . $prod['groupType'] . "','" . $prod['serviceTax'] . "','" . $prod['serviceTaxVal'] . "','" . $new_spec_val . "','" . $prod['pliID'] . "','');";
                        //$j++;
                    }
                }

                $js = <<<BOC
				<script>
				if($productRecord){
					Editstart();
				}
				if($installtionRecord){
					Editstart();
				}
				$qp_inline

				var i=1;
				for (i=1 ; i<=2;i++){

					var grp_val = $('#group_id_'+i).val();

					if( grp_val =='Product'){

						$("#service_tax_"+i+" option[value='Service Tax']").hide();
						$("#service_tax_"+i+" option[value='VAT']").show();
						$("#service_tax_"+i+" option[value='CST Without C Form']").show();
						$("#service_tax_"+i+" option[value='CST With C Form']").show();
					}
					else if( grp_val =='Installation'){

						$("#service_tax_"+i+" option[value='CST Without C Form']").hide();
						$("#service_tax_"+i+" option[value='CST With C Form']").hide();
						$("#service_tax_"+i+" option[value='VAT']").hide();
						$("#service_tax_"+i+" option[value='Service Tax']").show();
					}
					else{
						$("#service_tax_"+i+" option[value='Service Tax']").hide();
						$("#service_tax_"+i+" option[value='CST Without C Form']").hide();
						$("#service_tax_"+i+" option[value='VAT']").hide();
						$("#service_tax_"+i+" option[value='CST With C Form']").hide();
					}
				}

				</script>
BOC;

                $js3 = <<<EOF
			<script>
			$(document).ready(function() {

				$("#btn_quote_quote_accounts_name").attr("onclick", 'open_popup( "Accounts",  600,  400,  " ",  true,  false,  {"call_back_function":"set_acc_return","form_name":"EditView","field_to_name_array":{"id":"quote_quote_accountsaccounts_ida","name":"quote_quote_accounts_name","address_street":"address_street"}},  "single",  true );');



			});

			function set_acc_return(popup_reply_data) {
				//fetch the row number and then its specific details
				var row = popup_reply_data["id"]["id"];
				alert(row);

			}
			</script>
EOF;
            }
        }

        $AccChange = <<<EOC
	<script>
	$(document).ready(function(){
	var return_mod = '$return_module';
	var account_id = '$account_id';
	var account_name = '$account_name';
		if(return_mod == 'Opportunities'){
		   $('#quote_quote_accountsaccounts_ida').val(account_id);
		   $('#quote_quote_accounts_name').val(account_name);
		   checkUnitSub(account_id);
		}
	});

		function checkUnitSub(customerID){
				var Billing_customer_id = customerID;
				if( Billing_customer_id != '' ){
			    $.ajax({
					    url:'customAjax.php',
						async:false,
						type:'GET',
						data: {Billing_customer_id:Billing_customer_id},
						success:function(data) {
						//	alert(data);
							jsonobj = jQuery.parseJSON(data);
							$('#billing_address_c').val(jsonobj.billing_address_street);
							$('#billing_address_city_c').val(jsonobj.billing_address_city);
							$('#billing_address_state_c').val(jsonobj.billing_address_state);
						    $('#billing_address_postalcode_c').val(jsonobj.billing_address_postalcode);
							$('#billing_address_country_c').val(jsonobj.billing_address_country);

							$('#accounts_quote_quote_1_name').val(jsonobj.name);
							$('#accounts_quote_quote_1accounts_ida').val(jsonobj.cust_id);

						}

					});
				}
			}

		function checkUnit(){
				//~ var isOld = '$isOld';
				//alert(isOld);

				var Billing_customer_id = $('#quote_quote_accountsaccounts_ida').val();
				if( Billing_customer_id != '' &&  $('#billing_address_c').val() == '' ){
			    $.ajax({
					    url:'customAjax.php',
						async:false,
						type:'GET',
						data: {Billing_customer_id:Billing_customer_id},
						success:function(data) {
						//	alert(data);
							jsonobj = jQuery.parseJSON(data);
							$('#billing_address_c').val(jsonobj.billing_address_street);
							$('#billing_address_city_c').val(jsonobj.billing_address_city);
							$('#billing_address_state_c').val(jsonobj.billing_address_state);
						    $('#billing_address_postalcode_c').val(jsonobj.billing_address_postalcode);
							$('#billing_address_country_c').val(jsonobj.billing_address_country);
							$('#shipping_address_c').val(jsonobj.shipping_address_street);
							$('#shipping_address_city_c').val(jsonobj.shipping_address_city);
							$('#shipping_address_state_c').val(jsonobj.shipping_address_state);
						    $('#shipping_address_postalcode_c').val(jsonobj.shipping_address_postalcode);
							$('#shipping_address_country_c').val(jsonobj.shipping_address_country);
							$('#accounts_quote_quote_1_name').val(jsonobj.name);
							$('#accounts_quote_quote_1accounts_ida').val(jsonobj.cust_id);
							//~ if( !isOld ){
								//~ $('#accounts_quote_quote_1_name').val(jsonobj.name);
								//~ $('#accounts_quote_quote_1accounts_ida').val(jsonobj.cust_id);
							//~ }

						}

					});
				}
				fetchOpp();
				copyAddressRight();
			}

		function checkUnit1(){
				var shipping_customer_id = $('#accounts_quote_quote_1accounts_ida').val();
				console.log(shipping_customer_id);
				console.log($('#shipping_checkbox').is(':checked'));
				if( $('#shipping_checkbox').is(":checked") ){
					if(shipping_customer_id != ''){
					$.ajax({
							url:'customAjax.php',
							async:false,
							type:'GET',
							data: {shipping_customer_id:shipping_customer_id},
							success:function(data) {
							//	alert(data);
								jsonobj = jQuery.parseJSON(data);
								$('#shipping_address_c').val(jsonobj.shipping_address_street);
								$('#shipping_address_city_c').val(jsonobj.shipping_address_city);
								$('#shipping_address_state_c').val(jsonobj.shipping_address_state);
								$('#shipping_address_postalcode_c').val(jsonobj.shipping_address_postalcode);
								$('#shipping_address_country_c').val(jsonobj.shipping_address_country);
							}

						});
					}
				}
			}

	checkUnit();
	checkUnit1();
</script>
EOC;

// Checked the 	Checked box of the address field

        $check = <<< EOK
<script>
$(document).ready(function(){
	$('#old_pli_c_label').parent().hide();
	$('#copy_address_c_label').parent().hide();
	//~ $('#copy_address_c,#copy_address_c_label').hide();
var check_val = '$check_val';

if(check_val == 1){
$('#shipping_checkbox').attr('checked', 'checked');
}else{
}


if($('#shipping_checkbox').is(':checked')){
	$('#copy_address_c,').val(1);
	}

	makeShippingReadOnly();

	$('#shipping_checkbox').click(function(){
		makeShippingReadOnly();
	});
});

	function makeShippingReadOnly(){
		if($('#shipping_checkbox:checkbox').not(':checked')){
			$('#copy_address_c').val(0);
			$('#shipping_address_c').attr('readonly', false);
			$('#shipping_address_city_c').attr('readonly', false);
			$('#shipping_address_state_c').attr('readonly', false);
			$('#shipping_address_postalcode_c').attr('readonly', false);
			$('#shipping_address_country_c').attr('readonly', false);
		}

		if($('#shipping_checkbox').is(':checked')){
			$('#copy_address_c').val(1);
			$('#shipping_address_c').attr('readonly', true);
			$('#shipping_address_city_c').attr('readonly', true);
			$('#shipping_address_state_c').attr('readonly', true);
			$('#shipping_address_postalcode_c').attr('readonly', true);
			$('#shipping_address_country_c').attr('readonly', true);
		}
	}

</script>
EOK;

        /**
         * When customer is selected, Opp search should show Opp related to selected customer and
         * When Opportunity is selected then Customer should show the Opportunity related Customer only
         *
         * -Amit Sabal  Date: 25th Aug 2014
         */
        echo $fetchOpp = <<<FUI
            <script>

				//var acc_name = encodeURIComponent(document.getElementById("quote_quote_accounts_name").value);
				$('#quote_quote_opportunities_name').prop('readonly',true);
				c_name  = $.trim($('#quote_quote_accounts_name').val());
				c_id = $.trim($('#quote_quote_accountsaccounts_ida').val());
				c_id=encodeURIComponent(c_id);

				o_name  = $.trim($('#quote_quote_opportunities_name').val());
				o_id 	= $.trim($('#quote_quote_opportunitiesopportunities_ida').val());
				o_id	= encodeURIComponent(o_id);

				function fetchOpp() {

					c_name  = $.trim($('#quote_quote_accounts_name').val());
					c_id = $.trim($('#quote_quote_accountsaccounts_ida').val());
					c_id=encodeURIComponent(c_id);
				}

				var account_name='';
				function fetchCust() {

					o_name  = $.trim($('#quote_quote_opportunities_name').val());
					o_id 	= $.trim($('#quote_quote_opportunitiesopportunities_ida').val());
					o_id	= encodeURIComponent(o_id);

					var url_to_call='getOppName.php';

					$.ajax(
					{

						type: "GET",
						async: false,
						url: url_to_call,
						data:
						{
							Opp_id: o_id,

						},	//parameters
						success: function(resp)
						{
							response=resp;

							response_array = response.split("/");
							acc_id = response_array[0];
							acc_name = response_array[1];
						}
					});
						account_name =	acc_name;
				}

            </script>
FUI;

        $js4 = <<< EOD
			<script type='text/javascript' src='cache/include/javascript/sugar_grp_yui_widgets.js'></script>
			<script>
			function checkOppAcc()
			{
				//alert('hi');
				c_name  = $.trim($('#quote_quote_accounts_name').val());
				c_id    = $.trim($('#quote_quote_accountsaccounts_ida').val());
				c_id	= encodeURIComponent(c_id);
				//alert(c_id);

				o_name  = $.trim($('#quote_quote_opportunities_name').val());
				o_id 	= $.trim($('#quote_quote_opportunitiesopportunities_ida').val());
				o_id	= encodeURIComponent(o_id);
				//alert(o_id);

				url1 = 'MatchCustomer_Opp.php';
				$.ajax(
				{
					type: "GET",
					async: false,
					url: url1,
					data:
					{
						Opp_id: o_id,
						Cust_id: c_id,

					},	//parameters
					success: function(resp)
					{
						//response=resp;
						 response = $.trim(resp);
					}
				});
				//alert(response);
				if(response != 'Success'){
					YAHOO.SUGAR.MessageBox.show({msg: 'Customer and Opportunity at not related..!! Please check', title: 'Alert'});
					return false ;
				}else{
					//alert("Success");
					return true;
				}
			}

			</script>
EOD;
// written by pratik and anjali on 15/07/2019 start
echo $SQMBOX = <<<SQMB
            <script>
			$(document).ready(function()
			{
				
			  //var k = 1;var  n= 1;
			  //var map = new Map();
			  //var map1 = new Map();
               
              /*  $('#QuotesLineTable_1 input[type="number"]').each(function()
				{
					
					var id = $(this).attr('id');//getting the id of textfield in group form.
					//console.log(id);
					var res = id.split("_");
					var res3 = res[0]+"_"+res[1]+"_"+res[2];
					//console.log(res3);
					if(res3 == 'sqm_box_1')
					{
							var sqmboxid = 'sqm_box_1_'+k;
							var prod_idd = $('#'+'product_1_'+k+'_id').val();
							var quantityid = 'quantity_1_'+k;
							//console.log(sqmboxid);
							//console.log(prod_idd);
							//sqmvalues[sqmboxid]=prod_idd;
							map.set(sqmboxid, prod_idd);
							map1.set(sqmboxid, quantityid);
							
						k++;
					}
					if(res3 == 'sqm_box_2')
					{
						    var sqmboxid = 'sqm_box_2_'+n;
							var prod_idd = $('#'+'product_2_'+n+'_id').val();
							var quantityid = 'quantity_2_'+n;
							//console.log(sqmboxid);
							//console.log(prod_idd);
							//sqmvalues[sqmboxid]=prod_idd;
							map.set(sqmboxid, prod_idd);
							map1.set(sqmboxid, quantityid);
							$('#EditView input[type="number"]').on("keyup", function() 
							{
								
								 var id = $(this).attr('id');//getting the id of textfield in group form.
								 console.log(id);
								 var res = id.split("_");
								 var res3 = res[0]+"_"+res[1];
								 
							 
							});
						n++;
					}
					
				}); */
				//console.log(map1);
				//console.log(map);
				//console.log(map.get('sqm_box_2_1'));
				//console.log(map.get('id'));
			     //$('[id^=sqm_box]').each(function(){
				  //console.log('ffffff');
				var values1 = [];
				  $(document).on("keyup mouseup",'.SQMBOX', function(e) 
							{
								var key = (e.keyCode ? e.keyCode : e.which);
								if(key==1)
								{
									values1 = [];
								}
								
								 var sqm_curr_id = $(this).attr('id');//getting the id of textfield in group form.
								var res = sqm_curr_id.split("_");
								var res3 = res[0]+"_"+res[1]+"_"+res[2];
								if(res3 == 'sqm_box_1')
								{
									var q_idd = 'quantity_1_'+res[3];
									var q_valll = $('#'+q_idd).val();
									values1.push(q_valll);
									
										
									var sqm_box_val  = $('#'+'sqm_box_1_'+res[3]).val();
									if(sqm_box_val.length==0)
									{
										
										var q_id = 'quantity_1_'+res[3];
										$('#'+q_id).val(values1[0]);
										values1 = [];
									}
									var product_ID = $('#'+'product_1_'+res[3]+'_id').val();
								  
								}
								if(res3 == 'sqm_box_2')
								{
									var q_idd = 'quantity_2_'+res[3];
									var q_valll = $('#'+q_idd).val();
									values1.push(q_valll);
									
									var sqm_box_val  = $('#'+'sqm_box_2_'+res[3]).val();
								
									if(sqm_box_val.length==0)
									{
										var q_id = 'quantity_2_'+res[3];
										$('#'+q_id).val(values1[0]);
										values1 = [];
									}
									var product_ID = $('#'+'product_2_'+res[3]+'_id').val();
								   
								
								}
								 
								 $.ajax({

											url: 'customAjax.php',
											type: 'GET',
											asyn: false,
											data: {sqm_box_id:sqm_curr_id,prod_ID:product_ID,sqm_box_val:sqm_box_val},
											success: function (result) 
											{
												//alert(result);
												if(result.trim()!='')
												{
													var resObj6 = jQuery.parseJSON(result);
													var sqmboxid = resObj6.sqm_box_id;
													var quantity = resObj6.quantity;
													var ress = sqmboxid.split("_");
													var res4 = ress[0]+"_"+ress[1]+"_"+ress[2];
													if(quantity!=0)
													{
														if(res4 == 'sqm_box_1')
														{
															
														  $('#'+'quantity_1_'+ress[3]).val(quantity);
															
														}
														if(res4 == 'sqm_box_2')
														{
															$('#'+'quantity_2_'+ress[3]).val(quantity);
														}
													}
												}
												
													
													
												
												
											}
								});
								// console.log(id);
								 //console.log(map.get(id));
								 //var res = id.split("_");
								 //var res3 = res[0]+"_"+res[1];
								 
							  
							});
			  //});
				 
			}); 

			
			</script>
SQMB;
// end of functionality written by pratik and anjali

// written by pratik on 09082019 Start

echo $add_terms_cond = <<<ATC
            <script>
			$(document).ready(function()
			{
				
				$("#branch_c").change(function() 
				{ 
						var state_name = $( "#branch_c option:selected" ).text();
						//var txt = $.trim($('#terms_conditions').text());
						
						if(state_name == 'Mumbai')
						{
							addstring = ` 

15.Company Bank Details for NEFT/RTGS: 
Company Name: Classic Floorings & Interiors Pvt. Ltd.
Bank Name: ICICI BANK Ltd, 
Branch : 11/12,RAGHUVNASHI MENSION,SENPATI BAPAT MARG LOWER PAREL (w) MUMBAI-400013, 
A/c number: 698551200001, 
IFSC Code:ICIC0006985`
							change_terms_conditions(addstring);
						}
						 
						 if(state_name == 'Bangalore1')
						{
							addstring = ` 

15.Company Bank Details for NEFT/RTGS:
Company Name: Classic Floorings & Interiors Pvt. Ltd.
Bank Name: ICICI BANK Ltd,
Branch : KORAMANGALA BANGALORE BRANCH, ICICI BANK LTD., NO 584, 80 FT ROAD, OPP. BETHANY HIGH, KORAMANGALA 8TH BLOCK, 560034, 
A/c number: 004705010370, 
IFSC Code:ICIC0000047`
							change_terms_conditions(addstring);
						}
						
						if(state_name == 'Chennai')
						{
							addstring = ` 

15.Company Bank Details for NEFT/RTGS:
Company Name: Classic Floorings & Interiors Pvt. Ltd.
Bank Name: ICICI BANK Ltd,
Branch : EGMORE BRANCH, 20 EGMORE HIGH ROAD 600008, 
A/c number: 603605019180,
IFSC Code: ICIC0006036`
							change_terms_conditions(addstring);
						}
						
						if(state_name == 'Kerala')
						{
							addstring = ` 

15.Company Bank Details for NEFT/RTGS:
Company Name: Classic Floorings & Interiors Pvt. Ltd.
Bank Name: ICICI BANK Ltd,
Branch : 8510-32/7G, CHAKRAMPILLY,2ND FLR, ESTATE, NH BYPASS,PALARIVATTOM ERNAKULAM KERALA - INDIA - 682032, 
A/c number: 626405019360, 
IFSC Code: ICIC0006264`
							change_terms_conditions(addstring);
						}
						
						if(state_name == 'Kolkata')
						{
							addstring = ` 

15.Company Bank Details for NEFT/RTGS:
Company Name: Classic Floorings & Interiors Pvt. Ltd.
Bank Name: ICICI BANK Ltd,
Branch : BHOWANIPORE ,CALCUTTA BRANCH, ELGIN APARTMENT, 1A, ASHUTOSH MUKHERJEE ROAD, BHOWANIPORE - 700001, 
A/c number: 627505027279, 
IFSC Code: ICIC0006275`
							change_terms_conditions(addstring);
						}
						
						if(state_name == 'Delhi')
						{
							addstring = ` 

15.Company Bank Details for NEFT/RTGS:
Company Name: Classic Floorings & Interiors Pvt. Ltd.
Bank Name: ICICI BANK Ltd,
Branch : NEW DELHI - MALVIYA NAGAR BRANCH, C-32, MALVIYA NAGAR 110017, 
A/c number: 113605000328, 
IFSC Code: ICIC0001136`
							change_terms_conditions(addstring);
						}
						
						if(state_name == 'Hyderabad')
						{
							addstring = ` 

15.Company Bank Details for NEFT/RTGS:
Company Name: Classic Floorings & Interiors Pvt. Ltd.
Bank Name: ICICI BANK Ltd,
Branch : PANJAGUTTA BRANCH, 4TH NERELLA HOUSE, PANJAGUTTA, 500034, 
A/c number: 020205003732, 
IFSC Code: ICIC0000202`
							change_terms_conditions(addstring);
						}
						
						if(state_name == 'Pune')
						{
							addstring = ` 

15.Company Bank Details for NEFT/RTGS:
Company Name: Classic Floorings & Interiors Pvt. Ltd.
Bank Name: ICICI BANK Ltd,
Branch : 11/12,RAGHUVNASHI MENSION,SENPATI BAPAT MARG LOWER PAREL (w) MUMBAI-400013, 
A/c number: 698551200001, 
IFSC Code: ICIC0006985`
							change_terms_conditions(addstring);
						}
						
						if(state_name == 'goa')
						{
							addstring = ` 

15.Company Bank Details for NEFT/RTGS:
Company Name: Classic Floorings & Interiors Pvt. Ltd.
Bank Name: ICICI BANK Ltd,
Branch : 11/12,RAGHUVNASHI MENSION,SENPATI BAPAT MARG LOWER PAREL (w) MUMBAI-400013, 
A/c number: 698551200001, 
IFSC Code: ICIC0006985`
							change_terms_conditions(addstring);
						}
						
						if(state_name == 'Gujarat')
						{
							addstring = ` 

15.Company Bank Details for NEFT/RTGS:
Company Name: Classic Floorings & Interiors Pvt. Ltd.
Bank Name: ICICI BANK Ltd,
Branch : 11/12,RAGHUVNASHI MENSION,SENPATI BAPAT MARG LOWER PAREL (w) MUMBAI-400013, 
A/c number: 698551200001, 
IFSC Code: ICIC0006985`
							change_terms_conditions(addstring);
						}
						
						if(state_name == 'Gurgaon')
						{
							addstring = ` 

15.Company Bank Details for NEFT/RTGS:
Company Name: Classic Floorings & Interiors Pvt. Ltd.
Bank Name: ICICI BANK Ltd,
Bank Name : ICICI BANK, Branch : NEW DELHI - MALVIYA NAGAR BRANCH, C-32, MALVIYA NAGAR 110017, 
A/c number: 113605000328, 
IFSC Code: ICIC0001136`
							change_terms_conditions(addstring);
						}
						
						if(state_name == 'NOIDA')
						{
							addstring = ` 

15.Company Bank Details for NEFT/RTGS:
Company Name: Classic Floorings & Interiors Pvt. Ltd.
Bank Name: ICICI BANK Ltd,
Bank Name : ICICI BANK, Branch : NEW DELHI - MALVIYA NAGAR BRANCH, C-32, MALVIYA NAGAR 110017, 
A/c number: 113605000328, 
IFSC Code: ICIC0001136`
							change_terms_conditions(addstring);
						}
						
						
						
				 
				});
	
			}); 
			
			function change_terms_conditions(addstring) 
			{ 
				multilineString =  
                ` 1. Goods once sold will not be taken back  or exchanged
				  
2. The Vendor has the lien on the goods  supplied under this bill until the  payment of the bill is received.This is the heading.

3. Please Pay by cheque / DD only in favour of 'CLASSIC FLOORING'S & INTERIORS PVT. LTD.'

4. 100% Advance against P.O

5. Wastage: Wastage if any, will be extra to client's account. . We would keep all debris outside the room installed .

6. Sub Floor: Should be absolutely dry, zero level absolutely moisture free.  

7. Flooring's will be delivered in original packing. We sell by flooring by Boxes, rolls & Strips only.  

8. All disputes are subject to Mumbai Jurisdiction.  

9. Please refer our 'General Terms & Conditions' of sales for all detailed conditions.  

10. Goods would be delivered on the Ground Floor. Any loading/ unloading to subsequent floors would cost extra and as 	applicable. 

11.  All changes under GST Will be extra and as applicable. 

12. We would need your PAN no and GST no as applicable as per Government of India norms.  

13. Water and Power would be provided free of cost on site for self leveling and for vinyl welding as needed.  

14. Post installation we will shift the debris outside as per customer instruction. Any additional house keeping would need to be done by the customer.`
	
addstring1 = ` 

For Classic Flooring & Interiors Pvt. Ltd.

Authorized Signatory`
				$('#terms_conditions').html(multilineString + addstring + addstring1);
			} 
			</script>
ATC;
// written by pratik on 09082019 End

// written by pratik on 05082019 start (Kerala 1% cess code)
echo $Cess = <<<CES
            <script>
			$(document).ready(function()
			{
				
				 var state_name1 = $( "#branch_c option:selected" ).text();
				if($("#unregistered_user_c").prop('checked') == true && state_name1 == 'Kerala')
				{
							
							if($("#LBL_EDITVIEW_PANEL13").length != 0)
							{
								$('#LBL_EDITVIEW_PANEL13 tr:nth-child(6)').show();
							}
							
							
				}else{

								if($("#LBL_EDITVIEW_PANEL13").length != 0)
								{
									$('#LBL_EDITVIEW_PANEL13 tr:nth-child(6)').hide();
								}
											
						}
			}); 
</script>
CES;
// written by pratik on 05082019 end (Kerala 1% cess code)
        # End -Amit Sabal

        parent::display();

        echo $AccChange;
        echo $check;
        $isOld = $this->bean->fetched_row;
        if ($isOld) {
            echo $js;
        }
        //echo $js3;
        echo $js4;
    }

}
