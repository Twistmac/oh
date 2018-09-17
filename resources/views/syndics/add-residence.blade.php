@extends('layouts.layout-syndic')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Ajout nouvelle résidence :
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('syndic.add-residence') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="">
                                            Numéro de la résidence :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="numero" class="form-control" value="{{ old('numero') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['numero']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="">
                                            Nom de la résidence :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['nom']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="">
                                            Nom référent :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="nom_ref" class="form-control" value="{{ old('nom_ref') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['nom_ref']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="">
                                            Prénom référent :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="prenom_ref" class="form-control" value="{{ old('prenom_ref') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['prenom_ref']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="">
                                            Email :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['email']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="">
                                            Adresse :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="adresse" class="form-control" value="{{ old('adresse') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['adresse']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="">
                                            Code postal :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="code_postal" class="form-control" value="{{ old('code_postal') }}"><div class="error">
                                            {{ @$errors->default->getMessages()['code_postal']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="">
                                            Ville :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="ville" class="form-control" value="{{ old('ville') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['ville']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="">
                                            Téléphone :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="tel" class="form-control" value="{{ old('tel') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['tel']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="">
                                            Nombre limite de partenaires :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="nb_partenaire" class="form-control" value="{{ old('nb_partenaire') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['nb_partenaire']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="">
                                            Nombre limite de résidents :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="nb_resident" class="form-control" value="{{ old('nb_resident') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['nb_resident']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 col-md-offset-4">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-flat">
                                            Ajouter
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection