<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Http\Response;

class ServiceController extends Controller {

	public function index() {
		$services = Service::take( 6 )->get();

		return view(
			'.admin.services.services',
			[ 'services' => $services ]
		);
	}

	/**
	 * Show the form for creating a new service.
	 *
	 * @return Application|Factory|View
	 */
	public function create() {
		return view( 'services.create' );
	}

	/**
	 * Store a newly created service in storage.
	 *
	 * @param Request $request
	 *
	 * @return RedirectResponse
	 */
	public function store( Request $request ) {
		$request->validate( [
			'header' => 'required|string',
			'description' => 'nullable|string',
		] );

		Service::create( $request->all() );

		return redirect()->route( 'services.index' )->with(
			'success',
			'Service created successfully.'
		);
	}

	/**
	 * Show the form for editing the specified service.
	 *
	 * @param Service $service
	 *
	 * @return Response
	 */
	public function edit( Service $service ) {
		return view(
			'admin.services.editService',
			[ 'service' => $service ]
		);
	}

	/**
	 * Update the specified service in storage.
	 *
	 * @param Request $request
	 * @param Service $service
	 *
	 * @return Response
	 */
	public function update( Request $request, Service $service ) {
		$request->validate( [
			'header' => 'required|string',
			'description' => 'required|string',
		] );

		$service->update( $request->all() );

		return redirect()->route( 'services.index' )->with(
			'success',
			'Service updated successfully.'
		);
	}

	/**
	 * Remove the specified service from storage.
	 *
	 * @param Service $service
	 *
	 * @return RedirectResponse
	 */
	public function destroy( Service $service ) {
		$service->delete();

		return redirect()->route( 'services.index' )->with(
			'success',
			'Service deleted successfully.'
		);
	}
}
