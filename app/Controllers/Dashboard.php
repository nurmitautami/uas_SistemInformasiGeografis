<?php

namespace App\Controllers;

use App\Models\PotensialModel;
use App\Models\SumberDayaModel;


class Dashboard extends BaseController
{
	public function index()
	{
		$Query = new PotensialModel();

		$data = [
			'title' => "Aplikasi Web Gis Codeigniter 4",
			'appname' => "WEBGIS - CI",
			'heading' => "Dashboard",
			'data' => $Query->getPotensial(),
		];

		return view('v_dashboard', $data);
	}

	public function map()
	{
		$Query = new SumberDayaModel();
		$data = [
			'title' => "Aplikasi Web Gis Codeigniter 4",
			'appname' => "WEBGIS - CI",
			'heading' => "Dashboard",
			'data' => $Query->getSumberDaya(),
		];
		return view('v_dashboard2', $data);
	}


	//--------------------------------------------------------------------

}
