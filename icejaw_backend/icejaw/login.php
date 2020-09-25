<?php
chdir("/home/hackalli/public_html/");
require_once('global.php');
$username = $_GET['username'];
$pass = $_GET['password'];


	$username = strip_blank_ascii($username, ' ');
if ($vbulletin->userinfo = $vbulletin->db->query_first("SELECT userid, usergroupid, membergroupids, infractiongroupids, username, password, salt FROM " . TABLE_PREFIX . "user WHERE username = '" . $vbulletin->db->escape_string(htmlspecialchars_uni($username)) . "'"))
	{
		
if( md5(md5($pass).$vbulletin->userinfo['salt']) ==  $vbulletin->userinfo['password']){
echo 'true';
echo "\n".$vbulletin->userinfo['password'];
}else{
echo 'false';


}


}else{
echo 'false';

}
?>