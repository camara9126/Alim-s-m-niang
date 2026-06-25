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
                        <span><i class="fas fa-box" style="color: var(--primary); margin-right: 0.5rem;"></i>Liste des articles ( {{$articles->count()}} )</span>
                        <a href="{{route('articles.create')}}" style="color: var(--primary); text-decoration: none; font-weight: 500;" data-bs-toggle="modal"  data-bs-target="#articleModal">Nouveau article →</a>
                    </div>

                     @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('danger') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-center mt-4">
                        {{$articles->links()}}
                    </div>
                    <div class="card-body">    
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <!--<th style="background-color: #E5D8FF;">Image</th>-->
                                        <th style="background-color: #E5D8FF;">Code</th>
                                        <th style="background-color: #E5D8FF;">Produit</th>
                                        <th style="background-color: #E5D8FF;">Conditionnement</th>
                                        <th style="background-color: #E5D8FF;">Catégorie</th>
                                        <th style="background-color: #E5D8FF;">Prix</th>
                                        <th style="background-color: #E5D8FF;">Stock</th>
                                        <!--<th style="background-color: #E5D8FF;">Etiquette</th>-->
                                        <th style="background-color: #E5D8FF;">Statut</th>
                                        <th style="background-color: #E5D8FF;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($articles as $a)
                                    <tr>
                                        <!--<td>
                                            <div class="product-info">
                                                <img src="{{asset('storage/'. $a->image)}}" width="50" alt="">
                                            </div>
                                        </td>-->
                                        <td>
                                            <div class="product-info">
                                                <div style="font-weight: 600;">{{$a->code}}</div>
                                            </div>
                                        </td>
                                        <td>{{$a->nom}}</td>
                                        <td>{{strtoupper($a->type_conditionnement)}}</td>
                                        <td>{{$a->categorie->nom ?? '-'}}</td>
                                        <td><strong>{{$a->prix_vente}} FCFA</strong></td>
                                        <td>
                                            @if($a->stock_min >= $a->stock)
                                                <span class="badge bg-danger">Stock faible</span>
                                            @else
                                                 <span class="badge-success">{{$a->stock}} en stock</span>
                                            @endif
                                        </td>
                                        <!--<td>{{$a->etiquette ?? 'Pas d"etiquette'}}</td>-->
                                        <td><span class="badge-{{$a->statut ? 'success' : 'warning'}}">{{$a->statut ? 'Publié' : 'En attente'}}</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="" class="action-btn" title="Modifier"  data-bs-toggle="modal" data-id="{{ $a->id }}" data-name="{{ $a->nom }}" data-type_conditionnement="{{ $a->type_conditionnement }}" data-unites_par_condition="{{ $a->unites_par_condition }}" data-nb_conditions="{{ $a->nb_conditions }}" data-magasin="{{ $a->magasin_id }}" data-categorie="{{ $a->categorie_id }}" data-price="{{ $a->prix_vente }}" data-image="{{ asset('storage/'.$a->image) }}" data-bs-target="#articleEditModal">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{route('articles.destroy', $a->id)}}" type="button" method="post" onsubmit="return confirm('Supprimer ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-btn delete" title="Supprimer">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                <!--<a href="" class="action-btn" title="Dupliquer"><i class="fas fa-copy"></i></a>-->
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>

                        <!-- Nouveau article -->
                        <div class="modal fade" id="articleModal" tabindex="-1">
                            <div class="modal-dialog">
                                <form method="post" action="{{route('articles.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Nouveau article</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">

                                            <!--<div class="mb-3">
                                                <label>Image</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>-->

                                            <div class="mb-3">
                                                <label>Nom article</label>
                                                <input type="text" name="nom" class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label>Magasin</label>
                                                <select name="magasin_id" class="form-control">
                                                        <option value="">-- Selectionner --</option>
                                                    @foreach($magasin as $m)
                                                        <option value="{{ $m->id }}">{{ $m->nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>   

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label>Prix Achat</label>
                                                        <input type="number" name="prix_achat" class="form-control">
                                                    </div>
                                                   
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label>Prix Vente (par unite)</label>
                                                        <input type="number" name="prix_vente" class="form-control">
                                                    </div>  
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label>Type de conditionnement</label>
                                                <select name="type_conditionnement" class="form-control">
                                                    <option value="carton">Carton</option>
                                                    <option value="sac">Sac</option>
                                                    <option value="seau">Seau</option>
                                                    <option value="caisse">Caisse</option>
                                                    <option value="bidon">Bidon</option>
                                                    <option value="paquet">Paquet</option>
                                                    <option value="autre">Autre</option>
                                                </select>
                                            </div>  

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label>Nombre de conditionnement</label>
                                                        <input type="number" name="nb_conditions" id="nb_conditions" min="1" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label>Unites par conditionnement</label>
                                                        <input type="number" name="unites_par_condition" id="unites_par_condition" min="1" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label>Quantite Totale</label>
                                                <input type="number" name="stock" id="qty" class="form-control" readonly>
                                            </div>   

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label>Categorie</label>
                                                        <input type="text" name="categorie" class="form-control" placeholder="Nouveau categorie">
                                                        <select name="categorie_id" class="form-control">
                                                                <option value="">-- Selectionner --</option>
                                                            @foreach($categorie as $m)
                                                                <option value="{{ $m->id }}">{{ $m->nom }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label>Fournisseur</label>
                                                        <input type="text" name="fournisseur" class="form-control" placeholder="Nouveau fournisseur">
                                                        <select name="fournisseur_id" class="form-control">
                                                                <option value="">-- Selectionner --</option>
                                                            @foreach($fournisseur as $f)
                                                                <option value="{{ $f->id }}">{{ $f->nom }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>                                                    
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                            <!-- Edit article -->
                        <div class="modal fade" id="articleEditModal" tabindex="-1">
                            <div class="modal-dialog">

                                <form method="post" id="editArticleForm" action="" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modification article</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">

                                            <input type="hidden" name="id" id="article_id">
                                            <input type="hidden" name="categorie_id" id="categorie_id">
                                            <input type="hidden" name="magasin_id" id="magasin_id">

                                            <div class="mb-3">
                                                <label>Image</label>
                                                <img src="image" id="image" width="100" alt="">
                                                
                                            </div>

                                            <div class="mb-3">
                                                <label>Nom de l'article</label>
                                                <input type="text" name="nom" id="name" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label>Prix</label>
                                                <input type="text" name="prix_vente" id="price" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label>Type de conditionnement</label>
                                                <select name="type_conditionnement" id="type_conditionnement" class="form-control">
                                                    <option value="carton">Carton</option>
                                                    <option value="sac">Sac</option>
                                                    <option value="caisse">Caisse</option>
                                                    <option value="seau">Seau</option>
                                                    <option value="bidon">Bidon</option>
                                                    <option value="paquet">Paquet</option>
                                                    <option value="autre">Autre</option>
                                                </select>
                                            </div>  

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label>Nombre de conditionnement</label>
                                                        <input type="number" name="nb_conditions" id="nb_conditions" min="1" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label>Unites par conditionnement</label>
                                                        <input type="number" name="unites_par_condition" id="unites_par_condition" min="1" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label>Categorie</label>
                                                        <select name="" class="form-control">
                                                            @foreach($categorie as $c)
                                                                <option value="{{ $c->id }}">{{ $c->nom }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label>Fournisseur</label>
                                                        <select name="fournisseur_id" class="form-control">
                                                            @foreach($fournisseur as $f)
                                                                <option value="{{ $f->id }}">{{ $f->nom }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>         
                                                </div>
                                            </div>
  
                                            <div class="mb-3">
                                                <label>Magasin</label>
                                                <select name="magasin_id" class="form-control">
                                                    @foreach($magasin as $m)
                                                        <option value="{{ $m->id }}">{{ $m->nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>             

                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Donnees Formulaire Edit -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('articleEditModal');
            const form = document.getElementById('editArticleForm');

            modal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;

                // Récupération des données
                const id = button.getAttribute('data-id');
                const name = button.getAttribute('data-name');
                const price = button.getAttribute('data-price');
                const image = button.getAttribute('data-image');
                const categorie_id = button.getAttribute('data-categorie');
                const magasin_id = button.getAttribute('data-magasin');
                const type_conditionnement = button.getAttribute('data-type_conditionnement');
                const unites_par_condition = button.getAttribute('data-unites_par_condition');
                const nb_conditions = button.getAttribute('data-nb_conditions');
                
                // Remplir le formulaire
                modal.querySelector('#article_id').value = id;
                modal.querySelector('#name').value = name;
                modal.querySelector('#price').value = price;
                modal.querySelector('#image').src = image;
                modal.querySelector('#categorie_id').value = categorie_id;
                modal.querySelector('#magasin_id').value = magasin_id;
                modal.querySelector('#type_conditionnement').value = type_conditionnement;
                modal.querySelector('#unites_par_condition').value = unites_par_condition;
                modal.querySelector('#nb_conditions').value = nb_conditions;
                
                // Mettre à jour l'action du formulaire avec l'ID récupéré
                const updateUrl = `/articles/${id}`;
                form.action = updateUrl;
            });
        });
    </script>


    <!-- Calcule Quantite par Carton/Sac -->
    <script>
        function calculerQuantite() {
            let cartons = parseInt(document.getElementById('nb_conditions').value) || 0;
            let unite = parseInt(document.getElementById('unites_par_condition').value) || 0;

            document.getElementById('qty').value = cartons * unite;
        }

        document.getElementById('nb_conditions')
            .addEventListener('input', calculerQuantite);

        document.getElementById('unites_par_condition')
            .addEventListener('input', calculerQuantite);
    </script>

@include('partials.footer')