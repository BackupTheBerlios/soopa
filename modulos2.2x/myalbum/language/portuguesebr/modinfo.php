<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {






// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:33
define('_ALBM_CFG_DEFAULTORDER','Default order in category\'s view');

// Appended by Xoops Language Checker -GIJOE- in 2004-06-24 17:59:00
define('_ALBM_CFG_USESITEIMG','Use [siteimg] in ImageManager Integration');
define('_ALBM_CFG_DESCUSESITEIMG','The Integrated Image Manager input [siteimg] instead of [img].<br />You have to hack module.textsanitizer.php or each modules to enable tag of [siteimg]');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-19 13:56:06
define('_ALBM_CFG_MIDDLEPIXEL','Max image size in single view');
define('_ALBM_CFG_DESCMIDDLEPIXEL','Specify (width)x(height)<br />eg) 480x480');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:56
define('_ALBM_CFG_DESCPERPAGE','Input selectable numbers separated with \'|\'<br />eg) 10|20|50|100');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-05 15:14:39
define('_ALBM_CFG_ALLOWNOIMAGE','Allows a sumbit without images');
define('_ALBM_CFG_ALLOWEDEXTS','File extensions can be uploaded');
define('_ALBM_CFG_DESCALLOWEDEXTS','Input extensions with separator \'|\'. (eg \'jpg|jpeg|gif|png\') .<br />All character must be small. Don\'t insert periods or spaces');
define('_ALBM_CFG_ALLOWEDMIME','MIME Types can be uploaded');
define('_ALBM_CFG_DESCALLOWEDMIME','Input MIME Types with separator \'|\'. (eg \'image/gif|image/jpeg|image/png\')<br />If you want to be checked by MIME Type, be blank here');
define('_ALBM_MYALBUM_ADMENU_IMPORT','Importar Imagens');
define('_ALBM_MYALBUM_ADMENU_EXPORT','Exportar Imagens');
define('_ALBM_MYALBUM_ADMENU_MYBLOCKSADMIN','Blocos e Grupos');

define( 'MYALBUM_MI_LOADED' , 1 ) ;

// The name of this module
define("_ALBM_MYALBUM_NAME","�lbum de Fotos");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","Cria uma sess�o de fotos onde usu�rios podem pesquisar, incluir ou votar em v�rias fotos.");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","Fotos Recentes");
define("_ALBM_BNAME_HITS","Top Fotos");
define("_ALBM_BNAME_RANDOM","Foto Acima");
define("_ALBM_BNAME_RECENT_P","Fotos Recentes com thumbnails");
define("_ALBM_BNAME_HITS_P","Top Photos com thumbnails");

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "Diret�rio para salvar as imagens" ) ;
define( "_ALBM_CFG_DESCPHOTOSPATH" , "Caminho do diret�rio instalado o XOOPS.<br />(O primeiro caracter deve ser'/'. O �ltimo caracter n�o deve ser'/'.)<br />Este diret�rio ter� permiss�o 777 ou 707 no unix." ) ;
define( "_ALBM_CFG_THUMBSPATH" , "Diret�rio para salvar as miniaturas" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "Mesmo que 'Caminho para as fotos'." ) ;
//define( "_ALBM_CFG_USEIMAGICK" , "Use ImageMagick for treating images" ) ;
//define( "_ALBM_CFG_DESCIMAGICK" , "Not use ImageMagick cause Not work resize or rotate the main photo, and make thumbnails by GD.<br />You'd better use ImageMagick if you can." ) ;
define( "_ALBM_CFG_IMAGINGPIPE" , "Biblioteca para tratamento das imagens" ) ;
define( "_ALBM_CFG_DESCIMAGINGPIPE" , "Verifique se a vers�o do PHP possui o GD2" ) ;
define( "_ALBM_CFG_FORCEGD2" , "For�ar convers�o para GD2" ) ;
define( "_ALBM_CFG_DESCFORCEGD2" , "Verifique se a vers�o do PHP possui o GD2" ) ;
define( "_ALBM_CFG_IMAGICKPATH" , "Caminho do ImageMagick" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "O Caminho completo para o 'convert'<br />O �ltimo caracter n�o pode ser '/'.)<br />Esta configura��o � valida apenas quando utilizado o ImageMagick" ) ;
define( "_ALBM_CFG_NETPBMPATH" , "Caminho do NetPBM" ) ;
define( "_ALBM_CFG_DESCNETPBMPATH" , "Caminho completo para o 'pnmscale' etc.<br />(�ltimo caracter n�o pode ser '/'.)<br />Esta configura��o � valida apenas quando utilizado o NetPBM" ) ;
define( "_ALBM_CFG_POPULAR" , "Hits para serem populares" ) ;
define( "_ALBM_CFG_NEWDAYS" , "Dias entre apresenta��o 'novo'&'atualizar'" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "N�mero de fotos novas no topo da p�gina" ) ;
define( "_ALBM_CFG_PERPAGE" , "Fotos mostradas por p�gina" ) ;
define( "_ALBM_CFG_MAKETHUMB" , "Fazer o thumbnail da Imagem" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "Quando aletrar de 'N�o' para 'Sim' voc� deve 'Voltar os thumbails'." ) ;
//define( "_ALBM_CFG_THUMBWIDTH" , "Thumb Image Width" ) ;
//define( "_ALBM_CFG_DESCTHUMBWIDTH" , "The height of thumbs will be decided from the width automatically." ) ;
define( "_ALBM_CFG_THUMBSIZE" , "Tamanho dos thumbnails (pixel)" ) ;
define( "_ALBM_CFG_THUMBRULE" , "Regra de c�lculo para a reconstru��o dos thumbnails" ) ;
define( "_ALBM_CFG_WIDTH" , "Largura M�xima da Foto" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "Largura da foto a ser redimensionada." ) ;
define( "_ALBM_CFG_HEIGHT" , "Altura M�xima da Foto" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "Altura da foto a ser redimensionada." ) ;
define( "_ALBM_CFG_FSIZE" , "Tamanho M�ximo do arquivo" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "A limita��o do tamanho m�ximo do arquivo a ser enviado." ) ;
// define( "_ALBM_CFG_NEEDADMIT" , "Needs admition for new photo" ) ;
define( "_ALBM_CFG_ADDPOSTS" , "O N�mero adicionado pelo usu�rio quando incluir uma foto." ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "Normalmente, 0 ou 1." ) ;

define( "_ALBM_CFG_CATONSUBMENU" , "Registrar categorias do topo no submenu" ) ;
define( "_ALBM_CFG_NAMEORUNAME" , "Mostrar o nome de quem publicou" ) ;
define( "_ALBM_CFG_DESCNAMEORUNAME" , "Seleciona qual nome ser� mostrado" ) ;
define( "_ALBM_CFG_VIEWCATTYPE" , "Tipo de vis�o na categoria" ) ;
define( "_ALBM_CFG_COLSOFTABLEVIEW" , "N�mero de colunas na tabela de visualiza��o" ) ;

define( "_ALBM_OPT_USENAME" , "Nome do Handle" ) ;
define( "_ALBM_OPT_USEUNAME" , "Nome de Usu�rio" ) ;

define( "_ALBUM_OPT_CALCFROMWIDTH" , "largura:altura especificada:autom�tico" ) ;
define( "_ALBUM_OPT_CALCFROMHEIGHT" , "largura:largura autom�tica:especificado" ) ;
define( "_ALBUM_OPT_CALCWHINSIDEBOX" , "colocar em um tamanho espec�fico" ) ;

define( "_ALBM_OPT_VIEWLIST" , "Vis�o da Lista" ) ;
define( "_ALBM_OPT_VIEWTABLE" , "Vis�o da tabela" ) ;


// Sub menu titles
define("_ALBM_TEXT_SMNAME1","Incluir");
define("_ALBM_TEXT_SMNAME2","Popular");
define("_ALBM_TEXT_SMNAME3","Mais Votadas");
define("_ALBM_TEXT_SMNAME4","Minhas Fotos");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","Fotos Pendentes");
define("_ALBM_MYALBUM_ADMENU1","Fotos");
define("_ALBM_MYALBUM_ADMENU2","Categorias");
define("_ALBM_MYALBUM_ADMENU_GPERM","Permiss�es Gerais");
define("_ALBM_MYALBUM_ADMENU3","Verificar Configura��es");
define("_ALBM_MYALBUM_ADMENU4","Inclus�o em Massa");
define("_ALBM_MYALBUM_ADMENU5","Manuten��o de Imagens");


// Text for notifications
define('_MI_MYALBUM_GLOBAL_NOTIFY', 'Geral');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC', 'Op��es de notifica��o geral');
define('_MI_MYALBUM_CATEGORY_NOTIFY', 'Categoria');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC', 'Op��es de notifica��o que � aplicada a categoria de foto atual');
define('_MI_MYALBUM_PHOTO_NOTIFY', 'Foto');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC', 'Op��es de notifica��o que � aplicada a foto atual');

define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY', 'Nova Foto');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP', 'Quando houver nova imagem');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC', 'Receber notifica��o quando qualquer nova foto for enviada');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: notifica��o autom�tica: Nova Foto');

define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY', 'Nova Foto');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP', 'Quando houver nova imagem nesta categoria');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC', 'Receber notifica��o quando qualquer nova foto for enviada nesta categoria');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: notifica��o autom�tica: Nova Foto');

}

?>
