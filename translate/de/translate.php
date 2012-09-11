<?php

#Disable direct access.
if (!strcasecmp(basename($_SERVER['SCRIPT_NAME']), basename( __FILE__ ))) die ('kwaheri rafiki!');

$LANG = array ();

# Language identification in iso-639
$LANG['LANGUAGE'] = 'de';
//Word Name (english name)
$LANG['LANGUAGE_NAME'] = 'German';
//Native name of language (in the original language)
$LANG['LANGUAGE_NATIVE_NAME'] = 'Deutsch';
$LANG['DIRECTION'] = 'ltr';
$LANG['CODEPAGE'] = 'UTF-8';

########
##Alert Messages, normally used with JavaScript dialog box.
##
$LANG['ALERT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT'] = 'Mehrere Loginversuche durch client'."\n".
                'Email: {0}'."\n".
				'Ticket#: {1}'."\n".
                'IP: {2}'."\n".
				'Time: {3}'."\n\n".
                'Anz. Versuche #{4}';

#######
## Error Mensages
##
$LANG['ERROR_ACCESS_DENIED_INVALID_TICKET'] = 'Zugriff verweigert, möglicherweise eine ungültige Ticket ID ?';
$LANG['ERROR_EMAIL_PARSE_FAILED'] = 'Email parse fehlgeschlagen';
$LANG['ERROR_FILE_REJECTED'] = 'Datei {0} abgelehnt!';
$LANG['ERROR_INVALID_FROM_ADDRESS'] = 'Ungültige FROM Adresse';
$LANG['ERROR_INVALID_FILE_TYPE'] = 'Ungültiger Dateityp';
$LANG['ERROR_MESSAGE_REQUIRED'] = 'Nachricht erforderlich';
//$LANG['ERROR_INVALID_FROM_ADDRESS']
$LANG['ERROR_NAME_REQUIRED'] = 'Name erforderlich';
//$LANG['ERROR_MESSAGE_REQUIRED']
$LANG['ERROR_OCCURED'] = 'Ein/Mehrere Fehler sind aufgetreten, bitte erneut versuchen';
$LANG['ERROR_OCCURED_TRY_AGAIN'] = 'Ein/Mehrere Fehler sind aufgetreten, bitte erneut versuchen';
$LANG['ERROR_POSSIBLY_INVALID_TICKET'] = 'Zugriff verweigert, möglicherweise eine ungültige Ticket ID ?';
//$LANG['ERROR_SEARCH_TERM_MORE_3']
$LANG['ERROR_SECURITY_REPEAT_RESULT_LOCK'] = 'Sicherheitsverstoß. Wiederholte Verstösse führen zur Sperrung des Accounts.';
$LANG['ERROR_SECURITY_VIOLATION_YOUR_ACCOUNT_WILL_LOCKED'] = 'Sicherheitsverstoß. Wiederholte Verstösse führen zur Sperrung des Accounts.';
$LANG['ERROR_SERVICES_NOT_AVAILABLE'] = 'Dienst nicht verfügbar!';
$LANG['ERROR_UNABLE_SEND_MESSAGE_TRY_AGAIN'] = 'Kann Nachricht nicht einfügen, bitte erneut versuchen';
$LANG['ERROR_UNABLE_TO_POST_THE_RESPONSE'] = 'Kann Antwort nicht einfügen';
$LANG['ERROR_UNABLE_TO_POST_MESSAGE'] = 'Kann Nachricht nicht einfügen, bitte erneut versuchen';
$LANG['ERROR_UNKNOW_ACTION'] = 'Unbekannte Aktion';
$LANG['ERROR_YOU_HAVE_REACHED_MAXIMUM_FAILED_LOGIN'] = 'Sie hatten zu viele fehlerhafte Loginversuche. Versuchen Sie es in 5 Minuten erneut.';
$LANG['ERROR_YOU_MUST_CHANGE_PASSWORD'] = 'Sie müssen ein neues Passwort vergeben um fortzufahren.';
$LANG['ERROR_SEARCH_TERM_MORE_3'] = 'Der Suchbegriff muss mindestens 3 Zeichen lang sein';

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
$LANG['LABEL_ACTIVE_IN_PARENTESIS'] = '(Aktiv)';
$LANG['LABEL_ADD_NEW_DEPT'] = 'Neue Abteilung';
$LANG['LABEL_ADMIN_DASHBOARD'] = 'Admin Zentrale';
$LANG['LABEL_ADMIN_PANEL'] = 'Admin Interface';
$LANG['LABEL_ADVANCED'] = 'Erweitert';
$LANG['LABEL_ALL'] = 'Alle';
$LANG['LABEL_ALL_DEPARTMENTS'] = 'Alle Abteilungen';
$LANG['LABEL_API'] = 'API';
$LANG['LABEL_APPEND'] = 'Einfügen';
$LANG['LABEL_APPEND_SIGNATURE'] = 'Signatur einfügen'; 
$LANG['LABEL_ASC'] = 'ASC';
$LANG['LABEL_ASCENDING'] = 'Absteigend';
$LANG['LABEL_ASSIGN'] = 'Zuweisen';
$LANG['LABEL_ASSIGN_TO_STAFF'] = 'An Mitarbeiter zuweisen';
$LANG['LABEL_ASSIGNED_TICKETS'] = 'Zugewiesene Tickets';
$LANG['LABEL_ATTACHMENT'] = 'Anhang';
$LANG['LABEL_ATTACHMENTS'] = 'Anhänge';
$LANG['LABEL_AUTO_RESPONSE_EMAIL'] = 'Auto Antwort Email';
$LANG['LABEL_AUTORESPONDERS'] = 'Autoresponders';
$LANG['LABEL_AUTORESP'] = 'AutoResp.';
// Label B
$LANG['LABEL_BASIC'] = 'Basis';
// Label C
$LANG['LABEL_CLOSE'] = 'Schließen';
$LANG['LABEL_CLOSED'] = 'Geschlossen';
$LANG['LABEL_CLOSE_TICKET'] = 'Schließe Ticket';
$LANG['LABEL_CLOSED_TICKETS'] = 'Geschlossene Tickets';
$LANG['LABEL_CANCEL'] = 'Abbrechen';
$LANG['LABEL_CANNED_RESPONSE'] = 'Vordefinierte Antwort';
$LANG['LABEL_CATEGORY'] = 'category';
$LANG['LABEL_CATEGORY_DEPT'] = 'Kategorie/Abteilung';
$LANG['LABEL_CHANGE_PASSWORD'] = 'Passwort ändern';
$LANG['LABEL_CHECK_STATUS'] = 'Status prüfen';
$LANG['LABEL_CLOSED'] = 'Geschlossen';
$LANG['LABEL_CREATE_DATE'] = 'Erstellungsdatum';
// Label D
$LANG['LABEL_DASHBOARD'] = 'Dashboard';
$LANG['LABEL_DATE'] = 'Datum';
$LANG['LABEL_DATE_SPAN'] = 'Zeitspanne';
$LANG['LABEL_MAXIMUM_PAGER_SIZE'] = 'Maximale Anz. Ergebnisse';
$LANG['LABEL_MAXIMUM_PAGER_SIZE2'] = '&nbsp;Tickets/Objekte pro Seite.';
$LANG['LABEL_AUTO_REFRESH_RATE'] = 'Automatische Aktualisierung';
$LANG['LABEL_AUTO_REFRESH_RATE2'] = '&nbsp;in Minuten. (<i>Seiten Aktualisierngsrate in Minuten. Geben Sie 0 zum deaktivieren ein</i>)';
$LANG['LABEL_DEFAULT'] = 'Default';
$LANG['LABEL_DELETE'] = 'Löschen';
$LANG['LABEL_DELETE_DEPT_S'] = 'Abteilung löschen';
$LANG['LABEL_DEPARTMENT'] = 'Abteilung';
$LANG['LABEL_DEPARTMENTS'] = 'Abteilungen';
$LANG['LABEL_DEPT_MANAGER'] = 'Dep Abteilungsleiter';
$LANG['LABEL_DEPT_MANAGER_NONE'] = 'Keine';
$LANG['LABEL_DEPT'] = 'Abt.';
$LANG['LABEL_DEPT_ACCESS'] = 'Abt. Zugriff';
//$LANG['LABEL_DEPT_TYPE']
$LANG['LABEL_DEPT_NAME'] = 'Abt. Name';
$LANG['LABEL_DEPT_EMAIL'] = 'Abt. Email';
$LANG['LABEL_DEPT_EMAIL_ABOVE'] = 'Abt. Email (oben)';
$LANG['LABEL_DEPT_SIGNATURE'] = 'Abt. Signatur';
$LANG['LABEL_DEPT_TYPE'] = 'Abt. Typ';
$LANG['LABEL_DESC'] = 'DESC';
$LANG['LABEL_DESCENDING'] = 'Absteigend';
$LANG['LABEL_DISABLED_IN_PARENTESIS'] = '(Deaktiviert)';
$LANG['LABEL_DIRECTORY'] = 'Verzeichnis';
$LANG['LABEL_DIRECTORY_STAFF'] = 'Mitarbeiterverzeichnis';
// Label E
$LANG['LABEL_EMAIL'] = 'E-Mail';
$LANG['LABEL_EMAILS'] = 'E-Mails';
$LANG['LABEL_EMAILS_SETTINGS'] = 'E-Mail Einstellungen';
$LANG['LABEL_EMAIL_ADDRESS'] = 'Email Adresse';
$LANG['LABEL_EMAIL_TEMPLATES'] = 'Email Vorlagen';
$LANG['LABEL_ENABLE_SYSTEM_OFF_LINE'] = 'Aktiviert';
$LANG['LABEL_ENTER_NOTE_CONTENT'] = 'Notiz eingeben.';
// Label F
$LANG['LABEL_FROM'] = 'Von.';
$LANG['LABEL_FULL_NAME'] = 'Voller Name';
// Label G
$LANG['LABEL_GENERAL_SETTINGS'] = 'Allgemeine Einstellungen';
$LANG['LABEL_GO'] = 'LOS';
// Label H
$LANG['LABEL_HELP_TOPIC'] = 'Hilfe Kategorie';
$LANG['LABEL_HELP_TOPICS'] = 'Hilfe Kategorien';
$LANG['LABEL_HELPDESK_ATTEMPT_ALLOWED_BEFORE_A'] = 'Versuche erlaubt&nbsp;bevor ein';
$LANG['LABEL_HELPDESK_BIND_STAFF_SESSION_TO_IP'] = 'Mitarbeiter Session an IP binden';
$LANG['LABEL_HELPDESK_BIND_STAFF_SESSION_TO_IP2'] = 'Binde die Mitarbeiter Session an die Login IP Adresse.';
$LANG['LABEL_HELPDESK_CLIENT_EXCESSIVE_LOGINS'] = 'Exzessive Kundenlogins';
$LANG['LABEL_HELPDESK_CLIENT_SESSION_TIMEOUT'] = 'Kunden Session Timeout';
$LANG['LABEL_HELPDESK_CLICKABLE_URLS'] = 'Anklickbare URLs';
$LANG['LABEL_HELPDESK_DEFAULT_DEPARTMENT'] = 'Standard Abteilung';
$LANG['LABEL_HELPDESK_DEFAULT_EMAIL_TEMPLATES'] = 'Standard Email Vorlagen';
$LANG['LABEL_HELPDESK_ENABLE_AUTO_CRON'] = 'Auto Cron aktivieren';
$LANG['LABEL_HELPDESK_MAKE_URLS_CLICKABLE'] = 'URLs anklickbar machen';
$LANG['LABEL_HELPDESK_NAME_TITLE'] = 'Helpdesk Name/Title';
$LANG['LABEL_HELPDESK_NONE_DISABLE_LOGGER'] = 'Keine (Logger deaktivieren)';
$LANG['LABEL_HELPDESK_PENALTY_IN_MINUTES'] = 'min. timeout (Sperrzeit in Minuten)';
$LANG['LABEL_HELPDESK_PURGE_NONE_DISABLE'] = 'Keine (Deaktiviert)';
$LANG['LABEL_HELPDESK_PURGE_LOGS_AFTER'] = 'Protokoll aufräumen nach';
$LANG['LABEL_HELPDESK_DEFAULT_PAGE_SIZE'] = 'Standard Seiten Größe';
$LANG['LABEL_HELPDESK_SELECT_DEFAULT_DEPARTMENT'] = 'Standard Abteilung auswählen';
$LANG['LABEL_HELPDESK_SELECT_DEFAULT_TEMPLATE'] = 'Default Vorlage auswählen';
$LANG['LABEL_HELPDESK_STAFF_EXCESSIVE_LOGINS'] = 'Mitarbeiter exzessive Logins';
$LANG['LABEL_HELPDESK_STAFF_SESSION_TIMEOUT'] = 'Mitarbeiter Session Timeout';
$LANG['LABEL_HELPDESK_STATUS'] = 'Helpdesk Status';
$LANG['LABEL_HELPDESK_SYSTEM_LOG_LEVEL'] = 'System Log Level';
$LANG['LABEL_HELPDESK_URL'] = 'Helpdesk URL';
// Label I
$LANG['LABEL_ISSUE_SUMMARY'] = 'Übersicht der Vorkommen';
// Label J
// Label K
$LANG['LABEL_KNOWLEDGE_BASE'] = 'Antworten';
$LANG['LABEL_KNOWLEDGE_BASE_PREMATE'] = 'Vorgefertigte Antworten';
// Label L
$LANG['LABEL_LAST_UPDATED'] = 'Zuletzt aktualisiert';
$LANG['LABEL_LOG_OUT'] = 'Ausloggen';
// Label M
$LANG['LABEL_MAKE_PUBLIC'] = 'Öffentlich machen';
$LANG['LABEL_MAKE_PRIVATE'] = 'Privat machen';
$LANG['LABEL_MANAGER'] = 'Manager';
$LANG['LABEL_MESSAGE'] = 'Nachricht';
$LANG['LABEL_MONTH'] = 'Monat';
$LANG['LABEL_MONTHS'] = 'Monate';
$LANG['LABEL_MY_ACCOUNT'] = 'Mein Account';
$LANG['LABEL_MY_PREFERENCE'] = 'Meine Einstellungen';
$LANG['LABEL_MY_PROFILE'] = 'Mein Profil';
$LANG['LABEL_MY_SIGNATURE'] = 'Meine Signatur';
// Label N
$LANG['LABEL_NAME'] = 'Name';
$LANG['LABEL_NEW_DEPARTMENT'] = 'Neue Abteilung';
$LANG['LABEL_NEW_MESSAGE'] = 'Neue Nachricht';
$LANG['LABEL_NEW_PREMADE_REPLY'] = 'Neue vorgefertigte Antwort';
$LANG['LABEL_NEW_TICKET'] = 'Neues Ticket';
$LANG['LABEL_NEW_TICKET_PRIORITY'] = 'Priorität des neuen Tickets';
$LANG['LABEL_NO_MANAGER_ADD_USERS'] = 'Keine User (User hinzufügen)';
$LANG['LABEL_NONE'] = 'Keine';
$LANG['LABEL_NOTE_TITLE'] = 'Notiztitel';
// Label O
$LANG['LABEL_OPEN'] = 'offen';
$LANG['LABEL_OPEN_NEW_TICKET'] = 'Neues Ticket öffnen';
$LANG['LABEL_OPEN_TICKET'] = 'Ticket öffnen';
$LANG['LABEL_OTHER'] = 'Outro';
$LANG['LABEL_OUTGOING_EMAIL'] = 'Ausgehende eMail';
$LANG['LABEL_OVERDUE'] = 'Überfällig';
// Label P
$LANG['LABEL_PAGE'] = 'Seite';
$LANG['LABEL_PASSWORD'] = 'Passwort';
$LANG['LABEL_PASSWORD_AGAIN'] = 'Passwort (erneut)';
$LANG['LABEL_PHONE'] = 'Telefon';
$LANG['LABEL_POST_INTERNAL_NOTE'] = 'Interne Notiz verfassen';
$LANG['LABEL_POST_REPLY']='Antworten';
$LANG['LABEL_PREFERENCES'] = 'Eigenschaften'; 
$LANG['LABEL_PREMADE_REPLIES'] = 'Vorgefertigte Antworten';
$LANG['LABEL_PRIMARY_OUTGOING_EMAIL'] = 'Primäre ausgehende eMail';
$LANG['LABEL_PRIORITY'] = 'Priorität';
$LANG['LABEL_PRIVATE'] = 'Privat';
$LANG['LABEL_PRIVATE_HIDDEN'] = 'Privat (Versteckt)';
$LANG['LABEL_PUBLIC'] = 'Öffentlich';
// Label Q
$LANG['LABEL_QUERY'] = 'Abfrage';
$LANG['LABEL_QUERY_RETURNED_ZERO_RESULT'] = 'Abfrage gab 0 Treffer zurück';
// Label R
$LANG['LABEL_RE_ASSIGN_TICKET'] = 'Mitarbeiter zuweisen';
$LANG['LABEL_REOPEN'] = 'Erneut öffnen';
$LANG['LABEL_REOPEN_TICKET'] = 'Ticket erneut öffnen';
$LANG['LABEL_RESET'] = 'Zurücksetzen';
$LANG['LABEL_RESULTS_PER_PAGE'] = 'Ergebnisse pro Seite';
$LANG['LABEL_REPLY_TITLE'] = 'Antwort Betreff';
// Label S
$LANG['LABEL_SEARCH'] = 'Suche';
$LANG['LABEL_SEARCH_FOR'] = 'Suche nach';
$LANG['LABEL_SELECT'] = 'Auswählen';
$LANG['LABEL_SELECT_DEPARTMENT'] = 'Abteilung auswählen';
$LANG['LABEL_SELECT_MANAGER_OPTIONAL'] = 'Abteilungsleiter auswählen (optional)';
$LANG['LABEL_SELECT_ONE_TOPIC'] = 'Eine auswählen';
$LANG['LABEL_SELECT_ONE_EMAIL'] = 'Eine auswählen';
$LANG['LABEL_SELECT_PRIORITY'] = 'Priorität auswählen';
$LANG['LABEL_SELECT_SOURCE'] = 'Quelle auswählen';
$LANG['LABEL_SELECT_TEMPLATE'] = 'Vorlage auswählen';
$LANG['LABEL_SETTINGS'] = 'Einstellungen';
$LANG['LABEL_SORT_BY'] = 'Sortiert nach';
$LANG['LABEL_SORT_BY_TITLE'] = 'Nach Betreff sortieren';
$LANG['LABEL_SORT_BY_UPDATE_DATE'] = 'Nach Aktualisierungsdatum sortieren';
$LANG['LABEL_STAFF'] = 'Mitarbeiter';
$LANG['LABEL_STAFF_MEMBER'] = 'Mitarbeiter';
$LANG['LABEL_STAFF_MEMBERS'] = 'Mitarbeiter';
$LANG['LABEL_STAFF_PANEL'] = 'Mitarbeiter Interface';
$LANG['LABEL_STAFF_VIEWTICKET_SELECT_ACTION']='Aktion auswählen';
$LANG['LABEL_STAFF_VIEWTICKET_CHANGE_PRIORITY']='Priorität ändern';
$LANG['LABEL_STAFF_VIEWTICKET_MARK_OVERDUE']='Als überfällig markieren';
$LANG['LABEL_STAFF_VIEWTICKET_RELEASE_UNASSIGN']='Freigeben (Zuweisung entfernen)';
$LANG['LABEL_STAFF_VIEWTICKET_CLOSE_TICKET']='Ticket schließen';
$LANG['LABEL_STAFF_VIEWTICKET_REOPEN_TICKET']='Ticket erneut öffnen';
$LANG['LABEL_STATUS'] = 'Status';
$LANG['LABEL_STATUS_IS'] = 'Status ist';
$LANG['LABEL_SUBMIT'] = 'Absenden';
$LANG['LABEL_SUBMIT_TICKET'] = 'Ticket absenden';
$LANG['LABEL_SUBJECT'] = 'Betreff';
$LANG['LABEL_SYSTEM_DEFAULT_TEMPLATE'] = 'System Standard';
$LANG['LABEL_SYSTEM_LOGS'] = 'System Protokoll';
$LANG['LABEL_SYSTEM_LOGS_ALL'] = 'Alle';
$LANG['LABEL_SYSTEM_LOGS_DATESPAN'] = 'Zeitspanne';
$LANG['LABEL_SYSTEM_LOGS_DEBUG'] = 'Debug';
$LANG['LABEL_SYSTEM_LOGS_ERRORS'] = 'Fehler';
$LANG['LABEL_SYSTEM_LOGS_FROM'] = 'Von';
$LANG['LABEL_SYSTEM_LOGS_GO'] = 'Los';
$LANG['LABEL_SYSTEM_LOGS_NO_RESULTS'] = 'Abfrage gab keine Ergebnisse zurück.';
$LANG['LABEL_SYSTEM_LOGS_TO'] = 'An';
$LANG['LABEL_SYSTEM_LOGS_TYPE'] = 'Typ';
$LANG['LABEL_SYSTEM_LOGS_WARNINGS'] = 'Warnungen';
$LANG['LABEL_SYSTEM_PREFERENCES_AND_SETTINGS'] = 'System Eigenschaften und Einstellungen';
$LANG["LABEL_SYSTEM_SETTINGS"] = 'System Einstellungen';
// Label T
$LANG['LABEL_TELEPHONE'] = 'Telefon';
$LANG['LABEL_TICKET'] = 'Ticket';
$LANG['LABEL_TICKET_ID'] = 'Ticket ID';
$LANG['LABEL_TICKET_NUMBER'] = 'Ticket#';
//$LANG['LABEL_TICKET_SOURCE']
$LANG['LABEL_TICKET_STATUS'] = 'Ticket Status';
$LANG['LABEL_TO'] = 'An.';
$LANG['LABEL_TOGGLE'] = 'Invertieren';
$LANG['LABEL_TRANSFER'] = 'Transfer';
$LANG['LABEL_TYPE'] = 'Typ';
// Label U
$LANG['LABEL_UPDATE_DATE'] = 'Zuletzt aktualisiert';
$LANG['LABEL_UPDATE_DEPARTMENT'] = 'Abteilung aktualisieren';
$LANG['LABEL_USERNAME'] = 'Benutzername';
$LANG['LABEL_USERS'] = 'Benutzer';
// Label V
$LANG['LABEL_VIEW_STATUS'] = 'Ansichtsstatus';

#######
## Generic text for all site, if have to text repeted in
## Client or Staff ends, is prefixed with correct name.
##
//// MORE TEXT
$LANG['TEXT_OPTIONS_ENABLE'] = 'Aktivieren';
$LANG['TEXT_OPTIONS_DISABLE'] = 'Deaktivieren';
// TEXT A
$LANG['TEXT_ACCESS_DENIED'] = 'Zugriff verweigert';
$LANG['TEXT_ALL_DEPARTMENTS'] = 'Alle Abteilunugen';
$LANG['TEXT_AND_STATUS_SET_TO'] = ' und Status geändert auf {0}';
$LANG['TEXT_AND_TICKET_STATUS_SET_TO_CLOSED'] = ' & Ticket geschlossen';
$LANG['TEXT_ANSWERED_STATS'] = 'Tickets Statistik ({0})';
$LANG['TEXT_ANSWERED_TICKETS'] = 'Beantwortete Tickets';
$LANG['TEXT_ANY_STATUS'] = 'Jeder Status';
$LANG['TEXT_ASSIGNED_TICKETS'] = 'Zugewiesene Tickets';
$LANG['TEXT_ATTACH_FILE'] = 'Datei anhängen';
$LANG['TEXT_AUTHENTICATION_REQUIRED'] = 'Authentifizierung erforderlich';
$LANG['TEXT_AUTHENTICATION_REQUIRED_QUESTION'] = 'Authentifizierung erforderlich ?';
// TEXT B
$LANG['TEXT_BOX_NEW_TICKET'] = 'Ein neues Ticket übermittlen. Bitte geben Sie so viele Informationen an wie möglich, um den bestmöglichen Support bieten zu können. Um ein existierendes Ticket zu aktualisieren, benutzen Sie bitte das Formular auf der rechten Seite.. Eine gültige eMail Adresse ist erforderlich !';
// TEXT C
$LANG['TEXT_CAM_BE_APPENDED_TO_RESPONSES'] = 'kann zur Antwort hinzugefügt werden.&nbsp;(verfügbar für Öffentliche Abteilungen)';
$LANG['TEXT_CLOSED_TICKETS'] = 'Geschlossene Tickets';
$LANG['TEXT_CLOSED'] = 'Geschlossen';
$LANG['TEXT_COMMENTS_REASONS_TRANSFER'] = 'Kommentare/Gründe für den Transfer. &nbsp;(<i>Interne Notiz</i>)';
$LANG['TEXT_CREATE_FAILED'] = 'Anlegen fehlgeschlagen ';
// TEXT D
$LANG['TEXT_DEPT_DEPENDS_ON_EMAIL'] = 'Dept depends on email &amp; help topics settings for incoming tickets.'; // TODO: translate
$LANG['TEXT_DEPT_TRANSFER'] = 'Abteilungs-Transfer';
$LANG['TEXT_DEPT_UPDATED_SUCCESSFULLY'] = 'Abt. erfolgreich aktualisiert';
// TEXT E
$LANG['TEXT_EMAIL_ADDED_TO_BANLIST'] = 'eMail ({0}) zur Bannliste hinzugefügt';
$LANG['TEXT_EMAIL_ADDRESS_USED_SEND_AUTO_RESPONSES'] = 'eMail Adresse für Auto-Antworten, sofern aktiviert.';
$LANG['TEXT_EMAIL_REMOVED_FROM_BANLIST'] = 'eMail von der Bannliste entfernt';
$LANG['TEXT_ENTER_MESSAGE'] = 'Nachricht eingeben';
//$LANG['TEXT_EXCESSIVE_FAILED_LOGIN_ATTEMPTS']
//$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']
// TEXT F  
$LANG['TEXT_FORGOT_YOUR_LOGIN_INFO']='Login Informationen vergessen ? öffnen Sie bitte ein <a href="open.php">neues Ticket</a>.';
// TEXT G
$LANG['TEXT_GENERAL_INQUIRY'] = 'Allgemeine Abfrage';
$LANG['TEXT_GLOBAL_AUTO_RESPONSE_SETTINGS'] = 'Die globale Auto-Antwort Option muss in den Einstellungen der Abteilung auf \'Aktiviert\' gesetzt sein.';
// TEXT H
$LANG['TEXT_HOME'] = 'Home'; 
$LANG['TEXT_HELPDESK_STAFF_MAX_IDLE_TIME_IN_MINUTES'] = '(<i>Maximale Mitarbeiter Leerlauf Zeit in Minuten. 0 Deaktiviert den Leerlauf</i>)';
$LANG['TEXT_HELPDESK_CLIENT_MAX_IDLE_TIME_IN_MINUTES'] = '(<i>Maximale Kunden Leerlauf Zeit in Minuten. 0 Deaktiviert den Leerlauf</i>)';
$LANG['TEXT_HELPDESK_ENABLE_CRON_CALL_ON_STAFF_ACTIVITY'] = 'Aktiviere Cron Abfrage bei Mitarbeiter aktivität';
// TEXT I
$LANG['TEXT_INTERNAL_NOTE_POSTED'] = 'Interne Notiz hinzugefügt';
$LANG['TEXT_INVALID_LOGIN'] = 'Ungültiger Login'; 
// TEXT J
// TEXT K
// TEXT L
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET']='Um den Status Ihrers Tickets einzusehen, geben Sie bitte unten Ihre Zugansdaten ein.<br/>'.
        'Wenn Sie uns das erste mal kontaktieren oder Ihre Ticket ID verloren haben, öffnen Sie bitte ein <a href="open.php">neues Ticket</a>.';
$LANG['TEXT_LOG_OUT'] = 'Ausloggen';
// TEXT M
//$LANG['TEXT_MESSAGE_POSTED_SUCCESSFULLY']
$LANG['TEXT_MY_ACCOUNT'] = 'Mein Account';
$LANG['TEXT_MY_TICKETS'] = 'Meine Tickets';
$LANG['TEXT_MY_TICKETS_STATS'] = 'Meine Tickets ({0})';
// TEXT N
$LANG['TEXT_NEW_TICKET'] = 'Neues Ticket';
$LANG['TEXT_NEW_TICKET_AUTO_RESPONSE'] = 'Eine eMail mit der Ticket Nummer wurd an <b>{0}</b> gesendet. Sie benötigen sowohl die Ticket Nummer, als auch Ihre eMail Adresse um den Status des Tickets online einzusehen.<br><br>Wenn sie weitere Informationen zu einem bestehenden Ticket hinzufügen wollen, beachten Sie bitte die Hinweise in Ihrer eMail.';
$LANG['TEXT_NOT_THIS_USER'] = 'Ich bin nicht dieser Benutzer';
$LANG['TEXT_NO_TICKETS_FOUND'] = 'KEINE Tickets gefunden.';
// TEXT O
$LANG['TEXT_OPEN'] = 'Öffnen';
$LANG['TEXT_OPEN_NEW_TICKET'] = 'Neues Ticket öffnen';
$LANG['TEXT_OPEN_PREVIOUS_TICKET'] = 'Prüfen sie den Status Ihrer bisher geöffneten Tickets. Wir archivieren Ihre in der Vergangenheit erstellen Tickets.';
//$LANG['TEXT_OPEN_STATS']
$LANG['TEXT_OPEN_TICKETS'] = 'Offene Tickets';
$LANG['TEXT_OF_SELECTED_TICKETS_REOPENED'] = "{0} von {1} ausgewählten Tickets erneut geöffnet";
$LANG['TEXT_OF_SELECTED_TICKETS_CLOSED'] = "{0} of {1} ausgewählten Tickets geschlossen";
$LANG['TEXT_OF_SELECTED_TICKETS_MARKED_OVERDUE'] = "{0} of {1} ausgewählten Tickets als überfällig markiert";
$LANG['TEXT_OF_SELECTED_TICKETS_DELETED'] = "{0} of {1} ausgewählten Tickets gelöscht";
$LANG['TEXT_OFFLINE']='Vielen Dank für Ihre Geduld.<br>'.
         'Unser Supportservice ist aktuell offline, bitte versuchen Sie es später erneut.';
$LANG['TEXT_OFFLINE_MODE_WILL_DISABLE_CLIENT'] = 'Der Offline Modus deaktiviert das Benutzerinterface und erlaubt den Zugriff auf osTicket <b>nur</b>'.
         ' für <b>Admins</b>';
$LANG['TEXT_PHP_MANUAL'] = 'Schauen Sie sich bitte das <a href="http://php.net/manual/de/function.date.php" target="_blank">PHP Manual</a> an falls Sie nicht wissen wie die folgenden Paramter einzutragen sind.';
$LANG['TEXT_TICKET_LOCK_RENEW_ON_FORM_ACTIVITY'] = 'Ticket sperren werden automatisch bei Formularaktivität erneuert wenn aktiviert.';
$LANG['TEXT_TICKET_OPTIONS_AND_SETTINGS'] = 'Ticket Optionen & Einstellungen';
$LANG['TEXT_OVERDUE'] = 'Überfällig';
$LANG['TEXT_OVERDUE_STATS'] = 'Überfällig seit ({0})';
$LANG['TEXT_OVERDUE_TICKETS'] = 'Überfällige Tickets';
// TEXT P
$LANG['TEXT_PLEASE_FILL_STAFF_FORM_BELOW_OPEN_NEW_TICKET'] = 'Bitte füllen Sie das Formular unten aus im ein Ticket zu öffnen.';
$LANG['TEXT_PLEASE_FILL_FORM_NEW_TICKET'] = 'Bitte füllen Sie das Formular unten aus im ein Ticket zu öffnen.';
$LANG['TEXT_PLEASE_TAKE_A_MINUTE_TO_DELETE_INSTALL'] = 'Bitte nehmen Sie sich einen Moment Zeit um das <strong>setup/install</strong> Verzeichnis aus Sicherheitsgründen zu löschen.';
$LANG['TEXT_POST_REPLY'] = 'Antworten';
$LANG['TEXT_PRIORITY_CHANGED_SUCCESSFULLY'] = 'Priorität erfolgreich geändert';
// TEXT Q
// TEXT R
$LANG['TEXT_REFRESH'] = 'Aktualisieren';
$LANG['TEXT_REQUIRED_WHEN_DEPT_IS_PUBLIC'] = 'Erforderlich wenn die Abteilung öffentlich ist';
$LANG['TEXT_RESPONSE_POSTED_SUCCESSFULLY'] = 'Antwort erfolgreich eingetragen';
// TEXT S
$LANG['TEXT_SEARCH_RESULTS'] = 'Suchergebniss';
$LANG['TEXT_SELECT_DEPARTMENTS_GROUP_MEMBERS'] = 'Select departments group members are allowed to access in addition to thier own department.';
$LANG['TEXT_SELECT_PREMADE_REPLY'] = 'Vorgefertigte Antwort auswählen';
$LANG['TEXT_SELECT_STAFF_MEMBER'] = '-Mitarbeiter auswählen.-';
$LANG['TEXT_SELECT_TARGET_DEPT'] = '-Abteilung auswählen-';
$LANG['TEXT_SESSION_TIMED_OUT_DUE_TO_INACTIVITY']='Sitzung wegen inaktivität geschlossen.';
$LANG['TEXT_SHOW_FROM_TO_OF_ALL'] = 'Zeige {0} - {1} von {2}';
$LANG['TEXT_SHOW_ZERO'] = 'Zeige 0 (null)';
$LANG['TEXT_SORT_BY_CATEGORY'] = 'Nach Kategorie sortieren';
$LANG['TEXT_SORT_BY_DATE'] = 'Nach Datum sortieren';
$LANG['TEXT_SORT_BY_DEPARTMENT'] = 'Nach Abteilung sortieren';
$LANG['TEXT_SORT_BY_TICKET_ID'] = 'Nach Ticket ID sortieren';
$LANG['TEXT_SORT_BY_PRIORITY'] = 'nach Priorität sortieren';
$LANG['TEXT_SUPPORT_TEAM'] = 'Kundensupport Team';
$LANG['TEXT_SUPPORT_CENTER'] = 'Support Zentrale';
$LANG['TEXT_SUPPORT_TICKET_SISTEM'] = '<span>SUPPORT TICKET</span> SYSTEM';
$LANG['TEXT_SYSTEM_IS_OFF_LINE'] = '<strong>Das System ist im Offline Modus</strong> - Das Benutzerinface ist in diesem Zustand deaktiviert und nur Administratoren können sich einloggen.';
// TEXT T
$LANG['TEXT_THANKS_NEW_TICKET'] = 'Vielen Dank.<br>Ein neues Support Ticket wrde erstellt und ein Mitarbeiter wird sich in kürze mit Ihnen in Verbinsung setzen.';
$LANG['TEXT_TICKET_ASSIGNED_TO_STAFF'] = 'An {0} zugeweisene Tickets';
$LANG['TEXT_TICKET_CREATED'] = 'Support Ticket Anfrage erstellt';
$LANG['TEXT_TICKET_CREATED_SUCCESSFULLY'] = 'Ticket erfolgreich erstellt';
$LANG['TEXT_TICKET_DELETED_FOREVER'] = 'Ticket unwiderruflich gelöscht';
$LANG['TEXT_TICKET_FLAGGED_AS_OVERDUE'] = 'Ticket als überfällig markiert';
$LANG['TEXT_TICKET_NUM_STATUS_SET_CLOSED'] = 'Ticket #{0} Status geschlossen';
$LANG['TEXT_TICKET_NUMBER'] = 'Ticket #';
$LANG['TEXT_TICKET_STATUS'] = 'Ticket Status';
$LANG['TEXT_TICKET_STATUS_CHANGED_TO'] = 'Ticket Status geändert zu {0}';
$LANG['TEXT_TICKET_STATUS_SET_TO_OPEN'] = 'Ticket GEÖFFNET';
$LANG['TEXT_TICKET_THREAD'] = 'Ticket Verlauf';
$LANG['TEXT_TICKET_TRANSFERED_SUCESSFULLY_TO_DEPT'] = 'Ticket erolfreich Abteilung {0} zugewiesen.';
$LANG['TEXT_TICKET_UPDATED_SUCCESSFULLY'] = 'Ticket erfolgreich aktualisiert';
$LANG['TEXT_TICKET_WILL_REOPEN_NEW_POST']='Durch eine erneute Nachricht wird das Ticket wieder geöffnet';
$LANG['TEXT_TICKETS_STATUS'] = 'Ticket Status';
$LANG['TEXT_TOTAL_OPEN_TICKETS'] = "Offen ({0})";
$LANG['TEXT_TOTAL_ANSWERED_TICKETS'] = "Beantwortet ({0})";
$LANG['TEXT_TOTAL_MY_TICKETS'] = 'Meine Tickets ({0})';
// TEXT U
$LANG['TEXT_UNABLE_CREATE_TICKET'] = 'Das Ticket konnte nicht angelegt werden. Bitte die aufgetretenen Fehler beheben und das Formular erneut absenden!';
$LANG['TEXT_UPDATE_TICKET'] = 'Ticket #{0} aktualisieren';
$LANG['TEXT_USED_FOR_OUTGOING_EMAILS'] = 'Wird für ausgehende eMails, Alarme und Notizen an Kunden und Benutzer genutzt.';
// TEXT V
$LANG['TEXT_VIEW_OPEN']='Offene ansehen';
$LANG['TEXT_VIEW_CLOSED']='Geschlossene ansehen';
$LANG['TEXT_VIEW_TICKET'] = 'Ticket ansehen';
$LANG['TEXT_VISIBLE_TO_CLIENT'] = 'Sichtbar für den Kunden.';
// TEXT X
// TEXT Y
$LANG['TEXT_YOUVE_REACHED_MAXIMUM_FAILED_LOGIN_ATTEMPTS_ALLOWED']='Sie haben das Maximum an Loginversuchen erreicht.';
// TEXT W
$LANG['TEXT_WELCOME_BACK'] = 'Willkommen zurück';
$LANG['TEXT_WELCOME_BACK_CLIENT'] = 'Willkommen zurück, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_BACK_STAFF'] = 'Willkommen zurück, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_BACK_VACATION']= 'Willkommen zurück! Sie sind als \'Im Urlaub\' markiert. Bitte teilen Sie Ihrem Admin oder Abteilungsleiter mit das Sie aus dem Urlaub zurück sind.';
$LANG['TEXT_WELCOME_MSG'] = 'Um Ihnen den optimalen Support bieten zu können betreiben wir ein Ticket System. Jeder Supportanfrage wird eine eindeutige Ticket ID zugeweisen, mit der Sie den Fortschritt und die Antwort des Supportteams online einsehen können.
  . Every support request is assigned a unique ticket number which you can use to track the progress and responses online. Wir archivieren Ihre in der Vergangenheit erstellen Tickets.';
$LANG['TEXT_WELCOME_TITLE'] = 'Willkommen im Supportzentrum.';

########
## Titles on pages and web pages
##
$LANG['TITLE'] = 'Tickets FullService';
$LANG['TITLE_BOX_NEW_TICKET'] = 'neues Ticket';
$LANG['TITLE_BAR_OFFLINE'] = 'Support Ticket System';
$LANG['TITLE_MY_PREFERENCES'] = 'Meine Einstellungen';
$LANG['TITLE_OFFLINE'] = 'Support Ticket System Offline';
$LANG['TITLE_OPEN_PREVIOUS_TICKET'] = 'Bestehendes Ticket öffnen';
$LANG['TITLE_CLOSED_TICKETS'] = 'Geschlossene Tickets';


########
## ADDEDED
##
## User Tab Answers
$LANG['TABLE_ANSWERS_STATUS_TD_ACTIVE'] = 'Aktiv';
$LANG['TABLE_ANSWERS_STATUS_TD_INACTIVE'] = 'Inaktiv';
## User Tab Directory
$LANG['BUTTON_DIRECTORY_STAFF_MEMBERS'] = 'Teammitglieder';
$LANG['TABLE_DIRECTORY_STAFF_MEMBERS_TH_DEPT'] = 'Abteilung';
$LANG['TABLE_DIRECTORY_STAFF_MEMBERS_TH_PHONE'] = 'Telefon';
$LANG['TABLE_DIRECTORY_STAFF_MEMBERS_TH_MOBILE'] = 'Mobil';
## User Tab My Account
$LANG['TABLE_MYACCOUNT_HEADING'] = 'Meine Account Informationen';
$LANG['TABLE_MYACCOUNT_TH_FIRSTNAME'] = 'Vorname';
$LANG['TABLE_MYACCOUNT_TH_LASTNAME'] = 'Nachname';
$LANG['TABLE_MYACCOUNT_TH_EMAIL'] = 'eMail';
$LANG['TABLE_MYACCOUNT_TH_OFFICE_PHONE'] = 'Bürotelefon';
$LANG['TABLE_MYACCOUNT_TH_EXT'] = 'Durchwahl';
$LANG['TABLE_MYACCOUNT_TH_MOBILE'] = 'Mobiltelefon';
$LANG['TABLE_MYACCOUNT_TH_SIGNATURE'] = 'Signatur';
## User Tab My Account - Change Password
$LANG['TABLE_MYACCOUNT_CHANGE_PWD_TH_CURRENT'] = 'Aktuelles Passwort';
$LANG['TABLE_MYACCOUNT_CHANGE_PWD_TH_NEWPWD'] = 'Neues Passwort';
$LANG['TABLE_MYACCOUNT_CHANGE_PWD_TH_NEWPWD2'] = 'Passwort Bestätigung';

#some other stuff
$LANG['LABEL_DATE_FORMAT'] = 'Datumsformat';
$LANG['LABEL_DATETIME_CURRENT'] = 'Datum &amp; Zeit aktuell';
$LANG['LABEL_DATETIME_FORMAT'] = 'Datums- &amp; Zeitformat';
$LANG['LABEL_DATETIME_FORMAT_LONG'] = 'Langes Datums- &amp; Zeitformat';
$LANG['LABEL_DATETIME_DEFAULT_TIMEZONE'] = 'Standard Zeitzone';
$LANG['LABEL_DATETIME_PREFERRED_TIMEZONE'] = 'Bevorzugte Zeitzone';
$LANG['LABEL_DATETIME_DAYLIGHT_SAVING'] = 'Zeitumstellung';
$LANG['LABEL_DATETIME_DAYLIGHT_SAVING2'] = '&nbsp;Sommerzeit ?';
$LANG['LABEL_TIME_FORMAT'] = 'Zeitformat';
?>
