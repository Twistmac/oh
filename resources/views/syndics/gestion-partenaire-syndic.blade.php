@extends('layouts.layout-syndic')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">
                            List of partner
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-hover datatable">
                            <thead>
                            <tr>
                                <th>
                                    Partner number
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    phone
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Address
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($partenaire as $part)
                                <tr>
                                    <td>{{ $part->num_partenaire }}</td>
                                    <td>{{ $part->nom }} {{ $part->prenom }}</td>
                                    <td>{{ $part->phone }}</td>
                                    <td>{{ $part->name }}</td>
                                    <td>{{ $part->adresse }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">
                            List of Motorbike
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-hover datatable">
                            <thead>
                            <tr>
                                <th>
                                    Partner number
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    phone
                                </th>
                                <th>
                                    Registration Number
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($motorbike as $moto)
                            <tr>
                                <td>{{ $moto->num_partenaire }}</td>
                                <td> {{$moto->nom}} {{$moto->prenom}}</td>
                                <td>{{$moto->phone}}</td>
                                <td>{{$moto->numero_pm}}</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
