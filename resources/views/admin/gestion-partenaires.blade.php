@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add a partner account-motorbikes</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('admin.add-partenaire') }}" method="POST">
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
                                    Category:
                                </label>
                                <select name="categorie" class="form-control selectpicker">
                                
                                        <option value="partenaire">Partner</option>
										<option value="motorbike">Motorbike</option>
                                    
                                </select>
								<!-- fin liste select -->
                            </div>
							
							<!-- fin élément de formulaire catégorie sous forme de liste -->
							
							<!-- elements de formulaire numero -->
							<div class="form-group">
                                <label for="">
                                    Number:
                                </label>
                                <input type="text" name="numero_pm" class="form-control" value="">
                            </div>
							<!-- fin elements de formulaire numero facultatif -->
                            
							<div class="form-group">
                                <label for="">
                                    Login :
                                </label>
                                <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Password :
                                </label>
                                <input type="password" name="password" class="form-control" id="password-field">
                                <!-- formulaire modifié ce 19/09/18 avec affichage ou non du mot de passe id=password-field ajoutée au input-->
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
                                <span class="btn btn-danger btn-flat" id="generate">Generate password</span>
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
                                    Create account
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
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
                                    Attached Residence
                                </th>
								<th>
                                   Category
                                </th>
								<th>
                                   Number
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
                                        {{ $item->residence_id ? $item->residence_id : '' }}
                                    </td>
									<td>
                                        {{ $item->categorie ? $item->categorie : '' }}
                                    </td>
									<td>
                                        {{ $item->numero_pm ? $item->numero_pm : '' }}
                                    </td>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        <form onsubmit="return confirm('Confirm delete ?')" class="form-inline" action="{{ route('admin.delete-partenaire', $item->id) }}" method="post">
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
        $('#generate').on('click', function () {
            var pass = Math.random().toString(36).substring(2, 10);

            $('#password-field').val(pass);
        });
    </script>
@endsection