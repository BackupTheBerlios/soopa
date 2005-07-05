<?php
// $Id: admin.php,v 1.1 2005/07/05 12:55:21 mauriciodelima Exp $
//%%%%%%	Admin Module Name  Articles 	%%%%%
define("_AM_DBUPDATED","As informações foram gravadas corretamente.");
define("_AM_CONFIG","Administração do módulo de notícias");
define("_AM_AUTOARTICLES","Notícias agendadas");
define("_AM_STORYID","Nº identificador da notícia");
define("_AM_TITLE","Título");
define("_AM_TOPIC","Assunto");
define("_AM_POSTER","Enviado por");
define("_AM_PROGRAMMED","Agendar para ser públicada em");
define("_AM_ACTION","Ação");
define("_AM_EDIT","Editar");
define("_AM_DELETE","Remover");
define("_AM_LAST10ARTS","As últimas %d notícias");
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
define("_AM_EXTEXT","Texto complementar");
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

define("_AM_ADDMTOPIC","Incluir um assunto principal");
define("_AM_TOPICNAME","Nome do assunto");
// Warning, changed from 40 to 255 characters.
define("_AM_MAX40CHAR","(máximo de 40 caracteres)");
define("_AM_TOPICIMG","Ícone do assunto");
define("_AM_IMGNAEXLOC","Nome do arquivo da imagem, que deverá estar em %s");
define("_AM_FEXAMPLE","por exemplo: jogos.gif");
define("_AM_ADDSUBTOPIC","Incluir um sub-assunto");
define("_AM_IN","em");
define("_AM_MODIFYTOPIC","Modificar assunto");
define("_AM_MODIFY","Modificar");
define("_AM_PARENTTOPIC","Assunto principal");
define("_AM_SAVECHANGE","Gravar as alterações");
define("_AM_DEL","Remover");
define("_AM_CANCEL","Cancelar");
define("_AM_WAYSYWTDTTAL","Atenção: você tem certeza de que deseja remover este assunto e todas as suas respectivas notícias e comentários?");


// Added in Beta6
define("_AM_TOPICSMNGR","Gerenciamento dos assuntos");
define("_AM_PEARTICLES","Publicar ou editar notícias");
define("_AM_NEWSUB","Novas contribuições");
define("_AM_POSTED","Enviado");
define("_AM_GENERALCONF","Configurações gerais");

// Added in RC2
define("_AM_TOPICDISPLAY","Mostrar o ícone do assunto?");
define("_AM_TOPICALIGN","Posição");
define("_AM_RIGHT","Direita");
define("_AM_LEFT","Esquerda");

define("_AM_EXPARTS","Notícias expiradas");
define("_AM_EXPIRED","Expirou");
define("_AM_CHANGEEXPDATETIME","Modificar o tempo de validade");
define("_AM_SETEXPDATETIME","Definir data/hora de validade");
define("_AM_NOWSETEXPTIME","Está defenida para: %s");

// Added in RC3
define("_AM_ERRORTOPICNAME", "É necessário que você nomeie o assunto.");
define("_AM_EMPTYNODELETE", "Não há nada a ser apagado.");

// Added 240304 (Mithrandir)
define('_AM_GROUPPERM', 'Quem poderá publicar e aprovar as notícias?');
define('_AM_SELFILE','Selecionar arquivo');

// Added by Hervé
define('_AM_UPLOAD_DBERROR_SAVE','Houve um problema ao tentar anexar o arquivo.');
define('_AM_UPLOAD_ERROR','Erro ao enviar o arquivo.');
define('_AM_UPLOAD_ATTACHFILE','Arquivo(s) anexado(s)');
define('_AM_APPROVEFORM', 'Quem poderá aprovar as notícias envidas?');
define('_AM_SUBMITFORM', 'Quem poderá enviar notícias?');
define('_AM_VIEWFORM', 'Quem poderá ver as notícias?');
define('_AM_APPROVEFORM_DESC', 'Selecione quem poderá autorizar a publicação das notícias');
define('_AM_SUBMITFORM_DESC', 'Selecione quem poderá enviar notícias');
define('_AM_VIEWFORM_DESC', 'Selecione quem poderá ver estes assuntos');
define('_AM_DELETE_SELFILES', 'Remover os arquivos selecionados');
define('_AM_TOPIC_PICTURE', 'Incluir uma ilustração');
define('_AM_UPLOAD_WARNING', '<B>Aviso, não esqueça de dar permissões a pasta : %s</B>');

define('_AM_NEWS_UPGRADECOMPLETE', 'Atualização realizada corretamente.');
define('_AM_NEWS_UPDATEMODULE', 'Atualiza os templates e os blocos do módulo');
define('_AM_NEWS_UPGRADEFAILED', 'Houve uma falha ao tentar atualizar.');
define('_AM_NEWS_UPGRADE', 'Atualizar');
define('_AM_ADD_TOPIC','Adiciona um topico');
define('_AM_ADD_TOPIC_ERROR','Erro, topico já existe');
define('_AM_ADD_TOPIC_ERROR1','ERRO: Impossível selecionar este topico de um topico superior!');
define('_AM_SUB_MENU','Publicar esse topico como um sub menu');
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
define('_AM_NEWS_PRUNE_BEFORE',"Estórias cortadas que foram publicadas antes");
define('_AM_NEWS_PRUNE_EXPIREDONLY',"Apenas remova estórias que estejam expiradas");
define('_AM_NEWS_PRUNE_CONFIRM',"Cuidado, você está para remover estórias que foram publicadas %s permantentemente (não pode ser desfeito). Isto representa %s estórias.<br />Tem certeza?");
define('_AM_NEWS_PRUNE_TOPICS',"Limite para os seguintes tópicos");
define('_AM_NEWS_PRUNENEWS', 'Estórias cortadas');
define('_AM_NEWS_EXPORT_NEWS', 'Exportar noticias');
define('_AM_NEWS_EXPORT_NOTHING', "Sinto muito mas não existe nada para exportat, por favor verifique seus critérios");
define('_AM_NEWS_PRUNE_DELETED', '%d notícias deletadas');
define('_AM_NEWS_PERM_WARNING', '<h2>Cuidado, você tem 3 formularios então você tem também 3 botões de enviar</h2>');
define('_AM_NEWS_EXPORT_BETWEEN', 'Exportar notícias publicadas entre');
define('_AM_NEWS_EXPORT_AND', ' e');
define('_AM_NEWS_EXPORT_PRUNE_DSC', "Se você não selecionar nada então todos os topicos serão usados<br/> ou apenas os topicos selecionados serão usados");
define('_AM_NEWS_EXPORT_INCTOPICS', 'Incluir definições de topicos');
define('_AM_NEWS_EXPORT_ERROR', 'Erro ao tentar criar o aquivo %s. Operação interrompida.');
define('_AM_NEWS_EXPORT_READY', "Seu arquivo de exportação de xml está pronto para download. <br /><a href='%s'>Clique neste link para o download</a>.<br />Não se esqueça de <a href='%s'>remover-lo</a> assim que tiver feito o download.");
define('_AM_NEWS_RSS_URL', "URL do RSS feed");
define('_AM_NEWS_NEWSLETTER', "Boletim informativo");
define('_AM_NEWS_NEWSLETTER_BETWEEN', 'Selecionar noticias publicadas entre');
define('_AM_NEWS_NEWSLETTER_READY', "Seu arquivo de boletim informativo está pronto para download. <br /><a href='%s'>Clique neste link para o download</a>.<br />Não se esqueça de <a href='%s'>remover-lo</a> assim que tiver feito o download.");
define('_AM_NEWS_DELETED_OK',"Arquivo deletado com sucesso");
define('_AM_NEWS_DELETED_PB',"Houve um problema ao deletar esse arquivo");
define('_AM_NEWS_STATS0','Estatisticas dos topicos');
define('_AM_NEWS_STATS','Estatisticas');
define('_AM_NEWS_STATS1','Autores raros');
define('_AM_NEWS_STATS2','Total');
define('_AM_NEWS_STATS3','Estatisticas de artigos');
define('_AM_NEWS_STATS4','Artigos mais lidos');
define('_AM_NEWS_STATS5','Artigos menos lidos');
define('_AM_NEWS_STATS6','Artigos melhor avaliados');
define('_AM_NEWS_STATS7','Autores mais lidos');
define('_AM_NEWS_STATS8','Autores melhor avaliados');
define('_AM_NEWS_STATS9','Maiores contribuintes');
define('_AM_NEWS_STATS10','Estatisticas de autores');
define('_AM_NEWS_STATS11',"Contagem de artigos");
define('_AM_NEWS_HELP',"Ajuda");
define("_AM_NEWS_MODULEADMIN","Admin do modulo");
define("_AM_NEWS_GENERALSET", "Configuração do modulo" );
define('_AM_NEWS_GOTOMOD','Ir ao modulo');
define('_AM_NEWS_NOTHING',"Sinto mas não há nada para download, verifique seus critérios!");
define('_AM_NEWS_NOTHING_PRUNE',"Sinto mas nao há notícias para cortar, verifique seus critérios!");
define('_AM_NEWS_TOPIC_COLOR',"Cores dos Topicos");
define('_AM_NEWS_COLOR',"Cor");
define('_AM_NEWS_REMOVE_BR',"Converter a tag html &lt;br&gt; para uma nova linha?");
// Added in 1.3 RC2
define('_AM_NEWS_PLEASE_UPGRADE',"<a href='upgrade.php'><font color='#FF0000'>Por favor atualize o modulo!</font></a>");
?>
