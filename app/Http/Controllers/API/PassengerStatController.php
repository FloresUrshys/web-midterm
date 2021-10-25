<?php


namespace App\Http\Controllers\API;


use Illuminate\Routing\Controller;
use App\Models\PassengerStat;

class PassengerStatController extends Controller
{
    public function index()
    {
        $stats = PassengerStat::all();

        return response()->json(['stats'=>$stats],200);
    }
}
