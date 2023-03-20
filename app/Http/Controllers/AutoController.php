<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class AutoController extends Controller
{
    public function index(Request $request) {
        if ((isset($request->downloads)) ) {
            $arrDir = scandir('img'); 
            foreach($arrDir as $element) { 
            if(preg_match('/.json/',$element)) { 
                $json = json_decode(file_get_contents('E:\programs\xamp\htdocs\test_task/'.$element), true);
                $auto = new Auto();
                try {
                    $auto->year = Carbon::createFromFormat('Y', $json['Year'])->format('Y-1-1');
                    $auto->make = $json['Make'];
                    $auto->model = $json['Model'];
                    $auto->image = $json['Image'];
                    $auto->save();
                } catch (Exception $e) {
                    echo 'Ошибка сохранения: ',  $e->getMessage(), "\n";
                }
                }
            }
        }
        $autos = Auto::select('make') ->groupBy('make')->get();
        return view('auto.index', ['autos' => $autos]);
    }
    public function makes(Request $request) {
        $autos = Auto::where('make', $request->id)->inRandomOrder()->limit(2)->get();
        if($request->id2){
            $counts = Auto::find($request->id2);
            $a = $counts->count + 1;
            $counts->count =$a;
            $counts->update();
        }
        
        return view('auto.make', [ 'autos' => $autos]);
    }
    public function stat(Request $request) {
        $autos = Auto::select('make')->groupBy('make')->get();
        $auto_dates = 0;
        $autos_group_model = 0;
        if ($request->isMethod('post')) {
            if($request->has('camera_video')){
                $auto_dates = Auto::
                whereIn('make',$request->input('camera_video'))
                ->whereBetween('year', [$request->input('from'), $request->input('to')]) 
                ->get();
                $autos_group_model = DB::table('autos')
                ->select('make', 'model',DB::raw('SUM(count) as total_field_name'))
                ->whereIn('make',$request->input('camera_video'))
                ->whereBetween('year', [$request->input('from'), $request->input('to')]) 
                ->groupBy('make', 'model')
                ->get();
            } 
        }
        return view('auto.stat', [ 'autos' => $autos,  'auto_dates' => $auto_dates,  'autos_group_model' => $autos_group_model]);
    }
}
