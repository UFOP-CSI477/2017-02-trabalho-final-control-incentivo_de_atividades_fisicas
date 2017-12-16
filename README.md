# **CSI477-2017-02 - Proposta de Trabalho Final**
## *Grupo: Edeilson Carlos Messias & José Wilson da Silva Júnior*

--------------

<!-- Descrever um resumo sobre o trabalho. -->

### Resumo
O objetivo deste documento é apresentar uma proposta para o trabalho a ser desenvolvido na disciplina CSI477 -- Sistemas WEB I. Portanto será desenvolvido um software denominado pelo grupo de MovimenteSE.
O MovimenteSE (SE - Saúde e Esportes) é um sistema WEB que tem como objetivo auxiliar no gerenciamento de atividades físicas de seus usuários, nele será possível inserir, excluir, modificar, consultar e resgatar informações que foram cadastradas por seus usuários referentes a suas atividades, gerando assim um histórico de execução de atividades físicas periódicas e prática de esportes. 

<!-- Apresentar o tema. -->
### 1. Tema

  O trabalho final tem como tema o desenvolvimento um software para o incentivo a pratica de esportes e controle de atividades físicas, com a finalidade de proporcionar o controle de atividades regulares e gerar informações históricas sobre as medidas corporais de seus usuários.

<!-- Descrever e limitar o escopo da aplicação. -->
### 2. Escopo

  O projeto conta com as funcionalaidaes de:

  	- Cadastro de Usuário;
  	- Modificação de Cadastro de Usuário;
  	- Cadastro de Usuário;
  	- Adesão a modalidades disponíveis;
  	- Inserção de Atividades;
  	- Relatório de Atividades Cadastradas;
  	- Funcionalidade de recomplensa simbólica com o intuito do incentivo ao esporte;
  	- Histórico de Medidas Corporais cadastradas
  	- Cadastro de medidas corporais.

<!-- Apresentar restrições de funcionalidades e de escopo. -->
### 3. Restrições

  Neste trabalho não serão considerados todas as modalidades existentes de esportes. O programa de recompensas é simbólico, e gira em torno de conquistas que serão alcançadas quando os usuários alcançarem determinadas metas estipuladas pelo software. As informações de seus usuários são pessoais e não poderão ser compartilhadas em redes sociais em um primeiro momento. O programa não limita a idade do usuário e é de total responsabilidade do usuário o tipo de atividade que será desenvolvido e as informações que serão cadatradas.

<!-- Construir alguns protótipos para a aplicação, disponibilizá-los no Github e descrever o que foi considerado. //-->
### 4. Protótipo
 
  Protótipos para as [páginas de login](https://github.com/UFOP-CSI477/2017-02-trabalho-final-control-incentivo_de_atividades_fisicas/blob/master/movimenteSE/pages/login.html), [pagina inicial](https://github.com/UFOP-CSI477/2017-02-trabalho-final-control-incentivo_de_atividades_fisicas/blob/master/movimenteSE/pages/pagina_inicial.html) do usuário e [modalidades](https://github.com/UFOP-CSI477/2017-02-trabalho-final-control-incentivo_de_atividades_fisicas/blob/master/movimenteSE/pages/modalidade.html) de esportes foram elaborados, e podem ser encontrados no [repositório](https://github.com/UFOP-CSI477/2017-02-trabalho-final-control-incentivo_de_atividades_fisicas/) utilizado pelo grupo.

- Na página de login, será possível se autenticar no sistema, por meio de login e senha, quando já for cadatrado, ou acessar o link da página de criação de cadastro;

- Na página inicial, o usuário poderá visualisar as suas informações de medidas corporais que foram cadastradas, cadastrar novas informações ou até mesmo modifica-las. Também é possível se desconectar dos sistema pela barra de navegação, ou acessar outras páginas do site por meio dos menús;

- Na página de modalidades, será possível para o usuário a adesão do esporte desejado para que o mesmo possa acessar tal modalidade e inserir os dados das atividades praticadas, para quue as informações sejam salvas no banco de dados e que posteriormente os relatórios possam ser gerados. Nesta página também é exibida uma breve descrição de cada esporte para que os usuários possam optar pela que mais se identificarem.