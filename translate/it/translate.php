<?php

#Disable direct access.
if (!strcasecmp(basename($_SERVER['SCRIPT_NAME']), basename( __FILE__ ))) die ('kwaheri rafiki!');

$LANG = array ();
$LANG['LANGUAGE'] = 'it';
//Word Name (english name)
$LANG['LANGUAGE_NAME'] = 'Italian';
//Native name of language (in the original language)
$LANG['LANGUAGE_NATIVE_NAME'] = 'Italiano';
$LANG['DIRECTION'] = 'ltr';
$LANG['CODEPAGE'] = 'UTF-8';

$LANG['ERROR_NAME_REQUIRED'] = 'Nome richiesto';
$LANG['ERROR_MESSAGE_REQUIRED'] = 'Messaggio richiesto';
$LANG['ERROR_INVALID_FROM_ADDRESS'] = 'Indirizzo E-Mail non valido';

$LANG['ERROR_EMAIL_PARSE_FAILED'] = 'Analisi E-Mail fallita';
$LANG['ERROR_SERVICES_NOT_AVAILABLE'] = 'Servizi non disponibili!';
$LANG['ERROR_POSSIBLY_INVALID_TICKET'] = 'Accesso negato. Identificativo Ticket non valido';
$LANG['ERROR_SECURITY_REPEAT_RESULT_LOCK'] = 'Violazione della sicurezza. Le ripetute violazioni che risulteranno nel tuo account saranno bloccate.';
$LANG['ERROR_INVALID_FILE_TYPE'] = 'Tipologia File non valida';
$LANG['ERROR_FILE_REJECTED'] = 'File {0} respinto!';
$LANG['ERROR_UNABLE_SEND_MESSAGE_TRY_AGAIN'] = 'Non in grado di pubblicare il messaggio. Prova ancora';
$LANG['ERROR_OCCURED'] = 'Errore. Per favore prova ancora';
$LANG['ERROR_UNKNOW_ACTION'] = 'Azione sconosciuta';

$LANG['TITLE'] = 'Tickets FullService';

// relative path of imagens in "translate/".$LANG['LANGUAGE']."/"
$LANG['IMAGE_STAFF_VIEW_OPEN'] = 'staff/view_open.gif';
$LANG['IMAGE_STAFF_VIEW_CLOSED'] = 'staff/view_closed.gif';
$LANG['IMAGE_STAFF_REFRESH'] = 'staff/refresh.gif';

$LANG['LABEL_EMAIL'] = 'E-Mail';
$LANG['LABEL_TICKET_NUMBER'] = 'Ticket#';
$LANG['LABEL_FULL_NAME'] = 'Nome completo';
$LANG['LABEL_NAME'] = 'Nome';
$LANG['LABEL_EMAIL_ADDRESS'] = 'Indirizzo E-Mail';
$LANG['LABEL_EMAIL'] = 'E-Mail';
$LANG['LABEL_TELEPHONE'] = 'Telefono';
$LANG['LABEL_PHONE'] = 'Telefono';
$LANG['LABEL_HELP_TOPIC'] = 'Argomento della Richiesta';
$LANG['LABEL_SUBJECT'] = 'Soggetto';
$LANG['LABEL_MESSAGE'] = 'Messaggio';
$LANG['LABEL_PRIORITY'] = 'Priorita�';
$LANG['LABEL_ATTACHMENT'] = 'Allegato';
$LANG['LABEL_TICKET_STATUS'] = 'Stato Ticket';
$LANG['LABEL_VIEW_STATUS'] = 'Mostra Stato';
$LANG['LABEL_STATUS'] = 'Stato Ticket';
$LANG['LABEL_DEPARTMENT'] = 'Sezione';
$LANG['LABEL_CREATE_DATE'] = 'Crea Dato';

$LANG['TEXT_ACCESS_DENIED']='Accesso Negato';
$LANG['TEXT_CREATE_FAILED'] = 'Creazione Fallita';
$LANG['TEXT_WELCOME_BACK'] = 'Benvenuto indietro';
$LANG['TEXT_LOG_OUT'] = 'Log Out';
$LANG['TEXT_ADMIN_PANEL'] = 'Panello Amministratore';
$LANG['TEXT_STAFF_PANEL'] = 'Pannello Staff';
$LANG['TEXT_MY_PREFERENCES'] = 'Le mie preferenze';
$LANG['TEXT_MY_ACCOUNT'] = 'Il mio ACCOUNT';
$LANG['TEXT_SUPPORT_TICKET_SISTEM'] = '<span>SUPPORT TICKET</span> SYSTEM';
$LANG['TEXT_MY_TICKETS'] = 'I miei Tickets';
$LANG['TEXT_TICKETS_STATUS'] = 'Tickets Status';
$LANG['TEXT_NEW_TICKET'] = 'Nuovo Ticket';
$LANG['TEXT_HOME'] = 'Home';
$LANG['TEXT_SUPPORT_CENTER'] = 'Centro di supporto';
$LANG['TEXT_WELCOME_TITLE'] = 'Benvenuto nel centro di supporto';
$LANG['TEXT_WELCOME_MSG'] = 'Allo scopo di ottimizzare le richieste di supporto e servirti meglio, utilizziamo un sistema di supporto ticket. Ad ogni richiesta &#232; attribuito un numero che puoi usare per seguire lo storico delle risposte on line. Potrai inoltre consultare il nostro archivio completo di tutte le tue richieste di supporto.';
$LANG['TEXT_BOX_NEW_TICKET'] = 'Sottoscrivi una nuova richiesta di suporto. Per favore fornisci quanti pi&#249; dettagli possibile in modo tale da consentirci di aiutarti nel modo migliore. Per aggiornare un ticket sottoscritto in precedenza, per favore usa il modulo a destra. &#200; richiesto un indirizzo mail valido. ';
$LANG['TEXT_OPEN_NEW_TICKET'] = 'Apri un nuovo Ticket';
$LANG['TEXT_OPEN_PREVIUS_TICKET'] = 'Controlla lo stato del ticket aperto precedentemente. Noi ti forniamo un archivio e lo storico di tutte le tue richieste di supporto complete di risposta ';
$LANG['TEXT_CHECK_STATUS'] = 'Controlla lo Stato';
$LANG['TEXT_TICKET_CREATED'] = 'Richiesta di supporto ticket creata';
$LANG['TEXT_UNABLE_CREATE_TICKET'] = 'Non in grado di creare un ticket. Per favore correggi gli errori di seguito e prova ancora!';
$LANG['TEXT_PLEASE_FILL_FORM_NEW_TICKET'] = 'Per favore compila il modulo di seguito per aprire un nuovo ticket';
$LANG['TEXT_NOT_THIS_USER'] = 'Io non sono questo utente';
$LANG['TEXT_GENERAL_INQUIRY'] = 'Domanda generale';
$LANG['TEXT_SELECT_ONE_TOPIC'] = 'Seleziona Uno';
$LANG['TEXT_OPEN_TICKET'] = 'Apri Ticket';
$LANG['TEXT_RESET'] = 'Resetta';
$LANG['TEXT_CANCEL'] = 'Cancella';
$LANG['TEXT_THANKS_NEW_TICKET'] = 'Grazie per averci contattato.<br>&#200; stata creata una richiesta di supporto ticket ed un campione ti sar&#224; inviato a breve se necessario';
$LANG['TEXT_NEW_TICKET_AUTO_RESPONSE'] = 'Un email con il numero del ticket &#200; stata inviata al <b>{0}</b>. Necessiterai del numero di ticket accompagnato dalla tua mail per visionare lo stato e lo sviluppo online .<br><br>Se desideri inviare ulteriori commenti o informazioni riguardo alcune questioni, per favore segui le istruzioni che riceverai tramite E-Mail.';
$LANG['TEXT_SUPPORT_TEAM'] = 'Team di supporto';
$LANG['TEXT_MESSAGE_POSTED_SUCCESS'] = 'Messaggio pubblicato con successo';
$LANG['TEXT_TICKET_NUMBER'] = 'Ticket #';
$LANG['TEXT_TICKET_THREAD'] = 'Ticket Thread';
$LANG['TEXT_TICKET_WILL_REOPEN_NEW_POST']='Un Ticket sar&#224; riaperto nel messaggio di posta';
$LANG['TEXT_ENTER_MESSAGE']='Messaggio in entrata';
$LANG['TEXT_ATTACH_FILE']='Allegare File';
$LANG['TEXT_POST_REPLY']='Post Reply';
$LANG['TEXT_VIEW_OPEN']='Visualizzazione aperta';
$LANG['TEXT_VIEW_CLOSED']='Visione Chiusa';
$LANG['TEXT_REFRESH']='Refresh';
$LANG['TEXT_SORT_BY_TICKET_ID']='Sort By Ticket ID';
$LANG['TEXT_SORT_BY_DATE']='Sort By Date';
$LANG['TEXT_SORT_BY_DEPARTMENT']='Sort By Department';
$LANG['TEXT_NO_TICKETS_FOUND']='Non sono stati trovati tickets';
$LANG['TEXT_AUTHENTICATION_REQUIRED']='Autenticazione richiesta';
$LANG['ERROR_YOU_HAVE_REACHED_MAXIMUM_FAILED_LOGIN']='<Hai raggiunto il livello massimo di autenticazioni consentito. Riprova fra 5 minuti o  <a href="open.php"> apri un nuovo ticket</a>';
$LANG['TEXT_INVALID_LOGIN']='Autenticazione non valida ';
$LANG['TEXT_FORGOT_YOUR_LOGIN_INFO']='Hai dimenticato le informazioni relative alla tua autenticazione? Per favore <a href="open.php">apri un nuovo ticket</a>.';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='Richieste di autenticazione eccessive (client)';
$LANG['ALERT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='Richieste eccessive di autenticazione da parte del client '."\n".
                'E-Mail: {0}'."\n".
				'Ticket#: {1}'."\n".
                'IP: {2}'."\n".
				'Time: {3}'."\n\n".
                'Tentativi #{4}';
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET']='Per vedere lo stato di un Ticket, aiutaci aggiungendo i dettagli di autenticazione di seguito.<br/>'.
        'Se questa &#232; la prima volta che ci contatti o hai perso il numero del Ticket, per favore <a href="open.php">clicca qui</a> per aprire un nuovo Ticket.';	
$LANG['TEXT_SESSION_TIMED_OUT']='La sessione &#232; scaduta a causa di inattivit&#224;';
 ?>
