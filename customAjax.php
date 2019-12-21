<?php

if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');

error_reporting(0);
ini_set('display_errors',0);

if($_REQUEST['Billing_customer_id'])  {
	global $db;
	$customer_id =$_GET['Billing_customer_id'];


	 $query1="	SELECT name ,billing_address_street , billing_address_city,billing_address_state,billing_address_postalcode,billing_address_country,shipping_address_street,shipping_address_city,shipping_address_state,shipping_address_postalcode,shipping_address_country
	  From accounts WHERE id='".$customer_id."' and deleted=0 ";
	$des=$db->query($query1);
	$row=$db->fetchByAssoc($des);
	$billing_address_street = $row['billing_address_street'];
	$billing_address_postalcode = $row['billing_address_postalcode'];
	$billing_address_country = $row['billing_address_country'];
	$billing_address_state = $row['billing_address_state'];
	$billing_address_city = $row['billing_address_city'];
$shipping_address_street = $row['shipping_address_street'];
	$shipping_address_city = $row['shipping_address_city'];
	$shipping_address_state = $row['shipping_address_state'];
	$shipping_address_postalcode = $row['shipping_address_postalcode'];
	$shipping_address_country = $row['shipping_address_country'];

	$cust_id = $customer_id;
	$name = $row['name'];

	$data = array();
	$data['cust_id']       = $cust_id;
	$data['name']          = $name;

	$data['billing_address_street']       = $billing_address_street;
	$data['billing_address_postalcode']       = $billing_address_postalcode;
	$data['billing_address_country']       = $billing_address_country;
	$data['billing_address_state']       = $billing_address_state;
	$data['billing_address_city']       = $billing_address_city;
	$data['shipping_address_street']       = $shipping_address_street;
	$data['shipping_address_postalcode']       = $shipping_address_postalcode;
	$data['shipping_address_country']       = $shipping_address_country;
	$data['shipping_address_state']       = $shipping_address_state;
	$data['shipping_address_city']       = $shipping_address_city;
	echo json_encode($data);
}

if($_REQUEST['shipping_customer_id'])  {
	global $db;
	$customer_id =$_GET['shipping_customer_id'];

	 $query1="	SELECT name ,shipping_address_street , shipping_address_city,shipping_address_state,shipping_address_postalcode,shipping_address_country
	  From accounts WHERE id='".$customer_id."' and deleted=0 ";
	$des=$db->query($query1);
	$row=$db->fetchByAssoc($des);
	$shipping_address_street = $row['shipping_address_street'];
	$shipping_address_city = $row['shipping_address_city'];
	$shipping_address_state = $row['shipping_address_state'];
	$shipping_address_postalcode = $row['shipping_address_postalcode'];
	$shipping_address_country = $row['shipping_address_country'];


	$data1 = array();

	$data1['shipping_address_street']       = $shipping_address_street;
	$data1['shipping_address_city']       = $shipping_address_city;
	$data1['shipping_address_state']       = $shipping_address_state;
	$data1['shipping_address_postalcode']       = $shipping_address_postalcode;
	$data1['shipping_address_country']       = $shipping_address_country;

	echo json_encode($data1);
}
if($_REQUEST['product_id']){
// global $db;
// 	$product_id =$_GET['product_id'];

// 	 $query2="	SELECT tax_class_c,uom_c,type_c,hsn_code_c,sac_code_c,gst_c From
// 				quote_products,quote_products_cstm
// 				WHERE id=id_c
// 				AND id='".$product_id."'
// 				AND deleted=0 ";
// 	$des2=$db->query($query2);
// 	$row2=$db->fetchByAssoc($des2);
// 	$tax_class = $row2['tax_class_c'];
// 	$uom = $row2['uom_c'];
// 	$type = $row2['type_c'];
// 	$hsn_code = $row2['hsn_code_c'];
// 	$sac_code = $row2['sac_code_c'];
// 	$gst = $row2['gst_c'];
// 	$data =array();
// 	$data['tax_class'] = $tax_class;
// 	$data['uom']       = $uom;
// 	$data['type']       = $type;
// 	$data['hsn_code_c']       = $hsn_code;
// 	$data['sac_code_c']       = $sac_code;
// 	$data['gst_c'] = $gst;

// 	echo json_encode($data);
// }
global $db;
	$product_id =$_GET['product_id'];
	$branch = $_GET['branch'];
	 $query2="	SELECT * From
				quote_products,quote_products_cstm
				WHERE id=id_c
				AND id='".$product_id."'
				AND deleted=0 ";
	$des2=$db->query($query2);
	$row2=$db->fetchByAssoc($des2);
	$tax_class = $row2['tax_class_c'];
	$uom = $row2['uom_c'];
	$type = $row2['type_c'];
	$hsn_code = $row2['hsn_code_c'];
	$sac_code = $row2['sac_code_c'];
	$gst = $row2['gst_c'];
	$unit_price = $row2['unit_price_c'];
	$bangalore_unit_price = $row2['bangalore_unit_price_c'];
	$chennai_unit_price = $row2['chennai_unit_price_c'];
	$kerala_unit_price = $row2['kerala_unit_price_c'];
	$kolkata_unit_price = $row2['kolkata_unit_price_c'];
	$delhi_unit_price = $row2['delhi_unit_price_c'];
	$hyderabad_unit_price = $row2['hyderabad_unit_price_c'];
	$mumbai_unit_price = $row2['mumbai_unit_price_c'];
	$pune_unit_price = $row2['pune_unit_price_c'];
	$goa_unit_price = $row2['goa_unit_price_c'];
	$gujarat_unit_price = $row2['gujarat_unit_price_c'];
	$haryana_unit_price = $row2['haryana_unit_price_c'];
	$up_unit_price = $row2['up_unit_price_c'];
	if($branch =='Bangalore')
	{
		if($bangalore_unit_price!='')
		{
			$unit_price = $bangalore_unit_price;
		}
		else
		{
			$unit_price = $unit_price;
		}
	}
	else if($branch =='Chennai')
	{
		if($chennai_unit_price !='')
		{
			$unit_price = $chennai_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Kerala')
	{
		if($kerala_unit_price !='')
		{
			$unit_price = $kerala_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Kolkata')
	{
		if($kolkata_unit_price !='')
		{
			$unit_price = $kolkata_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Delhi')
	{
		if($delhi_unit_price !='')
		{
			$unit_price = $delhi_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Hyderabad')
	{
		if($hyderabad_unit_price !='')
		{
			$unit_price = $hyderabad_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Mumbai')
	{
		if($mumbai_unit_price !='')
		{
			$unit_price = $mumbai_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Pune')
	{
		if($pune_unit_price !='')
		{
			$unit_price = $pune_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Pune')
	{
		if($pune_unit_price !='')
		{
			$unit_price = $pune_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='goa')
	{
		if($goa_unit_price !='')
		{
			$unit_price = $goa_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Gujarat')
	{
		if($gujarat_unit_price !='')
		{
			$unit_price = $gujarat_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='Gurgaon')
	{
		if($harayana_unit_price !='')
		{
			$unit_price = $harayana_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	else if($branch =='NOIDA')
	{
		if($up_unit_price !='')
		{
			$unit_price = $up_unit_price;
		}
		else
		{
			$unit_price  = $unit_price;
		}
	}
	$data =array();
	$data['tax_class'] = $tax_class;
	$data['uom']       = $uom;
	$data['type']       = $type;
	$data['hsn_code_c']       = $hsn_code;
	$data['sac_code_c']       = $sac_code;
	$data['gst_c'] = $gst;
	$data['unit_price_c'] =$unit_price;

	echo json_encode($data);
}
//written by pratik and anjali on 09072019 start
if($_REQUEST['sqm_box_id'] && $_REQUEST['prod_ID'] && $_REQUEST['sqm_box_val'])
{
	global $db; $data = array();
	//echo json_encode(array($_REQUEST['sqm_box_id'],$_REQUEST['prod_ID'],$_REQUEST['sqm_box_val']));
	//exit;
	 if(isset($_REQUEST['sqm_box_id']) && isset($_REQUEST['prod_ID']) && isset($_REQUEST['sqm_box_val']))
	 {
		 $query1 = "SELECT `sqm_value_c` FROM `quote_products_cstm` WHERE `id_c`='".$_REQUEST['prod_ID']."' and uom_c='SQM'";
		 $sqmbox = $db->query($query1);
		 $row = $db->fetchByAssoc($sqmbox);
		 $sqmboxsize = $row['sqm_value_c'];
		 //$data['quantity'] = ($sqmboxsize !=0)?number_format(($_REQUEST['sqm_box_val'] / $sqmboxsize), 2, '.', ''):number_format(0.00, 2, '.', '');
		 $data['quantity'] = ($sqmboxsize !=0)?number_format((ceil($_REQUEST['sqm_box_val'] / $sqmboxsize) * $sqmboxsize), 3, '.', ''):number_format(0.00, 2, '.', '');
		 $data['sqm_box_id'] = $_REQUEST['sqm_box_id'];
		 echo json_encode($data);
		 
	 }
	
	
	
}

//Written by: Anjali and Pratik dated pn:18072019 to reset upload file field start (PO Column option - opportunity module)
if($_REQUEST['oppid'])
{

	global $db; $data = array();
	//echo json_encode(array($_REQUEST['sqm_box_id'],$_REQUEST['prod_ID'],$_REQUEST['sqm_box_val']));
	//exit;
	//print_r($_REQUEST['oppid']);exit;
	 if(isset($_REQUEST['oppid']))
	 {
	 	$query1 = "select `filename`,`file_mime_type` from opportunities WHERE `id`='".$_REQUEST['oppid']."'";
	 	$oppid1 = $db->query($query1);
		$row = $db->fetchByAssoc($oppid1);

		if($row['filename']!='' && $row['file_mime_type']!='')
		{
			 $query2 = "UPDATE `opportunities` SET `filename`='' ,`file_mime_type`='' WHERE id='".$_REQUEST['oppid']."'";
			 $result = $db->query($query2);
			 if ($result)
			 {
			 	$data['success'] = 'true';
			 	
			 }
		}
		 
		 
	 }
	 echo json_encode($data);

}
	
//Written by: Anjali and Pratik dated pn:18072019 to reset upload file field end (PO Column option - opportunity module)

//Written by: Anjali and Pratik dated pn:18072019 to reset upload file field start (PO Column option - opportunity module)
if($_REQUEST['opptuid'])
{

	global $db; $data = array();
	//echo json_encode(array($_REQUEST['sqm_box_id'],$_REQUEST['prod_ID'],$_REQUEST['sqm_box_val']));
	//exit;
	//print_r($_REQUEST['oppid']);exit;
	 if(isset($_REQUEST['opptuid']))
	 {
	 	$query1 = "select `filename`,`file_mime_type` from opportunities WHERE `id`='".$_REQUEST['opptuid']."'";
	 	$oppid1 = $db->query($query1);
		$row = $db->fetchByAssoc($oppid1);

		if($row['filename']!='' && $row['file_mime_type']!='')
		{
			 
			 	$data['success'] = 'not_blank';
			 	
			 
		}else{
			
			$data['success'] = 'blank';
		 
		 
			}
	 }
	 echo json_encode($data);

}
	
//Written by: Anjali and Pratik dated pn:18072019 to reset upload file field end (PO Column option - opportunity module)

?>
