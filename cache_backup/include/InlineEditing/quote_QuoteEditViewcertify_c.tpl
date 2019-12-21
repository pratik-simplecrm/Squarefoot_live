
{if empty($fields.certify_c.value)}
{assign var="value" value=$fields.certify_c.default_value }
{else}
{assign var="value" value=$fields.certify_c.value }
{/if}  




<textarea  id='{$fields.certify_c.name}' name='{$fields.certify_c.name}'
rows="2" 
cols="32" 
title='' tabindex="1" 
 >{$value}</textarea>


