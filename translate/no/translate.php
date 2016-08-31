<?php

#Disable direct access.
if (!strcasecmp(basename($_SERVER['SCRIPT_NAME']), basename( __FILE__ ))) die ('kwaheri rafiki!');

$LANG = array ();

# Language identification in iso-639
$LANG['LANGUAGE'] = 'sv';
//Word Name (english name)
$LANG['LANGUAGE_NAME'] = 'Swedish';
//Native name of language (in the original language)
$LANG['LANGUAGE_NATIVE_NAME'] = 'Svenska';
$LANG['DIRECTION'] = 'ltr';
$LANG['CODEPAGE'] = 'UTF-8';

########
##Alert Messages, normally used with JavaScript dialog box.
##
$LANG['ALERT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='Excessive login attempts by a client'."\n".
                'Email: {0}'."\n".
				'Ticket#: {1}'."\n".
                'IP: {2}'."\n".
				'Time: {3}'."\n\n".
                'Attempts #{4}';

#######
## Error Messages
##
$LANG['ERROR_ACCESS_DENIED_INVALID_TICKET'] = 'Ugyldig forespørsel. Kontroller din forespørsel-ID';
$LANG['ERROR_EMAIL_PARSE_FAILED'] = 'Kunne ikke lese epostadressen';
$LANG['ERROR_FILE_REJECTED'] = 'Filen {0} godkjennes ikke!';
$LANG['ERROR_INVALID_FROM_ADDRESS'] = 'Ugyldig epost adressse';
$LANG['ERROR_INVALID_FILE_TYPE'] = 'Ulovlig filtype';
$LANG['ERROR_MESSAGE_REQUIRED'] = 'En beskjed må fylles inn';
$LANG['ERROR_NAME_REQUIRED'] = 'Navn må fylles inn';
$LANG['ERROR_OCCURED'] = 'Feil oppstod. Forsøk en gang til';
$LANG['ERROR_OCCURED_TRY_AGAIN'] = 'Feil oppstod. Forsøk igjen';
$LANG['ERROR_POSSIBLY_INVALID_TICKET'] = 'Ugyldig forespørsel. Kontroller din forespørsel-ID';
$LANG['ERROR_SERVICES_NOT_AVAILABLE'] = 'Tjenesten er ikke tilgjengelig!';
$LANG['ERROR_SECURITY_REPEAT_RESULT_LOCK'] = 'Advarsel! Hvis du overtrer sikkerheten igjen, vil din konto bli stengt.';
$LANG['ERROR_SECURITY_VIOLATION_YOUR_ACCOUNT_WILL_LOCKED'] = 'Advarsel! Hvis du overtrer sikkerheten igjen, vil din konto bli stengt';
$LANG['ERROR_UNABLE_SEND_MESSAGE_TRY_AGAIN'] = 'Kunne ikke sende beskjed, forsøk en gang til.';
$LANG['ERROR_UNABLE_TO_POST_THE_RESPONSE']='Kunne ikke sende svaret';
$LANG['ERROR_UNKNOW_ACTION'] = 'Ukjent aktion';
$LANG['ERROR_UNABLE_TO_POST_MESSAGE'] = 'Kunne ikke sende beskjed, forsøk en gang til.';
$LANG['ERROR_UKNOW_ACTION'] = 'Ukjent action';
$LANG['ERROR_YOU_HAVE_REACHED_MAXIMUM_FAILED_LOGIN']='Ditt login forsøk har feilet for mange ganger. Vent i 5 minutter og prøv igjen';
$LANG['ERROR_YOU_MUST_CHANGE_PASSWORD'] = 'Du må bytte passord for å fortsette';
$LANG['ERROR_SEARCH_TERM_MORE_3']='Søkeordet må være lenger enn 3 tegn';
$LANG['ERROR_EMAIL_REQUIRED']='Gylid epost adresse kreves';
$LANG['ERROR_HELPTOPIC_REQUIRED']='Kategori kreves';
$LANG['ERROR_SUBJECT_REQUIRED']='Emne kreves';
$LANG['ERROR_ENTER_TEXT_IN_IMAGE']='Skriv teksten du ser på bilde'; 

#######
## Images for Staff and Clients Ends
##
## relative path of images in "translate/".$LANG['LANGUAGE']."/"
##
$LANG['IMAGE_CLIENT_VIEW_OPEN'] = 'client/view_open.gif';
$LANG['IMAGE_CLIENT_VIEW_CLOSED'] = 'client/view_closed.gif';
$LANG['IMAGE_CLIENT_REFRESH'] = 'client/refresh.gif';
$LANG['IMAGE_STAFF_VIEW_OPEN'] = 'staff/view_open.gif';
$LANG['IMAGE_STAFF_VIEW_CLOSED'] = 'staff/view_closed.gif';
$LANG['IMAGE_STAFF_REFRESH'] = 'staff/refresh.gif';

#######
## Labels for Buttons, Headers on Tables, Selections, Link Texts and others
##
// Label A
$LANG['LABEL_ACTIVE_IN_PARENTESIS'] = '(Aktiv)'; 
$LANG['LABEL_ADD_NEW_DEPT'] = 'Legg til ny avdelning.';
$LANG['LABEL_ADMIN_DASHBOARD'] = 'Adminpanel';
$LANG['LABEL_ADMIN_PANEL'] = 'Adminpanel';
$LANG['LABEL_ADVANCED'] = 'Avansert';
$LANG['LABEL_APPEND'] = 'Legg til';
$LANG['LABEL_APPEND_SIGNATURE'] = 'Legg til signatur';
$LANG['LABEL_ALL'] = 'Alle';
$LANG['LABEL_ALL_DEPARTMENTS'] = 'Alle avdelninger';
$LANG['LABEL_API'] = 'API';
$LANG['LABEL_ASSIGN'] = 'Tilldela';
$LANG['LABEL_ASSIGN_TO_STAFF'] = 'Tilldel til personal';
$LANG['LABEl_ASSIGNED_TICKETS'] = 'Tildelte forespørsler';
$LANG['LABEL_ASC'] = 'ASC';
$LANG['LABEL_ASCENDING'] = 'Stigende';
$LANG['LABEL_ATTACHMENT'] = 'Legg ved fil';
$LANG['LABEL_ATTACHMENTS'] = 'Vedlagte filer';
$LANG['LABEL_AUTO_RESPONSE_EMAIL'] = 'Autosvar';
$LANG['LABEL_AUTORESPONDERS'] = 'Autoresponders';
$LANG['LABEL_AUTORESP'] = 'Autosvar';
// Label B
$LANG['LABEL_BASIC'] = 'Grunn';
// Label C
$LANG['LABEL_CLOSE'] = 'Steng';
$LANG['LABEL_CLOSED'] = 'Stengt';
$LANG['LABEL_CLOSE_TICKET'] = 'Lukk forespørselen';
$LANG['LABEL_CLOSED_TICKETS'] = 'Lukkede forespørsler';
$LANG['LABEL_CANCEL'] = 'Avbryt';
$LANG['LABEL_CANNED_RESPONSE'] = 'Standard svar';
$LANG['LABEL_CATEGORY'] = 'Kategori';
$LANG['LABEL_CATEGORY_DEPT'] = 'Kategori/Avdelning';
$LANG['LABEL_CHANGE_PASSWORD'] = 'Bytte passord';
$LANG['LABEL_CHECK_STATUS'] = 'Kontroller status';
$LANG['LABEL_Closed'] = 'Stengt';
$LANG['LABEL_CREATE_DATE'] = 'Opprettelse dato';
// Label D
$LANG['LABEL_DASHBOARD'] = 'Kontrollpanel';
$LANG['LABEL_DATE'] = 'Dato';
$LANG['LABEL_DATE_SPAN'] = 'Datumspann';
$LANG['LABEL_DEFAULT'] = 'Standard';
$LANG['LABEL_DELETE'] = 'Ta bort';
$LANG['LABEL_DELETE_DEPT_S'] = 'Ta bort avdeling(er)';
$LANG['LABEL_DEPARTMENT'] = 'Avdeling';
$LANG['LABEL_DEPARTMENTS'] = 'Avdelinger';
$LANG['LABEL_DEPT_MANAGER'] = 'Avdelingsleder';
$LANG['LABEL_DEPT_MANAGER_NONE'] = 'Ingen';
$LANG['LABEL_DEPT'] = 'Avd.';
$LANG['LABEL_DEPT_ACCESS'] = 'Avdeling';
$LANG['LABEL_DEPT_NAME'] = 'Navn på avdeling';
$LANG['LABEL_DEPT_EMAIL'] = 'Epost til avdeling';
$LANG['LABEL_DEPT_EMAIL_ABOVE'] = 'Epost til avdelning (over)';
$LANG['LABEL_DEPT_SIGNATURE'] = 'Avdelingens signatur';
$LANG['LABEL_DEPT_TYPE'] = 'Type av avdeling';
$LANG['LABEL_DESC'] = 'DESC';
$LANG['LABEL_DESCENDING'] = 'Fallande';
$LANG['LABEL_DISABLED_IN_PARENTESIS'] = '(avaktivert)';
$LANG['LABEL_DIRECTORY'] = 'Katalog';
$LANG['LABEL_DIRECTORY_STAFF'] = 'Personalkatalog';
// Label E
$LANG['LABEL_EMAIL'] = 'E-post';
$LANG['LABEL_EMAILS'] = 'E-post';
$LANG['LABEL_EMAILS_SETTINGS'] = 'Instillinger epost';
$LANG['LABEL_EMAIL_ADDRESS'] = 'Epost';
$LANG['LABEL_EMAIL_TEMPLATES'] = 'Epostmaler';
$LANG['LABEL_ENABLE_SYSTEM_OFF_LINE'] = 'Aktivere';
$LANG['LABEL_ENTER_NOTE_CONTENT'] = 'Skriv inn beskjedens innehold.';
// Label F
$LANG['LABEL_FROM'] = 'Fra.';
$LANG['LABEL_FULL_NAME'] = 'Fullt navn';
// Label G
$LANG['LABEL_GENERAL_SETTINGS'] = 'Generelle instillinger';
$LANG['LABEL_GO'] = 'GO';
// Label H
$LANG['LABEL_HELP_TOPIC'] = 'Kategori';
$LANG['LABEL_HELP_TOPICS'] = 'Emne';
$LANG['LABEL_HELPDESK_ATTEMPT_ALLOWED_BEFORE_A'] = 'forsøk lov&nbsp;før en';
$LANG['LABEL_HELPDESK_BIND_STAFF_SESSION_TO_IP'] = 'Bind ip adressen til login økten';
$LANG['LABEL_HELPDESK_CLIENT_EXCESSIVE_LOGINS'] = 'For mange login fra denne klienten';
$LANG['LABEL_HELPDESK_CLIENT_SESSION_TIMEOUT'] = 'Klient økten er avbrutt';
$LANG['LABEL_HELPDESK_CLICKABLE_URLS'] = 'Klikkbare lenker';
$LANG['LABEL_HELPDESK_DEFAULT_DEPARTMENT'] = 'Standard avdeling';
$LANG['LABEL_HELPDESK_DEFAULT_EMAIL_TEMPLATES'] = 'Standard epost mal';
$LANG['LABEL_HELPDESK_ENABLE_AUTO_CRON'] = 'Aktiver automatisk cron';
$LANG['LABEL_HELPDESK_MAKE_URLS_CLICKABLE'] = 'Lag klikkbare lenker';
$LANG['LABEL_HELPDESK_NAME_TITLE'] = 'Helpdesk navn/tittel';
$LANG['LABEL_HELPDESK_NONE_DISABLE_LOGGER'] = 'Ingen (deaktiver logger)';
$LANG['LABEL_HELPDESK_PENALTY_IN_MINUTES'] = 'min. tidsavbrudd (straff i antall minutter)';
$LANG['LABEL_HELPDESK_PURGE_NONE_DISABLE'] = 'Ingen (deaktiver)';
$LANG['LABEL_HELPDESK_PURGE_LOGS_AFTER'] = 'Slett logger etter';
$LANG['LABEL_HELPDESK_DEFAULT_PAGE_SIZE'] = 'Standard side størrelse';
$LANG['LABEL_HELPDESK_SELECT_DEFAULT_DEPARTMENT'] = 'Velg standard avdeling';
$LANG['LABEL_HELPDESK_SELECT_DEFAULT_TEMPLATE'] = 'Velg standard mal'; 
$LANG['LABEL_HELPDESK_STAFF_EXCESSIVE_LOGINS'] = 'For mange login';
$LANG['LABEL_HELPDESK_STAFF_SESSION_TIMEOUT'] = 'Økten er avbrutt';
$LANG['LABEL_HELPDESK_STATUS'] = 'Helpdesk Status';
$LANG['LABEL_HELPDESK_SYSTEM_LOG_LEVEL'] = 'System log nivå'; 
$LANG['LABEL_HELPDESK_URL'] = 'Helpdesk URL';
// Label I
// Label J

// Label K
$LANG['LABEL_KNOWLEDGE_BASE'] = 'Hjelpesider';
$LANG['LABEL_KNOWLEDGE_BASE_PREMATE'] = 'Kunnskapsbase: Forhåndslaget';
// Label L
$LANG['LABEL_LOG_OUT'] = 'Logg ut';
$LANG['LABEL_LAST_UPDATED'] = 'Senest oppdatert';
// Label M
$LANG['LABEL_MAKE_PUBLIC'] = 'Sett til åpen';
$LANG['LABEL_MAKE_PRIVATE'] = 'Sett til privat';
$LANG['LABEL_MANAGER'] = 'Leder';
$LANG['LABEL_MESSAGE'] = 'Beskjed';
$LANG['LABEL_MONTHS'] = 'Måneder';
$LANG['LABEL_MONTH'] = 'Måned';
$LANG['LABEL_MY_ACCOUNT'] = 'Min konto';
$LANG['LABEL_MY_PREFERENCE'] = 'Mine instillninger';
$LANG['LABEL_MY_PROFILE'] = 'Min Profil';
$LANG['LABEL_MY_SIGNATURE'] = 'Min signatur';
// Label N
$LANG['LABEL_NAME'] = 'Navn';
$LANG['LABEL_NEW_DEPARTMENT'] = 'Ny avdeling';
$LANG['LABEL_NEW_MESSAGE'] = 'Ny beskjed';
$LANG['LABEL_NEW_PREMADE_REPLY'] = 'Nytt forhåndslaget svar';
$LANG['LABEL_NEW_TICKET'] = 'Ny forespørsel';
$LANG['LABEL_NEW_TICKET_PRIORITY'] = 'Prioritet på ny forespørsel';
$LANG['LABEL_NO_MANAGER_ADD_USERS'] = 'Ingen brukere (legg til brukere)';
$LANG['LABEL_NONE'] = 'None';
$LANG['LABEL_NOTE_TITLE'] = 'Tittel på beskjeden';
// Label O
$LANG['LABEL_OPEN'] = 'Åpne';
$LANG['LABEL_OPEN_TICKET'] = 'Åpne forespørsel';
$LANG['LABEL_OPEN_NEW_TICKET'] = 'Åpne ny forespørsel';
$LANG['LABEL_OTHER'] = 'Annet';
$LANG['LABEL_OUTGOING_EMAIL'] = 'utgående epost';
$LANG['LABEL_OVERDUE'] = 'Forsinket';
// Label P
$LANG['LABEL_PREFERENCES'] = 'Instillinger';
$LANG['LABEL_PUBLIC'] = 'Åpen';
$LANG['LABEL_PRIVATE'] = 'Privat';
$LANG['LABEL_PRIVATE_HIDDEN'] = 'Privat (skjult)';
$LANG['LABEL_PAGE'] = 'side';
$LANG['LABEL_PASSWORD'] = 'Passord';
$LANG['LABEL_PASSWORD_AGAIN'] = 'Passord (igjen)';
$LANG['LABEL_PHONE'] = 'Telefon';
$LANG['LABEL_POST_INTERNAL_NOTE'] = 'Send intern beskjed';
$LANG['LABEL_POST_REPLY']='Send svar';
$LANG['LABEL_PREFERENCES'] = 'Instillinger';
$LANG['LABEL_PRIORITY'] = 'Prioritet';
$LANG['LABEL_PRIMARY_OUTGOING_EMAIL'] = 'Primær utgående epost';
$LANG['LABEL_PREMADE_REPLIES'] = 'Forhåndslaget svar';
// Label Q
$LANG['LABEL_QUERY'] = 'Søk';
$LANG['LABEL_QUERY_RETURNED_ZERO_RESULT'] = 'Søket fant ingen oppføringer';
// Label R
$LANG['LABEL_RE_ASSIGN_TICKET'] = 'Tildel til personalet igjen';
$LANG['LABEL_REOPEN'] = 'Gjenåpne';
$LANG['LABEL_REOPEN_TICKET'] = 'Gjenåpne forespørselen';
$LANG['LABEL_RESET'] = 'Nullstill';
$LANG['LABEL_RESULTS_PER_PAGE'] = 'Resultater per side';
$LANG['LABEL_REPLY_TITLE'] = 'Tittel på svar';
// Label S
$LANG['LABEL_SEARCH'] = 'Søk';
$LANG['LABEL_SEARCH_FOR'] = 'Søk etter';
$LANG['LABEL_SELECT'] = 'Velg';
$LANG['LABEL_SELECT_DEPARTMENT'] = 'Velg avdeling';
$LANG['LABEL_SELECT_MANAGER_OPTIONAL'] = 'Velg leder (valgfri)';
$LANG['LABEL_SELECT_ONE_TOPIC'] = 'Velg en';
$LANG['LABEL_SELECT_ONE_EMAIL'] = 'Velg en';
$LANG['LABEL_SELECT_PRIORITY'] = 'Velg prioritet';
$LANG['LABEL_SELECT_SOURCE'] = 'Velg kilde';
$LANG['LABEL_SELECT_TEMPLATE'] = 'Velg mal';
$LANG['LABEL_SETTINGS'] = 'Instillinger';
$LANG['LABEL_SORT_BY'] = 'Sorter etter';
$LANG['LABEL_SORT_BY_TITLE'] = 'Sorter etter titel';
$LANG['LABEL_SORT_BY_UPDATE_DATE'] = 'Sorter etter forespørselsdato';
$LANG['LABEL_STAFF'] = 'Personal';
$LANG['LABEL_STAFF_MEMBER'] = 'Medlem';
$LANG['LABEL_STAFF_MEMBERS'] = 'Medlemmer av personalet';
$LANG['LABEL_STAFF_PANEL'] = 'Personalpanel';
$LANG['LABEL_STATUS'] = 'Status';
$LANG['LABEL_STATUS_IS'] = 'Status er';
$LANG['LABEL_SUBJECT'] = 'Emne';
$LANG['LABEL_SUBMIT'] = 'Send';
$LANG['LABEL_SUBMIT_TICKET'] = 'Registrer forespørsel';
$LANG['LABEL_SYSTEM_DEFAULT_TEMPLATE'] = 'System standard';
$LANG['LABEL_SYSTEM_LOGS'] = 'Systemlogg';
$LANG['LABEL_SYSTEM_PREFERENCES_AND_SETTINGS'] = 'Systeminstillinger og system';
$LANG["LABEL_SYSTEM_SETTINGS"] = 'Systeminstillinger';
// Label T
$LANG['LABEL_TELEPHONE'] = 'Telefon';
$LANG['LABEL_TICKET'] = 'Forespørsel';
$LANG['LABEL_TICKET_ID'] = 'Forespørsel-ID';
$LANG['LABEL_TICKET_NUMBER'] = 'ID nr.#';
$LANG['LABEL_TICKET_STATUS'] = 'Forespørselstatus';
$LANG['LABEL_TO'] = 'Till.';
$LANG['LABEL_TOGGLE'] = 'Veksle';
$LANG['LABEL_TRANSFER'] = 'Overføring';
$LANG['LABEL_TYPE'] = 'Type';
// Label U
$LANG['LABEL_UPDATE_DATE'] = 'Sist oppdatert';
$LANG['LABEL_UPDATE_DEPARTMENT'] = 'Oppdater avdeling';
$LANG['LABEL_USERNAME'] = 'Brukernavn';
$LANG['LABEL_USERS'] = 'Brukere';
// Label V
$LANG['LABEL_VIEW_STATUS'] = 'Vis status';

#Stuff not translated in Swedish.. so we have to create them..
$LANG['LABEL_SYSTEM_LOGS_DATESPAN'] = 'Periode (mm/dd/åååå)';
$LANG['LABEL_SYSTEM_LOGS_FROM'] = 'fra';
$LANG['LABEL_SYSTEM_LOGS_TO'] = 'til';
$LANG['LABEL_SYSTEM_LOGS_TYPE'] = 'Kategori';
$LANG['LABEL_SYSTEM_LOGS_ALL'] = 'Alle';
$LANG['LABEL_SYSTEM_LOGS_ERRORS'] = 'Feil';
$LANG['LABEL_SYSTEM_LOGS_WARNINGS'] = 'Advarsler';
$LANG['LABEL_SYSTEM_LOGS_DEBUG'] = 'Debug';
$LANG['LABEL_SYSTEM_LOGS_GO'] = 'Vis';

$LANG['LABEL_DATE_AND_TIME'] = 'Dato og tid';
$LANG['TEXT_PLEASE_REFER_TO'] = 'Se';
$LANG['TEXT_PHP_MANUAL'] = 'PHP manualen';
$LANG['TEXT_FOR_SUPPORTED_PARAMETERS'] = 'for mer informasjon om disse instillingene';
$LANG['LABEL_TIME_FORMAT'] = 'Format for tid';
$LANG['LABEL_DATE_FORMAT'] = 'Format for dato';
$LANG['LABEL_DATE_AND_TIME_FORMAT'] = 'Format for tid og dato';
$LANG['LABEL_DAY_DATE_AND_TIME_FORMAT'] = 'Format for dag, tid og dato';
$LANG['LABEL_DEFAULT_TIME_ZONE'] = 'Tidssone';
$LANG['LABEL_DAYLIGHT_SAVING'] = 'Sommertid';
$LANG['TEXT_OBSERVE_DAYLIGHT_SAVINGS'] = 'Automatisk';
$LANG['TEXT_SELECT_ONE_TOPIC'] = 'Velg en kategori';
$LANG['LABEL_CAPTCHA'] = 'Skriv teksten du ser på bilde';


#######
## Generic text for all site, if have to text repeted in
## Client or Staff ends, is prefixed with correct name.
##
// TEXT A
$LANG['TEXT_ACCESS_DENIED']='Tilgang nektes';
$LANG['TEXT_ALL_DEPARTMENTS'] = 'Alle avdelinger';
$LANG['TEXT_ANSWERED_STATS'] = 'Besvarte forespørsler ({0})';
$LANG['TEXT_ANSWERED_TICKETS'] = 'Besvarte forespørsler';
$LANG['TEXT_AND_STATUS_SET_TO'] = ' og status markert {0}';
$LANG['TEXT_AND_TICKET_STATUS_SET_TO_CLOSED'] = ' & forespørselens status markert lukket';
$LANG['TEXT_ASSIGNED_TICKETS'] = 'Tildelte forespørsler';
$LANG['TEXT_AUTHENTICATION_REQUIRED']='Login kreves';
$LANG['TEXT_AUTHENTICATION_REQUIRED_QUESTION']='Login kreves?';
$LANG['TEXT_ANY_STATUS'] = 'Alle statuser';
$LANG['TEXT_ATTACH_FILE']='legg til fil';
// TEXT B
$LANG['TEXT_BOX_NEW_TICKET'] = '';
// TEXT C
$LANG['TEXT_CAM_BE_APPENDED_TO_RESPONSES'] = 'kan legges til svaret.&nbsp;(tilgjengelig som valg for avdelinger)';
$LANG['TEXT_CLOSED_TICKETS'] = 'Lukk forespørselen';
$LANG['TEXT_CLOSED'] = 'Lukket';
$LANG['TEXT_COMMENTS_REASONS_TRANSFER'] = 'Grunn til overføring. &nbsp;(<i>internt notat</i>)';
$LANG['TEXT_CREATE_FAILED'] = 'Kunne ikke opprette ';
// TEXT D
$LANG['TEXT_DEPT_DEPENDS_ON_EMAIL'] = 'Avdelingen er avhenging av epost &amp; support emnets instillinger for inkommende forespørsler.';
$LANG['TEXT_DEPT_TRANSFER'] = 'Overfør til avdeling';
$LANG['TEXT_DEPT_UPDATED_SUCCESSFULLY'] = 'Avdelingen er oppdatert';
// TEXT E
$LANG['TEXT_EMAIL_ADDED_TO_BANLIST'] = 'E-postadressen ({0}) er svartelistet';
$LANG['TEXT_EMAIL_ADDRESS_USED_SEND_AUTO_RESPONSES'] = 'E-posten som brukes til å sende automatisk svar (hvis aktivert)';
$LANG['TEXT_EMAIL_REMOVED_FROM_BANLIST'] = 'e-posten er fjernet fra svartelisten';
$LANG['TEXT_ENTER_MESSAGE']='Skriv beskjed';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS']='For mange innlogginsforsøk';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='For mange innlogginsforsøk (klient)';
// TEXT F
$LANG['TEXT_FILE_REJECTED'] = 'Filen [ {0} ] kunne ikke lastes opp';
$LANG['TEXT_FILE_IS_TOO_BIG'] = 'Filen er for stor. Maks {0} bytes er tillatt';
$LANG['TEXT_FORGOT_YOUR_LOGIN_INFO']='Glemt din login? <a href="open.php">Send oss gjerne en forespørsel</a>.';
// TEXT G
$LANG['TEXT_GENERAL_INQUIRY'] = 'Standard forespørsel';
$LANG['TEXT_GLOBAL_AUTO_RESPONSE_SETTINGS'] = 'Globale auto-svar instillinger (under instillinger) må aktiveres først.';
// TEXT H
$LANG['TEXT_HOME'] = 'Startside';
$LANG['TEXT_HEADER_TITLE']='LinSpes Support Portal';
$LANG['TEXT_HELPDESK_STAFF_MAX_IDLE_TIME_IN_MINUTES'] = '(<i>Personalet\'s dødtid i minutter før automatisk avlogging (0 = deaktivert)</i>)';
$LANG['TEXT_HELPDESK_CLIENT_MAX_IDLE_TIME_IN_MINUTES'] = '(<i>Klienten\'s dødtid i minutter før automatisk avlogging (0 = deaktivert)</i>)';
$LANG['TEXT_HELPDESK_ENABLE_CRON_CALL_ON_STAFF_ACTIVITY'] = 'Aktiver cron for personalet\'s aktivitet';
// TEXT I
$LANG['TEXT_INTERNAL_NOTE_POSTED'] = 'Intern kommentar lagret';
$LANG['TEXT_INVALID_LOGIN'] = 'Inkorrekt login';
$LANG['TEXT_INVALID_FILE_TYPE'] = 'Feil filtype [ {0} ]';
// TEXT J
// TEXT K
// TEXT L
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET']='Fyll inn skjemaet for å se status på en spesifik forespørsel.<br/>'.
        'Hvis dette er første gangen du er her, eller har mistet din forespørsels-ID, <a href="open.php">klikker du her</a> for å sende en ny forespørsel';	
$LANG['TEXT_LOG_OUT'] = 'Logg ut';
// TEXT M
$LANG['TEXT_MY_TICKETS'] = 'Mine forespørsler';
$LANG['TEXT_MY_TICKETS_STATS'] = 'Mine forespørsler ({0})';
$LANG['TEXT_MY_ACCOUNT'] = 'Min konto';
// TEXT N
$LANG['TEXT_NEW_TICKET'] = 'Ny forespørsel';
$LANG['TEXT_NOT_THIS_USER'] = 'Jeg er ikke denne brukeren';
$LANG['TEXT_NEW_TICKET_AUTO_RESPONSE'] = 'En epost med forespørselsnummeret er sendt til <b>{0}</b>. Du trenger forespørselsnummeret og din epostadresse for å finne forespørselen\'s status i vår online portal.<br><br>Hvis du vil sende mer informasjon eller kommentarer til forespørselen, må du følge instruksjonene i epostmeldingen.';
$LANG['TEXT_NO_TICKETS_FOUND']='Fant ingen forespørsler.';
// TEXT O
$LANG['TEXT_OPEN_NEW_TICKET'] = 'Åpne ny forespørsel';
$LANG['TITLE_OPEN_PREVIOUS_TICKET'] = 'Sjekk forespørsel';
$LANG['TEXT_OPEN_PREVIOUS_TICKET'] = '';
$LANG['TEXT_OPEN_TICKETS'] = 'Åpne forespørsel';
$LANG['TEXT_OPEN'] = 'Åpne';
$LANG['TEXT_OVERDUE_STATS'] = 'Forfalte ({0})';
$LANG['TEXT_OVERDUE_TICKETS'] = 'Forfalte forespørsler';
$LANG['TEXT_OVERDUE'] = 'Forfalte';
$LANG['TEXT_OFFLINE']='Takk for at du kontaktet oss.<br>'.
         'Support portalen er for øyeblikket stengt. Vennligst kom tilbake senere.';
$LANG['TEXT_OFFLINE_MODE_WILL_DISABLE_CLIENT'] = 'Offline-modus stenger klientgrensesnittet og tillater <b>bare</b>'.
         '<b>administratorer</b> å logge inn i kontrollpanelet';
$LANG['TEXT_OF_SELECTED_TICKETS_REOPENED'] = "{0} av {1} valgte forespørsler gjenvalda ärenden återöppnades";
$LANG['TEXT_OF_SELECTED_TICKETS_CLOSED'] = "{0} av {1} valgte forespørsler lukket";
$LANG['TEXT_OF_SELECTED_TICKETS_MARKED_OVERDUE'] = "{0} av {1} valgte forespørsler markert forfalt";
$LANG['TEXT_OF_SELECTED_TICKETS_DELETED'] = "{0} av {1} valgte forespørsler fjernet";
// TEXT P
$LANG['TEXT_POST_REPLY']='Send svar';
$LANG['TEXT_PLEASE_FILL_STAFF_FORM_BELOW_OPEN_NEW_TICKET'] = 'Fyll inn skjemaet for å sende en ny forespørsel.';
$LANG['TEXT_PLEASE_FILL_FORM_NEW_TICKET'] = 'Fyll inn skjemaet for å sende en ny forespørsel.';
$LANG['TEXT_PLEASE_TAKE_A_MINUTE_TO_DELETE_INSTALL'] = 'Du bør fjerne katalogen <strong>setup/install</strong> av hensyn til sikkerheten.';
$LANG['TEXT_PRIORITY_CHANGED_SUCCESSFULLY'] = 'Prioriteten endret';
// TEXT Q
// TEXT R
$LANG['TEXT_REFRESH']='Oppdater';
$LANG['TEXT_REQUIRED_WHEN_DEPT_IS_PUBLIC'] = 'Kreves når avdelingen er åpen';
$LANG['TEXT_RESPONSE_POSTED_SUCCESSFULLY'] = 'Svar sendt';
// TEXT S
$LANG['TEXT_SELECT_DEPARTMENTS_GROUP_MEMBERS'] = 'Velg avdelinger som gruppemedlemmer skal ha tilgang til (utenom sin egen avdeling).';
$LANG['TEXT_SELECT_PREMADE_REPLY'] = 'Velg forhåndslaget svar';
$LANG['TEXT_SELECT_STAFF_MEMBER'] = '-Velg medlem av personalet.-';
$LANG['TEXT_SELECT_TARGET_DEPT'] = '-Velg mottager avdeling-';
$LANG['TEXT_SESSION_TIMED_OUT_DUE_TO_INACTIVITY']='Økten avbrutt pga. inaktivitet.';
$LANG['TEXT_SORT_BY_CATEGORY'] = 'Sorter etter kategori';
$LANG['TEXT_SORT_BY_DATE']='Sortera etter dato';
$LANG['TEXT_SORT_BY_DEPARTMENT']='Sorter etter avdeling';
$LANG['TEXT_SORT_BY_TICKET_ID']='Sorter etter forespørsels-ID ';
$LANG['TEXT_SORT_BY_PRIORITY'] = 'Sorter etter prioritet';
$LANG['TEXT_SHOW_FROM_TO_OF_ALL'] = 'Viser {0} - {1} av {2}';
$LANG['TEXT_SHOW_ZERO'] = 'Viser 0 (null)';
$LANG['TEXT_SEARCH_RESULTS'] = 'Søkeresultat';
$LANG['TEXT_SYSTEM_IS_OFF_LINE'] = '<strong>Support portalen er offline</strong> - klientgrensesnittet er lukket og bare administratorer kan logge inn.';
$LANG['TEXT_SUPPORT_TEAM'] = 'Support gruppe';
$LANG['TEXT_SUPPORT_TICKET_SISTEM'] = '<span>Support</span>portal';
$LANG['TEXT_SUPPORT_CENTER'] = 'Support portal';
// TEXT T
$LANG['TEXT_TOTAL_OPEN_TICKETS'] = "Åpne ({0})";
$LANG['TEXT_TOTAL_ANSWERED_TICKETS'] = "Besvarte ({0})";
$LANG['TEXT_TOTAL_MY_TICKETS'] = 'Mine forespørsler ({0})';
$LANG['TEXT_TICKET_ASSIGNED_TO_STAFF'] = 'Forespørselen tildelt {0}';
$LANG['TEXT_TICKET_CREATED'] = 'Forespørselen opprettet';
$LANG['TEXT_TICKET_CREATED_SUCCESSFULLY'] = 'Forespørselen opprettet uten problem';
$LANG['TEXT_TICKET_DELETED_FOREVER'] = 'Forespørselen er fjernet permanent';
$LANG['TEXT_TICKET_FLAGGED_AS_OVERDUE'] = 'Forespørselen er markert som forfalt';
$LANG['TEXT_TICKET_NUM_STATUS_SET_CLOSED'] = 'Forespørsel med ID-nr #{0}s status har blitt forandret til LUKKET';
$LANG['TEXT_TICKET_NUMBER'] = 'Forespørsel ID-nr #';
$LANG['TEXT_TICKET_STATUS'] = 'Forespørselens status';
$LANG['TEXT_TICKET_STATUS_CHANGED_TO'] = 'Forespørselens status har blitt forandret til {0}';
$LANG['TEXT_TICKET_STATUS_SET_TO_OPEN'] = 'Forespørselens status ÅPEN';
$LANG['TEXT_TICKET_THREAD'] = 'Forespørselens historie';
$LANG['TEXT_TICKET_TRANSFERED_SUCESSFULLY_TO_DEPT'] = 'Forespørselen overført til {0}-avdelingen.';
$LANG['TEXT_TICKET_UPDATED_SUCCESSFULLY'] = 'Forespørselen er oppdatert';
$LANG['TEXT_TICKET_WILL_REOPEN_NEW_POST']='Forespørselen vil bli gjenåpnet ved en ny beskjed';
$LANG['TEXT_TICKETS_STATUS'] = 'Forespørselstatus';
$LANG['TEXT_THANKS_NEW_TICKET'] = 'Takk for at du kontaktet oss.<br>En forespørsel er opprettet og vi kontakter deg så snart som mulig.';
// TEXT U
$LANG['TEXT_UNABLE_CREATE_TICKET'] = 'Kunne ikke opprette forespørsel. Rett og feilen og forsøk en gang til.';
$LANG['TEXT_UPDATE_TICKET'] = 'Oppdater forespørsel #{0}';
$LANG['TEXT_USED_FOR_OUTGOING_EMAILS'] = ' Brukes til utgående e-post, advarsler og beskjeder til brukere og personalet.';
// TEXT V
$LANG['TEXT_VIEW_OPEN']='Vis åpne';
$LANG['TEXT_VIEW_CLOSED']='Vis lukketede';
$LANG['TEXT_VIEW_TICKET'] = 'Vis forespørsel';
$LANG['TEXT_VISIBLE_TO_CLIENT'] = 'Synlig for brukerne.';
// TEXT X
// TEXT Y
$LANG['TEXT_YOUVE_REACHED_MAXIMUM_FAILED_LOGIN_ATTEMPTS_ALLOWED']='Du har nådd den maksimale grensen for mislykkede inloggingsforsøk.';
// TEXT W
$LANG['TEXT_WELCOME_BACK_VACATION']= 'Velkommen tilbake! Din autosvar er aktivert. Ta kontakt med din adminstrator når du kommer tilabke.';
$LANG['TEXT_WELCOME_BACK_CLIENT'] = 'Velkommen tilbake, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_BACK_STAFF'] = 'Velkommen tillbake, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_TITLE'] = 'Velkommen til vår support portal.';
$LANG['TEXT_WELCOME_MSG'] = 'For at forespørsler skal håndteres på best mulig måte, bruker vi denne support portalen. Hver forespørsel får et unikt ID-nummer, som du kan bruke for å følge med. Forespørselens historikk lagres, slik at du når som helst kan logge inn og lese den.';
$LANG['TEXT_WELCOME_BACK'] = 'Velkommen tillbake';

########
## Titles on pages and web pages
##
$LANG['TITLE'] = 'Support portal';
$LANG['TITLE_BOX_NEW_TICKET'] = 'Ny forespørsel';
$LANG['TITLE_BAR_OFFLINE'] = 'Support portal';
$LANG['TITLE_MY_PREFERENCES'] = 'Mine instillinger';
$LANG['TITLE_OFFLINE'] = 'Support portalen er ikke tilgjengelig';
$LANG['TITLE_OPEN_PREVIUS_TICKET'] = 'Åpne den forrige forespørselen';
$LANG['TITLE_CLOSED_TICKETS'] = 'Lukk forespørselen';
?>
