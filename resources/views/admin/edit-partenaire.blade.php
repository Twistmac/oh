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
            <div class="col-md-10 col-md-offset-1">
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
                                        Username :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="username" type="text" class="form-control" value="{{ $part->username }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        Name :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" value="{{ $part->nom }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        Firstname :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="firstname" type="text" class="form-control" value="{{ $part->prenom }}">
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
                                    <input name="phone" type="text" class="form-control" value="{{ $part->phone }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        Residence :
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <select name="residence_id" class="form-control selectpicker" id="residence_id">
                                        @foreach($residence as $res)
                                        <option value="{{ $res->syndic_id }}">{{ $res->numero }}</option>
                                        @endforeach
                                    </select>
                                    <script>
                                        $('#residence_id option[value="{{ $part->residence_id }}"] ').prop("selected",true);

                                    </script>
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