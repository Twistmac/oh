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
    <div class="content">
        <form action="" method="post">
            @csrf
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Détails résident "{{ $resident->username }}"
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
                                    <input name="username" type="text" class="form-control" value="{{ $resident->username }}">
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
                                    <input name="nom" type="text" class="form-control" value="{{ $resident->nom }}">
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
                                    <input name="prenom" type="text" class="form-control" value="{{ $resident->prenom }}">
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
                                    <input name="phone" type="text" class="form-control" value="{{ $resident->phone }}">
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
                                    <input name="email" type="text" class="form-control" value="{{ $resident->email }}">
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
                                    <input name="password" id="password-field" type="password" class="form-control" value="{{ base64_decode($resident->salt) }}">
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

    <script type="text/javascript">
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