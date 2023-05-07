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
                    <h1 class="m-0">Les groups الأفواج</h1>
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
                <form action="{{ route('types.search') }}" method="GET">
                    <label for="search" class="sr-only">
                        Search
                    </label>
                    <input type="text" name="s"
                        class="block w-full p-3 pl-10 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Search..." />
                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                        
                    </div>
                </form>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Num </th>
                                <th>Nom</th>
                                <th>Nbr Etudiants</th>
                                <th>Type</th>
                                <th>Enseignant</th>
                                <th>Total Séances</th>
                                <th>Séance Passé</th>
                                <th>Mois</th>
                                <th>Agent</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $group)
                                <tr id='group_{{ $group->id }}'>
                                    <td>{{ $group->id }}</td>
                                    <td>{{ $group->name }}</td>
                                    <td>{{ $group->numbstuds }}</td>
                                    <td>{{ $group->cources->name  }}</td>
                                    <td>{{ $group->Enseignant->nom  }}</td>
                                    <td>{{ $group->nbr_seance }}</td>
                                    <td>{{ $group->nbr_Click }}</td>
                                    <td>{{ $group->niveau }}</td>
                                    <td>{{ $group->User->name }}</td>
                                    {{-- <td data-formatioid="{{ $group->formationId }}">{{ $group->Formation->nom }}</td> --}}
                                    <td>

                                        {{-- <a class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $group->id }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a> --}}
                                        <a class="btn btn-info btn-sm" onclick="showEdit({{ $group->id }})"
                                            id="btn_edit">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        {{-- <a class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $group->id }}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a> --}}
                                        <a class="btn btn-danger btn-sm" onclick="showDelete({{ $group->id }})"
                                            id="btn_delete">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>

                                    </td>
                                </tr>
                                {{-- ---------------------------------------------------------------------- MODAL EDIT------------------------------------------------------------------------------------- --}}


                                {{-- ----------------------------------------------------------------------  ------------------------------------------------------------------------------------- --}}
                                

                                {{-- ----------------------------------------------------------------------  ------------------------------------------------------------------------------------- --}}
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Num </th>
                                <th>Nom</th>
                                <th>Nbr Etudiants</th>
                                <th>Type</th>
                                <th>Enseignant</th>
                                <th>Total Séances</th>
                                <th>Séance Passé</th>
                                <th>Mois</th>
                                <th>Agent</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{-- {{ $groups->onEachSide(5)->links() }} --}}
                    
                    {{-- {{ $groups->links() }} --}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>









{{-- ---------------------------------------------------------------------- MODAL DELETE ------------------------------------------------------------------------------------- --}}
<div class="modal fade" id="delete_mdl">
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
                        <h3 class="card-title">Supprimer un Type</h3>
                    </div>
                    <div class="card-body">
                        <form action="" id="destroy_frm"
                            method="POST" enctype="multipart/form-data"> @csrf
                            @csrf {{ method_field('delete') }}

                            <input class="form-control form-control-lg" type="hidden"
                                value="" name="id" id="id_group">
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
    {{-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}

    <div class="modal fade" id="edit_mdl">
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
                            <h3 class="card-title">Update une Salle</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" id="update_frm" enctype="multipart/form-data"> @csrf

                                {{ method_field('PATCH') }}
                                <div class="row">
                                    <div class="col">
                                        <label for="nom">nom</label>
                                        <input class="form-control form-control-lg" placeholder="nom" type="text"
                                            name="name" id="name"
                                            value="
                                            ">
                                        <br>
                                        <label for="nom">Déscription</label>
                                        <input class="form-control" type="text" placeholder="prenom" name="description"
                                            id="description" value="">
                                        <br>

                                        <label for="nom">Prix</label>
                                        <input class="form-control" type="text" placeholder="specialite"
                                            name="prix" id="prix" value="">
                                        <br>


                                    </div>
                                    <div class="col">
                                        <label for="nom">Nombre de scéances</label>
                                        <input class="form-control form-control-lg" placeholder="phone1" type="text"
                                            name="duree" id="duree" value="">
                                        <br>
                                        <label for="nom">le Type</label>
                                        <select class="fancyselect" name="formationId" id="formationId">


                                            @foreach ($cources as $cource)
                                                <option value="{{ $cource->id }}"> {{ $cource->name }}</option>
                                            @endforeach
                                        </select>
                                        <br>

                                        <label for="nom">l'Enseignant</label>
                                        <select class="fancyselect" name="formationId" id="formationId">


                                            @foreach ($enseignats as $enseignat)
                                                <option value="{{ $enseignat->id }}"> {{ $enseignat->nom }}</option>
                                            @endforeach
                                        </select>


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



    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-md">
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
                            <form action="{{ route('groups.store') }}" method="POST"enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    
                                    <div class="col">
                                        <label for="nom">Nom du group</label>
                                        <input class="form-control form-control-lg" placeholder="" type="text" name="name">
                                        <br>
                                        <label for="nom">le Type</label>
                                        <select class="form-control" name="courses_id" id="formationId"> 
                                            @foreach ($cources as $cource)
                                                <option value="{{ $cource->id }}"> {{ $cource->name }}</option>
                                            @endforeach
                                        </select>
                                        <br>

                                        <label for="nom">l'Enseignant</label>
                                        <select class="form-control" name="enseignant_Id" id="formationId"> 
                                            @foreach ($enseignats as $enseignat)
                                                <option value="{{ $enseignat->id }}"> {{ $enseignat->nom }}</option>
                                            @endforeach
                                        </select>  
                                    </div>
                                </div><br><br><br>
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
                "paging": false,
                "searching": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            // $('#example1').DataTable({
            //     "paging": false,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            //     "responsive": true,
            // });
        });
    </script>
    <script>
        //   $('#btn_edit').click(function () {});

        //    $('select[name="formationId"]').click(function () {
        //             console.log('opned'); 
        //             var formationId = $(this).val();
        //             if (formationId) {
        //                 $.ajax({
        //                     url: "{{ URL::to('tuuu') }}/" + formationId,
        //                     type: "GET",
        //                     dataType: "json",
        //                     success: function (data) {
        //                         console.log();
        //                         $('select[name="formationId"]').empty();
        //                         $.each(data, function (key, value) {
        //                             if(formationId==value){
        //                                 console.log("yes");
        //                             $('select[name="formationId"]').append('<option value="' + value + '"    i>' + key + '</option>');
        //                             }else{ 
        //                             $('select[name="formationId"]').append('<option value="' + value + '" i>' + key + '</option>');
        //                             }

        //                         console.log(value);
        //                         });
        //                     },
        //                 });
        //             } else {
        //                 console.log('AJAX load did not work');
        //             }

        //     });

        function showEdit(id) {

            // console.log('--'+$('#group_'+id).children().eq(5)); 
            // console.log('--'+$('#group_'+id).children().eq(5).data('formatioid'));
            var form = document.getElementById("update_frm");
            var action ="{{ route('groups.update',"") }}/"+id;
            form.action = action;
// $('#edit_mdl #update_frm').attr("action",action);
            $('#edit_mdl #name').val($('#group_' + id).children().eq(1).html());
            $('#edit_mdl #description').val($('#group_' + id).children().eq(2).html());
            $('#edit_mdl #prix').val($('#group_' + id).children().eq(3).html());
            $('#edit_mdl #duree').val($('#group_' + id).children().eq(4).html());
            $('#edit_mdl #formationId').val($('#group_' + id).children().eq(5).data('formatioid'));
            $('#edit_mdl').modal('show');
        }

        function showDelete(id) {  
            var form = document.getElementById("destroy_frm");
            var action ="{{ route('groups.destroy',"") }}/"+id;
            form.action = action;
$('#delete_mdl #id_group').val($('#group_' + id).children().eq(0).html());

$('#delete_mdl').modal('show');
}
    </script>
@endsection
