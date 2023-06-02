<?php
use Illuminate\Support\Facades\Storage;
function slug($string, $separator = '-') {
    if (is_null($string)) {
        return "";
    }
    $string = trim($string);
    $string = mb_strtolower($string, "UTF-8");;
    $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);
    $string = preg_replace("/[\s-]+/", " ", $string);
    $string = preg_replace("/[\s_]/", $separator, $string);
    return $string;
}

function activeGuard(){
    foreach(array_keys(config('auth.guards')) as $guard){
        if(auth()->guard($guard)->check()) return $guard;
    }
    return null;
    }

    function store_file($file,$path)
{
    $name = time().$file->getClientOriginalName();
    return $value = $file->storeAs($path, $name, 'public');
}
function delete_file($file)
{
    if(Storage::disk('public')->exists($file)){
        unlink('storage/'.$file);
    }
}
function display_file($name)
{
    return asset('storage').'/'.$name;
}

