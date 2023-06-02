<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Resturant;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function home(){
        $offers=Meal::with(['resturant'])->where('discount', '>', '0')->orderBy('count_buy','DESC')->take(5)->get();
        $meals=Meal::with(['resturant'])->where('discount', '=', '0')->orderBy('count_buy','DESC')->take(5)->get();
        $all_resturants=Resturant::all();
        $resturants=$all_resturants->sortBy('rate')->take(5);
        return view('landing',compact('meals','offers','resturants'));
    }

    public function search(Request $request)
    {
        $resturants = Resturant::where('name', 'Like', "%$request->key%")->paginate(10);
        $meals = Meal::where('name', 'Like', "%$request->key%")->where('discount', '=', 0)->paginate(10);
        $offers = Meal::where('name', 'Like', "%$request->key%")->where('discount', '>', 0)->paginate(10);
        $key = $request->key;
        return view('search', compact('resturants', 'meals', 'key', 'offers'));
    }
}
