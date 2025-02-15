
# Locadora 

Este é um sistema simples de cadastro de filmes, onde os usuários podem adicionar, visualizar, atualizar e excluir filmes de uma locadora. O projeto é desenvolvido em PHP e utiliza MySQL como banco de dados.

## Funcionalidades

- Adicionar um novo filme.
- Visualizar lista de filmes cadastrados.
- Editar informações de um filme.
- Excluir filmes do sistema.
- Upload de imagem do filme.

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação para o backend.
- **MySQL**: Banco de dados relacional para armazenar as informações dos filmes.
- **Bootstrap**: Framework CSS para estilização e responsividade da interface.
- **JavaScript**: Para melhorar a interação com o usuário (caso necessário).

## Como Usar

### Requisitos

- PHP 7.0 ou superior.
- MySQL.
- Servidor web (Apache, Nginx, etc.).

### Passo 1: Clone o repositório

Clone este repositório para o seu computador:

```bash
git clone https://github.com/seuusuario/locadora-de-filmes.git

Crie um banco de dados no MySQL chamado Locadora_filmes.

Você pode fazer isso através do MySQL Workbench, phpMyAdmin ou pela linha de comando com:

sql
Copiar
Editar
CREATE DATABASE Locadora_filmes;
Crie as tabelas necessárias com o seguinte comando:

sql
Copiar
Editar
CREATE TABLE filmes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    ano INT NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    disponivel TINYINT(1) NOT NULL DEFAULT 1,
    imagem VARCHAR(255)
);
Passo 3: Configuração do Arquivo db.php
No arquivo db.php, configure as credenciais do seu banco de dados:

php
Copiar
Editar
$host = 'localhost';
$user = 'root';  // Seu usuário do MySQL
$password = '';  // Sua senha do MySQL
$dbname = 'Locadora_filmes';  // Nome do banco de dados
Certifique-se de que a pasta uploads/ existe para o armazenamento das imagens dos filmes.

Passo 4: Iniciar o Servidor
Se você estiver usando o XAMPP ou WAMP, inicie o Apache e o MySQL.

Acesse o seu projeto pelo navegador:

bash
Copiar
Editar
http://localhost/seu-diretorio-do-projeto/
Passo 5: Usar a Aplicação
Agora você pode adicionar, editar, excluir e visualizar filmes diretamente pela interface da web.

