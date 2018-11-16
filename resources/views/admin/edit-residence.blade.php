@extends('layouts.layout')

@section('content')
    @foreach($residence as $r)
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">
                            Residence number  {{ $r->numero}}
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Name :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="nom" class="form-control" value="{{ $r->nom }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Referent name:
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="nom_ref" class="form-control" value="{{ $r->nom_ref }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Referent firstname:
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="prenom_ref" class="form-control" value="{{ $r->prenom_ref }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Email :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" value="{{ $r->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Address :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="adresse" class="form-control" value="{{ $r->adresse }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Postal Code :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="code_postal" class="form-control" value="{{ $r->code_postal }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        City :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="ville" class="form-control" value="{{ $r->ville }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Phone :
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="tel" class="form-control" value="{{ $r->tel }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Number of partners:
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="nb_partenaire" class="form-control" value="{{ $r->nb_partenaire }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Number of building (s):
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="nb_immeuble" class="form-control" value="{{ $r->nb_immeuble }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Number of Motorbikes:
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="nb_motorbike" class="form-control" value="{{ $r->nb_motorbike }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        Module:
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <input id="id_module" type="hidden" value="{{ $r->module['id_module'] }}">
                                    <div class="form-group">
                                        <select id="#select-module" name="module" class="form-control">
                                            <option>Select module number....</option>
                                            @foreach($module as $mod)
                                                <option value="{{ $mod->id_module }}"> {{ $mod->numero_module }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 col-md-offset-4">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-flat">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                            Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

            <div class="col-md-6">
                <div class="box box-info">
                <div class="box-header">
                    <h4>Buildings</h4>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Building name</th>
                            <th style="width: 35%">Number of apartments</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($immeubles as $immeuble)
                            <tr>
                                <td>{{ $immeuble->nom_immeuble }}</td>
                                <td>{{ $immeuble->nbr_appart }}</td>
                                <td>
                                    <a href="{{ route('admin.gestion-immeuble', ['id'=>$immeuble->id]) }}">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    &nbsp;-&nbsp;
                                    <form onsubmit="return confirm('Confirm delete ?')" class="form-inline" action="" method="post">
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

        <script>
            $(document).ready(function () {
                var id_module = $('#id_module').val();
                $('select option[value= '+id_module+']').attr("selected",true);
            })
        </script>
@endsection