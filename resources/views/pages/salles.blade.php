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
                    <h1 class="m-0">Les Salles القاعات الدراسية</h1>
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
            <a class="btn btn-app bg-warning">
                <span class="badge bg-info">0</span>
                <i class="fas fa-envelope"></i> Planning
            </a>
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Num salle</th>
                                <th>Nom</th>
                                <th>Type</th>
                                <th>Capacité</th>
                                <th>utilisateur</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salles as $salle)
                                <tr>
                                    <td>{{ $salle->id }}</td>
                                    <td>{{ $salle->nom }}</td>
                                    <td>{{ $salle->type }}</td>
                                    <td>{{ $salle->capacite }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        {{-- <a class="btn btn-primary btn-sm"
                                            href="{{ route('plannings.show', $salle->id, $salle->nom) }}"> --}}
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ url('plannings/' . $salle->id . '/' . $salle->nom) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            Planing
                                        </a>
                                        <a class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $salle->id }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $salle->id }}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>

                                    </td>
                                </tr>
                                {{-- ---------------------------------------------------------------------- MODAL EDIT------------------------------------------------------------------------------------- --}}
                                <div class="modal fade" id="edit{{ $salle->id }}">
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
                                                        <form action="{{ route('salles.update', $salle->id) }}"
                                                            method="POST" enctype="multipart/form-data"> @csrf

                                                            {{ method_field('Delete') }}

                                                            <input class="form-control form-control-lg" type="text"
                                                                value="{{ $salle->nom }}" name="nom">
                                                            <br>
                                                            <input class="form-control" type="text"
                                                                value="{{ $salle->type }}" name="type">
                                                            <br>
                                                            <input class="form-control form-control-sm" type="text"
                                                                value="{{ $salle->capacite }}" name="capacite">
                                                            <button type="submit" class="btn btn-primary">Submit</button>

                                                            <button type="button" class="btn btn-primary">Save
                                                                changes</button>
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
                                <div class="modal fade" id="delete{{ $salle->id }}">
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
                                                        <form action="{{ route('salles.destroy', $salle->id) }}"
                                                            method="POST" enctype="multipart/form-data"> @csrf
                                                            @csrf_field {{ method_field('delete') }}

                                                            <input class="form-control form-control-lg" type="hidden"
                                                                value="{{ $salle->id }}" name="id">
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
                                <th>Num salle</th>
                                <th>Nom</th>
                                <th>Type</th>
                                <th>Capacité</th>
                                <th>utilisateur</th>
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
                            <form action="{{ route('salles.store') }}" method="POST"enctype="multipart/form-data">
                                @csrf
                                <input class="form-control form-control-lg" type="text" placeholder="Nom De la Salle"
                                    name="nom">
                                <br>
                                <input class="form-control" type="text" placeholder="Type de la Salle"
                                    name="type">
                                <br>
                                <input class="form-control form-control-sm" type="text"
                                    placeholder="Capacité de la Salle" name="capacite">
                                <button type="submit" class="btn btn-primary">Submit</button>

                                <button type="button" class="btn btn-primary">Save changes</button>
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
