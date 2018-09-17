@extends('layouts.layout-syndic')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Liste des résidences enregistrées :
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-bordered datatable">
                            <thead>
                            <tr>
                                <th>
                                    Numéro
                                </th>
                                <th>
                                    Nom
                                </th>
                                <th>
                                    Nom & Prénom référent
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Adresse
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($residences as $item)
                                <tr>
                                    <td>
                                        {{ $item->numero }}
                                    </td>
                                    <td>
                                        {{ $item->nom }}
                                    </td>
                                    <td>
                                        {{ $item->nom_ref }} {{ $item->prenom_ref }}
                                    </td>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        {{ $item->adresse }}
                                    </td>
                                    <td>
                                        <a href="{{ route('syndic.details-residence', array('id' => $item->id)) }}">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        &nbsp;-&nbsp;
                                        <form onsubmit="return confirm('Confirm delete ?')" class="form-inline" method="post">
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
@endsection