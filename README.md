# **CSI477-2017-02 - Proposta de Trabalho Final**
## *Grupo: Edeilson Carlos Messias & José Wilson da Silva Júnior*

--------------

<!-- Descrever um resumo sobre o trabalho. -->

### Resumo
O objetivo deste documento é apresentar uma proposta para o trabalho a ser desenvolvido na disciplina CSI477 -- Sistemas WEB I. Portanto será desenvolvido um software denominado pelo grupo de MovimenteSE.
O MovimenteSE (SE - Saúde e Esportes) é um sistema WEB que tem como objetivo auxiliar no gerenciamento de atividades físicas de seus usuários, nele será possível inserir, excluir, modificar, consultar e resgatar informações que foram cadastradas por seus usuários referentes a suas atividades, gerando assim um histórico de execução de atividades físicas periódicas e prática de esportes. 

<!-- Apresentar o tema. -->
### 1. Tema

  O trabalho final tem como tema o desenvolvimento de um software para o incentivo a pratica de esportes e controle de atividades físicas, com a finalidade de proporcionar o controle de atividades regulares e gerar informações históricas sobre as medidas corporais de seus usuários.

<!-- Descrever e limitar o escopo da aplicação. -->
### 2. Escopo

  O projeto conta com as funcionalaidaes de:

- Cadastro de Usuário;
- Modificação de Cadastro de Usuário;
- Adesão a modalidades disponíveis;
- Inserção de Atividades;
- Relatório de Atividades Cadastradas;
- Funcionalidade de recomplensa simbólica com o intuito do incentivo ao esporte;
- Histórico de Medidas Corporais cadastradas
- Cadastro de medidas corporais.

<!-- Apresentar restrições de funcionalidades e de escopo. -->
### 3. Restrições

  Neste trabalho não serão considerados todas as modalidades existentes de esportes. O programa de recompensas é simbólico, e gira em torno de conquistas que serão alcançadas quando os usuários baterem determinadas metas estipuladas pelo software. As informações de seus usuários são pessoais e não poderão ser compartilhadas em redes sociais em um primeiro momento. O programa não limita a idade do usuário e é de total responsabilidade do usuário o tipo de atividade que será desenvolvido e as informações que serão cadatradas.

<!-- Construir alguns protótipos para a aplicação, disponibilizá-los no Github e descrever o que foi considerado. //-->
### 4. Protótipo
 
  Protótipos para as [páginas de login](https://github.com/UFOP-CSI477/2017-02-trabalho-final-control-incentivo_de_atividades_fisicas/blob/master/movimenteSE/pages/login.html), [pagina inicial](https://github.com/UFOP-CSI477/2017-02-trabalho-final-control-incentivo_de_atividades_fisicas/blob/master/movimenteSE/pages/pagina_inicial.html) do usuário e [modalidades](https://github.com/UFOP-CSI477/2017-02-trabalho-final-control-incentivo_de_atividades_fisicas/blob/master/movimenteSE/pages/modalidade.html) de esportes foram elaborados, e podem ser encontrados no [repositório](https://github.com/UFOP-CSI477/2017-02-trabalho-final-control-incentivo_de_atividades_fisicas/) utilizado pelo grupo.

- Na página de login, será possível se autenticar no sistema, por meio de login e senha, quando já for cadastrado, ou acessar o link da página de criação de cadastro;

- Na página inicial, o usuário poderá visualisar as suas informações de medidas corporais que foram cadastradas, cadastrar novas informações ou até mesmo modifica-las. Também é possível se desconectar dos sistema pela barra de navegação, ou acessar outras páginas do site por meio dos menús;

- Na página de modalidades, será possível para o usuário a adesão do esporte desejado para que o mesmo possa acessar tal modalidade e inserir os dados das atividades praticadas, para quue as informações sejam salvas no banco de dados e que posteriormente os relatórios possam ser gerados. Nesta página também é exibida uma breve descrição de cada esporte para que os usuários possam optar pela que mais se identificarem.


# **CSI477-2017-02 - Trabalho Final**
## *Grupo: Edeilson Carlos Messias & José Wilson da Silva Júnior*

### Resumo

Conforme idealizado na proposta inicial do trabalho, o sistema foi desenvolvido com base em PHP, no padrão de arquitetura de software MVC (Model-View-Controller), utilizando o framework codelgniter e banco de dados MySQL. A proposta do software se manteve em ser uma ferramenta de acompanhamento da realização de atividades físicas relacionadas a esportes. Através dele é possível gerar relatórios das atividades e medidas corporais, caso tenham sido previamente cadastradas por seus usuários.

### Instruções para execução do sistema

	1 - Primeiramente é necessário que se carregue o banco de dados do sistema através do arquivo "movimente.sql", disponível no repostório do GitHub;
	
	2 - Iniciar o servidor embutido no PHP dentro do diretório do projeto "2017-02-trabalho-final-control-incentivo_de_atividades_fisicas". Exemplo: php -S localhost:8000

	3 - Acessar o sistema por um navegador WEB pela url: endereco_servidor_php/movimente
	Exemplo: "http://localhost:8000/movimente"

### Funcionalidades implementadas

Página de Login:

Na página de login é possível realizar o logon no sistema, ou caso necessário, realizar o cadastro da conta de usuário por meio do link "Crie uma" na parte inferior do painel de login.

Página inicial:

Na página inicial é possível visualizar as informações do perfil cadastrado, e atualizar o painel de medidas corporais, inserindo as medidas por meio dos botões na parte inferior da tela. Também é possível navegar para as outras seções do site pelo menu no canto esquerdo da tela. Umas vez cadastradas as informações de medidas corporais, podem ser atualizadas ao gosto do usuário. Um histórico será gerada a partir dessas informações para que os usuários possam acompanhar suas evoluções.

Modalidades:

Na página de modalidades é possível aderir a qualquer uma das modalidades de esportes disponíveis, em que, cada uma habilita uma página que pode ser acessada para cadastro de atividades que foram desempenhadas, gerando um histórico, que poderá ser acompanhado pelo usuário, para controle da realização de suas atividades.

Recompensas:

Na página de recompensas é possível acompanhar as conquistas obtidas pelos usuários após alcançarem algumas metas estabelecidas pelo sistema como forma de incentivo. O painel de recompensas referente as modalidades são habilitados sempre que o usuário aderir a determinada modalidade.

O sistema conta ainda com o menu "Sair", caso deseje realizar logoff de sua conta e com a funcionalidade "excluir conta" que está disponível a direita na barra de navegação e pode ser acessada clicando-se no nome do usuário.