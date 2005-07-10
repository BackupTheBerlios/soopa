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
//Traduzido para português do Brasil (portuguesebr) por Wilson e GibaPhp > www.xoopstotal.com.br//
//Revisado pela equipe XoopsTotal                                                               //

define("_AD_MULTIMENU_ADMIN", 	"Administração: multiMenu ");
define("_AD_MULTIMENU_EDITIMENU", 	"Editar");
define("_AD_MULTIMENU_NEWIMENU", 	"Novo Link");
define("_AD_MULTIMENU_NEW",		"Novo Link");
define("_AD_MULTIMENU_TITLE",		"Título");
define("_AD_MULTIMENU_STATUS",	"Status");
define("_AD_MULTIMENU_ONLINE",	"Online");
define("_AD_MULTIMENU_OFFLINE",	"Offline");
define("_AD_MULTIMENU_SUBMENU",	"Tipo");
define("_AD_MULTIMENU_SUBMENUEXP",	"<br /><i><font color='red'>O sublink <u>deve estar</u><br />no mesmo diretório<br />ou seja, o mesmo do link principal</font></i>");
define("_AD_MULTIMENU_SUBYES",	"Sim");
define("_AD_MULTIMENU_SUBNO",		"Não");
define("_AD_MULTIMENU_MAINLINK",	"<b>LinkPrincipal</b>");
define("_AD_MULTIMENU_SUBLINK",	"<i>Sublink Dinâmico</i>");
define("_AD_MULTIMENU_PERMSUBLINK",	"Sublink Permanente");
define("_AD_MULTIMENU_NOTE",		"Nota");
define("_AD_MULTIMENU_TARGET",	"Target");
define("_AD_MULTIMENU_GROUPS",	"Grupos");
define("_AD_MULTIMENU_LINK",		"Link <font color='red'>*</font>");
define("_AD_MULTIMENU_OPERATION",	"Funções");
define("_AD_MULTIMENU_UP",		"Cima");
define("_AD_MULTIMENU_DOWN",		"Baixo");
define("_AD_MULTIMENU_TARG_SELF",	"self");
define("_AD_MULTIMENU_TARG_BLANK",	"blank");
define("_AD_MULTIMENU_TARG_PARENT",	"parent");
define("_AD_MULTIMENU_TARG_TOP",	"top");
define("_AD_MULTIMENU_SUREDELETE",	"Tem certeza que deseja apagar este link?");
define("_AD_MULTIMENU_UPDATED",	"Banco de dados atualizado com sucesso!");
define("_AD_MULTIMENU_NOTUPDATED",	"Não foi possível atualizar o banco de dados!");
define("_AD_MULTIMENU_SUBMIT", 	"OK");
define("_AD_MULTIMENU_IMAGE", 	"Imagem <font color='red'>*</font>");

define("_AD_MULTIMENU_CATEGORY",	"Categoria");
define("_AD_MULTIMENU_NOTES",		"<font color='red'>*</font> multiMenu suporta links absolutos e relativos.<br /><br />
<b><u>Exemples</u> :</b><br /><br />
<u>Absolute URL</u> : <i>".XOOPS_URL."/modules/multiMenu/index.php</i><br />
<u>Relative URL</u> : <i>modules/multiMenu/</i><br /><br />
<table><tr><td><img src='../images/attention.png' /></td><td>Para fazer um link dinâmico funcionar,<br />é necessário adicionar ' / ' (trailin slash)<br />no fim para ligar as opçoes neste diretório!</td><tr></table><br />
<br />
Você pode usar a seguinte Tag em seu percurso para mostrar:<br />
- {theme} indica qual o tema que está sendo usado neste momento.<br />
- {module} Indica o módulo que está sendo usado neste momento.");

define("_AD_MULTIMENU_PREFERENCES", "Preferências");
define("_AD_MULTIMENU_HELP",		"Guia");

define("_AD_MULTIMENU_FATHER_INDEX","Index Pai");
define("_AD_MULTIMENU_CANTPARENT",	"Não pode aceitar esta informação de link filho!");
define("_AD_MULTIMENU_ID",		"Id");
define("_AD_MULTIMENU_PID",		"Pid");
define("_AD_MULTIMENU_BLOCK_LINK",	"Lista de Blocos visivéis");

define("_AD_MULTIMENU_GUIDET_GENERAL",	"Administração Geral");
define("_AD_MULTIMENU_GUIDET_PREF",		"Preferências");
define("_AD_MULTIMENU_GUIDET_INDEX",	"Índice");
define("_AD_MULTIMENU_GUIDET_BLOCKS",	"Blocos");

define("_AD_MULTIMENU_GUIDE_GENERAL",	"
<p align='center'><strong><font size='5'>Dicas para você usar o multiMenu ?</font>
</strong></p><br />
<br />
<strong><u>GERAL</u>
</strong>
<br />multiMenu é um gerenciador de links Multifuncional. Foi projetado para que você possa com muita facilidade criar menus e links dentro do Xoops. Para webmasters, os links podem ser adicionados em qualquer lugar na sua administração, ou diretamente em links relacionados nas páginas principais dos módulos. Esta versão 1.7 agora inclui uma interface para o sitemap, e assim irá permitir que o webmaster projete sua própria navegação.
<br />
<br />
<strong><u>CARACTERISTICAS</u>
</strong>
<br />O objetivo principal deste módulo é permitir aos webmasters que não tem habilidades de programação para gerenciar os seus menus que possam gerenciar de maneira super fácil menus feitos de forma totalmente personalizada. Outros benefícios adicionados com o uso deste módulo é a abundância de customizações que permitem ao webmaster personalizar o uso do módulo. Isto inclui menus super flexíveis em blocos permitindo muitas formas de visualização e opções de uso, e isto você poderá ver com mais detalhes mais tarde neste pequeno guia.
<br />
<br /><strong><u>CRÉDITOS</u></strong>
<br />Com respeito a este projeto e a criação deste módulo, os créditos e os agradecimentos vão a diversos xoopers mas em especial para: <br />Herv&eacute;, Marcan e Solo (pela ajuda e colaboração no desenvolvimento deste projeto).
<br />
<br />Também vai aqui o nosso agradecimento a equipe do <a href='http://www.xoopstotal.com.br'><b><font color='#0000FF'>XoopsTotal</font></b></a> pela tradução e complemento de algumas caracteristicas no projeto.
<br />
<br /> Para obter suporte em português, você poderá enviar as suas dúvidas sobre o funcionamento no <a href='http://www.xoopstotal.com.br/modules/newbb/viewforum.php?forum=10'><b><font color='#0000FF'>Fórum de Módulos</font></b></a>
<br />
<br /> Para dúvidas com relação a tradução para o português, você poderá tirar em <a href='http://www.xoopstotal.com.br/modules/newbb/viewforum.php?forum=8'><b><font color='#0000FF'>Fórum de Traduções</font></b></a>
");

define("_AD_MULTIMENU_GUIDE_PREF",	"
<p align='center'><strong><font size='5'>Dicas para uso do multiMenu ?</font></strong>
</p>
<br /><strong><u>ADMINISTRAÇÃO<br /></u></strong>
<br /><strong><u>Preferências (ou modulo de Configurações Gerais)</u>
</strong>
<br /><br />Antes de usar este módulo do multiMenu, nós sugerimos que você faça um exame muito cuidadoso nas opções de ajustes na área de admin deste módulo. Este é o lugar onde você definirá todos os ajustes funcionais e pessoais para este módulo. Aqueles ajustes têm um impacto direto nas páginas principais (mas não os ajustes necessários para as operações que serão realizadas nos blocos).
<br />
<br />
<br /><strong><em>~Mostrar Menu Principal: <br /></em></strong>
Você pode ativar ou não a opção de Sitemap aqui. Se ele estiver desativado ainda, você pode eventualmente suspender o seu uso ou usar como um módulo camuflado / falsificado e indicar qual o bloco que você quer, ou o uso será como uma homepage secundária para o seu site. Esta é uma opção muito interessante também. Tenha em mente que isto desativaria somente o Menu principal do index, e não as páginas de sub-index do sitemap.
<br />
<br />
<strong><em>~Texto de Introdução: <br /></em></strong>
Coloque o texto que você quer ver acima da página Principal inicial. Este texto aceita Xoops (Code) e também códigos de HTML. Veja como isto irá tornar totalmente flexivel a utilização e só dependerá de voce a forma de expor as suas necessidades. Pense que tudo é possivel aqui e até o uso de imagens e outras coisas interessantes.
<br />
<br />
<strong><em>~Mostrar Banners:</em></strong>
Você tem a possibilidade a indicar se quiser ou não um banner do do módulo em questão para a suas páginas. Se você quiser mudar o banner deste módulo, mude o arquivo '/module/multiMenu/images/logo.gif'.
<br />
<br />
<strong><em>~Mostra Página Principal do multiMenu (1 / 4):</em></strong>
Escolha o tipo de multiMenu que você deseja usar na página principal.
<br />
<br />
<strong><em>~Título do Menu (1 / 4): <br /></em></strong>
Defina os títulos da página principal da área de administração do multiMenu. Preste bastante atenção, este título não afetará o que está relacionado aos blocos!
<br />
<br />
<strong><em>~Mostra Barra de Navegação:</em></strong>
 <br />Uma barra da navegação com a página inicial será mostrada acima de cada página. Se você não quiser esta função, você pode desativar ele aqui neste local.
<br />
<br /><strong><em>~Largura da imagem Padrão:</em>
</strong>
<br />Coloque o valor que máximo (padrão) para o tamanho da imagem que será mostrada nas páginas iniciais. Reajustará somente as imagens que forem maiores do que estiver definido neste valor (assim, se for menor, nenhum efeito será sentido).
<br />
<br />
<br /><strong><em>~Mostra ícones:</em></strong>
<br />Ativando esta função você estará visualizando automaticamente estes ícones na frente de cada Link informado. Neste momento existem 4 tipos de Links disponivéis :<br />
<ul>
<li><img src='../images/icon/urllink_01.gif' align='absmiddle' /> Menu com Link Absoluto</li>
<li><img src='../images/icon/urllink.gif' align='absmiddle' /> Sub-Link com Menu Absoluto</li>
<li><img src='../images/icon/links_01.gif' align='absmiddle' /> Menu com Link Relativo</li>
<li><img src='../images/icon/links.gif' align='absmiddle' /> Sub-Link com Menu Relativo</li>
</ul>
<br />
<br />
<strong><em>~Menu para mostrar um Tema:<br /></em></strong>
Esta opção permite que você indique em seu multiMenu um tema para uso diretamente. Tudo que você precisa fazer para que isto funcione corretamente é introduzir esse código no seu tema atual *:
<p align='center'><font color='blue'><nobr><{include file=\"../modules/multiMenu/theme/multimenu.php\"}></nobr></font></p>
<br />
<i>* Nota: Somente ' os links do menu principal serão indicados no tema!</i>
");

define("_AD_MULTIMENU_GUIDE_INDEX",	"
<p align='center'><strong><font size='5'>Dicas para você usar o multiMenu ?</font></strong></p>
<br /><strong><u>ADMINISTRAÇÃO<br /></u></strong><br />
<strong><u>Índice do Admin</u></strong>
<br />
<br />
Há 2 (duas) diferenças aqui: Uma barra dinâmica para a navegação do módulo e o próprio multiMenu sendo editado diretamente via opção de menus.
<br />
<br />
<strong>A barra de navegação do módulo consiste de-</strong>
<ul><li> Menu principal do multiMenu</li>
<li> Preferências</li>
<li> Ajuda</li>
<li> Administrar links</li>
<li> multiMenu (varia entre 1 a 4 tipos)</li></ul><br />
Nota: Há um código de cor que indicará se o multiMenu atual será indicado ou não na página principal.<br />
<br />
Você pode navegar com todos os itens da opção do módulo e também com as barras de navegação. Tenha em mente que em cada página gerada na edição, se você for o admin do módulo, você poderá  entrar diretamente na função de edição, seja ela para retirar ou apenas para administrar.
<br />
<br />
<strong><u>Página inicial do multiMenu</u></strong><br />
<br />
Informe os links para cada multiMenu desejado. <br />
Na página principal, você pode verificar algumas informações valiosas a respeito de seus links :<br />
<ul>
<li>Imagem: Mostra uma versão reduzida de imagem a ser usada.</li>
<li>Título</li>
<li>Link</li>
<li>Status: Verde para OnLine , vermelho para fora OffLine.</li>
<li>Type</li>
<li>Funções: as principais funções do admin, editar, apagar, mover para cima e para baixo.</li>
</ul>
Os links serão mostrados na ordem em que serão visualizados. Esta ordem pode ser alterada se voce clicar nas setas verdes, para cima ou para baixo, de acordo com a sua necessidade.
<br />
<br />
Clique no 'Novo Link' para criar um novo Link.
<br />
<br />
<strong><u>Novo link</u></strong><br />
<br />
o multiMenu é projetado para criar facilmente links nos menus. Você precisa simplesmente preencher o formulário solicitado para criar um novo link.<br />
Você pode escolher e informar imagens com ou sem links, e diversas opções possíveis e diferentes de visualização para cada uma.<br />
<br />
<strong><em>~Título:</em></strong> Este é o título do Link. Você pode usar códigos de HTML (fantástico) (para colorir seus links por exemplo) ou smilies. É não está incluido a utilização completa de BBCodes.<br />
<br />
<strong><em>~Link:</em></strong> é o URL (Endereço qualificado / físico)  que você deseja que o seu link aponte. (parent) este link, o multiMenu irá adicionar automaticamente um trajeto partindo como base o seu site, de modo que, onde quer que seu bloco apareca, o URL deverá ser um link correto (Este parente só será possivel dentro do seu próprio site). <br />
<br />
<strong><em>~Imagem:</em></strong> é o URL da imagem para este link atual. Mesmo quanto um link for um (parent) ou um endereço Absoluto.  Se a Imagem não estiver disponivél ou for considerada falsificada, o multiMenu irá indicar uma imagem em vermelhor informando o problema.<br />
Nesta versão, você tem a possibilidade para usar dois tages diferentes <strong>{module}</strong> <strong>{theme}</strong>, respectivamente indicam o módulo ou o tema usado na página atual.  Esta opção permitiria que você indicasse os logos específicos a respeito do módulo ou o tema do usuário navegando no website.<br />
<br />
<strong><em>~Status:</em></strong> defina se (tipo de Status) o link pode ser visualizado ou não. As vezes você precisa deixar as coisas já prontas, mas não quer que isto seja mostrado no site ainda.<br />
<br />
<strong><em>~Tipo:</em></strong> Escolha o tipo de link que você quer para aplicar a este item de memnu em especial. Há 5 tipos diferentes de links :<br />
<ul>
<li><strong>Categoria:</strong> Mostra qual o tipo de link da categoria.</li>
<li><strong>Link Principal:</strong> tipo principal padrão do link.</li>
<li><strong>Permanente Sublink:</strong> tipo de sublink que seria indicado permanentemente.</li>
<li><strong>Dinâmico sublink:</strong> tipo de sublink que indicará dinâmicamente, a respeito do link Principal do pai.  Anote isso para fazer os links dinâmicos para trabalhar, ele é necessário para adicionar novas opções '\ / ' (trailin slash) no fim dos links principais que ligam a um diretório!
</li>
<li>Nota: Mostrará qual será o texto padrão de comentário.</li>
</ul><br />
<strong><em>~Target:</em></strong> 4 diferentes classes de tipos de target.</li><br />
<br />
<strong><em>~Grupos:</em></strong> Escolha o grupo que poderá ver ou não o link atual.</li></ul>
");

define("_AD_MULTIMENU_GUIDE_BLOCKS",	"
<p align='center'><strong><font size='5'>Dicas para você usar o multiMenu ?</font></strong></p><br />
<br />
<strong><u>Blocos do multiMenu's</u></strong><br />
<br />
Uma das características mais importantes do multiMenu é seus blocos e configurações totalmente customizadas para cada um. Como indicado acima, você tem para cada menu um bloco correspondente (varia de 1 a 4 + o admin que também tem um), mais outros 2 blocos de menu costumizados (A e B). Para cada bloco disponível, você pode ter uma escala de aplicações muito grande, tanto na exposição como nas opções.<br /><br />Ao editar um bloco do multiMenu, use a opção de  “Preferências”  , ela possui 6 categorias diferentes.<br />
<br />
<strong>1) Formato do Bloco</strong><br />
<br />
<strong><em>~Formato:</em></strong><br />
Você pode mostrar os links do multiMenu em 11 formulários diferentes:<br />
- Menu Padrão / Simples (O menu principal normal)<br />
- Drop List<br />
- Opção de Caixa<br />
- Imagens Fixadas<br />
- Imagens rolando (Rolando sem pausa)<br />
- Deslizando a Imagem (Rolando com pausa)<br />
- Lista sem ordem (sem números)<br />
- Lista Ordenada (Com números)<br />
- Lista desordenada<br />
- Lista com Desdobramento (desdobramento sem pausa)<br />
- Deslizando A Lista (Deslizando com pausa até o final)<br />
<br />
<strong><em>~Número de colunas:</em></strong><br />
Defina a quantidade de colunas que você quer ver os links em colunas.  Esta opção está somente disponível para o menu padrão e opção de imagem fixa.<br />
<br />
<strong>2) Links</strong><br />
<br />
<strong><em>~Tipo de Link a ser mostrado:</em></strong><br />
Defina que o tipo de links voce quer mostrar em  toda a categoria deste link. <br />
<strong><em>~Ordenado por:</em></strong><br />
Em que ordem você quer mostrar os seus links: por pontos (o admin é quem define a ordem) ou por ordem inversa alfabética.<br />
<br />
<strong>3) Título</strong><br />
<br />
<strong><em>~Mostra o Título:</em></strong><br />
Como Você quer mostrar o título dos links. Esta opção deve ser usada somente com links que têm uma imagem!<br />
<strong><em>~Tamanho Máximo:</em></strong><br />
Qual o tamanho máximo em caracteres deve conter  o título ? Defina o valor máximo aqui.<br />
<br />
<strong>4) Imagem</strong><br />
<br />
<strong><em>~Mostrar Imagem:</em></strong><br />
Você quer mostrar o título dos links.<br />
<strong><em>~Largura Máxima:</em></strong><br />
Ajuste a largura máxima da imagem para manter uma visão uniforme de seus menus.  Se a imagem for menor, não será renderizado (mudar tamanho e dimensões) e nenhum efeito será realizado.<br />
<br />
<strong>5) Preferências de Scroll</strong><br />
<br />Estas opções são serão valiosas se você selecionar o formato deslizante na imagem.
<strong><em>~Largura e altura do bloco:</em></strong><br />
Defina o tamanho do bloco como um todo.  Verifique a opção de largura da imagem para permitir uma configuração adequada para esta utilização.<br />
<strong><em>~Velocidade:</em><br /></strong>
Defina a velocidade geral para rolagem  de suas imagens e links. <br />
<br />
<strong>6) Links Randomicos</strong><br />
<br />
<strong><em>~Random links:</em></strong></strong><br />
O multiMenu permite a possibilidade de uso para links aleatórios, mas atenção.  Defina aqui o item que deseja ativar ou não para este tipo de visualização.  Naturalmente, estas opções devem ser usadas com cuidado se você estiver usando diversos tipos diferentes de links (por categoria, links principais, sublinks e nota) é obvio que irá trabalhar melhor se você usar apenas um tipo único de Link.<br />
<strong><em>~Número de links randômicos a ser mostrado:</em></strong><br />
Esta opção define o número de links aleatórios que será mostrado neste menu.  Tenha em mente que irá mostrar links de X (número) após as primeiras exposições escolhidas para este efeito aleatório.
<br /><br />Agradecemos por você estar escolhendo o  multiMenu, como sempre, nós ficamos muito felizes se você quiser enviar comentários e sugestões de tal modo que nós possamos continuamente melhorar a qualidade e as características deste módulo.<br /><br />- Os Autores");
?>
