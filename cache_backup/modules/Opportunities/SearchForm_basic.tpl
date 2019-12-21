
<input type='hidden' id="orderByInput" name='orderBy' value=''/>
<input type='hidden' id="sortOrder" name='sortOrder' value=''/>
{if !isset($templateMeta.maxColumnsBasic)}
	{assign var="basicMaxColumns" value=$templateMeta.maxColumns}
{else}
    {assign var="basicMaxColumns" value=$templateMeta.maxColumnsBasic}
{/if}
<script>
{literal}

	$(function() {
	var $dialog = $('<div></div>')
		.html(SUGAR.language.get('app_strings', 'LBL_SEARCH_HELP_TEXT'))
		.dialog({
			autoOpen: false,
			title: SUGAR.language.get('app_strings', 'LBL_HELP'),
			width: 700
		});
		
		$('#filterHelp').click(function() {
		$dialog.dialog('open');
		// prevent the default action, e.g., following a link
	});
	
	});
{/literal}
</script>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
      
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%'">
	
			<label for='name_basic'> {sugar_translate label='LBL_OPPORTUNITY_NAME' module='Opportunities'}
		</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strlen($fields.name_basic.value) <= 0}
{assign var="value" value=$fields.name_basic.default_value }
{else}
{assign var="value" value=$fields.name_basic.value }
{/if}  
<input type='text' name='{$fields.name_basic.name}' 
    id='{$fields.name_basic.name}' size='30' 
    maxlength='50' 
    value='{$value}' title=''      accesskey='9'  >
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%'">
	
		
		<label for='current_user_only_basic' >{sugar_translate label='LBL_CURRENT_USER_FILTER' module='Opportunities'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strval($fields.current_user_only_basic.value) == "1" || strval($fields.current_user_only_basic.value) == "yes" || strval($fields.current_user_only_basic.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.current_user_only_basic.name}" value="0"> 
<input type="checkbox" id="{$fields.current_user_only_basic.name}" 
name="{$fields.current_user_only_basic.name}" 
value="1" title='' tabindex="" {$checked} >
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%'">
	
		
		<label for='open_only_basic' >{sugar_translate label='LBL_OPEN_ITEMS' module='Opportunities'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strval($fields.open_only_basic.value) == "1" || strval($fields.open_only_basic.value) == "yes" || strval($fields.open_only_basic.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.open_only_basic.name}" value="0"> 
<input type="checkbox" id="{$fields.open_only_basic.name}" 
name="{$fields.open_only_basic.name}" 
value="1" title='' tabindex="" {$checked} >
   	   	</td>
    {if $formData|@count >= $basicMaxColumns+1}
    </tr>
    <tr>
	<td colspan="{$searchTableColumnCount}">
    {else}
	<td class="sumbitButtons">
    {/if}
		&nbsp;&nbsp;&nbsp;&nbsp;
        <button tabindex="2" data-toggle="tooltip" data-placement="bottom" title="{$APP.LBL_SEARCH_BUTTON_TITLE}" onclick="SUGAR.savedViews.setChooser();" class="btn btn-outline-primary" type="submit" name="button" id="search_form_submit"/><i class="fa fa-search fa-lg btn-color-new" aria-hidden="true" ></i></button>
	    &nbsp;&nbsp;&nbsp;&nbsp;
	    <button type="button" tabindex='2' data-toggle="tooltip" data-placement="bottom" title='{$APP.LBL_CLEAR_BUTTON_TITLE}' onclick='SUGAR.searchForm.clear_form(this.form); return false;' class='btn btn-outline-primary' type='button' name='clear' id='search_form_clear' value='{$APP.LBL_CLEAR_BUTTON_LABEL}'/><i class="fa fa-times fa-lg btn-color-new
	    " aria-hidden="true" ></i>

</button> 
        {if $HAS_ADVANCED_SEARCH}
        &nbsp;&nbsp;&nbsp;&nbsp;
	    <button type="button" id="advanced_search_link" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="bottom" onclick="SUGAR.searchForm.searchFormSelect('{$module}|advanced_search','{$module}|basic_search')" accesskey="{$APP.LBL_ADV_SEARCH_LNK_KEY}" title="{$APP.LNK_ADVANCED_SEARCH}" ><i class="fa fa-filter fa-lg btn-color-new" aria-hidden="true" ></i>
	    </button>
	    {/if}

		&nbsp;&nbsp;&nbsp;&nbsp;
		<button type="button" onclick="window.open('index.php?module={$module}&action=EditView&return_module={$module}&return_action=DetailView', '_blank');" id="create_link"class="btn btn-outline-primary" data-toggle="tooltip" data-placement="bottom" title="Create">
		<i class="fa fa-plus fa-lg btn-color-new" aria-hidden="true" ></i>
		</button>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<button type="button" onclick="window.location='index.php?module=Import&action=Step1&import_module={$module}&return_module={$module}&return_action=index';" id="" class='btn btn-outline-primary' data-toggle="tooltip" data-placement="bottom" title="Import"> <i class="fa fa-download fa-lg btn-color-new" aria-hidden="true" ></i>
		</button>
		
    </td>
	<td class="helpIcon" width="*"><img alt="Help" border='0' id="filterHelp" src='{sugar_getimagepath file="help-dashlet.gif"}'></td>
	</tr>
</table>
		
{literal}<script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['search_form_modified_by_name_basic']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_basic","modified_user_id_basic"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_created_by_name_basic']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_basic","created_by_basic"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_assigned_user_name_basic']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_basic","assigned_user_id_basic"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_account_name_basic']={"form":"search_form","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["search_form_account_name_basic","account_id_basic"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["account_id"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_campaign_name_basic']={"form":"search_form","method":"query","modules":["Campaigns"],"group":"or","field_list":["name","id"],"populate_list":["campaign_id_basic","campaign_id_basic"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["campaign_id"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_currency_name_basic']={"form":"search_form","method":"query","modules":["Currencies"],"group":"or","field_list":["name","id"],"populate_list":["currency_name_basic","currency_id_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_arch_architects_contacts_opportunities_1_name_basic']={"form":"search_form","method":"query","modules":["Arch_Architects_Contacts"],"group":"or","field_list":["name","id"],"populate_list":["arch_architects_contacts_opportunities_1_name_basic","arch_archi342contacts_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_arch_architectural_firm_opportunities_1_name_basic']={"form":"search_form","method":"query","modules":["Arch_Architectural_Firm"],"group":"or","field_list":["name","id"],"populate_list":["arch_architectural_firm_opportunities_1_name_basic","arch_archi003bal_firm_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>{/literal}