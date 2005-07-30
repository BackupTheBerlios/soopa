<?php /* Brazilian Portuguese Translation by Marcelo Yuji Himoro <www.yuji.eu.org> */
// Module Info

// The name of this module

// Appended by Xoops Language Checker -GIJOE- in 2005-07-22 15:35:34
define('_MI_PROTECTOR_RELIABLE_IPS','Reliable IPs');
define('_MI_PROTECTOR_RELIABLE_IPSDSC','set IPs you can rely separated with | . ^ matches the head of string, $ matches the tail of string.');
define('_MI_PROTECTOR_BF_COUNT','Anti Brute Force');
define('_MI_PROTECTOR_BF_COUNTDSC','Set count you allow guest try to login within 10 minutes. If someone fails to login more than this number, her/his IP will be banned.');
define('_MI_PROTECTOR_DOS_SKIPMODS','Modules out of DoS/Crawler checker');
define('_MI_PROTECTOR_DOS_SKIPMODSDSC','set the dirnames of the modules separated with |. This option will be useful with chatting module etc.');

define("_MI_PROTECTOR_NAME","Xoops Protector");

// A brief description of this module
define("_MI_PROTECTOR_DESC","M�dulo para proteger o XOOPS de ataques mal-intencionados, em especial, ataques como DoS, SQL Injection e v�rios tipos de contamina��es.<br />Para usar este bloco corretamente, voc� deve coloc�-lo no topo dos blocos esquerdos (weight de menor valor) em todas as p�ginas.<br />N�o se esque�a de dar permiss�o de acesso � este bloco ao grupo de An�nimos.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_PROTECTOR_BNAME1","Protector");
define("_MI_PROTECTOR_BDESC1","Para usar este bloco corretamente, voc� deve coloc�-lo no topo dos blocos esquerdos (posi��o de menor valor) em todas as p�ginas.");

// Menu
define("_MI_PROTECTOR_ADMININDEX","Centro de prote��o");
define("_MI_PROTECTOR_ADVISORY","Guia de seguran�a");
define("_MI_PROTECTOR_PREFIXMANAGER","Gerenciador de PREFIX");

// Configs
define('_MI_PROTECTOR_GLOBAL_DISBL','Interrup��o tempor�ria de funcionamento');
define('_MI_PROTECTOR_GLOBAL_DISBLDSC','O funcionamento de todas as prote��es � suspenso temporariamente.<br />Ap�s resolver os problemas, n�o se esque�a de desativ�-la.');
define('_MI_PROTECTOR_LOG_LEVEL','N�vel de logging');
define('_MI_PROTECTOR_LOG_LEVELDSC','');

define('_MI_PROTECTOR_LOGLEVEL0','N�o gerar log');
define('_MI_PROTECTOR_LOGLEVEL15','Fazer log apenas de elementos de alto risco');
define('_MI_PROTECTOR_LOGLEVEL63','N�o fazer log de elementos de baixo risco');
define('_MI_PROTECTOR_LOGLEVEL255','Ativar logging de tudo');

define("_MI_PROTECTOR_HIJACK_DENYGP","Grupos cujos IPs ser�o banidos por mudan�a de endere�o");
define("_MI_PROTECTOR_HIJACK_DENYGPDSC","Preven��o contra session hi-jacking:<br />Escolha os grupos cujo IP ser� banido se durante uma sess�o o endere�o mudar.<br />(Recomendado: Administradores)");
define("_MI_PROTECTOR_SAN_NULLBYTE","Trocar caracteres nulos por espa�o");
define("_MI_PROTECTOR_SAN_NULLBYTEDSC","O caracter \"\\0\" fatal � usado freq�entemente em ataques maliciosos.<br />Sempre que detectado, ele ser� alterado por um espa�o.<br />(Recomendado)");
define("_MI_PROTECTOR_DIE_NULLBYTE","Encerramento for�ado de sess�o em caso de detec��o de caracteres nulos");
define("_MI_PROTECTOR_DIE_NULLBYTEDSC","O caracter \"\\0\" fatal � usado freq�entemente em ataques maliciosos.<br />(Recomendado)");
define("_MI_PROTECTOR_DIE_BADEXT","Encerramento for�ado de sess�o em caso de uploads com extens�es n�o permitidas");
define("_MI_PROTECTOR_DIE_BADEXTDSC","Quando uploads com extens�es n�o permitidas, como .php, forem realizados, a sess�o ser� apagada.<br />(N�o recomendado se usa B-Wiki ou PukiWikiMod e anexa c�digos-fonte em PHP.)");
define("_MI_PROTECTOR_CONTAMI_ACTION","Medida em caso de detec��o de ataque por contamina��o");
define("_MI_PROTECTOR_CONTAMI_ACTIONDS","Escolha o que fazer quando uma tentativa de altera��o das globais de sistema do XOOPS for detectada.<br />(Padr�o: \"Encerramento for�ado\")");
define("_MI_PROTECTOR_ISOCOM_ACTION","Medida em caso de detec��o de coment�rio isolado");
define("_MI_PROTECTOR_ISOCOM_ACTIONDSC","Preven��o contra SQL injection:<br />Escolha o que fazer quando um coment�rio isolado /* for detectado em seu par */.<br />Processo de sanitiza��o: */ � inserido no final.<br />(Recomendado: \"Sanitiza��o\")");
define("_MI_PROTECTOR_UNION_ACTION","Medida em caso de detec��o de UNION");
define("_MI_PROTECTOR_UNION_ACTIONDSC","Preven��o contra SQL injection:<br />Escolha o que fazer quando uma s�ntaxe UNION do SQL for detectada.<br />Processo de sanitiza��o: UNION � alterado para uni-on.<br />(Recomendado: \"Sanitiza��o\")");
define("_MI_PROTECTOR_ID_INTVAL","Convers�o for�ada (intval) de vari�vel ID");
define("_MI_PROTECTOR_ID_INTVALDSC","O valor da vari�vel id deve ser sempre um n�mero. Eficaz especialmente com m�dulos derivados do myLinks, protege tamb�m de alguns XSS e SQL injection. Entretanto, pode entrar em conflito com alguns m�dulos.");
define("_MI_PROTECTOR_FILE_DOTDOT","Corrigir wrapping suspeitos");
define("_MI_PROTECTOR_FILE_DOTDOTDSC","Quando um arquivo � requisitado (atrav�s de wrap), os \"..\" s�o retirados.");

define("_MI_PROTECTOR_DOS_EXPIRE","Tempo de observa��o de ataques DoS (em segundos)");
define("_MI_PROTECTOR_DOS_EXPIREDSC","Quantidade de tempo de observa��o para acompanhar a freq��ncia dos acessos de crawlers que realizam DoS e contamina��es.");

define("_MI_PROTECTOR_DOS_F5COUNT","N� de vezes para ser reconhecido como ataque F5");
define("_MI_PROTECTOR_DOS_F5COUNTDSC","Defesa contra ataques DoS:<br />Dentro do tempo de observa��o definido acima e do n� de vezes definido aqui, se houverem muitos acessos � uma mesma URL, ser� reconhecido como um ataque.");
define("_MI_PROTECTOR_DOS_F5ACTION","Medidas contra ataques F5");

define("_MI_PROTECTOR_DOS_CRCOUNT","N� de vezes para um crawler ser reconhecido como malicioso");
define("_MI_PROTECTOR_DOS_CRCOUNTDSC","Defesa contra crawlers maliciosos (como bots ca�adores de e-mails):<br />Dentro do tempo de observa��o definido acima e do n� de vezes definido aqui, se forem realizadas buscas dentro do site, ser� reconhecido como um crawler malicioso.");
define("_MI_PROTECTOR_DOS_CRACTION","Medidas contra crawlers maliciosos");

define("_MI_PROTECTOR_DOS_CRSAFE","User-Agent permitidos");
define("_MI_PROTECTOR_DOS_CRSAFEDSC","Por ser incondicional, insira o nome dos prov�veis crawlers com uma perl regex pattern.<br />Ex.:) /(msnbot|Googlebot|Yahoo! Slurp)/i");

define("_MI_PROTECTOR_OPT_NONE","Nenhuma (apenas criar log)");
define("_MI_PROTECTOR_OPT_SAN","Sanitiza��o");
define("_MI_PROTECTOR_OPT_EXIT","Encerramento for�ado");
define("_MI_PROTECTOR_OPT_BIP","Banimento de IP");

define("_MI_PROTECTOR_DOSOPT_NONE","Nenhuma (apenas criar log)");
define("_MI_PROTECTOR_DOSOPT_SLEEP","Sleep");
define("_MI_PROTECTOR_DOSOPT_EXIT","exit");
define("_MI_PROTECTOR_DOSOPT_BIP","Adicionar como IP banido");
define('_MI_PROTECTOR_DOSOPT_HTA','DENY atrav�s de .htaccess (experimental)');

define("_MI_PROTECTOR_BIP_EXCEPT","Grupos cujos IPs n�o devem ser banidos");
define("_MI_PROTECTOR_BIP_EXCEPTDSC","Mesmo quando a condi��o for satisfeita, os grupos de usu�rios selecionados aqui n�o ser�o banidos. Entretanto, se estes usu�rios n�o fizerem login, esta op��o n�o ter� efeito algum. (Recomendado: Administradores)");
define("_MI_PROTECTOR_PATCH2092","Patches contra brechas no XOOPS <= 2.0.9.2");
define("_MI_PROTECTOR_PASSWD_BIP","Senha de restaura��o");
define("_MI_PROTECTOR_PASSWD_BIPDSC","Esta � a forma de restaura��o se, por alguma raz�o, voc� mesmo for adicionado aos IPs banidos do XOOPS.<br />Acesse XOOPS_URL/modules/protector/admin/rescue.php, e insira a senha definida aqui.<br />Se nenhuma senha for definida nesta op��o, o efeito desta op��o ser� anulado. Tenha cuidado!");
?>