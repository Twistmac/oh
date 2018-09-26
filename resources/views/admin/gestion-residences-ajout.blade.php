    @extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">
                            Ajouter une nouvelle résidence :
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('admin.add-residence') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            Syndic rattaché :
                                        </label>
                                        <select name="syndic_id" id="syndic_id" class="form-control selectpicker" required>
                                            <option value="">Votre choix</option>
                                            <option value="new">Ajouter un nouveau syndic</option>
                                            @foreach ($syndics as $item)
                                                <option value="{{ $item->id }}">{{ $item->username ? $item->username : $item->email }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div id="new_syndic" class="hidden">
                                            <div class="form-group">
                                                <label for="">
                                                    Email du syndic :
                                                </label>
                                                <input type="text" id="syndic_email" name="email_syndic" class="form-control" value="{{ old('email_syndic') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">
                                                    Password du syndic :
                                                </label>
                                                <input type="text" id="syndic_password" name="password_syndic" class="form-control" id="password">
                                            </div>
                                            <div class="form-group">
                                                <span class="btn btn-danger btn-flat" id="generate">Générer mot de passe</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            Numéro de la résidence :
                                        </label>
                                        <input type="text" name="numero" class="form-control" value="{{ old('numero') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['numero']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            Nom de la résidence :
                                        </label>
                                        <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['nom']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            Nom référent :
                                        </label>
                                        <input type="text" name="nom_ref" class="form-control" value="{{ old('nom_ref') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['nom_ref']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            Prénom référent :
                                        </label>
                                        <input type="text" name="prenom_ref" class="form-control" value="{{ old('prenom_ref') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['prenom_ref']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            Email :
                                        </label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['email']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            Adresse :
                                        </label>
                                        <input type="text" name="adresse" class="form-control" value="{{ old('adresse') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['adresse']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            Code postal :
                                        </label>
                                        <input type="text" name="code_postal" class="form-control" value="{{ old('code_postal') }}"><div class="error">
                                            <div class="error">
                                                {{ @$errors->default->getMessages()['code_postal']['0'] }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            Ville :
                                        </label>
                                        <input type="text" name="ville" class="form-control" value="{{ old('ville') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['ville']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            Téléphone :
                                        </label>
                                        <input type="number" name="tel" class="form-control" value="{{ old('tel') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['tel']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            Nombre limite de partenaires :
                                        </label>
                                        <input type="number" name="nb_partenaire" class="form-control" value="{{ old('nb_partenaire') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['nb_partenaire']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            Nombre limite de résidents :
                                        </label>
                                        <input type="number" name="nb_resident" class="form-control" value="{{ old('nb_resident') }}">
                                        <div class="error">
                                            {{ @$errors->default->getMessages()['nb_resident']['0'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
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

    <script type="text/javascript">
        $('#syndic_id').change(function(){
            val = $(this).val();

            if(val != 'new')
            {
                $('#new_syndic').fadeOut().addClass('hidden');
                $('#syndic_email').val("");
                $('#syndic_password').val("");
            } else if(val == 'new') {
                $('#new_syndic').fadeIn();
                $('#new_syndic').removeClass('hidden');
            }
        });

        $('#generate').on('click', function () {
            var pass = Math.random().toString(36).substring(2, 10);

            $('#syndic_password').val(pass);
        });
    </script>
@endsection
