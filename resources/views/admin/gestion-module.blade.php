@extends('layouts.layout')

@section('content')

<div class="content">
    <div class="row">

        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">
                        Ajouter nouveau module
                    </h3>
                </div>
                <div class="box-body">
                    <form method="post" action="#">
                        @csrf
                        <div class="form-group">
                            <label for="">
                                Numéro module :
                            </label>
                            <input type="number" name="numero_module" class="form-control" required>
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
                        <div class="form-group">
                            <label for="">
                                Numéro d'IMEI :
                            </label>
                            <input type="number" name="imei" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Numéro téléphone :
                            </label>
                            <input type="number" name="tel" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Numéro PIN :
                            </label>
                            <input type="number" name="pin" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <span class="fa fa-check-circle-o"></span> Ajouter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header">
                    <h4>Liste des modules</h4>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover datatable" >
                        <thead>
                        <tr>
                            <th>Numero module</th>
                            <th>Numero téléphone</th>
                            <th>Date de création</th>

                        </tr>
                        </thead>
                        <tbody >
                        @foreach($module as $mod)
                            <tr>
                                <td>{{ $mod->numero_module }}</td>
                                <td>{{ $mod->numero_tel }}</td>
                                <td>{{ $mod->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection