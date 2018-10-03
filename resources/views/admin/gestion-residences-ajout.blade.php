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
                                            Numéro de la résidence :
                                        </label>
                                        <input type="text" name="numero" class="form-control" value="{{ old('numero') }}" required>
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
                                        <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
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
                                        <input type="text" name="nom_ref" class="form-control" value="{{ old('nom_ref') }}" required>
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
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
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
                                        <input type="text" name="adresse" class="form-control" value="{{ old('adresse') }}" required>
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
                                        <input type="text" name="code_postal" class="form-control" value="{{ old('code_postal') }}" required><div class="error">
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
                                        <input type="number" name="tel" class="form-control" value="{{ old('tel') }}" required>
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
                                        <input type="number" name="nb_partenaire" class="form-control" value="{{ old('nb_partenaire') }}" required>
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
                                            Nombre d'immeuble(s) :
                                        </label>
                                        <input type="number" name="nb_immeuble" class="form-control" value="" required>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            Nombre de motorbikes :
                                        </label>
                                        <input type="number" name="nb_motorbike" class="form-control" value="" required>
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
