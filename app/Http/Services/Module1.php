<?php

namespace App\Http\Services;


class Module1 extends Module
{
    public function __construct($fullText)
    {
        parent::__construct($fullText);
    }
    /**
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
        $this->Name = $this->extractInfo("/‘Adi \/ Name\n\n(.*?)\n\n/u");
    }

    protected function getFamilyName()
    {
        $this->familyName = $this->extractInfo("/Soyadı \/ Surname\n(.*?)\n/u");
    }

    protected function getBirthDate()
    {
        $this->date = $this->extractInfo("/Doğum Tarihi \/ Date of Birth\n(.*?)\n/u");
    }

    protected function getIdNo()
    {
        $this->idNo = $this->extractInfo("/ei\s*\n?\s*([0-9]+)/i");
    }

    protected function getSerialNo()
    {
        $this->serialNo = $this->extractInfo("/Seri No \/ Document No\s*\n?\s*([A-Z0-9\s]+)/i");
    }
}
