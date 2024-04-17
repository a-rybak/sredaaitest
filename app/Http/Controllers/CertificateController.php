<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('certificates.create', [
            'warning' => !$this->checkGraphicLibrary() ? "GD library is not found or disabled. QR code won't be generated!" : ""
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificateRequest $request)
    {
        if ($request->validated()) {
            $post = $request->input();
            $isDownloadRequest = array_key_exists('downloadpdf', $post);

            $student = $this->makeStudentName($post);
            $filename = $student . '.pdf';

            $qrLink = env('APP_QR_LINK') ?? env('APP_URL');
            $pdf = Pdf::loadView('certificates.certificate', [
                'number' => $post['number'],
                'course' => $post['course'],
                'student' => $student,
                'finished_at' => $post['finished_at'],
                'link' => $qrLink . $post['number'],
            ]);

            return $isDownloadRequest ? $pdf->download($filename) : $pdf->stream($filename);
        }
    }

    /*
     * Concats first and last name from input to make completely Full Name of a student
     */
    protected function makeStudentName($data)
    {
        return ucfirst($data['first_name']) . " " . ucfirst($data['last_name']);
    }

    protected function checkGraphicLibrary()
    {
        return extension_loaded('gd');
    }
}
