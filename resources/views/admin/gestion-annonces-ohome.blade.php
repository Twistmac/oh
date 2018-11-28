@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">
                            List of ads
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-hover datatable">
                            <thead>
                            <tr>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Residence
                                </th>
                                <th>
                                    Created at
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($annonces as $item)
                                <tr>
                                    <td>
                                        {{ $item->categorie->name }}
                                    </td>
                                    <td>
                                        {{ $item->titre }}
                                    </td>
                                    <td>
                                        {{ $item->prix }}
                                    </td>
                                    <td>
                                        {{ $item->nom }}
                                    </td>
                                    <td>
                                        {{ $item->created_at }}
                                    </td>
                                    <td>
                                        <form onsubmit="return  confirm('Confirm delete ?')" class="form-inline" action="{{ route('admin.delete-annonce', ['id' => $item->id]) }}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-flat btn-danger btn-xs">
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
@endsection
