<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller {
	public function index() {
		$content = Content::take( 1 )->get();
		$services = Service::take( 6 )->get();;
		$packages = Package::take( 3 )->get();

		return view(
			'home',
			[
				'contents' => $content,
				'packages' => $packages,
				'services' => $services
			]
		);
	}
}
