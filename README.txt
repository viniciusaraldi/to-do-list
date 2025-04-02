To-Do List

📌 Sobre o Projeto

Este projeto é uma aplicação web de To-Do List, que permite aos usuários criar, visualizar e gerenciar suas tarefas de forma prática e intuitiva. O objetivo é proporcionar uma experiência fluida para organizar atividades diárias, garantindo eficiência e produtividade.

🚀 Funcionalidades

Criar novas tarefas
Adicionar subtarefas a uma tarefa principal
Remover tarefas ou subtarefas
Armazenamento dos dados em sessão para simular um banco de dados

🛠️ Tecnologias Utilizadas

Frontend: HTML, CSS e JavaScript (vanilla)
Backend: PHP
Banco de Dados: Simulação via $_SESSION para persistência temporária
APIs: Fetch API para comunicação entre frontend e backend

📁 to-do
├── 📁 config
│   ├── 📄 Config.php  # Classe responsável pela manipulação de dados
├── 📁 controller
│   ├── 📄 controller.php  # Controlador principal
│   ├── 📄 TaskController.php  # Controlador de tarefas
│   ├── 📄 TaskListController.php  # Controlador de listas de tarefas
├── 📁 http
│   ├── 📄 Request.php  # Classe para manipulação de requisições
│   ├── 📄 Response.php  # Classe para manipulação de respostas
├── 📁 models
│   ├── 📄 Task.php  # Modelo de tarefas
│   ├── 📄 TaskList.php  # Modelo de listas de tarefas
├── 📁 public
│   ├── 📁 script  # Scripts JS
│   ├── 📁 style  # Estilos CSS
├── 📁 routes
│   ├── 📄 router.php  # Definição de rotas
├── 📁 vendor  # Dependências do Composer
├── 📁 views  # Arquivos de visualização (PHP)
├── 📄 .htaccess  # Configuração do servidor
├── 📄 composer.json  # Gerenciador de dependências
├── 📄 index.php  # Entrada principal da aplicação
└── 📄 README.md  # Documentação do projeto

📦 Como Executar o Projeto

1️⃣ Clonar o Repositório

git clone https://github.com/seu-usuario/meu-projeto-todo-list.git

2️⃣ Instalar Dependências

composer install

3️⃣ Configurar um Servidor PHP

Utilizando o servidor embutido do PHP, execute o comando:
php -S localhost:8000

P.S.: Caso precise mudar o dominio e/ou a porta, é necessário alterar as variaveis url e port encontradas em public -> script -> domain.js

4️⃣ Acessar a Aplicação

Abra o navegador e acesse:
http://localhost:8000

📝 Melhorias Futuras

Implementação de autenticação para múltiplos usuários
Implementação de categorias e etiquetas para organização
Marcação para tarefas concluídas

📄 Licença

Este projeto está licenciado sob a MIT License - veja o arquivo LICENSE para mais detalhes.

Feito por Vinicius Heckert Araldi

