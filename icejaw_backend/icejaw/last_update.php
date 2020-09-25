<?php

include 'php_config.php';
chdir($icejaw['home_dir']);
require_once('global.php');



$result = $db->query_read("SELECT * FROM" . TABLE_PREFIX . " infernoshout ORDER BY sid DESC LIMIT 1");
while($row = mysql_fetch_array($result))
{
echo $row['sid'];
}
?>