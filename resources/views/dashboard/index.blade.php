@include('partials.header')
    <div class="dashboard">
        <!-- Sidebar -->
            <aside class="sidebar">
            <div class="sidebar-header">
                <h2>
                    @if($entreprise->logo)
                        <img src="{{asset('storage/'.$entreprise->logo)}}" width="130" alt="">
                    @else
                        {{$entreprise->nom}}
                    @endif
                </h2>
                <p>Dashboard d'administration</p>
            </div>

            <nav class="sidebar-nav">
                <ul>
                        <li>
                            <a href="{{ route('dashboard') }}" class="">
                                <i class="fas fa-chart-pie"></i>
                                <span>Tableau de bord</span>
                            </a>
                        </li> 

                        <div class="sidebar-divider"></div>
                    <li>
                        <a href="{{ route('articles.index') }}">
                            <i class="fas fa-box"></i>
                            <span>Articles</span>
                            <span class="badge"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categorie.index') }}">
                            <i class="fas fa-tags"></i>
                            <span>Catégories</span>
                            <span class="badge"></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('fournisseurs.index') }}">
                            <i class="fas fa-truck"></i>
                            <span>Fournisseurs</span>
                            <span class="badge"></span>
                        </a>
                    </li>

                    <div class="sidebar-divider"></div>

                    <li>
                        <a href="{{ route('clients.index') }}">
                           <i class="fas fa-users"></i>
                            <span>Clients</span>
                            <span class="badge"></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('commandes.index') }}">
                           <i class="fas fa-shopping-cart"></i>
                            <span>Vente</span>
                            <span class="badge"></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('devis.index') }}">
                            <i class="fas fa-receipt"></i>
                            <span>Devis</span>
                            <span class="badge"></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('commandes.factures') }}">
                           <i class="fas fa-file-invoice"></i>
                            <span>Factures</span>
                            <span class="badge"></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('commandes.pdv') }}">
                            <i class="fas fa-shop"></i>
                            <span>Point de vente</span>
                            <span class="badge"></span>
                        </a>
                    </li>
                    
                    <div class="sidebar-divider"></div>

                    <li>
                        <a href="{{ route('achats.index') }}">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span>Achat</span>
                            <span class="badge"></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('bonCommande.index') }}">
                            <i class="fas fa-list"></i>
                            <span>Bon de commande</span>
                            <span class="badge"></span>
                        </a>
                    </li>
                     
                    <li>
                        <a href="{{ route('magasin.index') }}">
                            <i class="fas fa-building"></i>
                            <span>Magasins</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('mouvements') }}">
                            <i class="fas fa-bars-staggered"></i>
                            <span>Mouvement stock</span>
                        </a>
                    </li>

                        <li>
                            <a href="{{ route('paiements.index') }}">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>Paiements</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('recettes.index') }}">
                                <i class="fas fa-right-left"></i>
                                <span>Recettes</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('depenses.index') }}">
                                <i class="fas fa-arrow-right-from-bracket"></i>
                                <span>Depenses</span>
                            </a>
                        </li>
                    
                        <li>
                            <a href="{{ route('rapports') }}">
                                <i class="fas fa-chart-bar"></i>
                                <span>Rapports</span>
                            </a>
                        </li>                    
                    
                        <li>
                            <a href="{{ route('users.index') }}">
                                <i class="fas fa-user"></i>
                                <span>Utilisateur</span>
                            </a>
                        </li>
                   <div class="sidebar-divider"></div>

                    <li>
                        <a href="{{ route('parametre') }}">
                            <i class="fas fa-cog"></i>
                            <span>Paramètres</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <!-- Top Navigation -->
            <nav class="top-nav">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="tabs-navigation mb-4" id="tabsNav">
                    <!--<a href="{{ route('ouvrirCaisse') }}" class="tab-btn ">Ouvrir la session</a>
                    <button class="tab-btn" data-tab="orders">Commandes</button>
                    <button class="tab-btn" data-tab="menu">Menu</button>
                    <button class="tab-btn" data-tab="customers">Clients</button>
                    <button class="tab-btn" data-tab="inventory">Inventaire</button>-->
                </div>
                
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Rechercher...">
                </div>

                
                
                @include('partials.userMenu')
            </nav>

            <!-- Content Area -->
            <div class="content">
                <!-- Page Header -->
                <div class="page-header">
                    <h1>Tableau de bord</h1>
                    <div>
                        <!--<button class="btn-outline" style="margin-right: 0.5rem;">
                            <i class="fas fa-download"></i> Exporter
                        </button>-->
                        <a href="{{ route('articles.import.page') }}" class="btn-primary">
                            <i class="fas fa-shop"></i>Importer le fichier articles
                        </a>
                    </div>
                </div>

                <!-- Stats Cards -->
                 <!-- 1er ligne -->
                <div class="stats-grid">
                    <div class="stat-card" style="background-color: #c5a8ff;">
                        <div class="stat-info">
                            <a href="{{ route('articles.index') }}">
                                <h3>Articles</h3>
                                <div class="number">{{$articles->count()}}</div>
                            </a>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                    <div class="stat-card" style="background-color: #DBAC46;">
                        <div class="stat-info">
                            <a href="{{ route('clients.index') }}">
                                <h3>Clients</h3>
                                <div class="number">{{$clients->count()}}</div>
                            </a>    
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    
                    <div class="stat-card" style="background-color: #F8F5DF;">
                        <div class="stat-info">
                            <a href="{{ route('commandes.create') }}">
                                <h3 class="">factures</h3>
                                <div class="number">{{$commandes->count()}}</div>
                            </a>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                    <!--<div class="stat-card">
                        <div class="stat-info">
                            <a href="{{ route('devis.create') }}">
                                <h3>Devis</h3>
                                <div class="number">{{$devis->count()}}</div>
                            </a>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                    </div>-->
                </div>

                <!-- 2nd ligne -->
                <div class="stats-grid">
                    <div class="stat-card2" style="background-color: #163318;">
                        <div class="stat-info">
                            <a href="{{ route('articles.create') }}">
                                <h3 class="text-white">Nouveau produit</h3>
                                <div class="number text-white"></div>
                            </a>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                    <div class="stat-card2" style="background-color: #EC6206;">
                        <div class="stat-info">
                            <a href="{{ route('mouvements') }}">
                                <h3 class="text-white">Stock</h3>
                                <div class="number text-white">{{$mouvements->count()}} produits</div>
                            </a>    
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-bars-staggered"></i>
                        </div>
                    </div>
                    
                    <div class="stat-card2" style="background-color: #11C6FF;">
                        <div class="stat-info">
                            <a href="{{ route('bonCommande.create') }}">
                                <h3 class="text-white">Bon commande</h3>
                                <div class="number text-white">{{$bonCommandes->count()}}</div>
                            </a>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-list"></i>
                        </div>
                    </div>
                    <div class="stat-card2" style="background-color: #697345;">
                        <div class="stat-info">
                            <a href="{{ route('devis.create') }}">
                                <h3 class="text-white">Devis</h3>
                                <div class="number text-white">{{$devis->count()}}</div>
                            </a>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                    </div>
                </div>
 

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Ventes mensuelles</h5>
                         <select class="form-select form-select-sm w-auto">
                            <option>{{$annee}}</option> 
                        </select>
                    </div>
                    <div class="card body">
                        <div class="chart-container">
                            <canvas id="ordersChart"></canvas>
                        </div>
                    </div>
                </div>

                 <!-- Recent Products Table -->
                <div class="card" style="border: #088499;">
                    <div class="card-header">
                        <span><i class="fas fa-box" style="color: var(--primary); margin-right: 0.5rem;"></i> Articles récents</span>
                        <a href="{{ route('articles.index') }}" style="color: var(--primary); text-decoration: none; font-weight: 500;">Voir tout →</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="background-color: #11C6FF;" class="text-white">Image</th>
                                        <th style="background-color: #11C6FF;" class="text-white">Code</th>
                                        <th style="background-color: #11C6FF;" class="text-white">Produit</th>
                                        <th style="background-color: #11C6FF;" class="text-white">Catégorie</th>
                                        <th style="background-color: #11C6FF;" class="text-white">Prix</th>
                                        <th style="background-color: #11C6FF;" class="text-white">Stock</th>
                                        <th style="background-color: #11C6FF;" class="text-white">Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($article as $a)
                                    <tr>
                                        <td>
                                            <div class="product-info">
                                                <img src="{{asset('storage/'. $a->image)}}" width="50" alt="">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <div style="font-weight: 600;">{{$a->code}}</div>
                                                <!--<div style="font-size: 0.85rem; color: var(--gray-600);">GBH 2-26</div>-->
                                            </div>
                                        </td>
                                        <td>{{$a->nom}}</td>
                                        <td>{{$a->categorie->nom}}</td>
                                        <td><strong>{{$a->prix_vente}} FCFA</strong></td>
                                        <td><span class="badge-success">{{$a->stock}} en stock</span></td>
                                        <td><span class="badge-{{$a->statut ? 'success' : 'warning'}}">{{$a->statut ? 'Publié' : 'En attente'}}</span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Donnees du graphique -->
    <script>
        const commandesMoisLabels = @json($commandesMoisLabels);
        const commandesMoisData = @json($commandesMoisData);

        // Graphique des commandes
        const ordersCtx = document.getElementById('ordersChart').getContext('2d');
        const ordersChart = new Chart(ordersCtx, {
            type: 'line',
            data: {
                labels: commandesMoisLabels, //['1', '5', '10', '15', '20', '25', '30'],
                datasets: [{
                    label: 'Commandes',
                    data: commandesMoisData, //[45, 52, 48, 65, 70, 75, 82],
                    borderColor: '#3498db',
                    backgroundColor: 'rgba(52, 152, 219, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Nombre de commandes'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Jours du mois'
                        }
                    }
                }
            }
        });
    </script>

@include('partials.footer')