<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_AM_LOADED' ) ) {




// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:56
define('_AM_TH_DATE','Atualizado em');
define('_AM_TH_BATCHUPDATE','Update checked photos collectively');
define('_AM_OPT_NOCHANGE','- Nenhuma -');
define('_AM_JS_UPDATECONFIRM','The checked items will be updated. OK?');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-05 15:14:39
define('_AM_H3_FMT_CATEGORIES','Administra��o de Categorias (%s)');
define('_AM_CAT_TH_TITLE','Nome');
define('_AM_CAT_TH_PHOTOS','Imagens');
define('_AM_CAT_TH_OPERATION','Op��es');
define('_AM_CAT_TH_IMAGE','Banner');
define('_AM_CAT_TH_PARENT','Categoria Principal');
define('_AM_CAT_TH_IMGURL','URL do Banner');
define('_AM_CAT_MENU_NEW','Incluir nova categoria');
define('_AM_CAT_MENU_EDIT','Editing a category');
define('_AM_CAT_INSERTED','Categoria incluida com sucesso!');
define('_AM_CAT_UPDATED','Categoria renomeada com sucesso!');
define('_AM_CAT_BTN_BATCH','Apply');
define('_AM_CAT_LINK_MAKETOPCAT','Incluir Categoria ');
define('_AM_CAT_LINK_ADDPHOTOS','Incluir imagem nesta categoria');
define('_AM_CAT_LINK_EDIT','Editar esta categoria');
define('_AM_CAT_LINK_MAKESUBCAT','Incluir uma sub-categoria');
define('_AM_CAT_FMT_NEEDADMISSION','%s images are needed the admission');
define('_AM_CAT_FMT_CATDELCONFIRM','%s will be deleted with its sub-categories, images, comments. Are you OK?');
define('_AM_H3_FMT_ADMISSION','Fontos pendentes (%s)');
define('_AM_H3_FMT_PHOTOMANAGER','Administrador de Fotos (%s)');
define('_AM_H3_FMT_IMPORTTO','Importing images from another modules to %s');
define('_AM_H3_FMT_EXPORTTO','Exporting images from %s to another modules');
define('_AM_FMT_EXPORTTOIMAGEMANAGER','Exporting to image manager in XOOPS');
define('_AM_FMT_EXPORTIMSRCCAT','Source');
define('_AM_FMT_EXPORTIMDSTCAT','Destination');
define('_AM_CB_EXPORTRECURSIVELY','with images in its subcategories');
define('_AM_CB_EXPORTTHUMB','Export thumbnails instead of main images');
define('_AM_MB_EXPORTCONFIRM','Do export. OK?');
define('_AM_FMT_EXPORTSUCCESS','You have exported %s images');

// Appended by Xoops Language Checker -GIJOE- in 2004-04-07 15:04:26
define('_AM_ALBM_IMPORT','Importing images from another modules');
define('_AM_FMT_IMPORTTO','Import into %s ');
define('_AM_FMT_IMPORTFROMMYALBUMP','Importing from "%s" as module type of myAlbum-P');
define('_AM_FMT_IMPORTFROMIMAGEMANAGER','Importing from image manager in XOOPS');
define('_AM_CB_IMPORTRECURSIVELY','Importing sub-categories recursively');
define('_AM_RADIO_IMPORTCOPY','Copy images (comments will not be copied');
define('_AM_RADIO_IMPORTMOVE','Move images (comments will be succeeded)');
define('_AM_MB_IMPORTCONFIRM','Do import ?');
define('_AM_FMT_IMPORTSUCCESS','You have imported %s images');

define( 'MYALBUM_AM_LOADED' , 1 ) ;

// Index (Top of Admin)
define( "_ALBM_INDEX_BLOCKSADMIN" , "Adminstra��o" ) ;

// Admission
define( "_AM_TH_SUBMITTER" , "Enviado por" ) ;
define( "_AM_TH_TITLE" , "T�tulo" ) ;
define( "_AM_TH_DESCRIPTION" , "Descri��o" ) ;
define( "_AM_TH_CATEGORIES" , "Categoria" ) ;

// Module Checker
define( "_AM_H3_FMT_MODULECHECKER" , "Verificar Confgura��es" ) ;

define( "_AM_H4_ENVIRONMENT" , "Configura��es do PHP" ) ;
define( "_AM_MB_PHPDIRECTIVE" , "Diretiva PHP" ) ;
define( "_AM_MB_BOTHOK" , "opcional" ) ;
define( "_AM_MB_NEEDON" , "ativado" ) ;


define( "_AM_H4_TABLE" , "Verfica��o do Banco de Dados (tabelas)" ) ;
define( "_AM_MB_PHOTOSTABLE" , "Tabela de fotos" ) ;
define( "_AM_MB_DESCRIPTIONTABLE" , "Tabela de descri��o" ) ;
define( "_AM_MB_CATEGORIESTABLE" , "Tabela de categorias" ) ;
define( "_AM_MB_VOTEDATATABLE" , "Tabela de vota��o" ) ;
define( "_AM_MB_COMMENTSTABLE" , "Tabela de coment�rios" ) ;
define( "_AM_MB_NUMBEROFPHOTOS" , "Fotos Cadastradas" ) ;
define( "_AM_MB_NUMBEROFDESCRIPTIONS" , "N�mero de Descri��es" ) ;
define( "_AM_MB_NUMBEROFCATEGORIES" , "N�mero de Categorias" ) ;
define( "_AM_MB_NUMBEROFVOTEDATA" , "N�mero de vota��es" ) ;
define( "_AM_MB_NUMBEROFCOMMENTS" , "N�mero de coment�rios" ) ;


define( "_AM_H4_CONFIG" , "Outras Configura��es" ) ;
define( "_AM_MB_PIPEFORIMAGES" , "Biblioteca usada nas imagens" ) ;
define( "_AM_MB_DIRECTORYFORPHOTOS" , "Diret�rio de Fotos" ) ;
define( "_AM_MB_DIRECTORYFORTHUMBS" , "Diret�rio de Thumbnails" ) ;
define( "_AM_ERR_LASTCHAR" , "Erro: O �ltimo caracter n�o pode ser '/'" ) ;
define( "_AM_ERR_FIRSTCHAR" , "Erro: O Primeiro caracter deve ser '/'" ) ;
define( "_AM_ERR_PERMISSION" , "Erro: Primeiro crie e ajuste permiss�o para 777 este diret�rio via ftp ou shell." ) ;
define( "_AM_ERR_NOTDIRECTORY" , "Erro: Isto n�o � um diret�rio." ) ;
define( "_AM_ERR_READORWRITE" , "Erro: Este diret�rio n�o tem permiss�o de escrita e(ou) leitura. Voc� deve alterar a permiss�o desse diret�rio para 777." ) ;
define( "_AM_ERR_SAMEDIR" , "Erro: O caminho das fotos deve ser diferente do caminho dos thumbnails" ) ;
define( "_AM_LNK_CHECKGD2" , "Verifique se o GD2 est� corretamente compilado na vers�o de seu PHP" ) ;
define( "_AM_MB_CHECKGD2" , "Se o link acima n�o estiver sendo visualizado corretamente, verifique se a biblioteca est� configurada em modo truecolor." ) ;
define( "_AM_MB_GD2SUCCESS" , "Parab�ns!<br />voc� pode utilizar GD2 em modo truecolor neste ambiente." ) ;


define( "_AM_H4_PHOTOLINK" , "Verificador de links de miniaturas" ) ;
define( "_AM_MB_NOWCHECKING" , "Verificando ." ) ;
define( "_AM_FMT_PHOTONOTREADABLE" , "a foto (%s) n�o � pode ser lida.." ) ;
define( "_AM_FMT_THUMBNOTREADABLE" , "o thumbnail (%s) n�o pode ser lido." ) ;
define( "_AM_FMT_NUMBEROFDEADPHOTOS" , "%s de fotos mortas foram encontradas." ) ;
define( "_AM_FMT_NUMBEROFDEADTHUMBS" , "%s de thumbnails devem ser reconstru�dos." ) ;
define( "_AM_FMT_NUMBEROFREMOVEDTMPS" , "%s garbage files have been removed." ) ;
define( "_AM_LINK_REDOTHUMBS" , "refazer miniaturas" ) ;
define( "_AM_LINK_TABLEMAINTENANCE" , "Manuten��o de Imagens" ) ;



// Redo Thumbnail
define( "_AM_H3_FMT_RECORDMAINTENANCE" , "Manuten��o de Imagens" ) ;

define( "_AM_FMT_CHECKING" , "Verificando %s ..." ) ;

define( "_AM_FORM_RECORDMAINTENANCE" , "Manuten��o de Imagens e Miniaturas." ) ;

define( "_AM_MB_FAILEDREADING" , "Erro de leitura." ) ;
define( "_AM_MB_CREATEDTHUMBS" , "Miniatura criada." ) ;
define( "_AM_MB_BIGTHUMBS" , "Erro na cria��o da miniatura." ) ;
define( "_AM_MB_SKIPPED" , "N�o verificado." ) ;
define( "_AM_MB_SIZEREPAIRED" , "(campos reparados)." ) ;
define( "_AM_MB_RECREMOVED" , "Registro exclu�do." ) ;
define( "_AM_MB_PHOTONOTEXISTS" , "O arquivo de Imagem nao existe." ) ;
define( "_AM_MB_PHOTORESIZED" , "Imagem redimensionada." ) ;

define( "_AM_TEXT_RECORDFORSTARTING" , "Processar a partir da imagem n�mero:" ) ;
define( "_AM_TEXT_NUMBERATATIME" , "Quatidade de imagem a serem processadas:" ) ;
define( "_AM_LABEL_DESCNUMBERATATIME" , "<i>n�mero muito grande, pode ultrapassar o tempo limite do servidor</i>." ) ;

define( "_AM_RADIO_FORCEREDO" , "Sobrescrever miniaturas existentes" ) ;
define( "_AM_RADIO_REMOVEREC" , "Excluir t�tulos sem imagem" ) ;
define( "_AM_RADIO_RESIZE" , "Redimensionar imagens maiores que o tamanho permitido" ) ;

define( "_AM_MB_FINISHED" , "Finalizado" ) ;
define( "_AM_LINK_RESTART" , "Repetir" ) ;
define( "_AM_SUBMIT_NEXT" , "Iniciar" ) ;



// Batch Register
define( "_AM_H3_FMT_BATCHREGISTER" , "Inclus�o de Imagens em Lote" ) ;


// GroupPerm Global
define( "_AM_ALBM_GROUPPERM_GLOBAL" , "Permiss�es gerais" ) ;
define( "_AM_ALBM_GROUPPERM_GLOBALDESC" , "Configura privil�gios do grupo deste m�dulo" ) ;
define( "_AM_ALBM_GPERMUPDATED" , "Permiss�es foram alteradas com sucesso" ) ;

}

?>
