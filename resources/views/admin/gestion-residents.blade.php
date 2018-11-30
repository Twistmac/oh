@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row"><!-- début colonne ajout compte résident -->
            <!-- fin column ajout résident -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            List of resident accounts:
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                            <tr>
                                <th>
                                    Residence number
                                </th>
                                <th>
                                    Building
                                </th>
                                <th>
                                    Apartement number
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>
                                    type
                                </th>
                                <th>
                                    Creation date
                                </th>
                                <th>
                                    State
                                </th>
                                <th>

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($residents as $item)
                                <tr>
                                    <td>{{ $item['residence']['numero'] }}</td>
                                    <td>{{ $item['appartement']['nom_immeuble'] }}</td>
                                    <td>{{ $item['appartement']['num_appartement'] }}</td>
                                    <td>
                                        {{ $item->username ? $item->username : 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $item->type ? $item->type : 'N/A' }}
                                    </td>
                                    <td>
                                        {{ date('d-m-Y', strtotime($item->created_at)) }}
                                    </td>
                                    <td>
                                        <form data-id="{{ $item->id }}" class="form-inline" method="get">
                                            @csrf
                                            <button type="submit" class="btn btn-flat btn-xs" data-toggle="tooltip" data-placement="top" title="">
                                                <span class="{{ $item->etat }}"></span>
                                            </button>
                                        </form>

                                    </td>

                                    <td>
                                        <a href="{{ route('admin.details-resident', ['id' => $item->id]) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
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
            active.attr('data-original-title', 'active');
            var form_suspendre = $('.0').parent().parent();
            form_suspendre.on('submit',function () {
                var id= $(this).data('id');
                $(this).attr('action',"<?php echo url('admin') ?>/susp-resident/"+id);
                return confirm('Do you want to suspend this resident account ?' );
            });
            //supspendre
            var suspendue = $('.1').addClass('glyphicon glyphicon-remove-sign').parent().addClass('btn-danger');
            suspendue.attr('data-original-title', 'suspend');
            var form_active = $('.1').parent().parent();
            form_active.on('submit',function () {
                var id= $(this).data('id');
                $(this).attr('action',"<?php echo url('admin') ?>/active-resident/"+id);
                return confirm('Do you want to actived this resident account ?');
            });
        })
    </script>
@endsection
