    @extends('layouts.layout')

@section('content')
    <div class="content">
        <!-- header avec les export/import -->
        <div ng-if="userRole == 'admin'" class="btn-group pull-right no-print">
            <button type="button" class="btn btn-success btn-flat">Exporter</button>
            <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="gestion-residences/export">Exporter excel</a></li>
                <li style="display:none;"><a href="gestion-residences/exportpdf" target="_BLANK">Exporter pdf</a></li>
                <li><a href="gestion-residences/exportcsv" target="_BLANK">Exporter csv</a></li>
            </ul>
        </div> 
        <div ng-if="userRole == 'admin'" class="btn-group pull-right no-print">
            <!--importer -->
    <!--  <button type="button" class="btn btn-success btn-flat">Importer</button>
      <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
          <span class="caret"></span>
          <span class="sr-only"></span>
      </button>
      <ul class="dropdown-menu" role="menu">
          <li><a ng-click="import('excel')">Importer Excel</a></li>
          <li><a ng-click="import('csv')">Importer csv</a></li>
      </ul>-->
  </div>
        <br/><br/>
        <!-- fin export/import -->
        <div class="row">
            
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">
                            Liste des résidences :
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                            <tr>
                                <th>Numéro</th>
                                <th>Nom</th>
                                <th>Nom référent</th>
                                <th>Email</th>
                                <th>Adresse</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($residences as $item)
                                <tr>
                                    <td>{{ $item->numero }}</td>
                                    <td>{{ $item->nom }}</td>
                                    <td>{{ $item->nom_ref.' '.$item->prenom_ref }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->adresse }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit-residence', ['id' => $item->id]) }}">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        &nbsp;-&nbsp;
                                        <form onsubmit="return confirm('Confirm delete ?')" class="form-inline" action="{{ route('admin.delete-residence', ['id' => $item->id]) }}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <!--<button type="submit" class="btn btn-danger btn-xs btn-flat">
                                                Supprimer
                                            </button>-->
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
<!-- modal -->

<!-- fin modal -->
    <script type="text/javascript">
        $('#syndic_id').change(function(){
            val = $(this).val();

            if(val != 'new')
            {
                $('#new_syndic').fadeOut().addClass('hidden');
                $('#syndic_email').val("");
                $('#syndic_password').val("");
            } else if(val == 'new') {
                $('#new_syndic').fadeIn();
                $('#new_syndic').removeClass('hidden');
            }
        });

        $('#generate').on('click', function () {
            var pass = Math.random().toString(36).substring(2, 10);

            $('#syndic_password').val(pass);
        });
    </script>

@endsection
