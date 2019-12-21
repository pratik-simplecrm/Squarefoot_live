
{if strlen($fields.purchase_order_number_c.value) <= 0}
{assign var="value" value=$fields.purchase_order_number_c.default_value }
{else}
{assign var="value" value=$fields.purchase_order_number_c.value }
{/if}  
<input type='text' name='{$fields.purchase_order_number_c.name}' 
    id='{$fields.purchase_order_number_c.name}' size='30' 
    maxlength='255' 
    value='{$value}' title=''  tabindex='1'      >