#DESIGN PATTERNS
	 - Query Object: design pattern implementado por uma estrutura de objetos que se transformam em uma instru��o SQL. (classes de cria��o de SQL)
	 - Composite: implementado para permitir que um objeto contenha outros objetos criando complexos relacionamentos. (classe TCriteria)
	 - Singleton: implementado permite bloquear a cria��o de mais de uma instancia de uma mesma classe. (classe de conexao)
	 - Identify Field: utilizado para inserir o campo de id do banco de dados nos objetos inseridos dentro do modelo de negocios, permitindo a inser��o e resgate de informa��es de maneira mais facil, pede-se que n�o utilize-se chaves primarias com significados externos ao banco de dados e recomenda-se n�o utilizar chaves primarias compostas.
	 - Foreign Key Mapping: utiliza as chaves estrangeiras do banco de dados para expressar os relacionamentos entre os objetos.
	 - Association Table Mapping: utilizado para expressar rela��es no banco de dados, quando as rela��es s�o NxN;
	 - Lazy Initialization: carrega os objetos relacionados a outros objetos somente quando forem necess�rios para a aplica��o.
	 - Active Record.
	 - Repository: utilizado para manipular cole��es de objetos