<h1 id="inicio">Implementando Permissões no Laravel</h1>

<h2 id="indice">Índice</h2>

**<a href="#1">[1] Relationship - Models</a>**

**<a href="#2">[2] Gates</a>**

**<a href="#3">[3] Policies</a>**

**<a href="#4">[4] Cache</a>**  


<h2 id="1">[1] Relationship - Models</h2>
  <a href="#indice">Voltar</a>

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



<br>
<br>
<a href="#inicio">Voltar ao inicio</a>
