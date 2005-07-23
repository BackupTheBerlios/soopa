<?php
// $Id: install.php,v 1.3 2005/07/23 16:26:03 mauriciodelima Exp $
define("_INSTALL_L0","<span style='color: #2F5376; font-size: 13pt'><center>Bem-vindo ao assistente de instalação do XOOPS 2.1</center></span>");
define("_INSTALL_L70","Altere as permissões do arquivo <b><font color='#2F5376'>/mainfile.php</font></b> para que seja executável pelo servidor (Por exemplo: CHMOD 777 mainfile.php em um servidor UNIX/LINUX, ou, no caso de um servidor Windows, verifique se o arquivo não está marcado como Somente Leitura (Read Only). Atualize esta página depois que ajustar as configurações.");
//define("_INSTALL_L71","Click on the button below to begin the installation.");
define("_INSTALL_L1","Abra o arquivo <b><font color='#2F5376'>/mainfile.php</font></b> com seu editor de textos e procure na linha 33 o seguinte código:");
define("_INSTALL_L2","Altere essa linha para: ");
define("_INSTALL_L3","Na linha 37, altere de %s para %s");
define("_INSTALL_L4","Alterações efetuadas. Tentar novamente.");
define("_INSTALL_L5","ATENÇÃO!");
define("_INSTALL_L6","A configuração de XOOPS_ROOT_PATH na linha 33 do arquivo <b><font color='#2F5376'>/mainfile.php</font></b> difere do diretório-raiz (root) detectado pelo XOOPS.");
define("_INSTALL_L7","A sua configuração: ");
define("_INSTALL_L8","Foi detectado: ");
define("_INSTALL_L9","(em um sistema operacional Microsoft, esse erro pode ocorrer mesmo que sua configuração esteja correta. Se este é seu caso, clique em CONTINUAR.)");
define("_INSTALL_L10","Clique no botão abaixo se isto estiver correto.");
define("_INSTALL_L11","Caminho físico do diretório-raiz (root) do XOOPS no servidor: ");
define("_INSTALL_L12","URL do diretório-raiz (root) do XOOPS: ");
define("_INSTALL_L13","Se as configurações acima estiverem corretas, clique em CONTINUAR.");
define("_INSTALL_L14","Próximo »");
define("_INSTALL_L15","Abra o arquivo <b><font color='#2F5376'>/mainfile.php</font></b> e faça as alterações solicitadas");
define("_INSTALL_L16","%s é o endereço do seu servidor de banco de dados.");
define("_INSTALL_L17","%s é o nome do usuário do banco de dados.");
define("_INSTALL_L18","%s é a senha de acesso ao banco de dados.");
define("_INSTALL_L19","%s é o nome do banco de dados onde serão criadas as tabelas do XOOPS.");
define("_INSTALL_L20","%s é o prefixo das tabelas que serão criadas durante a instalação.");
define("_INSTALL_L21","O banco de dados abaixo não foi localizado no servidor:");
define("_INSTALL_L22","Clique em CONTINUAR para criá-lo?");
define("_INSTALL_L23","Sim");
define("_INSTALL_L24","Não");
define("_INSTALL_L25","Nós detectamos a seguinte informação do banco de dados no arquivo <b><font color='#2F5376'>/mainfile.php</font></b>. Altere essa configuração, se não estiver correta.");
define("_INSTALL_L26","Configuração do banco de dados");
define("_INSTALL_L51","Banco de dados");
define("_INSTALL_L66","Selecione o tipo de banco de dados que será utilizado");
define("_INSTALL_L27","Servidor de banco de dados");
define("_INSTALL_L67","Endereço do servidor do banco de dados (localhost ou outro fornecido pelo provedor)");
define("_INSTALL_L28","Nome de usuário do banco de dados");
define("_INSTALL_L65","Nome de usuário do banco de dados cadastrado no provedor de hospedagem");
define("_INSTALL_L29","Nome do banco de dados");
define("_INSTALL_L64","O assistente de instalação criará um novo banco de dados, se não existir.");
define("_INSTALL_L52","Senha do banco de dados");
define("_INSTALL_L68","Senha de acesso ao banco de dados cadastrada no provedor de hospedagem");
define("_INSTALL_L30","Prefixo das tabelas");
define("_INSTALL_L63","Prefixo que será usado nas novas tabelas. Se você não sabe do que se trata, deixe o prefixo-padrão.");
define("_INSTALL_L54","Usar conexão persistente?");
define("_INSTALL_L69","Em uma conexão persistente o XOOPS usará a função PHP <a href='http://br.php.net/manual/pt_BR/function.mysql-pconnect.php'>mysql_pconnect</a> em vez de <a href='http://br.php.net/manual/pt_BR/function.mysql-connect.php'>mysql_connect</a>. Se você não sabe do que se trata, deixe como NÃO.");
define("_INSTALL_L55","Caminho físico do XOOPS");
define("_INSTALL_L59","Caminho físico do diretório-raiz do XOOPS, sem / no final.");
define("_INSTALL_L56","Caminho virtual do XOOPS (URL)");
define("_INSTALL_L58","Caminho virtual do diretório-raiz do XOOPS, sem / no final.");

define("_INSTALL_L31","Não foi possível a criação do banco de dados.<br>Verifique as configurações ou contate o provedor de hospedagem.");
define("_INSTALL_L32","<span style='color: #2F5376; font-size: 13pt'><center>O XOOPS 2.0 foi instalado com sucesso!</center></span>");
define("_INSTALL_L33","Clique <a href='../index.php'><span style='color: #2F5376; font-size: 13pt'>AQUI</span></a> para exibir a página principal do seu site.");
define("_INSTALL_L35","Se você encontrou algum erro. Utilize o fórum do <a href='http://www.xoopsbr.org/' target='_blank'>Xoops Total</a>, comunidade de suporte ao XOOPS no Brasil.");
define("_INSTALL_L36","Informe o nome e senha do administrador do site.");
define("_INSTALL_L37","Nome do Administrador");
define("_INSTALL_L167", "Login do Administrador");
define("_INSTALL_L38","e-mail");
define("_INSTALL_L39","Senha");
define("_INSTALL_L74","Confirmação da Senha");
define("_INSTALL_L40","Criar tabelas");
define("_INSTALL_L41","Retorne e altere as informações solicitadas.");
define("_INSTALL_L42","Voltar");
define("_INSTALL_L57","Por favor para prosseguir vc precisará informar o ítem baixo:<br><b><font color='#2F5376'>%s</font></b>");

// %s is database name
define("_INSTALL_L43","Banco de dados <b><font color='#2F5376'>%s</font></b> criado.");

// %s is table name
define("_INSTALL_L44","Não foi possível criar <b><font color='#2F5376'>%s</font></b>");
define("_INSTALL_L45","Tabela <b><font color='#2F5376'>%s</font></b> criada");

define("_INSTALL_L46","Para que os módulos XOOPS funcionem corretamente, os arquivos abaixo devem ter permissão de leitura/gravação pelo servidor. (Por exemplo: CHMOD 777 em servidor Linux)");
define("_INSTALL_L47","Próximo");

define("_INSTALL_L53","<span style='color: #2F5376; font-size: 12pt'>3. Confirmação dos dados informados</span>");

define("_INSTALL_L60","Não foi possível gravar no arquivo <b><font color='#2F5376'>/mainfile.php</font></b>. Verifique as permissões do arquivo e tente novamente.");
define("_INSTALL_L61","Não foi possível acessar o arquivo <b><font color='#2F5376'>/mainfile.php</font></b>. Verifique novamente as configurações ou contate o provedor de hospedagem.");
define("_INSTALL_L62","A configuração foi gravada no arquivo <b><font color='#2F5376'>/mainfile.php</font></b>.");
define("_INSTALL_L72","Os diretórios abaixo devem criados com permissão escrita pelo servidor (Por exemplo: CHMOD 777 em servidor Linux)");
define("_INSTALL_L73","Endereço de e-mail inválido.");

// add by haruki
define("_INSTALL_L80","Iniciar instalação");
define("_INSTALL_L81","Verificar permissões dos arquivos");
define("_INSTALL_L82","<span style='color: #2F5376; font-size: 12pt'>1. Verificação das permissões de diretórios e arquivos</span>");
define("_INSTALL_L83","Arquivo <b><font color='#2F5376'>%s</font></b> não tem permissão de gravação.");
define("_INSTALL_L84","Arquivo <b><font color='#2F5376'>%s</font></b> com permissão de gravação.");
define("_INSTALL_L85","Gravação não permitida no diretório <b><font color='#2F5376'>%s</font></b>.");
define("_INSTALL_L86","Gravação permitida em <b><font color='#2F5376'>%s</font></b>.");
define("_INSTALL_L87","A configuração está correta.");
define("_INSTALL_L89","Configuração geral");
define("_INSTALL_L90","<span style='color: #2F5376; font-size: 12pt'>2. Configuração geral</span>");
define("_INSTALL_L91","Confirmar");
define("_INSTALL_L92","Gravar configuração");
define("_INSTALL_L93","Alterar configuração");
define("_INSTALL_L88","Gravação das configurações");
define("_INSTALL_L94","Verificação do caminho físico e URL");
define("_INSTALL_L127","Verificar caminho físico e URL");
define("_INSTALL_L95","Não foi possível detectar o caminho físico para o diretório-raiz do XOOPS.");
define("_INSTALL_L96","O caminho físico informado é diferente do detectado (<b>%s</b>).");
define("_INSTALL_L97","<b>O caminho físico</b> está correto.");

define("_INSTALL_L99","<b>O caminho físico</b> deve ser um diretório.");
define("_INSTALL_L100","<b>O caminho virtual</b> é uma URL válida.");
define("_INSTALL_L101","<b>O caminho virtual</b> não é uma URL válida.");
define("_INSTALL_L102","Verificação do banco de dados");
define("_INSTALL_L103","Reiniciar");
define("_INSTALL_L104","Verificar banco de dados");
define("_INSTALL_L105","Criar banco de dados");
define("_INSTALL_L106","Não foi possível a conexão com o servidor de banco de dados.");
define("_INSTALL_L107","Clique em VOLTAR e verifique a configuração do banco de dados.");
define("_INSTALL_L108","O XOOPS conseguiu conectar ao servidor de banco de dados.");
define("_INSTALL_L109","O banco de dados <b><font color='#2F5376'>%s</font></b> não existe.");
define("_INSTALL_L110","O banco de dados <b><font color='#2F5376'>%s</font></b> existe, e foi possível efetuar uma conexão.");
define("_INSTALL_L111","A conexão com o banco de dados foi realizada corretamente.<br>Clique em CONTINUAR para criar as tabelas.");
define("_INSTALL_L112","Cadastrar administrador");
define("_INSTALL_L113","Tabela <b><font color='#2F5376'>%s</font></b> apagada.");
define("_INSTALL_L114","Erro na criação das tabelas do banco de dados.");
define("_INSTALL_L115","Tabelas criadas corretamente no banco de dados.");
define("_INSTALL_L116","7. Inclusão de dados nas tabelas");
define("_INSTALL_L117","Finalizar");

define("_INSTALL_L118","Erro ao criar a tabela <b><font color='#2F5376'>%s</font></b>.");
define("_INSTALL_L119","%d inserções na tabela <b><font color='#2F5376'>%s</font></b>.");
define("_INSTALL_L120","Erro! Não foi possível inserir %d registros na tabela <b><font color='#2F5376'>%s</font></b>.");

define("_INSTALL_L121","Constante <b><font color='#2F5376'>%s</font></b> gravada com valor <b>%s</b>.");
define("_INSTALL_L122","Erro! Não foi possível gravar a constante <b><font color='#2F5376'>%s</font></b>.");

define("_INSTALL_L123","O arquivo <b><font color='#2F5376'>%s</font></b> foi gravado no diretório <b>/cache</b>.");
define("_INSTALL_L124","Erro! Não foi possível criar o arquivo <b><font color='#2F5376'>%s</font></b> no diretório <b>/cache</b>.");

define("_INSTALL_L125","Arquivo <b><font color='#2F5376'>%s</font></b> foi regravado com conteúdo de <b>%s</b>.");
define("_INSTALL_L126","Não foi possível gravar no arquivo <b><font color='#2F5376'>%s</font></b>.");

define("_INSTALL_L130","O assistente detectou tabelas do XOOPS 1.3.x no banco de dados.<br>e irá atualizá-las para XOOPS 2.0");
define("_INSTALL_L131","As tabelas do XOOPS 2.0 já estão presentes no banco de dados.");
define("_INSTALL_L132","Atualização das tabelas");
define("_INSTALL_L133","Tabela %s atualizada.");
define("_INSTALL_L134","Erro na atualização da tabela %s.");
define("_INSTALL_L135","Erro na atualização das tabelas do banco de dados.");
define("_INSTALL_L136","As tabelas do banco de dados foram atualizadas.");
define("_INSTALL_L137","Atualizando módulos...");
define("_INSTALL_L138","Atualizando comentários...");
define("_INSTALL_L139","Atualizando avatares...");
define("_INSTALL_L140","Atualizando emoticons...");
define("_INSTALL_L141","O assistente de instalação atualizará cada módulo para funcionar com o XOOPS 2.0.<br>Tenha certeza de que você enviou todos os arquivos do XOOPS 2.0 para o seu servidor.<br>Esta ação demorará algum tempo para ser finalizada.");
define("_INSTALL_L142","Atualizando os módulos...");
define("_INSTALL_L143","O assistente de instalação atualizará a configuração do XOOPS 1.3.x para ser usada pelo XOOPS 2.0");
define("_INSTALL_L144","Atualizando a configuração");
define("_INSTALL_L145","Comentário (ID: %s) inserido no banco de dados.");
define("_INSTALL_L146","Não foi possível inserir o comentário (ID: %s) no banco de dados.");
define("_INSTALL_L147","Atualizando os comentários..");
define("_INSTALL_L148","Atualização completa.");
define("_INSTALL_L149","O assistente de instalação atualizará os comentários da versão XOOPS 1.3.x, para uso no XOOPS 2.0.<br>Esta ação demorará algum tempo para ser finalizada.");
define("_INSTALL_L150","O assistente de instalação atualizará os emoticons e imagens das posições de usuários da versão XOOPS 1.3.x, para uso no XOOPS 2.0.<br>Esta ação demorará algum tempo para ser finalizada.");
define("_INSTALL_L151","O assistente de instalação atualizará os avatares da versão XOOPS 1.3.x para uso no XOOPS 2.0.<br>Esta ação vai demorar algum tempo para ser finalizada.");
define("_INSTALL_L155","Atualizando emoticos e imagens das posições de usuários...");
define("_INSTALL_L156","Atualizando avatares...");
define("_INSTALL_L157","Selecione um grupo padrão para cada tipo de grupo da versão anterior.");
define("_INSTALL_L158","Grupos na versão 1.3.x");
define("_INSTALL_L159","Administradores");
define("_INSTALL_L160","Usuários");
define("_INSTALL_L161","Visitantes");
define("_INSTALL_L162","É necessário selecionar permissões para cada tipo de grupo.");
define("_INSTALL_L163","Tabela %s excluída.");
define("_INSTALL_L164","Erro! Não foi possível excluir a tabela %s.");
define("_INSTALL_L165","O site está fechado para manutenção. Por gentileza, volte mais tarde.");

// %s is filename
define("_INSTALL_L152","Erro! Não foi possível abrir %s.");
define("_INSTALL_L153","Erro! Não foi possível atualizar %s.");
define("_INSTALL_L154","%s atualizado.");

define('_INSTALL_L128', 'Escolha o idioma a ser usado na instalação');
define('_INSTALL_L200', 'Atualizar');


define('_INSTALL_CHARSET','ISO-8859-1');

//added in XOOPS 2.1.0
define("_INSTALL_L48", "Admin Passwords Differ");

define("_INSTALL_L49", "Instalação de Módulos");
define("_INSTALL_L129", "Módulos");
?>
