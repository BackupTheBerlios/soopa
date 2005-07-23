<?php
// $Id: admin.php,v 1.2 2005/07/23 05:51:17 mauriciodelima Exp $
//%%%%%%	File Name  index.php   	%%%%%
define("_AM_NEWBB_FORUMCONF","Configuração do fórum");
define("_AM_NEWBB_ADDAFORUM","Criar um fórum");
define("_AM_NEWBB_SYNCFORUM","Sincronizar Fórums e Tópicos");
define("_AM_NEWBB_REORDERFORUM","Reordenar");
define("_AM_NEWBB_FORUM_MANAGER","Fóruns");
define("_AM_NEWBB_PRUNE_TITLE","Expurgo");
define("_AM_NEWBB_CATADMIN","Categorias");
define("_AM_NEWBB_GENERALSET", "Configurações Gerais" );
define("_AM_NEWBB_MODULEADMIN","Aministração do Módulo:");
define("_AM_NEWBB_HELP","Ajuda");
define("_AM_NEWBB_ABOUT","Sobre");
define("_AM_NEWBB_BOARDSUMMARY","Estatísticas");
define("_AM_NEWBB_PENDING_POSTS_FOR_AUTH","Mensagens aguardando aprovação");
define("_AM_NEWBB_POSTID","Id");
define("_AM_NEWBB_POSTDATE","Data");
define("_AM_NEWBB_POSTER","Enviado por");
define("_AM_NEWBB_TOPICS","Tópico");
define("_AM_NEWBB_SHORTSUMMARY","Informativo");
define("_AM_NEWBB_TOTALPOSTS","Mensagens");
define("_AM_NEWBB_TOTALTOPICS","Tópicos");
define("_AM_NEWBB_TOTALVIEWS","Leituras");
define("_AM_NEWBB_BLOCKS","Blocos");
define("_AM_NEWBB_SUBJECT","Assunto");
define("_AM_NEWBB_APPROVE","Aprovar");
define("_AM_NEWBB_APPROVETEXT","Contéudo desta mensagem");
define("_AM_NEWBB_POSTAPPROVED","Mensagem aprovada");
define("_AM_NEWBB_POSTNOTAPPROVED","Mensagem não foi aprovada");
define("_AM_NEWBB_POSTSAVED","Mensagem salva");
define("_AM_NEWBB_POSTNOTSAVED","Mensagem não foi salva");

define("_AM_NEWBB_TOPICAPPROVED","Tópico aprovado");
define("_AM_NEWBB_TOPICNOTAPPROVED","Tópico não foi aprovado");
define("_AM_NEWBB_TOPICID","Id");
define("_AM_NEWBB_ORPHAN_TOPICS_FOR_AUTH","Tópicos aguardando aprovação");


define('_AM_NEWBB_DEL_ONE','Excluir apenas esta mensagem');
define('_AM_NEWBB_POSTSDELETED','Mensagem selecionada foi excluída.');
define('_AM_NEWBB_NOAPPROVEPOST','Não há mensagens aguardando aprovação.');
define('_AM_NEWBB_SUBJECTC','Assunto:');
define('_AM_NEWBB_MESSAGEICON','Ícone da mensagem:');
define('_AM_NEWBB_MESSAGEC','Mensagem:');
define('_AM_NEWBB_CANCELPOST','Cancelar');
define('_AM_NEWBB_GOTOMOD','Ir para o Módulo');

define('_AM_NEWBB_PREFERENCES','Preferências');
define('_AM_NEWBB_POLLMODULE','Módulo XoopsPoll (Enquetes)');
define('_AM_NEWBB_POLL_OK','Disponível para uso');
define('_AM_NEWBB_GDLIB1','Biblioteca GD1:');
define('_AM_NEWBB_GDLIB2','Biblioteca GD2:');
define('_AM_NEWBB_AUTODETECTED','Disponível: ');
define('_AM_NEWBB_AVAILABLE','Disponível');
define('_AM_NEWBB_NOTAVAILABLE','<font color="red">Indisponível</font>');
define('_AM_NEWBB_NOTWRITABLE','<font color="red">Sem permissão de gravação</font>');
define('_AM_NEWBB_IMAGEMAGICK','ImageMagick:');
define('_AM_NEWBB_IMAGEMAGICK_NOTSET','Não configurado');
define('_AM_NEWBB_ATTACHPATH','Diretório para anexos');
define('_AM_NEWBB_THUMBPATH','Diretório para miniaturas');
//define('_AM_NEWBB_RSSPATH','Caminho para RSS');
define('_AM_NEWBB_REPORT','Relatórios enviados');
define('_AM_NEWBB_REPORT_PENDING','Pendentes');
define('_AM_NEWBB_REPORT_PROCESSED','Processados');

define('_AM_NEWBB_CREATETHEDIR','Criar Diretório');
define('_AM_NEWBB_SETMPERM','Alterar permissão');
define('_AM_NEWBB_DIRCREATED','O diretório foi criado');
define('_AM_NEWBB_DIRNOTCREATED','Não foi possível a criação do diretório');
define('_AM_NEWBB_PERMSET','Permissão alterada');
define('_AM_NEWBB_PERMNOTSET','Não foi possível a alteração da permissão');

define('_AM_NEWBB_DIGEST','Notificação de Informativo');
define('_AM_NEWBB_DIGEST_PAST','<font color="red">Deveria ter sido enviado há %d minutos</font>');
define('_AM_NEWBB_DIGEST_NEXT','Será enviado em %d minutos');
define('_AM_NEWBB_DIGEST_ARCHIVE','Arquivo de informativos');
define('_AM_NEWBB_DIGEST_SENT','Informativo processado');
define('_AM_NEWBB_DIGEST_FAILED','Informativo não processado');

// admin_forum_manager.php
define("_AM_NEWBB_NAME","Nome");
define("_AM_NEWBB_CREATEFORUM","Criar fórum");
define("_AM_NEWBB_EDIT","Editar");
define("_AM_NEWBB_CLEAR","Limpar");
define("_AM_NEWBB_DELETE","Excluir");
define("_AM_NEWBB_ADD","Incluir");
define("_AM_NEWBB_MOVE","Mover");
define("_AM_NEWBB_ORDER","Reordenar");
define("_AM_NEWBB_TWDAFAP","Nota: Serão removidos o Fórum e todas as suas mensagens.<br><br>ATENÇÃO: Você tem certeza que quer excluir este Fórum?");
define("_AM_NEWBB_FORUMREMOVED","Fórum excluído.");
define("_AM_NEWBB_CREATENEWFORUM","Criar novo fórum");
define("_AM_NEWBB_EDITTHISFORUM","Editar este fórum:");
define("_AM_NEWBB_SET_FORUMORDER","Posição:");
define("_AM_NEWBB_ALLOWPOLLS","Permitir votações:");
define("_AM_NEWBB_ATTACHMENT_SIZE" ,"Tamanho máximo em Kbytes:");
define("_AM_NEWBB_ALLOWED_EXTENSIONS", "Extensões permitidas:<span style='font-size: xx-small; font-weight: normal; display: block;'>'*' indica ausência de restrições. Extensões separadas por |</span>");
define("_AM_NEWBB_ALLOW_ATTACHMENTS", "Permitir anexos:");
define("_AM_NEWBB_ALLOWHTML","Permitir HTML:");
define("_AM_NEWBB_YES","Sim");
define("_AM_NEWBB_NO","Não");
define("_AM_NEWBB_ALLOWSIGNATURES","Permitir assinaturas:");
define("_AM_NEWBB_HOTTOPICTHRESHOLD","N° de tópicos para ser popular:");
//define("_AM_NEWBB_POSTPERPAGE","Posts per Page:<span style='font-size: xx-small; font-weight: normal; display: block;'>(This is the number of posts<br /> per topic that will be<br /> displayed per page.)</span>");
//define("_AM_NEWBB_TOPICPERFORUM","Topics per Forum:<span style='font-size: xx-small; font-weight: normal; display: block;'>(This is the number of topics<br /> per forum that will be<br /> displayed per page.)</span>");
//define("_AM_NEWBB_SHOWNAME","Replace user's name with real name:");
//define("_AM_NEWBB_SHOWICONSPANEL","Show icons panel:");
//define("_AM_NEWBB_SHOWSMILIESPANEL","Show smilies panel:");
define("_AM_NEWBB_MODERATOR_REMOVE","Excluir moderadores atuais");
define("_AM_NEWBB_MODERATOR_ADD","Incluir moderadores");
define("_AM_NEWBB_ALLOW_SUBJECT_PREFIX", "Habilitar Prefixo no assunto do tópico");
define("_AM_NEWBB_ALLOW_SUBJECT_PREFIX_DESC", "Permite adicionar um Prefixo em cada assunto dos tópicos");


// admin_cat_manager.php

define("_AM_NEWBB_SETCATEGORYORDER","Posição:");
define("_AM_NEWBB_ACTIVE","Ativo");
define("_AM_NEWBB_INACTIVE","Inativo");
define("_AM_NEWBB_STATE","Situação:");
define("_AM_NEWBB_CATEGORYDESC","Descrição:");
define("_AM_NEWBB_SHOWDESC","Exibir descrição?");
define("_AM_NEWBB_IMAGE","Imagem:");
//define("_AM_NEWBB_SPONSORIMAGE","Imagem do patrocinador:");
define("_AM_NEWBB_SPONSORLINK","Link do patrocinador:");
define("_AM_NEWBB_DELCAT","Excluir categoria");
define("_AM_NEWBB_WAYSYWTDTTAL","Nota: Isto NÃO irá excluir os fóruns desta categoria, para isso você deverá usar o Gerenciador de Fóruns.<br /><br />ATENÇÃO: Você tem certeza que quer excluir esta categoria?");



//%%%%%%        File Name  admin_forums.php           %%%%%
define("_AM_NEWBB_FORUMNAME","Nome do fórum:");
define("_AM_NEWBB_FORUMDESCRIPTION","Descrição do fórum:");
define("_AM_NEWBB_MODERATOR","Moderador(s):");
define("_AM_NEWBB_REMOVE","Excluir");
define("_AM_NEWBB_CATEGORY","Categoria:");
define("_AM_NEWBB_DATABASEERROR","Erro no banco de dados ");
define("_AM_NEWBB_CATEGORYUPDATED","Categoria atualizada.");
define("_AM_NEWBB_EDITCATEGORY","Editando categoria:");
define("_AM_NEWBB_CATEGORYTITLE","Título da categoria:");
define("_AM_NEWBB_CATEGORYCREATED","Categoria criada.");
define("_AM_NEWBB_CREATENEWCATEGORY","Incluir categoria");
define("_AM_NEWBB_FORUMCREATED","Fórum criado.");
define("_AM_NEWBB_ACCESSLEVEL","Nível de acesso:");
define("_AM_NEWBB_CATEGORY1","Categoria");
define("_AM_NEWBB_FORUMUPDATE","Fórum atualizado");
define("_AM_NEWBB_FORUM_ERROR","ERRO: Erro na configuração de fórum");
define("_AM_NEWBB_CLICKBELOWSYNC","Clicar no botão abaixo irá sincronizar seus fóruns e as páginas de tópicos com os dados corretos do banco de dados. Use esta seção toda vez que verificar falhas nas listas de tópicos ou fóruns.");
define("_AM_NEWBB_SYNCHING","Sincronizando o índice do fórum e tópicos (pode demorar alguns minutos)");
define("_AM_NEWBB_CATEGORYDELETED","Categoria excluída.");
define("_AM_NEWBB_MOVE2CAT","Mover para categoria:");
define("_AM_NEWBB_MAKE_SUBFORUM_OF","Faça subfórum de:");
define("_AM_NEWBB_MSG_FORUM_MOVED","Fórum movido!");
define("_AM_NEWBB_MSG_ERR_FORUM_MOVED","Erro ao mover fórum.");
define("_AM_NEWBB_SELECT","< Selecione >");
define("_AM_NEWBB_MOVETHISFORUM","Mover este fórum");
define("_AM_NEWBB_MERGE","Combinar");
define("_AM_NEWBB_MERGETHISFORUM","Combinar este fórum");
define("_AM_NEWBB_MERGETO_FORUM","Combinar este fórum com:");
define("_AM_NEWBB_MSG_FORUM_MERGED","Fórum combinado!");
define("_AM_NEWBB_MSG_ERR_FORUM_MERGED","Erro ao combinar fórum.");

//%%%%%%        File Name  admin_forum_reorder.php           %%%%%
define("_AM_NEWBB_REORDERID","Id");
define("_AM_NEWBB_REORDERTITLE","Título");
define("_AM_NEWBB_REORDERWEIGHT","Posição");
define("_AM_NEWBB_SETFORUMORDER","Reordenar Categorias/Fóruns");
define("_AM_NEWBB_BOARDREORDER","As categorias e os fóruns foram reordenados corretamente");

// forum_access.php
define("_AM_NEWBB_PERMISSIONS_TO_THIS_FORUM","Permissões de tópico para este fórum");
define("_AM_NEWBB_CAT_ACCESS","Acesso a categoria");
define("_AM_NEWBB_CAN_ACCESS","Pode acessar");
define("_AM_NEWBB_CAN_VIEW","Pode ler");
define("_AM_NEWBB_CAN_POST","Pode iniciar um tópico");
define("_AM_NEWBB_CAN_REPLY","Pode responder");
define("_AM_NEWBB_CAN_EDIT","Pode editar");
define("_AM_NEWBB_CAN_DELETE","Pode excluir");
define("_AM_NEWBB_CAN_ADDPOLL","Pode incluir votações");
define("_AM_NEWBB_CAN_VOTE","Pode votar");
define("_AM_NEWBB_CAN_ATTACH","Pode anexar arquivos");
define("_AM_NEWBB_CAN_NOAPPROVE","Pode enviar mensagens sem aprovação");
define("_AM_NEWBB_ACTION","Ação");

// admin_forum_prune.php

define ("_AM_NEWBB_PRUNE_RESULTS_TITLE","Resultados do Expurgo");
define ("_AM_NEWBB_PRUNE_RESULTS_TOPICS","Tópicos expurgados");
define ("_AM_NEWBB_PRUNE_RESULTS_POSTS","Mensagens expurgadas");
define ("_AM_NEWBB_PRUNE_RESULTS_FORUMS","Fóruns expurgados");
define ("_AM_NEWBB_PRUNE_STORE","Armazenar as mensagens neste fórum até que ele seja excluído");
define ("_AM_NEWBB_PRUNE_ARCHIVE","Copiar estas mensagens no arquivo");
define ("_AM_NEWBB_PRUNE_FORUMSELERROR","Você não selecionou o(s) fórum(s) para expurgo");

define ("_AM_NEWBB_PRUNE_DAYS","Expurgue tópicos sem respostas a:");
define ("_AM_NEWBB_PRUNE_FORUMS","Fóruns a serem expurgados");
define ("_AM_NEWBB_PRUNE_STICKY","Manter tópicos fixos");
define ("_AM_NEWBB_PRUNE_DIGEST","Manter informativo dos tópicos");
define ("_AM_NEWBB_PRUNE_LOCK","Manter tópicos bloqueados");
define ("_AM_NEWBB_PRUNE_HOT","Manter tópicos com mais de 'x' repostas");
define ("_AM_NEWBB_PRUNE_SUBMIT","OK");
define ("_AM_NEWBB_PRUNE_RESET","Limpar");
define ("_AM_NEWBB_PRUNE_YES","Sim");
define ("_AM_NEWBB_PRUNE_NO","Não");
define ("_AM_NEWBB_PRUNE_WEEK","1 semana");
define ("_AM_NEWBB_PRUNE_2WEEKS","2 semanas");
define ("_AM_NEWBB_PRUNE_MONTH","1 mês");
define ("_AM_NEWBB_PRUNE_2MONTH","2 meses");
define ("_AM_NEWBB_PRUNE_4MONTH","4 meses");
define ("_AM_NEWBB_PRUNE_YEAR","1 ano");
define ("_AM_NEWBB_PRUNE_2YEARS","2 anos");

// About.php constants
define('_AM_NEWBB_AUTHOR_INFO', "Informações sobre o desenvolvedor");
define('_AM_NEWBB_AUTHOR_NAME', "Nome");
define('_AM_NEWBB_AUTHOR_WEBSITE', "Site");
define('_AM_NEWBB_AUTHOR_EMAIL', "e-mail");
define('_AM_NEWBB_AUTHOR_CREDITS', "Créditos");
define('_AM_NEWBB_MODULE_INFO', "Informações do desenvolvimento do módulo");
define('_AM_NEWBB_MODULE_STATUS', "Situação");
define('_AM_NEWBB_MODULE_DEMO', "Site Demonstração do Módulo");
define('_AM_NEWBB_MODULE_SUPPORT', "Site de Suporte Oficial");
define('_AM_NEWBB_MODULE_BUG', "Relate um bug deste módulo");
define('_AM_NEWBB_MODULE_FEATURE', "Sugira uma nova característica para este módulo");
define('_AM_NEWBB_MODULE_DISCLAIMER', "Declaração de Isenção de Responsabilidade");
define('_AM_NEWBB_AUTHOR_WORD', "A palavra do desenvolvedor");
define('_AM_NEWBB_BY','por');
define('_AM_NEWBB_AUTHOR_WORD_EXTRA', "
");

// admin_report.php
define("_AM_NEWBB_REPORTADMIN","Gerenciador de Relatórios Enviados");
define("_AM_NEWBB_PROCESSEDREPORT","Exibir relatórios processados");
define("_AM_NEWBB_PROCESSREPORT","Relatórios processados");
define("_AM_NEWBB_REPORTTITLE","Título");
define("_AM_NEWBB_REPORTEXTRA","Extra");
define("_AM_NEWBB_REPORTPOST","Relatórios");
define("_AM_NEWBB_REPORTTEXT","Texto");
define("_AM_NEWBB_REPORTMEMO","Nota");

// admin_report.php
define("_AM_NEWBB_DIGESTADMIN","Gerenciador de Informativos");
define("_AM_NEWBB_DIGESTCONTENT","Conteúdo do Informativo");

// admin_votedata.php
define("_AM_NEWBB_VOTE_RATINGINFOMATION", "Enquetes");
define("_AM_NEWBB_VOTE_TOTALVOTES", "Total de votos: ");
define("_AM_NEWBB_VOTE_REGUSERVOTES", "Votos de usuários: %s");
define("_AM_NEWBB_VOTE_ANONUSERVOTES", "Votos de visitantes: %s");
define("_AM_NEWBB_VOTE_USER", "Usuário");
define("_AM_NEWBB_VOTE_IP", "IP");
define("_AM_NEWBB_VOTE_USERAVG", "Nota média");
define("_AM_NEWBB_VOTE_TOTALRATE", "N° de avaliações");
define("_AM_NEWBB_VOTE_DATE", "Data");
define("_AM_NEWBB_VOTE_RATING", "Avaliação");
define("_AM_NEWBB_VOTE_NOREGVOTES", "Nenhum voto de usuários");
define("_AM_NEWBB_VOTE_NOUNREGVOTES", "Nenhum voto de visitantes");
define("_AM_NEWBB_VOTEDELETED", "Avaliações excluídas.");
define("_AM_NEWBB_VOTE_ID", "Id");
define("_AM_NEWBB_VOTE_FILETITLE", "Tópico");
define("_AM_NEWBB_VOTE_DISPLAYVOTES", "Informações de Enquetes");
define("_AM_NEWBB_VOTE_NOVOTES", "Não há votos a exibir");
define("_AM_NEWBB_VOTE_DELETE", "Não há votos a excluir");
define("_AM_NEWBB_VOTE_DELETEDSC", "<strong>Exclui</strong> a avaliação escolhida do banco de dados.");
?>