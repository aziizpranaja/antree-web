<?php

namespace App\Http\Controllers\API;

use App\Helpers\DateHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Mercant;
use Exception;

class QrcodeController extends Controller
{

    public function getQr($mercant_code)
    {
        try {
            $mercant = Mercant::where('mercant_code', '=',  $mercant_code)->first();

            if(is_null($mercant)){
                return ResponseFormatter::error("Data not found!", 404);
            }

            $response = [
                'id' => $mercant->id,
                'user_id' => $mercant->user_id,
                'mercant_name' => $mercant->mercant_name,
                'mercant_code' => $mercant->mercant_code,
                'mercant_email' => $mercant->mercant_email,
                'address' => $mercant->address,
                'phone' => $mercant->phone,
                'attachment_path' => ($mercant->image !== null) ? env('APP_URL') . "/storage/$mercant->image" : $mercant->attachment,
            ];

            return ResponseFormatter::success($response, 'Get Mercant');
        }
        catch (Exception $e) {
            $response = [
                'errors' => $e->getMessage(),
            ];
            return ResponseFormatter::error($response, 'Something went wrong', 500);
        }
    }
}
