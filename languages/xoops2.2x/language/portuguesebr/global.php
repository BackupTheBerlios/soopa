<?php
// $Id: global.php,v 1.2 2005/07/05 20:24:45 mauriciodelima Exp $
//%%%%%%	File Name mainfile.php 	%%%%%
define("_PLEASEWAIT","Aguarde...");
define("_FETCHING","Carregando...");
define("_TAKINGBACK","Retornando...");
define("_LOGOUT","Sair do site");
define("_SUBJECT","Tópico");
define("_MESSAGEICON","Ícone da mensagem");
define("_COMMENTS","Comentários");
define("_POSTANON","Enviar anonimamente");
define("_DISABLESMILEY","Desativar emoticons");
define("_DISABLEHTML","Desativar HTML");
define("_PREVIEW","Exibir");

define("_GO","Prosseguir!");
define("_NESTED","Ocultar");
define("_NOCOMMENTS","Ocultar comentários");
define("_FLAT","Desagrupar");
define("_THREADED","Agrupar");
define("_OLDESTFIRST","Antigos primeiro");
define("_NEWESTFIRST","Novos primeiro");
define("_MORE","mais...");
define("_MULTIPAGE","Para dividir seu texto em várias páginas insira o código [pagebreak], com colchetes.");
define("_IFNOTRELOAD","Se a página não recarregar automaticamente,<br/><a href='%s'>clique aqui</a> para prosseguir.");
define("_WARNINSTALL2","Atenção: Diretório %s existente no servidor.<br/>Por motivos de segurança, remova este diretório.");
define("_WARNINWRITEABLE","Atenção: O arquivo %s tem permissão de escrita pelo servidor.<br/>Por motivos de segurança altere esta permissão.<br/>Em sistemas Unix use 'CHMOD 444', em Windows ajuste para 'somente leitura'.");

//%%%%%%	File Name themeuserpost.php 	%%%%%
define("_PROFILE","Perfil");
define("_POSTEDBY","Enviado por");
define("_VISITWEBSITE","Visite");
define("_SENDPMTO","Enviar mensagem particular para %s");
define("_SENDEMAILTO","Enviar e-mail para %s");
define("_ADD","Incluir");
define("_REPLY","Responder");
define("_DATE","Data de envio");   // Posted date

//%%%%%%	File Name admin_functions.php 	%%%%%
define("_MAIN","Principal");
define("_MANUAL","Manual");
define("_INFO","Informações");
define("_CPHOME","Administração");
define("_YOURHOME","Página principal");

//%%%%%%	File Name misc.php (who's-online popup)	%%%%%
define("_WHOSONLINE","Usuários Online");
define('_GUESTS', 'Visitantes');
define('_MEMBERS','Usuários');
define("_ONLINEPHRASE","<b>%s</b> visitantes online");
define("_ONLINEPHRASEX","<b>%s</b> na seção: <b>%s</b>");
define("_CLOSE","Fechar");  // Close window

//%%%%%%	File Name module.textsanitizer.php 	%%%%%
define("_QUOTEC","Citando:");

//%%%%%%	File Name admin.php 	%%%%%
define("_NOPERM","Você não tem permissão para acessar esta área.");

//%%%%%		Common Phrases		%%%%%
define("_NO","Não");
define("_YES","Sim");
define("_EDIT","Editar");
define("_DELETE","Excluir");
define("_SUBMIT","Enviar");
define("_MODULENOEXIST","O módulo selecionado não existe.");
define("_ALIGN","Alinhar");
define("_LEFT","Esquerda");
define("_CENTER","Centro");
define("_RIGHT","Direita");
define("_FORM_ENTER", "Digite %s");
// %s represents file name
define("_MUSTWABLE","O arquivo %s deve ter permissão de gravação pelo servidor.");
// Module info
define('_PREFERENCES', 'Preferências');
define("_VERSION", "Versão");
define("_DESCRIPTION", "Descrição");
define("_ERRORS", "Erros");
define("_NONE", "Nenhum");
define('_ON','em');
define('_READS','leituras');
define('_WELCOMETO','Bem-vindo ao %s');
define('_SEARCH','Procurar');
define('_ALL', 'Todos');
define('_TITLE', 'Titulo');
define('_OPTIONS', 'Opções');
define('_QUOTE', 'Citar');
define('_LIST', 'Listar');
define('_LOGIN','Entrar');
define('_USERNAME','Usuário: ');
define('_PASSWORD','Senha: ');
define("_SELECT","Selecionar");
define("_IMAGE","Imagem");
define("_SEND","Enviar");
define("_CANCEL","Cancelar");
define("_ASCENDING","Ordem crescente");
define("_DESCENDING","Ordem decrescente");
define('_BACK', 'Retornar');
define('_NOTITLE', 'Sem título');

/* Image manager */
define('_IMGMANAGER','Gerenciador de imagens');
define('_NUMIMAGES', '%s imagens');
define('_ADDIMAGE','Enviar uma nova imagem');
define('_IMAGENAME','Nome:');
define('_IMGMAXSIZE','Tamanho máximo (em bytes):');
define('_IMGMAXWIDTH','Largura máxima (em pixels):');
define('_IMGMAXHEIGHT','Altura máxima (em pixels):');
define('_IMAGECAT','Categoria:');
define('_IMAGEFILE','Arquivo da imagem:');
define('_IMGWEIGHT','Ordem de visualização das imagens:');
define('_IMGDISPLAY','Exibir esta imagem?');
define('_IMAGEMIME','Tipo MIME:');
define('_FAILFETCHIMG', 'Não foi possível enviar o arquivo %s');
define('_FAILSAVEIMG', 'Não foi possível incluir a imagem %s no banco de dados');
define('_NOCACHE', 'Sem cache');
define('_CLONE', 'Clonar');

//%%%%%	File Name class/xoopsform/formmatchoption.php 	%%%%%
define("_STARTSWITH", "Inicia com");
define("_ENDSWITH", "Termina com");
define("_MATCHES", "Igual a");
define("_CONTAINS", "Contém");

//%%%%%%	File Name commentform.php 	%%%%%
define("_REGISTER","Registrar");

//%%%%%%	File Name xoopscodes.php 	%%%%%
define("_SIZE","TAMANHO");  // font size
define("_FONT","FONTE");  // font family
define("_COLOR","COR");  // font color
define("_EXAMPLE","EXEMPLO");
define("_ENTERURL","Digite o endereço do link que você deseja incluir:");
define("_ENTERWEBTITLE","Digite o título do link:");
define("_ENTERIMGURL","Digite o endereço da imagem que você deseja incluir:");
define("_ENTERIMGPOS","Digite o alinhamento da figura.");
define("_IMGPOSRORL","'R' ou 'r' para direita (right), 'L' ou 'l' para esquerda (left), ou deixe vazio.");
define("_ERRORIMGPOS","ERRO: Digite a posição da imagem.");
define("_ENTEREMAIL","Digite o e-mail que você deseja incluir.");
define("_ENTERCODE","Digite os códigos que você deseja incluir.");
define("_ENTERQUOTE","Digite o texto para citação.");
define("_ENTERTEXTBOX","Digite o texto na caixa de texto.");
define("_ALLOWEDCHAR","Número máximo de caracteres permitido: ");
define("_CURRCHAR","Número de caracteres digitados: ");
define("_PLZCOMPLETE","Complete os campos 'tópico' e 'mensagem'.");
define("_MESSAGETOOLONG","A sua mensagem é muito extensa.");

//%%%%%		TIME FORMAT SETTINGS   %%%%%
define('_SECOND', '1 segundo');
define('_SECONDS', '%s segundos');
define('_MINUTE', '1 minuto');
define('_MINUTES', '%s minutos');
define('_HOUR', '1 hora');
define('_HOURS', '%s horas');
define('_DAY', '1 dia');
define('_DAYS', '%s dias');
define('_WEEK', '1 semana');
define('_MONTH', '1 mês');

define("_DATESTRING","d/m/Y H:i:s");
define("_MEDIUMDATESTRING","d/m/Y H:i");
define("_SHORTDATESTRING","d/n/Y");
// !!IMPORTANT!! insert '\' before any char among reserved chars: "a", "A","B","c","d","D","F","g","G","h","H","i","I","j","l","L","m","M","n","O","r","s","S","t","T","U","w","W","Y","y","z","Z"	
// insert double '\' before 't', 'r', 'n'
define("_TODAY", "\To\d\a\y G:i:s");
define("_YESTERDAY", "\Ye\s\\te\\r\d\a\y G:i:s");
define("_MONTHDAY", "n/j G:i:s");
define("_YEARMONTHDAY", "Y/n/j G:i");
/*
The following characters are recognized in the format string:
a - "am" or "pm"
A - "AM" or "PM"
d - day of the month, 2 digits with leading zeros; i.e. "01" to "31"
D - day of the week, textual, 3 letters; i.e. "Fri"
F - month, textual, long; i.e. "January"
h - hour, 12-hour format; i.e. "01" to "12"
H - hour, 24-hour format; i.e. "00" to "23"
g - hour, 12-hour format without leading zeros; i.e. "1" to "12"
G - hour, 24-hour format without leading zeros; i.e. "0" to "23"
i - minutes; i.e. "00" to "59"
j - day of the month without leading zeros; i.e. "1" to "31"
l (lowercase 'L') - day of the week, textual, long; i.e. "Friday"
L - boolean for whether it is a leap year; i.e. "0" or "1"
m - month; i.e. "01" to "12"
n - month without leading zeros; i.e. "1" to "12"
M - month, textual, 3 letters; i.e. "Jan"
s - seconds; i.e. "00" to "59"
S - English ordinal suffix, textual, 2 characters; i.e. "th", "nd"
t - number of days in the given month; i.e. "28" to "31"
T - Timezone setting of this machine; i.e. "MDT"
U - seconds since the epoch
w - day of the week, numeric, i.e. "0" (Sunday) to "6" (Saturday)
Y - year, 4 digits; i.e. "1999"
y - year, 2 digits; i.e. "99"
z - day of the year; i.e. "0" to "365"
Z - timezone offset in seconds (i.e. "-43200" to "43200")
*/


//%%%%%		LANGUAGE SPECIFIC SETTINGS   %%%%%
define('_CHARSET', 'ISO-8859-1');
define('_LANGCODE', 'pt_BR');

// change 0 to 1 if this language is a multi-bytes language
define("XOOPS_USE_MULTIBYTES", "0");
    
// Error messaging
define("_NOERRORMESSAGE", "Nenhuma mensagem de erro especificada");

// Added in XOOPS 2.2
define("_SELECTEDITOR","Selecionar editor");

define("_REMOVE", "Excluir");
define("_REQUIRED", "Requerido");
?>