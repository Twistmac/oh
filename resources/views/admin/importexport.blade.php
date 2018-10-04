    @extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header">

                        <div class="col2-right-layout">EXPORT
                            <!-- export résidences -->
							<div ng-if="userRole == 'admin'" class="btn-group pull-right no-print">
								<button type="button" class="btn btn-success btn-flat">Exporter les Résidences</button>
								<button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
									<span class="sr-only">toggledropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="importexport/exportresidenceexcel">Export Excel</a></li>
								<li><a href="importexport/exportresidencecsv" target="_BLANK">Export CSV</a></li>
							</ul>
  </div>
  <!-- export résident -->
  <div ng-if="userRole == 'admin'" class="btn-group pull-right no-print">
								<button type="button" class="btn btn-success btn-flat">Exporter les Résidents</button>
								<button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
									<span class="sr-only">toggledropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="importexport/exportresidentsexcel">Export Excel</a></li>
								<li><a href="importexport/exportresidentscsv" target="">Export CSV</a></li>
							</ul>
  </div>
                        </div>

                    </div>
                    <div class="box-body">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection
