<?php

#Disable direct access.
if (!strcasecmp(basename($_SERVER['SCRIPT_NAME']), basename( __FILE__ ))) die ('kwaheri rafiki!');

$LANG = array ();
$LANG['LANGUAGE'] = 'cs';
//Word Name (english name)
$LANG['LANGUAGE_NAME'] = 'Czech';
//Native name of language (in the original language)
$LANG['LANGUAGE_NATIVE_NAME'] = 'Čeština';

$LANG['CODEPAGE'] = 'UTF-8';

$LANG['ERROR_NAME_REQUIRED'] = 'Je vyžadováno jméno';
$LANG['ERROR_MESSAGE_REQUIRED'] = 'Vyplňte prosím zprávu';
$LANG['ERROR_INVALID_FROM_ADDRESS'] = 'Neplatná adresa OD';
$LANG['ERROR_EMAIL_PARSE_FAILED'] = 'Emaily nejsou shodné';
$LANG['ERROR_SERVICES_NOT_AVAILABLE'] = 'Služba není dostupná!';
$LANG['ERROR_POSSIBLY_INVALID_TICKET'] = 'Přístup odepřen. Pravděpodobně špaté ID Ticketu';
$LANG['ERROR_SECURITY_REPEAT_RESULT_LOCK'] = 'Porušení bezpečnosti. Opakované porušení bude mít za následek uzamčení vašeho účtu.';
$LANG['ERROR_INVALID_FILE_TYPE'] = 'Neplatný typ souboru';
$LANG['ERROR_FILE_REJECTED'] = 'Soubor {0} zamítnut!';
$LANG['ERROR_UNABLE_SEND_MESSAGE_TRY_AGAIN'] = 'Nelze odeslat zprávu. Zkuste to znovu';
$LANG['ERROR_OCCURED'] = 'Vyskytla(y) se chyba(y). Prosím zkuste to znovu';
$LANG['ERROR_UNKNOW_ACTION'] = 'Neznámá akce';
$LANG['ERROR_YOU_HAVE_REACHED_MAXIMUM_FAILED_LOGIN']='Dosáhli jste maxima povolených pokusů o neúspěšné přihlášení. Zkuste to znovu za 5 minut, nebo <a href="open.php">otevřete nový ticket</a>';
$LANG['ERROR_YOU_MUST_CHANGE_PASSWORD'] = 'You must change your password to continue.';
$LANG['ERROR_YOU_HAVE_REACHED_MAXIMUM_FAILED_LOGIN']='Dosáhli jste maxima povolených pokusů o neúspěšné přihlášení. Zkuste to znovu za 5 minut, nebo <a href="open.php">otevřete nový ticket</a>';

$LANG['TITLE'] = 'Tickets FullService'; 
$LANG['TITLE_BOX_NEW_TICKET'] = 'Nový Ticket';
$LANG['TITLE_OPEN_PREVIUS_TICKET'] = 'Otevřít existující ticket';

// relative path of imagens in "translate/".$LANG['LANGUAGE']."/"
$LANG['IMAGE_STAFF_VIEW_OPEN'] = 'staff/view_open.gif';
$LANG['IMAGE_STAFF_VIEW_CLOSED'] = 'staff/view_closed.gif';
$LANG['IMAGE_STAFF_REFRESH'] = 'staff/refresh.gif';

$LANG['LABEL_EMAIL'] = 'E-Mail';
$LANG['LABEL_TICKET_NUMBER'] = 'Ticket#';
$LANG['LABEL_FULL_NAME'] = 'Celé jméno';
$LANG['LABEL_NAME'] = 'Jméno';
$LANG['LABEL_EMAIL_ADDRESS'] = 'Emailová Adresa';
$LANG['LABEL_EMAIL'] = 'Email';
$LANG['LABEL_TELEPHONE'] = 'Telefon';
$LANG['LABEL_PHONE'] = 'Telefon';
$LANG['LABEL_HELP_TOPIC'] = 'Téma nápovědy';
$LANG['LABEL_SUBJECT'] = 'Předmět';
$LANG['LABEL_MESSAGE'] = 'Zpráva';
$LANG['LABEL_PRIORITY'] = 'Priorita';
$LANG['LABEL_ATTACHMENT'] = 'Příloha';
$LANG['LABEL_TICKET_STATUS'] = 'Status Ticketu';
$LANG['LABEL_VIEW_STATUS'] = 'Zobrazit Status'; 
$LANG['LABEL_DEPARTMENT'] = 'Oddělení';
$LANG['LABEL_CREATE_DATE'] = 'Datum Vytvoření';
$LANG['LABEL_USERNAME'] = 'Uživatelské jméno';
$LANG['LABEL_PASSWORD'] = 'Heslo';
$LANG['LABEL_PASSWORD_AGAIN'] = 'Heslo (znovu)';
$LANG['LABEL_POST_REPLY']='Odeslat odpověď';
$LANG['LABEL_RESET'] = 'Reset';
$LANG['LABEL_CANCEL'] = 'Zrušit';
$LANG['LABEL_SUBMIT'] = 'Odeslat';
$LANG['LABEL_TRANSFER'] = 'Přenést';
$LANG['LABEL_ASSIGN'] = 'Přidělit';
$LANG['LABEL_OPEN_TICKET'] = 'Otevřít Ticket';
$LANG['LABEL_OPEN_NEW_TICKET'] = 'Otevřít Nový Ticket';
$LANG['LABEL_SUBMIT_TICKET'] = 'Odeslat Ticket';
$LANG['TEXT_SELECT_ONE_TOPIC'] = 'Vyberte..';
$LANG['LABEL_MY_PROFILE'] = 'My Profile';
$LANG['LABEL_PREFERENCES'] = 'Preferences';
$LANG['LABEL_CHANGE_PASSWORD'] = 'Change Password';
$LANG['LABEL_MY_PREFERENCES'] = 'Moje Nastavení';
$LANG['LABEL_CHECK_STATUS'] = 'Ověřit Status';
$LANG['LABEL_MY_PROFILE'] = 'My Profile';
$LANG['LABEL_PREFERENCES'] = 'Preferences';
$LANG['LABEL_CHANGE_PASSWORD'] = 'Change Password';
$LANG['LABEL_ADMIN_PANEL'] = 'Admin Panel';
$LANG['LABEL_STAFF_PANEL'] = 'Panel Podpory';
$LANG['TEXT_GENERAL_INQUIRY'] = 'Obecný Dotaz';
$LANG['LABEL_QUERY'] = 'Query';
$LANG['LABEL_SEARCH'] = 'Search';
$LANG['LABEL_ADVANCED'] = 'Advances';
$LANG['LABEL_STATUS_IS'] = 'Status is';
$LANG['LABEL_DEPT'] = 'Dept.';
$LANG['LABEL_DATE_SPAN'] = 'Date Span';
$LANG['LABEL_FROM'] = 'From.';
$LANG['LABEL_TO'] = 'To.';
$LANG['LABEL_SORT_BY'] = 'Sort by';
$LANG['LABEL_ASCENDING'] = 'Ascending';
$LANG['LABEL_DESCENDING'] = 'Descending';
$LANG['LABEL_RESULTS_PER_PAGE'] = 'Results Per Page';

$LANG['TEXT_ACCESS_DENIED']='Přístup odepřen';
$LANG['TEXT_CREATE_FAILED'] = 'Vytvoření Selhalo ';
$LANG['TEXT_WELCOME_BACK'] = 'Vítejte Zpět';
$LANG['TEXT_LOG_OUT'] = 'Odhlásit';
$LANG['TEXT_MY_ACCOUNT'] = 'Můj Účet';
$LANG['TEXT_SUPPORT_TICKET_SISTEM'] = '<span>SUPPORT TICKET</span> SYSTEM';
$LANG['TEXT_MY_TICKETS'] = 'Moje Tickety';
$LANG['TEXT_TICKETS_STATUS'] = 'Status Ticketů';
$LANG['TEXT_NEW_TICKET'] = 'Nový Ticket';
$LANG['TEXT_HOME'] = 'Domů';
$LANG['TEXT_SUPPORT_CENTER'] = 'Cuntrum Podpory';
$LANG['TEXT_WELCOME_TITLE'] = 'Vítejte v centru podpory.';
$LANG['TEXT_WELCOME_MSG'] = 'Pro zlepšení technické podpory a urychlení vyřizovaní Vašich požadavků jsme nainstalovali systém pro jejich správu. Každému požadavku je přiděleno jedinečné číslo, které můžete použít ke sledování jeho stavu a příslušných odpovědí online. Pro přehlednost zde najdete také kompletní archivy a historii Vašich dotazů na technickou podporu. Tento systém vyžaduje platnou e-mailovou adresu.';
$LANG['TEXT_BOX_NEW_TICKET'] = 'Odeslat nový požadavek na podporu. Prosíme Vás, abyste poskytli co nejpodrobnější popis, urychlí to vyřízení Vašeho požadavku. Pro aktualizaci požadavku zadaného dříve použijte prosím formulář vpravo.. Vyžadována platná e-mailová adresa.';
$LANG['TEXT_OPEN_NEW_TICKET'] = 'Otevřít nový ticket';
$LANG['TEXT_OPEN_PREVIUS_TICKET'] = 'Ověřit status existujícího ticketu.. zajišťujeme archiv a historii všech Vašich požadavků na podporu s kompletní historií odpovědí.';
$LANG['TEXT_TICKET_CREATED'] = 'Žádost na Support ticket vytvořena';
$LANG['TEXT_UNABLE_CREATE_TICKET'] = 'Nelze vytvořit ticket. Prosím opravte chyby níže a zkuste to znovu!';
$LANG['TEXT_PLEASE_FILL_FORM_NEW_TICKET'] = 'Prosím vyplňte formulář níže pro otevření nového ticketu.';
$LANG['TEXT_NOT_THIS_USER'] = 'Nejsem tento uživatel';
$LANG['TEXT_THANKS_NEW_TICKET'] = 'Děkujeme, že jste nás kontaktovali.<br>Požadavek na ticket podpory byl vytvořen a pracovník podpory Vás kontaktuje ihned jak to bude možné.';
$LANG['TEXT_NEW_TICKET_AUTO_RESPONSE'] = 'E-mail s číslem ticketu byl odeslán na <b>{0}</ b>. Budete potřebovat číslo ticketu spolu s e-mailem pro zobrazení stavu a postupu on-line.<br><br>Pokud budete chtít poslat další připomínky nebo informace o stejné záležitosti, prosím, postupujte podle pokynů v e-mailu.';
$LANG['TEXT_SUPPORT_TEAM'] = 'Tým Podpory';
$LANG['TEXT_MESSAGE_POSTED_SUCCESSFULLY'] = 'Zpráva Úspěšně odeslána';
$LANG['TEXT_TICKET_NUMBER'] = 'Ticket #';
$LANG['TEXT_TICKET_THREAD'] = 'Vlákno Ticketu';
$LANG['TEXT_TICKET_WILL_REOPEN_NEW_POST']='Ticket will be reopened on message post';
$LANG['TEXT_ENTER_MESSAGE']='Napište Zprávu';
$LANG['TEXT_ATTACH_FILE']='Přiložit Soubor';
$LANG['TEXT_POST_REPLY']='Odeslat Odpověď';
$LANG['TEXT_VIEW_OPEN']='Zobrazit Otevřené';
$LANG['TEXT_VIEW_CLOSED']='Zobrazit Uzavřené';
$LANG['TEXT_REFRESH']='Obnovit';
$LANG['TEXT_SORT_BY_TICKET_ID']='Řadit Podle ID Ticketu';
$LANG['TEXT_SORT_BY_DATE']='Řadit Podle Datumu';
$LANG['TEXT_SORT_BY_DEPARTMENT']='Řadit Podle Oddělení';
$LANG['TEXT_NO_TICKETS_FOUND']='ŽÁDNÉ Tickety nebyly nalezeny.';
$LANG['TEXT_AUTHENTICATION_REQUIRED']='Vyžadováno Ověření';
$LANG['TEXT_AUTHENTICATION_REQUIRED_QUESTION']='Vyžadováno Ověření?';
$LANG['TEXT_INVALID_LOGIN']='Neplatné přihlašovací údaje';
$LANG['TEXT_FORGOT_YOUR_LOGIN_INFO']='Zapoměli jste své přihlašovací údaje? Prosím <a href="open.php">otevřete nový ticket</a>.';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS']='Nadměrně pokusů o přihlášení';
$LANG['TEXT_YOUVE_REACHED_MAXIMUM_FAILED_LOGIN_ATTEMPTS_ALLOWED']='Dosáhli jste maxima povolených pokusů o neúspěšné přihlášení.';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='Nadměrně pokusů o přihlášení (klient)';
$LANG['TEXT_HEADER_TITLE']='osTicket :: Support Ticket System';
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET']='Chcete-li zobrazit stav ticketu, vyplňte své přihlašovací údaje níže.<br/>'.
        'Pokud je toto poprvé co nás kontaktujete, nebo jste ztratili ID ticketu, prosím <a href="open.php">klikněte zde</a> pro otevření nového ticketu.';	
$LANG['TEXT_WELCOME_BACK_VACATION']= 'Welcome back! You are listed as \'on vacation\' Please let admin or your manager know that you are back.';
$LANG['TEXT_WELCOME_BACK_CLIENT'] = 'Welcome back, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_BACK_STAFF'] = 'Welcome back, <strong>{0}</strong>';
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET']='Chcete-li zobrazit stav ticketu, vyplňte své přihlašovací údaje níže.<br/>'.
        'Pokud je toto poprvé co nás kontaktujete, nebo jse ztratili ID ticketu, prosím <a href="open.php">klikněte zde</a> pro otevření nového ticketu.';	
$LANG['TEXT_SESSION_TIMED_OUT_DUE_TO_INACTIVITY']='Relace vypršela kvůli nečinnosti';
$LANG['TEXT_SHOW_FROM_TO_OF_ALL'] = 'Showing {0} - {1} of {2}';
$LANG['TEXT_SHOW_ZERO'] = 'Showing 0 (zero)';
$LANG['TEXT_OVERDUE_TICKETS'] = 'Overdue Tickets';
$LANG['TEXT_ANSWERED_TICKETS'] = 'Answered Tickets';
$LANG['TEXT_ASSIGNED_TICKETS'] = 'Assigned Tickets';
$LANG['TEXT_SEARCH_RESULTS'] = 'Search Results';
$LANG['TEXT_OPEN_TICKETS'] = 'Open Tickets';
$LANG['TEXT_CLOSED_TICKETS'] = 'Closed Tickets';
$LANG['TEXT_OVERDUE_TICKETS'] = 'Overdue Tickets';
$LANG['TEXT_ANY_STATUS'] = 'Any status';
$LANG['TEXT_OPEN'] = 'Open';
$LANG['TEXT_CLOSED'] = 'Closed';
$LANG['TEXT_OVERDUE'] = 'Overdue';

$LANG['ALERT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='Nadměrně pokusů o přihlášení klientem'."\n".
                'Email: {0}'."\n".
				'Ticket#: {1}'."\n".
                'IP: {2}'."\n".
				'Čas: {3}'."\n\n".
                'Pokusů #{4}';
 ?>
