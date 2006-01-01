<?php

/**
* @package     jelix-scripts
* @version     $Id$
* @author      Jouanneau Laurent
* @contributor
* @copyright   2005-2006 Jouanneau laurent
* @link        http://www.jelix.org
* @licence     GNU General Public Licence see LICENCE file or http://www.gnu.org/licenses/gpl.html
*/

class createappCommand extends JelixScriptCommand {

    public  $name = 'createapp';
    public  $allowed_options=array('-withdefaultmodule'=>false);
    public  $allowed_parameters=array();

    public  $syntaxhelp = "[-withdefaultmodule]";
    public  $help="Cr�er une nouvelle application avec tous les r�pertoires n�cessaires.

    Si l'option -withdefaultmodule est pr�sente, cr�er �galement un module du m�me nom
    que l'application.

    Le nom de l'application doit �tre indiqu� soit en premier param�tre du script jelix.php
       jelix.php --helloApp
    soit dans une variable d'environnement JELIX_APP_NAME.
    ";


    public function run(){
       if(file_exists(JELIX_APP_PATH)){
           die("Erreur : application d�j� existante\n");
       }

       $this->createDir(JELIX_APP_PATH);
       $this->createDir(JELIX_APP_TEMP_PATH);
       $this->createDir(JELIX_APP_WWW_PATH);
       $this->createDir(JELIX_APP_VAR_PATH);
       $this->createDir(JELIX_APP_LOG_PATH);
       $this->createDir(JELIX_APP_CONFIG_PATH);
       $this->createDir(JELIX_APP_PATH.'modules');
       $this->createDir(JELIX_APP_PATH.'plugins');
       $this->createDir(JELIX_APP_PATH.'responses');

       $param = array('appname'=>$GLOBALS['APPNAME']);


       $this->createFile(JELIX_APP_PATH.'project.xml','project.xml.tpl',$param);
       $this->createFile(JELIX_APP_CONFIG_PATH.'config.classic.ini.php','config.classic.ini.php.tpl',$param);
       $this->createFile(JELIX_APP_CONFIG_PATH.'dbprofils.ini.php','dbprofils.ini.php.tpl',$param);

       $param['rp_temp']=jxs_getRelativePath(JELIX_APP_PATH, JELIX_APP_TEMP_PATH);
       $param['rp_var'] =jxs_getRelativePath(JELIX_APP_PATH, JELIX_APP_VAR_PATH);
       $param['rp_log'] =jxs_getRelativePath(JELIX_APP_PATH, JELIX_APP_LOG_PATH);
       $param['rp_conf']=jxs_getRelativePath(JELIX_APP_PATH, JELIX_APP_CONFIG_PATH);
       $param['rp_www'] =jxs_getRelativePath(JELIX_APP_PATH, JELIX_APP_WWW_PATH);

       $this->createFile(JELIX_APP_PATH.'application.init.php','application.init.php.tpl',$param);


       $param = array('appname'=>$GLOBALS['APPNAME']);
       $param['rp_jelix']=jxs_getRelativePath(JELIX_APP_WWW_PATH, JELIX_LIB_PATH );
       $param['rp_app']=jxs_getRelativePath(JELIX_APP_WWW_PATH, JELIX_APP_PATH );

       $this->createFile(JELIX_APP_WWW_PATH.'index.php','www/index.php.tpl',$param);
       $this->createFile(JELIX_APP_WWW_PATH.'jsonrpc.php','www/jsonrpc.php.tpl',$param);
       $this->createFile(JELIX_APP_WWW_PATH.'xmlrpc.php','www/xmlrpc.php.tpl',$param);


       if($this->getOption('-withdefaultmodule')){
            $cmd = jxs_load_command('createmodule');
            $cmd->init(array(),array('module'=>$GLOBALS['APPNAME']));
            $cmd->run();
       }

    }
}



?>