<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Mail;
use App\Type;
use App\User;
use App\Disposition;
Use PDF;

// use App\Upload;

use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function masuk()
    {
        $data['inbox'] = Mail::where('mail_to', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.masuk',$data);
    }
    public function keluar()
    {
        $data['inbox'] = Mail::all();
        return view('dashboard.keluar',$data);
    }
    public function surat()
    {
        $data['tipe'] = Type::all();
        $data['users'] = User::all();
        return view('dashboard.surat',$data);
    }

    public function detail($id)
    {
        $data['detail'] = Mail::where('id', $id)->first();
        if ($data['detail']->mark == 'unread'){
            $edit = Mail::find($id);
            $edit->mark = "read";
            $edit->save();
        }
        $data['users'] = User::all();
        $data['dis'] = false;
        return view('dashboard.detail', $data);
    }

    // public function download_files(){
    //     $uploadfiles = DB::table('mails')->get();
    //     return view('uploadfile.uploadfile', compact($uploadfiles));
    // }

    public function download($file_name)
    {
        $download = Mail::where('file_name', $file_name)->firstOrFail();
        $pathToFile = public_path('uploadfile/' . $download->file_name);
        return response()->download($pathToFile);
    }
    public function laporan()
    {
        $data ['title'] = "laporan";
        return view('dashboard.laporan',$data);
    }
    public function laporan_post(Request $request)
    {
        if ($request->input('tipe') == "disposisi") {
            if ($request->input('jenis') == "masuk") {
                $data['surat'] = Mail::where('mail_to', Auth::user()->id)
                ->where('created_at', '>=', $request->input('dari'))
                ->where('created_at', '<=',$request->input('sampai'))
                ->orderBy('created_at','desc')

                ->get();
            }
            if ($request->input('jenis') == "keluar") {
                $data['surat'] = Mail::where('mail_to', Auth::user()->id)
                ->where('created_at', '>=', $request->input('dari'))
                ->where('created_at', '<=',$request->input('sampai'))
                ->orderBy('created_at','desc')

                ->get();
            }
        }
        else if ($request->input('tipe') == "surat") {
            $data['dis'] = false;
            if ($request->input('jenis') == "masuk") {
                $data['surat'] = Mail::where('mail_to', Auth::user()->id)
                ->where('created_at', '>=', $request->input('dari'))
                ->where('created_at', '<=',$request->input('sampai'))
                ->orderBy('created_at','desc')

                ->get();
            }
            if($request->input('jenis') == "keluar"){
                $data['surat'] = Mail::where('mail_to', Auth::user()->id)
                ->where('created_at', '>=', $request->input('dari'))
                ->where('created_at', '<=',$request->input('sampai'))
                ->orderBy('created_at','desc')

                ->get();
            }
        }

        $data['dis'] = false;
        $data['title'] = "Laporan";
        $data ['post'] = true;
        if ($request->get('pdf') == "dld")
        {
            $pdf = PDF::loadview('dashboard.pdfview',$data);
            return $pdf->download('laporan.pdf');
            
        } else if ($request->get('pdf') == "liat") {
            $pdf = PDF::loadview('dashboard.pdfview',$data);
            return $pdf->stream('laporan.pdf');
        }
        
    }
    public function disposisimasuk()
    {
        $data['dismasuk'] = Disposition::all();
        return view('dashboard.disposisimasuk',$data);
    }

    public function disposisikeluar()
    {
        $data['diskeluar'] = Disposition::all();
        return view('dashboard.disposisikeluar',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['tipe'] = Type::all();
        $data['users'] = User::all();
        return view('dashboard.surat', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function tambah(Request $request)
    {
      Mail::create([
        'mail_code' => date("mdHis")."/SIAS/".date("Y"),
        'mail_from' => Auth::id(),
        'mail_to' => $request->input('user'),
        'mail_subject' => $request->input('subjek'),
        'description' => $request->input('pesan'),
        'file_name' => $request->file('file_name')->getClientOriginalName(),
        'id_type' => $request->input('tipe'),
        'mark' => "unread"
    ]);

       if($request->hasFile('file_name')){
            $destination = "uploadfile";
            $filename = $request->file('file_name');
            $filename->move($destination, $filename->getClientOriginalName());
            $upload= "Y";
        }

      return redirect('surat/keluar');
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
        $mails = Mail::find($id);
        $mails->mail_code       =$request->get('mail_code');
        $mails->mail_from       =$request->get('mail_from');
        $mails->mail_to         =$request->get('mail_to');
        $mails->mail_subject    =$request->get('mail_subject');
        $mails->description     =$request->get('description');
        $mails->id_file         =(empty($request->input('file'))) ? '0' : $request->input('file');
        $mails->id_type         =$request->get('id_type');
        $mails->mark            =$request->get('mark');
        $mails->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        $mails = Mail::find($id);
        $mails->delete();
        return redirect()->back();
    }
}
