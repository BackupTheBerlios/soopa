<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_AM_LOADED' ) ) {




// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:56
define('_AM_TH_DATE','Atualizado em');
define('_AM_TH_BATCHUPDATE','Update checked photos collectively');
define('_AM_OPT_NOCHANGE','- Nenhuma -');
define('_AM_JS_UPDATECONFIRM','The checked items will be updated. OK?');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-05 15:14:39
define('_AM_H3_FMT_CATEGORIES','Administração de Categorias (%s)');
define('_AM_CAT_TH_TITLE','Nome');
define('_AM_CAT_TH_PHOTOS','Imagens');
define('_AM_CAT_TH_OPERATION','Opções');
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
define( "_ALBM_INDEX_BLOCKSADMIN" , "Adminstração" ) ;

// Admission
define( "_AM_TH_SUBMITTER" , "Enviado por" ) ;
define( "_AM_TH_TITLE" , "Título" ) ;
define( "_AM_TH_DESCRIPTION" , "Descrição" ) ;
define( "_AM_TH_CATEGORIES" , "Categoria" ) ;

// Module Checker
define( "_AM_H3_FMT_MODULECHECKER" , "Verificar Confgurações" ) ;

define( "_AM_H4_ENVIRONMENT" , "Configurações do PHP" ) ;
define( "_AM_MB_PHPDIRECTIVE" , "Diretiva PHP" ) ;
define( "_AM_MB_BOTHOK" , "opcional" ) ;
define( "_AM_MB_NEEDON" , "ativado" ) ;


define( "_AM_H4_TABLE" , "Verficação do Banco de Dados (tabelas)" ) ;
define( "_AM_MB_PHOTOSTABLE" , "Tabela de fotos" ) ;
define( "_AM_MB_DESCRIPTIONTABLE" , "Tabela de descrição" ) ;
define( "_AM_MB_CATEGORIESTABLE" , "Tabela de categorias" ) ;
define( "_AM_MB_VOTEDATATABLE" , "Tabela de votação" ) ;
define( "_AM_MB_COMMENTSTABLE" , "Tabela de comentários" ) ;
define( "_AM_MB_NUMBEROFPHOTOS" , "Fotos Cadastradas" ) ;
define( "_AM_MB_NUMBEROFDESCRIPTIONS" , "Número de Descrições" ) ;
define( "_AM_MB_NUMBEROFCATEGORIES" , "Número de Categorias" ) ;
define( "_AM_MB_NUMBEROFVOTEDATA" , "Número de votações" ) ;
define( "_AM_MB_NUMBEROFCOMMENTS" , "Número de comentários" ) ;


define( "_AM_H4_CONFIG" , "Outras Configurações" ) ;
define( "_AM_MB_PIPEFORIMAGES" , "Biblioteca usada nas imagens" ) ;
define( "_AM_MB_DIRECTORYFORPHOTOS" , "Diretório de Fotos" ) ;
define( "_AM_MB_DIRECTORYFORTHUMBS" , "Diretório de Thumbnails" ) ;
define( "_AM_ERR_LASTCHAR" , "Erro: O Último caracter não pode ser '/'" ) ;
define( "_AM_ERR_FIRSTCHAR" , "Erro: O Primeiro caracter deve ser '/'" ) ;
define( "_AM_ERR_PERMISSION" , "Erro: Primeiro crie e ajuste permissão para 777 este diretório via ftp ou shell." ) ;
define( "_AM_ERR_NOTDIRECTORY" , "Erro: Isto não é um diretório." ) ;
define( "_AM_ERR_READORWRITE" , "Erro: Este diretório não tem permissão de escrita e(ou) leitura. Você deve alterar a permissão desse diretório para 777." ) ;
define( "_AM_ERR_SAMEDIR" , "Erro: O caminho das fotos deve ser diferente do caminho dos thumbnails" ) ;
define( "_AM_LNK_CHECKGD2" , "Verifique se o GD2 está corretamente compilado na versão de seu PHP" ) ;
define( "_AM_MB_CHECKGD2" , "Se o link acima não estiver sendo visualizado corretamente, verifique se a biblioteca está configurada em modo truecolor." ) ;
define( "_AM_MB_GD2SUCCESS" , "Parabéns!<br />você pode utilizar GD2 em modo truecolor neste ambiente." ) ;


define( "_AM_H4_PHOTOLINK" , "Verificador de links de miniaturas" ) ;
define( "_AM_MB_NOWCHECKING" , "Verificando ." ) ;
define( "_AM_FMT_PHOTONOTREADABLE" , "a foto (%s) não é pode ser lida.." ) ;
define( "_AM_FMT_THUMBNOTREADABLE" , "o thumbnail (%s) não pode ser lido." ) ;
define( "_AM_FMT_NUMBEROFDEADPHOTOS" , "%s de fotos mortas foram encontradas." ) ;
define( "_AM_FMT_NUMBEROFDEADTHUMBS" , "%s de thumbnails devem ser reconstruídos." ) ;
define( "_AM_FMT_NUMBEROFREMOVEDTMPS" , "%s garbage files have been removed." ) ;
define( "_AM_LINK_REDOTHUMBS" , "refazer miniaturas" ) ;
define( "_AM_LINK_TABLEMAINTENANCE" , "Manutenção de Imagens" ) ;



// Redo Thumbnail
define( "_AM_H3_FMT_RECORDMAINTENANCE" , "Manutenção de Imagens" ) ;

define( "_AM_FMT_CHECKING" , "Verificando %s ..." ) ;

define( "_AM_FORM_RECORDMAINTENANCE" , "Manutenção de Imagens e Miniaturas." ) ;

define( "_AM_MB_FAILEDREADING" , "Erro de leitura." ) ;
define( "_AM_MB_CREATEDTHUMBS" , "Miniatura criada." ) ;
define( "_AM_MB_BIGTHUMBS" , "Erro na criação da miniatura." ) ;
define( "_AM_MB_SKIPPED" , "Não verificado." ) ;
define( "_AM_MB_SIZEREPAIRED" , "(campos reparados)." ) ;
define( "_AM_MB_RECREMOVED" , "Registro excluído." ) ;
define( "_AM_MB_PHOTONOTEXISTS" , "O arquivo de Imagem nao existe." ) ;
define( "_AM_MB_PHOTORESIZED" , "Imagem redimensionada." ) ;

define( "_AM_TEXT_RECORDFORSTARTING" , "Processar a partir da imagem número:" ) ;
define( "_AM_TEXT_NUMBERATATIME" , "Quatidade de imagem a serem processadas:" ) ;
define( "_AM_LABEL_DESCNUMBERATATIME" , "<i>número muito grande, pode ultrapassar o tempo limite do servidor</i>." ) ;

define( "_AM_RADIO_FORCEREDO" , "Sobrescrever miniaturas existentes" ) ;
define( "_AM_RADIO_REMOVEREC" , "Excluir títulos sem imagem" ) ;
define( "_AM_RADIO_RESIZE" , "Redimensionar imagens maiores que o tamanho permitido" ) ;

define( "_AM_MB_FINISHED" , "Finalizado" ) ;
define( "_AM_LINK_RESTART" , "Repetir" ) ;
define( "_AM_SUBMIT_NEXT" , "Iniciar" ) ;



// Batch Register
define( "_AM_H3_FMT_BATCHREGISTER" , "Inclusão de Imagens em Lote" ) ;


// GroupPerm Global
define( "_AM_ALBM_GROUPPERM_GLOBAL" , "Permissões gerais" ) ;
define( "_AM_ALBM_GROUPPERM_GLOBALDESC" , "Configura privilégios do grupo deste módulo" ) ;
define( "_AM_ALBM_GPERMUPDATED" , "Permissões foram alteradas com sucesso" ) ;

}

?>
