<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WetonController extends Controller
{
    private $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    private $pasaran = ['Legi', 'Pahing', 'Pon', 'Wage', 'Kliwon'];

    public function index()
    {
        return view('weton.index');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'tanggal_lahir_1' => 'required|date',
            'tanggal_lahir_2' => 'required|date',
        ]);

        $tanggal1 = $request->input('tanggal_lahir_1');
        $tanggal2 = $request->input('tanggal_lahir_2');

        // Hitung Hari dan Pasaran
        $weton1 = $this->getWeton($tanggal1);
        $weton2 = $this->getWeton($tanggal2);

        // Jumlah Weton
        $jumlah_weton = ($weton1['neptu'] + $weton2['neptu']);
        if($jumlah_weton === 1 || $jumlah_weton === 9 || $jumlah_weton === 17 || $jumlah_weton === 25 || $jumlah_weton === 33) {
            $result = 'Pegat';
        } else if($jumlah_weton === 2 || $jumlah_weton === 10 || $jumlah_weton === 18 || $jumlah_weton === 26 || $jumlah_weton === 34){
            $result = 'Ratu';
        } else if($jumlah_weton === 3 || $jumlah_weton === 11 || $jumlah_weton === 19 || $jumlah_weton === 27 || $jumlah_weton === 35){
            $result = 'Jodoh';
        } else if($jumlah_weton === 4 || $jumlah_weton === 12 || $jumlah_weton === 20 || $jumlah_weton === 28 || $jumlah_weton === 36){
            $result = 'Topo';
        } else if($jumlah_weton === 5 || $jumlah_weton === 13 || $jumlah_weton === 21 || $jumlah_weton === 29 ){
            $result = 'Tinari';
        } else if($jumlah_weton === 6 || $jumlah_weton === 14 || $jumlah_weton === 22 || $jumlah_weton === 30 ){
            $result = 'Padu';
        } else if($jumlah_weton === 7 || $jumlah_weton === 15 || $jumlah_weton === 23 || $jumlah_weton === 31 ){
            $result = 'Sujanan';
        } else if($jumlah_weton === 8 || $jumlah_weton === 16 || $jumlah_weton === 24 || $jumlah_weton === 32 ){
            $result = 'Pesthi';
        } else {
            $result = 'Tidak Ada';
        }


        return view('weton.result', [
            'weton1' => $weton1,
            'weton2' => $weton2,
            'jumlah_weton' => $jumlah_weton,
            'result' => $result,
        ]);
    }

    private function getWeton($tanggal)
{
    $timestamp = strtotime($tanggal);

    // Hari (0-6)
    $hari_ke = date('w', $timestamp); // 0 = Minggu, 1 = Senin, dst.
    $hari = $this->hari[$hari_ke];

    // Pasaran (0-4)
    $tanggal_acuan = strtotime('1900-01-01'); // Senin Kliwon
    $selisih_hari = ($timestamp - $tanggal_acuan) / 86400; // Selisih dalam hari
    $pasaran_ke = ($selisih_hari % 5 + 5) % 5; // Menghindari hasil negatif
    $pasaran = $this->pasaran[$pasaran_ke];

    // Hitung Neptu
    $neptu_hari = [5, 4, 3, 7, 8, 6, 9]; // Minggu-Sabtu
    $neptu_pasaran = [5, 9, 7, 4, 8];    // Legi-Kliwon
    $neptu = $neptu_hari[$hari_ke] + $neptu_pasaran[$pasaran_ke];

    return [
        'tanggal' => $tanggal,
        'hari' => $hari,
        'pasaran' => $pasaran,
        'neptu' => $neptu,
    ];
}

}
