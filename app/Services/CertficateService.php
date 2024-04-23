<?php

namespace App\Services;

use App\Http\Requests\CertificateRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertficateService
{
    public $link;

    protected $student;
    protected $data;

    protected $pdfResource;

    /**
     * Create a new class instance.
     */
    public function __construct($link)
    {
        $this->link = $link;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getStudent()
    {
        return $this->makeStudentName();
    }

    protected function makePdf()
    {
        $this->student = $this->makeStudentName();

        $this->pdfResource = Pdf::loadView('certificates.certificate', [
            'number'        => $this->data['number'],
            'course'        => $this->data['course'],
            'student'       => $this->getStudent(),
            'finished_at'   => $this->data['finished_at'],
            'link'          => $this->link . $this->data['number'],
            'qr'            => base64_encode(QrCode::size(130)->color(99, 138, 215)->generate($this->link))
        ]);
    }

    public function renderPdf($data)
    {
        $this->setData($data);

        $this->makePdf();

        $filename = $this->getStudent() . '.pdf';
        return $this->data['action'] === CertificateRequest::ACTION_DOWNLOAD ? $this->pdfResource->download($filename) : $this->pdfResource->stream($filename);
    }

    /*
     * Concats first and last name from input to make completely Full Name of a student
     */
    protected function makeStudentName()
    {
        $name    = 'Noname';
        $surname = 'Nosurname';

        if (!empty($this->data)) {
            $name = $this->data['first_name'];
            $surname = $this->data['last_name'];
        }
        return ucfirst($name) . " " . ucfirst($surname);
    }
}
