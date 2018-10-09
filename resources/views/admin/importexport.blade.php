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
                       <!-- ****************** -->
					   
					   <!--******************** -->
                    </div>
                </div>
            </div>
        </div>
		<!-- importation -->
		<div class="row">
            <div class="col-md-12">
                
					
					<!-- formulaire importation -->
					<div class="box col-xs-12">
    <div class="box-header">
        <h3 class="box-title ng-binding">importation Résidences</h3>
    </div>
    <div class="box-body table-responsive">
      <form class="form-horizontal ng-pristine ng-valid" ng-upload="saveImported(content)" method="post" action="/importexport/import/excel" name="importData" role="form" novalidate="" target="upload-iframe-4" enctype="multipart/form-data" encoding="multipart/form-data">
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Fichier à importer</label>
          <div class="col-sm-10">
            <input type="file" name="excelcsv">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden" name="_token" value="">
            <button type="submit" class="btn btn-default ng-binding" ng-disabled="importData.$invalid || $isUploading">importation</button>
          </div>
        </div>
      </form><iframe name="upload-iframe-4" border="0" width="0" height="0" style="width:0px;height:0px;border:none;display:none"></iframe>
    </div>
  </div>
					<!-- fin formulaire importation -->
					
					
            </div>
        </div>
		<!-- fin importation -->
    </div>

    
@endsection
