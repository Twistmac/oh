@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">
                            Ajouter un syndic :
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('admin.add-syndic') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">
                                    Email :
                                </label>
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Password :
                                </label>
                                <input type="text" name="password" class="form-control" id="password">
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
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Liste des syndics :
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered datatable">
                            <thead>
                            <tr>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Date de création
                                </th>
                                <th>
                                    Password
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($syndics as $item)
                                <tr>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        {{ date('d-m-Y', strtotime($item->created_at)) }}
                                    </td>
                                    <td>
                                        {{ base64_decode($item->salt) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.details-syndic', ['id' => $item->id]) }}">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        &nbsp;-&nbsp;
                                        <form onsubmit="return confirm('Confirm delete ?')" class="form-inline" action="{{ route('admin.delete-syndic', ['id' => $item->id]) }}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-flat btn-xs">
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

