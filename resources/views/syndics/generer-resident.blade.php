@extends('layouts.layout-syndic')

@section('content')
    <div class="content">
        <div class="row">

            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Generer des comptes resident :
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">
                                    Immeuble rattaché :
                                </label>
                                <select id="immeuble_select" name="immeuble_id" class="form-control" required>
                                    <option value="">Choisissez l'immeuble</option>
                                    @foreach($immeuble as $imm)
                                        <option value="{{ $imm->id }}">N° {{ $imm->id }} {{ $imm->nom_immeuble }}</option>
                                    @endforeach
                                </select>
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
                                <button id="generer" class="btn btn-primary btn-flat">
                                    Générer des residents
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="box box-info">
                    <div class="box-header">
                        <h4>Appartements</h4>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Nom du resident</th>
                                <th>Pseudo</th>
                                <th>Mot de passe</th>
                                <th>Module</th>
                                <th>etat</th>
                            </tr>
                            </thead>
                            <tbody id="tbody-appart">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <script>
        //$('#immeuble_select option[value="{{ session('select_immeuble')  }}"] ').prop("selected",true);




        //************** DOCUMENT READY *******/////////
        $(document).ready(function () {
            if($('#tbody-appart').text()!=''){
                $('#generer').prop('disabled', true);
            }
            else{
                $('#generer').prop('disabled', false);
            }

            //on change table select residence
            $("#immeuble_select").on('change',function () {
                var immeuble_id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{url('admin/get-appart-immeuble/')}}"+'/'+immeuble_id,
                    success: function (data) {
                        $('#tbody-appart').html(data);
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
                        suspendue.attr('data-original-title', 'desactivé');
                        var form_active = $('.1').parent().parent();
                        form_active.on('submit',function () {
                            var id= $(this).data('id');
                            $(this).attr('action',"<?php echo url('admin') ?>/active-resident/"+id);
                            return confirm('Voulez-vous activer ce compte resident');
                        });
                        // si data non null, desavtiver bouton generer
                        if($('#tbody-appart').text()!=''){
                            $('#generer').prop('disabled', true);
                        }
                        else{
                            $('#generer').prop('disabled', false);
                        }

                        //toogle password
                        $(".toggle-password").click(function() {

                            $(this).toggleClass("fa-eye fa-eye-slash");
                            var input = $($(this).attr("toggle"));

                            if (input.attr("type") == "password") {
                                input.attr("type", "text");
                            } else {
                                input.attr("type", "password");
                            }
                        });
                    },
                });
            });


        })




    </script>

@endsection
