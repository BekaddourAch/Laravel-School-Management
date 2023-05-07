@extends('layouts.master')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('page-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Les Enseignants المدرسين</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"> <a href="{{ URL::to('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"> </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


<!-- Main content -->
@section('content')
    <section class="content">

        <div class="container-fluid">

            <a class="btn btn-app bg-success" data-toggle="modal" data-target="#modal-lg">
                <span class="badge bg-purple">12 Salles</span>
                <i class="fas fa-users"></i> Ajouter
            </a>
            {{-- <a class="btn btn-app bg-warning">
                <span class="badge bg-info">0</span>
                <i class="fas fa-envelope"></i> Planning
            </a> --}}
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Num </th>
                                <th>nom</th>
                                <th>prenom</th>
                                <th>specialite</th>
                                <th>specialite2</th> 
                                <th>phone1</th>
                                <th>phone2</th> 
                                <th>Email</th>
                                <th>Adress</th>
                                <th>Creator</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Enseignants as $Enseignant)
                                <tr>
                                    <td>{{ $Enseignant->id }}</td>
                                    <td>{{ $Enseignant->nom }}</td>
                                    <td>{{ $Enseignant->prenom }}</td>
                                    <td>{{ $Enseignant->specialite }}</td>
                                    <td>{{ $Enseignant->specialite2 }}</td> 
                                    <td>{{ $Enseignant->phone1 }}</td>
                                    <td>{{ $Enseignant->phone2 }}</td> 
                                    <td>{{ $Enseignant->email }}</td>
                                    <td>{{ $Enseignant->address }}</td>
                                    <td>{{ $Enseignant->User->name }}</td>
                                    <td>

                                        <a class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $Enseignant->id }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $Enseignant->id }}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>

                                    </td>
                                </tr>
                                {{-- ---------------------------------------------------------------------- MODAL EDIT------------------------------------------------------------------------------------- --}}
                                <div class="modal fade" id="edit{{ $Enseignant->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Large Modal</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Ajouter une Salle</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="{{ route('enseignant.update', $Enseignant->id) }}"
                                                            method="POST" enctype="multipart/form-data"> @csrf

                                                            {{ method_field('PATCH') }}
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="nom">nom</label>
                                                                    <input class="form-control form-control-lg"
                                                                    placeholder="nom"
                                                                        type="text" value="{{ $Enseignant->nom }}"
                                                                        name="nom">
                                                                    <br>
                                                                    <label for="nom">prenom</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="prenom"
                                                                        value="{{ $Enseignant->prenom }}"
                                                                        name="prenom">
                                                                    <br>
                            
                                                                    <label for="nom">specialite</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="specialite"
                                                                        value="{{ $Enseignant->specialite }}"
                                                                        name="specialite">
                                                                    <br>
                            
                                                                    <label for="nom">specialite2</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="specialite2"
                                                                        value="{{ $Enseignant->specialite2 }}"
                                                                        name="specialite2">
                                                                    <br>
                            
                                                                    <label for="nom">specialite3</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="specialite3"
                                                                        value="{{ $Enseignant->specialite3 }}"
                                                                        name="specialite3">
                                                                    <br>
                            
                                                                    <br>
                            
                                                                </div>
                                                                <div class="col">
                                                                    <label for="nom">phone1</label>
                                                                    <input class="form-control form-control-lg"
                                                                    placeholder="phone1"
                                                                        type="text" value="{{ $Enseignant->phone1 }}"
                                                                        name="phone1">
                                                                    <br>
                                                                    <label for="nom">phone2</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="phone2"
                                                                        value="{{ $Enseignant->phone2 }}"
                                                                        name="phone2">
                                                                    <br>
                            
                                                                    <label for="nom">phone3</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="phone3"
                                                                        value="{{ $Enseignant->phone3 }}"
                                                                        name="phone3">
                                                                    <br>
                            
                                                                    <label for="nom">email</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="email"
                                                                        value="{{ $Enseignant->email }}"
                                                                        name="email">
                                                                    <br>
                            
                                                                    <label for="nom">address</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="address"
                                                                        value="{{ $Enseignant->address }}"
                                                                        name="address">
                                                                    <br>
                            
                                                                </div>
                                                            </div>



                                                            <button type="submit" class="btn btn-primary">Submit</button>

                                                        </form>

                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                {{-- ----------------------------------------------------------------------  ------------------------------------------------------------------------------------- --}}
                                {{-- ---------------------------------------------------------------------- MODAL DELETE ------------------------------------------------------------------------------------- --}}
                                <div class="modal fade" id="delete{{ $Enseignant->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Large Modal</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Supprimer une Salle</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="{{ route('enseignant.destroy', $Enseignant->id) }}"
                                                            method="POST" enctype="multipart/form-data"> @csrf
                                                            @csrf_field {{ method_field('delete') }}

                                                            <input class="form-control form-control-lg" type="hidden"
                                                                value="{{ $Enseignant->id }}" name="id">
                                                            <br>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>

                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                {{-- ----------------------------------------------------------------------  ------------------------------------------------------------------------------------- --}}
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Num </th>
                                <th>nom</th>
                                <th>prenom</th>
                                <th>specialite</th>
                                <th>specialite2</th> 
                                <th>phone1</th>
                                <th>phone2</th> 
                                <th>Email</th>
                                <th>Adress</th>
                                <th>Creator</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>


    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter une Salle</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('enseignant.store') }}" method="POST"enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="nom">nom</label>
                                        <input class="form-control form-control-lg"
                                        placeholder="nom"
                                            type="text"  
                                            name="nom">
                                        <br>
                                        <label for="nom">prenom</label>
                                        <input class="form-control" type="text"
                                            placeholder="prenom" 
                                            name="prenom">
                                        <br>

                                        <label for="nom">specialite</label>
                                        <input class="form-control" type="text"
                                            placeholder="specialite" 
                                            name="specialite">
                                        <br>

                                        <label for="nom">specialite2</label>
                                        <input class="form-control" type="text"
                                            placeholder="specialite2" 
                                            name="specialite2">
                                        <br>

                                        <label for="nom">specialite3</label>
                                        <input class="form-control" type="text"
                                            placeholder="specialite3" 
                                            name="specialite3">
                                        <br>

                                        <br>

                                    </div>
                                    <div class="col">
                                        <label for="nom">phone1</label>
                                        <input class="form-control form-control-lg"
                                        placeholder="phone1"
                                            type="text"  
                                            name="phone1">
                                        <br>
                                        <label for="nom">phone2</label>
                                        <input class="form-control" type="text"
                                            placeholder="phone2" 
                                            name="phone2">
                                        <br>

                                        <label for="nom">phone3</label>
                                        <input class="form-control" type="text"
                                            placeholder="phone3" 
                                            name="phone3">
                                        <br>

                                        <label for="nom">email</label>
                                        <input class="form-control" type="text"
                                            placeholder="email" 
                                            name="email">
                                        <br>

                                        <label for="nom">address</label>
                                        <input class="form-control" type="text"
                                            placeholder="address" 
                                            name="address">
                                        <br>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button> 
                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('/assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ URL::asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ URL::asset('/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('/assets/dist/js/adminlte.min.js') }}"></script>

    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
