<header class="p-3 bg-dark text-white menubar">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
      </ul>


      @auth
        {{auth()->user()->name}}
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
         <li><a href="/cad-produto" class="nav-link px-2 text-white btn btn-outline-secondary">Cadastro de Produto</a></li>
         <li><a href="/cad-cliente" class="nav-link px-2 text-white btn btn-outline-secondary">Cadastro de Cliente</a></li>
         <li><a href="/emissao-fatura" class="nav-link px-2 text-white btn btn-outline-secondary">Emissão de Fatura</a></li>
         <li><a href="/" class="nav-link px-2 text-white btn btn-outline-secondary">Lista de Faturas</a></li>
         <li><a href="/lista-clientes" class="nav-link px-2 text-white btn btn-outline-secondary">Lista de Clientes</a></li>
         <li><a href="/lista-produtos" class="nav-link px-2 text-white btn btn-outline-secondary">Lista de Produtos</a></li>
         <li><a href="/administrador" class="nav-link px-2 text-white btn btn-outline-secondary">Informações</a></li>
         
        </ul>
        <div class="text-end">
          <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Sair</a>
        </div>
      @endauth

      @guest
        <div class="text-end">
          <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Entrar</a>
          <!--REGISTRAR <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a> -->
        </div>
      @endguest
    </div>
  </div>
</header>