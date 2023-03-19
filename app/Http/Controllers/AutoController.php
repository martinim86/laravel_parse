<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Auto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class AutoController extends Controller
{
    public function index() {
        // $arrDir = scandir('E:\programs\xamp\htdocs\recurly\test_task'); # где /home/ это путь к папке
        $arrDir = scandir('img'); 
        foreach($arrDir as $element) { #Перебираем файлы
        if(preg_match('/.json/',$element)) { 
            $json = json_decode(file_get_contents('E:\programs\xamp\htdocs\test_task/'.$element), true);
            $auto = new Auto();
            $auto->year = Carbon::createFromFormat('Y', $json['Year'])->format('Y-m-d');
            $auto->make = $json['Make'];
            $auto->model = $json['Model'];
            $auto->image = $json['Image'];
            // $auto->save();
            // echo '<pre>'; print_r($json); echo '</pre>';
        }
        }
        $posts = Post::all();
        $autos = Auto::select('make') ->groupBy('make')->get();
        return view('auto.index', ['posts' => $posts, 'autos' => $autos]);
    }
    public function makes(Request $request) {
        $autos = Auto::where('make', $request->id)->inRandomOrder()->limit(2)->get();
        if($request->id2){
            $counts = Auto::find($request->id2);
            // echo($counts->count);
            $a = $counts->count + 1;
            $counts->count =$a;
            $counts->update();
        }
        
            
        // $post->count = $request->input('excerpt');

               
        // $autos = Auto::select('make')->where('id', 'make')->get();
        
        return view('auto.make', [ 'autos' => $autos]);
    }
    public function stat(Request $request) {
        // SELECT `make`, sum(count) FROM `autos` GROUP BY `make`;
        $autos = Auto::select('make')->groupBy('make')->get();
        // $autos_group_model = DB::table('autos')
        // ->select('make', 'model',DB::raw('SUM(count) as total_field_name'))
        // ->groupBy('make', 'model')
        // ->get();
        // $auto_dates = Auto::all();
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
