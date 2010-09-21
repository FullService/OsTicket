<?php
/*********************************************************************
    class.format.php

    Collection of helper function used for formatting 

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: class.format.php,v 1.1.2.1 2009/08/17 18:35:47 carlos.delfino Exp $
**********************************************************************/


class Format {


    function file_size($bytes) {

        if($bytes<1024)
            return $bytes.' bytes';        
        if($bytes <102400)
            return round(($bytes/1024),1).' kb';

        return round(($bytes/1024000),1).' mb';
    }

    function file_name($filename) {

        $search = array('/ß/','/ä/','/Ä/','/ö/','/Ö/','/ü/','/Ü/','([^[:alnum:]._])');
        $replace = array('ss','ae','Ae','oe','Oe','ue','Ue','_');
        return preg_replace($search,$replace,$filename);
    }

	function phone($phone) {

		$stripped= preg_replace("/[^0-9]/", "", $phone);
		if(strlen($stripped) == 7)
			return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2",$stripped);
		elseif(strlen($stripped) == 10)
			return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3",$stripped);
		else
			return $phone;
	}

    function truncate($string,$len,$hard=false) {
        
        if(!$len || $len>strlen($string))
            return $string;
        
        $string = substr($string,0,$len);

        return $hard?$string:(substr($string,0,strrpos($string,' ')).' ...');
    }

    function strip_slashes($var){
        return is_array($var)?array_map(array('Format','strip_slashes'),$var):stripslashes($var);
    }

    function htmlchars($var) {
        return is_array($var)?array_map(array('Format','htmlchars'),$var):htmlspecialchars($var,ENT_QUOTES);
    }


    //Same as htmlchars above but with ability to add extra checks...etc.
    function input($var) {

        /*: Moved to main.inc.php
        if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc())
            $var=Format::strip_slashes($var);
        */
        return Format::htmlchars($var);
    }

    //Format text for display..
    function display($text) {
        global $cfg;

        $text=Format::htmlchars($text); //take care of html special chars
        if($cfg && $cfg->clickableURLS() && $text)
            $text=Format::clickableurls($text);

        //Wrap long words...
        $text =preg_replace_callback('/\w{75,}/',create_function('$matches','return wordwrap($matches[0],70,"\n",true);'),$text);

        return nl2br($text);
    }

    function striptags($string) {
        return strip_tags(html_entity_decode($string)); //strip all tags ...no mercy!
    }

    //make urls clickable. Mainly for display 
    function clickableurls($text) {

        //Not perfect but it works - please help improve it. 
        $text=preg_replace('/(((f|ht){1}tp(s?):\/\/)[-a-zA-Z0-9@:%_\+.~#?&;\/\/=]+)/','<a href="\\1" target="_blank">\\1</a>', $text);
        $text=preg_replace("/(^|[ \\n\\r\\t])(www\.([a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+)(\/[^\/ \\n\\r]*)*)/",
                '\\1<a href="http://\\2" target="_blank">\\2</a>', $text);
        $text=preg_replace("/(^|[ \\n\\r\\t])([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,4})/",'\\1<a href="mailto:\\2" target="_blank">\\2</a>', $text);

        return $text;
    }

    function stripEmptyLines ( $string) {
        //return preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $string);
        //return preg_replace('/\s\s+/',"\n",$string); //Too strict??
        return preg_replace("/\n{3,}/", "\n\n", $string);
    }

    
    function linebreaks($string) {
        return urldecode(ereg_replace("%0D", " ", urlencode($string)));
    }
    
    /* elapsed time */
    function elapsedTime($sec){

        if(!$sec || !is_numeric($sec)) return "";

        $days = floor($sec / 86400);
        $hrs = floor(bcmod($sec,86400)/3600);
        $mins = round(bcmod(bcmod($sec,86400),3600)/60);
        if($days > 0) $tstring = $days . 'd,';
        if($hrs > 0) $tstring = $tstring . $hrs . 'h,';
        $tstring =$tstring . $mins . 'm';

        return $tstring;
    }
    
    /* Dates helpers...most of this crap will change once we move to PHP 5*/
    function db_date($time) {
        global $cfg;
        return Format::userdate($cfg->getDateFormat(),Misc::db2gmtime($time));
    }

    function db_datetime($time) {
        global $cfg;
        return Format::userdate($cfg->getDateTimeFormat(),Misc::db2gmtime($time));
    }
    
    function db_daydatetime($time) {
        global $cfg;
        return Format::userdate($cfg->getDayDateTimeFormat(),Misc::db2gmtime($time));
    }

    function userdate($format,$gmtime) {
        return Format::date($format,$gmtime,$_SESSION['TZ_OFFSET'],$_SESSION['daylight']);
    }
    
    function date($format,$gmtimestamp,$offset=0,$daylight=false){
        if(!$gmtimestamp || !is_numeric($gmtimestamp)) return ""; 
       
        $offset+=$daylight?date('I',$gmtimestamp):0; //Daylight savings crap.
        return date($format,($gmtimestamp+($offset*3600)));
    }
                        
        

    
}
?>
