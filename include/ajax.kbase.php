<?php
/*********************************************************************
    ajax.kbase.php

    AJAX interface for knowledge base related...allowed methods.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: ajax.kbase.php,v 1.1.2.1 2009/08/17 18:35:47 carlos.delfino Exp $
**********************************************************************/

if(!defined('OSTAJAXINC') || !defined('INCLUDE_DIR')) die('!');
	    
class KbaseAjaxAPI{
    
    function cannedResp($params) {
       
	    $sql='SELECT answer FROM '.KB_PREMADE_TABLE.' WHERE isenabled=1 AND premade_id='.db_input($params['id']);
	    if(($res=db_query($sql)) && db_num_rows($res))
		    list($response)=db_fetch_row($res);

        if($response && $params['tid'] && strpos($response,'%')!==false) {
            include_once(INCLUDE_DIR.'class.ticket.php');

            $ticket = new Ticket($params['tid']);
            if($ticket && $ticket->getId()){
                $response=$ticket->replaceTemplateVars($response);
            }
        }

        return $response;
	}
}
?>
