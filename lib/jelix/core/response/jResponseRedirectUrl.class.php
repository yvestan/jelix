<?php
/**
* @package     jelix
* @subpackage  core_response
* @author      Laurent Jouanneau
* @contributor
* @copyright   2005-2006 Laurent Jouanneau
* @link        http://www.jelix.org
* @licence     GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
*/

/**
* Response To redirect to an URL
* @package  jelix
* @subpackage core_response
* @see jResponse
*/

final class jResponseRedirectUrl extends jResponse {
    protected $_type = 'redirectUrl';

    /**
     * full url to redirect
     * @var string
     */
    public $url = '';

    public function output(){
       if($this->hasErrors())   return false;
        header ('location: '.$this->url);
        return true;
    }

    public function outputErrors(){
         include_once(JELIX_LIB_RESPONSE_PATH.'jResponseHtml.class.php');
         $resp = new jResponseHtml();
         $resp->outputErrors();
    }

}

?>