<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;
use App\Ruang;
use App\PinjamRuang;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function logins()
    {
        $pengguna = Pengguna::where('remember_token',csrf_token())->get();
        if(count($pengguna)== 1){
            return redirect('home/'.csrf_token());
        }else{
            return view('home.login');
        }
    }
    public function login(Request $request)
    {
        $username   =   $request['username'];
        $password   =   $request['password'];
        $token      =   $request['_token'];
        $cek        =   Pengguna::where('username',$username)->get();
        $pengguna   =   count($cek);
        if($pengguna > 0 ){
            foreach($cek as $user){
                if(Hash::check($password, $user->password)){
                    session([
                        'username'  =>  $username,
                        'nama'      =>  $user->nama,
                        'role'      =>  $user->role,
                    ]);
                    Pengguna::where('username',$username)->update(['remember_token'=> $token]);
                    return redirect("home/$token");
                }else{
                    return redirect()->back()->with('gagal','Password anda salah');
                }
            }
        }else{
            return redirect()->back()->with('gagal','Username tersebut tidak ditemukan');
        }
    }
    public function keluar()
    {
        Pengguna::where('username',session('username'))->update(['remember_token'=>csrf_token()]);
        $hancur = session()->flush();
        return redirect('/login')->with('sukses','Anda berhasil keluar');

    }
    public function index($token)
    {
        if($token != csrf_token()){
            $hancur = session()->flush();
             return redirect('/login')->with('gagal','Anda belum melakukan login');
        }else{
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'role'      =>  session('role'),
            'ruang'     =>  Ruang::get(),
            'pinjam'    =>  PinjamRuang::get(),
        ];
        return view('dashboard/home',$data);
        }
    }
    public function ruang($token)
    {
        if($token != csrf_token()){
            $hancur = session()->flush();
             return redirect('/login')->with('gagal','Anda belum melakukan login');
        }else{
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'role'      =>  session('role'),
            'ruang'     =>  Ruang::get(),
            'pinjam'    =>  PinjamRuang::get(),

        ];
        return view('dashboard/ruang',$data);
        }
    }

    //Admin
    public function peminjam($token)
    {
        if($token != csrf_token()){
            $hancur = session()->flush();
             return redirect('/login')->with('gagal','Anda belum melakukan login');
        }else{
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'role'      =>  session('role'),
            'ruang'     =>  Ruang::get(),
            'mahasiswa' =>  Pengguna::where('role','mahasiswa')->get(),
            'dosen'     =>  Pengguna::where('role','dosen')->get()
        ];
        return view('dashboard/admin/peminjam',$data);
        }
    }
    public function jadwal($token)
    {
        if($token != csrf_token()){
            $hancur = session()->flush();
             return redirect('/login')->with('gagal','Anda belum melakukan login');
        }else{
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'role'      =>  session('role'),
            'ruang'     =>  Ruang::get(),
        ];
        return view('dashboard/admin/jadwal',$data);
        }
    }
    public function ruangAdd(Request $request)
    {
        // dd($request->all());
        if($request['_token'] == csrf_token() ){
            $kode_ruang     =   $request['kode'];
            $keterangan     =   $request['keterangan'];
            $token          =   $request['_token'];
            Ruang::create([
                'kode_ruang'    =>  $kode_ruang,
                'keterangan'    =>  $keterangan
            ]);
            return redirect()->back()->with('sukses','Penambahan Ruang Kelas Berhasil');
        }else{
            return redirect()->back()->with('gagal','Maaf ada kesalahan');
        }
    }
    public function jadwalAdmin(Request $request)
    {
        // dd();
        $kode_ruang         =   $request['kode'];
        $tanggal            =   $request['tgl'];
        $mulai              =   $request['mulai'];
        $akhir              =   $request['akhir'];
        PinjamRuang::create([
            'username'      =>  session('username'),
            'kode_ruang'    =>  $kode_ruang,
            'tgl_pinjam'    =>  $tanggal,
            'waktu_mulai'   =>  $mulai,
            'waktu_akhir'   =>  $akhir,
            'keterangan'    =>  $request['kegunaan'].": ".$request['keterangan'],
            'status'        =>  "Belum Disetujui"
        ]);
        return redirect()->back();
    }


    //NON-ADMIN
    public function pinjamRuang(Request $request)
    {
        dd($request->all());
    }



    //API
    public function mahasiswa()
    {
        $mahasiswa  =   Pengguna::where('role','mahasiswa')->get();
        $data       = [
            'mahasiswa' => $mahasiswa,
        ];
        return response()->json($data, 200);
    }
    public function mahasiswa_detail($id)
    {
        $mahasiswa  =   Pengguna::where('role','mahasiswa')->where('username',$id)->get();
        $data       = [
            'mahasiswa' => $mahasiswa,
        ];
        return response()->json($data, 200);
    }
     public function admin()
    {
        $mahasiswa  =   Pengguna::where('role','admin')->get();
        $data       = [
            'admin' => $mahasiswa,
        ];
        return response()->json($data, 200);
    }
    public function admin_detail($id)
    {
        $mahasiswa  =   Pengguna::where('role','admin')->where('username',$id)->get();
        $data       = [
            'admin' => $mahasiswa,
        ];
        return response()->json($data, 200);
    }
     public function dosen()
    {
        $mahasiswa  =   Pengguna::where('role','dosen')->get();
        $data       = [
            'dosen' => $mahasiswa,
        ];
        return response()->json($data, 200);
    }
    public function dosen_detail($id)
    {
        $mahasiswa  =   Pengguna::where('role','dosen')->where('username',$id)->get();
        $data       = [
            'dosen' => $mahasiswa,
        ];
        return response()->json($data, 200);
    }

}
