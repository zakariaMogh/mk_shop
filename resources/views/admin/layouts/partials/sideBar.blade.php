<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link {{request()->is('admin') ? 'active' : ''}}" href="{{route('admin.dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Tableau de bord
                </a>
                <a class="nav-link {{(request()->is('admin/categories*') || request()->is('admin/sub/categories*')) ? '' :'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseCategories" aria-expanded="{{request()->is('admin/categories*') || request()->is('admin/sub/categories*')}}" aria-controls="collapseCategories">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Categories
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{(request()->is('admin/categories*') || request()->is('admin/sub/categories*')) ? 'show' :'' }}" id="collapseCategories" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link sub_nav_link {{request()->is('admin/categories') ? 'active' : ''}} "  href="{{route('admin.categories.index')}}">Toutes catégories</a>
                        <a class="nav-link sub_nav_link {{request()->is('admin/categories/create') ? 'active' : ''}}" href="{{route('admin.categories.create')}}">Ajouter catégorie</a>
                        <a class="nav-link sub_nav_link {{request()->is('admin/sub/categories') ? 'active' : ''}}" href="{{route('admin.categories.sub.index')}}">Toutes sous-catégories</a></a>
                        <a class="nav-link sub_nav_link {{request()->is('admin/sub/categories/create') ? 'active' : ''}}" href="{{route('admin.categories.sub.create')}}">Ajouter sous-catégorie</a>
                    </nav>
                </div>
                <a class="nav-link {{request()->is('admin/products*') ? '' :'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="{{request()->is('admin/products*')}}" aria-controls="collapseProducts">
                    <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                    Produits
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{request()->is('admin/products*')? 'show' :'' }} " id="collapseProducts" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link sub_nav_link {{request()->is('admin/products') ? 'active' : ''}} " href="{{route('admin.products.index')}}">Tous les produits</a>
                        <a class="nav-link sub_nav_link {{request()->is('admin/products/create') ? 'active' : ''}} " href="{{route('admin.products.create')}}">Ajouter produit</a>
                    </nav>
                </div>
                <a class="nav-link {{request()->is('admin/orders*') ? '' :'collapsed' }}" href="{{route('admin.orders.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cart-arrow-down"></i></div>
                    Commandes
                </a>
                <a class="nav-link {{request()->is('admin/users*') ? 'active' : ''}}" href="{{route('admin.users.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Clients
                </a>
                <a class="nav-link {{request()->is('admin/banners') ? 'active' : ''}}" href="{{route('admin.banners.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-ad"></i></div>
                    Publicités
                </a>
                <a class="nav-link {{request()->is('admin/deliveries') ? 'active' : ''}}" href="{{route('admin.deliveries.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                    Livrasion
                </a>
                <a class="nav-link {{request()->is('admin/suggestions') ? 'active' : ''}}" href="{{route('admin.suggestions.index')}}">
                    <div class="sb-nav-link-icon"><i class="far fa-lightbulb"></i></div>
                    Suggestion
                </a>

                <a class="nav-link {{request()->is('admin/information') ? 'active' : ''}}" href="{{route('admin.information.edit', $information)}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                    Informations
                </a>
            </div>
        </div>
    </nav>
</div>
