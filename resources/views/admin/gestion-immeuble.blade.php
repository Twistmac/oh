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
                                        Numero :
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
                                        Nom d'immeuble :
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
                                        Nombre d'appartement(s) :
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
                                            Modifier
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
                        <h4>Les appartements</h4>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Nom du resident</th>
                                <th>Pseudo</th>
                                <th>Module</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appartement as $appart)
                                <tr>
                                    <td>{{ $appart->id_appartement }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection