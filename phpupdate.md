
# Tutorial Completo: Atualizar PHP no XAMPP, Corrigir DLLs e Ativar ZIP

Este guia cobre a atualização do PHP para uma versão mais recente (ex: 8.2, 8.3 ou superior), corrigindo os conflitos de biblioteca do Apache e ativando a extensão `.zip`.

## ⚠️ Pré-requisitos

1. **Backup:** Faça uma cópia das pastas `C:\xampp\php` e `C:\xampp\apache\bin`.
2. **Versão:** Baixe o PHP **VS17 x64 Thread Safe** em [windows.php.net](https://windows.php.net/download/).
3. **Visual C++:** Garanta que você tenha o [Visual C++ Redistributable x64](https://www.google.com/search?q=https://aka.ms/vs/17/release/vc_redist.x64.exe) instalado.

---

## Passo 1: Substituir os Arquivos do PHP

1. Pare o Apache no painel do XAMPP.
2. Vá em `C:\xampp` e renomeie a pasta `php` para `php_old`.
3. Crie uma nova pasta `php` e extraia o conteúdo do `.zip` baixado nela.
4. Na nova pasta, renomeie o arquivo `php.ini-development` para `php.ini`.
5. *(Opcional)* Se tiver configurações antigas, replique-as manualmente neste novo arquivo.

---

## Passo 2: Atualizar DLLs do Apache (Correção do "Entry Point Error")

O Apache do XAMPP vem com bibliotecas OpenSSL antigas que entram em conflito com o novo PHP. Precisamos atualizar o Apache usando as DLLs que vieram no PHP novo.

1. Acesse a pasta do seu **NOVO PHP** (`C:\xampp\php`).
2. Copie (**Ctrl + C**) os seguintes arquivos (os nomes podem variar levemente na numeração):
* `libcrypto-*.dll` (ex: `libcrypto-3-x64.dll` ou `libcrypto-1_1-x64.dll`)
* `libssl-*.dll` (ex: `libssl-3-x64.dll` ou `libssl-1_1-x64.dll`)
* `libssh2.dll`
* `nghttp2.dll` (se existir)


3. Vá para a pasta de executáveis do **Apache**: `C:\xampp\apache\bin`.
4. Cole os arquivos (**Ctrl + V**).
5. O Windows perguntará se deseja substituir. Escolha **Sim/Substituir arquivos no destino**.

---

## Passo 3: Desativar o SSL (Correção do "Key too Small")

As novas bibliotecas de segurança (OpenSSL 3.x) rejeitam o certificado padrão antigo do XAMPP, impedindo o Apache de iniciar. Vamos desativar o HTTPS local para resolver isso.

1. Vá até `C:\xampp\apache\conf`.
2. Abra o arquivo `httpd.conf` com um editor de texto.
3. Procure pela linha (geralmente próxima à linha 520):
```apache
Include conf/extra/httpd-ssl.conf

```


4. Adicione um `#` no início para comentar a linha:
```apache
# Include conf/extra/httpd-ssl.conf

```


5. Salve o arquivo.

---

## Passo 4: Ativar a Extensão ZIP e Ajustar Caminhos

1. Abra o arquivo `C:\xampp\php\php.ini`.
2. **Corrigir o diretório de extensões:**
* Procure por `extension_dir`.
* Mude para o caminho absoluto (Windows):
```ini
extension_dir = "C:\xampp\php\ext"

```




3. **Ativar o Zip:**
* Procure por `;extension=zip`.
* Remova o ponto e vírgula inicial:
```ini
extension=zip

```


* *(Aproveite para ativar outras comuns como `extension=curl`, `extension=mbstring`, `extension=openssl` e `extension=pdo_mysql` removendo o `;` da frente delas).*


4. Salve o arquivo.

---

## Passo 5: Teste Final

1. Abra o **XAMPP Control Panel**.
2. Inicie o **Apache**. Ele deve ficar verde sem erros.
3. Crie um arquivo `teste.php` em `htdocs` com:
```php
<?php phpinfo(); ?>

```


4. Acesse `http://localhost/teste.php`.
5. Verifique se a versão no topo é a nova e busque na página por **"zip"** para confirmar que está `enabled`.

### 💡 Resumo para atualização do PHP Standalone (`C:\php`)

Para atualizar o PHP que roda direto no terminal (sem XAMPP):

1. Renomeie `C:\php` para `C:\php_backup`.
2. Extraia o novo zip numa nova pasta `C:\php`.
3. Configure o `php.ini` (ative o zip e arrume o `extension_dir` igual ao passo 4).
4. Teste no CMD com `php -v`.