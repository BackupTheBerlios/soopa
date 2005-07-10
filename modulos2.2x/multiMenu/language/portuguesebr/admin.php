<?php
//  ------------------------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System			                            	//
//                    Copyright (c) 2004 XOOPS.org					                            //
//                       <http://www.xoops.org/>					                            //
//													                                            //
//                  Authors :									                                //
//						- solo (www.wolfpackclan.com)			                                //
//                                 	- herve (www.herve-thouzard.com)                    		//
//                  multiMenu v1.7						                                		//
//  ----------------------------------------------------------------------------------------	//
//Traduzido para portugu�s do Brasil (portuguesebr) por Wilson e GibaPhp > www.xoopstotal.com.br//
//Revisado pela equipe XoopsTotal                                                               //

define("_AD_MULTIMENU_ADMIN", 	"Administra��o: multiMenu ");
define("_AD_MULTIMENU_EDITIMENU", 	"Editar");
define("_AD_MULTIMENU_NEWIMENU", 	"Novo Link");
define("_AD_MULTIMENU_NEW",		"Novo Link");
define("_AD_MULTIMENU_TITLE",		"T�tulo");
define("_AD_MULTIMENU_STATUS",	"Status");
define("_AD_MULTIMENU_ONLINE",	"Online");
define("_AD_MULTIMENU_OFFLINE",	"Offline");
define("_AD_MULTIMENU_SUBMENU",	"Tipo");
define("_AD_MULTIMENU_SUBMENUEXP",	"<br /><i><font color='red'>O sublink <u>deve estar</u><br />no mesmo diret�rio<br />ou seja, o mesmo do link principal</font></i>");
define("_AD_MULTIMENU_SUBYES",	"Sim");
define("_AD_MULTIMENU_SUBNO",		"N�o");
define("_AD_MULTIMENU_MAINLINK",	"<b>LinkPrincipal</b>");
define("_AD_MULTIMENU_SUBLINK",	"<i>Sublink Din�mico</i>");
define("_AD_MULTIMENU_PERMSUBLINK",	"Sublink Permanente");
define("_AD_MULTIMENU_NOTE",		"Nota");
define("_AD_MULTIMENU_TARGET",	"Target");
define("_AD_MULTIMENU_GROUPS",	"Grupos");
define("_AD_MULTIMENU_LINK",		"Link <font color='red'>*</font>");
define("_AD_MULTIMENU_OPERATION",	"Fun��es");
define("_AD_MULTIMENU_UP",		"Cima");
define("_AD_MULTIMENU_DOWN",		"Baixo");
define("_AD_MULTIMENU_TARG_SELF",	"self");
define("_AD_MULTIMENU_TARG_BLANK",	"blank");
define("_AD_MULTIMENU_TARG_PARENT",	"parent");
define("_AD_MULTIMENU_TARG_TOP",	"top");
define("_AD_MULTIMENU_SUREDELETE",	"Tem certeza que deseja apagar este link?");
define("_AD_MULTIMENU_UPDATED",	"Banco de dados atualizado com sucesso!");
define("_AD_MULTIMENU_NOTUPDATED",	"N�o foi poss�vel atualizar o banco de dados!");
define("_AD_MULTIMENU_SUBMIT", 	"OK");
define("_AD_MULTIMENU_IMAGE", 	"Imagem <font color='red'>*</font>");

define("_AD_MULTIMENU_CATEGORY",	"Categoria");
define("_AD_MULTIMENU_NOTES",		"<font color='red'>*</font> multiMenu suporta links absolutos e relativos.<br /><br />
<b><u>Exemples</u> :</b><br /><br />
<u>Absolute URL</u> : <i>".XOOPS_URL."/modules/multiMenu/index.php</i><br />
<u>Relative URL</u> : <i>modules/multiMenu/</i><br /><br />
<table><tr><td><img src='../images/attention.png' /></td><td>Para fazer um link din�mico funcionar,<br />� necess�rio adicionar ' / ' (trailin slash)<br />no fim para ligar as op�oes neste diret�rio!</td><tr></table><br />
<br />
Voc� pode usar a seguinte Tag em seu percurso para mostrar:<br />
- {theme} indica qual o tema que est� sendo usado neste momento.<br />
- {module} Indica o m�dulo que est� sendo usado neste momento.");

define("_AD_MULTIMENU_PREFERENCES", "Prefer�ncias");
define("_AD_MULTIMENU_HELP",		"Guia");

define("_AD_MULTIMENU_FATHER_INDEX","Index Pai");
define("_AD_MULTIMENU_CANTPARENT",	"N�o pode aceitar esta informa��o de link filho!");
define("_AD_MULTIMENU_ID",		"Id");
define("_AD_MULTIMENU_PID",		"Pid");
define("_AD_MULTIMENU_BLOCK_LINK",	"Lista de Blocos visiv�is");

define("_AD_MULTIMENU_GUIDET_GENERAL",	"Administra��o Geral");
define("_AD_MULTIMENU_GUIDET_PREF",		"Prefer�ncias");
define("_AD_MULTIMENU_GUIDET_INDEX",	"�ndice");
define("_AD_MULTIMENU_GUIDET_BLOCKS",	"Blocos");

define("_AD_MULTIMENU_GUIDE_GENERAL",	"
<p align='center'><strong><font size='5'>Dicas para voc� usar o multiMenu ?</font>
</strong></p><br />
<br />
<strong><u>GERAL</u>
</strong>
<br />multiMenu � um gerenciador de links Multifuncional. Foi projetado para que voc� possa com muita facilidade criar menus e links dentro do Xoops. Para webmasters, os links podem ser adicionados em qualquer lugar na sua administra��o, ou diretamente em links relacionados nas p�ginas principais dos m�dulos. Esta vers�o 1.7 agora inclui uma interface para o sitemap, e assim ir� permitir que o webmaster projete sua pr�pria navega��o.
<br />
<br />
<strong><u>CARACTERISTICAS</u>
</strong>
<br />O objetivo principal deste m�dulo � permitir aos webmasters que n�o tem habilidades de programa��o para gerenciar os seus menus que possam gerenciar de maneira super f�cil menus feitos de forma totalmente personalizada. Outros benef�cios adicionados com o uso deste m�dulo � a abund�ncia de customiza��es que permitem ao webmaster personalizar o uso do m�dulo. Isto inclui menus super flex�veis em blocos permitindo muitas formas de visualiza��o e op��es de uso, e isto voc� poder� ver com mais detalhes mais tarde neste pequeno guia.
<br />
<br /><strong><u>CR�DITOS</u></strong>
<br />Com respeito a este projeto e a cria��o deste m�dulo, os cr�ditos e os agradecimentos v�o a diversos xoopers mas em especial para: <br />Herv&eacute;, Marcan e Solo (pela ajuda e colabora��o no desenvolvimento deste projeto).
<br />
<br />Tamb�m vai aqui o nosso agradecimento a equipe do <a href='http://www.xoopstotal.com.br'><b><font color='#0000FF'>XoopsTotal</font></b></a> pela tradu��o e complemento de algumas caracteristicas no projeto.
<br />
<br /> Para obter suporte em portugu�s, voc� poder� enviar as suas d�vidas sobre o funcionamento no <a href='http://www.xoopstotal.com.br/modules/newbb/viewforum.php?forum=10'><b><font color='#0000FF'>F�rum de M�dulos</font></b></a>
<br />
<br /> Para d�vidas com rela��o a tradu��o para o portugu�s, voc� poder� tirar em <a href='http://www.xoopstotal.com.br/modules/newbb/viewforum.php?forum=8'><b><font color='#0000FF'>F�rum de Tradu��es</font></b></a>
");

define("_AD_MULTIMENU_GUIDE_PREF",	"
<p align='center'><strong><font size='5'>Dicas para uso do multiMenu ?</font></strong>
</p>
<br /><strong><u>ADMINISTRA��O<br /></u></strong>
<br /><strong><u>Prefer�ncias (ou modulo de Configura��es Gerais)</u>
</strong>
<br /><br />Antes de usar este m�dulo do multiMenu, n�s sugerimos que voc� fa�a um exame muito cuidadoso nas op��es de ajustes na �rea de admin deste m�dulo. Este � o lugar onde voc� definir� todos os ajustes funcionais e pessoais para este m�dulo. Aqueles ajustes t�m um impacto direto nas p�ginas principais (mas n�o os ajustes necess�rios para as opera��es que ser�o realizadas nos blocos).
<br />
<br />
<br /><strong><em>~Mostrar Menu Principal: <br /></em></strong>
Voc� pode ativar ou n�o a op��o de Sitemap aqui. Se ele estiver desativado ainda, voc� pode eventualmente suspender o seu uso ou usar como um m�dulo camuflado / falsificado e indicar qual o bloco que voc� quer, ou o uso ser� como uma homepage secund�ria para o seu site. Esta � uma op��o muito interessante tamb�m. Tenha em mente que isto desativaria somente o Menu principal do index, e n�o as p�ginas de sub-index do sitemap.
<br />
<br />
<strong><em>~Texto de Introdu��o: <br /></em></strong>
Coloque o texto que voc� quer ver acima da p�gina Principal inicial. Este texto aceita Xoops (Code) e tamb�m c�digos de HTML. Veja como isto ir� tornar totalmente flexivel a utiliza��o e s� depender� de voce a forma de expor as suas necessidades. Pense que tudo � possivel aqui e at� o uso de imagens e outras coisas interessantes.
<br />
<br />
<strong><em>~Mostrar Banners:</em></strong>
Voc� tem a possibilidade a indicar se quiser ou n�o um banner do do m�dulo em quest�o para a suas p�ginas. Se voc� quiser mudar o banner deste m�dulo, mude o arquivo '/module/multiMenu/images/logo.gif'.
<br />
<br />
<strong><em>~Mostra P�gina Principal do multiMenu (1 / 4):</em></strong>
Escolha o tipo de multiMenu que voc� deseja usar na p�gina principal.
<br />
<br />
<strong><em>~T�tulo do Menu (1 / 4): <br /></em></strong>
Defina os t�tulos da p�gina principal da �rea de administra��o do multiMenu. Preste bastante aten��o, este t�tulo n�o afetar� o que est� relacionado aos blocos!
<br />
<br />
<strong><em>~Mostra Barra de Navega��o:</em></strong>
 <br />Uma barra da navega��o com a p�gina inicial ser� mostrada acima de cada p�gina. Se voc� n�o quiser esta fun��o, voc� pode desativar ele aqui neste local.
<br />
<br /><strong><em>~Largura da imagem Padr�o:</em>
</strong>
<br />Coloque o valor que m�ximo (padr�o) para o tamanho da imagem que ser� mostrada nas p�ginas iniciais. Reajustar� somente as imagens que forem maiores do que estiver definido neste valor (assim, se for menor, nenhum efeito ser� sentido).
<br />
<br />
<br /><strong><em>~Mostra �cones:</em></strong>
<br />Ativando esta fun��o voc� estar� visualizando automaticamente estes �cones na frente de cada Link informado. Neste momento existem 4 tipos de Links disponiv�is :<br />
<ul>
<li><img src='../images/icon/urllink_01.gif' align='absmiddle' /> Menu com Link Absoluto</li>
<li><img src='../images/icon/urllink.gif' align='absmiddle' /> Sub-Link com Menu Absoluto</li>
<li><img src='../images/icon/links_01.gif' align='absmiddle' /> Menu com Link Relativo</li>
<li><img src='../images/icon/links.gif' align='absmiddle' /> Sub-Link com Menu Relativo</li>
</ul>
<br />
<br />
<strong><em>~Menu para mostrar um Tema:<br /></em></strong>
Esta op��o permite que voc� indique em seu multiMenu um tema para uso diretamente. Tudo que voc� precisa fazer para que isto funcione corretamente � introduzir esse c�digo no seu tema atual *:
<p align='center'><font color='blue'><nobr><{include file=\"../modules/multiMenu/theme/multimenu.php\"}></nobr></font></p>
<br />
<i>* Nota: Somente ' os links do menu principal ser�o indicados no tema!</i>
");

define("_AD_MULTIMENU_GUIDE_INDEX",	"
<p align='center'><strong><font size='5'>Dicas para voc� usar o multiMenu ?</font></strong></p>
<br /><strong><u>ADMINISTRA��O<br /></u></strong><br />
<strong><u>�ndice do Admin</u></strong>
<br />
<br />
H� 2 (duas) diferen�as aqui: Uma barra din�mica para a navega��o do m�dulo e o pr�prio multiMenu sendo editado diretamente via op��o de menus.
<br />
<br />
<strong>A barra de navega��o do m�dulo consiste de-</strong>
<ul><li> Menu principal do multiMenu</li>
<li> Prefer�ncias</li>
<li> Ajuda</li>
<li> Administrar links</li>
<li> multiMenu (varia entre 1 a 4 tipos)</li></ul><br />
Nota: H� um c�digo de cor que indicar� se o multiMenu atual ser� indicado ou n�o na p�gina principal.<br />
<br />
Voc� pode navegar com todos os itens da op��o do m�dulo e tamb�m com as barras de navega��o. Tenha em mente que em cada p�gina gerada na edi��o, se voc� for o admin do m�dulo, voc� poder�  entrar diretamente na fun��o de edi��o, seja ela para retirar ou apenas para administrar.
<br />
<br />
<strong><u>P�gina inicial do multiMenu</u></strong><br />
<br />
Informe os links para cada multiMenu desejado. <br />
Na p�gina principal, voc� pode verificar algumas informa��es valiosas a respeito de seus links :<br />
<ul>
<li>Imagem: Mostra uma vers�o reduzida de imagem a ser usada.</li>
<li>T�tulo</li>
<li>Link</li>
<li>Status: Verde para OnLine , vermelho para fora OffLine.</li>
<li>Type</li>
<li>Fun��es: as principais fun��es do admin, editar, apagar, mover para cima e para baixo.</li>
</ul>
Os links ser�o mostrados na ordem em que ser�o visualizados. Esta ordem pode ser alterada se voce clicar nas setas verdes, para cima ou para baixo, de acordo com a sua necessidade.
<br />
<br />
Clique no 'Novo Link' para criar um novo Link.
<br />
<br />
<strong><u>Novo link</u></strong><br />
<br />
o multiMenu � projetado para criar facilmente links nos menus. Voc� precisa simplesmente preencher o formul�rio solicitado para criar um novo link.<br />
Voc� pode escolher e informar imagens com ou sem links, e diversas op��es poss�veis e diferentes de visualiza��o para cada uma.<br />
<br />
<strong><em>~T�tulo:</em></strong> Este � o t�tulo do Link. Voc� pode usar c�digos de HTML (fant�stico) (para colorir seus links por exemplo) ou smilies. � n�o est� incluido a utiliza��o completa de BBCodes.<br />
<br />
<strong><em>~Link:</em></strong> � o URL (Endere�o qualificado / f�sico)  que voc� deseja que o seu link aponte. (parent) este link, o multiMenu ir� adicionar automaticamente um trajeto partindo como base o seu site, de modo que, onde quer que seu bloco apareca, o URL dever� ser um link correto (Este parente s� ser� possivel dentro do seu pr�prio site). <br />
<br />
<strong><em>~Imagem:</em></strong> � o URL da imagem para este link atual. Mesmo quanto um link for um (parent) ou um endere�o Absoluto.  Se a Imagem n�o estiver disponiv�l ou for considerada falsificada, o multiMenu ir� indicar uma imagem em vermelhor informando o problema.<br />
Nesta vers�o, voc� tem a possibilidade para usar dois tages diferentes <strong>{module}</strong> <strong>{theme}</strong>, respectivamente indicam o m�dulo ou o tema usado na p�gina atual.  Esta op��o permitiria que voc� indicasse os logos espec�ficos a respeito do m�dulo ou o tema do usu�rio navegando no website.<br />
<br />
<strong><em>~Status:</em></strong> defina se (tipo de Status) o link pode ser visualizado ou n�o. As vezes voc� precisa deixar as coisas j� prontas, mas n�o quer que isto seja mostrado no site ainda.<br />
<br />
<strong><em>~Tipo:</em></strong> Escolha o tipo de link que voc� quer para aplicar a este item de memnu em especial. H� 5 tipos diferentes de links :<br />
<ul>
<li><strong>Categoria:</strong> Mostra qual o tipo de link da categoria.</li>
<li><strong>Link Principal:</strong> tipo principal padr�o do link.</li>
<li><strong>Permanente Sublink:</strong> tipo de sublink que seria indicado permanentemente.</li>
<li><strong>Din�mico sublink:</strong> tipo de sublink que indicar� din�micamente, a respeito do link Principal do pai.  Anote isso para fazer os links din�micos para trabalhar, ele � necess�rio para adicionar novas op��es '\ / ' (trailin slash) no fim dos links principais que ligam a um diret�rio!
</li>
<li>Nota: Mostrar� qual ser� o texto padr�o de coment�rio.</li>
</ul><br />
<strong><em>~Target:</em></strong> 4 diferentes classes de tipos de target.</li><br />
<br />
<strong><em>~Grupos:</em></strong> Escolha o grupo que poder� ver ou n�o o link atual.</li></ul>
");

define("_AD_MULTIMENU_GUIDE_BLOCKS",	"
<p align='center'><strong><font size='5'>Dicas para voc� usar o multiMenu ?</font></strong></p><br />
<br />
<strong><u>Blocos do multiMenu's</u></strong><br />
<br />
Uma das caracter�sticas mais importantes do multiMenu � seus blocos e configura��es totalmente customizadas para cada um. Como indicado acima, voc� tem para cada menu um bloco correspondente (varia de 1 a 4 + o admin que tamb�m tem um), mais outros 2 blocos de menu costumizados (A e B). Para cada bloco dispon�vel, voc� pode ter uma escala de aplica��es muito grande, tanto na exposi��o como nas op��es.<br /><br />Ao editar um bloco do multiMenu, use a op��o de  �Prefer�ncias�  , ela possui 6 categorias diferentes.<br />
<br />
<strong>1) Formato do Bloco</strong><br />
<br />
<strong><em>~Formato:</em></strong><br />
Voc� pode mostrar os links do multiMenu em 11 formul�rios diferentes:<br />
- Menu Padr�o / Simples (O menu principal normal)<br />
- Drop List<br />
- Op��o de Caixa<br />
- Imagens Fixadas<br />
- Imagens rolando (Rolando sem pausa)<br />
- Deslizando a Imagem (Rolando com pausa)<br />
- Lista sem ordem (sem n�meros)<br />
- Lista Ordenada (Com n�meros)<br />
- Lista desordenada<br />
- Lista com Desdobramento (desdobramento sem pausa)<br />
- Deslizando A Lista (Deslizando com pausa at� o final)<br />
<br />
<strong><em>~N�mero de colunas:</em></strong><br />
Defina a quantidade de colunas que voc� quer ver os links em colunas.  Esta op��o est� somente dispon�vel para o menu padr�o e op��o de imagem fixa.<br />
<br />
<strong>2) Links</strong><br />
<br />
<strong><em>~Tipo de Link a ser mostrado:</em></strong><br />
Defina que o tipo de links voce quer mostrar em  toda a categoria deste link. <br />
<strong><em>~Ordenado por:</em></strong><br />
Em que ordem voc� quer mostrar os seus links: por pontos (o admin � quem define a ordem) ou por ordem inversa alfab�tica.<br />
<br />
<strong>3) T�tulo</strong><br />
<br />
<strong><em>~Mostra o T�tulo:</em></strong><br />
Como Voc� quer mostrar o t�tulo dos links. Esta op��o deve ser usada somente com links que t�m uma imagem!<br />
<strong><em>~Tamanho M�ximo:</em></strong><br />
Qual o tamanho m�ximo em caracteres deve conter  o t�tulo ? Defina o valor m�ximo aqui.<br />
<br />
<strong>4) Imagem</strong><br />
<br />
<strong><em>~Mostrar Imagem:</em></strong><br />
Voc� quer mostrar o t�tulo dos links.<br />
<strong><em>~Largura M�xima:</em></strong><br />
Ajuste a largura m�xima da imagem para manter uma vis�o uniforme de seus menus.  Se a imagem for menor, n�o ser� renderizado (mudar tamanho e dimens�es) e nenhum efeito ser� realizado.<br />
<br />
<strong>5) Prefer�ncias de Scroll</strong><br />
<br />Estas op��es s�o ser�o valiosas se voc� selecionar o formato deslizante na imagem.
<strong><em>~Largura e altura do bloco:</em></strong><br />
Defina o tamanho do bloco como um todo.  Verifique a op��o de largura da imagem para permitir uma configura��o adequada para esta utiliza��o.<br />
<strong><em>~Velocidade:</em><br /></strong>
Defina a velocidade geral para rolagem  de suas imagens e links. <br />
<br />
<strong>6) Links Randomicos</strong><br />
<br />
<strong><em>~Random links:</em></strong></strong><br />
O multiMenu permite a possibilidade de uso para links aleat�rios, mas aten��o.  Defina aqui o item que deseja ativar ou n�o para este tipo de visualiza��o.  Naturalmente, estas op��es devem ser usadas com cuidado se voc� estiver usando diversos tipos diferentes de links (por categoria, links principais, sublinks e nota) � obvio que ir� trabalhar melhor se voc� usar apenas um tipo �nico de Link.<br />
<strong><em>~N�mero de links rand�micos a ser mostrado:</em></strong><br />
Esta op��o define o n�mero de links aleat�rios que ser� mostrado neste menu.  Tenha em mente que ir� mostrar links de X (n�mero) ap�s as primeiras exposi��es escolhidas para este efeito aleat�rio.
<br /><br />Agradecemos por voc� estar escolhendo o  multiMenu, como sempre, n�s ficamos muito felizes se voc� quiser enviar coment�rios e sugest�es de tal modo que n�s possamos continuamente melhorar a qualidade e as caracter�sticas deste m�dulo.<br /><br />- Os Autores");
?>
