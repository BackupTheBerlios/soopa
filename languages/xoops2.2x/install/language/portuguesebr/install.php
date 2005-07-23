<?php
// $Id: install.php,v 1.3 2005/07/23 16:26:03 mauriciodelima Exp $
define("_INSTALL_L0","<span style='color: #2F5376; font-size: 13pt'><center>Bem-vindo ao assistente de instala��o do XOOPS 2.1</center></span>");
define("_INSTALL_L70","Altere as permiss�es do arquivo <b><font color='#2F5376'>/mainfile.php</font></b> para que seja execut�vel pelo servidor (Por exemplo: CHMOD 777 mainfile.php em um servidor UNIX/LINUX, ou, no caso de um servidor Windows, verifique se o arquivo n�o est� marcado como Somente Leitura (Read Only). Atualize esta p�gina depois que ajustar as configura��es.");
//define("_INSTALL_L71","Click on the button below to begin the installation.");
define("_INSTALL_L1","Abra o arquivo <b><font color='#2F5376'>/mainfile.php</font></b> com seu editor de textos e procure na linha 33 o seguinte c�digo:");
define("_INSTALL_L2","Altere essa linha para: ");
define("_INSTALL_L3","Na linha 37, altere de %s para %s");
define("_INSTALL_L4","Altera��es efetuadas. Tentar novamente.");
define("_INSTALL_L5","ATEN��O!");
define("_INSTALL_L6","A configura��o de XOOPS_ROOT_PATH na linha 33 do arquivo <b><font color='#2F5376'>/mainfile.php</font></b> difere do diret�rio-raiz (root) detectado pelo XOOPS.");
define("_INSTALL_L7","A sua configura��o: ");
define("_INSTALL_L8","Foi detectado: ");
define("_INSTALL_L9","(em um sistema operacional Microsoft, esse erro pode ocorrer mesmo que sua configura��o esteja correta. Se este � seu caso, clique em CONTINUAR.)");
define("_INSTALL_L10","Clique no bot�o abaixo se isto estiver correto.");
define("_INSTALL_L11","Caminho f�sico do diret�rio-raiz (root) do XOOPS no servidor: ");
define("_INSTALL_L12","URL do diret�rio-raiz (root) do XOOPS: ");
define("_INSTALL_L13","Se as configura��es acima estiverem corretas, clique em CONTINUAR.");
define("_INSTALL_L14","Pr�ximo �");
define("_INSTALL_L15","Abra o arquivo <b><font color='#2F5376'>/mainfile.php</font></b> e fa�a as altera��es solicitadas");
define("_INSTALL_L16","%s � o endere�o do seu servidor de banco de dados.");
define("_INSTALL_L17","%s � o nome do usu�rio do banco de dados.");
define("_INSTALL_L18","%s � a senha de acesso ao banco de dados.");
define("_INSTALL_L19","%s � o nome do banco de dados onde ser�o criadas as tabelas do XOOPS.");
define("_INSTALL_L20","%s � o prefixo das tabelas que ser�o criadas durante a instala��o.");
define("_INSTALL_L21","O banco de dados abaixo n�o foi localizado no servidor:");
define("_INSTALL_L22","Clique em CONTINUAR para cri�-lo?");
define("_INSTALL_L23","Sim");
define("_INSTALL_L24","N�o");
define("_INSTALL_L25","N�s detectamos a seguinte informa��o do banco de dados no arquivo <b><font color='#2F5376'>/mainfile.php</font></b>. Altere essa configura��o, se n�o estiver correta.");
define("_INSTALL_L26","Configura��o do banco de dados");
define("_INSTALL_L51","Banco de dados");
define("_INSTALL_L66","Selecione o tipo de banco de dados que ser� utilizado");
define("_INSTALL_L27","Servidor de banco de dados");
define("_INSTALL_L67","Endere�o do servidor do banco de dados (localhost ou outro fornecido pelo provedor)");
define("_INSTALL_L28","Nome de usu�rio do banco de dados");
define("_INSTALL_L65","Nome de usu�rio do banco de dados cadastrado no provedor de hospedagem");
define("_INSTALL_L29","Nome do banco de dados");
define("_INSTALL_L64","O assistente de instala��o criar� um novo banco de dados, se n�o existir.");
define("_INSTALL_L52","Senha do banco de dados");
define("_INSTALL_L68","Senha de acesso ao banco de dados cadastrada no provedor de hospedagem");
define("_INSTALL_L30","Prefixo das tabelas");
define("_INSTALL_L63","Prefixo que ser� usado nas novas tabelas. Se voc� n�o sabe do que se trata, deixe o prefixo-padr�o.");
define("_INSTALL_L54","Usar conex�o persistente?");
define("_INSTALL_L69","Em uma conex�o persistente o XOOPS usar� a fun��o PHP <a href='http://br.php.net/manual/pt_BR/function.mysql-pconnect.php'>mysql_pconnect</a> em vez de <a href='http://br.php.net/manual/pt_BR/function.mysql-connect.php'>mysql_connect</a>. Se voc� n�o sabe do que se trata, deixe como N�O.");
define("_INSTALL_L55","Caminho f�sico do XOOPS");
define("_INSTALL_L59","Caminho f�sico do diret�rio-raiz do XOOPS, sem / no final.");
define("_INSTALL_L56","Caminho virtual do XOOPS (URL)");
define("_INSTALL_L58","Caminho virtual do diret�rio-raiz do XOOPS, sem / no final.");

define("_INSTALL_L31","N�o foi poss�vel a cria��o do banco de dados.<br>Verifique as configura��es ou contate o provedor de hospedagem.");
define("_INSTALL_L32","<span style='color: #2F5376; font-size: 13pt'><center>O XOOPS 2.0 foi instalado com sucesso!</center></span>");
define("_INSTALL_L33","Clique <a href='../index.php'><span style='color: #2F5376; font-size: 13pt'>AQUI</span></a> para exibir a p�gina principal do seu site.");
define("_INSTALL_L35","Se voc� encontrou algum erro. Utilize o f�rum do <a href='http://www.xoopsbr.org/' target='_blank'>Xoops Total</a>, comunidade de suporte ao XOOPS no Brasil.");
define("_INSTALL_L36","Informe o nome e senha do administrador do site.");
define("_INSTALL_L37","Nome do Administrador");
define("_INSTALL_L167", "Login do Administrador");
define("_INSTALL_L38","e-mail");
define("_INSTALL_L39","Senha");
define("_INSTALL_L74","Confirma��o da Senha");
define("_INSTALL_L40","Criar tabelas");
define("_INSTALL_L41","Retorne e altere as informa��es solicitadas.");
define("_INSTALL_L42","Voltar");
define("_INSTALL_L57","Por favor para prosseguir vc precisar� informar o �tem baixo:<br><b><font color='#2F5376'>%s</font></b>");

// %s is database name
define("_INSTALL_L43","Banco de dados <b><font color='#2F5376'>%s</font></b> criado.");

// %s is table name
define("_INSTALL_L44","N�o foi poss�vel criar <b><font color='#2F5376'>%s</font></b>");
define("_INSTALL_L45","Tabela <b><font color='#2F5376'>%s</font></b> criada");

define("_INSTALL_L46","Para que os m�dulos XOOPS funcionem corretamente, os arquivos abaixo devem ter permiss�o de leitura/grava��o pelo servidor. (Por exemplo: CHMOD 777 em servidor Linux)");
define("_INSTALL_L47","Pr�ximo");

define("_INSTALL_L53","<span style='color: #2F5376; font-size: 12pt'>3. Confirma��o dos dados informados</span>");

define("_INSTALL_L60","N�o foi poss�vel gravar no arquivo <b><font color='#2F5376'>/mainfile.php</font></b>. Verifique as permiss�es do arquivo e tente novamente.");
define("_INSTALL_L61","N�o foi poss�vel acessar o arquivo <b><font color='#2F5376'>/mainfile.php</font></b>. Verifique novamente as configura��es ou contate o provedor de hospedagem.");
define("_INSTALL_L62","A configura��o foi gravada no arquivo <b><font color='#2F5376'>/mainfile.php</font></b>.");
define("_INSTALL_L72","Os diret�rios abaixo devem criados com permiss�o escrita pelo servidor (Por exemplo: CHMOD 777 em servidor Linux)");
define("_INSTALL_L73","Endere�o de e-mail inv�lido.");

// add by haruki
define("_INSTALL_L80","Iniciar instala��o");
define("_INSTALL_L81","Verificar permiss�es dos arquivos");
define("_INSTALL_L82","<span style='color: #2F5376; font-size: 12pt'>1. Verifica��o das permiss�es de diret�rios e arquivos</span>");
define("_INSTALL_L83","Arquivo <b><font color='#2F5376'>%s</font></b> n�o tem permiss�o de grava��o.");
define("_INSTALL_L84","Arquivo <b><font color='#2F5376'>%s</font></b> com permiss�o de grava��o.");
define("_INSTALL_L85","Grava��o n�o permitida no diret�rio <b><font color='#2F5376'>%s</font></b>.");
define("_INSTALL_L86","Grava��o permitida em <b><font color='#2F5376'>%s</font></b>.");
define("_INSTALL_L87","A configura��o est� correta.");
define("_INSTALL_L89","Configura��o geral");
define("_INSTALL_L90","<span style='color: #2F5376; font-size: 12pt'>2. Configura��o geral</span>");
define("_INSTALL_L91","Confirmar");
define("_INSTALL_L92","Gravar configura��o");
define("_INSTALL_L93","Alterar configura��o");
define("_INSTALL_L88","Grava��o das configura��es");
define("_INSTALL_L94","Verifica��o do caminho f�sico e URL");
define("_INSTALL_L127","Verificar caminho f�sico e URL");
define("_INSTALL_L95","N�o foi poss�vel detectar o caminho f�sico para o diret�rio-raiz do XOOPS.");
define("_INSTALL_L96","O caminho f�sico informado � diferente do detectado (<b>%s</b>).");
define("_INSTALL_L97","<b>O caminho f�sico</b> est� correto.");

define("_INSTALL_L99","<b>O caminho f�sico</b> deve ser um diret�rio.");
define("_INSTALL_L100","<b>O caminho virtual</b> � uma URL v�lida.");
define("_INSTALL_L101","<b>O caminho virtual</b> n�o � uma URL v�lida.");
define("_INSTALL_L102","Verifica��o do banco de dados");
define("_INSTALL_L103","Reiniciar");
define("_INSTALL_L104","Verificar banco de dados");
define("_INSTALL_L105","Criar banco de dados");
define("_INSTALL_L106","N�o foi poss�vel a conex�o com o servidor de banco de dados.");
define("_INSTALL_L107","Clique em VOLTAR e verifique a configura��o do banco de dados.");
define("_INSTALL_L108","O XOOPS conseguiu conectar ao servidor de banco de dados.");
define("_INSTALL_L109","O banco de dados <b><font color='#2F5376'>%s</font></b> n�o existe.");
define("_INSTALL_L110","O banco de dados <b><font color='#2F5376'>%s</font></b> existe, e foi poss�vel efetuar uma conex�o.");
define("_INSTALL_L111","A conex�o com o banco de dados foi realizada corretamente.<br>Clique em CONTINUAR para criar as tabelas.");
define("_INSTALL_L112","Cadastrar administrador");
define("_INSTALL_L113","Tabela <b><font color='#2F5376'>%s</font></b> apagada.");
define("_INSTALL_L114","Erro na cria��o das tabelas do banco de dados.");
define("_INSTALL_L115","Tabelas criadas corretamente no banco de dados.");
define("_INSTALL_L116","7. Inclus�o de dados nas tabelas");
define("_INSTALL_L117","Finalizar");

define("_INSTALL_L118","Erro ao criar a tabela <b><font color='#2F5376'>%s</font></b>.");
define("_INSTALL_L119","%d inser��es na tabela <b><font color='#2F5376'>%s</font></b>.");
define("_INSTALL_L120","Erro! N�o foi poss�vel inserir %d registros na tabela <b><font color='#2F5376'>%s</font></b>.");

define("_INSTALL_L121","Constante <b><font color='#2F5376'>%s</font></b> gravada com valor <b>%s</b>.");
define("_INSTALL_L122","Erro! N�o foi poss�vel gravar a constante <b><font color='#2F5376'>%s</font></b>.");

define("_INSTALL_L123","O arquivo <b><font color='#2F5376'>%s</font></b> foi gravado no diret�rio <b>/cache</b>.");
define("_INSTALL_L124","Erro! N�o foi poss�vel criar o arquivo <b><font color='#2F5376'>%s</font></b> no diret�rio <b>/cache</b>.");

define("_INSTALL_L125","Arquivo <b><font color='#2F5376'>%s</font></b> foi regravado com conte�do de <b>%s</b>.");
define("_INSTALL_L126","N�o foi poss�vel gravar no arquivo <b><font color='#2F5376'>%s</font></b>.");

define("_INSTALL_L130","O assistente detectou tabelas do XOOPS 1.3.x no banco de dados.<br>e ir� atualiz�-las para XOOPS 2.0");
define("_INSTALL_L131","As tabelas do XOOPS 2.0 j� est�o presentes no banco de dados.");
define("_INSTALL_L132","Atualiza��o das tabelas");
define("_INSTALL_L133","Tabela %s atualizada.");
define("_INSTALL_L134","Erro na atualiza��o da tabela %s.");
define("_INSTALL_L135","Erro na atualiza��o das tabelas do banco de dados.");
define("_INSTALL_L136","As tabelas do banco de dados foram atualizadas.");
define("_INSTALL_L137","Atualizando m�dulos...");
define("_INSTALL_L138","Atualizando coment�rios...");
define("_INSTALL_L139","Atualizando avatares...");
define("_INSTALL_L140","Atualizando emoticons...");
define("_INSTALL_L141","O assistente de instala��o atualizar� cada m�dulo para funcionar com o XOOPS 2.0.<br>Tenha certeza de que voc� enviou todos os arquivos do XOOPS 2.0 para o seu servidor.<br>Esta a��o demorar� algum tempo para ser finalizada.");
define("_INSTALL_L142","Atualizando os m�dulos...");
define("_INSTALL_L143","O assistente de instala��o atualizar� a configura��o do XOOPS 1.3.x para ser usada pelo XOOPS 2.0");
define("_INSTALL_L144","Atualizando a configura��o");
define("_INSTALL_L145","Coment�rio (ID: %s) inserido no banco de dados.");
define("_INSTALL_L146","N�o foi poss�vel inserir o coment�rio (ID: %s) no banco de dados.");
define("_INSTALL_L147","Atualizando os coment�rios..");
define("_INSTALL_L148","Atualiza��o completa.");
define("_INSTALL_L149","O assistente de instala��o atualizar� os coment�rios da vers�o XOOPS 1.3.x, para uso no XOOPS 2.0.<br>Esta a��o demorar� algum tempo para ser finalizada.");
define("_INSTALL_L150","O assistente de instala��o atualizar� os emoticons e imagens das posi��es de usu�rios da vers�o XOOPS 1.3.x, para uso no XOOPS 2.0.<br>Esta a��o demorar� algum tempo para ser finalizada.");
define("_INSTALL_L151","O assistente de instala��o atualizar� os avatares da vers�o XOOPS 1.3.x para uso no XOOPS 2.0.<br>Esta a��o vai demorar algum tempo para ser finalizada.");
define("_INSTALL_L155","Atualizando emoticos e imagens das posi��es de usu�rios...");
define("_INSTALL_L156","Atualizando avatares...");
define("_INSTALL_L157","Selecione um grupo padr�o para cada tipo de grupo da vers�o anterior.");
define("_INSTALL_L158","Grupos na vers�o 1.3.x");
define("_INSTALL_L159","Administradores");
define("_INSTALL_L160","Usu�rios");
define("_INSTALL_L161","Visitantes");
define("_INSTALL_L162","� necess�rio selecionar permiss�es para cada tipo de grupo.");
define("_INSTALL_L163","Tabela %s exclu�da.");
define("_INSTALL_L164","Erro! N�o foi poss�vel excluir a tabela %s.");
define("_INSTALL_L165","O site est� fechado para manuten��o. Por gentileza, volte mais tarde.");

// %s is filename
define("_INSTALL_L152","Erro! N�o foi poss�vel abrir %s.");
define("_INSTALL_L153","Erro! N�o foi poss�vel atualizar %s.");
define("_INSTALL_L154","%s atualizado.");

define('_INSTALL_L128', 'Escolha o idioma a ser usado na instala��o');
define('_INSTALL_L200', 'Atualizar');


define('_INSTALL_CHARSET','ISO-8859-1');

//added in XOOPS 2.1.0
define("_INSTALL_L48", "Admin Passwords Differ");

define("_INSTALL_L49", "Instala��o de M�dulos");
define("_INSTALL_L129", "M�dulos");
?>
