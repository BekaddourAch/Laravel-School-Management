 
    <div  class="container-fluid"> 
                 
                <input type="text"  class="form-control" placeholder="Search" wire:model="searchd" />
     
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Num </th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Inscription</th>
                            <th>Type</th>
                            <th>Observations</th>
                            <th>Telephone1</th>
                            <th>Téléphone2</th>
                            <th>Dossier</th>
                            <th>Agent</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="results">
                        @foreach ($students as $student)
                            <tr id='student_{{ $student->id }}'>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->lastname }}</td>
                                <td>{{ $student->inscription_Date }}</td>
                                <td>{{ $student->level }}</td>
                                <td>{{ $student->observation }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->phone2 }}</td>
                                <td>{{ $student->folder }}</td>
                                {{-- <td data-formatioid="{{ $student->formationId }}">{{ $student->inscription_Date }}</td> --}}
                                <td>{{ $student->User->name }}</td>
                                <td>

                                    {{-- <a class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $student->id }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a> --}}
                                    <a class="btn btn-info btn-sm" onclick="showEdit({{ $student->id }})"
                                        id="btn_edit">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    {{-- <a class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $student->id }}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a> --}}
                                    <a class="btn btn-danger btn-sm" onclick="showDelete({{ $student->id }})"
                                        id="btn_delete">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>

                                </td>
                            </tr>
                            @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Num </th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Inscription</th>
                            <th>Type</th>
                            <th>Observations</th>
                            <th>Telephone1</th>
                            <th>Téléphone2</th>
                            <th>Dossier</th>
                            <th>Agent</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
                {{ $students->links() }} 
    </div> 
