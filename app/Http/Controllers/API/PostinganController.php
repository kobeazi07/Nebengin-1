<?php

namespace App\Http\Controllers\API;
use App\Models\Postingan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostinganResource;



class PostinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        $postingan = Postingan::get();
       return response()->json([
        'postingans'=> $postingan
       ]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required'],
            'teks' =>  ['required'],
            'gambartul' =>  ['required'],
        ]);
        
        // memastikan pembuat data sudah melaksanakan login
       $postingan =  Postingan::create([
            'judul' => request('judul'),
            'teks' => request('teks'),
            'gambartul' => request('gambartul'),
 
        ]);
        return response()->json([
            'sukses', new PostinganResource($postingan)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apipostingan(Postingan $postingan)
    {
        return $postingan;
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
