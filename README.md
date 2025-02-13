<h3 id="inicio"></h3>

# Implementando Permissões no Laravel 11

### Requisitos
Para um entendimento melhor, aqui esta o link da Playlist em que o projeto foi baseado...
[Link da playlist](https://youtube.com/playlist?list=PLRB0wzP8AS_GfoZTiqsY1397H8LcXgkMZ&si=d-B_vnTrxIk4d79E)

- PHP 8+
- Composer
- MySQL ou SQLite
- Node.js e NPM (para o frontend, caso aplicável)

## Passo a Passo

### 1. Clonar o Projeto

```bash
git clone https://github.com/malobr/Permission-Laravel.git
cd backend
```

### 2. Instalar Dependências

```bash
composer install
npm install && npm run dev
```

### 3. Configurar o Ambiente

Copie o arquivo de exemplo `.env` e configure suas credenciais de banco de dados:

```bash
cp .env.example .env
```

Gere a chave da aplicação:

```bash
php artisan key:generate
```

Configure suas credenciais no `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```



### 4. Instalar e Configurar o Spatie Permissions

```bash
composer require spatie/laravel-permission
```

Publique a configuração:

```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```
Ou caso prefira...

```bash
  php artisan vendor:publish --tag="permission-migrations"
```

### 5. Criar o Banco de Dados e Rodar as Migrations

```bash
php artisan migrate 
```

### 6. Rodar a Seed

```bash
php artisan db:seed --class=SuperAdminSeeder
```

Isso criará:

 -  Todas as permissoes de todos os cruds..
 -  Uma role `superadmin` com todas as permissoes  
 -  Um usuário com e-mail `superadmin@teste.com` e senha `12345678`  
 -  Esse usuário terá a role de `superadmin`

### 7. Limpar o cache e Inicializar o Servidor

```bash
php artisan config:clear
php artisan cache:clear
php artisan optimize:clear
php artisan serve

```







Aqui está como você pode implementar as imagens numeradas de 1 a 10 no fluxo do sistema, seguindo a estrutura do seu tutorial:

---

### Fluxo do Sistema

Agora que você configurou o projeto e as permissões, vamos visualizar o fluxo do sistema, com as etapas representadas por imagens.

1. **Dashboard inicial**
   - **Imagem 1**: Contem as informacoes de quem esta logado..
   ![Imagem 1](images/1.png)

2. **Listagem das Permissoes**
   - **Imagem 2**: Contem a listagem das permissoes ja geradas pela seed....
   ![Imagem 2](images/2.png)

3. **Criacao das Permissoes**
   - **Imagem 3**: Criacao das permissoes, as permissopes ja estao predefinidas poara o sistema, para algo expecifico, crie as no codigo....
   ![Imagem 3](images/3.png)

4. **Edicao das Permissoes**
   - **Imagem 3**: Edicao das permissoes.
   ![Imagem 3](images/12.png)

5. **Listagem das Roles**
   - **Imagem 4**: Listagem das Roles existentes.
   ![Imagem 4](images/4.png)

6. **Criacao das Roles**
   - **Imagem 5**: Criacao das Roles atribuindo as pemissoes desejadas.
   ![Imagem 5](images/5.png)

7. **Edicao das Roles**
   - **Imagem 6**: Edicao das Roles, alterando suas permissoes e seu nome...
   ![Imagem 6](images/6.png)

8. **Listagem de Artigos**
   - **Imagem 7**: Lista dos Artigos.
   ![Imagem 7](images/7.png)

9. **Criacao dos Artigos**
   - **Imagem 7**: Criacao dos Artigos, Titulo, Texto e Autor.
   ![Imagem 12.5](images/12.5.png)

10. **Edicao dos Artigos**
   - **Imagem 8**: Edicao dos Artigos, Alterando seu titulo, conteudo e autor..
   ![Imagem 8](images/8.png)

11. **Listagem de Usuarios**
   - **Imagem 9**: Listagem, dos Usuarios Cadastrados...
   ![Imagem 9](images/9.png)

12. **Criacao dos Usuarios**
    - **Imagem 10**: Criacao dos Usuarios com Nome, Email e senha.
    ![Imagem 10](images/10.png)

12.5. **Edicao dos Usuarios**
     - **Imagem 10**: Edicao dos Usuarios Alterando seu Nome, Email e Role.
     ![Imagem 11](images/11.png)




<a href="#inicio">Voltar ao início</a>
