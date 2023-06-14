<?php

namespace App\Http\Services;

use Illuminate\Support\Str;

class Module2 extends Module
{
    public function __construct($fullText)
    {
        parent::__construct($fullText);
    }
    /**
     * 10.jpg, 9.jpg
     *
     * @return void
     */
    protected function getFatherName()
    {
        $this->fatherName = $this->extractInfo("/Baba Adı \/ Father's Name\n([A-Za-z\s]+)/");
    }

    protected function getMotherName()
    {
        $this->motherName = $this->extractInfo("/Anne Adi \/ Mother's Name\n([A-Za-z\s]+)/");
    }

    protected function getName()
    {
        $this->Name = $this->extractInfo("/Adi \/ Given Name\(s\)\n(.*?)\n/u");
    }

    protected function getFamilyName()
    {
        $this->familyName = $this->extractInfo("/Soyadı \/ Surname\n(.*?)\n/u");
    }

    protected function getBirthDate()
    {
        $this->date = $this->extractInfo("/\b(\d{2}\.\d{2}\.\d{4})\b/");
    }

    protected function getIdNo()
    {
        $this->idNo = $this->extractInfo("/TR identity No\s*\n?\s*([0-9]+)/");
    }

    protected function getSerialNo()
    {
        $this->serialNo = $this->extractInfo("/\b([A-Za-z0-9]+[A-Za-z]\d{5})\b/");
    }
}
