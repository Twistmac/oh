@extends('layouts.layout')

@section('content')
    @foreach($residence as $r)
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">
                            Résidence numéro  {{ $r->numero}}
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="" method="POST">
                            @csrf
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
                                        <input type="number" name="tel" class="form-control" value="{{ $r->tel }}">
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
                                        <input type="number" name="nb_partenaire" class="form-control" value="{{ $r->nb_partenaire }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Nombre Immeuble(s) :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="nb_immeuble" class="form-control" value="{{ $r->nb_immeuble }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Nombre de Motorbike :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="nb_motorbike" class="form-control" value="{{ $r->nb_motorbike }}">
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
        @endforeach

            <div class="col-md-6">
                <div class="box box-info">
                <div class="box-header">
                    <h4>Les Immeubles</h4>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom immeuble</th>
                            <th style="width: 35%">Nombre appartements</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($immeubles as $immeuble)
                            <tr>
                                <td>{{ $immeuble->id }}</td>
                                <td>{{ $immeuble->nom_immeuble }}</td>
                                <td>{{ $immeuble->nbr_appart }}</td>
                                <td>
                                    <a href="{{ route('admin.gestion-immeuble', ['id'=>$immeuble->id]) }}">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    &nbsp;-&nbsp;
                                    <form onsubmit="return confirm('Confirm delete ?')" class="form-inline" action="" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-flat btn-danger btn-xs">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection