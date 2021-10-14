<?php

namespace App\Http\Controllers\Front;

use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class CertificateController extends Controller
{

    public function index()
    {
        return view('front-end.certificate.index');
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $certificates = Certificate::where('certificate_code', 'like', "%" . $search . "%")->paginate();

        return view('front-end.certificate.index', compact('certificates'));
    }

    public function printCertificate(Certificate $certificate)
    {
        $certificates = Certificate::all();

        $pdf = PDF::loadview('front-end.certificate.certificate', ['certificates' => $certificates, 'certificate' => $certificate]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('certificates-sikoding.pdf');
    }
}
