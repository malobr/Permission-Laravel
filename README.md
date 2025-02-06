<h1 id="inicio">Implementando Permissões no Laravel</h1>

<h2>Links Uteis</h2>


  https://www.youtube.com/watch?v=DXOSjT_eU0Q&t=2626s

<h2 id="indice">Índice</h2>

**<a href="#1">[1] Relationship - Models</a>**

**<a href="#2">[2] Gates</a>**

**<a href="#3">[3] Policies</a>**

**<a href="#4">[4] Cache</a>**  

**<a href="#5">[5] Observers</a>**  


<h2 id="1">[1] Relationship - Models</h2>
  <a href="#indice">Voltar</a>

      Relacionamento de Muitos Para Muitos

      user <- -> permissions    
            user_permissions      


<h2 id="2">[2] Gates</h2>
  <a href="#indice">Voltar</a>

      `$this->authorize(Permission::MANEGE_USER)`
      
      `@can(Permission::MANEGE_USER)`

      `$user->can(Permission::MANEGE_USER)`

<h2 id="3">[3] Policies</h2>
  <a href="#indice">Voltar</a>

      
      public function delete(User $user, Post $post){
      
        return $post->creator->is($user) or $user->can(PERMISSION::MANAGE_POSTS);
      }
      


<h2 id="4">[4] Cache</h2>
  <a href="#indice">Voltar</a>

      cache permissions
  
<h2 id="5">[5] Observers</h2>
  <a href="#indice">Voltar</a>

      validar o cache quando mudar permissoes


<br>
<h2>Plano de Ataque kkk</h2>

  [x] criar um projeto Laravel
  
  [] instalar o laravel/breeze
  
  [] criar o model de permissions com a sua migration

  [] criar o relacionamento m-m entre user e permission : permission_user

  [] criar metodos dentro do Models/User pra adicionar permissao ao usuario:  `$user->givePermission('permissao')`

  [] criar um metodo dentro do Models/User para verificar se o usuario possui aquela permissao:       `$user->hasPermission('permissao')`

  [] configurar os gates para verificar as permissoes no AppServiceProvider

  [] configurar os gates para permitir policies + permissoes no AppServiceProvider

  [] colocar cache em tudo:
  
      () listar todas as permissoes
      () listar permissoes por usuario
      
  [] revalidar o cache de acordo com mudancas nas permissoes e no pemission_user
  

<a href="#inicio">Voltar ao inicio</a>
