<?php
namespace App\Services\ExportExcel;

use Illuminate\Support\Serviceprovider;

class ExportExcelServiceProvider extends Serviceprovider
{
	public function register()
	{
		$this->app->singleton('ExportExcel', function($app){
			return new ExportExcel();
		});
	}
}