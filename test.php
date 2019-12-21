<?php

global $db;

$query = "update users set reports_to_id = '2fa407e7-2857-057a-b1cf-582af3df3cab' where id = 'a3c5c963-3428-9917-c56c-5cc2c83de299'";

echo $db->query($query);


