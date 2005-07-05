<?php
// $Id: admin.php,v 1.1 2005/07/05 12:55:21 mauriciodelima Exp $
//%%%%%%	Admin Module Name  Articles 	%%%%%
define("_AM_DBUPDATED","As informa��es foram gravadas corretamente.");
define("_AM_CONFIG","Administra��o do m�dulo de not�cias");
define("_AM_AUTOARTICLES","Not�cias agendadas");
define("_AM_STORYID","N� identificador da not�cia");
define("_AM_TITLE","T�tulo");
define("_AM_TOPIC","Assunto");
define("_AM_POSTER","Enviado por");
define("_AM_PROGRAMMED","Agendar para ser p�blicada em");
define("_AM_ACTION","A��o");
define("_AM_EDIT","Editar");
define("_AM_DELETE","Remover");
define("_AM_LAST10ARTS","As �ltimas %d not�cias");
define("_AM_PUBLISHED","Publicada em"); // Published Date
define("_AM_GO","Prosseguir");
define("_AM_EDITARTICLE","Editar not�cia");
define("_AM_POSTNEWARTICLE","Publicar uma nova not�cia");
define("_AM_ARTPUBLISHED","A sua not�cia foi publicada.");
define("_AM_HELLO","%s,");
define("_AM_YOURARTPUB","Uma not�cia enviada por voc� foi publicada em nosso site.");
define("_AM_TITLEC","T�tulo:");
define("_AM_URLC","Endere�o:");
define("_AM_PUBLISHEDC","Publicado:");
define("_AM_RUSUREDEL","Voc� tem certeza de que deseja remover esta not�cia e todos os seus respectivos coment�rios?");
define("_AM_YES","Sim");
define("_AM_NO","N�o");
define("_AM_INTROTEXT","Texto introdut�rio");
define("_AM_EXTEXT","Texto complementar");
define("_AM_ALLOWEDHTML","C�digos html permitidos:");
define("_AM_DISAMILEY","Desabilitar emoticons");
define("_AM_DISHTML","Desabilitar HTML");
define("_AM_APPROVE","Aprovar");
define("_AM_MOVETOTOP","Mover esta not�cia ao topo");
define("_AM_CHANGEDATETIME","Modificar a data/hora de publica��o");
define("_AM_NOWSETTIME","Agora est� definida para: %s"); // %s is datetime of publish
define("_AM_CURRENTTIME","Defini��o atual: %s");  // %s is the current datetime
define("_AM_SETDATETIME","Definir data/hora para publica��o");
define("_AM_MONTHC","M�s:");
define("_AM_DAYC","Dia:");
define("_AM_YEARC","Ano:");
define("_AM_TIMEC","Hora:");
define("_AM_PREVIEW","Mostrar");
define("_AM_SAVE","Gravar");
define("_AM_PUBINHOME","Publicar na p�gina principal?");
define("_AM_ADD","Incluir");

//%%%%%%	Admin Module Name  Topics 	%%%%%

define("_AM_ADDMTOPIC","Incluir um assunto principal");
define("_AM_TOPICNAME","Nome do assunto");
// Warning, changed from 40 to 255 characters.
define("_AM_MAX40CHAR","(m�ximo de 40 caracteres)");
define("_AM_TOPICIMG","�cone do assunto");
define("_AM_IMGNAEXLOC","Nome do arquivo da imagem, que dever� estar em %s");
define("_AM_FEXAMPLE","por exemplo: jogos.gif");
define("_AM_ADDSUBTOPIC","Incluir um sub-assunto");
define("_AM_IN","em");
define("_AM_MODIFYTOPIC","Modificar assunto");
define("_AM_MODIFY","Modificar");
define("_AM_PARENTTOPIC","Assunto principal");
define("_AM_SAVECHANGE","Gravar as altera��es");
define("_AM_DEL","Remover");
define("_AM_CANCEL","Cancelar");
define("_AM_WAYSYWTDTTAL","Aten��o: voc� tem certeza de que deseja remover este assunto e todas as suas respectivas not�cias e coment�rios?");


// Added in Beta6
define("_AM_TOPICSMNGR","Gerenciamento dos assuntos");
define("_AM_PEARTICLES","Publicar ou editar not�cias");
define("_AM_NEWSUB","Novas contribui��es");
define("_AM_POSTED","Enviado");
define("_AM_GENERALCONF","Configura��es gerais");

// Added in RC2
define("_AM_TOPICDISPLAY","Mostrar o �cone do assunto?");
define("_AM_TOPICALIGN","Posi��o");
define("_AM_RIGHT","Direita");
define("_AM_LEFT","Esquerda");

define("_AM_EXPARTS","Not�cias expiradas");
define("_AM_EXPIRED","Expirou");
define("_AM_CHANGEEXPDATETIME","Modificar o tempo de validade");
define("_AM_SETEXPDATETIME","Definir data/hora de validade");
define("_AM_NOWSETEXPTIME","Est� defenida para: %s");

// Added in RC3
define("_AM_ERRORTOPICNAME", "� necess�rio que voc� nomeie o assunto.");
define("_AM_EMPTYNODELETE", "N�o h� nada a ser apagado.");

// Added 240304 (Mithrandir)
define('_AM_GROUPPERM', 'Quem poder� publicar e aprovar as not�cias?');
define('_AM_SELFILE','Selecionar arquivo');

// Added by Herv�
define('_AM_UPLOAD_DBERROR_SAVE','Houve um problema ao tentar anexar o arquivo.');
define('_AM_UPLOAD_ERROR','Erro ao enviar o arquivo.');
define('_AM_UPLOAD_ATTACHFILE','Arquivo(s) anexado(s)');
define('_AM_APPROVEFORM', 'Quem poder� aprovar as not�cias envidas?');
define('_AM_SUBMITFORM', 'Quem poder� enviar not�cias?');
define('_AM_VIEWFORM', 'Quem poder� ver as not�cias?');
define('_AM_APPROVEFORM_DESC', 'Selecione quem poder� autorizar a publica��o das not�cias');
define('_AM_SUBMITFORM_DESC', 'Selecione quem poder� enviar not�cias');
define('_AM_VIEWFORM_DESC', 'Selecione quem poder� ver estes assuntos');
define('_AM_DELETE_SELFILES', 'Remover os arquivos selecionados');
define('_AM_TOPIC_PICTURE', 'Incluir uma ilustra��o');
define('_AM_UPLOAD_WARNING', '<B>Aviso, n�o esque�a de dar permiss�es a pasta : %s</B>');

define('_AM_NEWS_UPGRADECOMPLETE', 'Atualiza��o realizada corretamente.');
define('_AM_NEWS_UPDATEMODULE', 'Atualiza os templates e os blocos do m�dulo');
define('_AM_NEWS_UPGRADEFAILED', 'Houve uma falha ao tentar atualizar.');
define('_AM_NEWS_UPGRADE', 'Atualizar');
define('_AM_ADD_TOPIC','Adiciona um topico');
define('_AM_ADD_TOPIC_ERROR','Erro, topico j� existe');
define('_AM_ADD_TOPIC_ERROR1','ERRO: Imposs�vel selecionar este topico de um topico superior!');
define('_AM_SUB_MENU','Publicar esse topico como um sub menu');
define('_AM_SUB_MENU_YESNO','Sub-menu?');
define('_AM_HITS', 'Leituras');
define('_AM_CREATED', 'Criado');

define('_AM_TOPIC_DESCR', "Descri��o do t�pico");
define('_AM_USERS_LIST', "Lista de usu�rios");
define('_AM_PUBLISH_FRONTPAGE', "Publicar na pagina principal?");
define('_AM_NEWS_UPGRADEFAILED1', 'Imposs�vel criar a tabela de est�rias_arquivos');
define('_AM_NEWS_UPGRADEFAILED2', "Imposs�vel mudar o tamanho do titulo do topico");
define('_AM_NEWS_UPGRADEFAILED21', "Imposs�vel adicionar o novo campo a tabela de topicos");
define('_AM_NEWS_UPGRADEFAILED3', 'Imposs�vel criar a tabela estorias_dadosvoto');
define('_AM_NEWS_UPGRADEFAILED4', "Imposs�vel criar os dois campos ");
define('_AM_NEWS_UPGRADEFAILED0', "Por favor, preste aten��o nas mensagens e tente corrigir os problemas com phpMyadmin e as defini��es de sql dispon�veis na pasta ");
define('_AM_NEWS_UPGR_ACCESS_ERROR',"Erro, para usar o script de upgrade, voc� precisa ser um admin deste modulo");
define('_AM_NEWS_PRUNE_BEFORE',"Est�rias cortadas que foram publicadas antes");
define('_AM_NEWS_PRUNE_EXPIREDONLY',"Apenas remova est�rias que estejam expiradas");
define('_AM_NEWS_PRUNE_CONFIRM',"Cuidado, voc� est� para remover est�rias que foram publicadas %s permantentemente (n�o pode ser desfeito). Isto representa %s est�rias.<br />Tem certeza?");
define('_AM_NEWS_PRUNE_TOPICS',"Limite para os seguintes t�picos");
define('_AM_NEWS_PRUNENEWS', 'Est�rias cortadas');
define('_AM_NEWS_EXPORT_NEWS', 'Exportar noticias');
define('_AM_NEWS_EXPORT_NOTHING', "Sinto muito mas n�o existe nada para exportat, por favor verifique seus crit�rios");
define('_AM_NEWS_PRUNE_DELETED', '%d not�cias deletadas');
define('_AM_NEWS_PERM_WARNING', '<h2>Cuidado, voc� tem 3 formularios ent�o voc� tem tamb�m 3 bot�es de enviar</h2>');
define('_AM_NEWS_EXPORT_BETWEEN', 'Exportar not�cias publicadas entre');
define('_AM_NEWS_EXPORT_AND', ' e');
define('_AM_NEWS_EXPORT_PRUNE_DSC', "Se voc� n�o selecionar nada ent�o todos os topicos ser�o usados<br/> ou apenas os topicos selecionados ser�o usados");
define('_AM_NEWS_EXPORT_INCTOPICS', 'Incluir defini��es de topicos');
define('_AM_NEWS_EXPORT_ERROR', 'Erro ao tentar criar o aquivo %s. Opera��o interrompida.');
define('_AM_NEWS_EXPORT_READY', "Seu arquivo de exporta��o de xml est� pronto para download. <br /><a href='%s'>Clique neste link para o download</a>.<br />N�o se esque�a de <a href='%s'>remover-lo</a> assim que tiver feito o download.");
define('_AM_NEWS_RSS_URL', "URL do RSS feed");
define('_AM_NEWS_NEWSLETTER', "Boletim informativo");
define('_AM_NEWS_NEWSLETTER_BETWEEN', 'Selecionar noticias publicadas entre');
define('_AM_NEWS_NEWSLETTER_READY', "Seu arquivo de boletim informativo est� pronto para download. <br /><a href='%s'>Clique neste link para o download</a>.<br />N�o se esque�a de <a href='%s'>remover-lo</a> assim que tiver feito o download.");
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
define("_AM_NEWS_GENERALSET", "Configura��o do modulo" );
define('_AM_NEWS_GOTOMOD','Ir ao modulo');
define('_AM_NEWS_NOTHING',"Sinto mas n�o h� nada para download, verifique seus crit�rios!");
define('_AM_NEWS_NOTHING_PRUNE',"Sinto mas nao h� not�cias para cortar, verifique seus crit�rios!");
define('_AM_NEWS_TOPIC_COLOR',"Cores dos Topicos");
define('_AM_NEWS_COLOR',"Cor");
define('_AM_NEWS_REMOVE_BR',"Converter a tag html &lt;br&gt; para uma nova linha?");
// Added in 1.3 RC2
define('_AM_NEWS_PLEASE_UPGRADE',"<a href='upgrade.php'><font color='#FF0000'>Por favor atualize o modulo!</font></a>");
?>
