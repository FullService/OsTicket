<?php

# Italian translation completed and updated by UncleDan ( uncledan at uncledan dot it )
# osTicket Release: 1.6.0
# Traslation Release: 1.0

#Disable direct access.
if (!strcasecmp(basename($_SERVER['SCRIPT_NAME']), basename( __FILE__ ))) die ('kwaheri rafiki!');

$LANG = array ();

# Language identification in iso-639
$LANG['LANGUAGE'] = 'it';
//Word Name (english name)
$LANG['LANGUAGE_NAME'] = 'Italian';
//Native name of language (in the original language)
$LANG['LANGUAGE_NATIVE_NAME'] = 'Italiano';
$LANG['DIRECTION'] = 'ltr';
$LANG['CODEPAGE'] = 'UTF-8';

# Memo UTF-8
// DESCRIPTION............. CHARACTER ... CODE
// Capital A with grave.... À ........... &#192;
// Small a with grave ..... à ........... &#224;
// Capital E with grave ... È ........... &#200;
// Small e with grave ..... è ........... &#232;
// Capital E with acute ... É ........... &#201;
// Small e with acute ..... é ........... &#233;
// Capital I with grave ... Ì ........... &#204;
// Small i with grave ..... ì ........... &#236;
// Capital O with grave.... Ò ........... &#210;
// Small o with grave ..... ò ........... &#242;
// Capital U with grave ... Ù ........... &#217;
// Small u with grave ..... ù ........... &#249;

########
##Alert Messages, normally used with JavaScript dialog box.
## 
$LANG['ALERT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='Troppi tentativi di accesso da un client'."\n".
                'Email: {0}'."\n".
				'Ticket n.: {1}'."\n".
                'IP: {2}'."\n".
				'Ora: {3}'."\n\n".
                'Tentativi n. {4}';

#######
## Error Mensages
##
$LANG['ERROR_ACCESS_DENIED_INVALID_TICKET'] = 'Accesso negato. Verificare l\'ID del Ticket.';
$LANG['ERROR_EMAIL_PARSE_FAILED'] = 'Errore nel parse dell\'Email';
$LANG['ERROR_FILE_REJECTED'] = 'File {0} rifiutato!';
$LANG['ERROR_INVALID_FROM_ADDRESS'] = 'Indirizzo non valido nel campo DA';
$LANG['ERROR_INVALID_FILE_TYPE'] = 'Tipo di file non valido';
$LANG['ERROR_MESSAGE_REQUIRED'] = 'Messaggio obbligatorio';
$LANG['ERROR_NAME_REQUIRED'] = 'Nome obbligatorio';
$LANG['ERROR_OCCURED'] = 'Errore. Per favore riprovare.';
$LANG['ERROR_OCCURED_TRY_AGAIN'] = 'Errore. Per favore riprovare.';
$LANG['ERROR_POSSIBLY_INVALID_TICKET'] = 'Accesso negato. Verificare l\'ID del Ticket.';
$LANG['ERROR_SERVICES_NOT_AVAILABLE'] = 'Servizio non disponibile!';
$LANG['ERROR_SECURITY_REPEAT_RESULT_LOCK'] = 'Violazione di sicurezza. Violazioni ripetute comporterano il blocco dell\'account';
$LANG['ERROR_SECURITY_VIOLATION_YOUR_ACCOUNT_WILL_LOCKED'] = 'Violazione di sicurezza. Violazioni ripetute comporterano il blocco dell\'account';
$LANG['ERROR_UNABLE_SEND_MESSAGE_TRY_AGAIN'] = 'Impossibile pubblicare il messaggio. Riprovare';
$LANG['ERROR_UNABLE_TO_POST_THE_RESPONSE']='Impossibile pubblicare la risposta';
$LANG['ERROR_UNKNOW_ACTION'] = 'Azione sconociuta';
$LANG['ERROR_UNABLE_TO_POST_MESSAGE'] = 'Impossibile pubblicare il messaggio. Riprovare.';
$LANG['ERROR_UKNOW_ACTION'] = 'Azione sconociuta';
$LANG['ERROR_YOU_HAVE_REACHED_MAXIMUM_FAILED_LOGIN']='Si &#232; raggiunto in numero massimo di tentativi di accesso. Riprovare tra 5 minuti o <a href="open.php">aprire un nuovo Ticket</a>';
$LANG['ERROR_YOU_MUST_CHANGE_PASSWORD'] = '&#200; necessario cambiare la password per continuare.';
$LANG['ERROR_SEARCH_TERM_MORE_3']='La chiave di ricerca deve essere di almeno 3 caratteri';

#######
## Images for Staff and Clients Ends
##
## relative path of imagens in "translate/".$LANG['LANGUAGE']."/"
##
$LANG['IMAGE_CLIENT_VIEW_OPEN'] = 'client/view_open.gif';
$LANG['IMAGE_CLIENT_VIEW_CLOSED'] = 'client/view_closed.gif';
$LANG['IMAGE_CLIENT_REFRESH'] = 'client/refresh.gif';
$LANG['IMAGE_STAFF_VIEW_OPEN'] = 'staff/view_open.gif';
$LANG['IMAGE_STAFF_VIEW_CLOSED'] = 'staff/view_closed.gif';
$LANG['IMAGE_STAFF_REFRESH'] = 'staff/refresh.gif';

#######
## Labels for Bottons, Headers on Tables, Selections, Link Texts and others
##
// Label A
$LANG['LABEL_ADD_NEW_DEPT'] = 'Aggiungi Nuovo Dipart.';
$LANG['LABEL_ADMIN_DASHBOARD'] = 'Console Amministratore';
$LANG['LABEL_ADMIN_PANEL'] = 'Pannello Amministratore';
$LANG['LABEL_ADVANCED'] = 'Avanzate';
$LANG['LABEL_APPEND'] = 'Aggiungi';
$LANG['LABEL_APPEND_SIGNATURE'] = 'Aggiungi firma';
$LANG['LABEL_ALL'] = 'Tutti';
$LANG['LABEL_ALL_DEPARTMENTS'] = 'Tutti Dipartimenti';
$LANG['LABEL_ASSIGN'] = 'Assegna';
$LANG['LABEL_ASSIGN_TO_STAFF'] = 'Assegna allo Staff';
$LANG['LABEl_ASSIGNED_TICKETS'] = 'Ticket Assegnati';
$LANG['LABEL_ASC'] = 'ASC';
$LANG['LABEL_ASCENDING'] = 'Ascendente';
$LANG['LABEL_ATTACHMENT'] = 'Allegato';
$LANG['LABEL_AUTO_RESPONSE_EMAIL'] = 'Email Risposta Automatica';
$LANG['LABEL_AUTORESPONDERS'] = 'Rispond. Automatici';
$LANG['LABEL_AUTORESP'] = 'Risp.Autom.';
// Label B
$LANG['LABEL_BASIC'] = 'Base';
// Label C
$LANG['LABEL_CLOSE'] = 'Chiudi';
$LANG['LABEL_CLOSED'] = 'Chiuso';
$LANG['LABEL_CLOSE_TICKET'] = 'Chiudi Ticket';
$LANG['LABEL_CLOSED_TICKETS'] = 'Ticket Chiusi';
$LANG['LABEL_CANCEL'] = 'Annulla';
$LANG['LABEL_CANNED_RESPONSE'] = 'Canned Response'; //en_US
$LANG['LABEL_CATEGORY'] = 'categoria';
$LANG['LABEL_CATEGORY_DEPT'] = 'Categoria/Dip.';
$LANG['LABEL_CHANGE_PASSWORD'] = 'Cambia Password';
$LANG['LABEL_CHECK_STATUS'] = 'Controlla Stato';
$LANG['LABEL_Closed'] = 'Chiuso';
$LANG['LABEL_CREATE_DATE'] = 'Crea Data';
// Label D
$LANG['LABEL_DASHBOARD'] = 'Console';
$LANG['LABEL_DATE'] = 'Data';
$LANG['LABEL_DATE_SPAN'] = 'Date Span'; //en_US
$LANG['LABEL_DEFAULT'] = 'Default';
$LANG['LABEL_DELETE'] = 'Cancella';
$LANG['LABEL_DELETE_DEPT_S'] = 'Cancella Dipartimento(i)';
$LANG['LABEL_DEPARTMENT'] = 'Dipartmento';
$LANG['LABEL_DEPARTMENTS'] = 'Dipartmenti';
$LANG['LABEL_DEPT_MANAGER'] = 'Amministra Dip.';
$LANG['LABEL_DEPT_MANAGER_NONE'] = 'None';
$LANG['LABEL_DEPT'] = 'Dip.';
$LANG['LABEL_DEPT_ACCESS'] = 'Accesso Dip.';
$LANG['LABEL_DEPT_NAME'] = 'Nome Dip.';
$LANG['LABEL_DEPT_EMAIL'] = 'Email Dip.';
$LANG['LABEL_DEPT_EMAIL_ABOVE'] = 'Email Dip. (sopra)';
$LANG['LABEL_DEPT_SIGNATURE'] = 'Firma Dip.';
$LANG['LABEL_DEPT_TYPE'] = 'Tipo Dip.';
$LANG['LABEL_DESC'] = 'DISC';
$LANG['LABEL_DESCENDING'] = 'Discendente';
$LANG['LABEL_DIRECTORY'] = 'Elenco';
$LANG['LABEL_DIRECTORY_STAFF'] = 'Elenco Staff';
// Label E
$LANG['LABEL_EMAIL'] = 'Email';
$LANG['LABEL_EMAILS'] = 'Email';
$LANG['LABEL_EMAILS_SETTINGS'] = 'Opzioni Email';
$LANG['LABEL_EMAIL_ADDRESS'] = 'Indirizzo Email';
$LANG['LABEL_EMAIL_TEMPLATES'] = 'Modelli Email';
$LANG['LABEL_ENABLE_SYSTEM_OFF_LINE'] = 'Abilita';
$LANG['LABEL_ENTER_NOTE_CONTENT'] = 'Inserire il contenuto della nota';
// Label F
$LANG['LABEL_FROM'] = 'Da.';
$LANG['LABEL_FULL_NAME'] = 'Nome Completo';
// Label G
$LANG['LABEL_GO'] = 'VAI';
// Label H
$LANG['LABEL_HELP_TOPIC'] = 'Argomento della Guida';
$LANG['LABEL_HELP_TOPICS'] = 'Argomenti della Guida';
// Label I
// Label J
// Label K
$LANG['LABEL_KNOWLEDGE_BASE'] = 'Knowledge Base';
$LANG['LABEL_KNOWLEDGE_BASE_PREMATE'] = 'Knowledge Base: Precompilato';
// Label L
$LANG['LABEL_LOG_OUT'] = 'Esci';
$LANG['LABEL_LAST_UPDATED'] = 'Ultimo Aggiornamento';
// Label M
$LANG['LABEL_MAKE_PUBLIC'] = 'Rendi Pubblico';
$LANG['LABEL_MAKE_PRIVATE'] = 'Rendi Privato';
$LANG['LABEL_MANAGER'] = 'Supervisore';
$LANG['LABEL_MESSAGE'] = 'Messaggio';
$LANG['LABEL_MY_ACCOUNT'] = 'Il Mio Account';
$LANG['LABEL_MY_PREFERENCE'] = 'Le Mie Preferenze';
$LANG['LABEL_MY_PROFILE'] = 'Il Mio Profilo';
$LANG['LABEL_MY_SIGNATURE'] = 'La Mia Firma';
// Label N
$LANG['LABEL_NAME'] = 'Nome';
$LANG['LABEL_NEW_DEPARTMENT'] = 'Nuovo Dipartimento';
$LANG['LABEL_NEW_MESSAGE'] = 'Nuovo Messaggio';
$LANG['LABEL_NEW_PREMADE_REPLY'] = 'Nuova Risposta Precompilata';
$LANG['LABEL_NEW_TICKET'] = 'Nuovo Ticket';
$LANG['LABEL_NEW_TICKET_PRIORITY'] = 'Nuova Priorit &#224; Ticket';
$LANG['LABEL_NO_MANAGER_ADD_USERS'] = 'Nessun Utente (Aggiungi Utenti)';
$LANG['LABEL_NONE'] = 'Nessuno';
$LANG['LABEL_NOTE_TITLE'] = 'Titolo Nota';
// Label O
$LANG['LABEL_OPEN'] = 'aperto';
$LANG['LABEL_OPEN_TICKET'] = 'Ticket Apertp';
$LANG['LABEL_OPEN_NEW_TICKET'] = 'Apri Nuovo Ticket';
$LANG['LABEL_OTHER'] = 'Altro';
$LANG['LABEL_OUTGOING_EMAIL'] = 'Email in uscita';
$LANG['LABEL_OVERDUE'] = 'Scaduto';
// Label P
$LANG['LABEL_PREFERENCES'] = 'Preferenze';
$LANG['LABEL_PUBLIC'] = 'Pubblico';
$LANG['LABEL_PRIVATE'] = 'Privato';
$LANG['LABEL_PRIVATE_HIDDEN'] = 'Privato (Nascosto)';
$LANG['LABEL_PAGE'] = 'pagina';
$LANG['LABEL_PASSWORD'] = 'Password';
$LANG['LABEL_PASSWORD_AGAIN'] = 'Password (ripetere)';
$LANG['LABEL_PHONE'] = 'Telefono';
$LANG['LABEL_POST_INTERNAL_NOTE'] = 'Pubblica Nota Interna'; 
$LANG['LABEL_POST_REPLY']='Pubblica Risposta';
$LANG['LABEL_PRIORITY'] = 'Priorit&#224;';
$LANG['LABEL_PRIMARY_OUTGOING_EMAIL'] = 'Email In Uscita Principale';
$LANG['LABEL_PREMADE_REPLIES'] = 'Risposte Precompilate';
// Label Q
$LANG['LABEL_QUERY'] = 'Ricerca';
$LANG['LABEL_QUERY_RETURNED_ZERO_RESULT'] = 'La ricerca non ha prodotto risultati.';
// Label R
$LANG['LABEL_RE_ASSIGN_TICKET'] = 'Ri-Assegna allo Staff';
$LANG['LABEL_REOPEN'] = 'Riapri';
$LANG['LABEL_REOPEN_TICKET'] = 'Riapri Ticket';
$LANG['LABEL_RESET'] = 'Reset'; //en_US
$LANG['LABEL_RESULTS_PER_PAGE'] = 'Risultati Per Pagina';
$LANG['LABEL_REPLY_TITLE'] = 'Titolo Risposta';
// Label S
$LANG['LABEL_SEARCH'] = 'Cerca';
$LANG['LABEL_SEARCH_FOR'] = 'Cerca per';
$LANG['LABEL_SELECT'] = 'Seleziona';
$LANG['LABEL_SELECT_DEPARTMENT'] = 'Seleziona Dipartimento';
$LANG['LABEL_SELECT_MANAGER_OPTIONAL'] = 'Seleziona Supervisore (opzionale)';
$LANG['LABEL_SELECT_ONE_TOPIC'] = 'Seleziona Uno';
$LANG['LABEL_SELECT_ONE_EMAIL'] = 'Seleziona Una';
$LANG['LABEL_SELECT_PRIORITY'] = 'Seleziona Priorit &#224;';
$LANG['LABEL_SELECT_SOURCE'] = 'Seleziona Origine';
$LANG['LABEL_SELECT_TEMPLATE'] = 'Seleziona Modello';
$LANG['LABEL_SETTINGS'] = 'Opzioni';
$LANG['LABEL_SORT_BY'] = 'Ordina per';
$LANG['LABEL_SORT_BY_TITLE'] = 'Ordina Per Titolo';
$LANG['LABEL_SORT_BY_UPDATE_DATE'] = 'Ordina Per Data Aggiornamento';
$LANG['LABEL_STAFF'] = 'Staff';
$LANG['LABEL_STAFF_MEMBER'] = 'Membro dello Staff';
$LANG['LABEL_STAFF_MEMBERS'] = 'Membri Staff';
$LANG['LABEL_STAFF_PANEL'] = 'Pannello Staff';
$LANG['LABEL_STATUS'] = 'Stato';
$LANG['LABEL_STATUS_IS'] = 'Lo stato &#232;';
$LANG['LABEL_SUBJECT'] = 'Oggetto';
$LANG['LABEL_SUBMIT'] = 'Invia';
$LANG['LABEL_SUBMIT_TICKET'] = 'Invia Ticket';
$LANG['LABEL_SYSTEM_DEFAULT_TEMPLATE'] = 'System Default'; //en_US
$LANG["LABEL_SYSTEM_SETTINGS"] = 'Opzioni di Sistema';
// Label T
$LANG['LABEL_TELEPHONE'] = 'Telefono';
$LANG['LABEL_TICKET'] = 'Ticket';
$LANG['LABEL_TICKET_ID'] = 'ID Ticket';
$LANG['LABEL_TICKET_NUMBER'] = 'Ticket n.';
$LANG['LABEL_TICKET_STATUS'] = 'Stato Ticket'; 
$LANG['LABEL_TO'] = 'A.';
$LANG['LABEL_TOGGLE'] = 'Toggle'; //en_US
$LANG['LABEL_TRANSFER'] = 'Trasferisci';
$LANG['LABEL_TYPE'] = 'Tipo';
// Label U
$LANG['LABEL_UPDATE_DATE'] = 'Ultimo Aggiornamento';
$LANG['LABEL_UPDATE_DEPARTMENT'] = 'Aggiorna Dipartimento';
$LANG['LABEL_USERNAME'] = 'Utente';
$LANG['LABEL_USERS'] = 'Utenti';
// Label V
$LANG['LABEL_VIEW_STATUS'] = 'Vedi Stato';

#######
## Generic text for all site, if have to text repeated in
## Client or Staff ends, is prefixed with correct name.
##
// TEXT A
$LANG['TEXT_ACCESS_DENIED']='Accesso Negato';
$LANG['TEXT_ALL_DEPARTMENTS'] = 'Tutti i Dipartimenti';
$LANG['TEXT_ANSWERED_STATS'] = 'Ticket Risposti ({0})';
$LANG['TEXT_ANSWERED_TICKETS'] = 'Ticket Risposti';
$LANG['TEXT_AND_STATUS_SET_TO'] = ' e stato impostato a {0}';
$LANG['TEXT_AND_TICKET_STATUS_SET_TO_CLOSED'] = ' e stato del Ticket impostato a chiuso.';
$LANG['TEXT_ASSIGNED_TICKETS'] = 'Ticket Assegnati';
$LANG['TEXT_AUTHENTICATION_REQUIRED']='Richiesta Autenticazione';
$LANG['TEXT_AUTHENTICATION_REQUIRED_QUESTION']='Richiesta autenticazione?';
$LANG['TEXT_ANY_STATUS'] = 'Qualsiasi Stato';
$LANG['TEXT_ATTACH_FILE']='Allega File';
// TEXT B
$LANG['TEXT_BOX_NEW_TICKET'] = 'Sottoscrivi una nuova richiesta di supporto. Per favore fornisci quanti pi&#249; dettagli possibile in modo tale da consentirci di aiutarti nel modo migliore. Per aggiornare un Ticket sottoscritto in precedenza, per favore usa il modulo a destra. &#200; richiesto un indirizzo mail valido. ';
// TEXT C
$LANG['TEXT_CAM_BE_APPENDED_TO_RESPONSES'] = 'pu&#242; essere aggiunto alla risposta.&nbsp;(opzione disponibile)';
$LANG['TEXT_CLOSED_TICKETS'] = 'Ticket Chiusi';
$LANG['TEXT_CLOSED'] = 'Chiuso';
$LANG['TEXT_COMMENTS_REASONS_TRANSFER'] = 'Commento/Motivo per il trasferimento. &nbsp;(<i>Nota Interna</i>)';
$LANG['TEXT_CREATE_FAILED'] = 'Errore nella creazione';
// TEXT D
$LANG['TEXT_DEPT_DEPENDS_ON_EMAIL'] = 'Il dipartimento dipende dall\'Email e dagli argomenti della guida per i Ticket in ingresso.';
$LANG['TEXT_DEPT_TRANSFER'] = 'Trasferisci Dip.';
$LANG['TEXT_DEPT_UPDATED_SUCCESSFULLY'] = 'Dip. aggiornato correttamente';
// TEXT E
$LANG['TEXT_EMAIL_ADDED_TO_BANLIST'] = 'Email ({0}) aggiunta alla banlist'; //en_US
$LANG['TEXT_EMAIL_ADDRESS_USED_SEND_AUTO_RESPONSES'] = 'Email utilizzata per le risposte automatiche, se abilitate.';
$LANG['TEXT_EMAIL_REMOVED_FROM_BANLIST'] = 'Email rimosso dalla banlist'; //en_US
$LANG['TEXT_ENTER_MESSAGE']='Inserisci Messaggio';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS']='Excessive login attempts';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='Troppi tentativi di accesso (client)';
// TEXT F
$LANG['TEXT_FILE_REJECTED'] = 'File [ {0} ] rifiutato';
$LANG['TEXT_FILE_IS_TOO_BIG'] = 'File troppo grande. Consentiti al massimo {0} byte';
$LANG['TEXT_FORGOT_YOUR_LOGIN_INFO']='Dimenticato le credenziali? Per favore <a href="open.php">apri un nuovo Ticket</a>.';
// TEXT G
$LANG['TEXT_GENERAL_INQUIRY'] = 'General Inquiry'; //en_US
$LANG['TEXT_GLOBAL_AUTO_RESPONSE_SETTINGS'] = 'Le opzioni di risposta automatica generali devono essere attivate nelle preferenzeaffinché l\'opzione \'Abilita\' Dip. abbia effetto.';
// TEXT H
$LANG['TEXT_HOME'] = 'Pagina principale';
$LANG['TEXT_HEADER_TITLE']='osTicket :: Support Ticket System'; //en_US
// TEXT I
$LANG['TEXT_INTERNAL_NOTE_POSTED'] = 'Nota interna pubblicata';
$LANG['TEXT_INVALID_LOGIN'] = 'Accesso non valido';
$LANG['TEXT_INVALID_FILE_TYPE'] = 'Tipo di file non valido [ {0} ]';
// TEXT J
// TEXT K
// TEXT L
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET']='Per vedere lo stato di un Ticket, inserire le proprie credenziali qui sotto.<br/>'.
        'Se &#232; la prima volta che ci contattate o avete perso l\'ID del Ticket, per favore <a href="open.php">cliccate qui</a> per aprire un nuovo Ticket.';
$LANG['TEXT_LOG_OUT'] = 'Esci';
// TEXT M
$LANG['TEXT_MY_TICKETS'] = 'I Miei Ticket';
$LANG['TEXT_MY_TICKETS_STATS'] = 'I Miei Ticket ({0})';
$LANG['TEXT_MY_ACCOUNT'] = 'Il Mio Account';
// TEXT N
$LANG['TEXT_NEW_TICKET'] = 'Nuovo Ticket';
$LANG['TEXT_NOT_THIS_USER'] = 'Utente non coerente';
$LANG['TEXT_NEW_TICKET_AUTO_RESPONSE'] = 'Una Email con il numero del Ticket &#232; stata inviata a <b>{0}</b>.Sar&#224; necessario avere il numero del Ticket ed il proprio indirizzo Email per vederne lo stato di avanzamento online.<br><br>Se si desidera pubblicare commenti o informazioni addizionali sullo stesso problema, seguire le istruzioni riportate nella Email.';
$LANG['TEXT_NO_TICKETS_FOUND']='Nessun Ticket trovato.';
// TEXT O
$LANG['TEXT_OPEN_NEW_TICKET'] = 'Apri nuovo Ticket';
$LANG['TEXT_OPEN_PREVIUS_TICKET'] = 'Controlla lo stato di un Ticket aperto precedentemente. Forniamo un archivio storico di tutte le richieste di assistenza con le relative risposte.';
$LANG['TEXT_OPEN_TICKETS'] = 'Apri Ticket';
$LANG['TEXT_OPEN'] = 'Apri';
$LANG['TEXT_OVERDUE_STATS'] = 'Scaduti ({0})';
$LANG['TEXT_OVERDUE_TICKETS'] = 'Ticket Scaduti';
$LANG['TEXT_OVERDUE'] = 'Scaduto';
$LANG['TEXT_OFFLINE']='Grazie per averci contattato.<br>'.
         'Il nostro helpdesk non &#232; attualmente disponibile, vi preghiamo di riprovare pi&#249; tardi.';
$LANG['TEXT_OF_SELECTED_TICKETS_REOPENED'] = "{0} di {1} Ticket selezionati riaperti";
$LANG['TEXT_OF_SELECTED_TICKETS_CLOSED'] = "{0} di {1} Ticket selezionati chiusi";
$LANG['TEXT_OF_SELECTED_TICKETS_MARKED_OVERDUE'] = "{0} di {1} Ticket selezionati marcati scaduti";
$LANG['TEXT_OF_SELECTED_TICKETS_DELETED'] = "{0} di {1} Ticket selezionati eliminati";
// TEXT P
$LANG['TEXT_POST_REPLY']='Pubblica Risposta';
$LANG['TEXT_PLEASE_FILL_STAFF_FORM_BELOW_OPEN_NEW_TICKET'] = 'Per favore compilare il modulo sottostante per aprire un nuovo Ticket.';
$LANG['TEXT_PLEASE_FILL_FORM_NEW_TICKET'] = 'Per favore compilare il modulo sottostante per aprire un nuovo Ticket.';
$LANG['TEXT_PLEASE_TAKE_A_MINUTE_TO_DELETE_INSTALL'] = 'Per favore cancellare la cartella <strong>setup</strong> oppure <strong>install</strong> per motivi di sicurezza.';
$LANG['TEXT_PRIORITY_CHANGED_SUCCESSFULLY'] = 'Priorit&#224; modificata con successo';
// TEXT Q
// TEXT R
$LANG['TEXT_REFRESH']='Aggiorna';
$LANG['TEXT_REQUIRED_WHEN_DEPT_IS_PUBLIC'] = 'Obbligatorio quando il Dip. &#232; pubblico';
$LANG['TEXT_RESPONSE_POSTED_SUCCESSFULLY'] = 'Risposta pubblicata con successo';
// TEXT S
$LANG['TEXT_SELECT_DEPARTMENTS_GROUP_MEMBERS'] = 'Seleziona i membri dei Dipartimenti che possono accedere oltre al loro Dipartimento.';
$LANG['TEXT_SELECT_PREMADE_REPLY'] = 'Seleziona una risposta precompilata';
$LANG['TEXT_SELECT_STAFF_MEMBER'] = '-Seleziona Membro Staff-';
$LANG['TEXT_SELECT_TARGET_DEPT'] = '-Seleziona Dip. Destinazione-';
$LANG['TEXT_SESSION_TIMED_OUT_DUE_TO_INACTIVITY']='Sessione scaduta per inattivit&#224;';
$LANG['TEXT_SORT_BY_CATEGORY'] = 'Ordina per Categoria';
$LANG['TEXT_SORT_BY_DATE']='Ordina per Data';
$LANG['TEXT_SORT_BY_DEPARTMENT']='Ordina per Dipartimento';
$LANG['TEXT_SORT_BY_TICKET_ID']='Ordina per ID Ticket';
$LANG['TEXT_SORT_BY_PRIORITY'] = 'Ordina per Priorit&#224;';
$LANG['TEXT_SHOW_FROM_TO_OF_ALL'] = 'Visualizzati {0} - {1} di {2}';
$LANG['TEXT_SHOW_ZERO'] = 'Visualizzati 0 (zero)';
$LANG['TEXT_SEARCH_RESULTS'] = 'Risultati Ricerca';
$LANG['TEXT_SYSTEM_IS_OFF_LINE'] = '<strong>Il sistema &#232; in modalit&#224; offline</strong> - L\'Interfaccia client &#232; disattivata e SOLO gli aministratori possono accedere al Pannello di Controllo.';
$LANG['TEXT_SUPPORT_TEAM'] = 'Team di Supporto';
$LANG['TEXT_SUPPORT_TICKET_SISTEM'] = '<span>SUPPORT TICKET</span> SYSTEM'; //en_US
$LANG['TEXT_SUPPORT_CENTER'] = 'Centro di supporto';
// TEXT T
$LANG['TEXT_TOTAL_OPEN_TICKETS'] = "Aperto ({0})";
$LANG['TEXT_TOTAL_ANSWERED_TICKETS'] = "Risposto ({0})";
$LANG['TEXT_TOTAL_MY_TICKETS'] = 'I Miei Ticket ({0})';
$LANG['TEXT_TICKET_ASSIGNED_TO_STAFF'] = 'Ticket assegnato a {0}';
$LANG['TEXT_TICKET_CREATED'] = 'Ticket richiesta di supporto creato';
$LANG['TEXT_TICKET_CREATED_SUCCESSFULLY'] = 'Ticket creato con successo';
$LANG['TEXT_TICKET_DELETED_FOREVER'] = 'Ticket eliminato permanentemente';
$LANG['TEXT_TICKET_FLAGGED_AS_OVERDUE'] = 'Ticket marcato come scaduto';
$LANG['TEXT_TICKET_NUM_STATUS_SET_CLOSED'] = 'Ticket n. {0}: stato impostato a CHIUSO';
$LANG['TEXT_TICKET_NUMBER'] = 'Ticket n.';
$LANG['TEXT_TICKET_STATUS'] = 'Stato Ticket';
$LANG['TEXT_TICKET_STATUS_CHANGED_TO'] = 'Stato Ticket cambiato in {0}';
$LANG['TEXT_TICKET_STATUS_SET_TO_OPEN'] = 'Stato Ticket impostato ad APERTO';
$LANG['TEXT_TICKET_THREAD'] = 'Discussione Ticket';
$LANG['TEXT_TICKET_TRANSFERED_SUCESSFULLY_TO_DEPT'] = 'Ticket transferito con successo al Dip. {0}';
$LANG['TEXT_TICKET_UPDATED_SUCCESSFULLY'] = 'Ticket aggiornato con successo';
$LANG['TEXT_TICKET_WILL_REOPEN_NEW_POST']='Il Ticket sar&#224; riaperto alla pubblicazione del messaggio';
$LANG['TEXT_TICKETS_STATUS'] = 'Stato Ticket';
$LANG['TEXT_THANKS_NEW_TICKET'] = 'Grazie per averci contattati.<br>Un Ticket di richiesta di supporto &#232; stato creato ed un nostro incaricato si metter&#224; in contatto con voi a breve se necessario.';
// TEXT U
$LANG['TEXT_UNABLE_CREATE_TICKET'] = 'Impossibile creare il Ticket: correggere gli errori sottoindicati e riprovare!';
$LANG['TEXT_UPDATE_TICKET'] = 'Aggiorna Ticket #{0}';
$LANG['TEXT_USED_FOR_OUTGOING_EMAILS'] = 'Utilizzato per mail in uscita, allarmi e comunicazioni all\'utente e allo Staff.';
// TEXT V
$LANG['TEXT_VIEW_OPEN']='Vedi Aperti';
$LANG['TEXT_VIEW_CLOSED']='Vedi Chiusi';
$LANG['TEXT_VIEW_TICKET'] = 'Vedi Ticket';
$LANG['TEXT_VISIBLE_TO_CLIENT'] = 'Visibile al cliente.';
// TEXT X
// TEXT Y
$LANG['TEXT_YOUVE_REACHED_MAXIMUM_FAILED_LOGIN_ATTEMPTS_ALLOWED']='&#200; stato raggiunto il limite massimo di tentativi di accesso falliti.';
// TEXT W
$LANG['TEXT_WELCOME_BACK_VACATION']= 'Bentornato! Sei registrato come \'in vacanza\': per favore fai sapere all\'Amministratore o al tuo Supervisore che sei tornato.';
$LANG['TEXT_WELCOME_BACK_CLIENT'] = 'Bentornato, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_BACK_STAFF'] = 'Bentornato, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_TITLE'] = 'Benvenuto nel centro di supporto';
$LANG['TEXT_WELCOME_MSG'] = 'Allo scopo di ottimizzare le richieste di supporto e servirti meglio, utilizziamo un sistema di supporto Ticket. Ad ogni richiesta &#232; attribuito un numero che puoi usare per seguire lo storico delle risposte on line. Potrai inoltre consultare il nostro archivio completo di tutte le tue richieste di supporto.';
$LANG['TEXT_WELCOME_BACK'] = 'Bentornato';

########
## Titles on pages and web pages
##
$LANG['TITLE'] = 'Tickets FullService'; //en_US
$LANG['TITLE_BOX_NEW_TICKET'] = 'Nuovo Ticket';
$LANG['TITLE_BAR_OFFLINE'] = 'Support Ticket System Offline'; //en_US
$LANG['TITLE_MY_PREFERENCES'] = 'Le Mie Preferenze';
$LANG['TITLE_OFFLINE'] = 'Sistema Ticket di Assistenza Non Disponibile';
$LANG['TITLE_OPEN_PREVIUS_TICKET'] = 'Verifica Ticket Esistente';
$LANG['TITLE_CLOSED_TICKETS'] = 'Ticket Chiusi';
?>
