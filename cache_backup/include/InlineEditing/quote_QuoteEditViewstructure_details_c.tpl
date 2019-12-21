
{if strlen($fields.structure_details_c.value) <= 0}
{assign var="value" value=$fields.structure_details_c.default_value }
{else}
{assign var="value" value=$fields.structure_details_c.value }
{/if}  
<input type='text' name='{$fields.structure_details_c.name}'
id='{$fields.structure_details_c.name}'
size='30'
maxlength='18'value='{sugar_number_format var=$value  }'
title=''
tabindex='1'
 
>