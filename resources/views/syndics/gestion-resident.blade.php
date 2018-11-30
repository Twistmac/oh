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
                        <table id="table-resident" class="table table-bordered table-hover datatable" data-page-length='15'>
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
                                    <input type="hidden" class="id_resident" value="{{ $res->id }}">
                                    <td>{{ $res->nom }} {{ $res->prenom }}</td>
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

    <div class="modal modal-info fade" id="modal-detail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">detail</h4>
                </div>
                <form class="form-horizontal" id="form-edit-immeuble" >
                    @csrf
                    <div class="modal-body">


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('div.alert').delay(5000).slideUp(300);
        $('#generate').on('click', function () {
            var pass = Math.random().toString(36).substring(2, 10);

            $('#password').val(pass);
        });

        //change color background table if hover
        $("#table-resident tr").not(':first').hover(
            function () {
                $(this).css("background","#B8B8B8");
                $(this).css( 'cursor', 'pointer' );
            },
            function () {
                $(this).css("background","");
            }
        );


        $(document).ready(function () {
            var active = $('.0').addClass('glyphicon glyphicon-ok-sign').parent().addClass('btn-success');
            active.attr('data-original-title', 'active');
            var form_suspendre = $('.0').parent().parent();
            form_suspendre.on('submit',function () {
                var id= $(this).data('id');
                $(this).attr('action',"<?php echo url('admin') ?>/susp-resident/"+id);
                return confirm('Do you want to suspend this resident account' );
            });
            //supspendre
            var suspendue = $('.1').addClass('glyphicon glyphicon-remove-sign').parent().addClass('btn-danger');
            suspendue.attr('data-original-title', 'suspend');
            var form_active = $('.1').parent().parent();
            form_active.on('submit',function () {
                var id= $(this).data('id');
                $(this).attr('action',"<?php echo url('admin') ?>/active-resident/"+id);
                return confirm('Do you want to activate this resident account ??');
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

            //clcik table/
            $('#table-resident tbody tr').on('click',function () {
                $('#modal-detail').modal('show');
                var id = $(this).find('.id_resident').val();
                //alert(id);
                $.ajax({
                    url: "{{url('syndic/ajax-detail-resident')}}/"+id,
                    method: "GET",
                    success:function (data) {
                        $('.modal-body').html(data);
                    },
                })
            })
        })
    </script>


@endsection
