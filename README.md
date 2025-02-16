# Gerenciador de tarefas

### Pré-requisitos

De que coisas você precisa para instalar o software e como instalá-lo?

```
PHP 8.1 ou mais
Composer
Laravel 10 ou mais
MySQL
```

### Instalação

Uma série de exemplos passo-a-passo que informam o que você deve executar para ter um ambiente de desenvolvimento em execução.


### Clonar o repositório
```
git clone https://github.com/santossribeiroo/taskManager.git
cd taskManager
```

### Instalar e atualizar dependências
```
composer update
composer install
```

### Configurar o arquivo .env
```
Atualize com informações de acesso ao seu banco
```

### Gerar chave da aplicação
```
php artisan key:generate
```

### Gerar o banco de dados e popular com exemplos
```
php artisan migrate --seed
```

### Ligar o servidor
```
php artisan serve
```

## Informações para teste

Credenciais para teste:
e-mail: lucas@exemplo.com
senha: secret

## Rotas
GET - http://localhost:8000/api/users - Listar usuários e registros
GET - http://localhost:8000/api/users/1 - Listar os registros de um usuário
POST - http://localhost:8000/api/register - Cadastrar um usuário
PUT - http://localhost:8000/api/users/1 - Atualizar um usuário
DELETE - http://localhost:8000/api/users/1 - Deletar um usuário

GET - http://localhost:8000/api/projects - Listar projetos e registros
GET - http://localhost:8000/api/projects/1 - Listar os registros de um projeto
POST - http://localhost:8000/api/registerProject - Cadastrar um projeto
PUT - http://localhost:8000/api/projects/1 - Atualizar um projeto
DELETE - http://localhost:8000/api/projects/1 - Deletar um projeto

GET - http://localhost:8000/api/tasks - Listar tarefas e registros
GET - http://localhost:8000/api/tasks/1 - Listar os registros de um tarefa
POST - http://localhost:8000/api/registerTask - Cadastrar um tarefa
PUT - http://localhost:8000/api/tasks/1 - Atualizar um tarefa
DELETE - http://localhost:8000/api/tasks/1 - Deletar um tarefa