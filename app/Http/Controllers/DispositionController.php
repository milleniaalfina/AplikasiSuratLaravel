<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Type;
use App\Disposition;
use App\User;
use App\Mail;

use DB;


class DispositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function cari(Request $request)
    {
        $data['title'] ="Cari:" .$request->input('cari');
        $data['dis'] = true;
        if($request->input('type') == 'masuk'){
            $data['inbox'] = DB::table('dispositions')
            ->join('mails','dispositions.id_mail','=','mails.id')
            ->select('dispositions.*', 'mails.mail_subject','mails.id_type')
            ->where('dispositions.mail_to',Auth::id())
            ->where('mail_subject','like','%'.$request->input('cari').'%')
            ->orderBY('created_at','desc')
            ->get();
            return view('dashboard.masuk',$data);
        }else if($request->input('type') == 'keluar'){
            $data['outbox'] = DB::table('dispositions')
            ->join('mails','dispositions.id_mail','=','mails.id_type')
            ->select('dispositions.*','mails.mail_subject','mails.id_type')
            ->where('dispositions.mail from', Auth::id())
            ->where('mail_subject','like','%'.$request->input('cari').'%')
            ->orderBY('created_at','desc')
            ->get();
            return view('dashboard.keluar',$data);
        }else{
            echo "wayolooh!";
        }
    }
    
    // public function detail($id)
    // {
    //     $data['detail'] = DB::table('dispositions')
    //     ->join('mails','dispositions.id_mail','=','mails.id')
    //     ->select('dispositions.id',$id)
    //     ->orderBY('created_at')
    //     ->first();

    //     if($data['detail']->mark == "unread"){
    //         $edit = Disposition::find($id);
    //         $edit->mark = "read";
    //         $edit->save();
    //     }
    //     $data['users'] = User::all();
    //     $data['dis'] = false;
    //     return view('dashboard.detail',$data);
    // }

    public function detail($id)
    {
        $data['detail'] = Disposition::where('id', $id)->first();
        if ($data['detail']->mark == "unread"){
            $edit = Disposition::find($id);
            $edit->mark = "read";
            $edit->save();
        }
        $data['users'] = User::all();
        $data['dis'] = false;
        return view('dashboard.detail', $data);
        
    }
    public function masuk()
    {
        $data['inbox'] = DB::table('dispositions')
        ->join('mails','dispositions.id_mail','=','mails.id')
        ->select('dispositions.*','mails.mail_subject','mails.id_type')
        ->where('dispositions.mail_to', Auth::id())
        ->orderBy('created_at','desc')
        ->paginate(5);
        $data['title'] = "Disposisi Masuk";
        $data['dis'] = true;
        return view('dashboard.disposisimasuk',$data);
    }
    public function keluar()
    {
        $data['outbox'] = DB::table('dispositions')
        ->join('mails','dispositions.id_mail','=','mails.id')
        ->select('dispositions.*','mails.mail_subject','mails.id_type')
        ->where('dispositions.mail_from',Auth::id())
        ->orderBY('created_at','desc')
        ->paginate(5);
        $data['title'] = "Disposisi Keluar";
        $data['dis'] = true;
        return view('dashboard.disposisikeluar',$data);
    }
    public function baca($id) //baca disposisi
    {
        $data['surat'] = DB::table('dispositions')
        ->join('mails','dispositions,id_mail','=','mails_id')
        ->select('dispositions.*','dispositions.desription AS pesan','mails.mail_subject','mails.id_type','mails_description','mails.mail_code','mails_file')
        ->where('dispositions.id',$id)
        ->first();
        if($data['surat']->mark == "unread"){
            $edit = Disposition::find($id);
            $edit->mark = "read";
            $edit->save();
        }
        $data['dis'] = true;
        return view('dashboard.baca',$data);
    }
    public function tambah(Request $request) //disposisiin surat
    {
        Disposition::create([
            'id_mail'       => $request->input('id_mail'),
            'mail_from'     => Auth::user()->id,
            'mail_to'       => $request->input('user'),
            'description'    => $request->input('pesan'),
            'mark'          => "unread"
        ]);
        return redirect('disposisi/keluar');
    }
    public function hapus($id)
    {
        $mail = Disposition::find($id);
        $mail->delete();
        return redirect()->back();
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
}
