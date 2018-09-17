@extends('layouts.layout')

@section('content')
    <?php $r = $residence; ?>
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">
                            Modification résidence numéro "{{ $r->nom.' / '.$r->numero }}"
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="#" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Numéro :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="numero" class="form-control" value="{{ $r->numero }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Nom :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="nom" class="form-control" value="{{ $r->nom }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Nom référent :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="nom_ref" class="form-control" value="{{ $r->nom_ref }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Prénom référent :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="prenom_ref" class="form-control" value="{{ $r->prenom_ref }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Email :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" value="{{ $r->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Adresse :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="adresse" class="form-control" value="{{ $r->adresse }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Code postal :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="code_postal" class="form-control" value="{{ $r->code_postal }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Ville :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="ville" class="form-control" value="{{ $r->ville }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Téléphone :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="tel" class="form-control" value="{{ $r->tel }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Nombre partenaires :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="nb_partenaire" class="form-control" value="{{ $r->nb_partenaire }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Nombre résidents :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="nb_resident" class="form-control" value="{{ $r->nb_resident }}">
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
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Liste des résidents :
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped datatable">
                            <thead>
                                <tr>
                                    <th>
                                        Pseudo
                                    </th>
                                    <th>
                                        Nom
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($residents as $item)
                                    <tr>
                                        <td>
                                            {{ $item->username }}
                                        </td>
                                        <td>
                                            {{ $item->nom." ".$item->prenom }}
                                        </td>
                                        <td>
                                            {{ $item->email ? $item->email : 'N/A' }}
                                        </td>
                                        <td>
                                            <span class="glyphicon glyphicon-pencil"></span>
                                            &nbsp;-&nbsp;
                                            <button class="btn btn-flat btn-xs btn-danger">
                                                Supprimer
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">
                            Liste des partenaires :
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped datatable">
                            <thead>
                            <tr>
                                <th>
                                    Pseudo
                                </th>
                                <th>
                                    Nom
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($partenaires as $item)
                                <tr>
                                    <td>
                                        {{ $item->username }}
                                    </td>
                                    <td>
                                        {{ $item->nom." ".$item->prenom }}
                                    </td>
                                    <td>
                                        {{ $item->email ? $item->email : 'N/A' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.details-resident', ['id' => $item->id]) }}">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        &nbsp;-&nbsp;
                                        <button class="btn btn-flat btn-xs btn-danger">
                                            Supprimer
                                        </button>
                                    </td>
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