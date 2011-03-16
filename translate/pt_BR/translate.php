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
$LANG['ERROR_EMAIL_PARSE_FAILED'] = 'Falha ao tratar o Email';
$LANG['ERROR_INVALID_FILE_TYPE'] = 'Tipo de arquivo inválido.';
$LANG['ERROR_INVALID_FROM_ADDRESS'] = 'Endereço Informado no FROM é invalido';
$LANG['ERROR_NAME_REQUIRED'] = 'O nome é obrigatório';
$LANG['ERROR_MESSAGE_REQUIRED'] = 'o Texto da Mensagem é obrigatório';
$LANG['ERROR_OCCURED'] = 'Ocorreu um Erro! Tente novamente';
$LANG['ERROR_POSSIBLY_INVALID_TICKET'] = 'Acesso Negado. O ticket informado pode estar errado.';
$LANG['ERROR_SECURITY_REPEAT_RESULT_LOCK'] = 'Violação de Regras de Segurança. Novas ocorrências resultarão em bloqueio de sua conta.';
$LANG['ERROR_SERVICES_NOT_AVAILABLE'] = 'Serviços indisponívels!';
$LANG['ERROR_YOU_HAVE_REACHED_MAXIMUM_FAILED_LOGIN'] = 'Você atingiu o máximo número de tentativas de login permitido. Tente após 5 minutos ou <a href="open.php">abra um novo ticket</a>';
$LANG['ERROR_UNABLE_SEND_MESSAGE_TRY_AGAIN'] = 'Não foi possível enviar a mensagem, tente novamente!';
$LANG['ERROR_UNABLE_TO_POST_THE_RESPONSE']='Unable to post the response';
$LANG['ERROR_UNKNOW_ACTION'] = 'Ação desconhecida!';







$LANG['ERROR_SEARCH_TERM_MORE_3']='A termo usado na busca deve ter mais de 3 caracteres';

# Titles on pages and web pages
$LANG['TITLE'] = 'Tickets FullService';
$LANG['TITLE_BOX_NEW_TICKET'] = 'Novo Ticket';
$LANG['TITLE_BAR_OFFLINE'] = 'Sistema de Ticket para Suporte';
$LANG['TITLE_MY_PREFERENCES'] = 'Minhas Preferências';
$LANG['TITLE_OFFLINE'] = 'Sistema de ticket para Suporte está Offline';
$LANG['TITLE_OPEN_PREVIUS_TICKET'] = 'Abrir ticket existente';
$LANG['TITLE_CLOSED_TICKETS'] = 'Closed Tickets';

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
$LANG['LABEL_ADD_NEW_DEPT'] = 'Adicionar Novo Departamento.';
$LANG['LABEL_ADMIN_DASHBOARD'] = 'Admin Dashboard';
$LANG['LABEL_ADMIN_PANEL'] = 'Painel de Administração';
$LANG['LABEL_ADVANCED'] = 'Avançado';
$LANG['LABEL_ALL'] = 'Todos';
$LANG['LABEL_ALL_DEPARTMENTS'] = 'Todos os Departamentos';
$LANG['LABEL_ASCENDING'] = 'Ascendente';
$LANG['LABEL_ASSIGN'] = 'Designar';
$LANG['LABEL_ASSIGNED_TICKETS'] = 'Tickets Designados';
$LANG['LABEL_ATTACHMENT'] = 'Anexo';
$LANG['LABEL_AUTO_RESPONSE_EMAIL'] = 'E-mail para Auto Resposta';
$LANG['LABEL_AUTORESPONDERS'] = 'Autoresposta';
// Label B
$LANG['LABEL_BASIC'] = 'Basico';
// Label C
$LANG['LABEL_CLOSED_TICKETS'] = 'Tickets Fechados';
$LANG['LABEL_CANCEL'] = 'Cancelar';
$LANG['LABEL_CATEGORY'] = 'categoria';
$LANG['LABEL_CATEGORY_DEPT'] = 'Categoria/Departamento';
$LANG['LABEL_CHANGE_PASSWORD'] = 'Trocar Senha';
$LANG['LABEL_CHECK_STATUS'] = 'Verificar Status';
$LANG['LABEL_CLOSED'] = 'Fechado';
$LANG['LABEL_CREATE_DATE'] = 'Criação';
// Label D
$LANG['LABEL_DASHBOARD'] = 'Dashboard';
$LANG['LABEL_DATE_SPAN'] = 'Data Entre';
$LANG['LABEL_DEFAULT'] = 'Padrão';
$LANG['LABEL_DELETE_DEPT_S'] = 'Apagar Depart.(s)';
$LANG['LABEL_DEPARTMENT'] = 'Departamento';
$LANG['LABEL_DEPARTMENTS'] = 'Departamentos';
$LANG['LABEL_DEPT_MANAGER'] = 'Gerente do Departamento';
$LANG['LABEL_DEPT_MANAGER_NONE'] = 'Nenhum Gerente';
$LANG['LABEL_DEPT'] = 'Dept.';
$LANG['LABEL_DEPT_ACCESS'] = 'Dept Access';
$LANG['LABEL_DEPT_TYPE'] = 'Tipo de Departamento';
$LANG['LABEL_DEPT_NAME'] = 'Nome do Departamento';
$LANG['LABEL_DEPT_EMAIL'] = 'E-mail do Departamento';
$LANG['LABEL_DEPT_EMAIL_ABOVE'] = 'E-mail do Departamento (acima definido)';
$LANG['LABEL_DEPT_SIGNATURE'] = 'Assinatura do Departamento';
$LANG['LABEL_DESCENDING'] = 'Descendente';
$LANG['LABEL_DIRECTORY'] = 'Agenda';
$LANG['LABEL_DIRECTORY_STAFF'] = 'Agenda de Contatos da Equipe';
// Label E
$LANG['LABEL_EMAIL'] = 'E-Mail';
$LANG['LABEL_EMAILS'] = 'E-Mails';
$LANG['LABEL_EMAILS_SETTINGS'] = 'Configurações de E-Mails';
$LANG['LABEL_EMAIL_ADDRESS'] = 'E-Mail';
$LANG['LABEL_EMAIL_TEMPLATES'] = 'Modelos de Mensagens para o E-mail';
$LANG['LABEL_ENABLE_SYSTEM_OFF_LINE'] = 'Abilitar (liberar acesso)';
// Label F
$LANG['LABEL_FROM'] = 'De';
$LANG['LABEL_FULL_NAME'] = 'Nome Completo';
// Label G
$LANG['LABEL_GO'] = 'Vá';
// Label H
$LANG['LABEL_HELP_TOPIC'] = 'Ajuda Relacionada';
$LANG['LABEL_HELP_TOPICS'] = 'Tópicos de Ajuda';
// Label I
$LANG['LABEL_ISSUE_SUMMARY'] = 'Resumo do ocorrido';
// Label J
// Label K
$LANG['LABEL_KNOWLEDGE_BASE'] = 'Conhecimento (KB)';
$LANG['LABEL_KNOWLEDGE_BASE_PREMATE'] = 'Base de Conhecimento: Premade';
// Label L
$LANG['LABEL_LOG_OUT'] = 'Sair';
// Label M
$LANG['LABEL_MAKE_PUBLIC'] = 'Tornar Publico';
$LANG['LABEL_MAKE_PRIVATE'] = 'Tornar Privado';
$LANG['LABEL_MANAGER'] = 'Gerente';
$LANG['LABEL_MESSAGE'] = 'Mensagem';
$LANG['LABEL_MY_ACCOUNT'] = 'Minha Conta';
$LANG['LABEL_MY_PREFERENCE'] = 'Minhas Configurações';
$LANG['LABEL_MY_PROFILE'] = 'Meu Perfil';
// Label N
$LANG['LABEL_NAME'] = 'Name';
$LANG['LABEL_NEW_DEPARTMENT'] = 'Novo Departamento';
$LANG['LABEL_NEW_MESSAGE'] = 'New Message';
$LANG['LABEL_NEW_PREMADE_REPLY'] = 'Nova Resposta Pré-pronta';
$LANG['LABEL_NEW_TICKET'] = 'Novo Ticket';
$LANG['LABEL_NO_MANAGER_ADD_USERS'] = 'Nenhum possível Gerente encontrado (Adicione Usuários)';
$LANG['LABEL_NONE'] = 'Nenhum';
// Label O
$LANG['LABEL_OPEN'] = 'aberto';
$LANG['LABEL_OPEN_NEW_TICKET'] = 'Abrir Novo Ticket';
$LANG['LABEL_OPEN_TICKET'] = 'Criar Ticket';
$LANG['LABEL_OTHER'] = 'Outro';
$LANG['LABEL_OUTGOING_EMAIL'] = 'e-mail de saída';
// Label P
$LANG['LABEL_PASSWORD'] = 'Senha';
$LANG['LABEL_PUBLIC'] = 'Público';
$LANG['LABEL_PRIVATE'] = 'Privado';
$LANG['LABEL_PRIVATE_HIDDEN'] = 'Interno (Oculto)';
$LANG['LABEL_PASSWORD_AGAIN'] = 'Senha (novamente)';
$LANG['LABEL_POST_REPLY'] = 'Enviar Resposta';
$LANG['LABEL_PHONE'] = 'Fone';
$LANG['LABEL_PREFERENCES'] = 'Configurações';
$LANG['LABEL_PRIORITY'] = 'Prioridade';
$LANG['LABEL_PRIMARY_OUTGOING_EMAIL'] = 'Email Primário de Saida';
$LANG['LABEL_PREMADE_REPLIES'] = 'Resposta pré-pronta';
// Label Q
$LANG['LABEL_QUERY'] = 'Consulta';
$LANG['LABEL_QUERY_RETURNED_ZERO_RESULT'] = 'A consulta não retornou resultados';
// Label R
$LANG['LABEL_RESET'] = 'Limpar';
$LANG['LABEL_RESULTS_PER_PAGE'] = 'Número de Resultados por Paginas';
$LANG['LABEL_REPLY_TITLE'] = 'Título da Resposta';
// Label S
$LANG['LABEL_SEARCH'] = 'Pesquisa';
$LANG['LABEL_SEARCH_FOR'] = 'Pesquisar por';
$LANG['LABEL_SELECT'] = 'Selecione';
$LANG['LABEL_SELECT_SOURCE'] = 'Selecione a origem';
$LANG['LABEL_SELECT_DEPARTMENT'] = 'Selecione o Departamento';
$LANG['LABEL_SELECT_MANAGER_OPTIONAL'] = 'Selecione o Gerente (isto é opcional)';
$LANG['LABEL_SELECT_ONE_TOPIC'] = 'Selecione um dos Tópicos';
$LANG['LABEL_SELECT_ONE_EMAIL'] = 'Selecione um dos E-mail';
$LANG['LABEL_SELECT_TEMPLATE'] = 'Selecione o Modelo (Template)';
$LANG['LABEL_SORT_BY'] = 'Ordenado por';
$LANG['LABEL_SORT_BY_TITLE'] = 'Ordenar pelo título';
$LANG['LABEL_SORT_BY_UPDATE_DATE'] = 'Ordenadr atualização por data';
$LANG['LABEL_STAFF'] = 'Equipe';
$LANG['LABEL_STAFF_MEMBERS'] = 'Membros da Equipe';
$LANG['LABEL_STAFF_PANEL'] = 'Painel de Equipe';
$LANG['LABEL_STATUS'] = 'Situção';
$LANG['LABEL_STATUS_IS'] = 'No Estado';
$LANG["LABEL_SETTINGS"] = 'Configurações';
$LANG['LABEL_SUBMIT'] = 'Enviar';
$LANG['LABEL_SUBMIT_TICKET'] = 'Enviar Ticket';
$LANG['LABEL_SUBJECT'] = 'Assunto';
$LANG['LABEL_SYSTEM_DEFAULT_TEMPLATE'] = 'Padrão do Sistema';
$LANG["LABEL_SYSTEM_SETTINGS"] = 'Configurações do sistema';
// Label T
$LANG['LABEL_TICKET_NUMBER'] = 'Num. do Ticket';
$LANG['LABEL_TELEPHONE'] = 'Telefone';
$LANG['LABEL_TICKET_STATUS'] = 'Situação do Ticket';
$LANG['LABEL_TELEPHONE'] = 'Telefone';
$LANG['LABEL_TICKET_NUMBER'] = 'Num. do Ticket';
$LANG['LABEL_TICKET_SOURCE'] = 'Origem do Ticket';
$LANG['LABEL_TICKET_STATUS'] = 'Situação do Ticket';
$LANG['LABEL_TICKET_ID'] = 'Ticket ID';
$LANG['LABEL_TO'] = 'Até';
$LANG['LABEL_TOGGLE'] = 'Invertido';
$LANG['LABEL_TRANSFER'] = 'Transferir';
$LANG['LABEL_TYPE'] = 'Tipo';
// Label U
$LANG['LABEL_UPDATE_DATE'] = 'Última Atualização';
$LANG['LABEL_UPDATE_DEPARTMENT'] = 'Atualizar Departamento';
$LANG['LABEL_USERNAME'] = 'Nome do Usuário';
$LANG['LABEL_USERS'] = 'Usuários';
// Label V
$LANG['LABEL_VIEW_STATUS'] = 'Verificar Ticket';

#Alert Messages, normally used with JavaScript dialog box.
// TEXT A
$LANG['TEXT_ACCESS_DENIED']='Acesso Negado';
$LANG['TEXT_ANSWERED_STATS'] = 'Tickets Respondidos ({0})';
$LANG['TEXT_ANSWERED_TICKETS'] = 'Tickets Respondidos';
$LANG['TEXT_ANY_STATUS'] = 'Alguma Situação';
$LANG['TEXT_ASSIGNED_TICKETS'] = 'Tickets atribuídos';
$LANG['TEXT_ATTACH_FILE'] = 'Anexe seu arquivo';
$LANG['TEXT_AUTHENTICATION_REQUIRED'] = 'Autenticação Obrigatória';
$LANG['TEXT_AUTHENTICATION_REQUIRED_QUESTION']='É necessário autenticação?';
// TEXT B
$LANG['TEXT_BOX_NEW_TICKET'] = 'Envie uma nova requisição de suporte. Por favor informe o máximo de detalhes possível, para que nos possamos melhor lhe atender. Você pode atualizar um ticket já enviado, por favor use o formulário a direita. Um e-mail válido é obrigatório.';
// TEXT C
$LANG['TEXT_CAM_BE_APPENDED_TO_RESPONSES'] = 'Pode ser adicionado a respostas do departamento.<br/>(Disponível como uma opção para departamentos de acesso ao publico)';
$LANG['TEXT_CLOSED_TICKETS'] = 'Tickets Fechados';
$LANG['TEXT_CLOSED'] = 'Fechado';
$LANG['TEXT_CREATE_FAILED'] = 'Falha na Criação do Ticket';
// TEXT D
$LANG['TEXT_DEPT_DEPENDS_ON_EMAIL'] = 'Departamento depende das configurações de e-mail e tópicos de ajuda para as solicitações de entrada.';
$LANG['TEXT_DEPT_UPDATED_SUCCESSFULLY'] = 'Departamento atualizado com sucesso!';
// TEXT E
$LANG['TEXT_EMAIL_ADDRESS_USED_SEND_AUTO_RESPONSES'] = 'Endereço de E-mail usado para enviar auto-respostas, se abilitado.';
$LANG['TEXT_ENTER_MESSAGE'] = 'Entre sua mensagem';
// TEXT F
$LANG['TEXT_FORGOT_YOUR_LOGIN_INFO'] = 'Esqueceu suas informações de login? Por favor <a href="open.php">Abra um novo ticket</a>.';
// TEXT G
$LANG['TEXT_GENERAL_INQUIRY'] = 'Assunto Geral';
$LANG['TEXT_GLOBAL_AUTO_RESPONSE_SETTINGS'] = 'Configurações globais para auto-resposta  na seção preferência deve estar abilitada por departamento \'Abilitado\' para configurações terem efeito';
// TEXT H
$LANG['TEXT_HOME'] = 'Início';
// TEXT I
$LANG['TEXT_INVALID_LOGIN'] = 'Login Inválido';
// TEXT J
// TEXT K
// TEXT L
// TEXT M
$LANG['TEXT_MESSAGE_POSTED_SUCCESSFULLY'] = 'Mensagem enviada com sucesso';
$LANG['TEXT_MY_PREFERENCES'] = 'Minhas Configurações';
$LANG['TEXT_MY_ACCOUNT'] = 'Minha Conta';
$LANG['TEXT_My Tickets_STATS'] = 'Meus Tickets ({0})';
$LANG['TEXT_MY_TICKETS'] = 'Meus Tickets';
$LANG['TEXT_MY_TICKETS_STATS'] = 'Meus Tickets ({0})';
// TEXT N
$LANG['TEXT_NOT_THIS_USER'] = 'Não sou este usuário';
$LANG['TEXT_NEW_TICKET_AUTO_RESPONSE'] = 'Um email com o número do Ticket foi enviado para <b>{0}</b>. Você poderá precisar do número do ticket enviado para seu e-mail para verificar o progresso de sua requisição<br><br>Se você desejar enviar informaçòes adicionais ou comentários referentes ao mesmo assunto, por favor siga as instruções enviadas no e-mail.';
$LANG['TEXT_NEW_TICKET'] = 'Novo Ticket';
// TEXT O
$LANG['TEXT_OPEN_NEW_TICKET'] = 'Abrir novo Ticket';
$LANG['TEXT_OPEN_PREVIUS_TICKET'] = 'Verificar o status de um Ticket criado anteriormente. É mantido um histórico e arquivo de todos as requisições de suporte com suas respostas.';
$LANG['TEXT_OFFLINE']='Obrigado pelo seu interesse em nos contactar.<br>'.
         'Nosso Helpdesk não está funcionando agora, porem volte mais tarde, não deixe de tentar denovo.<br/>'.
		 ' Isto não é um erro.';
$LANG['TEXT_OVERDUE'] = 'Atrasado';
$LANG['TEXT_OVERDUE_STATS'] = 'Atrasado ({0})';
$LANG['TEXT_OVERDUE_TICKETS'] = 'Tickets Atrasados';
$LANG['TEXT_OPEN_TICKETS'] = 'Tickets Abertos';
$LANG['TEXT_OPEN_STATS'] = 'Abertos ({0})' ;
$LANG['TEXT_OVERDUE_TICKETS'] = 'Tickets Atrasados';
$LANG['TEXT_OPEN'] = 'Aberto';
// TEXT P
$LANG['TEXT_PLEASE_FILL_STAFF_FORM_BELOW_OPEN_NEW_TICKET'] = 'Por Favor, preencha o formulário abaixo para abrir um novo ticket.';
$LANG['TEXT_PLEASE_FILL_FORM_NEW_TICKET'] = 'Por favor preencha o formulário abaixo para abir um novo Ticket.';
$LANG['TEXT_PLEASE_TAKE_A_MINUTE_TO_DELETE_INSTALL'] = 'Por favor não se esqueça de apagar o diretório <strong>setup/install</strong> para sua segurança.';
$LANG['TEXT_POST_REPLY'] = 'Enviar Resposta';
// TEXT Q
// TEXT R
$LANG['TEXT_REFRESH'] = 'Atualizar';
$LANG['TEXT_REQUIRED_WHEN_DEPT_IS_PUBLIC'] = 'A Assinatura é necessária quando o departamento é público';
// TEXT S
$LANG['TEXT_SELECT_DEPARTMENTS_GROUP_MEMBERS'] = 'Selecionte o grupo de membros do departamentos que são permitidos acesso em adicião ao seu proprio departamento.';
$LANG['TEXT_SUPPORT_CENTER'] = 'Centro de Suporte FullService';
$LANG['TEXT_SUPPORT_TICKET_SISTEM'] = 'Sistema FullSErvice de <span>TICKET para Suporte</span>';
$LANG['TEXT_SYSTEM_IS_OFF_LINE'] = '<strong>O Sistema está definido como desativado (Off-Line)</strong> - A interface com o cliente está desativada e somente os administadores podem acessar o painel de controle.';
$LANG['TEXT_SHOW_FROM_TO_OF_ALL'] = 'Exibindo {0} - {1} de {2}';
$LANG['TEXT_SHOW_ZERO'] = 'Exibindo 0 (zero)';
$LANG['TEXT_SHOW_FROM_TO_OF_ALL'] = 'Exibindo {0} - {1} de {2}';
$LANG['TEXT_SHOW_ZERO'] = 'Exibindo 0 (zero)';
$LANG['TEXT_SESSION_TIMED_OUT_DUE_TO_INACTIVITY'] = 'Devido a inatividade, sua seção expirou!';
$LANG['TEXT_SORT_BY_TICKET_ID'] = 'Ordenar por Número do Ticket';
$LANG['TEXT_SORT_BY_DATE'] = 'Ordenar por Data';
$LANG['TEXT_SORT_BY_DEPARTMENT'] = 'Ordenar por Departamento';
$LANG['TEXT_SEARCH_RESULTS'] = 'Resultado de Pesquisa';
$LANG['TEXT_SUPPORT_TEAM'] = 'Equipe de Atendimento Externo';
// TEXT T
$LANG['TEXT_THANKS_NEW_TICKET'] = 'Obrigado por nos contactar.<br>Um ticket para sua requisição foi criado e um de nossos representantes irá retornar para você o mais rapido possível!';
$LANG['TEXT_TICKETS_STATUS'] = 'Situação dos Tickets';
$LANG['TEXT_TICKET_NUMBER'] = 'Número do Ticket';
$LANG['TEXT_TICKET_THREAD'] = 'Histórico do Ticket';
$LANG['TEXT_TICKET_WILL_REOPEN_NEW_POST'] = 'O ticket será reaberto se houver uma nova postagem!';
$LANG['TEXT_TICKET_CREATED'] = 'Ticket para requisição criado!';
$LANG['TEXT_Ticket_status_changed_to'] = 'Situação do Ticket alterada para {0}';
$LANG['TEXT_TOTAL_OPEN_TICKETS'] = "Abertos ({0})";
$LANG['TEXT_TOTAL_ANSWERED_TICKETS'] = "Respondidos ({0})";
$LANG['TEXT_TOTAL_MY_TICKETS'] = 'Meus Tickets ({0})';
// TEXT U
$LANG['TEXT_UNABLE_CREATE_TICKET'] = 'Não foi possível criar o Ticket. Por favor corrija os erros abaixo e tente novamente!';
$LANG['TEXT_USED_FOR_OUTGOING_EMAILS'] = 'Usado para envio de e-mails, alertas e informações aos usuários e equipe.';
// TEXT V
$LANG['TEXT_VIEW_OPEN'] = 'Verificar Abertos';
$LANG['TEXT_VIEW_CLOSED'] = 'Verificar Fechados';
$LANG['TEXT_VISIBLE_TO_CLIENT'] = 'Visivel pelo Cliente.';
// TEXT W
$LANG['TEXT_WELCOME_MSG'] = 'Para podermos lhe dar o melhor atendimento usamos um sistema de tickets. Cada requisição de suporte é associada a um único número de atendimento (Ticket) que você pode usar para observar o progresso de seu atendimento rapidamente. Para sua referência nós oferecemos um arquivo completo com o histórico de todas as suas requisições.';
$LANG['TEXT_WELCOME_BACK_CLIENT'] = 'Bem Vindo, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_BACK_STAFF'] = 'Bem Vindo, <strong>{0}</strong>';
$LANG['TEXT_WELCOME_BACK'] = 'Bem Vindo';

$LANG['TEXT_NO_TICKETS_FOUND'] = 'Nenhum Ticket encontrado.';

$LANG['TEXT_EXCESSIVE_FAILED_LOGIN_ATTEMPTS'] = 'Tentativas de Login Excessivas';
$LANG['TEXT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT'] = 'Tentativas de Login Excessivas (cliente)';

$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET'] = 'Para visualizar a situação de um Ticket, forneça as informações de login abaixo.<br>'.
											'Se é a primeira vez que está nos contactando ou você perdeu o número de seu ticket, por favor <a href="open.php">abra um novo ticket</a>';
$LANG['TEXT_LOGIN_VIEW_STATUS_OF_TICKET']='Para visualizar a situação de um ticket, forneça-nos as informações para sua identificação nos campos abaixo.<br/>'.
        'Se esta é seu primeiro contato, ou você perdeu o número de seu ticket (Atendimento), por-favor <a href="open.php">clique aqui</a> para abrir um novo ticket.';	
$LANG['TEXT_LOG_OUT'] = 'Sair';

$LANG['TEXT_WELCOME_TITLE'] = 'Bem Vindo ao Centro de Suporte';



#Alert Messages, normally used with JavaScript dialog box.
$LANG['ALERT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT'] = 'Tentativas de Login pelo cliente excessivas'."\n".
'Email: {0}'."\n".
'Ticket#: {1}'."\n".
'IP: {2}'."\n".
'Data: {3}'."\n\n".
'Tentativas #{4}';
?>
