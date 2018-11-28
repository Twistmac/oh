    @extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">
                            Add a new residence:
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('admin.add-residence') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            Residence number:
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
                                            Name of the residence:
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
                                            Referent lastname:
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
                                            Referent firstname :
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
                                            E-mail :
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
                                            Address :
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
                                            Postal Code :
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
                                            City :
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
                                            Phone :
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
                                            Limited number of partners:
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
                                            Number of building (s):
                                        </label>
                                        <input type="number" name="nb_immeuble" class="form-control" value="" required>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            Number of motorbikes:
                                        </label>
                                        <input type="number" name="nb_motorbike" class="form-control" value="" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-flat">
                                            Add
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
