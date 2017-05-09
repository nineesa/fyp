<?php

namespace App\Http\Controllers;
use App\Pendaftaran;
use App\Tempahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class PendaftaransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pendaftarans = Pendaftaran::with('user')->where('user_id', Auth::user()->id)->paginate(5);
      return view('pendaftaran.index', compact('pendaftarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function calendar()
       {

         $pendaftarans = Pendaftaran::get(['program', 'tarikh_mula', 'tarikh_akhir']);
        //  return view('pendaftaran.calendar')->Response()->json($pendaftarans);
        //  return Response()->json($pendaftarans);

      return view('pendaftaran.calendar', compact('pendaftarans'));

  // return view('pendaftaran.calendar', ['pendaftarans' => Pendaftaran::orderBy('start_time')->get()]);
}



       /**
        * Show the form for creating a new resource.
        *@param
        * @return \Illuminate\Http\Response
        */

    public function create()
    {
       $pendaftarans = Pendaftaran::with('user');
        return view('pendaftaran.create', compact('pendaftarans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
      $this->validate($request, ['penganjur' => 'required',]);
      $this->validate($request, ['program' => 'required',]);
      $this->validate($request, ['penerangan_program']);
      $this->validate($request, ['tarikh_mula' => 'required',]);
      $this->validate($request, ['tarikh_akhir' => 'required',]);
      $this->validate($request, ['masa_mula' => 'required',]);
      $this->validate($request, ['masa_akhir' => 'required',]);
      $this->validate($request, ['lokasi' => 'required',]);
      $this->validate($request, ['kump_sasaran' => 'required',]);
      $this->validate($request, ['kos' => 'required',]);
      $this->validate($request, ['max_peserta' => 'required',]);
      $this->validate($request, ['status']);

      $pendaftaran = new Pendaftaran;
      $pendaftaran->penganjur = $request->penganjur;
      $pendaftaran->program = $request->program;
      $pendaftaran->penerangan_program = $request->penerangan_program;
      $pendaftaran->tarikh_mula = $request->tarikh_mula;
      $pendaftaran->tarikh_akhir = $request->tarikh_akhir;
      $pendaftaran->masa_mula = $request->masa_mula;
      $pendaftaran->masa_akhir = $request->masa_akhir;
      $pendaftaran->lokasi = $request->lokasi;
      $pendaftaran->kump_sasaran = $request->kump_sasaran;
      $pendaftaran->kos = $request->kos;
      $pendaftaran->max_peserta = $request->max_peserta;

      $pendaftaran->user_id = Auth::user()->id;
      $pendaftaran->save();
      return redirect()->action('PendaftaransController@store')->withMessage('Program anda telah berjaya didaftarkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
      $pendaftaran = Pendaftaran::findOrFail($id);
      return view('pendaftaran.viewLatihan', compact('pendaftaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function catalog()
     {
      //  $pendaftaran = Pendaftaran::findOrFail($id);//get single product from db
      //dd($product);
      $pendaftarans = Pendaftaran::with('user')->where('status', 'Lulus')->paginate(5);
      return view('pendaftaran.catalog', compact('pendaftarans'));
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */

      public function listLatihan()
      {
        $pendaftarans = Pendaftaran::with('user')->paginate(5);
        return view('pendaftaran.listLatihan', compact('pendaftarans'));
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */

    public function edit($id)
    {
      $pendaftaran = Pendaftaran::findOrFail($id);
      return view('pendaftaran.edit', compact('pendaftaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function sahLatihan($id)
     {
       $pendaftaran = Pendaftaran::findOrFail($id);
       return view('pendaftaran.sahLatihan', compact('pendaftaran'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */

      public function simpan(Request $request, $id)
      {
        $this->validate($request, ['penganjur' => 'required',]);
        $this->validate($request, ['program' => 'required',]);
        $this->validate($request, ['penerangan_program']);
        $this->validate($request, ['tarikh_mula' => 'required',]);
        $this->validate($request, ['tarikh_akhir' => 'required',]);
        $this->validate($request, ['masa_mula' => 'required',]);
        $this->validate($request, ['masa_akhir' => 'required',]);
        $this->validate($request, ['lokasi' => 'required',]);
        $this->validate($request, ['kump_sasaran' => 'required',]);
        $this->validate($request, ['kos' => 'required',]);
        $this->validate($request, ['max_peserta' => 'required',]);
        $this->validate($request, ['status']);
        $pendaftaran = Pendaftaran::findOrFail($id);;
        $pendaftaran->penganjur = $request->penganjur;
        $pendaftaran->program = $request->program;
        $pendaftaran->penerangan_program = $request->penerangan_program;
        $pendaftaran->tarikh_mula = $request->tarikh_mula;
        $pendaftaran->tarikh_akhir = $request->tarikh_akhir;
        $pendaftaran->masa_mula = $request->masa_mula;
        $pendaftaran->masa_akhir = $request->masa_akhir;
        $pendaftaran->lokasi = $request->lokasi;
        $pendaftaran->kump_sasaran = $request->kump_sasaran;
        $pendaftaran->kos = $request->kos;
        $pendaftaran->max_peserta = $request->max_peserta;
        $pendaftaran->status = $request->status;
        $pendaftaran->save();
        return redirect()->action('PendaftaransController@listLatihan')->withMessage('Program telah disahkan');
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */

    public function update(Request $request, $id)
    {
      $this->validate($request, ['penganjur' => 'required',]);
      $this->validate($request, ['program' => 'required',]);
      $this->validate($request, ['penerangan_program']);
      $this->validate($request, ['tarikh_mula' => 'required',]);
      $this->validate($request, ['tarikh_akhir' => 'required',]);
      $this->validate($request, ['masa_mula' => 'required',]);
      $this->validate($request, ['masa_akhir' => 'required',]);
      $this->validate($request, ['lokasi' => 'required',]);
      $this->validate($request, ['kump_sasaran' => 'required',]);
      $this->validate($request, ['kos' => 'required',]);
      $this->validate($request, ['max_peserta' => 'required',]);
      //$this->validate($request, ['status']);
      $pendaftaran = Pendaftaran::findOrFail($id);;
      $pendaftaran->penganjur = $request->penganjur;
      $pendaftaran->program = $request->program;
      $pendaftaran->penerangan_program = $request->penerangan_program;
      $pendaftaran->tarikh_mula = $request->tarikh_mula;
      $pendaftaran->tarikh_akhir = $request->tarikh_akhir;
      $pendaftaran->masa_mula = $request->masa_mula;
      $pendaftaran->masa_akhir = $request->masa_akhir;
      $pendaftaran->lokasi = $request->lokasi;
      $pendaftaran->kump_sasaran = $request->kump_sasaran;
      $pendaftaran->kos = $request->kos;
      $pendaftaran->max_peserta = $request->max_peserta;
      //$pendaftaran->status = $request->status;
      $pendaftaran->save();
      return redirect()->action('PendaftaransController@index')->withMessage('Program anda telah berjaya dikemaskini');
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
