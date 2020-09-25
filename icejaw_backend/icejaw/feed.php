<?php
include 'php_config.php';
chdir($icejaw['home_dir']);
 require_once('global.php');



if(isset($_GET['message'])){

$message = $_GET['message'].$icejaw['message_suffix'];
$username = $_GET['user'];
$hash = $_GET['hash'];
$t = time();




$vbulletin->userinfo = $vbulletin->db->query_first("SELECT userid, usergroupid, membergroupids, infractiongroupids, username, password, salt FROM " . TABLE_PREFIX . "user WHERE username = '" . $vbulletin->db->escape_string(htmlspecialchars_uni($username)) . "'");



if($hash == $vbulletin->userinfo['password']){
$id = $vbulletin->userinfo['userid'];
$vbulletin->db->query("INSERT INTO " . TABLE_PREFIX . "infernoshout (`sid`, `s_user`, `s_time`, `s_shout`, `s_me`, `s_private`) VALUES (NULL, '{$id}', '{$t}' , '{$message}' , '0', '-1')");

}




}



echo '<table>';
$result = $db->query_read("SELECT * FROM" . TABLE_PREFIX . " infernoshout INNER JOIN user ON user.userid=infernoshout.s_user ORDER BY infernoshout.sid DESC LIMIT {$icejaw['shouts']}");
			while($row = mysql_fetch_array($result))
{

        echo '<tr>';
	echo '<td align="right" style="border-right: 1px solid #000">'.fetch_musername($row).'</td>';
        echo '<td>'.$row['s_shout'].'</td>';
        echo '</tr>';
	
}
echo '</table>';
 
?>