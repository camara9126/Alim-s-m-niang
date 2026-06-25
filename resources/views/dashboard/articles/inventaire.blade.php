@include('partials.header')
    <div class="dashboard">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <!-- Top Navigation -->
            <nav class="top-nav">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <form method="get" action="{{route('article.search')}}" class="form-inline">
                        
                        <input type="text" name="search"  placeholder="Rechercher...">                                                   
                            
                    </form>
                </div>

                @include('partials.userMenu')
            </nav>

            <!-- Content Area -->
            <div class="content">
                <!-- Page Header -->

                <div class="card">
                    <div class="card-header">
                        <span><i class="fas fa-box" style="color: var(--primary); margin-right: 0.5rem;"></i>Liste des inventaires</span>
                        <a href="{{route('articles.index')}}" style="color: red; text-decoration: none; font-weight: 500;">Retour →</a>
                    </div>

                    
                    <div class="card-body">    
                        <div class="table-responsive">
                            <table class="">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>N d'Article</th>
                                        <th>Somme Totale</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($magasins as $m)
                                    <tr>
                                        <td><strong>{{$m->id}}</strong></td>
                                        <td>{{$m->nom}}</td>
                                        <td>{{$m->article->count()}}</td>
                                        <td><strong>{{number_format($m->article->sum('prix_vente'), '0', ',', ' ')}} FCFA</strong></td>
                                        <td>
                                        <div class="action-buttons">
                                            <a href="" class="action-btn" data-bs-toggle="modal" data-id="{{ $m->id }}" data-name="{{ $m->nom }}" data-phone="{{ $m->telephone }}" data-email="{{ $m->email }}" data-adress="{{$m->adresse }}" data-bs-target="#magasinEditModal" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <!--<form action="{{route('magasin.destroy', $m->id)}}" type="button" method="post" onsubmit="return confirm('Supprimer ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-btn delete" title="Supprimer">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>-->
                                            <a href="{{route('magasin.liste', $m->id)}}" class="action-btn" title="afficher les articles"><i class="fas fa-list"></i></a>
                                        </div>
                                    </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" align="center">Donnee vide !</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table> 
                            
                        </div>



@include('partials.footer')
