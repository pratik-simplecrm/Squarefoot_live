
{if strlen($fields.sub_total.value) <= 0}
{assign var="value" value=$fields.sub_total.default_value }
{else}
{assign var="value" value=$fields.sub_total.value }
{/if}  
<input type='text' name='{$fields.sub_total.name}' 
id='{$fields.sub_total.name}' size='30' maxlength='26' value='{sugar_number_format var=$value}' title='' tabindex='1'
 >