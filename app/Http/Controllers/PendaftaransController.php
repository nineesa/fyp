<?php

namespace App\Http\Controllers;
use App\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PendaftaransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pendaftarans = Pendaftaran::with('user')->paginate(5);
      return view('pendaftaran.index', compact('pendaftarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
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
      $this->validate($request, ['tarikh' => 'required',]);
      $this->validate($request, ['masa' => 'required',]);
      $this->validate($request, ['lokasi' => 'required',]);
      $this->validate($request, ['tempoh_latihan' => 'required',]);
      $this->validate($request, ['kump_sasaran' => 'required',]);
      $this->validate($request, ['kos' => 'required',]);
      $this->validate($request, ['max_peserta' => 'required',]);
      // $this->validate($request, ['status' => 'required',]);
      $pendaftaran = new Pendaftaran;
      $pendaftaran->penganjur = $request->penganjur;
      $pendaftaran->program = $request->program;
      $pendaftaran->penerangan_program = $request->penerangan_program;
      $pendaftaran->tarikh = $request->tarikh;
      $pendaftaran->masa = $request->masa;
      $pendaftaran->lokasi = $request->lokasi;
      $pendaftaran->tempoh_latihan = $request->tempoh_latihan;
      $pendaftaran->kump_sasaran = $request->kump_sasaran;
      $pendaftaran->kos = $request->kos;
      $pendaftaran->max_peserta = $request->max_peserta;
      // $pendaftaran->status = $request->status;
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
      $pendaftarans = Pendaftaran::with('user')->paginate(5);
      return view('pendaftaran.catalog', compact('pendaftarans'));
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
    public function update(Request $request, $id)
    {
      $this->validate($request, ['penganjur' => 'required',]);
      $this->validate($request, ['program' => 'required',]);
      $this->validate($request, ['penerangan_program']);
      $this->validate($request, ['tarikh' => 'required',]);
      $this->validate($request, ['masa' => 'required',]);
      $this->validate($request, ['lokasi' => 'required',]);
      $this->validate($request, ['tempoh_latihan' => 'required',]);
      $this->validate($request, ['kump_sasaran' => 'required',]);
      $this->validate($request, ['kos' => 'required',]);
      $this->validate($request, ['max_peserta' => 'required',]);
      $pendaftaran = Pendaftaran::findOrFail($id);;
      $pendaftaran->penganjur = $request->penganjur;
      $pendaftaran->program = $request->program;
      $pendaftaran->penerangan_program = $request->penerangan_program;
      $pendaftaran->tarikh = $request->tarikh;
      $pendaftaran->masa = $request->masa;
      $pendaftaran->lokasi = $request->lokasi;
      $pendaftaran->tempoh_latihan = $request->tempoh_latihan;
      $pendaftaran->kump_sasaran = $request->kump_sasaran;
      $pendaftaran->kos = $request->kos;
      $pendaftaran->max_peserta = $request->max_peserta;
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
