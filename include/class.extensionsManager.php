<?php
/*********************************************************************
 class.extensionsManager.php
 osTicket Extensions, Modules and Plugins.
 Carlos Delfino <consultoria@carlosdelfino.eti.br>
 Copyright (c)  2009 Carlos Delfino
 http://www.carlosdelfino.eti.br
 Released under the GNU General Public License WITHOUT ANY WARRANTY.
 See LICENSE.TXT for details.
 vim: expandtab sw=4 ts=4 sts=4:
 $Id: $
 **********************************************************************/

define('EXT_CLIENT', 'client');
define('EXT_STAFF', 'staff');

include_once INCLUDE_DIR."/extensions/".resources.php;

class ExtensionsManager
{
	private final $origem;
	private final $ext_include_dir;
	private static $instance = array();

	/**
	 * Retorna a instancia do Gerenciador de Extensions.
	 * 
	 * The manager is returned as the source of the request.
	 * If not provided the source is checked whether the 
	 * constant "CLIENT_DIR" is set which indicates that 
	 * you are using the "client" application, thus returning
	 * the Extensions Manager to Customer.
	 * 
	 * If they are not able to identify the source of extension
	 * will be released one exception.
	 * 
	 * There are two types of extensions:
	 * <li> Extensions Client
	 * <li> Extensions Team
	 * 
	 * In cases of extensions that are used in both cases must 
	 * be created separately in a wrapper section client for 
	 * accessing the resources of the extension generated for 
	 * the team. 
	 * 
	 * @param string $origem
	 */
	public static function getInstance($origem=NULL) {
		$instance = self::$instance[$origem];
		if(empty($instance)){
			if($origem == null && defined(CLIENTINC_DIR)){
				$origem = EXT_CLIENT;
			}else {
				throw new ExtensionsManagerException('Origin of extensions is not defined!');
			}
			$instance = self::$instance[$origem] = new ExtensionsManager($origem);
		}
		return $instance;
	}

	private final function ExtensionsManager($origem='client') {
		$this->origem = $origem;
		if($origem == 'client'){
			$this->ext_include_dir = INCLUDE_DIR.'/'.$this->origem.'/extensions';
		}
	}

}

class ExtensionsManagerException extends Exception{
	function ExtensionsManagerException($msg='',$code=000) {
		parent::__construct($msg,$code);
	}
}

?>