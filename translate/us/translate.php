<?php

#Disable direct access.
if (!strcasecmp(basename($_SERVER['SCRIPT_NAME']), basename( __FILE__ ))) die ('kwaheri rafiki!');

$LANG = array ();

# Language identification
$LANG['LANGUAGE'] = 'us';
//Word Name (english name)
$LANG['LANGUAGE_NAME'] = 'English';
//Native name of language (in the original language)
$LANG['LANGUAGE_NATIVE_NAME'] = 'English';
$LANG['DIRECTION'] = 'ltr';
$LANG['CODEPAGE'] = 'UTF-8';

# Error Mensages
$LANG['ERROR_ACCESS_DENIED_INVALID_TICKET'] = 'Access Denied. Possibly invalid ticket ID';
$LANG['ERROR_EMAIL_PARSE_FAILED'] = 'Email parse failed';
$LANG['ERROR_FILE_REJECTED'] = 'File {0} rejected!';
$LANG['ERROR_INVALID_FROM_ADDRESS'] = 'Invalid FROM address';
$LANG['ERROR_INVALID_FILE_TYPE'] = 'Invalid File Type';
$LANG['ERROR_MESSAGE_REQUIRED'] = 'Message required';
$LANG['ERROR_NAME_REQUIRED'] = 'Name required';
$LANG['ERROR_OCCURED'] = 'Error(s) occured. Please try again';
$LANG['ERROR_OCCURED_TRY_AGAIN'] = 'Error(s) occured. Please try again';
$LANG['ERROR_POSSIBLY_INVALID_TICKET'] = 'Access Denied. Possibly invalid ticket ID';
$LANG['ERROR_SERVICES_NOT_AVAILABLE'] = 'Services not available!';
$LANG['ERROR_SECURITY_REPEAT_RESULT_LOCK'] = 'Security violation. Repeated violations will result in your account being locked.';
$LANG['ERROR_SECURITY_VIOLATION_YOUR_ACCOUNT_WILL_LOCKED'] = 'Security violation. Repeated violations will result in your account being locked';
$LANG['ERROR_UNABLE_SEND_MESSAGE_TRY_AGAIN'] = 'Unable to post the message. Try again';
$LANG['ERROR_UNABLE_TO_POST_THE_RESPONSE']='Unable to post the response';
$LANG['ERROR_UNKNOW_ACTION'] = 'Uknown action';
$LANG['ERROR_UNABLE_TO_POST_MESSAGE'] = 'Unable to post the message. Try again';
$LANG['ERROR_UKNOW_ACTION'] = 'Unknown action';
$LANG['ERROR_YOU_HAVE_REACHED_MAXIMUM_FAILED_LOGIN']='You\'ve reached maximum failed login attempts allowed. Try again after 5 minutes or <a href="open.php">open a new ticket</a>';
$LANG['ERROR_YOU_MUST_CHANGE_PASSWORD'] = 'You must change your password to continue.';
$LANG['ERROR_SEARCH_TERM_MORE_3']='Search term must be more than 3 chars';

# Titles on pages and web pages
$LANG['TITLE'] = 'Tickets FullService';
$LANG['TITLE_BOX_NEW_TICKET'] = 'New Ticket';
$LANG['TITLE_BAR_OFFLINE'] = 'Support Ticket System';
$LANG['TITLE_MY_PREFERENCES'] = 'My Preferences';
$LANG['TITLE_OFFLINE'] = 'Support Ticket System Offline';
$LANG['TITLE_OPEN_PREVIUS_TICKET'] = 'Open Previus Ticket';
$LANG['TITLE_CLOSED_TICKETS'] = 'Closed Tickets';

# Images for Staff and Clients Ends
// relative path of imagens in "translate/".$LANG['LANGUAGE']."/"
$LANG['IMAGE_CLIENT_VIEW_OPEN'] = 'client/view_open.gif';
$LANG['IMAGE_CLIENT_VIEW_CLOSED'] = 'client/view_closed.gif';
$LANG['IMAGE_CLIENT_REFRESH'] = 'client/refresh.gif';
$LANG['IMAGE_STAFF_VIEW_OPEN'] = 'staff/view_open.gif';
$LANG['IMAGE_STAFF_VIEW_CLOSED'] = 'staff/view_closed.gif';
$LANG['IMAGE_STAFF_REFRESH'] = 'staff/refresh.gif';

# Labels for Bottons, Headers on Tables, Selections, Link Texts and others
// Label A
$LANG['LABEL_ADD_NEW_DEPT'] = 'Add New Dept.';
$LANG['LABEL_ADMIN_DASHBOARD'] = 'Admin Dashboard';
$LANG['LABEL_ADMIN_PANEL'] = 'Admin Panel';
$LANG['LABEL_ADVANCED'] = 'Advanced';
$LANG['LABEL_ALL'] = 'All';
$LANG['LABEL_ALL_DEPARTMENTS'] = 'All Departments';
$LANG['LABEL_ASSIGN'] = 'Assign';
$LANG['LABEl_ASSIGNED_TICKETS'] = 'Assigned Tickets';
$LANG['LABEL_ASCENDING'] = 'Ascending';
$LANG['LABEL_ATTACHMENT'] = 'Attachment';
$LANG['LABEL_AUTO_RESPONSE_EMAIL'] = 'Auto Response Email';
$LANG['LABEL_AUTORESPONDERS'] = 'Autoresponders';
// Label B
$LANG['LABEL_BASIC'] = 'Basic';
// Label C
$LANG['LABEL_CLOSED_TICKETS'] = 'Closed Tickets';
$LANG['LABEL_CANCEL'] = 'Cancel';
$LANG['LABEL_CATEGORY'] = 'category';
$LANG['LABEL_CATEGORY_DEPT'] = 'Category/Dept';
$LANG['LABEL_CHANGE_PASSWORD'] = 'Change Password';
$LANG['LABEL_CHECK_STATUS'] = 'Check Status';
$LANG['LABEL_Closed'] = 'Closed';
$LANG['LABEL_CREATE_DATE'] = 'Create Date';
// Label D
$LANG['LABEL_DASHBOARD'] = 'Dashboard';
$LANG['LABEL_DATE_SPAN'] = 'Date Span';
$LANG['LABEL_DEFAULT'] = 'Default';
$LANG['LABEL_DELETE_DEPT_S'] = 'Delete Dept(s)';
$LANG['LABEL_DEPARTMENT'] = 'Department';
$LANG['LABEL_DEPARTMENTS'] = 'Departments';
$LANG['LABEL_DEPT_MANAGER'] = 'Dep Manager';
$LANG['LABEL_DEPT_MANAGER_NONE'] = 'None';
$LANG['LABEL_DEPT'] = 'Dept.';
$LANG['LABEL_DEPT_ACCESS'] = 'Dept Access';
$LANG['LABEL_DEPT_NAME'] = 'Dept. Name';
$LANG['LABEL_DEPT_EMAIL'] = 'Dept. Email';
$LANG['LABEL_DEPT_EMAIL_ABOVE'] = 'Dept. Email (above)';
$LANG['LABEL_DEPT_SIGNATURE'] = 'Dept. Signature';
$LANG['LABEL_DEPT_TYPE'] = 'Dept. Type';
$LANG['LABEL_DESCENDING'] = 'Descending';
$LANG['LABEL_DIRECTORY'] = 'Directory';
$LANG['LABEL_DIRECTORY_STAFF'] = 'Staff Directory';
// Label E
$LANG['LABEL_EMAIL'] = 'E-Mail';
$LANG['LABEL_EMAILS'] = 'E-Mails';
$LANG['LABEL_EMAILS_SETTINGS'] = 'E-Mails Settings';
$LANG['LABEL_EMAIL_ADDRESS'] = 'Email Address';
$LANG['LABEL_EMAIL_TEMPLATES'] = 'Email Templates';
$LANG['LABEL_ENABLE_SYSTEM_OFF_LINE'] = 'Enable';
// Label F
$LANG['LABEL_FROM'] = 'From.';
$LANG['LABEL_FULL_NAME'] = 'Full Name';
// Label G
$LANG['LABEL_GO'] = 'GO';
// Label H
$LANG['LABEL_HELP_TOPIC'] = 'Help Topic';
$LANG['LABEL_HELP_TOPICS'] = 'Help Topics';
// Label I
// Label J

// Label K
$LANG['LABEL_KNOWLEDGE_BASE'] = 'Knowledge Base';
$LANG['LABEL_KNOWLEDGE_BASE_PREMATE'] = 'Knowledge Base: Premade';
// Label L
$LANG['LABEL_LOG_OUT'] = 'Log Out';
// Label M
$LANG['LABEL_MAKE_PUBLIC'] = 'Make Public';
$LANG['LABEL_MAKE_PRIVATE'] = 'Make Private';
$LANG['LABEL_MANAGER'] = 'Manager';
$LANG['LABEL_MESSAGE'] = 'Message';
$LANG['LABEL_MY_ACCOUNT'] = 'My Account';
$LANG['LABEL_MY_PREFERENCE'] = 'My Preference';
$LANG['LABEL_MY_PROFILE'] = 'My Profile';
// Label N
$LANG['LABEL_NAME'] = 'Name';
$LANG['LABEL_NEW_DEPARTMENT'] = 'New Department';
$LANG['LABEL_NEW_MESSAGE'] = 'New Message';
$LANG['LABEL_NEW_PREMADE_REPLY'] = 'New Premade Reply';
$LANG['LABEL_NEW_TICKET'] = 'New Ticket';
$LANG['LABEL_NO_MANAGER_ADD_USERS'] = 'No Users (Add Users)';
$LANG['LABEL_NONE'] = 'None';
// Label O
$LANG['LABEL_OPEN'] = 'open';
$LANG['LABEL_OPEN_TICKET'] = 'Open Ticket';
$LANG['LABEL_OPEN_NEW_TICKET'] = 'Open New Ticket';
$LANG['LABEL_OTHER'] = 'Outro';
$LANG['LABEL_OUTGOING_EMAIL'] = 'outgoing email';
// Label P
$LANG['LABEL_PREFERENCES'] = 'Preferences';
$LANG['LABEL_PUBLIC'] = 'Public';
$LANG['LABEL_PRIVATE'] = 'Private';
$LANG['LABEL_PRIVATE_HIDDEN'] = 'Private (Hidden)';
$LANG['LABEL_PASSWORD'] = 'Password';
$LANG['LABEL_PASSWORD_AGAIN'] = 'Password (again)';
$LANG['LABEL_PHONE'] = 'Phone';
$LANG['LABEL_POST_REPLY']='Post Reply';
$LANG['LABEL_PRIORITY'] = 'Priority';
$LANG['LABEL_PRIMARY_OUTGOING_EMAIL'] = 'Primary Outgoing Email';
$LANG['LABEL_PREMADE_REPLIES'] = 'Premade Replies';
// Label Q
$LANG['LABEL_QUERY'] = 'Query';
$LANG['LABEL_QUERY_RETURNED_ZERO_RESULT'] = 'Query returned 0 results';
// Label R
$LANG['LABEL_RESET'] = 'Reset';
$LANG['LABEL_RESULTS_PER_PAGE'] = 'Results Per Page';
$LANG['LABEL_REPLY_TITLE'] = 'Reply Title';
// Label S
$LANG['LABEL_SEARCH'] = 'Search';
$LANG['LABEL_SEARCH_FOR'] = 'Search for';
$LANG['LABEL_SELECT'] = 'Select';
$LANG['LABEL_SELECT_DEPARTMENT'] = 'Select Department';
$LANG['LABEL_SELECT_MANAGER_OPTIONAL'] = 'Select Manager (optional)';
$LANG['LABEL_SELECT_ONE_TOPIC'] = 'Select One';
$LANG['LABEL_SELECT_ONE_EMAIL'] = 'Select One';
$LANG['LABEL_SELECT_SOURCE'] = 'Select Source';
$LANG['LABEL_SELECT_TEMPLATE'] = 'Select Template';
$LANG['LABEL_SETTINGS'] = 'Settings';
$LANG['LABEL_SORT_BY'] = 'Sort by';
$LANG['LABEL_SORT_BY_TITLE'] = 'Sort By Title';
$LANG['LABEL_SORT_BY_UPDATE_DATE'] = 'Sort By Update Date';
$LANG['LABEL_STAFF'] = 'Staff';
$LANG['LABEL_STAFF_MEMBERS'] = 'Staff Members';
$LANG['LABEL_STAFF_PANEL'] = 'Staff Panel';
$LANG['LABEL_STATUS'] = 'Status';
$LANG['LABEL_STATUS_IS'] = 'Status is';
$LANG['LABEL_SUBJECT'] = 'Subject';
$LANG['LABEL_SUBMIT'] = 'Submit';
$LANG['LABEL_SUBMIT_TICKET'] = 'Submit Ticket';
$LANG['LABEL_SYSTEM_DEFAULT_TEMPLATE'] = 'System Default';
$LANG["LABEL_SYSTEM_SETTINGS"] = 'System Settings';
// Label T
$LANG['LABEL_TELEPHONE'] = 'Telephone';
$LANG['LABEL_TICKET_NUMBER'] = 'Ticket#';
$LANG['LABEL_TICKET_STATUS'] = 'Ticket Status';
$LANG['LABEL_TICKET_ID'] = 'Ticket ID';
$LANG['LABEL_TO'] = 'To.';
$LANG['LABEL_TOGGLE'] = 'Toggle';
$LANG['LABEL_TRANSFER'] = 'Transfer';
$LANG['LABEL_TYPE'] = 'Type';
// Label U
$LANG['LABEL_UPDATE_DATE'] = 'Last Updated';
$LANG['LABEL_UPDATE_DEPARTMENT'] = 'Update Department';
$LANG['LABEL_USERNAME'] = 'Username';
$LANG['LABEL_USERS'] = 'Users';
// Label V
$LANG['LABEL_VIEW_STATUS'] = 'View Status';



# Generic text for all site, if have to text repeted in
# Client or Staff ends, is prefixed with correct name.
// TEXT A
$LANG['TEXT_ACCESS_DENIED']='Access Denied';
$LANG['TEXT_ANSWERED_STATS'] = 'Tickets Respondidos ({0})';
$LANG['TEXT_ANSWERED_TICKETS'] = 'Answered Tickets';
$LANG['TEXT_ASSIGNED_TICKETS'] = 'Assigned Tickets';
$LANG['TEXT_AUTHENTICATION_REQUIRED']='Authentication Required';
$LANG['TEXT_AUTHENTICATION_REQUIRED_QUESTION']='Authentication Required?';
$LANG['TEXT_ANY_STATUS'] = 'Any status';
$LANG['TEXT_ATTACH_FILE']='Attach File';
// TEXT B
$LANG['TEXT_BOX_NEW_TICKET'] = 'Submit a new support request. Please provide as much detail as possible so we can best assist you. To update a previously submitted ticket, please use the form to the right. A valid email address is required.';
// TEXT C
$LANG['TEXT_CAM_BE_APPENDED_TO_RESPONSES'] = 'can be appended to responses.&nbsp;(available as a choice for public departments)';
$LANG['TEXT_CLOSED_TICKETS'] = 'Closed Tickets';
$LANG['TEXT_CLOSED'] = 'Closed';
$LANG['TEXT_CREATE_FAILED'] = 'Create Failed ';
// TEXT D
$LANG['TEXT_DEPT_DEPENDS_ON_EMAIL'] = 'Dept depends on email &amp; help topics settings for incoming tickets.';
$LANG['TEXT_DEPT_UPDATED_SUCCESSFULLY'] = 'Dept updated successfully';
// TEXT E
$LANG['TEXT_EMAIL_ADDRESS_USED_SEND_AUTO_RESPONSES'] = 'Email address used to send auto-responses, if enabled.';
$LANG['TEXT_ENTER_MESSAGE']='Enter Message';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS']='Excessive login attempts';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='Excessive login attempts (client)';
// TEXT F
$LANG['TEXT_FILE_REJECTED'] = 'File [ {0} ] rejected';
$LANG['TEXT_FILE_IS_TOO_BIG'] = 'File is too big. Max {0} bytes allowed';
$LANG['TEXT_FORGOT_YOUR_LOGIN_INFO']='Forgot your login info? Please <a href="open.php">open a new ticket</a>.';
// TEXT G
$LANG['TEXT_GENERAL_INQUIRY'] = 'General Inquiry';
$LANG['TEXT_GLOBAL_AUTO_RESPONSE_SETTINGS'] = 'Global auto-response settings in preference section must be enabled for Dept \'Enable\' setting to take effect.';
// TEXT H
$LANG['TEXT_HOME'] = 'Home';
$LANG['TEXT_HEADER_TITLE']='osTicket :: Support Ticket System';
// TEXT I
$LANG['TEXT_INVALID_LOGIN']='Invalid login';
$LANG['TEXT_INVALID_FILE_TYPE'] = 'Invalid file type [ {0} ]';
// TEXT J
// TEXT K
// TEXT L
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET']='To view the status of a ticket, provide us with your login details below.<br/>'.
        'If this is your first time contacting us or you\'ve lost the ticket ID, please <a href="open.php">click here</a> to open a new ticket.';	
$LANG['TEXT_LOG_OUT'] = 'Log Out';
// TEXT M
$LANG['TEXT_MY_TICKETS'] = 'My Tickets';
$LANG['TEXT_MY_TICKETS'] = 'My Tickets ({0})';
$LANG['TEXT_MY_ACCOUNT'] = 'My Account';
// TEXT N
$LANG['TEXT_NEW_TICKET'] = 'New Ticket';
$LANG['TEXT_NOT_THIS_USER'] = 'I am not this user';
$LANG['TEXT_NEW_TICKET_AUTO_RESPONSE'] = 'An email with the ticket number has been sent to <b>{0}</b>.You\'ll need the ticket number along with your email to view status and progress online.<br><br>If you wish to send additional comments or information regarding same issue, please follow the instructions on the email.';
$LANG['TEXT_NO_TICKETS_FOUND']='NO tickets found.';
// TEXT O
$LANG['TEXT_OPEN_NEW_TICKET'] = 'Open new Ticket';
$LANG['TEXT_OPEN_PREVIUS_TICKET'] = 'Check status of previously opened ticket. we provide archives and history of all your support requests complete with responses.';
$LANG['TEXT_OPEN_TICKETS'] = 'Open Tickets';
$LANG['TEXT_OPEN'] = 'Open';
$LANG['TEXT_OVERDUE_STATS'] = 'Overdue ({0})';
$LANG['TEXT_OVERDUE_TICKETS'] = 'Overdue Tickets';
$LANG['TEXT_OVERDUE'] = 'Overdue';
$LANG['TEXT_OFFLINE']='Thank you for your interest in contacting us.<br>'.
         'Our helpdesk is offline at the moment, please check back at a later time.';
// TEXT P
$LANG['TEXT_POST_REPLY']='Post Reply';
$LANG['TEXT_PLEASE_FILL_STAFF_FORM_BELOW_OPEN_NEW_TICKET'] = 'Please fill in the form below to open a new ticket.';
$LANG['TEXT_PLEASE_FILL_FORM_NEW_TICKET'] = 'Please fill in the form below to open a new ticket.';
$LANG['TEXT_PLEASE_TAKE_A_MINUTE_TO_DELETE_INSTALL'] = 'Please take a minute to delete <strong>setup/install</strong> directory for security reasons.';
// TEXT Q
// TEXT R
$LANG['TEXT_REFRESH']='Refresh';
$LANG['TEXT_REQUIRED_WHEN_DEPT_IS_PUBLIC'] = 'Required when Dept is public';
// TEXT S
$LANG['TEXT_SELECT_DEPARTMENTS_GROUP_MEMBERS'] = 'Select departments group members are allowed to access in addition to thier own department.';
$LANG['TEXT_SELECT_ONE_TOPIC'] = 'Select One Topic';
$LANG['TEXT_SESSION_TIMED_OUT_DUE_TO_INACTIVITY']='Session timed out due to inactivity';
$LANG['TEXT_SORT_BY_TICKET_ID']='Sort By Ticket ID';
$LANG['TEXT_SORT_BY_DATE']='Sort By Date';
$LANG['TEXT_SORT_BY_DEPARTMENT']='Sort By Department';
$LANG['TEXT_SHOW_FROM_TO_OF_ALL'] = 'Showing {0} - {1} of {2}';
$LANG['TEXT_SHOW_ZERO'] = 'Showing 0 (zero)';
$LANG['TEXT_SEARCH_RESULTS'] = 'Search Results';
$LANG['TEXT_SYSTEM_IS_OFF_LINE'] = '<strong>System is set to offline mode</strong> - Client interface is disabled and ONLY admins can access staff control panel.';
$LANG['TEXT_SUPPORT_TEAM'] = 'Support Tean';
$LANG['TEXT_SUPPORT_TICKET_SISTEM'] = '<span>SUPPORT TICKET</span> SYSTEM';
$LANG['TEXT_SUPPORT_CENTER'] = 'Support Center';
// TEXT T
$LANG['TEXT_TOTAL_OPEN_TICKETS'] = "Open ({0})";
$LANG['TEXT_TOTAL_ANSWERED_TICKETS'] = "Answered ({0})";
$LANG['TEXT_TOTAL_MY_TICKETS'] = 'My Tickets ({0})';
$LANG['TEXT_TICKET_CREATED'] = 'Support ticket request created';
$LANG['TEXT_Ticket_status_changed_to'] = 'Situação do Ticket alterada para {0}';
$LANG['TEXT_TICKET_NUMBER'] = 'Ticket #';
$LANG['TEXT_TICKET_THREAD'] = 'Ticket Thread';
$LANG['TEXT_TICKET_WILL_REOPEN_NEW_POST']='Ticket will be reopened on message post';
$LANG['TEXT_TICKETS_STATUS'] = 'Tickets Status';
$LANG['TEXT_THANKS_NEW_TICKET'] = 'Thank you for contacting us.<br>A support ticket request has been created and a representative will be getting back to you shortly if necessary.';
// TEXT U
$LANG['TEXT_UNABLE_CREATE_TICKET'] = 'Unable to create a ticket. Please correct errors below and try again!';
$LANG['TEXT_USED_FOR_OUTGOING_EMAILS'] = 'Used for outgoing emails,alerts and notices to user and staff.';
// TEXT V
$LANG['TEXT_VIEW_OPEN']='View Open';
$LANG['TEXT_VIEW_CLOSED']='View Closed';
$LANG['TEXT_VISIBLE_TO_CLIENT'] = 'Visible to client/customer.';
// TEXT X
// TEXT Y
$LANG['TEXT_YOUVE_REACHED_MAXIMUM_FAILED_LOGIN_ATTEMPTS_ALLOWED']='You\'ve reached maximum failed login attempts allowed.';
// TEXT W
$LANG['TEXT_WELCOME_BACK_VACATION']= 'Welcome back! You are listed as \'on vacation\' Please let admin or your manager know that you are back.';
$LANG['TEXT_WELCOME_BACK_CLIENT'] = 'Welcome back, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_BACK_STAFF'] = 'Welcome back, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_TITLE'] = 'Welcome to the support center.';
$LANG['TEXT_WELCOME_MSG'] = 'In order to streamline support requests and better serve you, we utilize a support ticket system. Every support request is assigned a unique ticket number which you can use to track the progress and responses online. For your reference we provide complete archives and history of all your support requests.';
$LANG['TEXT_WELCOME_BACK'] = 'Welcome back';

#Alert Messages, normally used with JavaScript dialog box.
$LANG['ALERT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT']='Excessive login attempts by a client'."\n".
                'Email: {0}'."\n".
				'Ticket#: {1}'."\n".
                'IP: {2}'."\n".
				'Time: {3}'."\n\n".
                'Attempts #{4}';
?>
