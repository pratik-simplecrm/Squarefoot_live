
{if strval($fields.educational_institution.value) == "1" || strval($fields.educational_institution.value) == "yes" || strval($fields.educational_institution.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.educational_institution.name}" value="0"> 
<input type="checkbox" id="{$fields.educational_institution.name}" 
name="{$fields.educational_institution.name}" 
value="1" title='' tabindex="1" {$checked} >