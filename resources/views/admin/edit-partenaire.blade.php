@extends('layouts.layout')

<style type="text/css">
    .field-icon {
        float: right;
        margin-right: 7px!important;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }
</style>
@section('content')
    @foreach($partenaire as $part)
    <div class="content">
        <form action="" method="post">
            @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">

                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        Partner number :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="num_partenaire" type="text" class="form-control" value="{{ $part->num_partenaire }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        Category :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <select id="categorie" name="categorie_id" class="form-control">
                                        @foreach($categorie as $cat)
                                        <option value="{{ $cat->id }}"> {{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    <script>
                                        $('#categorie option[value="{{ $part->categorie_id }}"] ').prop("selected",true);

                                    </script>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        Name sign :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="enseigne" type="text" class="form-control" value="{{ $part->enseigne }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        Referent name :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="nom" type="text" class="form-control" value="{{ $part->nom }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        Referent firstname :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="prenom" type="text" class="form-control" value="{{ $part->prenom }}">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        address :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="adresse" type="text" class="form-control" value="{{ $part->adresse }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        Postal Code :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="code_postal" type="text" class="form-control" value="{{ $part->code_postal }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        City :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="ville" type="text" class="form-control" value="{{ $part->ville }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        schedule :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="horaire" type="number" class="form-control" value="{{ $part->horaire }}">
                                </div>
                            </div>
                        </div>

                        <div class="row" id="registration">
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label for="">
                                        Registration Number :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="numero_pm" type="text" class="form-control" value="{{ $part->numero_pm }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        Email :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="email" type="text" class="form-control" value="{{ $part->email }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        Phone :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="number" type="text" class="form-control" value="{{ $part->phone }}">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        Password :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="password" id="password-field" type="password" class="form-control" value="{{ base64_decode($part->salt) }}">
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-4">
                                <div class="form-group">
                                    <button class="btn btn-danger btn-flat">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Partenariat</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>
                                    Resdence number
                                </th>
                                <th>
                                    Residence Name
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($partenariats as $partn)
                                <tr>
                                    <td>{{ $partn['residence']['numero'] }}</td>
                                    <td>{{ $partn['residence']['nom'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        </form>
    </div>
    @endforeach
    <script type="text/javascript">
        var type = '{{ $type }}';
        if (type == 'p'){
            $('#registration').hide();
        }

        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
@endsection