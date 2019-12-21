
{if strval($fields.residential.value) == "1" || strval($fields.residential.value) == "yes" || strval($fields.residential.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.residential.name}" value="0"> 
<input type="checkbox" id="{$fields.residential.name}" 
name="{$fields.residential.name}" 
value="1" title='' tabindex="1" {$checked} >