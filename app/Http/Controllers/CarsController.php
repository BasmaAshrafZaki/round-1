<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;
class CarsController extends Controller
{
    private $columns =['title', 'description','price'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();

        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        return view('addCar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $car = new Car();

        // $car->title = $request->title;
        // $car->description = $request->description;
        // $car->published = (isset($request->published))? true: false;
        // $car->price = $request->price;

        // $car->save();

        // return 'Car added successfully';
       
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published'])? true : false;

         $request->validate([
            'title'=>'required|string',
            'description'=> 'required|string|Max:5',
            'price'=> 'required',
            ]);
           
            Car::create($data);        
            return ('done');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $car = Car::findOrFail($id);
        return view('CarDetails',compact('Car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findORFail($id);

        return view('editCar', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Car::where('id', $id)->update($request->only($this->columns));
        return 'added';
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    
    {
        Car::findOrFail($id)->delete();

       return redirect('car-index');
   
    }

    public function Trashed( )
    {

        $Cars = Car::onlyTrashed()->get();
        return view('TrashedCars',compact('Cars'));
}
  


public function restore(string $id):RedirectResponse
{

    Car::where('id', $id)->restore();
    return redirect('TrashedCars');


}

public function forceDeleted(string $id):RedirectResponse
{

    Car::where('id', $id)->forceDelete();
    return redirect('TrashedCars');
    

}





}