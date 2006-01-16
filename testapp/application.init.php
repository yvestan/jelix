<?php
/**
* @package  jelix
* @subpackage testapp
* @version  $Id$
* @author   Jouanneau Laurent
* @contributor
* @copyright 2005-2006 Jouanneau laurent
* @link     http://www.jelix.org
* @licence  http://www.gnu.org/licenses/gpl.html GNU General Public Licence, see LICENCE file
*/


define ('JELIX_APP_PATH', dirname (__FILE__).'/'); // don't change

define ('JELIX_APP_TEMP_PATH',    realpath(JELIX_APP_PATH.'../temp/testapp/').'/');
define ('JELIX_APP_VAR_PATH',     realpath(JELIX_APP_PATH.'var/').'/');
define ('JELIX_APP_LOG_PATH',     realpath(JELIX_APP_PATH.'var/log/').'/');
define ('JELIX_APP_CONFIG_PATH',  realpath(JELIX_APP_PATH.'var/config/').'/');
define ('JELIX_APP_WWW_PATH',     realpath(JELIX_APP_PATH.'www/').'/');

?>