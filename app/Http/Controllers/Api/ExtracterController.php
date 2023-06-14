<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetUserInfoRequest;
use App\Http\Requests\OcrImageRequest;
use App\Http\Resources\UserInformationResource;
use App\Http\Services\Module1;
use App\Http\Services\Module2;
use App\Models\UserInformation;
use thiagoalessio\TesseractOCR\TesseractOCR;


class ExtracterController extends Controller
{
    public $module = null;
    public $model = null;


    public function extract(OcrImageRequest $request)
    {
        try {
            $fullText = (new TesseractOCR($request->image))
                        ->lang('eng', 'tur', 'ara')
                        ->run();

            switch ($request->module) {
                case '2':
                    $this->module = new Module2($fullText);
                    break;
                default:
                    $this->module = new Module1($fullText);
                    break;
            }

            $this->module->analyze();

            if (isset($request->id)) {
                $this->updateInformation($request->id);
            } else {
                $this->saveInformation();
            }
        } catch (\Throwable $th) {
            return response()->json([
                "status" =>  false,
                "error"   =>  $this->getSimpleErrorMsg($th)
            ]);
        }

        return response()->json([
            "status" =>  true,
            "data"   =>  new UserInformationResource($this->model)
        ]);
    }

    public function enquiry(GetUserInfoRequest $request)
    {
        $result = UserInformation::where('identity_no', $request->identity_id)->first();

        if ($result) {
            return response()->json([
                "status" =>  true,
                "data"   =>  new UserInformationResource($result)
            ]);
        } else {
            return response()->json([
                "status" =>  false,
                "data"   =>  null
            ]);
        }
    }

    protected function saveInformation()
    {
        $this->model = new UserInformation();

        $this->model->father_name    =    $this->module->fatherName;
        $this->model->mother_name    =    $this->module->motherName;
        $this->model->family_name    =    $this->module->familyName;
        $this->model->name           =    $this->module->Name;
        $this->model->birth_date     =    $this->module->date;
        $this->model->identity_no    =    strlen($this->module->idNo) > 0 ? $this->module->idNo : null;
        $this->model->serial_no      =    strlen($this->module->serialNo) > 0 ? $this->module->serialNo : null;
        $this->model->save();
    }

    protected function updateInformation($id)
    {
        $this->model = UserInformation::find($id);

        if ($this->module->fatherName) {
            $this->model->father_name = $this->module->fatherName;
        }

        if ($this->module->motherName) {
            $this->model->mother_name = $this->module->motherName;
        }

        if ($this->module->familyName) {
            $this->model->family_name = $this->module->familyName;
        }

        if ($this->module->Name) {
            $this->model->Name = $this->module->Name;
        }

        if ($this->module->date) {
            $this->model->birth_date = $this->module->date;
        }

        if ($this->module->idNo) {
            $this->model->identity_no = $this->module->idNo;
        }

        if ($this->module->serialNo) {
            $this->model->serial_no = $this->module->serialNo;
        }

        $this->model->save();
    }

    protected function getSimpleErrorMsg($th)
    {
        return preg_match("/1062 Duplicate entry/", $th->getMessage()) ? "Client already exists" : $th->getMessage();
    }
}
