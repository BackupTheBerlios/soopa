<?php
// $Id: admin.php,v 1.2 2005/07/09 18:19:21 mauriciodelima Exp $
//%%%%%%	Admin Module Name  Articles 	%%%%%
define("_AM_DBUPDATED","As informações foram gravadas corretamente.");
define("_AM_CONFIG","ADMINISTRAÇÃO DO MÓDULO DE NOTÍCIAS");
define("_AM_AUTOARTICLES","Notícias agendadas");
define("_AM_STORYID","Nº identificador da notícia");
define("_AM_TITLE","Título");
define("_AM_TOPIC","Tópico");
define("_AM_POSTER","Enviado por");
define("_AM_PROGRAMMED","Agendar para ser públicada em");
define("_AM_ACTION","Ação");
define("_AM_EDIT","Editar");
define("_AM_DELETE","Remover");
define("_AM_LAST10ARTS","As %d últimas notícias publicadas");
define("_AM_PUBLISHED","Publicada em"); // Published Date
define("_AM_GO","Prosseguir");
define("_AM_EDITARTICLE","Editar notícia");
define("_AM_POSTNEWARTICLE","Publicar uma nova notícia");
define("_AM_ARTPUBLISHED","A sua notícia foi publicada.");
define("_AM_HELLO","%s,");
define("_AM_YOURARTPUB","Uma notícia enviada por você foi publicada em nosso site.");
define("_AM_TITLEC","Título:");
define("_AM_URLC","Endereço:");
define("_AM_PUBLISHEDC","Publicado:");
define("_AM_RUSUREDEL","Você tem certeza de que deseja remover esta notícia e todos os seus respectivos comentários?");
define("_AM_YES","Sim");
define("_AM_NO","Não");
define("_AM_INTROTEXT","Texto introdutório");
define("_AM_EXTEXT","Continuação");
define("_AM_ALLOWEDHTML","Códigos html permitidos:");
define("_AM_DISAMILEY","Desabilitar emoticons");
define("_AM_DISHTML","Desabilitar HTML");
define("_AM_APPROVE","Aprovar");
define("_AM_MOVETOTOP","Mover esta notícia ao topo");
define("_AM_CHANGEDATETIME","Modificar a data/hora de publicação");
define("_AM_NOWSETTIME","Agora está definida para: %s"); // %s is datetime of publish
define("_AM_CURRENTTIME","Definição atual: %s");  // %s is the current datetime
define("_AM_SETDATETIME","Definir data/hora para publicação");
define("_AM_MONTHC","Mês:");
define("_AM_DAYC","Dia:");
define("_AM_YEARC","Ano:");
define("_AM_TIMEC","Hora:");
define("_AM_PREVIEW","Mostrar");
define("_AM_SAVE","Gravar");
define("_AM_PUBINHOME","Publicar na página principal?");
define("_AM_ADD","Incluir");

//%%%%%%	Admin Module Name  Topics 	%%%%%

define("_AM_ADDMTOPIC","Incluir um tópico principal");
define("_AM_TOPICNAME","Nome do tópico");
// Warning, changed from 40 to 255 characters.
define("_AM_MAX40CHAR","(máximo de 40 caracteres)");
define("_AM_TOPICIMG","Ícone do tópico");
define("_AM_IMGNAEXLOC","Imagem em %s");
define("_AM_FEXAMPLE","por exemplo: jogos.gif");
define("_AM_ADDSUBTOPIC","Incluir um sub-tópico");
define("_AM_IN","em");
define("_AM_MODIFYTOPIC","Modificar tópico");
define("_AM_MODIFY","Modificar");
define("_AM_PARENTTOPIC","Tópico principal");
define("_AM_SAVECHANGE","Gravar as alterações");
define("_AM_DEL","Remover");
define("_AM_CANCEL","Cancelar");
define("_AM_WAYSYWTDTTAL","Atenção: você tem certeza de que deseja remover este tópico e todas as suas respectivas notícias e comentários?");


// Added in Beta6
define("_AM_TOPICSMNGR","Tópicos");
define("_AM_PEARTICLES","Publicar ou editar notícias");
define("_AM_NEWSUB","Novas contribuições");
define("_AM_POSTED","Enviado");
define("_AM_GENERALCONF","Configurações gerais");

// Added in RC2
define("_AM_TOPICDISPLAY","Exibir a imagem do tópico?");
define("_AM_TOPICALIGN","Alinhamento da imagem");
define("_AM_RIGHT","Direita");
define("_AM_LEFT","Esquerda");

define("_AM_EXPARTS","Notícias expiradas");
define("_AM_EXPIRED","Expirou");
define("_AM_CHANGEEXPDATETIME","Modificar o tempo de validade");
define("_AM_SETEXPDATETIME","Definir data/hora de expiração");
define("_AM_NOWSETEXPTIME","Está defenida para: %s");

// Added in RC3
define("_AM_ERRORTOPICNAME", "É necessário que você nomeie o tópico.");
define("_AM_EMPTYNODELETE", "Não há nada a ser apagado.");

// Added 240304 (Mithrandir)
define('_AM_GROUPPERM', 'Quem poderá publicar e aprovar as notícias?');
define('_AM_SELFILE','Anexo');

// Added by Hervé
define('_AM_UPLOAD_DBERROR_SAVE','Houve um problema ao tentar anexar o arquivo.');
define('_AM_UPLOAD_ERROR','Erro ao enviar o arquivo.');
define('_AM_UPLOAD_ATTACHFILE','Arquivo(s) anexado(s)');
define('_AM_APPROVEFORM', 'Quem aprovará as notícias?');
define('_AM_SUBMITFORM', 'Quem publicará as notícias?');
define('_AM_VIEWFORM', 'Quem acessará as notícias?');
define('_AM_APPROVEFORM_DESC', 'Selecione os tópicos em que os grupos de usuários aprovarão as notícias enviadas.<br/>');
define('_AM_SUBMITFORM_DESC', 'Selecione os tópicos em que os grupos de usuários publicarão as notícias.<br/>');
define('_AM_VIEWFORM_DESC', 'Selecione os tópicos em que os grupos de usuários acessarão as notícias.<br/>');
define('_AM_DELETE_SELFILES', 'Excluir os arquivos selecionados');
define('_AM_TOPIC_PICTURE', 'Enviar uma imagem');
define('_AM_UPLOAD_WARNING', '<i>Aviso, não esqueça de atribuir CHMOD 777 em : %s</i>');

define('_AM_NEWS_UPGRADECOMPLETE', 'Atualização realizada corretamente.');
define('_AM_NEWS_UPDATEMODULE', 'Atualiza os templates e os blocos do módulo');
define('_AM_NEWS_UPGRADEFAILED', 'Houve uma falha ao tentar atualizar.');
define('_AM_NEWS_UPGRADE', 'Atualizar');
define('_AM_ADD_TOPIC','Incluir um novo tópico');
define('_AM_ADD_TOPIC_ERROR','Erro, topico já existe');
define('_AM_ADD_TOPIC_ERROR1','ERRO: Impossível selecionar este topico de um topico superior!');
define('_AM_SUB_MENU','Publicar como sub-menu');
define('_AM_SUB_MENU_YESNO','Sub-menu?');
define('_AM_HITS', 'Leituras');
define('_AM_CREATED', 'Criado');

define('_AM_TOPIC_DESCR', "Descrição do tópico");
define('_AM_USERS_LIST', "Lista de usuários");
define('_AM_PUBLISH_FRONTPAGE', "Publicar na pagina principal?");
define('_AM_NEWS_UPGRADEFAILED1', 'Impossível criar a tabela de estórias_arquivos');
define('_AM_NEWS_UPGRADEFAILED2', "Impossível mudar o tamanho do titulo do topico");
define('_AM_NEWS_UPGRADEFAILED21', "Impossível adicionar o novo campo a tabela de topicos");
define('_AM_NEWS_UPGRADEFAILED3', 'Impossível criar a tabela estorias_dadosvoto');
define('_AM_NEWS_UPGRADEFAILED4', "Impossível criar os dois campos ");
define('_AM_NEWS_UPGRADEFAILED0', "Por favor, preste atenção nas mensagens e tente corrigir os problemas com phpMyadmin e as definições de sql disponíveis na pasta ");
define('_AM_NEWS_UPGR_ACCESS_ERROR',"Erro, para usar o script de upgrade, você precisa ser um admin deste modulo");
define('_AM_NEWS_PRUNE_BEFORE',"Excluir notícias com data de publicação anterior a:");
define('_AM_NEWS_PRUNE_EXPIREDONLY',"Excluir somente notícias expiradas");
define('_AM_NEWS_PRUNE_CONFIRM',"Cuidado, você está para remover estórias que foram publicadas %s permantentemente (não pode ser desfeito). Isto representa %s estórias.<br />Tem certeza?");
define('_AM_NEWS_PRUNE_TOPICS',"Selecionar os tópicos:");
define('_AM_NEWS_PRUNENEWS', 'Exclusões de Nóticas Públicadas');
define('_AM_NEWS_EXPORT_NEWS', 'Exportar Noticias Públicadas');
define('_AM_NEWS_EXPORT_NOTHING', "Sinto muito mas não existe nada para exportat, por favor verifique seus critérios");
define('_AM_NEWS_PRUNE_DELETED', '%d notícias deletadas');
define('_AM_NEWS_PERM_WARNING', '<h2>Cuidado, você tem 3 formularios então você tem também 3 botões de enviar</h2>');
define('_AM_NEWS_EXPORT_BETWEEN', 'Exportar notícias publicadas entre');
define('_AM_NEWS_EXPORT_AND', ' e');
define('_AM_NEWS_EXPORT_PRUNE_DSC', "1) Nenhum selecionado: todos os topicos serão usados<br/> 2) Selecione os topicos que serão usados");
define('_AM_NEWS_EXPORT_INCTOPICS', 'Incluir Descrição de topicos');
define('_AM_NEWS_EXPORT_ERROR', 'Erro ao tentar criar o aquivo %s. Operação interrompida.');
define('_AM_NEWS_EXPORT_READY', "Seu arquivo de exportação de xml está pronto para download. <br /><a href='%s'>Clique neste link para o download</a>.<br />Não se esqueça de <a href='%s'>remover-lo</a> assim que tiver feito o download.");
define('_AM_NEWS_RSS_URL', "URL do RSS feed");
define('_AM_NEWS_NEWSLETTER', "Informativo de Notícias Publicadas");
define('_AM_NEWS_NEWSLETTER_BETWEEN', 'Selecionar noticias publicadas entre');
define('_AM_NEWS_NEWSLETTER_READY', "Seu arquivo de informativo está pronto para download. <br /><a href='%s'>Clique neste link para o download</a>.<br />Não se esqueça de <a href='%s'>remover-lo</a> assim que tiver feito o download.");
define('_AM_NEWS_DELETED_OK',"Arquivo deletado com sucesso");
define('_AM_NEWS_DELETED_PB',"Houve um problema ao deletar esse arquivo");
define('_AM_NEWS_STATS0','ESTATÍSTICAS DOS TÓPICOS');
define('_AM_NEWS_STATS','Estatisticas');
define('_AM_NEWS_STATS1','Autores raros');
define('_AM_NEWS_STATS2','Total');
define('_AM_NEWS_STATS3','ESTATÍSTICAS DE NOTÍCIAS');
define('_AM_NEWS_STATS4','Notícias mais lidas');
define('_AM_NEWS_STATS5','Notícias menos lidas');
define('_AM_NEWS_STATS6','Notícias melhor avaliadas');
define('_AM_NEWS_STATS7','Autores mais lidos');
define('_AM_NEWS_STATS8','Autores melhor avaliados');
define('_AM_NEWS_STATS9','Autores mais ativos');
define('_AM_NEWS_STATS10','ESTATÍSTICAS DE AUTORES');
define('_AM_NEWS_STATS11',"Contagem de artigos");
define('_AM_NEWS_HELP',"Ajuda");
define("_AM_NEWS_MODULEADMIN","Administração");
define("_AM_NEWS_GENERALSET", "Configurações gerais" );
define('_AM_NEWS_GOTOMOD','Visitar Módulo');
define('_AM_NEWS_NOTHING',"Sinto mas não há nada para download, verifique seus critérios!");
define('_AM_NEWS_NOTHING_PRUNE',"Desculpe, não foi possível excluir noticias com esse critério!");
define('_AM_NEWS_TOPIC_COLOR',"Cor do Tópico");
define('_AM_NEWS_COLOR',"Cor");
define('_AM_NEWS_REMOVE_BR',"Converter a tag html &lt;br&gt; para uma nova linha?");
// Added in 1.3 RC2
define('_AM_NEWS_PLEASE_UPGRADE',"<a href='upgrade.php'><font color='#FF0000'>Por favor atualize o modulo!</font></a>");
?>
