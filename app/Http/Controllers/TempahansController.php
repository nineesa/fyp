<?php

namespace App\Http\Controllers;
use App\User;
use App\Pendaftaran;
use App\Tempahan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

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

     public function listalltempahan()
     {
       $tempahans = Tempahan::with(['pendaftaran' => function ($query) {
      $query->where('user_id', auth()->user()->id);
       }])->paginate();
      // $tempahans = App\Tempahan::where('pendaftaran_id','1')->count();
       return view('tempahan.listalltempahan', compact('tempahans'));
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
        $this->validate($request, ['kehadiran']);
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

    //  public function simpan(Request $request, $id)
    //  {
    //      $this->validate($request, ['kehadiran']);
    //      $tempahan=Tempahan::findOrFail($id);
    //      $tempahan->user_id=Auth::user()->id;
    //      $tempahan->pendaftaran_id=$request->pendaftaran_id;
    //      $tempahan->kehadiran = $request->kehadiran;
    //      $tempahan->save();
     //
    //      return redirect()->action('TempahansController@index')->withMessage('Kehadiran berjaya direkod');
    //  }
     //
    //  /**
    //   * Display the specified resource.
    //   *
    //   * @param  int  $id
    //   * @return \Illuminate\Http\Response
    //   */

    public function show($id)
    {
      $tempahan = Tempahan::with('pendaftaran')->findOrFail($id);
    // dd($tempahan);
     return view('tempahan.viewdetail', compact('tempahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function peserta()
     {
      $tempahans = Tempahan::with('user')->where('user_id', Auth::user()->id)->paginate(5);
      // dd($tempahans);
       return view('tempahan.peserta', compact('tempahans'));
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */

      public function cetakpeserta()
      {
        $tempahans = Tempahan::with('user')->paginate(5);
         $pdf = app('dompdf.wrapper');
        $pdf->loadView('tempahan.cetakpeserta',compact('tempahans'));
        return $pdf->stream('SenaraiPeserta.pdf');
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
