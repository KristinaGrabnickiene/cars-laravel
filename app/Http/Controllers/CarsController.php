<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Http\Request;
use App\Car;
Use App\Owner;
use Session;
use Validator;
use Auth;


class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( request()->has("brand")){
          //  $cars = Car::paginate(10);
          $cars = Car::where("brand", request("brand"))->paginate(10)->appends("brand", request("brand"));
        } else if ( request()->has("sort")){
            $cars = Car::orderBy("brand", request("sort"))->paginate(10)->appends("sort", request("sort"));
        
        } else{
            $cars = Car::paginate(10);
        }
         $owners = Owner::all();   
        return view("cars.index", [
        "cars"=>$cars,
        "owners"=> $owners
        ] );

    }
    /**
     * Show the form for creating a new resource.
     * if( request()->has("brand")){
     *   $cars = Car::were("brand", request ("brand"))->paginate(7)->appends('brand', request('brand'));
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
    		'required' => 'Laukelis :attribute turi buti užpildytas'
            ];
        Validator::make($request->all(), [
            'brand' => 'required',
            'model' => 'required',
            'reg_number' => 'required',
            'jpg' => 'required',
    ], $messages)->validate();

            $cars = new Car;
            $cars->brand = $request ->brand;
            $cars->model = $request ->model;
            $cars->reg_number = $request ->reg_number;
            $request ->file("jpg")->store('public');
            $cars->jpg = $request ->file("jpg")->hashName();

            $cars->save();

            Session::flash( 'status', 'Sukurtas naujas automobilio įrašas' );
            return redirect()->route("cars.index");
        }

        public function save(){
        //
        $cars = Car::all();
        
       return view ("cars.create", [ "cars"=> $cars ]);
        
            }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $cars = Car::find($id);
        $allOwners = Owner::where("cars_id", $id)->get();

        return view('cars.show', [
            "carsItem" => $cars,
            "owners" => $allOwners,
           
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cars = Car::find($id);     
        return view('cars.edit',[
            "cars" => $cars,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
    		'required' => 'Laukelis :attribute turi buti užpildytas'
            ];
        Validator::make($request->all(), [
            'brand' => 'required',
            'model' => 'required',
            'reg_number' => 'required',
            'jpg' => 'required',
    ], $messages)->validate();


        $cars = Car::find($id);
        
        $cars->brand = $request ->brand;
        $cars->model = $request ->model;
        $cars->reg_number = $request ->reg_number;
        $request ->file("jpg")->store('public');
        $cars->jpg = $request ->file("jpg")->hashName();
        
        $cars->save();
        Session::flash( 'status', 'Įrašas atnaujintas sėkmingai' );
        return redirect()->route('cars.index');
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cars = Car::find($id);

        $cars->delete();
        Session::flash( 'status', 'Automibilio įrašas ištrintas sėkmingai' );
        return redirect()->route('cars.index');
        
    }
}
