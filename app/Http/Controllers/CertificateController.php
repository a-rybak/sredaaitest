<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use App\Services\CertficateService;

class CertificateController extends Controller
{
    protected $certificateService;
    public function __construct(CertficateService $certificateService)
    {
        $this->certificateService = $certificateService;
    }

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
        $post = $request->validated();
        if ($post) {
            return $this->certificateService->renderPdf($post);
        }
    }

    protected function checkGraphicLibrary()
    {
        return extension_loaded('gd');
    }
}
