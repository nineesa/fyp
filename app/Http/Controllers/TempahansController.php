<?php

namespace App\Http\Controllers;
use App\User;
use App\Pendaftaran;
use App\Tempahan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TempahansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tempahans = Tempahan::with('user')->where('user_id', Auth::user()->id)->paginate(5);
      return view('tempahan.index', compact('tempahans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index1()
     {
       $tempahans = Tempahan::with(['pendaftaran' => function ($query) {
      $query->where('user_id', auth()->user()->id);
       }])->paginate();
       return view('tempahan.penganjur', compact('tempahans'));
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
        $tempahan=new Tempahan;
        $tempahan->user_id=Auth::user()->id;
        $tempahan->pendaftaran_id=$request->pendaftaran_id;
        $tempahan->save();

        return redirect()->action('PendaftaransController@catalog')->withMessage('Tempahan berjaya');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $tempahan = Tempahan::with('pendaftaran.user')->findOrFail($id);
    // dd($tempahan);
     return view('tempahan.viewdetail', compact('tempahan'));
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
