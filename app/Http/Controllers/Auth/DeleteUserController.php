<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteUserController extends Controller
{
    public function delete(Request $request){
        $request->user()->delete();
        return View('setting.delete-confirmation');
    }
}
