<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
class NewsController extends Controller
{  private $columns =['newsTitle', 'newsContent',
   'newsAuthor','newsPublished'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $News = News::get(); 
 return view("News",compact("News"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return 'Show data';

       return view('createNews');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $news = new News();

        // $news->newsTitle = $request->newsTitle;
        // $news->newsContent = $request->newsContent;
        // $news->newsPublished = (isset($request->newsPublished))? true : false;
        // $news->newsAuthor = $request->newsAuthor;

        // $news->save();

        // return 'News is added successfully';
        $data = $request->only($this->columns);
        $data['newsPublished'] = isset($data['newsPublished'])? true : false;

         $request->validate([
            'newsTitle'=>'required|string',
            'newsContent'=> 'required|string|Max:5',
            'newsAuthor'=> 'required|string|Max:100',
            ]);
           
            News::create($data);        
            return ('done');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $News = News::findOrFail($id);
        return view('NewsDetails',compact('News'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $News = News::findOrFail($id);
return view('update',compact('News'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     $data = $request->only($this->columns);
        $data['published'] = isset($data['published'])? true : false;

        //News::where('id', $id)->update($data);

       
        News::where('id', $id)->update($request->only($this->columns));
       return 'Updated';
        
    }
   





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {

        News::findOrFail($id)->delete();

    return redirect('News');
}
   
    

    public function Trashed( )
    {

        $News = News::onlyTrashed()->get();
        return view('Trashed',compact('News'));
}
  


public function restore(string $id):RedirectResponse
{

    News::where('id', $id)->restore();
    return redirect('News');


}

public function forceDeleted(string $id):RedirectResponse
{

    News::where('id', $id)->forceDelete();
    return redirect('News');
    

}
}
