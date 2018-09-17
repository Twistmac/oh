@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">
                            Modification de la page "Termes et conditions"
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('admin.edit-termes', ['id' => $page->id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $page->id }}">
                            <div class="form-group">
                                <label for="">
                                    Titre de la page
                                </label>
                                <input type="text" class="form-control" name="titre" value="{{ $page->titre }}">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Contenu de la page
                                </label>
                                <textarea name="content" class="textarea">
                            {{ $page->content }}
                        </textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-flat btn-danger">
                                    Modifier
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection