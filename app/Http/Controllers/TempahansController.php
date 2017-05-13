<?php

namespace App\Http\Controllers;
use App\User;
use App\Pendaftaran;
use App\Tempahan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\DB;
use Charts;
use App\Notifications\Message;

class TempahansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tempahans = Tempahan::with('user')->where('user_id', Auth::user()->id)->paginate(6);
      return view('tempahan.index', compact('tempahans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function listalltempahan()
     {

       $tempahans = DB::table('tempahans')
       ->join('pendaftarans', 'tempahans.pendaftaran_id', '=', 'pendaftarans.id')
       ->where('pendaftarans.user_id', '=', auth()->id())
       ->selectRaw('count(*) as total, pendaftarans.program as program')
       ->groupBy('pendaftaran_id')
       ->join('users', 'pendaftarans.user_id', '=', 'users.id')
       ->get();


       return view('tempahan.listalltempahan', compact('tempahans'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */

      public function peserta($program)
      {

      $pendaftaran = Pendaftaran::where('program', $program)->first();

      $tempahans = Tempahan::where('pendaftaran_id', $pendaftaran->id)->get();

        return view('tempahan.peserta', compact('tempahans'));
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */

       public function cetakpeserta($program)
       {

         // $tempahans = Tempahan::with('user')->paginate(5);
          $pdf = app('dompdf.wrapper');
          $pendaftaran = Pendaftaran::where('program', $program)->first();

          $tempahans = Tempahan::where('pendaftaran_id', $pendaftaran->id)->get();
         $pdf->loadView('tempahan.cetakpeserta',compact('tempahans'));
         return $pdf->stream('SenaraiPeserta.pdf');
       }

       /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
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

     public function simpan(Request $request, $id)
     {
         $this->validate($request, ['kehadiran']);
         $tempahan=Tempahan::findOrFail($id);
         $tempahan->user_id=Auth::user()->id;
         $tempahan->kehadiran = $request->kehadiran;
         $tempahan->save();

         return redirect()->action('TempahansController@index')->withMessage('Kehadiran berjaya direkod');
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */

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

    public function janalaporan()
    {
      $chart = Charts::database(Pendaftaran::all(), 'bar', 'highcharts')
      ->title("Jumlah Program Latihan Yang Didaftarkan Setiap Bulan")
      ->elementLabel("Total")
      ->dimensions(900, 500)
      ->responsive(false)
      ->groupByMonth('2017', true);

      $char = Charts::database(Tempahan::all(), 'bar', 'highcharts')
        ->title("Jumlah Tempahan Latihan Setiap Bulan")
      ->elementLabel("Total")
      ->dimensions(900, 500)
      ->responsive(false)
      ->groupByMonth('2017', true);
        return view('laporan.index', ['chart' => $chart], ['char' => $char]);
    }

    public function all()
    {
      $tempahans = Tempahan::with('user')->paginate(10);
      return view('tempahan.all', compact('tempahans'));
    }

    public function notification($id)
    {
      $tempahan = Tempahan::findOrFail($id);
      $user=$tempahan->user;
      $namapeserta=$tempahan->user->name;
      $program=$tempahan->pendaftaran->program;
      $tarikh_mula=$tempahan->pendaftaran->tarikh_mula;
      $tarikh_akhir=$tempahan->pendaftaran->tarikh_akhir;
      $masa_mula=$tempahan->pendaftaran->masa_mula;
      $masa_akhir=$tempahan->pendaftaran->masa_akhir;
      $lokasi=$tempahan->pendaftaran->lokasi;
// dd($user);
      // $user = auth()->user();

      $user->notify(new Message($namapeserta, $program, $tarikh_mula, $tarikh_akhir, $masa_mula, $masa_akhir, $lokasi));
      return back()->withMessage('Emel berjaya dihantar');
    }
}
