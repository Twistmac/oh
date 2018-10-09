@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Ajouter un compte résident :
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('admin.generer-resident') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">
                                    Résidence rattachée :
                                </label>
                                <select id="residence_id" name="residence_id" class="form-control">
                                    @foreach($residences as $item)
                                        <option value="{{ $item->id_residence }}|{{ $item->syndic_id }}">{{ $item->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">
                                    Immeuble rattaché :
                                </label>
                                <select id="immeuble_select" name="immeuble_id" class="form-control" required>

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
        $('#residence_id option[value="{{ session('residence_select') }}"] ').prop("selected",true);

        //value select immeuble ajax
        //select immeuble
        var residence_select =$('#residence_id').val().split('|');
        var residence_id = residence_select[0];
        $.ajax({
            type: "GET",
            url: "{{url('admin/get-immeuble-residence/')}}"+'/'+residence_id,
            success: function (data) {
                $('#immeuble_select').html(data);
                //initialisation immeuble selected
                $('#immeuble_select option[value="{{ session('select_immeuble')  }}"] ').prop("selected",true);


                var immeuble_id= $('#immeuble_select').val();
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
                    },
                });
            },
        });


        ///////////////---------DOCUMENT READY --------------///
        $(document).ready(function () {

            //
            // si tbody non null, desavtiver bouton generer

            if($('#tbody-appart').text()!=''){
                $('#generer').prop('disabled', true);
            }
            else{
                $('#generer').prop('disabled', false);
            }


            //on change select residence
            $("#residence_id").on('change',function () {
                var residence_select =$(this).val().split('|');
                var residence_id = residence_select[0];
                $.ajax({
                    type: "GET",
                    url: "{{url('admin/get-immeuble-residence/')}}"+'/'+residence_id,
                    success: function (data) {
                        $('#immeuble_select').html(data);
                        $('#tbody-appart').html('');
                    },
                });
            })

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
                    },
                });
            })





        })
    </script>
@endsection
