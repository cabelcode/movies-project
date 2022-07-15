<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Http::get('http://localhost:3050');
        $result = json_decode($res, true);
                
        foreach( $result['results'] as $key => $item ){
            
            foreach( ['red', 'yellow', 'blue', 'green'] as $listColour){
                if( preg_match("/${listColour}/i", $item["Title"], $matches) ){
                    $result['results'][$key]['Colour'] = $matches[0];
                } 
            }
        }
        //randomize the result;
        shuffle($result['results']);

        return view('home', ['data' => $result['results']] );
    }

    /**
     * Show the form for creating a new resource.
     *
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
        $res = Http::get("http://localhost:3050/id/$id");
        $result = json_decode($res, true);

        $comments = Comments::with('userInfo')->where( 'movie_id', $id )->orderBy('created_at')->get();
        $commentResult = [];

        foreach( $comments as $comment ){
            $commentResult[] =
            [ 
                "comment" => $comment->comment,
                "user" => $comment->userInfo->name,
                "created_at" => $comment->created_at->format('jS F Y h:i:s A')
            ];
        }
        return view('single', [
            'data' => $result['results'],
            'comments' => $commentResult
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function search(Request $request){
        
        $title = $request->search;

        $res = Http::get("http://localhost:3050/search/${title}");
        $result = json_decode($res, true);

        foreach( $result['results'] as $key => $item ){
            
            foreach( ['red', 'yellow', 'blue', 'green'] as $listColour){
                if( preg_match("/${listColour}/i", $item["Title"], $matches) ){
                    $result['results'][$key]['Colour'] = $matches[0];
                } 
            }
        }
        return view('search', ['data' => $result['results']]);

    }

    public function searchIndex(){
        return view('search');

    }

        
}
