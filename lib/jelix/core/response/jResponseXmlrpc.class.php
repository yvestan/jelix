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
* xmlrpc response
* @package  jelix
* @subpackage core_response
* @see jResponse
*/
final class jResponseXmlRpc extends jResponse {
    /**
    * @var string
    */
    protected $_type = 'xmlrpc';
    protected $_acceptSeveralErrors=false;

    /**
     * PHP Datas to send into the response
     */
    public $response = null;

    public function output(){
        if($this->hasErrors()) return false;

        header("Content-Type: text/xml;charset=".$GLOBALS['gJConfig']->defaultCharset);
        $content = jXmlRpc::encodeResponse($this->response, $GLOBALS['gJConfig']->defaultCharset);
        header("Content-length: ".strlen($content));
        echo $content;
        return true;
    }

    public function outputErrors(){
        global $gJCoord;
        if(count($gJCoord->errorMessages)){
           $e = $gJCoord->errorMessages[0];
           $errorCode = $e[1];
           $errorMessage = '['.$e[0].'] '.$e[2].' (file: '.$e[3].', line: '.$e[4].')';
        }else{
            $errorMessage = 'Unknow error';
            $errorCode = -1;
        }

        header("Content-Type: text/xml;charset=".$GLOBALS['gJConfig']->defaultCharset);
        $content = jXmlRpc::encodeFaultResponse($errorCode,$errorMessage, $GLOBALS['gJConfig']->defaultCharset);
        header("Content-length: ".strlen($content));
        echo $content;
    }
}

?>