
## 🚀 Como rodar o projeto localmente

Siga os passos abaixo para clonar e configurar o projeto na sua máquina.

### Pré-requisitos

Certifique-se de ter as seguintes ferramentas instaladas:
- [PHP](https://www.php.net/) (versão compatível com o projeto)
- [Composer](https://getcomposer.org/)
- [Node.js & NPM](https://nodejs.org/)
- Banco de Dados (MySQL, PostgreSQL, etc.)

---

### 🔧 Instalação Passo a Passo

1. **Clone o repositório**
   ```bash
   git clone [https://github.com/SEU-USUARIO/NOME-DO-PROJETO.git](https://github.com/SEU-USUARIO/NOME-DO-PROJETO.git)
   cd NOME-DO-PROJETO
    ```

2. **Instale as dependências do PHP**
```bash
composer install

```


3. **Instale as dependências do Frontend**
```bash
npm install

```


4. **Configure o arquivo de ambiente**
Faça uma cópia do arquivo `.env.example` e renomeie para `.env`:
*No Windows:*
```bash
copy .env.example .env

```


*No Linux/Mac:*
```bash
cp .env.example .env

```


5. **Gere a chave da aplicação**
```bash
php artisan key:generate

```


6. **Configure o Banco de Dados**
Crie um banco de dados vazio no seu gerenciador (phpMyAdmin, Workbench, DBeaver). Em seguida, abra o arquivo `.env` e ajuste as credenciais:
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_seu_banco
DB_USERNAME=root
DB_PASSWORD=sua_senha

```


7. **Rode as Migrations**
Para criar as tabelas no banco de dados:
```bash
php artisan migrate

```


*(Opcional: Se houver dados de teste, use `php artisan migrate --seed`)*
8. **Inicie o Servidor**
Em um terminal, compile os assets (CSS/JS) em tempo real:
```bash
npm run dev

```


Em outro terminal, inicie o servidor do Laravel:
```bash
php artisan serve

```



🎉 **Pronto!** O projeto estará rodando em: `http://localhost:8000`
