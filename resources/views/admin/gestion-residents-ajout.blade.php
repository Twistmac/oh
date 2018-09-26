@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Ajouter un compte résident :
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('admin.add-resident') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">
                                    Résidence rattachée :
                                </label>
                                <select name="residence_id" class="form-control selectpicker">
                                    @foreach($residences as $item)
                                        <option value="{{ $item->id }}|{{ $item->syndic_id }} ">{{ $item->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    email :
                                </label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Password :
                                </label>
                                <!-- formulaire modifié ce 19/09/18 avec affichage ou non du mot de passe id=password-field ajoutée au input-->
                                <input type="password" name="password" class="form-control password-field" id="password-field">
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
                            <div class="form-group">
                                <span class="btn btn-danger btn-flat" id="generate">Générer mot de passe</span>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <button class="btn btn-primary btn-flat">
                                    Créer le compte
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- début d'affichage des listes de comptes résidents -->
            <!-- fin d'affichage compte résident -->
        </div>

    </div>

    <script>
        $('#generate').on('click', function () {
            var pass = Math.random().toString(36).substring(2, 10);

            $('#password-field').val(pass);//#password changé en password-field afin de faire fonctionner en affichage ou non du mot de passe
        });

        //document ready
        $(document).ready(function () {
            //initiliser tooltip
            $('[data-toggle="tooltip"]').tooltip();

            //gestion suspendre resident///
            //active
            var active = $('.0').addClass('glyphicon glyphicon-ok-sign').parent().addClass('btn-success');
            active.attr('data-original-title', 'actif');
            var form_suspendre = $('.0').parent().parent();
            form_suspendre.on('submit',function () {
                var id= $(this).data('id');
                $(this).attr('action',"<?php echo url('admin') ?>/susp-resident/"+id);
                return confirm('Voulez-vous suspendre ce compte resident' );
            });
            //supspendre
            var suspendue = $('.1').addClass('glyphicon glyphicon-remove-sign').parent().addClass('btn-danger');
            suspendue.attr('data-original-title', 'suspendu');
            var form_active = $('.1').parent().parent();
            form_active.on('submit',function () {
                var id= $(this).data('id');
                $(this).attr('action',"<?php echo url('admin') ?>/active-resident/"+id);
                return confirm('Voulez-vous activer ce compte resident');
            });
        })
    </script>
@endsection
