<?php
/*********************************************************************
 class.translator.php
 osTicket translator.
 Carlos Delfino <consultoria@carlosdelfino.eti.br>
 Copyright (c)  2009 Carlos Delfino
 http://www.carlosdelfino.eti.br
 Released under the GNU General Public License WITHOUT ANY WARRANTY.
 See LICENSE.TXT for details.
 vim: expandtab sw=4 ts=4 sts=4:
 $Id: class.translator.php,v 1.2.2.9 2009/11/30 19:15:03 carlos.delfino Exp $
 **********************************************************************/

if(defined('ROOT_DIR'))
define('TRANSLATE_DIR',ROOT_DIR.'translate/'); // Dir with Translations
else{
	define('ROOT_DIR',str_replace('\\\\', '/', realpath(dirname(__FILE__))).'/'); #Get real path for root dir ---linux and windows
	define('TRANSLATE_DIR',ROOT_DIR.'translate/'); // Dir with Translations
}

define('TRANSLATE_PATH','translate/');

class Translator
{
	// lista nome de arquivos e diretorios a serem omitidos na listagem de idiomas disponiveis
	static $omit = array('.','..',
	'.cvs','.CVS','cvs','CVS',
	'.svn','.SVN','svn','SVN');

	var $cfg;
	var $LANG = array ();

	function Translator($cfg = false )
	{
		$this->cfg = $cfg;
		$this->loadTranslate();
	}

	function  loadTranslate()
	{
		$language = $this->getLanguage();

		require (TRANSLATE_DIR.$language.'/translate.php');

		$this->LANG = $LANG;

		return $language;
	}

	/**
	 * Alias function to getLanguage();
	 */
	function getLang(){
		return $this->getLanguage();
	}

	/**
	 * Return the Language code;
	 */
	function getLanguage()
	{
		if(!isset($this->language)){
			$cfg = $this->cfg;
			if($cfg){
				$this->language = $cfg->getLanguage();
			}else{
				$this->language = 'us';
			}
		}
		return $this->language;
	}

	function setLanguage($lang='us'){
		$this->language = $lang;
		$this->loadTranslate();
	}

	/**
	 * Translate using printf
	 */
	function translatef($str, $params=null){
		if (!is_null($str))
		{
			$str = $this->LANG[$str];

			if (!is_null($replace))
			{
				$str = printf($str,$param);
			}
		}
		return $str;

	}

	function dir(){
		$dir = $this->LANG['DIRECTION'];
		if(isset($dir)){
			return $dir;
		}else{
			return 'ltr';
		}
			
	}

	/**
	 *  echo the string returned from Translator::translate($str,$replace);
	 *
	 * @param String $str
	 * @param mix $replace
	 */
	function _($str,$replace = null){
		echo $this->translate($str,$replace);
	}
	
	/**
	 *  return from Translator::translate($str,$replace);
	 *
	 * @param String $str
	 * @param mix $replace
	 */
	function _t($str,$replace = null) {
		return $this->translate($str,$replace);
	}
	/**
	 *
	 */
	function translate($str, $replace = null)
	{
		// Clean the tag
		$str = trim($str);
		$str = preg_replace('/\s{2,}/m', ' ', $str);
		$str = str_replace(" ", "_", $str);
		$str = strtoupper($str);

		if (!is_null($str))
		{
			if(array_key_exists($str,$this->LANG)){
				$str = $this->LANG[$str];

				if (!is_null($replace))
				{
					// TODO I want use MessageFormatter::formatMessage but only work with php >= 5.3 and I use php <= 5.2
					// (http://www.php.net/manual/pt_BR/messageformatter.formatmessage.php)
					if (is_array($replace))
					{
						$count = 0;
						foreach ($replace as $value)
						{
							$str = str_replace('{'.$count.'}', $value, $str);
							$count += 1;
						}
					} else
					{
						$str = str_replace('{0}', $replace, $str);
					}
				}
			}
		}
		return $str;
	}

	function image($str) {
		$str = $this->translate($str);

		$cfg = $this->cfg;
		if($cfg)
		return $cfg->getBaseUrl().'/'.TRANSLATE_PATH.$this->LANG['LANGUAGE'].'/'.$str;
		else
		// TODO verificar esta estrutura e melhorara-la
		return '/'.TRANSLATE_PATH.$this->LANG['LANGUAGE'].'/'.$str;
	}

	/**
	 * Return name of iso language informed.
	 *
	 * @param String $lang
	 * @return String Language name
	 */
	static function languageName($lang){
		//TODO
		return trim($lang);
	}

	static function listLanguages(){
		//using the opendir function
		$dir_handle = @opendir(TRANSLATE_DIR) or die("Unable to open TRANSLATE_DIR");

		//echo "Directory Listing of". TRANSLATE_DIR."<br/>";
		$langs = array();

		//running the while loop
		while ($file = readdir($dir_handle))
		{
			if( is_dir(TRANSLATE_DIR.$file)
			&& $file != "."
			&& $file != ".."
			&& !in_array( $file, self::$omit ) ){
				$langs[] = $file ;
			}
		}

		//closing the directory
		closedir($dir_handle);

		sort($langs);
		return $langs;
	}

	/**
	 * Send RAW Header to browser use the correct charset;
	 *
	 * You can inform the content-type to send.
	 */
	public function sendHeader($content="text/html"){
		$charset = $this->getCharset();
		header ("Content-type: $content; charset=$charset");
	}

	public function getCodePage(){
		$dir = $this->LANG['CODEPAGE'];
		if(isset($dir)){
			return $dir;
		}else{
			return 'UTF-8';
		}
	}
	public function getCharset(){
		return strtolower($this->getCodePage());
	}
}
?>
