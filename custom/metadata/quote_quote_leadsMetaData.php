<?php
// created: 2014-06-27 10:03:50
$dictionary["quote_quote_leads"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'quote_quote_leads' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
      'lhs_key' => 'id',
      'rhs_module' => 'quote_Quote',
      'rhs_table' => 'quote_quote',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'quote_quote_leads_c',
      'join_key_lhs' => 'quote_quote_leadsleads_ida',
      'join_key_rhs' => 'quote_quote_leadsquote_quote_idb',
    ),
  ),
  'table' => 'quote_quote_leads_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'quote_quote_leadsleads_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'quote_quote_leadsquote_quote_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'quote_quote_leadsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'quote_quote_leads_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'quote_quote_leadsleads_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'quote_quote_leads_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'quote_quote_leadsquote_quote_idb',
      ),
    ),
  ),
);