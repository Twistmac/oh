@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add a partner account-motorbikes</h3>
                    </div>
                    <div class="box-body">
                        <form id="add-partenaire-form" action="{{ route('admin.add-partenaire') }}" method="POST">
                            @csrf
                            <div class="form-group">
								<!-- liste select -->
                                <label for="">
                                    Attached residence:
                                </label>
                                <select name="residence_id" class="form-control selectpicker" data-live-search="true">
                                    @foreach($residences as $item)
                                        <option value="{{ $item->syndic_id }}">{{ $item->numero }}</option>
                                    @endforeach
                                </select>
								<!-- fin liste select -->
                            </div>
							<!-- Element de formulaire catégorie sous forme de liste -->
							
							<div class="form-group">
                                <!-- liste select -->
                                <label for="">
                                    Type:
                                </label>
                                <select id="type" name="type" class="form-control selectpicker" required>
                                    <option value="">Select type ...</option>
                                    <option value="p">Partner</option>
                                    <option value="m">Motorbike</option>

                                </select>
                                <!-- fin liste select -->
                            </div>

                            <div class="form-group">
                                <!-- liste select -->
                                <label for="">
                                    Category:
                                </label>
                                <select name="categorie" class="form-control selectpicker" required>
                                    <option value="">Select category ...</option>
                                    @foreach($categorie as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                </select>
                                <!-- fin liste select -->
                            </div>
							
							<!-- fin élément de formulaire catégorie sous forme de liste -->
							
							<!-- elements de formulaire numero -->
							<div class="form-group" id="num-motorbike">
                                <label for="">
                                    Number Motorbike:
                                </label>
                                <input type="text" name="numero_pm" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Partner number:
                                </label>
                                <input type="text" name="num_partenaire" class="form-control" value="" required>
                            </div>
							<!-- fin elements de formulaire numero facultatif -->
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
                                    Create account
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of partner-motorbike accounts</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                            <tr>
                                <th>
                                    Partner number
                                </th>
                                <th>
                                    Residence number
                                </th>
								<th>
                                   Category
                                </th>
								<th>
                                   type
                                </th>
                                <th>
                                    password
                                </th>
                                <th>
                                    Actions
                                </th>
                                <th>

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($partenaires as $item)
                                <tr>
                                    <td>
                                        {{ $item->num_partenaire ? $item->num_partenaire : 'N/A' }}
                                    </td>
									

                                    <td>
                                        {{ $item['residence']['numero'] }}
                                    </td>
									<td>
                                        {{ $item->name ? $item->name : '' }}
                                    </td>
									<td>
                                        {{ ($item->type == 'p') ? 'partenaire' : 'motorbike' }}
                                    </td>
                                    <td>
                                        <input id="password-field-{{ $item->id_partenaire }}" type="password" class="form-control" value="{{ base64_decode($item->salt) }}" style="width: 110px;float:left">
                                        <span style="float: left;margin-left: -25px;margin-top: 10px;display: block;z-index: 2;" toggle="#password-field-{{ $item->id_partenaire }}" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.edit-partenaire', array( 'id'=>$item->id_partenaire, 'type'=>$item->type) )}}">
                                            <span style="color: #0b97c4" class="glyphicon glyphicon-pencil"> </span>
                                        </a>
                                        <form onsubmit="return confirm('Confirm delete ?')" class="form-inline" action="{{ route('admin.delete-partenaire', $item->id_partenaire) }}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">&nbsp;
                                            <button type="submit" class="no-button btn-danger">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        <form data-id="{{ $item->id_partenaire }}" class="form-inline" method="get">
                                            @csrf
                                            <button type="submit" class="btn btn-flat btn-xs" data-toggle="tooltip" data-placement="top" title="">
                                                <span class="{{ $item->etat }}"></span>
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


        $('#num-motorbike').css('display', 'none');

        var active = $('.0').addClass('glyphicon glyphicon-ok-sign').parent().addClass('btn-success');
        active.attr('data-original-title', 'active');
        var form_suspendre = $('.0').parent().parent();
        form_suspendre.on('submit',function () {
            var id= $(this).data('id');
            $(this).attr('action',"<?php echo url('admin') ?>/susp-partenaire/"+id);
            return confirm('Do you want to suspend this partner account ?' );
        });
        //supspendre
        var suspendue = $('.1').addClass('glyphicon glyphicon-remove-sign').parent().addClass('btn-danger');
        suspendue.attr('data-original-title', 'suspend');
        var form_active = $('.1').parent().parent();
        form_active.on('submit',function () {
            var id= $(this).data('id');
            $(this).attr('action',"<?php echo url('admin') ?>/active-partenaire/"+id);
            return confirm('Do you want to active this partner account ?');
        });



        $(document).ready(function () {
            $('#type').on('change',function () {
                var id_categorie = $(this).val();
                if(id_categorie == 'm'){
                    $('#num-motorbike').css('display', 'block');
                }
                if(id_categorie == 'p'){
                    $('#num-motorbike').css('display', 'none');
                }
            })

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