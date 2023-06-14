<?php

namespace App\Http\Services;

use function PHPUnit\Framework\matches;

abstract class Module
{
    public $fatherName = "";
    public $motherName = "";
    public $Name = "";
    public $idNo = "";
    public $familyName = "";
    public $date = "";
    public $serialNo = "";

    public $fullText = "";


    public function __construct($fullText)
    {
        $this->fullText = $fullText;
    }

    public function analyze()
    {
        $this->getFatherName();
        $this->getMotherName();
        $this->getName();
        $this->getFamilyName();
        $this->getBirthDate();
        $this->getIdNo();
        $this->getSerialNo();
    }

    abstract protected function getFatherName();

    abstract protected function getMotherName();

    abstract protected function getName();

    abstract protected function getFamilyName();

    abstract protected function getBirthDate();

    abstract protected function getIdNo();

    abstract protected function getSerialNo();

    protected function extractInfo($pattern)
    {
        $matches = [];
        preg_match($pattern, $this->fullText, $matches);
        return isset($matches[1]) ? trim($matches[1]) : "";
    }
}
