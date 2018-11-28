@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Add a new category:
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('admin.add-categorie') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">
                                    Category name (English):
                                </label>
                                <input type="text" name="name" class="form-control" value="{{ old('categorie') }}">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Category name (
                                    Indonesia):
                                </label>
                                <input type="text" name="name_indonnesie" class="form-control" value="{{ old('categorie') }}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger">
                                   Add Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">
                            List:
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover table-bordered datatable">
                            <thead>
                            <tr>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Indonesia
                                </th>
                                <th>

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $item)
                                <tr>
                                    <td>
                                        {{ $item['name'] }}
                                    </td>
                                    <td>
                                        {{ $item['name_indonnesie'] }}
                                    </td>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        &nbsp;-&nbsp;
                                        <form onsubmit="return confirm('Confirm delete ?')" class="form-inline" action="{{ route('admin.delete-categorie', ['id' => $item->id]) }}" method="post">
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
@endsection
