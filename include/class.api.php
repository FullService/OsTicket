<?php
/*********************************************************************
    class.api.php

    Api related functions...

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: class.api.php,v 1.1.2.1 2009/08/17 18:35:47 carlos.delfino Exp $
**********************************************************************/
class Api {
  

    function add($ip,&$errors) {
        global $cfg;

        $passphrase=$cfg->getAPIPassphrase();

        if(!$passphrase)
            $errors['err']='API passphrase missing.';

        if(!$ip || !Validator::is_ip($ip))
            $errors['ip']='Valid IP required';
        elseif(Api::getKey($ip))
            $errors['ip']='API key for the IP already exists';

        $id=0;
        if(!$errors) {
            $sql='INSERT INTO '.API_KEY_TABLE.' SET created=NOW(), updated=NOW(), isactive=1'.
                 ',ipaddr='.db_input($ip).
                 ',apikey='.db_input(strtoupper(md5($ip.md5($passphrase)))); //Security of the apikey is not as critical at the moment 

            if(db_query($sql))
                $id=db_insert_id();

        }

        return $id;
    }

    function setPassphrase($phrase,&$errors) {
        global $cfg;

        if(!$phrase)
            $errors['phrase']='Required';
        elseif(str_word_count($_POST['phrase'])<3)
            $errors['phrase']='Must be at least 3 words long.';
        elseif(!strcmp($cfg->getAPIPassphrase(),$phrase))
            $errors['phrase']='Already set';
        else{
            $sql='UPDATE '.CONFIG_TABLE.' SET updated=NOW(), api_passphrase='.db_input($phrase).
                ' WHERE id='.db_input($cfg->getId());
            if(db_query($sql) && db_affected_rows()){
                $cfg->reload();
                return true;
            }

        }

        return false;
    }


    function getKey($ip) {

        $key=null;
        $resp=db_query('SELECT apikey FROM '.API_KEY_TABLE.' WHERE ipaddr='.db_input($ip));
        if($resp && db_num_rows($resp))
            list($key)=db_fetch_row($resp);

        return $key;
    }


    function validate($key,$ip) {

        $resp=db_query('SELECT id FROM '.API_KEY_TABLE.' WHERE ipaddr='.db_input($ip).' AND apikey='.db_input($key));
        return ($resp && db_num_rows($resp))?true:false;

    }
   
}
?>
