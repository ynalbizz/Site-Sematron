
---

# Tutorial: Atualização do PHP e Ativação da Extensão ZIP

Este guia cobre a atualização manual do PHP instalado no Windows (standalone) e dentro do pacote XAMPP, além de como configurar a extensão `.zip`.

## ⚠️ Pré-requisitos e Avisos

* **Versão Correta:** Para o XAMPP, você **deve** baixar a versão **Thread Safe** (TS). Para uso geral no Windows, a Thread Safe também é recomendada se você pretende usar com Apache.
* **Arquitetura:** Certifique-se de baixar a versão x64 (ou x86 se seu sistema for muito antigo).

---

## Passo 1: Baixar o Novo PHP

1. Acesse o site oficial: [windows.php.net/download](https://windows.php.net/download/).
2. Procure a versão desejada (ex: PHP 8.x).
3. Baixe o arquivo **Zip** da versão **VS16 x64 Thread Safe** (ou a mais recente VS disponível).

---

## Passo 2: Atualizar o PHP Standalone (`C:\php`)

Se você usa o PHP adicionado ao PATH do Windows para rodar scripts via terminal:

1. **Parar processos:** Certifique-se de que nenhum script PHP está rodando.
2. **Renomear a pasta antiga:** Vá até `C:\` e renomeie a pasta `php` para `php_backup`.
3. **Extrair o novo:** Crie uma nova pasta `C:\php` e extraia todo o conteúdo do arquivo `.zip` que você baixou dentro dela.
4. **Configurar o `php.ini`:**
* Na nova pasta, procure o arquivo `php.ini-development`.
* Renomeie-o para `php.ini`.
* *Opcional:* Se você tinha configurações personalizadas no backup, abra o `php.ini` antigo e replique as mudanças no novo arquivo. **Não** apenas copie e cole o arquivo antigo, pois configurações podem ter mudado entre versões.



---

## Passo 3: Atualizar o PHP no XAMPP (`C:\xampp\php`)

O XAMPP é sensível a mudanças de versão, então siga com atenção:

1. **Parar o XAMPP:** Abra o XAMPP Control Panel e pare o Apache e o MySQL.
2. **Renomear a pasta antiga:** Vá em `C:\xampp` e renomeie a pasta `php` para `php_old`.
3. **Extrair o novo:** Crie uma nova pasta `php` dentro de `C:\xampp` e extraia o conteúdo do `.zip` baixado (o mesmo do passo 1).
4. **Migrar Configurações:**
* Copie o arquivo `php.ini` da pasta `php_old` e cole na nova pasta `php`.
* *Nota:* Se a atualização for de uma versão muito antiga (ex: PHP 7 para 8), o ideal é usar o `php.ini-development` novo e reconfigurá-lo manualmente, pois diretivas podem ter mudado.


5. **Ajuste do Apache (Apenas se mudar a versão principal):**
* Se você atualizou, por exemplo, do PHP 8.2 para o 8.3, geralmente não precisa mexer aqui.
* Se o Apache não iniciar, edite o arquivo `C:\xampp\apache\conf\extra\httpd-xampp.conf`. Procure por referências como `php8_module` e verifique se o nome da DLL na nova pasta `php` corresponde ao que está escrito lá (ex: `php8ts.dll`).



---

## Passo 4: Ativar a Extensão `.zip` (No XAMPP)

Agora vamos ativar a extensão necessária para lidar com arquivos zip (muito usada pelo Laravel e Composer).

1. Vá até `C:\xampp\php`.
2. Abra o arquivo `php.ini` com um editor de texto (Bloco de Notas, VS Code, etc).
3. Use `Ctrl + F` para procurar por: `extension=zip`.
4. Você provavelmente encontrará a linha assim:
```ini
;extension=zip

```


5. **Remova o ponto e vírgula (;)** do início da linha para descomentá-la. Deve ficar assim:
```ini
extension=zip

```


6. Salve o arquivo.

### Dica Importante

Verifique também se a linha `extension_dir` está apontando corretamente para a pasta de extensões. Procure por `extension_dir` no arquivo e garanta que ela esteja assim (no Windows):

```ini
extension_dir = "ext"

```

Ou caminho absoluto:

```ini
extension_dir = "C:\xampp\php\ext"

```

---

## Passo 5: Teste Final

1. Abra o painel do XAMPP e inicie o **Apache**.
2. Crie um arquivo chamado `info.php` em `C:\xampp\htdocs` com o seguinte conteúdo:
```php
<?php phpinfo(); ?>

```


3. Acesse `http://localhost/info.php` no navegador.
4. Busque na página por "zip". Se aparecer uma seção detalhando a versão do Zip, a extensão está ativa.
5. Para testar o PHP do terminal (`C:\php`), abra o CMD e digite:
```bash
php -v

```



Deseja que eu te ajude a criar um script `.bat` para alternar rapidamente entre as versões do PHP no PATH do sistema?