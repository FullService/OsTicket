/*********************************************************************
    autolock.js

    Ticket locking utility...loaded only when ticket locking is enabled!!
    Mainly useful for renewing locks based on form activity since we do initial lock onview at PHP end.

    It is work in process...feedback is welcomed!

    Peter Rotich <peter@osticket.com>
    Copyright (c) 2006,2007 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: autolock.js,v 1.1.2.1 2009/08/17 19:28:50 carlos.delfino Exp $
**********************************************************************/
var autoLock = {
    
    addEvent: function(elm, evType, fn, useCapture) {
        if(elm.addEventListener) {
            elm.addEventListener(evType, fn, useCapture);
            return true;
        }else if(elm.attachEvent) {
            return elm.attachEvent('on' + evType, fn);
        }else{
            elm['on' + evType] = fn;
        }
    },

    removeEvent: function(elm, evType, fn, useCapture) {
        if(elm.removeEventListener) {
            elm.removeEventListener(evType, fn, useCapture);
            return true;
        }else if(elm.detachEvent) {
            return elm.detachEvent('on' + evType, fn);
        }else {
            elm['on' + evType] = null;
        }
    },

    //Incoming event...
    handleEvent: function(e) {
        if(!autoLock.lockId) {
            var now = new Date().getTime();
            //Retry every 5 seconds??
            if(autoLock.retry && (!autoLock.lastattemptTime || (now-autoLock.lastattemptTime)>5000)) {
                autoLock.acquireLock(e,autoLock.warn);
                autoLock.lastattemptTime=new Date().getTime();
            }
        }else{
            autoLock.renewLock(e);
        }
        if(!autoLock.lasteventTime) //I hate nav away warnings..but
            autoLock.addEvent(window,'beforeunload',autoLock.discardWarning,true);
        autoLock.lasteventTime=new Date().getTime();
    },

    //Watch activity on individual form.
    watchForm: function(fObj,fn) {
        if(!fObj || !fObj.length)
            return;

        //Watch onSubmit event on the form.
        autoLock.addEvent(fObj,'submit',autoLock.onSubmit,true);
        //Watch activity on text + textareas + select fields.
        for (var i=0; i<fObj.length; i++) {
            switch(fObj[i].type) {
                case 'textarea':
                case 'text':
                    autoLock.addEvent(fObj[i],'keyup',autoLock.handleEvent,true);
                    break;
                case 'select-one':
                case 'select-multiple':
                    if(fObj.name!='reply') //Bug on double ajax call since select make it's own ajax call. TODO: fix it 
                        autoLock.addEvent(fObj[i],'change',autoLock.handleEvent,true);
                    break;
                default:
            }
        }
    },

    //Watch all the forms on the document.
    watchDocument: function() {

        //Watch forms of interest only.
        for (var i=0; i<document.forms.length; i++) {
            if(!document.forms[i].ticket_id.value || parseInt(document.forms[i].ticket_id.value)!=autoLock.tid)
                continue;
            autoLock.watchForm(document.forms[i],autoLock.checkLock);
        }
    },

    Init: function(tid) {

        //Check Ajax availability.
        if(!Http || !Http.get) { return; }
        
        //make sure we are on ticket view page!
        void(autoLock.form=document.forms['replyform']);
        if(!autoLock.form || !autoLock.form.ticket_id.value) {
                return;
        }

        void(autoLock.tid=parseInt(autoLock.form.ticket_id.value));
        autoLock.lockId=0;
        autoLock.timerId=0;
        autoLock.lasteventTime=0;
        autoLock.lastattemptTime=0;
        autoLock.acquireTime=0;
        autoLock.renewTime=0;
        autoLock.renewFreq=0; //renewal frequency...based on returned lock time.
        autoLock.time=0;
        autoLock.lockAttempts=0; //Consecutive lock attempt errors
        autoLock.maxattempts=2; //Maximum failed lock attempts before giving up.
        autoLock.warn=true;
        autoLock.retry=true;
        autoLock.watchDocument();
        autoLock.resetTimer();
    },
          

    onSubmit: function(e) {
        if(e.type=='submit') { //Submit. double check!
            //remove nav away warning if any.
            autoLock.removeEvent(window,'beforeunload',autoLock.discardWarning,true);
            //Only warn if we had a failed lock attempt.
            if(autoLock.warn && !autoLock.lockId && autoLock.lasteventTime) {
                var answer=confirm('Unable to acquire a lock on the ticket. Someone else could be working on the same ticket. \
                    Please confirm if you wish to continue anyways.');
                if(!answer) {
                    e.returnValue=false;
                    e.cancelBubble=true;
                    if(e.preventDefault) {
                        e.preventDefault();
                    }
                    return false;
                }
            }
        }
        return true;
    },
    
    acquireLock: function(e,warn) {      

        if(!autoLock.tid || autoLock.lockId) { return false; }
        var warn = warn || false;
        if(!autoLock.lockId) {
            Http.get({
                url: "ajax.php?api=tickets&f=acquireLock&tid="+autoLock.tid,
                callback: autoLock.setLock
            },['acquire',warn]);
        }else{
            autoLock.renewLock(e);
        }    
        return autoLock.lockId;
    },

    //Renewal only happens on form activity.. 
    renewLock: function(e) {
        
        if(!autoLock.lockId) { return false; }
        
        var now= new Date().getTime(); 
        if(!autoLock.lastcheckTime || (now-autoLock.lastcheckTime)>=(autoLock.renewFreq*1000)){
            Http.get({
                url: "ajax.php?api=tickets&f=renewLock&id="+autoLock.lockId+'&tid='+autoLock.tid,
                callback: autoLock.setLock
                },['renew',autoLock.warn]);
        }
    }, 
  
    setLock: function(reply,action,warn) {
        var warn = warn || false;
        if(reply.status == Http.Status.OK && reply.responseText) {
            var lock = eval('('+reply.responseText+')');
            if(lock.id) {
                autoLock.renewFreq=lock.time?(lock.time/2):30;
                autoLock.lastcheckTime=new Date().getTime();
            }
            autoLock.lockId=lock.id; //overwrite the lockid.
            switch(action){
                case 'renew':
                    if(!lock.id && lock.retry) {
                        autoLock.lockAttempts=1; //reset retries.
                        autoLock.acquireLock(e,false); //We lost the lock?? ..try to re acquire now.
                    }
                    break;
                case 'acquire':
                    if(!lock.id) {
                        autoLock.lockAttempts++;
                        if(warn && (!lock.retry || autoLock.lockAttempts>=autoLock.maxattempts)) {
                            autoLock.retry=false;
                            alert('Unable to lock the ticket. Someone else could be working on the same ticket.'); 
                        }
                    }   
                    break;
            }
        }
    },
    
    discardWarning: function(e) {
        e.returnValue="Any changes or info you've entered will be discarded!";
    },
   
    //TODO: Monitor events and elapsed time and warn user when the lock is about to expire. 
    monitorEvents: function() {
       // warn user when lock is about to expire??;
        //autoLock.resetTimer();
    },

    clearTimer: function() {
        clearTimeout(autoLock.timerId);
    },
    
    resetTimer: function() {
        clearTimeout(autoLock.timerId);
        autoLock.timerId=setTimeout(function () { autoLock.monitorEvents() },30000);
    }
}
//Register ticket locking init on load!
autoLock.addEvent(window, 'load', autoLock.Init, false);
