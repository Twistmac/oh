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
                                <select name="residence_id" class="form-control selectpicker">
                                    @foreach($residences as $item)
                                        <option value="{{ $item->id_residence }}">{{ $item->nom }}</option>
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
                                    Email:
                                </label>
                                <input type="email" name="email" class="form-control" value="" required>
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
                                <input type="hidden" name="password" id="password-field">
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
                                    Pseudo
                                </th>
                                <th>
                                    Email
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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($partenaires as $item)
                                <tr>
                                    <td>
                                        {{ $item->username ? $item->username : 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $item->email ? $item->email : 'N/A' }}
                                    </td>
									

                                    <td>
                                        {{ $item->residence->numero }}
                                    </td>
									<td>
                                        {{ $item->name ? $item->name : '' }}
                                    </td>
									<td>
                                        {{ ($item->type == 'p') ? 'partenaire' : 'motorbike' }}
                                    </td>
                                    <td>
                                        pass
                                    </td>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        <form onsubmit="return confirm('Confirm delete ?')" class="form-inline" action="{{ route('admin.delete-partenaire', $item->id_partenaire) }}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="no-button">
                                                <span class="glyphicon glyphicon-trash"></span>
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
        $('#add-partenaire-form').on('submit', function (e) {
            e.preventDefault();
            var pass = Math.random().toString(36).substring(2, 10);

            $('#password-field').val(pass);
            //alert( $('#password-field').val());

            $("#add-partenaire-form").submit();
        });

        $('#num-motorbike').css('display', 'none');

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
        })
    </script>
@endsection