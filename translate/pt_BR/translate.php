<?php

#Disable direct access.
if (!strcasecmp(basename($_SERVER['SCRIPT_NAME']), basename( __FILE__ ))) die ('kwaheri rafiki!');

$LANG = array ();

// name in iso-639 
$LANG['LANGUAGE'] = 'pt_BR'; 
//Word Name (english name)
$LANG['LANGUAGE_NAME'] = 'Portugues Brasil';
//Native name of language (in the original language)
$LANG['LANGUAGE_NATIVE_NAME'] = 'Portugues Brasil';
$LANG['DIRECTION'] = 'ltr';
$LANG['CODEPAGE'] = 'UTF-8';

# Error Mensages
$LANG['ERROR_NAME_REQUIRED'] = 'O nome é obrigatório';
$LANG['ERROR_MESSAGE_REQUIRED'] = 'o Texto da Mensagem é obrigatório';
$LANG['ERROR_INVALID_FROM_ADDRESS'] = 'Endereço Informado no FROM é invalido';
$LANG['ERROR_EMAIL_PARSE_FAILED'] = 'Falha ao tratar o Email';
$LANG['ERROR_SERVICES_NOT_AVAILABLE'] = 'Serviços indisponívels!';
$LANG['ERROR_POSSIBLY_INVALID_TICKET'] = 'Acesso Negado. O ticket informado pode estar errado.';
$LANG['ERROR_SECURITY_REPEAT_RESULT_LOCK'] = 'Violação de Regras de Segurança. Novas ocorrências resultarão em bloqueio de sua conta.';
$LANG['ERROR_INVALID_FILE_TYPE'] = 'Tipo de arquivo inválido.';
$LANG['ERROR_YOU_HAVE_REACHED_MAXIMUM_FAILED_LOGIN'] = 'Você atingiu o máximo número de tentativas de login permitido. Tente após 5 minutos ou <a href="open.php">abra um novo ticket</a>';
$LANG['ERROR_UNABLE_SEND_MESSAGE_TRY_AGAIN'] = 'Não foi possível enviar a mensagem, tente novamente!';
$LANG['ERROR_OCCURED'] = 'Ocorreu um Erro! Tente novamente';
$LANG['ERROR_UNKNOW_ACTION'] = 'Ação desconhecida!';








# Titles on pages and web pages
$LANG['TITLE'] = 'Tickets FullService';
$LANG['TITLE_BOX_NEW_TICKET'] = 'Novo Ticket';
$LANG['TITLE_BAR_OFFLINE'] = 'Sistema de Ticket para Suporte';
$LANG['TITLE_MY_PREFERENCES'] = 'Minhas Preferências';
$LANG['TITLE_OFFLINE'] = 'Sistema de ticket para Suporte está Offline';
$LANG['TITLE_OPEN_PREVIUS_TICKET'] = 'Abrir ticket existente';

# Images for Staff and Clients Ends
// relative path of imagens in "translate/".$LANG['LANGUAGE']."/"
$LANG['IMAGE_CLIENT_VIEW_OPEN'] = 'client/view_open.gif';
$LANG['IMAGE_CLIENT_VIEW_CLOSED'] = 'client/view_closed.gif';
$LANG['IMAGE_CLIENT_REFRESH'] = 'client/refresh.gif';
$LANG['IMAGE_STAFF_VIEW_OPEN'] = 'staff/view_open.gif';
$LANG['IMAGE_STAFF_VIEW_CLOSED'] = 'staff/view_closed.gif';
$LANG['IMAGE_STAFF_REFRESH'] = 'staff/refresh.gif';

# Labels for Bottons and Headers on Tables, Selections and others
$LANG['LABEL_EMAIL'] = 'E-Mail';
$LANG['LABEL_TICKET_NUMBER'] = 'Num. do Ticket';
$LANG['LABEL_FULL_NAME'] = 'Nome Completo';
$LANG['LABEL_NAME'] = 'Name';
$LANG['LABEL_EMAIL_ADDRESS'] = 'E-Mail';
$LANG['LABEL_EMAIL'] = 'Email';










$LANG['LABEL_ENABLE_SYSTEM_OFF_LINE'] = 'Abilitar (liberar acesso)'; 
$LANG['LABEL_TELEPHONE'] = 'Telefone';
$LANG['LABEL_PHONE'] = 'Fone';
$LANG['LABEL_HELP_TOPIC'] = 'Ajuda Relacionada';
$LANG['LABEL_SUBJECT'] = 'Assunto';
$LANG['LABEL_KNOWLEDGE_BASE'] = 'Conhecimento (KB)';
$LANG['LABEL_KNOWLEDGE_BASE_PREMATE'] = 'Base de Conhecimento: Premade';
$LANG['LABEL_LOG_OUT'] = 'Sair';
$LANG['LABEL_MESSAGE'] = 'Mensagem';
$LANG['LABEL_MY_ACCOUNT'] = 'Minha Conta';
$LANG['LABEL_MY_PREFERENCE'] = 'Minhas Configurações';
$LANG['LABEL_MY_PROFILE'] = 'Meu Perfil';
$LANG['LABEL_NEW_TICKET'] = 'Novo Ticket';
$LANG['LABEL_PRIORITY'] = 'Prioridade';
$LANG['LABEL_PREFERENCES'] = 'Configurações';
$LANG['LABEL_ATTACHMENT'] = 'Anexo';
$LANG['LABEL_TICKET_STATUS'] = 'Situação do Ticket'; 
$LANG['LABEL_VIEW_STATUS'] = 'Verificar Ticket';
$LANG['LABEL_DEPARTMENT'] = 'Departamento';
$LANG['LABEL_CLOSED_TICKETS'] = 'Tickets Fechados';
$LANG['LABEL_CREATE_DATE'] = 'Criação';
$LANG['LABEL_USERNAME'] = 'Nome do Usuário';
$LANG['LABEL_PASSWORD'] = 'Senha';
$LANG['LABEL_PASSWORD_AGAIN'] = 'Senha (novamente)';
$LANG['LABEL_OPEN_TICKET'] = 'Criar Ticket';
$LANG['LABEL_RESET'] = 'Limpar';
$LANG['LABEL_CANCEL'] = 'Cancelar';
$LANG['LABEL_POST_REPLY'] = 'Enviar Resposta';
$LANG['LABEL_OPEN_NEW_TICKET'] = 'Abrir Novo Ticket';
$LANG['LABEL_ADMIN_PANEL'] = 'Painel de Administração';
$LANG['LABEL_STAFF_PANEL'] = 'Equipe';
$LANG['LABEL_CHECK_STATUS'] = 'Verificar Status';
$LANG['LABEL_CHANGE_PASSWORD'] = 'Trocar Senha';
$LANG['LABEL_STAFF_PANEL'] = 'Painel de Equipe';






















# Generic text for all site, if have to text repeted in 
# Client or Staff ends, is prefixed with correct name.
$LANG['LABEL_ADVANCED'] = 'Avançado';
$LANG['LABEL_ASCENDING'] = 'Ascendente';
$LANG['LABEL_BASIC'] = 'Basico';
$LANG['LABEL_DATE_SPAN'] = 'Data Entre';
$LANG['LABEL_DEPT'] = 'Dept.';
$LANG['LABEL_DESCENDING'] = 'Descendente';
$LANG['LABEL_DIRECTORY'] = 'Agenda';
$LANG['LABEL_DIRETORY_STAFF'] = 'Agenda de Contatos da Equipe';
$LANG['LABEL_FROM'] = 'De.';
$LANG['LABEL_QUERY'] = 'Consulta';
$LANG['LABEL_SEARCH'] = 'Pesquisa';
$LANG['LABEL_STATUS_IS'] = 'No Estado';
$LANG['LABEL_SUBMIT_TICKET'] = 'Enviar Ticket';
$LANG['LABEL_SORT_BY'] = 'Ordenado por';
$LANG['LABEL_RESULTS_PER_PAGE'] = 'Número de Resultados por Paginas';
$LANG['LABEL_TO'] = 'Até.';


























































#Alert Messages, normally used with JavaScript dialog box.
$LANG['TEXT_CREATE_FAILED'] = 'Falha na Criação do Ticket';
$LANG['TEXT_WELCOME_BACK'] = 'Bem Vindo';
$LANG['TEXT_LOG_OUT'] = 'Sair';
$LANG['TEXT_MY_PREFERENCES'] = 'Minhas Configurações';
$LANG['TEXT_MY_ACCOUNT'] = 'Minha Conta';
$LANG['TEXT_SUPPORT_TICKET_SISTEM'] = 'Sistema FullSErvice de <span>TICKET para Suporte</span>';
$LANG['TEXT_MY_TICKETS'] = 'Meus Tickets'; 
$LANG['TEXT_TICKETS_STATUS'] = 'Situação dos Tickets';
$LANG['TEXT_NEW_TICKET'] = 'Novo Ticket';
$LANG['TEXT_HOME'] = 'Início';
$LANG['TEXT_SUPPORT_CENTER'] = 'Centro de Suporte FullService';
$LANG['TEXT_WELCOME_TITLE'] = 'Bem Vindo ao Centro de Suporte';
$LANG['LABEL_TICKET_ID'] = 'Ticket ID';




$LANG['TEXT_SELECT_ONE_TOPIC'] = 'Selecione um tópico';
$LANG['TEXT_WELCOME_MSG'] = 'Para podermos lhe dar o melhor atendimento usamos um sistema de tickets. Cada requisição de suporte é associada a um único número de atendimento (Ticket) que você pode usar para observar o progresso de seu atendimento rapidamente. Para sua referência nós oferecemos um arquivo completo com o histórico de todas as suas requisições.';
$LANG['TEXT_BOX_NEW_TICKET'] = 'Envie uma nova requisição de suporte. Por favor informe o máximo de detalhes possível, para que nos possamos melhor lhe atender. Você pode atualizar um ticket já enviado, por favor use o formulário a direita. Um e-mail válido é obrigatório.';
$LANG['TEXT_OPEN_NEW_TICKET'] = 'Abrir novo Ticket';
$LANG['TEXT_OPEN_PREVIUS_TICKET'] = 'Verificar o status de um Ticket criado anteriormente. É mantido um histórico e arquivo de todos as requisições de suporte com suas respostas.';
$LANG['TEXT_TICKET_CREATED'] = 'Ticket para requisição criado!';
$LANG['TEXT_UNABLE_CREATE_TICKET'] = 'Não foi possível criar o Ticket. Por favor corrija os erros abaixo e tente novamente!';
$LANG['TEXT_PLEASE_FILL_FORM_NEW_TICKET'] = 'Por favor preencha o formulário abaixo para abir um novo Ticket.';
$LANG['TEXT_NOT_THIS_USER'] = 'Não sou este usuário';
$LANG['TEXT_THANKS_NEW_TICKET'] = 'Obrigado por nos contactar.<br>Um ticket para sua requisição foi criado e um de nossos representantes irá retornar para você o mais rapido possível!';
$LANG['TEXT_NEW_TICKET_AUTO_RESPONSE'] = 'Um email com o número do Ticket foi enviado para <b>{0}</b>. Você poderá precisar do número do ticket enviado para seu e-mail para verificar o progresso de sua requisição<br><br>Se você desejar enviar informaçòes adicionais ou comentários referentes ao mesmo assunto, por favor siga as instruções enviadas no e-mail.';
$LANG['TEXT_SUPPORT_TEAM'] = 'Equipe de Atendimento Externo';
$LANG['TEXT_MESSAGE_POSTED_SUCCESS'] = 'Mensagem enviada com sucesso';
$LANG['TEXT_TICKET_NUMBER'] = 'Número do Ticket';
$LANG['TEXT_TICKET_THREAD'] = 'Histórico do Ticket';
$LANG['TEXT_TICKET_WILL_REOPEN_NEW_POST'] = 'O ticket será reaberto se houver uma nova postagem!';
$LANG['TEXT_ENTER_MESSAGE'] = 'Entre sua mensagem';
$LANG['TEXT_ATTACH_FILE'] = 'Anexe seu arquivo';
$LANG['TEXT_POST_REPLY'] = 'Enviar Resposta';
$LANG['TEXT_VIEW_OPEN'] = 'Verificar Abertos';
$LANG['TEXT_VIEW_CLOSED'] = 'Verificar Fechados';
$LANG['TEXT_REFRESH'] = 'Atualizar';
$LANG['TEXT_SORT_BY_TICKET_ID'] = 'Ordenar por Número do Ticket';
$LANG['TEXT_SORT_BY_DATE'] = 'Ordenar por Data';
$LANG['TEXT_SORT_BY_DEPARTMENT'] = 'Ordenar por Departamento';
$LANG['TEXT_NO_TICKETS_FOUND'] = 'Nenhum Ticket encontrado.';
$LANG['TEXT_AUTHENTICATION_REQUIRED'] = 'Autenticação Obrigatória';
$LANG['TEXT_INVALID_LOGIN'] = 'Login Inválido';
$LANG['TEXT_FORGOT_YOUR_LOGIN_INFO'] = 'Esqueceu suas informações de login? Por favor <a href="open.php">Abra um novo ticket</a>.';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT'] = 'Tentativas de Login Excessivas (cliente)';
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET'] = 'Para visualizar a situação de um Ticket, forneça as informações de login abaixo.<br>'.
											'Se é a primeira vez que está nos contactando ou você perdeu o número de seu ticket, por favor <a href="open.php">abra um novo ticket</a>';
$LANG['TEXT_SESSION_TIMED_OUT_DUE_TO_INACTIVITY'] = 'Devido a inatividade, sua seção expirou!';
$LANG['TEXT_WELCOME_BACK_CLIENT'] = 'Bem Vindo, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_BACK_STAFF'] = 'Bem Vindo, <strong>{0}</strong>';
$LANG['TEXT_SHOW_FROM_TO_OF_ALL'] = 'Exibindo {0} - {1} de {2}';
$LANG['TEXT_SHOW_ZERO'] = 'Exibindo 0 (zero)';
$LANG['TEXT_GENERAL_INQUIRY'] = 'Assunto Geral';
$LANG['TEXT_OVERDUE_TICKETS'] = 'Tickets Atrasados';
$LANG['TEXT_ANSWERED_TICKETS'] = 'Tickets Respondidos';
$LANG['TEXT_ASSIGNED_TICKETS'] = 'Tickets atribuídos';
$LANG['TEXT_SEARCH_RESULTS'] = 'Resultado de Pesquisa';
$LANG['TEXT_OPEN_TICKETS'] = 'Tickets Abertos';
$LANG['TEXT_TOTAL_OPEN_TICKETS'] = "Abertos ({0})";
$LANG['TEXT_TOTAL_ANSWERED_TICKETS'] = "Respondidos ({0})";
$LANG['TEXT_TOTAL_MY_TICKETS'] = 'Meus Tickets ({0})';
$LANG['LABLE_ASSIGNED_TICKETS'] = 'Tickets Designados';
$LANG['TEXT_CLOSED_TICKETS'] = 'Tickets Fechados';
$LANG['TEXT_OVERDUE_TICKETS'] = 'Tickets Atrasados';
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET']='Para visualizar a situação de um ticket, forneça-nos as informações para sua identificação nos campos abaixo.<br/>'.
        'Se esta é seu primeiro contato, ou você perdeu o número de seu ticket (Atendimento), por-favor <a href="open.php">clique aqui</a> para abrir um novo ticket.';	
$LANG['TEXT_ANY_STATUS'] = 'Alguma Situação';
$LANG['TEXT_OPEN'] = 'Aberto';
$LANG['TEXT_CLOSED'] = 'Fechado';
$LANG['TEXT_OVERDUE'] = 'Atrasado';








$LANG['TEXT_SYSTEM_IS_OFF_LINE'] = '<strong>O Sistema está definido como desativado (Off-Line)</strong> - A interface com o cliente está desativada e somente os administadores podem acessar o painel de controle.';
$LANG['TEXT_SHOW_FROM_TO_OF_ALL'] = 'Exibindo {0} - {1} de {2}';
$LANG['TEXT_SHOW_ZERO'] = 'Exibindo 0 (zero)';



$LANG['ALERT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT'] = 'Tentativas de Login pelo cliente excessivas'."\n".
'Email: {0}'."\n".
'Ticket#: {1}'."\n".
'IP: {2}'."\n".
'Data: {3}'."\n\n".
'Tentativas #{4}';
?>
