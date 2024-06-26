<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
	public function index() {
		$package = Package::take(3)->get();
		return view('admin.pricing.packages',[ 'packages' => $package ]);
	}
	/**
	 * Show the form for creating a new package.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('packages.create');
	}

	/**
	 * Store a newly created package in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required|string',
			'description' => 'nullable|string',
			'price' => 'required|numeric',
		]);

		Package::create($request->all());

		return redirect()->route('packages.index')
			->with('success', 'Package created successfully.');
	}

	/**
	 * Show the form for editing the specified package.
	 *
	 * @param  \App\Models\Package  $package
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Package $package)
	{
		return view('packages.edit', compact('package'));
	}

	/**
	 * Update the specified package in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Package  $package
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Package $package)
	{
		$request->validate([
			'name' => 'required|string',
			'description' => 'nullable|string',
			'price' => 'required|numeric',
		]);

		$package->update($request->all());

		return redirect()->route('packages.index')
			->with('success', 'Package updated successfully.');
	}

	/**
	 * Remove the specified package from storage.
	 *
	 * @param  \App\Models\Package  $package
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Package $package)
	{
		$package->delete();

		return redirect()->route('packages.index')
			->with('success', 'Package deleted successfully.');
	}
}
