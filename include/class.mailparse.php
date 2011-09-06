<?php
/*********************************************************************
    class.mailparse.php

    Mail parsing helper class.
    Mail parsing will change once we move to PHP5

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: class.mailparse.php,v 1.2.2.1 2009/08/17 18:35:47 carlos.delfino Exp $
**********************************************************************/

require_once('Mail/mimeDecode.php');
require_once('Mail/RFC822.php');

class Mail_Parse {
    
    var $mime_message;
    var $include_bodies;
    var $decode_headers;
    var $decode_bodies;
    
    var $struct;
    
    function Mail_parse($mimeMessage,$includeBodies=true,$decodeHeaders=TRUE,$decodeBodies=TRUE){
        
        $this->mime_message=$mimeMessage;
        $this->include_bodies=$includeBodies;
        $this->decode_headers=$decodeHeaders;
        $this->decode_bodies=$decodeBodies;
    }

    function decode() {

        $params = array('crlf'          => "\r\n",
                        'input'         =>$this->mime_message,
                        'include_bodies'=> $this->include_bodies,
                        'decode_headers'=> $this->decode_headers,
                        'decode_bodies' => $this->decode_bodies);
        $this->splitBodyHeader();    
        $this->struct=Mail_mimeDecode::decode($params);
        
        return (PEAR::isError($this->struct) || !(count($this->struct->headers)>1))?FALSE:TRUE;
    }

    function splitBodyHeader() {

        if (preg_match("/^(.*?)\r?\n\r?\n(.*)/s",$this->mime_message, $match)) {
            $this->header=$match[1];
        }
    }
    

    function getStruct(){
        return $this->struct;
    }

    function getHeader() {
        if(!$this->header) $this->splitBodyHeader();

        return $this->header;
    }

    function getError(){
        return PEAR::isError($this->struct)?$this->struct->getMessage():'';
    }
   
    
    function getFromAddressList(){
        return Mail_Parse::parseAddressList($this->struct->headers['from']);
    }

    function getToAddressList(){
        //Delivered-to incase it was a BBC mail.
       return Mail_Parse::parseAddressList($this->struct->headers['to']?$this->struct->headers['to']:$this->struct->headers['delivered-to']);
    }
        
    function getCcAddressList(){
        return $this->struct->headers['cc']?Mail_Parse::parseAddressList($this->struct->headers['cc']):null;
    }

    function getMessageId(){
        return $this->struct->headers['message-id'];
    }
 
    function getSubject(){
        return $this->struct->headers['subject'];
    }
    
    function getBody(){
        
        $body='';
        if(!($body=$this->getPart($this->struct,'text/plain'))) {
            if(($body=$this->getPart($this->struct,'text/html'))) {
                //Cleanup the html.
                $body=str_replace("</DIV><DIV>", "\n", $body);                        
                $body=str_replace(array("<br>", "<br />", "<BR>", "<BR />"), "\n", $body);
                $body=Format::striptags($body);
            }
        }
        return $body;
    }
    
    function getPart($struct,$ctypepart) {
        
        if($struct && !$struct->parts) {
            $ctype = @strtolower($struct->ctype_primary.'/'.$struct->ctype_secondary);
            if($ctype && strcasecmp($ctype,$ctypepart)==0)
                return $struct->body;
        }

        $data='';
        if($struct && $struct->parts) {
            foreach($struct->parts as $i=>$part) {
                if($part && !$part->disposition && ($text=$this->getPart($part,$ctypepart)))
                    $data.=$text;
            }
        }
                    return $data;
            }

    function getAttachments($part=null){

        if($part==null)
            $part=$this->getStruct();

        if($part && $part->disposition
                && (!strcasecmp($part->disposition,'attachment') 
                    || !strcasecmp($part->disposition,'inline') 
                    || !strcasecmp($part->ctype_primary,'image'))){
            if(!($filename=$part->d_parameters['filename']) && $part->d_parameters['filename*'])
                $filename=$part->d_parameters['filename*']; //Do we need to decode?

            return array(array('filename'=>$filename,'body'=>$part->body));
        }

        $files=array();
        if($part->parts){
            foreach($part->parts as $k=>$p){
                if($p && ($result=$this->getAttachments($p))) {
                    $files=array_merge($files,$result);
        }
    }
        }

        return $files;
    }

    function getPriority(){
        return Mail_Parse::parsePriority($this->getHeader());
    }

    function parsePriority($header=null){

        $priority=0;
        if($header && ($begin=strpos($header,'X-Priority:'))!==false){
            $begin+=strlen('X-Priority:');
            $xpriority=preg_replace("/[^0-9]/", "",substr($header, $begin, strpos($header,"\n",$begin) - $begin));
            if(!is_numeric($xpriority))
                $priority=0;
            elseif($xpriority>4)
                $priority=1;
            elseif($xpriority>=3)
                $priority=2;
            elseif($xpriority>0)
                $priority=3;
        }
        return $priority;
    }

    function parseAddressList($address){
        return Mail_RFC822::parseAddressList($address, null, null,false);
    }
}
