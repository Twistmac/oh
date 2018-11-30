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
                                    Category name ( Thailand):
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
                                    Thailand
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
                                        <a href="" data-toggle="modal" data-target="#modal-edition{{ $item->id }}">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <div class="modal modal-info fade" id="modal-edition{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title"> </h4>
                                                    </div>
                                                    <form class="form-horizontal" id="form-edit-immeuble" method="post" action="{{ route('admin.edit-categorie', ['id'=> $item->id]) }}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <p>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-6" for="email">Category name (English):</label>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" value="{{ $item->name }}" name="name" required>
                                                                </div>
                                                            </div>
                                                            </p>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-6" for="pwd">Category name (Thailand):</label>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" value="{{ $item->name_indonnesie }}" name="thailand" required>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-outline">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                        &nbsp;-&nbsp;
                                        <form onsubmit="return confirm('Confirm delete ?')" class="form-inline" action="{{ route('admin.delete-categorie', ['id' => $item->id]) }}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="no-button btn-danger">
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
