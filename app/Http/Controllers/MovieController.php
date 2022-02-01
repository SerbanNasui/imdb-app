<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    // get movies
    public function index(){
        
        // v1
        // $movies = Movie::filterByStatusAndRating()->with('artists', function($query){
        //     $query->orderBy('title','asc')->get();
        // })->get();

        // return response()->json($movies);

        $movies = Movie::filterByStatusAndRating()->get();
        foreach ($movies as $movie) {
            $getCollection[] = [
                'movie' => $movie,
                'artists' => collect($movie->artists()->get())->groupBy('title')->toArray()
            ];
        }
        return response()->json($getCollection);
    }
 
    //create a movie
    public function store(Request  $request){
 
        $validator = Validator::make($request->all(),[
            'name' =>'required',
            'rating' =>'required|numeric|min:1|max:10',
            'description' =>'required',
            'image' =>'required',
        ]);
 
        if($validator->fails()){
            return response()->json($validator->errors());      
        }
 
        $movie = Movie::create([
            'name' => $request->name,
            'rating' => $request->rating,
            'description' => $request->description,
            'image' => $request->image,
         ]);
       
         return response()->json(Movie::find($movie->id));
    }
 
    //delete a movie
    public function delete($id){
       
        $movie = Movie::find($id);
 
        if($movie==null){
            return response()->json("Can not delete on null!");
        }
 
        $movie->delete();
 
        return response()->json("Movie with ID: ".$id." was deleted!");
    }

}
