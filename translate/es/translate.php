<?php

#Disable direct access.
if (!strcasecmp(basename($_SERVER['SCRIPT_NAME']), basename( __FILE__ ))) die ('kwaheri rafiki!');

$LANG = array ();
$LANG['LANGUAGE'] = 'es';
//Word Name (english name)
$LANG['LANGUAGE_NAME'] = 'Espanish';
//Native name of language (in the original language)
$LANG['LANGUAGE_NATIVE_NAME'] = 'Espanish';

$LANG['CODEPAGE'] = 'UTF-8';

$LANG['ERROR_NAME_REQUIRED'] = 'Nombre requerido';
$LANG['ERROR_MESSAGE_REQUIRED'] = 'Mensaje requerido';
$LANG['ERROR_INVALID_FROM_ADDRESS'] = 'Dirección de Envío Inválida';
$LANG['ERROR_EMAIL_PARSE_FAILED'] = 'Análisis de Email fallido';
$LANG['ERROR_SERVICES_NOT_AVAILABLE'] = 'Servicios no disponibles!';
$LANG['ERROR_POSSIBLY_INVALID_TICKET'] = 'Acceso denegado. Posiblemente ID no válido';
$LANG['ERROR_SECURITY_REPEAT_RESULT_LOCK'] = 'Violación de Seguridad. Repetidas violaciónes  resultarán en bloqueo de su cuenta.';
$LANG['ERROR_INVALID_FILE_TYPE'] = 'Tipo de archivo inválido';
$LANG['ERROR_FILE_REJECTED'] = 'Archivo {0} rechazado!';
$LANG['ERROR_UNABLE_SEND_MESSAGE_TRY_AGAIN'] = 'No se púdo enviar el mensaje. Inténtelo nuevamente';
$LANG['ERROR_OCCURED'] = 'Ocurrió un error(es) . Por favor, inténtelo de nuevo';
$LANG['ERROR_UNKNOW_ACTION'] = 'Acción desconocida';
$LANG['ERROR_YOU_HAVE_REACHED_MAXIMUM_FAILED_LOGIN']='Ha alcanzado el máximo de intentos fallidos permitido. Inténtelo de nuevo después de 5 minutos o <a href="open.php">abra un nuevo ticket</a>';
$LANG['ERROR_YOU_MUST_CHANGE_PASSWORD'] = 'You must change your password to continue.';

$LANG['TITLE'] = 'Tickets FullService';

// relative path of imagens in "translate/".$LANG['LANGUAGE']."/"
$LANG['IMAGE_STAFF_VIEW_OPEN'] = 'staff/view_open.gif';
$LANG['IMAGE_STAFF_VIEW_CLOSED'] = 'staff/view_closed.gif';
$LANG['IMAGE_STAFF_REFRESH'] = 'staff/refresh.gif';

$LANG['LABEL_EMAIL'] = 'E-Mail';
$LANG['LABEL_TICKET_NUMBER'] = 'Ticket#';
$LANG['LABEL_FULL_NAME'] = 'Nombre Completo';
$LANG['LABEL_NAME'] = 'Nombre';
$LANG['LABEL_EMAIL_ADDRESS'] = 'Dirección de E-Mail';
$LANG['LABEL_EMAIL'] = 'Email';
$LANG['LABEL_TELEPHONE'] = 'Teléfono';
$LANG['LABEL_PHONE'] = 'fono';
$LANG['LABEL_HELP_TOPIC'] = 'Tema de ayuda';
$LANG['LABEL_SUBJECT'] = 'Asunto';
$LANG['LABEL_MESSAGE'] = 'Mensaje';
$LANG['LABEL_PRIORITY'] = 'Prioridad';
$LANG['LABEL_ATTACHMENT'] = 'Adjunto';
$LANG['LABEL_TICKET_STATUS'] = 'Estado del Ticket';
$LANG['LABEL_VIEW_STATUS'] = 'Ver Estado'; 
$LANG['LABEL_DEPARTMENT'] = 'Departamento';
$LANG['LABEL_CREATE_DATE'] = 'Crear Fecha';
$LANG['LABEL_OPEN_TICKET'] = 'Abrir Ticket';
$LANG['LABEL_RESET'] = 'Reset';
$LANG['LABEL_CANCEL'] = 'Cancelar';
$LANG['LABEL_POST_REPLY']='Publicar respuesta';
$LANG['LABEL_CHECK_STATUS'] = 'Comprobar Estado';
$LANG['TEXT_SELECT_ONE_TOPIC'] = 'Seleccione Uno';
$LANG['LABEL_MY_PREFERENCES'] = 'Mis Preferencias';
$LANG['LABEL_ADMIN_PANEL'] = 'Panel de Administración';
$LANG['LABEL_STAFF_PANEL'] = 'Panel de Empleado';
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

$LANG['TEXT_GENERAL_INQUIRY'] = 'Consulta General';
$LANG['TEXT_CREATE_FAILED'] = 'No se púdo crear ';
$LANG['TEXT_WELCOME_BACK'] = 'Bienvenido nuevamente';
$LANG['TEXT_LOG_OUT'] = 'Salir';
$LANG['TEXT_MY_ACCOUNT'] = 'Mi Cuenta';
$LANG['TEXT_SUPPORT_TICKET_SISTEM'] = '<span>SUPPORT TICKET</span> SYSTEM';
$LANG['TEXT_MY_TICKETS'] = 'Mis Tickets';
$LANG['TEXT_TICKETS_STATUS'] = 'Estado del Ticket';
$LANG['TEXT_NEW_TICKET'] = 'Nuevo Ticket';
$LANG['TEXT_HOME'] = 'Inicio';
$LANG['TEXT_SUPPORT_CENTER'] = 'Centro de Soporte';
$LANG['TEXT_WELCOME_TITLE'] = 'Bienvenido al centro de soporte.';
$LANG['TEXT_WELCOME_MSG'] = 'Con el fin de racionalizar las peticiones de soporte y ofrecerle un mejor servicio, nosotros utilizamos un sistema de ticket de soporte. Toda solicitud de soporte se le asigna un número de ticket único que se puede utilizar para rastrear el progreso y respuestas en línea. Para su referencia le proporcionamos archivos completos y la historia de todas sus solicitudes de soporte.';
$LANG['TEXT_BOX_NEW_TICKET'] = 'Nueva solicitud de soporte. Por favor, proporcione tantos detalles como le sea posible, así nosotros podremos ayudarle mejor. Para actualizar un ticket creado anteriormente, por favor use el formulario de la derecha. Es necesaria una dirección de correo electrónico válida.';
$LANG['TEXT_OPEN_NEW_TICKET'] = 'Abrir nuevo Ticket';
$LANG['TEXT_OPEN_PREVIUS_TICKET'] = 'Comprobar el estado del ticket abierto anteriormente. Proporcionamos los archivos y la historia de todas sus solicitudes de soporte completo con las respuestas correspondientes.';
$LANG['TEXT_TICKET_CREATED'] = 'Solicitud de ticket de soporte creado';
$LANG['TEXT_UNABLE_CREATE_TICKET'] = 'No se púdo crear ticket. Por favor, corrija los errores a continuación y vuelva a intentarlo!';
$LANG['TEXT_PLEASE_FILL_FORM_NEW_TICKET'] = 'Por favor, rellene el siguiente formulario para abrir un nuevo ticket.';
$LANG['TEXT_NOT_THIS_USER'] = 'No soy este usuario';
$LANG['TEXT_THANKS_NEW_TICKET'] = 'Gracias por contactarnos.<br>Una solicitud de ticket de soporte ha sido creada y un representante lo atenderá a la brevedad.';
$LANG['TEXT_NEW_TICKET_AUTO_RESPONSE'] = 'Un correo electrónico con el número de ticket ha sido enviado a <b>{0}</b>.Necesitará el número de ticket, junto con su correo electrónico para ver el estado y el progreso en línea.<br><br>Si desea enviar comentarios o información adicional sobre la misma cuestión, por favor, siga las instrucciones del correo electrónico.';
$LANG['TEXT_SUPPORT_TEAM'] = 'Equipo de Soporte';
$LANG['TEXT_MESSAGE_POSTED_SUCCESS'] = 'Mensaje Publicado con éxito';
$LANG['TEXT_TICKET_NUMBER'] = 'Ticket #';
$LANG['TEXT_TICKET_THREAD'] = 'Hilo de Ticket';
$LANG['TEXT_TICKET_WILL_REOPEN_NEW_POST']='el Ticket será reabierto con la publicación del mensaje';
$LANG['TEXT_ENTER_MESSAGE']='Introducir Mensaje';
$LANG['TEXT_ATTACH_FILE']='Adjuntar archivo';
$LANG['TEXT_POST_REPLY']='Publicar respuesta';
$LANG['TEXT_VIEW_OPEN']='Ver Abiertos';
$LANG['TEXT_VIEW_CLOSED']='Ver Cerrados';
$LANG['TEXT_REFRESH']='Actualizar';
$LANG['TEXT_SORT_BY_TICKET_ID']='Ordenar por Ticket ID';
$LANG['TEXT_SORT_BY_DATE']='Ordenar por Fecha';
$LANG['TEXT_SORT_BY_DEPARTMENT']='Ordenar por Departamento';
$LANG['TEXT_NO_TICKETS_FOUND']='No se encontró ticket.';
$LANG['TEXT_AUTHENTICATION_REQUIRED']='Autenticación requerida';
$LANG['TEXT_INVALID_LOGIN']='Inicio de sesión no válido';
$LANG['TEXT_FORGOT_YOUR_LOGIN_INFO']='¿Olvidaste tus datos de acceso? Por favor <a href="open.php">abra un nuevo ticket</a>.';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='Excesivos intentos de acceso (cliente)';
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET']='Para ver el estado de un ticket, proporcionenos sus datos de acceso.<br/>'.
        'Si esta es su primera vez en contacto con nosotros o ha perdido el ID del ticket , por favor, <a href="open.php">haga clic aquí</a> para abrir un nuevo ticket.';	
$LANG['TEXT_SESSION_TIMED_OUT_DUE_TO_INACTIVITY']='Tiempo de espera de Sesión agotado debido a la inactividad';
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
$LANG['TEXT_OPEN'] = 'Open';
$LANG['TEXT_CLOSED'] = 'Closed';
$LANG['TEXT_OVERDUE'] = 'Overdue';

$LANG['ALERT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='Excesivos intentos de acceso por cliente'."\n".
                'Email: {0}'."\n".
				'Ticket#: {1}'."\n".
                'IP: {2}'."\n".
				'Hora: {3}'."\n\n".
                'Intentos #{4}';
?>