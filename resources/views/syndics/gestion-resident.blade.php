@extends('layouts.layout-syndic')

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
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">
                                    Résidence rattachée :
                                </label>
                                <select name="residence" class="form-control selectpicker">
                                    @foreach($residence as $residences)
                                        <option value="{{$residences->id}}">{{ $residences->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">
                                    Email :
                                </label>
                                <input type="text" name="email" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Password :
                                </label>
                                <input type="text" name="password" class="form-control" id="password">
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
                                <span class="btn btn-danger btn-flat" id="generate">Générer mot de passe</span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-flat">
                                    Créer le compte
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Liste des comptes résidents :
                        </h3>
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
                                    Date de création
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($residents as $res)
                                <tr>
                                    <td>{{ $res->username }}</td>
                                    <td>{{ $res->email }}</td>
                                    <td>{{ $res->created_at }}</td>
                                    <td>
                                        <a href="#">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        &nbsp;-&nbsp;
                                        <form onsubmit="return confirm('Confirm delete ?')" class="form-inline" action="{{ route('syndic.delete-resident', $res->id) }}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-flat btn-danger btn-xs">
                                                Supprimer
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

            $('#password').val(pass);
        });
    </script>
@endsection
