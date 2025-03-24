# Sistema de Catálogo de Filmes

Desenvolvi um **Sistema com Registro de Catálogo de Filmes**, utilizando a linguagem **PHP** e o framework **Laravel**.

## Login e Logout

Implementei login e logout no sistema, para que seja um serviço exclusivo para usuários autenticados.

**Usuários criados**: Criei 3 usuários diferentes para testes (todos com a mesma **senha: `123456`**):
  - `usuario1@teste.com`
  - `usuario2@teste.com`
  - `usuario3@teste.com`
    
**Validação de Dados**: Implementei o controle de verificação e validação do nome de usuário/senha junto ao Banco de Dados, além de regras para nome de usuário/senha, com avisos na tela (por exemplo: _'o nome de usuário deve ser um email'_, _'a Senha deve ter pelo menos 6 caracteres'_, _'a Senha deve ter máximo 16 caracteres'_ etc).
  
**Criptografia de Senha**: Usei o **bcrypt** para criptografar as senhas no Banco de Dados com hash criptográfico.

## Funcionalidades do Sistema

No sistema é possível visualizar o **catálogo de filmes** (lista de registros), sendo possível navegar pelo catálogo com o uso de **elementos de paginação** e, ainda, realizar as seguintes ações:

- **Adicionar novos registros de filmes**, em *'Cadastrar Novo Filme'*, com a possibilidade de inserir imagens.
- **Editar os registros de filmes** já existentes, com a possibilidade de inserir nova imagem ou modificar a imagem atual do filme.
- **Excluir registros antigos de filmes**.
- **Fazer buscas de registros de filmes** com o uso de **filtros** (nome, categoria, ano de lançamento).
- **Ir para a Home**.
- **Fazer logout** etc.

## Banco de Dados

- Os **10 primeiros registros de filmes** foram inseridos no Banco de Dados diretamente por meio de **Seeder**, com o armazenamento das imagens em _`public\assets\images\filmes`_.
- Os **demais registros de filmes** foram sendo inseridos com o **sistema em execução real** (botão **_'CADASTRAR NOVO FILME'_**), ao longo do desenvolvimento do código e como testes. Estes foram armazenados em _`public\assets\images\filmesUpload`_.

---
