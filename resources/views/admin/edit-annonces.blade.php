@extends('layouts.layout')

<style type="text/css">
    .field-icon {
        float: right;
        margin-right: 7px!important;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }
</style>
@section('content')
    @foreach($annonce as $ads)
        <div class="content">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">

                                </h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">
                                                titre :
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input name="titre" type="text" class="form-control" value="{{ $ads->titre }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">
                                                Description :
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <textarea name="description" class="form-control">
                                                {{ $ads->description }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">
                                                price :
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input name="prix" type="text" class="form-control" value="{{ $ads->prix }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">
                                                age :
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input name="age" type="text" class="form-control" value="{{ $ads->age }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">
                                                Category :
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select name="categorie_id" id="category" class="form-control selectpicker" >
                                                @foreach($categorie as $item)
                                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                @endforeach
                                            </select>
                                            <script>
                                                $('#category option[value="{{ $ads->categorie_id }}"] ').prop("selected",true);
                                            </script>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="registration">
                                    <div class="col-md-2" >
                                        <div class="form-group">
                                            <label for="">
                                                Image :
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="image" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">

                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <img src="{{ asset('img/annonces/'.$ads->image) }}" class="form-control" style="height: 300px">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-8 col-md-offset-4">
                                        <div class="form-group">
                                            <button class="btn btn-danger btn-flat">
                                                Edit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

@endforeach
@endsection