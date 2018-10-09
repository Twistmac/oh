@extends('layouts.layout-syndic')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Liste des comptes résidents :
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable" data-page-length='15'>
                            <thead>
                            <tr>
                                <th>
                                    Nom
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Immeuble
                                </th>
                                <th>
                                    N° appartement
                                </th>
                                <th>
                                    Etat
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($residents as $res)
                                <tr>
                                    <td> </td>
                                    <td>{{ $res->username }}</td>
                                    <td>{{ $res->email }}</td>
                                    <td> {{ $res->nom_immeuble }}  </td>
                                    <td>{{ $res->id_appartement }} </td>
                                    <td> </td>
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
        $('div.alert').delay(5000).slideUp(300);
        $('#generate').on('click', function () {
            var pass = Math.random().toString(36).substring(2, 10);

            $('#password').val(pass);
        });
    </script>
@endsection
