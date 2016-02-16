<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Maker;
class MakerController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Toutes les données de la BDD sont insérées dans la variable $makers
		$makers = Maker::all();

		//Elles sont ensuite encodées en JSON, et la requête doit renvoyer 200
		//Elles sont encapsulées dans "data"
		return response()->json(['data' => $makers], 200);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$maker = Maker::find($id);
		if(!$maker)
		{
			return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
		}
		return response()->json(['data' => $maker], 200);
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}