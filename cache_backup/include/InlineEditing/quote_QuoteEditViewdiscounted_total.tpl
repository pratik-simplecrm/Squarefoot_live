
{if strlen($fields.discounted_total.value) <= 0}
{assign var="value" value=$fields.discounted_total.default_value }
{else}
{assign var="value" value=$fields.discounted_total.value }
{/if}  
<input type='text' name='{$fields.discounted_total.name}' 
id='{$fields.discounted_total.name}' size='30' maxlength='26' value='{sugar_number_format var=$value}' title='' tabindex='1'
 >