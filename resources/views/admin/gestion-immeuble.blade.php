@extends('layouts.layout')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-5">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">

                        </h3>
                    </div>
                    @foreach($immeuble as $immeubles)
                    <div class="box-body">
                        <form action="{{ route('admin.edit-immeuble', ['id'=>$immeubles->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Number :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="numero" class="form-control" value="{{ $immeubles->id }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Building name:
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="nom_immeuble" class="form-control" value="{{ $immeubles->nom_immeuble }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Number of apartment (s):
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="nbr_appart" class="form-control" value="{{ $immeubles->nbr_appart }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 col-md-offset-4">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-flat">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                            Check
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                        @endforeach
                </div>
            </div>


            <div class="col-md-7">
                <div class="box box-info">
                    <div class="box-header">
                        <h4>Buildings</h4>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th> </th>
                                <th>Number</th>
                                <th>Action </th>
                            </tr>
                            </thead>
                            <tbody id="tbody-appart">
                            <?php $int = 0; ?>
                            @foreach($appartement as $appart)
                                <?php $int++ ?>
                                <tr>
                                    <td>{{ $int }}</td>
                                    <td>{{ $appart->num_appartement }}</td>
                                    <td class="action">
                                        <input id="num-module-hidden" type="hidden" value="{{ $appart->num_appartement }}" >
                                        <input id="id-module-hidden" type="hidden" value="{{ $appart->id_appartement }}" >
                                        <a class="btn btn-primary btn-sm">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <form action="{{ route('admin.edit-num-appartement') }}" method="Post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                Number of apartment:
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input id="num-module-edit"  type="number" name="num_appart" class="form-control" value="">
                                <input id="id-module-edit" name="id_appart" type="hidden" value="" >
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>

            </div>
        </div>


        <script>
            $(document).ready(function(){
                $('#tbody-appart tr .action').click(function () {
                    var num_module = $(this).find('#num-module-hidden').val();
                    var id_module = $(this).find('#id-module-hidden').val();
                    $('#num-module-edit').val(num_module);
                    $('#id-module-edit').val(id_module);

                    $('#modal-edit').modal('show');
                })
            })
        </script>


@endsection