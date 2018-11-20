@extends('layouts.layout-syndic')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            List of residents account:
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable" data-page-length='15'>
                            <thead>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Password
                                </th>
                                <th>
                                    Building
                                </th>
                                <th>
                                N° appartement
                                </th>
                                <th>
                                    state
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($residents as $res)
                                <tr>
                                    <td> </td>
                                    <td>{{ $res->username }}</td>
                                    <td>{{ $res->email }}</td>
                                    <td>
                                        <input id="password-field-{{ $res->id_appartement }}" type="password" class="form-control form-control-{{ $res->id_appartement }}" value="{{ base64_decode($res->salt) }}" style="width: 110px">
                                        <span style="margin-left: -25px;margin-top: -25px;position: relative;z-index: 2;" toggle="#password-field-{{ $res->id_appartement }}" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </td>
                                    <td> {{ $res->nom_immeuble }}  </td>
                                    <td>{{ $res->num_appartement }} </td>
                                    <td>
                                        <form data-id="{{ $res->id_resident }}" class="form-inline" method="get">
                                            @csrf
                                            <button type="submit" class="btn btn-flat btn-xs" data-toggle="tooltip" data-placement="top" title="">
                                                <span class="{{ $res->etat }}"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('div.alert').delay(5000).slideUp(300);
        $('#generate').on('click', function () {
            var pass = Math.random().toString(36).substring(2, 10);

            $('#password').val(pass);
        });


        $(document).ready(function () {
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
        })
    </script>


@endsection
