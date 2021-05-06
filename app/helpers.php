<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

if(!function_exists('isAdminRequest')){
    function isAdminRequest(Request $request = null){
        if($request === null) $request = request();

        return Str::startsWith(
            $request->route()->action['as'] ?? '',
            RouteServiceProvider::NAME_ADMIN
        );
    }
}
