<div style="display: flex; justify-content: center">
  <img src="https://img.icons8.com/?size=512&id=55494&format=png" width="100" alt="project-logo">
</div>
<h1 style="text-align: center;"> ERP Learning </h1>

## 📍 Visão Geral

ERP Learning (ERPL) é um sistema Web projetado para otimizar os processos organizacionais do negócio em questão. O projeto faz parte dos artefatos de avaliação da disciplina de Programação Web do semestre 2024.1, tendo como objetivo a promoção do desenvolvimento colaborativo apoiado por tecnologias web.

A implementação do sistema segue o padrão Model-View-Controller (MVC), possuindo códigos que interagem tanto do lado do cliente quanto do lado do servidor. Para entender melhor a forma como esse projeto foi programado, confira o [Guia do padrão de desenvolvimento do Projeto](./docs/project-operation/README.md).



## ⭐ Recursos

|    |   Recurso         | Descrição |
|----|-------------------|---------------------------------------------------------------|
| ⭐  | **Login**  | Autenticação com login e senha. |
| ⭐ | **Logout**    | Desautenticação e saída do sistema. |
| ⭐| **Cadastro de usuário**  | Criação de usuários para funcionários do negócio, permitindo-os acessar o sistema ERP. |
| ⭐| **Error 404 Page**  | Página para a qual o usuário é redirecionado quando faz a requisição de uma rota não cadastrada. |
---

## 🧩 Tecnologias

|    |          | 
|----|-------------------|
| 🧩 | **HTML**  | 
| 🧩 | **CSS**  | 
| 🧩 | **JavaScript**  | 
| 🧩 | **PHP**    |
| 🧩 | **MySQL**  |
| 🧩 | **Docker**  | 
---

## 🚀 Usando o projeto

### ⚙️ Pré-requisitos

```bash
# 1. Ter o docker e o docker compose instalados
# 2. Ter as portas 30000, 30080, 30443, 33000, 33001 e 33306 não ocupadas
```

### ⚙️ Instalação

<h4>1) Clone o repositório do github</h4>

```bash
# Clone apenas a branch necessária:
git clone -b 53-cadastrar-novo-usuario --single-branch https://github.com/mobdev-ufopa/erpl
```

<h4>2) Configure o arquivo .env</h4>

```bash
# 1. Crie um arquivo .env na raíz do projeto:
touch .env

# 2. Defina as variáveis de ambiente (use como exemplo o arquivo ".env.example"):
MYSQL_ROOT_PASSWORD=YOUR_PASSWORD
MYSQL_USER=YOUR_USER
MYSQL_PASSWORD=YOUR_PASSWORD
ADMIN_LOGIN=YOUR_ADMIN_LOGIN
ADMIN_PASSWORD=YOUR_ADMIN_PASSWORD
```

<h4>3) Configure o Docker Compose file (opcional)</h4>

```bash
# Apenas confira se as portas 30000, 30080, 30443, 33000, 33001 e 33306 não estão sendo usadas por algumas aplicação em sua máquina.
# Se estiverem sendo usadas, mude-as no arquivo "compose.yml".
```

<h4>4) Subir os containers</h4>

```bash
# Na raíz do projeto, rode o comando abaixo para subir os containers: web-php, web-mysql, web-workbench.
docker compose up -d

# Para parar os containers, APÓS A FINALIZAÇÃO DESTE PASSO A PASSO E DO USO DO SISTEMA, use:
docker compose stop
```

<h4>5) Utilizar o container do PHP para rodar a aplicação</h4>

```bash
# Na raíz do projeto, rode o comando abaixo para entrar no container do PHP:
docker exec -it web-php bash

# Para subir o servidor embutido do PHP e rodar a aplicação, execute:
php -S web-php:30000 -t public/
```

<h4>6) Criar a tabela de usuários e cadastrar o usuário admin</h4>

```bash
# Abra um novo terminal na raíz do projeto, depois entre no container do PHP com o comando:
docker exec -it web-php bash

# Execute o script abaixo para criar a tabela de usuários e criar o usuário admin:
php database/create_sisacesso_table.php
```

### 🖥️ Visualização

<h4>A) Para visualizar a aplicação:</h4>

```bash
# Na barra de pesquisa do navegador, pesquise por:
localhost:30000
```

<div align="center"> 
	<img alt="Tela inicial da aplicação" src="docs/project-operation/tela_login.png">
</div>

#### Limitações

<ul>
    <li><strong style="color: red;">OBS 1:</strong> As demais opções do menu só estarão habilitadas após fazer o login. A funcionalidade de "Cadastro" foi projetada para ser utilizada apenas por um usuário com privilégios de Admin. Por isso, para que outros usuários consigam entrar, o admin deve cadastrá-los previamente.</li>
    <li><strong style="color: red;">OBS 2:</strong> Por enquanto, um usuário comum ainda não é impedido de usar a opção de cadastro. Atualizações futuras implementarão essa funcionalidade.</li>
</ul>

<h4>B) Para visualizar o MySQL Workbench:</h4>

```bash
# Na barra de pesquisa do navegador, pesquise por:
localhost:33000

# Configure uma nova conexão e preencha conforme a imagem abaixo.
# OBS:
# Username = (valor da variável ADMIN_LOGIN no .env)
# Password = (valor da variável ADMIN_PASSWORD no .env)
```

<div align="center"> 
	<img alt="DB Connection configuration" src="docs/project-operation/connection_config.png">
</div>

```bash
# Após testar a coneção e definir o "Connection Name", clique em "OK" e, na tela HOME, entre na conexão criada. 
# O banco de dados padrão se chama "erpl". A tabela implementada nesta branch se chama "sis_acesso".
```

## 📄 Licença

---

Este projeto está distribuído sob a **MIT License**. Para mais detalhes, consulte o arquivo [LICENSE](./LICENSE).

## 🧑‍💻 Autores

---

<a href="https://github.com/florindorian"><img src="https://github.com/florindorian.png" width=100></a>