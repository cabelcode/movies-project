<?php

namespace App\Http\Controllers;

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
        
        /* $query = 'http://localhost:3050/search/batman';
        echo $query;
        $cURLConnection = curl_init();
        curl_setopt($cURLConnection, CURLOPT_URL, $query);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));
        $result = curl_exec($cURLConnection);
        var_dump($result);
        echo($result);
        curl_close($cURLConnection); */

        $res = Http::get('http://localhost:3050');
        $result = json_decode($res, true);

        //randomize the result;
                
        foreach( $result['results'] as $key => $item ){
            
            foreach( ['red', 'yellow', 'blue', 'green'] as $listColour){
                if( preg_match("/${listColour}/i", $item["Title"], $matches) ){
                    $result['results'][$key]['Colour'] = $matches[0];
                } 
            }
        }

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
}
