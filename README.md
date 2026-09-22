# Sistema de Geração de Notas Fiscais para Restaurante

Projeto Integrador em Computação II — UNIVESP, Polo Mogi das Cruzes.

Aplicação web para organizar as vendas de um restaurante e gerar as notas fiscais a partir dos pedidos.

## Estado atual

Esta é a **estrutura inicial** do projeto. O que já está pronto:

- Projeto Laravel configurado no padrão MVC
- Autenticação completa: login, cadastro, recuperação de senha e edição de perfil
- Layout base com Tailwind CSS
- Banco de dados local em SQLite

Ainda **não** implementado: cadastro de produtos, lançamento de pedidos e geração da nota fiscal.

## Tecnologias

| Camada | Ferramenta |
| --- | --- |
| Linguagem | PHP 8.3 ou superior |
| Framework | Laravel 13 |
| Telas | Blade + Tailwind CSS |
| Interatividade | JavaScript |
| Build de assets | Vite (Node.js) |
| Banco de dados | SQLite (local, nesta etapa) |

---

## 1. Instalar os pré-requisitos

É preciso ter **PHP 8.3+**, **Composer** e **Node.js 20+**.

### Windows

Abra o **PowerShell** e rode:

```powershell
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.5'))
```

Depois instale o Node.js:

```powershell
winget install OpenJS.NodeJS.LTS
```

**Feche e abra o terminal novamente** — os instaladores alteram o PATH, e os comandos só funcionam em um terminal novo.

Confira se está tudo no lugar:

```powershell
php -v
composer -V
node -v
```

<details>
<summary>Alternativa no Windows: instalar o PHP pelo winget (exige um ajuste manual)</summary>

O PHP distribuído pelo winget vem **sem arquivo de configuração**, e por isso as extensões que o Laravel precisa ficam desligadas. Se optar por esse caminho:

```powershell
winget install PHP.PHP.8.4
winget install OpenJS.NodeJS.LTS
```

Em seguida, vá até a pasta de instalação do PHP (algo como
`C:\Users\SEU_USUARIO\AppData\Local\Microsoft\WinGet\Packages\PHP.PHP.8.4_...`),
copie o arquivo `php.ini-development` para `php.ini` e, editando esse `php.ini`,
descomente (remova o `;` do começo da linha) as seguintes linhas:

```ini
extension_dir = "ext"
extension=curl
extension=fileinfo
extension=mbstring
extension=openssl
extension=pdo_sqlite
extension=pdo_pgsql
extension=zip
extension=intl
```

O Composer precisa ser instalado à parte, seguindo as instruções em <https://getcomposer.org/download/>.

</details>


## 2. Clonar e configurar o projeto

```bash
git clone https://github.com/MarceloMaciel/projeto-integrador-grupo-6-2026-2.git
cd projeto-integrador-grupo-6-2026-2
composer run setup
```

Esse único comando faz toda a configuração:

1. instala as dependências do PHP (`composer install`);
2. cria o arquivo `.env` a partir do `.env.example`;
3. gera a chave de criptografia da aplicação;
4. cria o banco SQLite e aplica as migrations (tabelas);
5. instala as dependências do Node e compila o CSS/JS.

---

## 3. Rodar a aplicação

```bash
php artisan serve
```

Acesse **<http://localhost:8000>**.

Na primeira execução não existe nenhum usuário cadastrado. Acesse
**<http://localhost:8000/register>** para criar a sua conta e entrar no sistema.

### Se for editar CSS ou JavaScript

Deixe o Vite rodando em um **segundo terminal**, para que as alterações sejam recompiladas ao salvar:

```bash
npm run dev
```

---

## Comandos úteis

| Comando | O que faz |
| --- | --- |
| `php artisan serve` | Sobe o servidor local em <http://localhost:8000> |
| `npm run dev` | Recompila CSS/JS automaticamente ao salvar |
| `npm run build` | Compila CSS/JS para versão final |
| `php artisan migrate` | Aplica as migrations pendentes no banco |
| `php artisan test` | Roda os testes automatizados |
| `php artisan route:list` | Lista todas as rotas da aplicação |

---

## Problemas comuns

**`php`, `composer` ou `npm` não é reconhecido como comando**
Feche o terminal e abra um novo. Os instaladores alteram o PATH do sistema, e terminais já abertos continuam com o valor antigo.

**`could not find driver` ou erro de extensão ausente**
Falta habilitar uma extensão do PHP. Veja a seção de instalação pelo winget acima, que lista as extensões necessárias e como ligá-las no `php.ini`.

**`Vite manifest not found`**
Os assets não foram compilados. Rode:

```bash
npm run build
```

**Erro de banco de dados ou tabela inexistente**
Aplique as migrations:

```bash
php artisan migrate
```

---

## Observações

- O arquivo **`.env` não é versionado** — cada pessoa tem o seu, criado automaticamente pelo `composer run setup`. Ele guarda configurações locais e a chave da aplicação.
- O banco **`database/database.sqlite` também não é versionado**: cada um tem o seu banco local, com os próprios dados de teste.
- Nesta etapa o banco é local. Em uma etapa seguinte do projeto ele passará a ser hospedado na nuvem.
