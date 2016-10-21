#DESIGN PATTERNS
	 - Query Object: design pattern implementado por uma estrutura de objetos que se transformam em uma instrução SQL. (classes de criação de SQL)
	 - Composite: implementado para permitir que um objeto contenha outros objetos criando complexos relacionamentos. (classe TCriteria)
	 - Singleton: implementado permite bloquear a criação de mais de uma instancia de uma mesma classe. (classe de conexao)
	 - Identify Field: utilizado para inserir o campo de id do banco de dados nos objetos inseridos dentro do modelo de negocios, permitindo a inserção e resgate de informações de maneira mais facil, pede-se que não utilize-se chaves primarias com significados externos ao banco de dados e recomenda-se não utilizar chaves primarias compostas.
	 - Foreign Key Mapping: utiliza as chaves estrangeiras do banco de dados para expressar os relacionamentos entre os objetos.
	 - Association Table Mapping: utilizado para expressar relações no banco de dados, quando as relações são NxN;
	 - Lazy Initialization: carrega os objetos relacionados a outros objetos somente quando forem necessários para a aplicação.
	 - Active Record.
	 - Repository: utilizado para manipular coleções de objetos