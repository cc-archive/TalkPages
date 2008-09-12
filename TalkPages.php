<?php

###
# This is the path to your installation of TalkPages as
# seen from the web. Change it if required ($wgScriptPath is the
# path to the base directory of your wiki). No final slash.
##
$stScriptPath = $wgScriptPath . '/extensions/TalkPages';
##

###
# This is the path to your installation of TalkPages as
# seen on your local filesystem. Used against some PHP file path
# issues.
##
$stIP = $IP . '/extensions/TalkPages';
##

#Informations
$wgExtensionCredits['parserhook'][] = array(
       'name' => 'TalkPages',
       'author' =>'Steren Giannini and Yaron Koren', 
       'url' => 'http://www.creativecommons.org', 
       'description' => 'Talk Pages page for mediawiki'
       );

//Do st_SetupExtension after the mediawiki setup, AND after SemanticMediaWiki setup
$wgExtensionFunctions[] = 'st_SetupExtension';

//i18n
$wgExtensionMessagesFiles['TalkPages'] = dirname( __FILE__ ) . '/TalkPages.i18n.php';

// ST_Notify_Assignment.php
require_once($stIP . "/DT_TalkPages.php");

?>
