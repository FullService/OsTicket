<?php

#Disable direct access.
if (!strcasecmp(basename($_SERVER['SCRIPT_NAME']), basename( __FILE__ ))) die ('kwaheri rafiki!');

$LANG = array ();
// name in iso-639
$LANG['LANGUAGE'] = 'fr';
//Word Name (english name)
$LANG['LANGUAGE_NAME'] = 'Français';
//Native name of language (in the original language)
$LANG['LANGUAGE_NATIVE_NAME'] = 'Français';
$LANG['DIRECTION'] = 'ltr';
$LANG['CODEPAGE'] = 'UTF-8';

$LANG['ERROR_ACCESS_DENIED_INVALID_TICKET'] = 'Accès Interdit. ID du Ticket sûrement invalide';
$LANG['ERROR_NAME_REQUIRED'] = 'Saisie du nom obligatoire';
$LANG['ERROR_MESSAGE_REQUIRED'] = 'Saisie du message obligatoire';
$LANG['ERROR_INVALID_FROM_ADDRESS'] = 'Adresse non valide';
$LANG['ERROR_EMAIL_PARSE_FAILED'] = 'Adresse mail incorrecte';
$LANG['ERROR_SERVICES_NOT_AVAILABLE'] = 'Service inaccessible';
$LANG['ERROR_POSSIBLY_INVALID_TICKET'] = 'Accés refusé. Vérifiez votre n° de ticket.';
$LANG['ERROR_SECURITY_REPEAT_RESULT_LOCK'] = 'Alerte sécurité. Attention des alertes de sécurité répétées pourront bloquer l\'accés à votre compte';
$LANG['ERROR_SECURITY_VIOLATION_YOUR_ACCOUNT_WILL_LOCKED'] = 'Alerte sécurité. Attention des alertes de sécurité répétées pourront bloquer l\'accés à votre compte';
$LANG['ERROR_UNABLE_TO_POST_MESSAGE'] = 'Impossible de poster le message. Merci d\'essayer à nouveau';
$LANG['ERROR_INVALID_FILE_TYPE'] = 'Type de fichier incorrect';
$LANG['ERROR_FILE_REJECTED'] = 'Fichier {0} refusé';
$LANG['ERROR_UNABLE_SEND_MESSAGE_TRY_AGAIN'] = 'Votre message n\'a pas été enoyé. Merci d\'essayer à nouveau';
$LANG['ERROR_OCCURED'] = 'Une erreur est survenue.';
$LANG['ERROR_OCCURED_TRY_AGAIN'] = 'Une erreur est survenue. Merci d\'essayer à nouveau';
$LANG['ERROR_UNKNOW_ACTION'] = 'Action inconnue';
$LANG['ERROR_YOU_MUST_CHANGE_PASSWORD'] = 'Vous devez changer votre mot de passe pour continuer.';
$LANG['ERROR_YOU_HAVE_REACHED_MAXIMUM_FAILED_LOGIN']= 'Vous avez atteint le nombre maximum de tentatives de connexion. Merci d\'essayer à nouveau dans 5 minutes ou <a href="open.php">d\'ouvrir un nouveau ticket</a>.';

# Titles on pages and web pages
$LANG['TITLE'] = 'Tickets de SAV';
$LANG['TITLE_BOX_NEW_TICKET'] = 'Nouveau Ticket';
$LANG['TITLE_BAR_OFFLINE'] = 'Système de Tickets SAV';
$LANG['TITLE_OFFLINE'] = 'Système de Tickets SAV hors ligne';
$LANG['TITLE_OPEN_PREVIUS_TICKET'] = 'Derniers Tickets';


// relative path of imagens in "translate/".$LANG['LANGUAGE']."/"
$LANG['IMAGE_CLIENT_VIEW_OPEN'] = 'client/view_open.gif';
$LANG['IMAGE_CLIENT_VIEW_CLOSED'] = 'client/view_closed.gif';
$LANG['IMAGE_CLIENT_REFRESH'] = 'client/refresh.gif';
$LANG['IMAGE_STAFF_VIEW_OPEN'] = 'staff/view_open.gif';
$LANG['IMAGE_STAFF_VIEW_CLOSED'] = 'staff/view_closed.gif';
$LANG['IMAGE_STAFF_REFRESH'] = 'staff/refresh.gif';

$LANG['LABEL_ASSIGN'] = 'Assigner';
$LANG['LABEL_BASIC'] = 'Basic';
$LANG['LABEL_EMAIL'] = 'Adresse Mail';
$LANG['LABEL_TICKET_NUMBER'] = 'Ticket#';
$LANG['LABEL_FULL_NAME'] = 'Nom complet';
$LANG['LABEL_USERNAME'] = 'Nom d\'utilisateur';
$LANG['LABEL_PASSWORD'] = 'Mot de passe';
$LANG['LABEL_PASSWORD_AGAIN'] = 'Mot de passe (vérif)';
$LANG['LABEL_NAME'] = 'Nom';
$LANG['LABEL_EMAIL_ADDRESS'] = 'Adresse Mail';
$LANG['LABEL_EMAIL'] = 'Adresse Mail';
$LANG['LABEL_TELEPHONE'] = 'Téléphone';
$LANG['LABEL_PHONE'] = 'Téléphone';
$LANG['LABEL_HELP_TOPIC'] = 'Aide en ligne';
$LANG['LABEL_SUBJECT'] = 'Sujet';
$LANG['LABEL_MESSAGE'] = 'Message';
$LANG['LABEL_PRIORITY'] = 'Priorité';
$LANG['LABEL_ATTACHMENT'] = 'Pièce Jointe';
$LANG['LABEL_TICKET_STATUS'] = 'Etat du Ticket';
$LANG['LABEL_VIEW_STATUS'] = 'Voir état';
$LANG['LABEL_DEPARTMENT'] = 'Service';
$LANG['LABEL_CREATE_DATE'] = 'Date de création';
$LANG['LABEL_OPEN_TICKET'] = 'Ouvrir le ticket';
$LANG['LABEL_OPEN_NEW_TICKET'] = 'Nouveau Ticket';
$LANG['LABEL_SUBMIT'] = 'Valider';
$LANG['LABEL_SUBMIT_TICKET'] = 'Envoyer le Ticket';
$LANG['LABEL_RESET'] = 'RAZ';
$LANG['LABEL_CANCEL'] = 'Annuler';
$LANG['LABEL_TRANSFER'] = 'Transférer';
$LANG['LABEL_POST_REPLY']= 'Réponse';
$LANG['LABEL_CHECK_STATUS'] = 'Etat Ticket';
$LANG['TEXT_SELECT_ONE_TOPIC'] = 'Choisir';
$LANG['LABEL_MY_PROFILE'] = 'Mon Profile';
$LANG['LABEL_PREFERENCES'] = 'Preferences';
$LANG['LABEL_CHANGE_PASSWORD'] = 'Changee de mot de passe';
$LANG['LABEL_MY_PREFERENCES'] = 'Mes préférences';
$LANG['LABEL_ADMIN_PANEL'] = 'Accés Administrateur';
$LANG['LABEL_STAFF_PANEL'] = 'Accés Equipes SAV';
$LANG['TEXT_GENERAL_INQUIRY'] = 'Informations Générales';
$LANG['LABEL_QUERY'] = 'Demande';
$LANG['LABEL_SEARCH'] = 'Recherche';
$LANG['LABEL_ADVANCED'] = 'Avancées';
$LANG['LABEL_STATUS_IS'] = 'Le statut est';
$LANG['LABEL_DEPT'] = 'Dept.';
$LANG['LABEL_DATE_SPAN'] = 'Date Span';
$LANG['LABEL_FROM'] = 'De.';
$LANG['LABEL_TO'] = 'A.';
$LANG['LABEL_SORT_BY'] = 'Trier par';
$LANG['LABEL_ASCENDING'] = 'Croissant';
$LANG['LABEL_DESCENDING'] = 'Décroissant';
$LANG['LABEL_RESULTS_PER_PAGE'] = 'Resultats Par Page';


$LANG['TEXT_ACCESS_DENIED'] = 'Accès Interdit';
$LANG['TEXT_AUTHENTICATION_REQUIRED_QUESTION'] = 'Authentification obligatoire ?';
$LANG['TEXT_CREATE_FAILED'] = 'Echec de la création';
$LANG['TEXT_WELCOME_BACK'] = 'Merci de votre visite et à bientôt.';
$LANG['TEXT_LOG_OUT'] = 'Deconnexion';
$LANG['TEXT_MY_ACCOUNT'] = 'Mon compte';
$LANG['TEXT_SUPPORT_TICKET_SISTEM'] = 'SYSTEME de <span>Tickets SAV</span>';
$LANG['TEXT_MY_TICKETS'] = 'Mes tickets';
$LANG['TEXT_TICKETS_STATUS'] = 'Etat Ticket';
$LANG['TEXT_NEW_TICKET'] = 'Nouveau Ticket';
$LANG['TEXT_HOME'] = 'Accueil';
$LANG['TEXT_SUPPORT_CENTER'] = 'Service SAV';
$LANG['TEXT_WELCOME_TITLE'] = 'Bienvenue au service SAV';
$LANG['TEXT_WELCOME_MSG'] = 'Dans un souci d\'optimisation des temps de traitement des demandes d\'assistance et pour être plus performants, notre société utilise un système de ticket de SAV. Chaque demande de SAV est représentée par un ticket à numéro unique que vous pouvez utiliser pour suivre l\'avancement de votre demande et les réponses en ligne. Pour votre information, vous pouvez consulter l\'historique de toutes vos demandes de SAV.';
$LANG['TEXT_BOX_NEW_TICKET'] = 'Ouvrir un nouveau ticket; Merci de détailler au maximum votre demande de SAV afin que nous puissions vous aider de notre mieux. si vous désirez compléter un ticket déjà ouvert merci d\'utiliser le formulaire de droite. Une adresse mail valide est obligatoire.';
$LANG['TEXT_OPEN_NEW_TICKET'] = 'Ouvrir un Nouveau Ticket';
$LANG['TEXT_OPEN_PREVIUS_TICKET'] = 'Vérifier l\'état d\'un ticket. Vous pouvez consulter en ligne l\'état d\'avancement d\'un ticket ainsi que l\'historique complet des réponses à votre demande.';
$LANG['TEXT_TICKET_CREATED'] = 'Votre ticket de SAV a bien été créé';
$LANG['TEXT_UNABLE_CREATE_TICKET'] = 'Impossible de créer le ticket. Merci de corriger l\'erreur et d\'essayer à nouveau.';
$LANG['TEXT_PLEASE_FILL_FORM_NEW_TICKET'] = 'Merci de remplir le formulaire ci-desous pour ouvrir un nouveau ticket de SAV.';
$LANG['TEXT_NOT_THIS_USER'] = 'Je ne suis pas cet utilisateur';
$LANG['TEXT_THANKS_NEW_TICKET'] = 'Votre demande a bien été prise en compte.<br>Votre ticket SAV a bien été enregistré et nos équipes vont maintenant le traiter.';
$LANG['TEXT_NEW_TICKET_AUTO_RESPONSE'] = 'Un mail comportant votre n°de ticket vous a été envoyé <b>{0}</b>. Vous devez posséder votre numéro de ticket lié a votre adresse mail afin de connaître l\'état d\'avancement de votre demande.<br><br>Si vous désirez envoyer des informations supplémentaires, merci de suivre les informations portées sur ce mail.';
$LANG['TEXT_SUPPORT_TEAM'] = 'Equipe SAV';
$LANG['TEXT_MESSAGE_POSTED_SUCCESSFULLY'] = 'Message envoyé avec succés.';
$LANG['TEXT_TICKET_NUMBER'] = 'Ticket #';
$LANG['TEXT_TICKET_THREAD'] = 'Suivi ticket';
$LANG['TEXT_TICKET_WILL_REOPEN_NEW_POST']= 'le ticket sera réouvert sur le dernier message';
$LANG['TEXT_ENTER_MESSAGE']= 'Saisir Message';
$LANG['TEXT_ATTACH_FILE']= 'Pièce jointe';
$LANG['TEXT_FILE_REJECTED']= 'Fichier [ {0} ] rejeté';
$LANG['TEXT_FILE_IS_TOO_BIG']= 'Fichier trop lourd. Max {0} bytes autorisés';
$LANG['TEXT_POST_REPLY']= 'Réponse';
$LANG['TEXT_VIEW_OPEN']= 'Voir nouveaux tickets';
$LANG['TEXT_VIEW_CLOSED']= 'Voir tickets cloturés';
$LANG['TEXT_REFRESH']= 'Actualiser';
$LANG['TEXT_SORT_BY_TICKET_ID']= 'Classer par n° de ticket';
$LANG['TEXT_SORT_BY_DATE']= 'Classer par date';
$LANG['TEXT_SORT_BY_DEPARTMENT']= 'Classer par service';
$LANG['TEXT_NO_TICKETS_FOUND']= 'Aucun ticket trouvé';
$LANG['TEXT_AUTHENTICATION_REQUIRED']= 'Authentification requise';
$LANG['TEXT_INVALID_LOGIN']= 'Mot de Passe incorrect';
$LANG['TEXT_FORGOT_YOUR_LOGIN_INFO']= 'Vous avez oublié votre n° de ticket ? Merci <a href="open.php">d\'ouvrir un nouveau ticket</a>.';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']= 'Temps d\'accés dépassé (client)';
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET']= 'Pour afficher l\'état du ticket, merci de saisir vos informations de connexion ci-dessous.<br/>.
\'Si c\'est votre première connexion ou si vous avez perdu votre numéro de ticket, merci de <a href="open.php">cliquer ici</a> pour ouvrir un nouveau ticket.';
$LANG['TEXT_SESSION_TIMED_OUT_DUE_TO_INACTIVITY']= 'Temps d\'ouverture de session dépassé';
$LANG['TEXT_WELCOME_BACK_VACATION']= 'Welcome back! You are listed as \'on vacation\' Please let admin or your manager know that you are back.';
$LANG['TEXT_WELCOME_BACK_CLIENT'] = 'Welcome back, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_BACK_STAFF'] = 'Welcome back, <strong>{0}</strong>';
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
$LANG['TEXT_OPEN'] = 'Ouverts';
$LANG['TEXT_CLOSED'] = 'Fermés';
$LANG['TEXT_OVERDUE'] = 'Overdue';

$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS'] = 'Nombre de tentatives d\'identification dépassé';
$LANG['TEXT_HEADER_TITLE'] = 'Système de support SAV osTicket';
$LANG['TEXT_INVALID_FILE_TYPE'] = 'Type de fichier invalide [ {0} ]';
$LANG['TEXT_OFFLINE'] = 'Merci de nous avoir contacté.<br/> Notre bureau est actuellement hors ligne, merci de réessayer plus tard.';
$LANG['TEXT_YOUVE_REACHED_MAXIMUM_FAILED_LOGIN_ATTEMPTS_ALLOWED'] = 'Vous avez atteint la limite maximale d\'échecs pour vous identifier';


$LANG['ALERT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']= 'Temps d\'accés dépassé par un client '."\n".
                'Email: {0}'."\n".
'Ticket#: {1}'."\n".
                'IP: {2}'."\n".
'Time: {3}'."\n\n".
                'Attempts #{4}';
?>

