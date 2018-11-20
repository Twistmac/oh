@extends('layouts.layout-syndic')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Add new Ad
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('syndic.add-annonce-syndic') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">
                                            Category :
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">
                                            Title :
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="titre" value="{{ old('titre') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">
                                            Description :
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                <textarea rows="5" name="description" class="form-control" style="width: 100%; max-width: 100%; margin-bottom: 15px;">
                                    {{ old('description') }}
                                </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">
                                            Image :
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">
                                            Price :
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" name="prix" value="{{ old('prix') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 col-md-offset-4">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-4">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-flat">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">
                            List
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-hover datatable">
                            <thead>
                            <tr>

                                <th>
                                    Title
                                </th>
                                <th>
                                    Price
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
                                        {{ $item->titre }}
                                    </td>
                                    <td>
                                        {{ $item->prix }}
                                    </td>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        &nbsp;-&nbsp;
                                        <form onsubmit="return confirm('Confirm delete ?')" class="form-inline" action= "{{route('syndic.delete-annonce-syndic', ['id' => $item->id])}} " method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-flat btn-danger btn-xs">
                                                delete
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
