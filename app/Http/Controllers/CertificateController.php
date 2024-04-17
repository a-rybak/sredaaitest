<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use App\Models\Certificate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use function Spatie\LaravelPdf\Support\pdf;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('certificates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificateRequest $request)
    {
        if  ($request->validated()) {
            $post = $request->input();
            $isDownloadRequest = array_key_exists('downloadpdf', $post);

            $student = $this->makeStudentName($post);
            $filename = $student . '.pdf';

            $pdf = Pdf::loadView('certificates.certificate', [
                'number' => $post['number'],
                'course' => $post['course'],
                'student' => $student,
                'finished_at' => $post['finished_at']
            ]);

            return $isDownloadRequest ? $pdf->download($filename) : $pdf->stream($filename);
        }
    }

    /*
     * Concats first and last name from input to make completely Full Name of a student
     */
    protected function makeStudentName($data)
    {
        return ucfirst($data['first_name'])." ".ucfirst($data['last_name']);
    }
}
