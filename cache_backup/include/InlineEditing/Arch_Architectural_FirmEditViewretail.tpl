
{if strval($fields.retail.value) == "1" || strval($fields.retail.value) == "yes" || strval($fields.retail.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.retail.name}" value="0"> 
<input type="checkbox" id="{$fields.retail.name}" 
name="{$fields.retail.name}" 
value="1" title='' tabindex="1" {$checked} >