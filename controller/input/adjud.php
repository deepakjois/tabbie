<?php
/* begin license *
 * 
 *     Tabbie, Debating Tabbing Software
 *     Copyright Contributors
 * 
 *     This file is part of Tabbie
 * 
 *     Tabbie is free software; you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation; either version 2 of the License, or
 *     (at your option) any later version.
 * 
 *     Tabbie is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 * 
 *     You should have received a copy of the GNU General Public License
 *     along with Tabbie; if not, write to the Free Software
 *     Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * 
 * end license */
set_include_path(get_include_path() . PATH_SEPARATOR . "../../");
require_once("includes/backend.php");

assert_options(ASSERT_BAIL, 1);

//Information from the client
$adjud_id = htmlspecialchars(trim($_POST['adjud_id']));
$action = htmlspecialchars(trim($_POST['action']));

if(!($adjud_id && $action)){
	//Error condition: client requested non-existent team.
	header('HTTP/1.1 403 Forbidden');
	echo('Incomplete request ('.$adjud_id.', '.$action.')');
	die();
}

if($action!="ACTIVETOGGLE"){
	//Error condition: client requested non-existent team.
	header('HTTP/1.1 403 Forbidden');
	echo('Action not valid ($action)');
	die();
}

$query="SELECT `adjud_id`, `active` FROM `adjudicator` WHERE `adjud_id` ='$adjud_id'";
$result=mysql_query($query);
if(mysql_num_rows($result)!=1){
	//Adjud_id was not unique: risk working on the wrong adjudicator
	header('HTTP/1.1 403 Forbidden');
	echo('Adjud_id did not specify a unique adjudicator ($adjud_id)');
	die();
}

$adjudicator=mysql_fetch_assoc($result);

if($adjudicator['active']=="Y"){
	$active="N";
}
if($adjudicator['active']=="N"){
	$active="Y";
}

//$active needs to be a valid value before we put it into the DB!
assert("(\"$active\" == \"Y\") || (\"$active\" == \"N\")");

$query = "UPDATE `adjudicator` SET `active` = '$active' WHERE `adjud_id` = $adjud_id";
$result=mysql_query($query);
echo(mysql_error());
echo(mysql_to_xml("SELECT `adjud_id`, `active` FROM `adjudicator` WHERE `adjud_id`='$adjud_id'","adjudicator"));
?>