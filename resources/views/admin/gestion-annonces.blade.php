@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Add new ohome ad
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('admin.add-annonce') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">
                                            Category :
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select name="categorie_id" class="form-control selectpicker">
                                            @foreach($categories as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
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
                                <textarea rows="5" name="description" class="form-control">
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
                                        <input type="file" class="form-control" name="image" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">
                                            Residence :
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <select name="residence" class="form-control selectpicker">
                                            <option value="all">All</option>
                                            @foreach($residence as $res)
                                                <option value="{{ $res->id_residence }}">{{ $res->numero }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">
                                            sexe :
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <select name="sexe" class="form-control">
                                            <option value="male">male</option>
                                            <option value="female">female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">
                                            age :
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <select name="age" class="form-control">
                                            <option value="0-17"> 0-17</option>
                                            <option value="18-24"> 18-24</option>
                                            <option value="25-40"> 25-40</option>
                                            <option value="41-54"> 41-54</option>
                                            <option value="55-80"> 55-80</option>
                                            <option value="All"> All</option>
                                        </select>
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
                                        <input type="number" class="form-control" name="prix" value="">
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
                            List of ohome ads
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
                                        <a href="{{ route('admin.editAnnonce', array('id'=>$item->id)) }}">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        &nbsp;-&nbsp;
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
