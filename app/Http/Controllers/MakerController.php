<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Maker;
use App\Vehicle;

use App\Http\Requests\CreateMakerRequest;

class MakerController extends Controller {
	

	public function __construct()
	{
		$this->middleware('auth.basic.once', ['except' => ['index', 'show']]);
	}

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
	public function store(CreateMakerRequest $request)
	{
		$values = $request->only(['name', 'phone']);

		//return 'right';

		Maker::create($values);

		return response()->json(['message' =>  'Maker correctly added'], 200);

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
	public function update(CreateMakerRequest $request, $id)
	{
		$maker = Maker::find($id);

		if(!$maker)
		{
			return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
		}

		$name = $request->get('name'); 
		$phone = $request->get('phone'); 

		$maker->name = $name;
		$maker->phone = $phone;

		$maker->save();

		return response()->json(['message' => 'The maker has been updated'], 200);
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		$maker = Maker::find($id);

		if(!$maker)
		{
			return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
		}

		$vehicles = $maker->vehicles;

		if(sizeof($vehicles) > 0)
		{
			return response()->json(['message' => 'This maker have associeted vehicles. Delete his vehicles first.', 'code' => 404], 404);
		}

		$maker->delete();

		return response()->json(['message' => 'The maker has been deleted'], 200);


	}
}