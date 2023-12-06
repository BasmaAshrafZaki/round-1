<?php

namespace App\Http\Controllers;
use App\Traits\Common;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;
class CarsController extends Controller
{

    use Common;

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
       $messages = [
        'title.required'=>'title is required',
        'description.required'=>'Should be String',
        'price.required'=>'Should be number',

       ];
        // $data = $request->only($this->columns);
        // $data['published'] = isset($data['published'])? true : false;

        $data = $request->validate([
            'title'=>'required|string',
            'description'=> 'required|string|Max:50',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'price'=> 'required',
         ], $messages);
         $filename = $this->uploadFile($request->image ,'Assets/Images' );
         $data['image'] = $filename;
         //$data[published] =isset($request['published'])? 1: 0;
         $data['published'] =isset($request['published']);
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
        $messages = [
            'title.required'=>'title is required',
            'description.required'=>'Should be String',
            'price.required'=>'Should be number', ];
            $data = $request->validate([
                'title'=>'required|string',
                'description'=> 'required|string|Max:50',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
                'price'=> 'required',
             ], $messages);
             $filename = $this->uploadFile($request->image ,'Assets/Images' );
             $data['image'] = $filename;
             $data['published'] =isset($request['published']); 
        Car::where('id', $id)->update( $data);
        return 'added';
        

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