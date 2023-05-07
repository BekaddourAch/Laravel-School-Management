 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ URL::asset('/assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Hello School</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ URL::asset('/assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">Alexander Pierce</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         {{-- <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div> --}}

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>

                         <p>
                             Accueil
                             <i class="right fas fa-light fa-circle-info "></i>
                         </p>
                     </a>
                 </li>
                 <li class="nav-header">Toutes les informations</li>
                  
                         <li class="nav-item">
                             <a href="{{ url('/salles') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Salles</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ url('/formations') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Formations</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ url('/enseignant') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Enseignants</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ url('/courses') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Types</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ url('/groups') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Groups</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ URL('/students') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Etudiants</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ URL('/inscription') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Inscriptions</p>
                             </a>
                         </li>
                      

                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Payements
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="pages/charts/chartjs.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Payements</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/charts/flot.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Rapports</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="pages/gallery.html" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Gallery
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-chart-pie"></i>
                         <p>
                             Paramètres
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="pages/charts/chartjs.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Sauvgarde</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/charts/flot.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Restaurer</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/charts/inline.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Réglages</p>
                             </a>
                         </li>
                     </ul>
                 </li>



                 {{-- <li class="nav-header">EXAMPLES</li>
                 <li class="nav-item">
                     <a href="pages/calendar.html" class="nav-link">
                         <i class="nav-icon far fa-calendar-alt"></i>
                         <p>
                             Calendar
                             <span class="badge badge-info right">2</span>
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="pages/kanban.html" class="nav-link">
                         <i class="nav-icon fas fa-columns"></i>
                         <p>
                             Kanban Board
                         </p>
                     </a>
                 </li>



                 <li class="nav-header">MISCELLANEOUS</li>
                 <li class="nav-item">
                     <a href="iframe.html" class="nav-link">
                         <i class="nav-icon fas fa-ellipsis-h"></i>
                         <p>Tabbed IFrame Plugin</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                         <i class="nav-icon fas fa-file"></i>
                         <p>Documentation</p>
                     </a>
                 </li>

                 <li class="nav-header">LABELS</li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-danger"></i>
                         <p class="text">Important</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-warning"></i>
                         <p>Warning</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-info"></i>
                         <p>Informational</p>
                     </a>
                 </li> --}}
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
