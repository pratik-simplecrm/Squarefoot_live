
{if strval($fields.others.value) == "1" || strval($fields.others.value) == "yes" || strval($fields.others.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.others.name}" value="0"> 
<input type="checkbox" id="{$fields.others.name}" 
name="{$fields.others.name}" 
value="1" title='' tabindex="1" {$checked} >