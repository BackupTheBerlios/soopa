<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MB_LOADED' ) ) {



// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:33
define('_ALBM_LIDASC','Record Number (Bigger is latter)');
define('_ALBM_LIDDESC','Record Number (Smaller is latter)');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:56
define('_ALBM_BTN_SELECTALL','Selecionar Todos');
define('_ALBM_BTN_SELECTNONE','Deselecionar Todos');
define('_ALBM_BTN_SELECTRVS','Select Reverse');
define('_ALBM_FMT_PHOTONUM','%s imagens por p�gina');
define('_ALBM_AM_BUTTON_UPDATE','Modify');
define('_ALBM_NOIMAGESPECIFIED','Error: No photo is uploaded');
define('_ALBM_FILEREADERROR','Error: Photos are not readable.');
define('_ALBM_DIRECTCATSEL','Selecione uma categoria');

define( 'MYALBUM_MB_LOADED' , 1 ) ;

//%%%%%%		Module Name 'MyAlbum-P'		%%%%%

// New in MyAlbum-p

// only "Y/m/d" , "d M Y" , "M d Y" can be interpreted
define( "_ALBM_DTFMT_YMDHI" , "d M Y H:i" ) ;

define( "_ALBM_NEXT_BUTTON" , "Pr�ximo" ) ;
define( "_ALBM_REDOLOOPDONE" , "Feito." ) ;

define( "_ALBM_AM_ADMISSION" , "Autorizar Fotos" ) ;
define( "_ALBM_AM_ADMITTING" , "Foto(s) Autorizadas" ) ;
define( "_ALBM_AM_LABEL_ADMIT" , "Autorizar fotos que voc� verificou" ) ;
define( "_ALBM_AM_BUTTON_ADMIT" , "autorizar" ) ;
define( "_ALBM_AM_BUTTON_EXTRACT" , "extrair" ) ;

define( "_ALBM_AM_PHOTOMANAGER" , "Gerenciador de Foto" ) ;
define( "_ALBM_AM_PHOTONAVINFO" , "Foto no %s-%s (de um total de %s fotos)" ) ;
define( "_ALBM_AM_LABEL_REMOVE" , "Excluir imagens verificadas " ) ;
define( "_ALBM_AM_BUTTON_REMOVE" , "Excluir!" ) ;
define( "_ALBM_AM_JS_REMOVECONFIRM" , "Excluir OK?" ) ;
define( "_ALBM_AM_LABEL_MOVE" , "Mudar categoria das fotos verificadas" ) ;
define( "_ALBM_AM_BUTTON_MOVE" , "Mover" ) ;
define( "_ALBM_AM_DEADLINKMAINPHOTO" , "A imagem n�o existe" ) ;

define( "_ALBM_RADIO_ROTATETITLE" , "Rota��o de Imagem" ) ;
define( "_ALBM_RADIO_ROTATE0" , "sem rota��o" ) ;
define( "_ALBM_RADIO_ROTATE90" , "rotacionar � direita" ) ;
define( "_ALBM_RADIO_ROTATE180" , "rotacionar 180 graus" ) ;
define( "_ALBM_RADIO_ROTATE270" , "rotacionar � esquerda" ) ;


// New MyAlbum 1.0.1 (and 1.2.0)
define("_ALBM_MOREPHOTOS","Mais fotos de %s");
define("_ALBM_REDOTHUMBS","Voltar thumbnails (<a href='redothumbs.php'>re-come�ar</a>)");
define("_ALBM_REDOTHUMBSINFO","Tamanho muito grande. Pode ultrapassar o tempo limite.");
define("_ALBM_REDOTHUMBSNUMBER","N�mero thumbs por vez");
define("_ALBM_REDOING","Refazendo: ");
define("_ALBM_BACK","Voltar");
define("_ALBM_ADDPHOTO","Incluir Foto ");


// New MyAlbum 1.0.0
define("_ALBM_PHOTOBATCHUPLOAD","Incluir Imagem");
define("_ALBM_PHOTOUPLOAD","Inlcuir Imagem");
define("_ALBM_PHOTOEDITUPLOAD","Editar e Incluir Foto");
define("_ALBM_MAXPIXEL","Tamanho m�ximo do pixel");
define("_ALBM_MAXSIZE","Tamanho m�ximo do arquivo");
define("_ALBM_PHOTOTITLE","T�tulo");
define("_ALBM_PHOTOPATH","Caminho F�sico");
define("_ALBM_TEXT_DIRECTORY","Diret�rio");
define("_ALBM_DESC_PHOTOPATH","Caminho f�sico completo de onde est�o as fotos a serem inclu�das.");
define("_ALBM_MES_INVALIDDIRECTORY","O diret�rio especificado � inv�lido.");
define("_ALBM_MES_BATCHDONE","foram registradas %s foto(s).");
define("_ALBM_MES_BATCHNONE","N�o foram detectadas fotos neste diret�rio.");
define("_ALBM_PHOTODESC","Descri��o");
define("_ALBM_PHOTOCAT","Categoria");
define("_ALBM_SELECTFILE","Arquivo de Imagem");
define("_ALBM_FILEERROR","Foto n�o enviada ou a foto � muito grande");

define("_ALBM_BATCHBLANK","Deixe em branco se deseja usar o nome do arquivo como t�tulo.");
define("_ALBM_DELETEPHOTO","Excluir?");
define("_ALBM_VALIDPHOTO","Validar");
define("_ALBM_PHOTODEL","Excluir foto?");
define("_ALBM_DELETINGPHOTO","Foto exclu�da com sucesso!");
define("_ALBM_MOVINGPHOTO","Foto movida com sucesso!");

define("_ALBM_POSTERC","Poster: ");
define("_ALBM_DATEC","Data: ");
define("_ALBM_EDITNOTALLOWED","Voc� n�o est� autorizado � editar esse coment�rio!");
define("_ALBM_ANONNOTALLOWED","Usu�rios an�nimos n�o est�o autorizados a incluir.");
define("_ALBM_THANKSFORPOST","Obrigado pelo envio!");
define("_ALBM_DELNOTALLOWED","Voc� n�o est� autorizado para deletar esse coment�rio!");
define("_ALBM_GOBACK","Voltar");
define("_ALBM_AREYOUSURE","Voc� deseja mesmo deletar esse coment�rio e coment�rios abaixo desse?");
define("_ALBM_COMMENTSDEL","Coment�rios Deletados com Sucesso!");

// End New

define("_ALBM_THANKSFORINFO","Obrigado pela informa��o. Estaremos verificando seu pedido em breve.");
define("_ALBM_BACKTOTOP","Voltar ao topo");
define("_ALBM_THANKSFORHELP","Obrigado por ajudar a manter a integridade desse diret�rio.");
define("_ALBM_FORSECURITY","Por motivos de seguran�a seu nome de usu�rio e seu endere�o IP ser�o registrados.");

define("_ALBM_MATCH","Ocorr�ncia");
define("_ALBM_ALL","TUDO");
define("_ALBM_ANY","QUALQUER");
define("_ALBM_NAME","Nome");
define("_ALBM_DESCRIPTION","Descri��o");

define("_ALBM_MAIN","Geral");
define("_ALBM_NEW","Novo");
define("_ALBM_UPDATED","Atualizado");
define("_ALBM_POPULAR","Popular");
define("_ALBM_TOPRATED","Rankeado");

define("_ALBM_POPULARITYLTOM","Popularidade (Do menos popular ao mais popular)");
define("_ALBM_POPULARITYMTOL","Popularidade (Do mais popular ao menos popular)");
define("_ALBM_TITLEATOZ","T�tulo (de A a Z)");
define("_ALBM_TITLEZTOA","T�tulo (de Z a A)");
define("_ALBM_DATEOLD","Data (Fotos velhas primeiro)");
define("_ALBM_DATENEW","Date (Fotos novas primeiro)");
define("_ALBM_RATINGLTOH","Ranking (De Menos votados a Mais votados)");
define("_ALBM_RATINGHTOL","Ranking (De Mais votados a Menos votados)");

define("_ALBM_NOSHOTS","Screenshots N�o dispon�veis");
define("_ALBM_EDITTHISPHOTO","Editar Esta Foto");

define("_ALBM_DESCRIPTIONC","Descri��o: ");
define("_ALBM_EMAILC","Email: ");
define("_ALBM_CATEGORYC","Categoria: ");
define("_ALBM_SUBCATEGORY","Sub-categorias: ");
define("_ALBM_LASTUPDATEC","�ltima atualiza��o: ");
define("_ALBM_HITSC","Requisi��es: ");
define("_ALBM_RATINGC","Ranking: ");
define("_ALBM_ONEVOTE","1 voto");
define("_ALBM_NUMVOTES","%s votes");
define("_ALBM_ONEPOST","1 publica��o");
define("_ALBM_NUMPOSTS","%s publica��es");
define("_ALBM_COMMENTSC","Coment�rios: ");
define("_ALBM_RATETHISPHOTO","Rankiar esta foto");
define("_ALBM_MODIFY","Editar");
define("_ALBM_VSCOMMENTS","Exibir/Incluir Coment�rios");

define("_ALBM_THEREARE","Existem <b>%s</b> imagens no banco de dados.");
define("_ALBM_LATESTLIST","Fotos mais recentes");

define("_ALBM_VOTEAPPRE","Agredecemos pelo seu voto.");
define("_ALBM_THANKURATE","Obrigado por ajudar � rankiar essa foto em %s.");
define("_ALBM_VOTEONCE","Por favor, n�o vote duas vezes na mesma foto.");
define("_ALBM_RATINGSCALE","A escala � 1 - 10, com o 1 que � p�ssimo e 10 excelente.");
define("_ALBM_BEOBJECTIVE","Por favor, seja objetivo. Se todos recebem 1 ou 10 as avalia��es n�o ser�o muitos �teis.");
define("_ALBM_DONOTVOTE","N�o vote em sua pr�pria Foto.");
define("_ALBM_RATEIT","Avalie isso!");

define("_ALBM_RECEIVED","Sua foto foi recebida com sucesso. Orbigado!");
define("_ALBM_ALLPENDING","Todas as fotos enviadas estar�o submitidas � um processo de valida��o.");

define("_ALBM_RANK","Rank");
define("_ALBM_CATEGORY","Categoria");
define("_ALBM_HITS","Solicita��es");
define("_ALBM_RATING","Ranking");
define("_ALBM_VOTE","Voto");
define("_ALBM_TOP10","%s 10 Mais"); // %s is a photo category title

define("_ALBM_SORTBY","Ordenado por:");
define("_ALBM_TITLE","T�tulo");
define("_ALBM_DATE","Data");
define("_ALBM_POPULARITY","Popularidade");
define("_ALBM_CURSORTEDBY","Fotos ordenadas por: %s");
define("_ALBM_FOUNDIN","Encontrado em:");
define("_ALBM_PREVIOUS","Anterior");
define("_ALBM_NEXT","Pr�ximo");
define("_ALBM_NOMATCH","N�o h� imagens para exibir.");

define("_ALBM_CATEGORIES","Categorias");

define("_ALBM_SUBMIT","Incluir");
define("_ALBM_CANCEL","Cancelar");

define("_ALBM_MUSTREGFIRST","Perd�o, Voc� n�o tem permiss�o de acesso.<br>Por Favor, registre-se ou autentique-se primeiro!");
define("_ALBM_MUSTADDCATFIRST","Perd�o, Voc� n�o uma categoria criada ainda.<br>Por Favor, crie uma categoria!");
define("_ALBM_NORATING","Vota��o n�o selecionada.");
define("_ALBM_CANTVOTEOWN","Voc� n�o pode votar em sua pr�pria foto..<br>Todos os votos est�o sendo registrados e monitorados.");
define("_ALBM_VOTEONCE2","Vote apenas uma vez na mesma foto.<br>Todos os votos est�o sendo registrados e monitorados.");

//%%%%%%	Module Name 'MyAlbum' (Admin)	  %%%%%

define("_ALBM_PHOTOSWAITING","Fotos em espera para valida��o");
define("_ALBM_PHOTOMANAGER","Administra��o de fotos");
define("_ALBM_CATEDIT","Incluir, Alterar e Excluir Categorias");
define("_ALBM_GROUPPERM_GLOBAL","Permiss�es Gerais");
define("_ALBM_CHECKCONFIGS","Verificar Configura��es");
define("_ALBM_BATCHUPLOAD","Registro por Lote");
define("_ALBM_GENERALSET","Prefer�ncias sobre myAlbum-P");
define("_ALBM_REDOTHUMBS2","Refazer Thumbnails");

define("_ALBM_SUBMITTER","Enviado por");
define("_ALBM_DELETE","Excluir");
define("_ALBM_NOSUBMITTED","N�o h� novas fotos enviadas.");
define("_ALBM_ADDMAIN","Incluir uma categoria geral");
define("_ALBM_IMGURL","URL da Imagem(OPCIONAL A altura da imagem ser� reajustada par 50): ");
define("_ALBM_ADD","Incluir");
define("_ALBM_ADDSUB","Incluir uma SUB-Categoria");
define("_ALBM_IN","em");
define("_ALBM_MODCAT","Alterar Categoria");
define("_ALBM_DBUPDATED","Altera��o na base dados efetuada com sucesso!");
define("_ALBM_MODREQDELETED","Pedido de modifica��o deletado.");
define("_ALBM_IMGURLMAIN","URL da Imagem(OPCIONAL e v�lido apenas para categorias gerais. A altura da imagem ser� redimensionada para 50): ");
define("_ALBM_PARENT","Categoria acima:");
define("_ALBM_SAVE","Gravar Altera��es");
define("_ALBM_CATDELETED","Categoria Deletada.");
define("_ALBM_CATDEL_WARNING","Voc� realmente deseja excluir a cotegoria com suas imagens e coment�rios?");
define("_ALBM_YES","Sim");
define("_ALBM_NO","N�o");
define("_ALBM_NEWCATADDED","Categoria Adicionada com sucesso!");
define("_ALBM_ERROREXIST","ERRO: Esta Foto j� existe na base de dados!");
define("_ALBM_ERRORTITLE","ERRO: Voc� precisar colocar um T�TULO!");
define("_ALBM_ERRORDESC","ERRO: Voc� precisar colocar uma DESCRI��O!");
define("_ALBM_WEAPPROVED","Seu pedido de aprova��o foi confirmado.");
define("_ALBM_THANKSSUBMIT","Obrigado pelo envio!");
define("_ALBM_CONFUPDATED","Configura��es atualizadas com sucesso!");

}

?>
