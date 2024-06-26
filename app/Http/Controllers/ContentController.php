<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller {

	public function index() {
		$content = Content::take( 1 )->get();

		return view(
			'.admin.content.content',
			[ 'contents' => $content ]
		);
	}

	/**
	 * Show the form for creating a new content.
	 *
	 * @return Response
	 */
	public function create() {
		return view( 'contents.create' );
	}

	/**
	 * Store a newly created content in storage.
	 *
	 * @param Request $request
	 *
	 * @return RedirectResponse
	 */
	public function store( Request $request ) {
		$request->validate( [
			'header' => 'required|string',
			'description' => 'required|string',
			'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
			// Adjust image validation as needed
			'image2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
			// Adjust image validation as needed
			'who_we_are' => 'required|string',
			'our_vision' => 'required|string',
			'our_history' => 'required|string',
		] );

		$data = $request->only(
			[
				'header',
				'description',
				'who_we_are',
				'our_vision',
				'our_history'
			]
		);

		if ( $request->hasFile( 'image1' ) ) {
			$image1 = $request->file( 'image1' )->store(
				'uploads',
				'public'
			);
			$data['image1'] = $image1;
		}

		if ( $request->hasFile( 'image2' ) ) {
			$image2 = $request->file( 'image2' )->store(
				'uploads',
				'public'
			);
			$data['image2'] = $image2;
		}

		Content::create( $data );

		return redirect()->route( 'contents.index' )->with(
				'success',
				'Content created successfully.'
			);
	}

	/**
	 * Show the form for editing the specified content.
	 *
	 * @param Content $content
	 *
	 * @return Response
	 */
	public function edit( Content $content ) {
		return view(
			'admin.content.editContent',
			[ 'content' => $content ]
		);
	}

	/**
	 * Update the specified content in storage.
	 *
	 * @param Request $request
	 * @param Content $content
	 *
	 * @return Response
	 */
	public function update( Request $request, Content $content ) {
		$request->validate( [
			'header' => 'required|string',
			'description' => 'required|string',
			'image1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
			// Adjust image validation as needed
			'image2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
			// Adjust image validation as needed
			'who_we_are' => 'required|string',
			'our_vision' => 'required|string',
			'our_history' => 'required|string',
		] );

		$data = $request->only(
			[
				'header',
				'description',
				'who_we_are',
				'our_vision',
				'our_history'
			]
		);

		// Handle image1 update
		if ( $request->hasFile( 'image1' ) ) {
			if ( $content->image1 ) {
				Storage::disk( 'public' )->delete( $content->image1 );
			}
			$image1 = $request->file( 'image1' )->store(
				'uploads',
				'public'
			);
			$data['image1'] = $image1;
		}

		if ( $request->hasFile( 'image2' ) ) {
			if ( $content->image2 ) {
				Storage::disk( 'public' )->delete( $content->image2 );
			}
			$image2 = $request->file( 'image2' )->store(
				'uploads',
				'public'
			);
			$data['image2'] = $image2;
		}

		$content->update( $data );

		return redirect()->route( 'contents.index' )->with(
				'success',
				'Content updated successfully.'
			);
	}

	/**
	 * Remove the specified content from storage.
	 *
	 * @param Content $content
	 *
	 * @return Response
	 */
	public function destroy( Content $content ) {
		if ( $content->image1 ) {
			Storage::disk( 'public/img' )->delete( $content->image1 );
		}
		if ( $content->image2 ) {
			Storage::disk( 'public/img' )->delete( $content->image2 );
		}

		$content->delete();

		return redirect()->route( 'contents.index' )->with(
				'success',
				'Content deleted successfully.'
			);
	}
}
