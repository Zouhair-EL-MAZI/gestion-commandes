<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link"  href="#">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="{{ route("commandes.index") }}">Tout les commandes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="#">Mes informations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="{{ route("commandes.create") }}">Ajouter commande</a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="{{ route('stats.commandes') }}">
                Total Commandes
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('stats.produits') }}">
                Chiffre d'affaire
            </a>
        </li>
        
      @guest                                  
        <li class="nav-item">
          <a class="nav-link"  href="{{ route("loginform") }}">Se connecter</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
        </li>
      @endguest

      @auth
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{-- {{ Auth::user()->name }} --}}
            {{ auth()->user()->name }}              
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            {{-- <li><a class="dropdown-item"  href="{{ route("logout") }}">Déconnexion</a></li> --}}
            <li>
                <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                    @csrf
                    <button class="btn btn-danger btn-sm">Logout</button>
                </form>
            </li>
          </ul>
        </div>
      @endauth
    </ul>
  </div>
</nav>



