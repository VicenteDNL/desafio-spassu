# 📚 Sistema de Cadastro de Livros

Este projeto foi desenvolvido como parte de um desafio técnico para a vaga de desenvolvedor PHP. Ele consiste em um sistema web com CRUD completo para gerenciamento de livros, autores e assuntos, com foco em boas práticas, organização do código e facilidade de manutenção.

### ✨ Objetivo do desafio

Criar um projeto seguindo as boas práticas de mercado e apresentá-lo, demonstrando o passo a passo de sua construção — incluindo a modelagem da base de dados, escolha das tecnologias, desenvolvimento da aplicação, metodologias utilizadas, frameworks adotados, entre outros aspectos.

### 🧩 Instruções (Tecnologias)

A tecnologia a ser utilizada deve ser voltada para aplicações Web e estar alinhada com a vaga para a qual está se candidatando. A implementação do projeto será de total responsabilidade do candidato, incluindo a escolha e utilização dos componentes necessários (como relatórios, camada de persistência, entre outros), O banco de dados pode ser de sua preferência, assim como a abordagem de persistência dos dados.

### 🚀 Instruções (Geral)

- Deverá ser implementado o CRUD completo para Livro, Autor e Assunto, conforme o modelo de dados fornecido.

- A tela inicial pode conter um menu simples ou links diretos para as funcionalidades desenvolvidas.

- O modelo de banco de dados deve ser seguido integralmente, exceto em casos justificados por melhorias de desempenho.

- A interface do sistema pode ser simples, mas deve utilizar algum recurso de CSS que controle, no mínimo, a cor e o tamanho dos componentes em tela. A utilização do Bootstrap será considerada um diferencial.

- Campos que requerem formatação (como datas e valores monetários) devem exibir os dados devidamente formatados.

- É obrigatória a implementação de um relatório, utilizando o componente de sua preferência (ex: Crystal Reports, ReportViewer, etc.). A consulta desse relatório deve ser baseada em uma view criada no banco de dados.
- O relatório pode ser simples, desde que permita uma compreensão clara das informações. Ele deve exibir dados das três tabelas principais (livros, autores e assuntos) e deve agrupar os resultados por autor (atenção: um livro pode ter mais de um autor).

- A utilização de TDD (Test Driven Development) será considerada um diferencial.

- O tratamento de erros é essencial. Evite blocos try-catch genéricos quando for possível adotar tratamentos específicos, especialmente para exceções relacionadas ao banco de dados.

- As mensagens do sistema, labels e demais textos exibidos na aplicação podem ser definidos a seu critério.

- O modelo inicial não contempla, mas é necessário incluir um campo de valor (R$) no cadastro de livros.

- Por fim, todos os scripts e instruções necessários para a implantação do projeto devem ser organizados e apresentados durante a entrevista técnica.

---
---
---

# Sobre o projeto

## ⚙️ Tecnologias Utilizadas

- **Linguagem**: PHP 8.3
- **Framework**: Laravel 12.x
- **Banco de Dados**: PostgreSQL
- **ORM**: Eloquent
- **Frontend**: Blade + Bootstrap 5.3
- **Relatórios**: Apexcharts
- **Testes**: PHPUnit (Não aplicado)
- **Containerização (opcional)**: Docker + Docker Compose
- **Redis**: Armazenamento das sessões e cache
- **Logs**: LogViewer para visualização dos logs
- **Server**: Ngnix com proxy reverso
- **Vite**: para lidar com arquivos front-end em desenvolvimento

## 🧱 Modelo de Dados

Este documento descreve a estrutura das tabelas utilizadas no projeto de cadastro de livros.

###### 📘 Tabela: `books`

| Campo              | Tipo        | Tamanho | Observações                |
|--------------------|-------------|---------|----------------------------|
| id                 | bigint      |         | Chave primária            |
| title              | string      | 40      | Título do livro           |
| publisher          | string      | 40      | Editora                   |
| edition            | integer     |         | Edição                    |
| year_publication   | string      | 4       | Ano de publicação         |
| amount             | decimal     | 15,2    | Valor do livro (R$)       |
| created_at         | timestamp   |         | Criado em                 |
| updated_at         | timestamp   |         | Atualizado em             |

---

######  ✍️ Tabela: `authors`

| Campo     | Tipo      | Tamanho | Observações     |
|-----------|-----------|---------|-----------------|
| id        | bigint    |         | Chave primária  |
| name      | string    | 40      | Nome do autor   |
| created_at| timestamp |         | Criado em       |
| updated_at| timestamp |         | Atualizado em   |

---

###### 📚 Tabela: `book_author` (Relacionamento N:N)

| Campo     | Tipo      | Observações                          |
|-----------|-----------|--------------------------------------|
| id        | bigint    | Chave primária                      |
| book_id   | foreignId | Chave estrangeira para `books`      |
| author_id | foreignId | Chave estrangeira para `authors`    |
| created_at| timestamp | Criado em                           |
| updated_at| timestamp | Atualizado em                       |

> **Observação**: Combinação única de `book_id` e `author_id`.

---

######  🏷️ Tabela: `subjects`

| Campo     | Tipo      | Tamanho | Observações     |
|-----------|-----------|---------|-----------------|
| id        | bigint    |         | Chave primária  |
| description | string  | 20      | Descrição       |
| created_at| timestamp |         | Criado em       |
| updated_at| timestamp |         | Atualizado em   |

---

###### 📘 Tabela: `book_subject` (Relacionamento N:N)

| Campo      | Tipo      | Observações                          |
|------------|-----------|--------------------------------------|
| id         | bigint    | Chave primária                      |
| book_id    | foreignId | Chave estrangeira para `books`      |
| subject_id | foreignId | Chave estrangeira para `subjects`   |
| created_at | timestamp | Criado em                           |
| updated_at | timestamp | Atualizado em                       |

> **Observação**: Combinação única de `book_id` e `subject_id`.

---

Essas tabelas representam o modelo relacional básico necessário para a funcionalidade de cadastro e gestão de livros, autores e assuntos. A estrutura permite a associação de múltiplos autores e assuntos a um mesmo livro (e vice-versa), viabilizando consultas e relatórios agrupados com facilidade.

## 📊 Views do Banco de Dados

As **views** a seguir foram criadas para auxiliar na geração de relatórios e consultas analíticas. Todas as views são baseadas nas tabelas principais (`books`, `authors`, `subjects`) e permitem diferentes formas de agrupamento e visualização de dados.

---

###### 📈 View: `report_books_summary`

> Retorna um resumo da quantidade de livros e valor médio por ano de publicação.

| Campo            | Tipo     | Descrição                          |
|------------------|----------|------------------------------------|
| year_publication | string   | Ano de publicação do livro         |
| total_books      | integer  | Total de livros publicados no ano  |
| avg_price        | decimal  | Preço médio dos livros no ano      |

---

###### 🧑‍🏫 View: `report_author_book_count`

> Exibe o total de livros associados a cada autor.

| Campo       | Tipo     | Descrição                   |
|-------------|----------|-----------------------------|
| id          | bigint   | ID do autor                 |
| name        | string   | Nome do autor               |
| total_books | integer  | Quantidade de livros        |

---

###### 🏷️ View: `report_subject_book_count`

> Retorna a quantidade de livros associados a cada assunto (tema).

| Campo       | Tipo     | Descrição                   |
|-------------|----------|-----------------------------|
| id          | bigint   | ID do assunto               |
| description | string   | Descrição do assunto        |
| total_books | integer  | Quantidade de livros        |

---

###### 📚 View: `report_author_count_subject`

> Agrupa a quantidade de livros por autor e assunto relacionado.

| Campo       | Tipo     | Descrição                             |
|-------------|----------|----------------------------------------|
| id          | bigint   | ID do autor                            |
| name        | string   | Nome do autor                          |
| total_books | integer  | Quantidade de livros por assunto       |
| description | string   | Descrição do assunto                   |

---

###### 🗓️ View: `report_subject_by_year`

> Retorna a quantidade de livros por assunto agrupados por ano de publicação.

| Campo            | Tipo     | Descrição                             |
|------------------|----------|----------------------------------------|
| year_publication | string   | Ano de publicação                      |
| description       | string   | Descrição do assunto                   |
| total_books      | integer  | Quantidade de livros                   |

---

## Instalando o projeto localmente

##### 📁 desafio-spassu

Clone o projeto

```
 git clone https://github.com/VicenteDNL/desafio-spassu.git
```

Acessar o diretório

```
  cd desafio-spassu
```

Fazer uma copía do .env.example. Para facilitar a inicialização do projeto todas as variavés necessárias já estão contidas no .env.example

```
  cp .env.example .env
```

Iniciar os container docker

```
  docker compose up -d
```

Criar dados ficticios (opcional)

```
   docker exec -it library-app php artisan db:seed
```
