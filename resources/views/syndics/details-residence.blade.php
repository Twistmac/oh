@extends('layouts.layout-syndic')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h1 class="titre-admin text-uppercase">
                        Fiche Résidence "numéro {{ $res->numero }}"
                    </h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Détails :
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('syndic.edit-residence', ['id' => $res->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">
                                            Numéro de la résidence :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="numero" class="form-control" value="{{ old('numero', $res->numero) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">
                                            Nom de la résidence :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="nom" class="form-control" value="{{ old('nom', $res->nom) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">
                                            Nom référent :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="nom_ref" class="form-control" value="{{ old('nom_ref', $res->nom_ref) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">
                                            Prénom référent :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="prenom_ref" class="form-control" value="{{ old('prenom_ref', $res->prenom_ref) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">
                                            Email :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" value="{{ old('email', $res->email) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">
                                            Adresse :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="adresse" class="form-control" value="{{ old('adresse', $res->adresse) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">
                                            Code postal :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="code_postal" class="form-control" value="{{ old('code_postal', $res->code_postal) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">
                                            Ville :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="ville" class="form-control" value="{{ old('ville', $res->ville) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">
                                            Téléphone :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="tel" class="form-control" value="{{ old('tel', $res->tel) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">
                                            Nombre limite de partenaires :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="nb_partenaire" class="form-control" value="{{ old('nb_partenaire', $res->nb_partenaire) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">
                                            Nombre limite de résidents :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="nb_resident" class="form-control" value="{{ old('nb_resident', $res->nb_resident) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 col-md-offset-5">
                                    <div class="form-group">
                                        <button class="btn btn-danger btn-flat">
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
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">
                            Ajouter un résident :
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('syndic.add-resident', array('id' => $res->id)) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">
                                    Login :
                                </label>
                                <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Password :
                                </label>
                                <input type="text" name="password" class="form-control" id="password">
                            </div>
                            <div class="form-group">
                                <span class="btn btn-danger btn-flat" id="generate">Générer mot de passe</span>
                            </div>
                            <div class="form-group">
                                <button class="btn-flat btn btn-primary">
                                    Ajouter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">
                            Ajouter un partenaire :
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('syndic.add-resident', array('id' => $res->id)) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">
                                    Login :
                                </label>
                                <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Password :
                                </label>
                                <input type="text" name="password" class="form-control" id="password2">
                            </div>
                            <div class="form-group">
                                <span class="btn btn-danger btn-flat" id="generate2">Générer mot de passe</span>
                            </div>
                            <div class="form-group">
                                <button class="btn-flat btn btn-primary">
                                    Ajouter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#generate').on('click', function () {
            var pass = Math.random().toString(36).substring(2, 10);

            $('#password').val(pass);
        });

        $('#generate2').on('click', function () {
            var pass = Math.random().toString(36).substring(2, 10);

            $('#password2').val(pass);
        });
    </script>
@endsection