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
$LANG['ERROR_ACCESS_DENIED_INVALID_TICKET'] = 'Toegang verboden. Mogelijk ongeldig tickey ID';
$LANG['ERROR_EMAIL_PARSE_FAILED'] = 'Email invoering mislukt';
$LANG['ERROR_FILE_REJECTED'] = 'Bestand {0} geweigerd!';
$LANG['ERROR_INVALID_FROM_ADDRESS'] = 'Ongeldig van adres';
$LANG['ERROR_INVALID_FILE_TYPE'] = 'Ongeldig bestandtype';
$LANG['ERROR_MESSAGE_REQUIRED'] = 'Bericht vereist';
$LANG['ERROR_NAME_REQUIRED'] = 'Naam vereist';
$LANG['ERROR_OCCURED'] = 'Error(s). Probeert u het alstublieft nogmaals';
$LANG['ERROR_OCCURED_TRY_AGAIN'] = 'Error(s). Probeert u het alstublieft nogmaals';
$LANG['ERROR_POSSIBLY_INVALID_TICKET'] = 'Toegang geweigerd. wellicht een ongeldig ticket ID';
$LANG['ERROR_SERVICES_NOT_AVAILABLE'] = 'Diensten niet beschikbaar!';
$LANG['ERROR_SECURITY_REPEAT_RESULT_LOCK'] = 'Beveiligingsovertreding. Herhaalde overtredingen zullen leiden tot het afsluiten van uw account.';
$LANG['ERROR_SECURITY_VIOLATION_YOUR_ACCOUNT_WILL_LOCKED'] = 'Beveiligingsovertreding. Herhaalde overtredingen zullen leiden tot het afsluiten van uw account.';
$LANG['ERROR_UNABLE_SEND_MESSAGE_TRY_AGAIN'] = 'Het is niet gelukt een bericht te plaatsen. Probeert u het nogmaals';
$LANG['ERROR_UNKNOW_ACTION'] = 'Onbekende handeling';
$LANG['ERROR_UNABLE_TO_POST_MESSAGE'] = 'Het is niet gelukt een bericht te plaatsen. Probeert u het nogmaals';
$LANG['ERROR_UKNOW_ACTION'] = 'Onbekende handeling';
$LANG['ERROR_YOU_HAVE_REACHED_MAXIMUM_FAILED_LOGIN']='U heeft het maximaal aantal toegestane mislukte inlogpogingen gehaald. Probeer het nogmaals na 5 minuten of <a href="open.php">open een nieuw ticket</a>'; 
$LANG['ERROR_YOU_MUST_CHANGE_PASSWORD'] = 'You must change your password to continue.';

# Titles on pages and web pages
$LANG['TITLE'] = 'Helpdesk'; 
$LANG['TITLE_BOX_NEW_TICKET'] = 'Nieuw ticket';
$LANG['TITLE_BAR_OFFLINE'] = 'Support Ticket Systeem';
$LANG['TITLE_OFFLINE'] = 'Support Ticket Systeem is offline';
$LANG['TITLE_OPEN_PREVIUS_TICKET'] = 'Open vorig ticket';

# Images for Staff and Clients Ends
// relative path of imagens in "translate/".$LANG['LANGUAGE']."/"
$LANG['IMAGE_CLIENT_VIEW_OPEN'] = 'client/view_open.gif';
$LANG['IMAGE_CLIENT_VIEW_CLOSED'] = 'client/view_closed.gif';
$LANG['IMAGE_CLIENT_REFRESH'] = 'client/refresh.gif';
$LANG['IMAGE_STAFF_VIEW_OPEN'] = 'staff/view_open.gif';
$LANG['IMAGE_STAFF_VIEW_CLOSED'] = 'staff/view_closed.gif';
$LANG['IMAGE_STAFF_REFRESH'] = 'staff/refresh.gif';

# Labels for Bottons and Headers on Tables, Selections and others
$LANG['LABEL_ADMIN_PANEL'] = 'Administratief Paneel';
$LANG['LABEL_ADVANCED'] = 'Geavanceerd';
$LANG['LABEL_ASSIGN'] = 'Wijs toe';
$LANG['LABEL_ATTACHMENT'] = 'Bijlage';
$LANG['LABEL_ASCENDING'] = 'Oplopend';
$LANG['LABEL_BASIC'] = 'Basic';
$LANG['LABEL_CANCEL'] = 'Annuleer';
$LANG['LABEL_CHANGE_PASSWORD'] = 'Verander wachtwoord';
$LANG['LABEL_CHECK_STATUS'] = 'Check Status';
$LANG['LABEL_CREATE_DATE'] = 'Creeer Date';
$LANG['LABEL_DATE_SPAN'] = 'Datum Spanne';
$LANG['LABEL_DEPARTMENT'] = 'Department';
$LANG['LABEL_DEPT'] = 'Dept.';
$LANG['LABEL_DESCENDING'] = 'Aflopend';
$LANG['LABEL_EMAIL'] = 'E-Mail';
$LANG['LABEL_EMAIL_ADDRESS'] = 'Email Addres'; 
$LANG['LABEL_FROM'] = 'Van.';
$LANG['LABEL_FULL_NAME'] = 'Volledige naam';
$LANG['LABEL_HELP_TOPIC'] = 'Help Onderwerp';
$LANG['TEXT_GENERAL_INQUIRY'] = 'Algemene vraag';
$LANG['LABEL_MESSAGE'] = 'Bericht';
$LANG['LABEL_MY_PREFERENCES'] = 'Mijn voorkeuren';
$LANG['LABEL_MY_PROFILE'] = 'Mijn profiel';
$LANG['LABEL_NAME'] = 'Naam';
$LANG['LABEL_OPEN_TICKET'] = 'Open Ticket';
$LANG['LABEL_OPEN_NEW_TICKET'] = 'Open Nieuw Ticket';
$LANG['LABEL_PREFERENCES'] = 'Voorkeuren';
$LANG['LABEL_PASSWORD'] = 'Wachtwoord';
$LANG['LABEL_PASSWORD_AGAIN'] = 'Wachtwoord (nogmaals)';
$LANG['LABEL_PHONE'] = 'Telefoon';
$LANG['LABEL_POST_REPLY']='Voeg reactie toe';
$LANG['LABEL_PRIORITY'] = 'Prioriteit';
$LANG['LABEL_QUERY'] = 'Vraag';
$LANG['LABEL_RESET'] = 'Reset';
$LANG['LABEL_SUBJECT'] = 'Onderwerp';
$LANG['LABEL_SUBMIT'] = 'Dien in';
$LANG['LABEL_SUBMIT_TICKET'] = 'Dien ticket in';
$LANG['LABEL_STAFF_PANEL'] = 'Paneel Personeel';
$LANG['LABEL_SEARCH'] = 'Zoek';
$LANG['LABEL_STATUS_IS'] = 'Status is';
$LANG['LABEL_TELEPHONE'] = 'Telefoon';
$LANG['LABEL_TICKET_NUMBER'] = 'Ticket#';
$LANG['LABEL_TICKET_STATUS'] = 'Ticket Status';
$LANG['LABEL_TO'] = 'Aan.';
$LANG['LABEL_TRANSFER'] = 'Transfer';
$LANG['LABEL_USERNAME'] = 'Gebruikersnaam';
$LANG['LABEL_VIEW_STATUS'] = 'Bekijk Status'; 
$LANG['LABEL_SORT_BY'] = 'Rangschik op';
$LANG['LABEL_RESULTS_PER_PAGE'] = 'Resultaten per pagina';
$LANG['LABEL_ANSWERED_TICKETS'] = 'Beantwoorde tickets';
$LANG['LABEL_ASSIGNED_TICKETS'] = 'Toegewezen tickets';
$LANG['LABEL_ANY_STATUS'] = 'Any status';
$LANG['LABEL_CLOSED_TICKETS'] = 'Gesloten tickets';
$LANG['LABEL_CLOSED'] = 'Gesloten';
$LANG['LABEL_GENERAL_INQUIRY'] = 'Algemene vraag';
$LANG['LABEL_OPEN'] = 'Open';
$LANG['LABEL_OPEN_TICKETS'] = 'Open tickets';
$LANG['LABEL_OVERDUE_TICKETS'] = 'Verlopen tickets';
$LANG['LABEL_OVERDUE'] = 'Verlopen';
$LANG['LABEL_SEARCH_RESULTS'] = 'Zoek resultaten';

# Generic text for all site, if have to text repeted in 
# Client or Staff ends, is prefixed with correct name.
$LANG['TEXT_ACCESS_DENIED']='Toegang geweigerd';
$LANG['TEXT_AUTHENTICATION_REQUIRED']='Authenticatie vereist';
$LANG['TEXT_AUTHENTICATION_REQUIRED_QUESTION']='Authenticatie vereist?';
$LANG['TEXT_ATTACH_FILE']='Voeg bestand toe';
$LANG['TEXT_BOX_NEW_TICKET'] = 'Dien een nieuw support verzoek in. geef alstublieft zoveel mogelijk informatie zodat we u zo goed mogelijk kunnne helpen. Om een eerder ingediende ticket te wijzigen gebruik a.u.b. het formulier aan de rechterzijde. Een geldig emailadres is vereist.';
$LANG['TEXT_ENTER_MESSAGE']='Voer bericht in';
$LANG['TEXT_FILE_REJECTED'] = 'Bestand [ {0} ] geweigerd';
$LANG['TEXT_FILE_IS_TOO_BIG'] = 'Bestand is te groot. Max {0} bytes toegestaan';
$LANG['TEXT_CREATE_FAILED'] = 'Aanmaken mislukt ';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS']='Excessief aantal loginpogingen';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='Excessief aantal loginpogingen (klant)';
$LANG['TEXT_FORGOT_YOUR_LOGIN_INFO']='Login informatie vergeten? Maak a.u.b. <a href="open.php">een nieuw ticket</a> aan.';
$LANG['TEXT_HOME'] = 'Home';
$LANG['TEXT_HEADER_TITLE']='osTicket :: Support Ticket System';
$LANG['TEXT_INVALID_LOGIN']='Ongeldig login';
$LANG['TEXT_INVALID_FILE_TYPE'] = 'Ongeldig bestandstype [ {0} ]';
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET']='Om de status van dit ticket te bekijken voer uw login gegevens hieronder in.<br/>'.
        'Als dit de eerste keer is dat u contact opneemnt met ons of als u uw ticket ID verloren bent klik dan a.u.b. <a href="open.php">hier</a> om een nieuw ticket te openen.';	
$LANG['TEXT_LOG_OUT'] = 'Log uit';
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET']='Om de status van dit ticket te bekijken voer uw login gegevens hieronder in.<br/>'.
        'Als dit de eerste keer is dat u contact opneemnt met ons of als u uw ticket ID verloren bent klik dan a.u.b. <a href="open.php">hier</a> om een nieuw ticket te openen.';	
$LANG['TEXT_MESSAGE_POSTED_SUCCESSFULLY'] = 'Bericht succesvol geplaats';
$LANG['TEXT_MY_TICKETS'] = 'Mijn tickets';
$LANG['TEXT_MY_ACCOUNT'] = 'Mijn account';
$LANG['TEXT_NEW_TICKET'] = 'Nieuw Ticket';
$LANG['TEXT_NOT_THIS_USER'] = 'Ik ben deze gebruiker niet';
$LANG['TEXT_NEW_TICKET_AUTO_RESPONSE'] = 'er is een email met het ticket nummer naar u gestuurd naar <b>{0}</b>.U heeft het ticket nummer en uw emailadres nodig om de status en voortgang online in te zien.<br><br>Als u meer informatie wil sturen, volg dan de instructies in de email.';
$LANG['TEXT_NO_TICKETS_FOUND']='Geen tickets gevondne.';
$LANG['TEXT_OFFLINE']='Dank u voor uw het contact opnemen met ons.<br>'.
         'Onze helpdesk is op het moment offline. Probeert u het later nogmaals.';
$LANG['TEXT_OPEN_NEW_TICKET'] = 'Open nieuw Ticket';
$LANG['TEXT_OPEN_PREVIUS_TICKET'] = 'Check de status of eerder geopened ticket. We archiveren al uw support vragen alsmede de reacties daarop.';
$LANG['TEXT_PLEASE_FILL_FORM_NEW_TICKET'] = 'Voer het onderstaande formulier in om een nieuw ticket te openen.';
$LANG['TEXT_POST_REPLY']='Laat een reactie achter';
$LANG['TEXT_REFRESH']='Ververs';
$LANG['TEXT_SELECT_ONE_TOPIC'] = 'Selecteer een onderwerp';
$LANG['TEXT_SESSION_TIMED_OUT_DUE_TO_INACTIVITY']='Sessie timed out vanwege ontbreken activiteit';
$LANG['TEXT_SHOW_FROM_TO_OF_ALL'] = 'Weergave {0} - {1} of {2}';
$LANG['TEXT_SHOW_ZERO'] = 'Weergave 0 (zero)';
$LANG['TEXT_SORT_BY_DATE']='Rangschik op datum';
$LANG['TEXT_SORT_BY_DEPARTMENT']='Rangschik op departement';
$LANG['TEXT_SORT_BY_TICKET_ID']='Rangschik op ticket ID';
$LANG['TEXT_SUPPORT_CENTER'] = 'Support centrum';
$LANG['TEXT_SUPPORT_TEAM'] = 'Support Team';
$LANG['TEXT_SUPPORT_TICKET_SISTEM'] = '<span>SUPPORT TICKET</span> SYSTEEM';
$LANG['TEXT_TICKET_CREATED'] = 'Support ticket aangemaakt';
$LANG['TEXT_TICKET_NUMBER'] = 'Ticket #';
$LANG['TEXT_TICKET_THREAD'] = 'Ticket Thread';
$LANG['TEXT_TICKET_WILL_REOPEN_NEW_POST']='Ticket zal naar plaatsen van bericht worden heropend';
$LANG['TEXT_TICKETS_STATUS'] = 'Tickets Status';
$LANG['TEXT_THANKS_NEW_TICKET'] = 'Dank u voor het contact openemen met ons.<br>Er is een support ticket aangemaakt. Er zal spoedig contact met u worden opgenomen.';
$LANG['TEXT_UNABLE_CREATE_TICKET'] = 'Het is niet gelukt een ticket te creeeren. Corrigeer a.u.b de onderstaande errors  en probeer het nogmaals.';
$LANG['TEXT_VIEW_CLOSED']='Bekijk gesloten';
$LANG['TEXT_VIEW_OPEN']='Bekijk openstaande';
$LANG['TEXT_YOUVE_REACHED_MAXIMUM_FAILED_LOGIN_ATTEMPTS_ALLOWED']='U heeft het maximum aantal mistlukte inlogpogingen behaald.';
$LANG['TEXT_WELCOME_BACK_VACATION']= 'Welkom terug! U bent geregistreerd als \'op vakantie\' Laat de admin of uw manaager a.u.b. weten dat u terug bent.';
$LANG['TEXT_WELCOME_BACK_CLIENT'] = 'Welkom terug, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_BACK_STAFF'] = 'Welkom terug, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_TITLE'] = 'Welkom op het support centrum.';
$LANG['TEXT_WELCOME_MSG'] = 'Om support verzoeken beter te stroomlijnen, gebruiken we een support ticket systeem. ieder supportverzoek krijgt een uniek ticket nummer  die u kan gebruiken om de voortgang en reacties hierop online bij te houden. Om u nog beter van dienst te zijn houden we archieven bij van al uw supportverzoeken.';
$LANG['TEXT_WELCOME_BACK'] = 'Welkom terug';

#Alert Messages, normally used with JavaScript dialog box.
$LANG['ALERT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='Excessief aantal loginpogingen door een client'."\n".
                'Email: {0}'."\n".
				'Ticket#: {1}'."\n".
                'IP: {2}'."\n".
				'Time: {3}'."\n\n".
                'Attempts #{4}';
?>

