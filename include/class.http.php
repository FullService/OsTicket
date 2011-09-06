<?php
/*********************************************************************
    class.http.php

    Http helper.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: class.http.php,v 1.1.2.1 2009/08/17 18:35:47 carlos.delfino Exp $
**********************************************************************/
class Http {
    
    function header_code_verbose($code) {
        switch($code):
        case 200: return '200 OK';
        case 204: return '204 NoContent';
        case 401: return '401 Unauthorized';
        case 403: return '403 Forbidden';
        case 405: return '405 Method Not Allowed';
        case 416: return '416 Requested Range Not Satisfiable';
        default:  return '500 Internal Server Error';
        endswitch;
    }
    
    function response($code,$content,$contentType='text/html',$charset='UTF-8') {
		
        header('HTTP/1.1 '.Http::header_code_verbose($code));
		header('Status: '.Http::header_code_verbose($code)."\r\n");
		header("Connection: Close\r\n");
		header("Content-Type: $contentType; charset=$charset\r\n");
        header('Content-Length: '.strlen($content)."\r\n\r\n");
       	print $content;
        exit;
    }
	
	function redirect($url,$delay=0,$msg='') {

        if(strstr($_SERVER['SERVER_SOFTWARE'], 'IIS')){
            header("Refresh: $delay; URL=$url");
        }else{
            header("Location: $url");
        }
        exit;
    }
}
?>
