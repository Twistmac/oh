@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Détails :
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('admin.details-syndic', ['id' => $syndic->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">
                                            Pseudo :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" value="{{ $syndic->username }}">
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
                                        <input type="text" name="email" class="form-control" value="{{ $syndic->email }}">
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
                                        <!-- formulaire modifié ce 19/09/18 avec affichage ou non du mot de passe id=password-field ajoutée au input-->
                                        <input id="password-field" type="text" name="password" class="form-control" value="{{ base64_decode($syndic->salt) }}">
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        <!-- style des yeux (affichage ou non du password)-->
                                        <style>
                                        .field-icon {
                                              float: right;
                                              margin-left: -25px;
                                              margin-top: -25px;
                                              position: relative;
                                              z-index: 2;
                                            }
                                        </style>
                                        <!-- fin du style -->
                                        <!-- script pour les yeux (affichage ou non du password)-->
                                        <script>
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
                                        <!-- fin du javascript -->
                                        <!-- fin du formulaire modifié -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-4">
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
        </div>
    </div>
@endsection