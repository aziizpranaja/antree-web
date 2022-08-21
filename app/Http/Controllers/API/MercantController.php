<?php

namespace App\Http\Controllers\API;

use App\Helpers\DateHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Mercant;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MercantController extends Controller
{
    public function getMercant()
    {
        try{
            $mercant = Mercant::all();

            if(is_null($mercant)){
                return ResponseFormatter::error("Data not found!", 404);
            }

            foreach ($mercant as $q) {
                $test1 = ($q->image !== null) ? env('APP_URL') . "/storage/$q->image" : '';
                $q->image = $test1;
            }

            return ResponseFormatter::success([
                $mercant
            ], 'Get Mercant Success');
        }
        catch (Exception $e) {
            $response = [
                'errors' => $e->getMessage(),
            ];
            return ResponseFormatter::error($response, 'Something went wrong', 500);
        }
    }
}
