<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Auto;
use Carbon\Carbon;

class PostController extends Controller
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
        return view('posts.index', ['posts' => $posts, 'autos' => $autos]);
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
        
        return view('posts.make', [ 'autos' => $autos]);
    }
}
