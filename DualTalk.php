<?php

###
# This is the path to your installation of DualTalk as
# seen from the web. Change it if required ($wgScriptPath is the
# path to the base directory of your wiki). No final slash.
##
$stScriptPath = $wgScriptPath . '/extensions/DualTalk';
##

###
# This is the path to your installation of DualTalk as
# seen on your local filesystem. Used against some PHP file path
# issues.
##
$stIP = $IP . '/extensions/DualTalk';
##

#Informations
$wgExtensionCredits['parserhook'][] = array(
       'name' => 'DualTalk',
       'author' =>'Steren Giannini and Yaron Koren', 
       'url' => 'http://www.creativecommons.org', 
       'description' => 'Dual Talk page for mediawiki'
       );

//Do st_SetupExtension after the mediawiki setup, AND after SemanticMediaWiki setup
$wgExtensionFunctions[] = 'st_SetupExtension';

//i18n
$wgExtensionMessagesFiles['DualTalk'] = dirname( __FILE__ ) . '/DualTalk.i18n.php';

// ST_Notify_Assignment.php
require_once($stIP . "/DT_DualTalk.php");

?>
