<?php

#Disable direct access.
if (!strcasecmp(basename($_SERVER['SCRIPT_NAME']), basename( __FILE__ ))) die ('kwaheri rafiki!');

$LANG = array ();

# Language identification
$LANG['LANGUAGE'] = 'nl';
//Word Name (english name)
$LANG['LANGUAGE_NAME'] = 'Dutch';
//Native name of language (in the original language)
$LANG['LANGUAGE_NATIVE_NAME'] = 'Dutch';
$LANG['DIRECTION'] = 'ltr';
$LANG['CODEPAGE'] = 'UTF-8';

# Error Menssages
$LANG['ERROR_ACCESS_DENIED_INVALID_TICKET'] = 'Toegang verboden. Mogelijk ongeldig ticket ID';
$LANG['ERROR_EMAIL_PARSE_FAILED'] = 'Email invoering mislukt';
$LANG['ERROR_FILE_REJECTED'] = 'Bestand {0} geweigerd!';
$LANG['ERROR_INVALID_FROM_ADDRESS'] = 'Ongeldig van adres';
$LANG['ERROR_INVALID_FILE_TYPE'] = 'Ongeldig bestandstype';
$LANG['ERROR_MESSAGE_REQUIRED'] = 'Bericht is vereist';
$LANG['ERROR_NAME_REQUIRED'] = 'Naam is vereist';
$LANG['ERROR_OCCURED'] = 'Fout(en). Probeert u het alstublieft nogmaals';
$LANG['ERROR_OCCURED_TRY_AGAIN'] = 'Fouten(en). Probeert u het alstublieft nogmaals';
$LANG['ERROR_POSSIBLY_INVALID_TICKET'] = 'Toegang geweigerd. wellicht een ongeldig ticket ID';
$LANG['ERROR_SERVICES_NOT_AVAILABLE'] = 'Diensten niet beschikbaar!';
$LANG['ERROR_SECURITY_REPEAT_RESULT_LOCK'] = 'Beveiligingsovertreding. Herhaalde overtredingen zullen leiden tot het afsluiten van uw account.';
$LANG['ERROR_SECURITY_VIOLATION_YOUR_ACCOUNT_WILL_LOCKED'] = 'Beveiligingsovertreding. Herhaalde overtredingen zullen leiden tot het afsluiten van uw account.';
$LANG['ERROR_UNABLE_SEND_MESSAGE_TRY_AGAIN'] = 'Het is niet gelukt een bericht te plaatsen. Probeert u het nogmaals';
$LANG['ERROR_UNABLE_TO_POST_THE_RESPONSE']='Het is niet mogelijk het antwoord te plaatsen';
$LANG['ERROR_UNKNOW_ACTION'] = 'Onbekende handeling';
$LANG['ERROR_UNABLE_TO_POST_MESSAGE'] = 'Het is niet gelukt een bericht te plaatsen. Probeert u het nogmaals';
$LANG['ERROR_UKNOW_ACTION'] = 'Onbekende handeling';
$LANG['ERROR_YOU_HAVE_REACHED_MAXIMUM_FAILED_LOGIN']='U heeft het maximaal aantal toegestane mislukte inlogpogingen gehaald. Probeer het nogmaals na 5 minuten of <a href="open.php">open een nieuw ticket</a>'; 
$LANG['ERROR_YOU_MUST_CHANGE_PASSWORD'] = 'U moet uw wachtwoord aanpassen om door te kunnen gaan.';
$LANG['ERROR_SEARCH_TERM_MORE_3']='Zoekterm moet meer dan 3 karakters bevatten';

# Images for Staff and Clients Ends
// relative path of imagens in "translate/".$LANG['LANGUAGE']."/"
$LANG['IMAGE_CLIENT_VIEW_OPEN'] = 'client/view_open.gif';
$LANG['IMAGE_CLIENT_VIEW_CLOSED'] = 'client/view_closed.gif';
$LANG['IMAGE_CLIENT_REFRESH'] = 'client/refresh.gif';
$LANG['IMAGE_STAFF_VIEW_OPEN'] = 'staff/view_open.gif';
$LANG['IMAGE_STAFF_VIEW_CLOSED'] = 'staff/view_closed.gif';
$LANG['IMAGE_STAFF_REFRESH'] = 'staff/refresh.gif';

# Labels for Bottons and Headers on Tables, Selections and others
// Label A
$LANG['LABEL_ACTION'] = 'Actie'; 
$LANG['LABEL_ADD_NEW_DEPT'] = 'Nieuwe afdeling toevoegen';
$LANG['LABEL_ADMIN_DASHBOARD'] = 'Dashboard';
$LANG['LABEL_ADMIN_PANEL'] = 'Administratief Paneel';
$LANG['LABEL_ADVANCED'] = 'Geavanceerd';
$LANG['LABEL_ALL'] = 'Alle'; 
$LANG['LABEL_ALL_DEPARTMENTS'] = 'Alle afdelingen'; 
$LANG['LABEL_AND_CLOSE'] = 'En Sluiten'; 
$LANG['LABEL_ANSWER'] = 'Antwoord';
$LANG['LABEL_ANSWERED_TICKETS'] = 'Beantwoorde tickets';
$LANG['LABEL_ANY_STATUS'] = 'Any status';
$LANG['LABEL_APPEND'] = 'Toevoegen'; 
$LANG['LABEL_APPEND_SIGNATURE'] = 'Handtekening Toevoegen'; 
$LANG['LABEL_APPENDCHECKBOX'] = 'Toevoegen';
$LANG['LABEL_ASCENDING'] = 'Oplopend';
$LANG['LABEL_ASSIGNED_TICKETS'] = 'Toegewezen tickets';
$LANG['LABEL_ASSIGNED_STAFF'] = 'Toegewezen Aan'; 
$LANG['LABEL_ASSIGN'] = 'Wijs toe';
$LANG['LABEL_ASSIGN_TO_STAFF'] = 'Toewijzen aan medewerker'; 
$LANG['LABEL_ASSIGNTO'] = 'Toewijzen aan'; 
$LANG['LABEL_ASSIGNTOSTAFF'] = '-Wijs toe aan personeel-'; 
$LANG['LABEL_ATTACHMENT'] = 'Bijlage'; //alleen zichtbaar als er geupload kan worden (newticket.inc)
$LANG['LABEL_ATTACH_FILE'] = 'Voeg Bestand Toe'; 
$LANG['LABEL_ASCENDING'] = 'Oplopend';
$LANG['LABEL_AUTORESP'] = 'Automatische response';
$LANG['LABEL_AUTO_RESPONSE_EMAIL'] = 'Email adres voor auto-response';
$LANG['LABEL_AUTORESPONDERS'] = 'Auto reponse';
// Label B
$LANG['LABEL_BAN_EMAIL'] = 'Ban Email'; 
$LANG['LABEL_BASIC'] = 'Basic';
// Label C
$LANG['LABEL_CANCEL'] = 'Annuleer';
$LANG['LABEL_CANNED_RESPONSE'] = 'Standaard Antwoord'; 
$LANG['LABEL_CATEGORY'] = 'Categorie:'; 
$LANG['LABEL_CATEGORY_DEPT'] = 'Categorie/Afdeling'; 
$LANG['LABEL_CHANGE_PRIORITY'] = 'Wijzig Prioriteit'; 
$LANG['LABEL_CHANGE_PASSWORD'] = 'Verander wachtwoord';
$LANG['LABEL_CHECK_STATUS'] = 'Check Status';
$LANG['LABEL_CLOSE'] = 'Sluiten'; 
$LANG['LABEL_CLOSE_ON_REPLY'] = 'Sluiten bij Antwoord'; 
$LANG['LABEL_CLOSE_TICKET'] = 'Sluit Ticket'; 
$LANG['LABEL_CLOSED_TICKETS'] = 'Gesloten tickets';
$LANG['LABEL_CLOSED'] = 'Gesloten';
$LANG['LABEL_COMMENTS_MESSAGES_FOR_ASSIGNEE'] = 'Opmerkingen Voor Medewerker'; 
$LANG['LABEL_COMMENTS_REASONS_FOR_THE_TRANSFER'] = 'Opmerkingen/Redenen Voor De Verplaatsing'; 
$LANG['LABEL_CREATE_DATE'] = 'Aanmaak Datum'; 
// Label D
$LANG['LABEL_DASHBOARD'] = 'Dashboard';
$LANG['LABEL_DATE'] = 'Datum'; 
$LANG['LABEL_DATE_SPAN'] = 'Datum Spanne';
$LANG['LABEL_DEFAULT'] = 'Standaard'; 
$LANG['LABEL_DELETE_DEPT_S'] = 'Verwijder Afdeling'; 
$LANG['LABEL_DELETE_TICKET'] = 'Verwijder Ticket'; 
$LANG['LABEL_DELETE'] = 'Verwijder'; 
$LANG['LABEL_DELETED'] = 'Verwijderd'; 
$LANG['LABEL_DEPARTMENT'] = 'Afdeling';
$LANG['LABEL_DEPARTMENTS'] = 'Afdelingen';
$LANG['LABEL_DEPTSIGNATURE'] = 'Handtekening afdeling(indien present)'; 
$LANG['LABEL_DEPT'] = 'Afdeling';
$LANG['LABEL_DEPT_ACCESS'] = 'Afdeling toegang';
$LANG['LABEL_DEPT_EMAIL_ABOVE'] = 'Email'; 
$LANG['LABEL_DEPT_EMAIL'] = 'Email'; 
$LANG['LABEL_DEPT_MANAGER'] = 'Manager'; 
$LANG['LABEL_DEPT_MANAGER_NONE'] = 'Geen Manager'; 
$LANG['LABEL_DEPT_NAME'] = 'Afdeling'; 
$LANG['LABEL_DEPT_SIGNATURE'] = 'Handtekening Afdeling'; 
$LANG['LABEL_DEPT_TRANSFER'] = 'Verplaats Naar Afdeling'; 
$LANG['LABEL_DEPT_TYPE'] = 'Type'; 
$LANG['LABEL_DESCENDING'] = 'Aflopend';
$LANG['LABEL_DIRETORY_STAFF'] = ''; //hint
$LANG['LABEL_DIRECTORY'] = 'Staf Adresboek';
$LANG['LABEL_DUEDATE'] = 'Vervaldatum';
// Label E
$LANG['LABEL_EMAIL'] = 'E-Mail';
$LANG['LABEL_EMAILS'] = 'E-Mail';
$LANG['LABEL_EMAILS_SETTINGS'] = 'E-Mail';
$LANG['LABEL_EMAIL_ADDRESS'] = 'Email adres'; 
$LANG['LABEL_EMAIL_ADRES'] = 'Email adres'; 
$LANG['LABEL_EMAIL_TEMPLATES'] = 'Email template'; 
$LANG['LABEL_ENABLE_SYSTEM_OFF_LINE'] = 'Publiceren'; 
$LANG['LABEL_ENTER_NOTE_CONTENT'] = 'Typ Notitie Inhoud'; 
// Label F
$LANG['LABEL_FIRST_NAME'] = 'Voornaam'; 
$LANG['LABEL_FROM'] = 'Van.';
$LANG['LABEL_FULL_NAME'] = 'Volledige naam';
// Label G
$LANG['LABEL_GENERAL_INQUIRY'] = 'Algemene vraag';
$LANG['LABEL_GO'] = 'Zoek'; 
// Label H
$LANG['LABEL_HELPTOPIC'] = 'Help onderwerp';
$LANG['LABEL_HELP_TOPIC'] = 'Help Onderwerp';
$LANG['LABEL_HELP_TOPICS'] = 'Help Onderwerpen';

// Label I
$LANG['LABEL_ISSUE_SUMMARY'] = 'Probleem Omschrijving';
$LANG['LABEL_INTERNAL_NOTE'] = 'Interne Notitie'; //newticket.inc 
$LANG['LABEL_INTERNAL_NOTES'] = 'Interne Notities'; 
$LANG['LABEL_IP_ADDRESS'] = 'Ip Adres'; 
// Label J

// Label K
$LANG['LABEL_KNOWLEDGE_BASE'] = 'Kennisbank';
$LANG['LABEL_KNOWLEDGE_BASE_PREMATE'] = ''; //hint
// Label L
$LANG['LABEL_LAST_NAME'] = 'Achternaam'; 
$LANG['LABEL_LAST_MESSAGE'] = 'Laatste Bericht Op'; 
$LANG['LABEL_LAST_RESPONSE'] = 'Laatste Antwoord Op'; 
$LANG['LABEL_LAST_UPDATED'] = 'Laatste update'; 
$LANG['LABEL_LOG_OUT'] = 'Uitloggen';
// Label M
$LANG['LABEL_MAKE_PRIVATE'] = 'Maak Prive'; 
$LANG['LABEL_MAKE_PUBLIC'] = 'Publiceer'; 
$LANG['LABEL_MANAGER'] = 'Manager'; 
$LANG['LABEL_MARK_OVERDUE'] = 'Markeer Als Vervallen'; 
$LANG['LABEL_MESSAGE'] = 'Bericht';
$LANG['LABEL_MOBIEL'] = 'Mobiel'; 
$LANG['LABEL_MOBILE_PHONE'] = 'Mobiel'; 
$LANG['LABEL_MYSIGNATURE'] = 'Mijn handtekening'; 
$LANG['LABEL_MY_ACCOUNT'] = 'Mijn Account';
$LANG['LABEL_MY_PROFILE'] = 'Mijn profiel';
$LANG['LABEL_MY_PROFILE_INFO'] = 'Mijn Profiel'; 
$LANG['LABEL_MY_PREFERENCES'] = 'Mijn voorkeuren';
$LANG['LABEL_MY_PREFERENCE'] = 'Mijn voorkeuren';
// Label N
$LANG['LABEL_NAME'] = 'Naam';
$LANG['LABEL_NEW_PREMADE_REPLY'] = 'Maak Nieuw Antwoord Template'; 
$LANG['LABEL_NEW_MESSAGE'] = 'Nieuw Bericht';
$LANG['LABEL_NEW_TICKET'] = 'Nieuw Ticket';
$LANG['LABEL_NEW_TICKET_PRIORITY'] = 'Nieuw Ticket Prioriteit';
$LANG['LABEL_NONE'] = 'Geen'; 
$LANG['LABEL_NOTE_TITLE'] = 'Notitie Titel'; 
// Label O
$LANG['LABEL_OPEN'] = 'Open';
$LANG['LABEL_OPEN_TICKET'] = 'Open Ticket';
$LANG['LABEL_OPEN_NEW_TICKET'] = 'Open Nieuw Ticket';
$LANG['LABEL_OPEN_TICKETS'] = 'Open tickets';
$LANG['LABEL_OVERDUE_TICKETS'] = 'Verlopen tickets';
$LANG['LABEL_OVERDUE'] = 'Verlopen';
$LANG['LABEL_OPTIONAL'] = 'Optioneel'; 
$LANG['LABEL_OPTIONAL_INTERNAL_NOTE'] = '(Optionele Interne Notities).';
$LANG['LABEL_OTHER'] = 'Anders';
$LANG['LABEL_OUTGOING_EMAIL'] = 'Uitgaande email';
// Label P
$LANG['LABEL_PAGE'] = 'Pagina'; 
$LANG['LABEL_PASSWORD'] = 'Wachtwoord';
$LANG['LABEL_PASSWORD_AGAIN'] = 'Wachtwoord (nogmaals)';
$LANG['LABEL_PHONE_AT_COMPANY'] = 'Telefoon werk'; 
$LANG['LABEL_POST_INTERNAL_NOTE'] = 'Maak Interne Notitie'; 
$LANG['LABEL_POSTED_BY'] = 'aangemaakt door'; 
$LANG['LABEL_PREMADE'] = 'Template:';
$LANG['LABEL_PREMADE_REPLIES'] = 'Antwoorden Templates';
$LANG['LABEL_PRIORITY'] = 'Prioriteit';
$LANG['LABEL_PREFERENCES'] = 'Voorkeuren';
$LANG['LABEL_PHONE'] = 'Telefoon';
$LANG['LABEL_POST_REPLY']='Voeg reactie toe';
$LANG['LABEL_PRIMARY_OUTGOING_EMAIL'] = 'Email adres';
$LANG['LABEL_PRIORITY'] = 'Prioriteit';
$LANG['LABEL_PRIVATE_HIDDEN'] = 'Niet zichtbaar';
$LANG['LABEL_PUBLIC'] = 'Publiek';
// Label Q
$LANG['LABEL_QUERY'] = 'Vraag';
$LANG['LABEL_QUERY_RETURNED_0_RESULTS'] = 'Aanvraag heeft 0 resultaten'; 
$LANG['LABEL_QUERY_RETURNED_ZERO_RESULT'] = 'Aanvraag heeft 0 resultaten'; 
// Label R
$LANG['LABEL_REASONS_FOR_THE_EDIT'] = 'Reden voor de wijziging'; 
$LANG['LABEL_RE_ASSIGN_TO_STAFF'] = 'Re:Toewijzen aan medewerker'; 
$LANG['LABEL_RELEASE_UNASSIGN'] = 'Trek Toewijzing In'; 
$LANG['LABEL_REOPEN'] = 'Heropen'; 
$LANG['LABEL_REOPEN_TICKET'] = 'Heropen Ticket'; 
$LANG['LABEL_RESET'] = 'Opnieuw'; 
$LANG['LABEL_REPLY_TITLE'] = 'Antwoord Titel'; 
$LANG['LABEL_RESET'] = 'Reset';
$LANG['LABEL_RESULTS_PER_PAGE'] = 'Resultaten per pagina';
// Label S
$LANG['LABEL_SAVE'] = 'Opslaan'; 
$LANG['LABEL_SAVED_AS_INTERNAL_NOTE'] = 'Wordt opgeslagen als Interne Notitie'; 
$LANG['LABEL_SEARCH'] = 'Zoek';
$LANG['LABEL_SEARCH_FOR'] = 'Zoeken naar'; 
$LANG['LABEL_SEARCH_RESULTS'] = 'Zoek resultaten';
$LANG['LABEL_SELECT'] = 'Selecteer'; 
$LANG['LABEL_SELECTONE'] = 'Selecteer...';
$LANG['LABEL_SELECT_ACTION'] = 'Selecteer Actie..'; 
$LANG['LABEL_SELECT_A_PREMADE_REPLY'] = 'Selecteer een standaard antwoord'; 
$LANG['LABEL_SELECT_DEPARTMENT'] = 'Selecteer Afdeling..';
$LANG['LABEL_SELECT_MANAGER_OPTIONAL'] = 'Manager is optioneel';
$LANG['LABEL_SELECT_ONE_EMAIL'] = 'Selecteer een emailadres...';
$LANG['LABEL_SELECT_ONE_TOPIC'] = 'Selecteer een onderwerp...';
$LANG['LABEL_SELECT_PREMADE_ISSUE'] = 'Selecteer probleem/antwoord template..';
$LANG['LABEL_SELECT_PRIORITY'] = 'Selecteer een prioriteit..';
$LANG['LABEL_SELECT_SOURCE'] = 'Selecteer Ticket Bron..';
$LANG['LABEL_SELECT_STAFF_MEMBER'] = 'Selecteer Medewerker'; 
$LANG['LABEL_SELECT_TEMPLATE'] = 'Selecteer Template'; 
$LANG['LABEL_SEL_TARGET_DEPT'] = 'Selecteer Andere Afdeling'; 
$LANG['LABEL_SENDALERTTOSTAFF'] = 'Zend notificatie aan personeel.'; 
$LANG['LABEL_SIGNATURE'] = 'Handtekening'; 
$LANG['LABEL_SOURCE'] = 'Bron'; 
$LANG['LABEL_SORT_BY'] = 'Rangschik op';
$LANG['LABEL_SYSTEM_DEFAULT_TEMPLATE'] = 'Standaard template';
$LANG['LABEL_STAFF'] = 'Personeel';
$LANG['LABEL_STAFF_PANEL'] = 'Paneel Personeel';
$LANG['LABEL_STAFF_MEMBERS'] = 'Medewerkers'; 
$LANG['LABEL_STAFF_MEMBER'] = 'Medewerker'; 
$LANG['LABEL_STATUS'] = 'Status'; 
$LANG['LABEL_STATUS_IS'] = 'Status is';
$LANG['LABEL_SETTINGS'] = 'Instellingen';
$LANG['LABEL_SUBJECT'] = 'Onderwerp';
$LANG['LABEL_SUBMIT'] = 'Dien in';
$LANG['LABEL_SUBMIT_TICKET'] = 'Dien ticket in';
$LANG['LABEL_SYSTEM_SETTINGS'] = 'Instellingen';
// Label T
$LANG['LABEL_TELEPHONE'] = 'Telefoon';
$LANG['LABEL_TICKET'] = 'Ticket'; 
$LANG['LABEL_TICKETNR'] = 'TicketNr. :'; 
$LANG['LABEL_TICKETCHANGE'] = 'Wijzig Ticket'; 
$LANG['LABEL_TICKET_THREAD'] = 'Ticket Proces'; 
$LANG['LABEL_TICKET_ID'] = 'Ticket#';
$LANG['LABEL_TICKET_NUMBER'] = 'Ticket#';
$LANG['LABEL_TICKET_SOURCE'] = 'Ticket Bron';
$LANG['LABEL_TICKET_STATUS'] = 'Ticket Status';
$LANG['LABEL_TIME_IS_BASED_ON_YOUR_TIMEZONE'] = 'Tijd is gebaseerd op je tijdzone'; 
$LANG['LABEL_TITLE'] = 'Titel'; 
$LANG['LABEL_TO'] = 'Aan.';
$LANG['LABEL_TRANSFER'] = 'Verplaatsen';
$LANG['LABEL_TOGGLE'] = 'Omkeren'; 
$LANG['LABEL_TELEFOON'] = 'Telefoon'; 
$LANG['LABEL_TIMEZONE'] = 'Tijd is gebaseerd op je tijdzone.';
$LANG['LABEL_TYPE'] = 'Type.';
// Label U
$LANG['LABEL_USERNAME'] = 'Gebruikersnaam';
$LANG['LABEL_USERS'] = 'Gebruikers';
$LANG['LABEL_UPDATE_TICKET'] = 'Wijzigen Ticket'; 
$LANG['LABEL_UNBAN_EMAIL'] = 'Haal Email Uit Ban'; 
$LANG['LABEL_UPDATE_DATE'] = 'Laatste wijziging'; 
$LANG['LABEL_UPDATE_DEPARTMENT'] = 'Afdeling wijzigen'; 
$LANG['LABEL_UNCHANGED'] = 'Ongewijzigd'; 
// Label V
$LANG['LABEL_VIEW_STATUS'] = 'Bekijk Status'; 
$LANG['LABEL_VIEW_TICKET'] = 'Bekijken Ticket'; 

# Generic text for all site, if have to text repeted in 
# Client or Staff ends, is prefixed with correct name.
// TEXT A
$LANG['TEXT_ACCESS_DENIED']='Toegang geweigerd';
$LANG['TEXT_ALL_DEPARTMENTS'] = 'Alle afdelingen'; 
$LANG['TEXT_ANSWERED_STATS'] = 'Antwoord stats ({0})';
$LANG['TEXT_ANSWERED_TICKETS'] = 'Beantwoorde Tickets';
$LANG['TEXT_ANY_STATUS'] = 'Alle statussen'; 
$LANG['TEXT_ASSIGNED_TICKETS']='Toegewezen tickets';
$LANG['TEXT_AUTHENTICATION_REQUIRED']='Authenticatie vereist';
$LANG['TEXT_AUTHENTICATION_REQUIRED_QUESTION']='Authenticatie vereist?';
$LANG['TEXT_ASSIGNED_TICKETS']='Toegewezen tickets';
$LANG['TEXT_ATTACH_FILE']='Voeg bestand toe';
// TEXT B
$LANG['TEXT_BOX_NEW_TICKET'] = 'Dien een nieuw support verzoek in. Geef alstublieft zoveel mogelijk informatie zodat we u zo goed mogelijk van dienst kunnen zijn. Om een eerder ingediend ticket te wijzigen kunt u het formulier aan de rechterzijde gebruiken. Een geldig emailadres is vereist.';
// TEXT C
$LANG['TEXT_CAM_BE_APPENDED_TO_RESPONSES'] = 'Toevoegen aan antwoorden?'; 
$LANG['TEXT_CLOSED_TICKETS'] = 'Gesloten Tickets'; 
$LANG['TEXT_CLOSED'] = 'Gesloten'; 
$LANG['TEXT_CREATE_FAILED'] = 'Aanmaken mislukt ';
// TEXT D
$LANG['TEXT_DEPT_DEPENDS_ON_EMAIL'] = 'Afdeling afhankelijk van email'; 
$LANG['TEXT_DEPT_UPDATED_SUCCESSFULLY'] = 'Afdeling succesvol bijgewerkt.'; 
// TEXT E
$LANG['TEXT_ENTER_MESSAGE']='Voer bericht in';
$LANG['TEXT_EMAIL_ADDRESS_USED_SEND_AUTO_RESPONSES']='Email adres dat gebruikt wordt voor het versturen van auto-responses';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS']='Excessief aantal loginpogingen';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='Excessief aantal loginpogingen (klant)';
// TEXT F
$LANG['TEXT_FILE_REJECTED'] = 'Bestand [ {0} ] geweigerd';
$LANG['TEXT_FILE_IS_TOO_BIG'] = 'Bestand is te groot. Max {0} bytes toegestaan';
$LANG['TEXT_FORGOT_YOUR_LOGIN_INFO']='Login informatie vergeten? Maak a.u.b. <a href="open.php">een nieuw ticket</a> aan.';
// TEXT G
$LANG['TEXT_GENERAL_INQUIRY'] = 'Algemene vraag';
$LANG['TEXT_GLOBAL_AUTO_RESPONSE_SETTINGS'] = 'Globale auto-reponse instellingen';
// TEXT H
$LANG['TEXT_HOME'] = 'Home';
$LANG['TEXT_HEADER_TITLE']='osTicket :: Support Ticket System';
// TEXT I
$LANG['TEXT_INVALID_LOGIN']='Ongeldig login';
$LANG['TEXT_INVALID_FILE_TYPE'] = 'Ongeldig bestandstype [ {0} ]';
// TEXT J
// TEXT K
// TEXT L
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET']='Om de status van dit ticket te bekijken voer uw login gegevens hieronder in.<br/>'.
        'Als dit de eerste keer is dat u contact opneemnt met ons of als u uw ticket ID verloren bent klik dan a.u.b. <a href="open.php">hier</a> om een nieuw ticket te openen.';	
$LANG['TEXT_LOG_OUT'] = 'Log uit';
// TEXT M
$LANG['TEXT_MESSAGE_POSTED_SUCCESSFULLY'] = 'Bericht succesvol geplaats';
$LANG['TEXT_MY_TICKETS'] = 'Mijn tickets';
$LANG['TEXT_MY_ACCOUNT'] = 'Mijn account';
// TEXT N
$LANG['TEXT_NEW_TICKET'] = 'Nieuw Ticket';
$LANG['TEXT_NEW_TICKET_AUTO_RESPONSE'] = 'Er is een email met het ticket nummer naar u gestuurd naar <b>{0}</b>.U heeft het ticket nummer en uw emailadres nodig om de status en voortgang online in te zien.<br><br>Als u meer informatie wil sturen, volg dan de instructies in de email.';
$LANG['TEXT_NOT_THIS_USER'] = 'Ik ben deze gebruiker niet';
$LANG['TEXT_NO_TICKETS_FOUND']='Geen tickets gevonden.';
// TEXT O
$LANG['TEXT_OFFLINE']='Dank u voor uw het contact opnemen met ons.<br>'.
         'Onze helpdesk is op het moment offline. Probeert u het later nogmaals.';
$LANG['TEXT_OPEN_NEW_TICKET'] = 'Open nieuw Ticket';
$LANG['TEXT_OPEN_PREVIUS_TICKET'] = 'Check de status of eerder geopened ticket. We archiveren al uw support vragen alsmede de reacties daarop.';
$LANG['TEXT_OPEN'] = 'Open'; 
$LANG['TEXT_OPEN_TICKETS'] = '';//Hint
$LANG['TEXT_OVERDUE'] = 'Vervallen'; 
$LANG['TEXT_OVERDUE_STATS'] = 'Vervallen ({0})';
$LANG['TEXT_OVERDUE_TICKETS'] = 'Vervallen Tickets';
// TEXT P
$LANG['TEXT_PLEASE_FILL_FORM_NEW_TICKET'] = 'Voer het onderstaande formulier in om een nieuw ticket te openen.';
$LANG['TEXT_PLEASE_FILL_STAFF_FORM_BELOW_OPEN_NEW_TICKET']='Vul onderstaand formulier in om een nieuw ticket aan te maken';
$LANG['TEXT_PLEASE_TAKE_A_MINUTE_TO_DELETE_INSTALL'] = 'U dient de setup directory nog te verwijderen.';
$LANG['TEXT_POST_REPLY']='Laat een reactie achter';
// TEXT R
$LANG['TEXT_REFRESH']='Ververs';
$LANG['TEXT_REQUIRED_WHEN_DEPT_IS_PUBLIC']='Verplicht bij publieke afdeling';
// TEXT S
$LANG['TEXT_SEARCH_RESULTS'] = 'Zoek resultaten';
$LANG['TEXT_SELECT_ONE_TOPIC'] = 'Selecteer een onderwerp';
$LANG['TEXT_SELECT_ONE_EMAIL'] = 'Selecteer een emailadres';
$LANG['TEXT_SELECT_DEPARTMENTS_GROUP_MEMBERS'] = 'Selecteer afdelingen voor in deze groep'; 
$LANG['TEXT_SESSION_TIMED_OUT_DUE_TO_INACTIVITY']='Sessie timed out vanwege ontbreken activiteit';
$LANG['TEXT_SHOW_FROM_TO_OF_ALL'] = 'Weergave {0} - {1} of {2}';
$LANG['TEXT_SHOW_ZERO'] = 'Weergave 0 (zero)';
$LANG['TEXT_SORT_BY_DATE']='Rangschik op datum';
$LANG['TEXT_SORT_BY_DEPARTMENT']='Rangschik op departement';
$LANG['TEXT_SORT_BY_TICKET_ID']='Rangschik op ticket ID';
$LANG['TEXT_SUPPORT_CENTER'] = 'Support centrum';
$LANG['TEXT_SUPPORT_TEAM'] = 'Support Team';
$LANG['TEXT_SUPPORT_TICKET_SISTEM'] = '<span>SUPPORT TICKET</span> SYSTEEM';
$LANG['TEXT_SYSTEM_IS_OFF_LINE'] = 'Systeem is offline.';
// TEXT T
$LANG['TEXT_TICKET_CREATED'] = 'Support ticket aangemaakt';
$LANG['TEXT_TICKET_NUMBER'] = 'Ticket #';
$LANG['TEXT_TICKET_THREAD'] = 'Ticket Thread';
$LANG['TEXT_TICKET_WILL_REOPEN_NEW_POST']='Ticket zal naar plaatsen van bericht worden heropend';
$LANG['TEXT_TICKETS_STATUS'] = 'Tickets Status';
$LANG['TEXT_THANKS_NEW_TICKET'] = 'Dank u voor het contact openemen met ons.<br>Er is een support ticket aangemaakt. Er zal spoedig contact met u worden opgenomen.';
$LANG['TEXT_TOTAL_MY_TICKETS'] = 'Mijn Tickets';
$LANG['TEXT_TOTAL_OPEN_TICKETS'] = 'Open Tickets';
// TEXT U
$LANG['TEXT_UNABLE_CREATE_TICKET'] = 'Het is niet gelukt een ticket te creeeren. Corrigeer a.u.b de onderstaande errors  en probeer het nogmaals.';
$LANG['TEXT_USED_FOR_OUTGOING_EMAILS'] = 'Gebruikt voor uitgaande emails.';
// TEXT V
$LANG['TEXT_VIEW_CLOSED']='Bekijk gesloten';
$LANG['TEXT_VIEW_OPEN']='Bekijk openstaande';
$LANG['TEXT_VISIBLE_TO_CLIENT'] = 'Zichtbaar voor client ';
// TEXT W
$LANG['TEXT_WELCOME_BACK'] = 'Welkom terug';
$LANG['TEXT_WELCOME_BACK_VACATION']= 'Welkom terug! U bent geregistreerd als \'op vakantie\' Laat de admin of uw manaager a.u.b. weten dat u terug bent.';
$LANG['TEXT_WELCOME_BACK_CLIENT'] = 'Welkom terug, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_BACK_STAFF'] = 'Welkom terug, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_TITLE'] = 'Welkom op het support centrum.';
$LANG['TEXT_WELCOME_MSG'] = 'Om support verzoeken beter te stroomlijnen, gebruiken we een support ticket systeem. Ieder supportverzoek krijgt een uniek ticket nummer die u kunt gebruiken om de voortgang en reacties hierop online bij te houden. Om u nog beter van dienst te zijn, houden we archieven bij van al uw supportverzoeken.';
// TEXT X
// TEXT Y
$LANG['TEXT_YOUVE_REACHED_MAXIMUM_FAILED_LOGIN_ATTEMPTS_ALLOWED']='U heeft het maximum aantal mistlukte inlogpogingen behaald.';
// TEXT Z

# Titles on pages and web pages
$LANG['TITLE'] = 'Helpdesk'; 
$LANG['TITLE_BOX_NEW_TICKET'] = 'Nieuw ticket';
$LANG['TITLE_BAR_OFFLINE'] = 'Support Ticket Systeem';
$LANG['TITLE_MY_PREFERENCES'] = 'Mijn voorkeuren';
$LANG['TITLE_OFFLINE'] = 'Support Ticket Systeem is offline';
$LANG['TITLE_OPEN_PREVIUS_TICKET'] = 'Open vorig ticket';
$LANG['TITLE_CLOSED_TICKETS'] = 'Gesloten Tickets';

#Alert Messages, normally used with JavaScript dialog box.
$LANG['ALERT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='Excessief aantal loginpogingen door een client'."\n".
                'Email: {0}'."\n".
				'Ticket#: {1}'."\n".
                'IP: {2}'."\n".
				'Time: {3}'."\n\n".
                'Attempts #{4}';
?>
