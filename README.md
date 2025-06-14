# 🛒 Loja Online em PHP (MVC)

Bem-vindo à **Loja Online**, um sistema completo de e-commerce desenvolvido em **PHP puro**, utilizando o padrão de arquitetura **MVC (Model-View-Controller)**. Este projeto foi desenvolvido com foco em boas práticas de segurança, organização de código e experiência do usuário.

---

## 🚀 Funcionalidades

- ✅ **Autenticação de usuários** (login por CPF e data de nascimento)
- 👥 **Cadastro com validação** e senha criptografada (hashing)
- 🛍️ **Carrinho de compras individual**
- 💳 **Finalização de compras com limpeza automática do carrinho**
- 🛠️ **Painel Administrativo** para:
  - Criar, editar e excluir produtos
  - Visualizar todos os produtos
- 💬 **Sistema de comentários** por produto
- 🛡️ **Proteção contra CSRF e SQL Injection**
- 🎨 **Interface responsiva** com **Bootstrap 5**

---

## 🗂️ Estrutura do Projeto

📦 TrabalhoF-PHP

├── config/
│ ├── db.php
│ ├── csrf.php
│ └── seed.php
├── controllers/
│ ├── AuthController.php
│ └── ProdutoController.php
├── models/
│ ├── Usuario.php
│ ├── Produto.php
│ ├── Carrinho.php
│ └── Comentario.php
├── public/
│ ├── index.php
│ ├── login.php
│ ├── cadastro.php
│ ├── carrinho.php
│ ├── comprar.php
│ ├── produto.php
│ ├── produto_novo.php
│ ├── produto_editar.php
│ └── produto_remover.php
├── views/
│ ├── templates/
│ │ ├── header.php
│ │ └── footer.php
│ ├── home.php
│ ├── admin.php
│ ├── carrinho.php
│ ├── produto.php
│ ├── editar.php
│ └── sobre.php
└── README.md

---

## 🔐 Segurança

- **CSRF Token**: Geração e validação em formulários críticos
- **PDO com prepared statements**: Prevenção contra SQL Injection
- **Hash de senhas** com `password_hash()` e `password_verify()`
- **Validação de sessão** para acesso restrito (admin e cliente)

---

## 🧪 Usuários de Teste

| Tipo     | Email                 | Senha |
|----------|-----------------------|--------|
| Admin    | carlos@gmail.com      | 1234   |
| Cliente  | eminhojr@gmail.com    | 1234   |

---

## 🛠️ Requisitos

- PHP 7.4 ou superior
- MySQL/MariaDB
- Servidor local (XAMPP, WAMP, Laragon etc.)

---

## ⚙️ Como Executar

1. Clone o repositório:
   ```bash
   git clone https://github.com/seuusuario/loja-php-mvc.git
