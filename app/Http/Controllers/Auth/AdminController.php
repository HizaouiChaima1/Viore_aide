<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Models\Commands;
use Illuminate\Support\Str;
use App\Http\Requests\Request;
class AdminController extends Controller
{ 
 
    //public function log(Request $request)
    //{
        //$cmds = Commands::all();
       // foreach ($cmds as $command) {
           // $command->randomId = Str::random(7);
       // }
       // $request->validate([
        //    'email' => 'required|email',
        //    'password' => 'required|string',
        //]);
       // $credentials = $request->only('email', 'password'); 
        // Trouver l'administrateur par son email
      //  $admin = Admin::where('email', $credentials['email'])->first();
       // return view('admin.ordres', compact('cmds'));      
   // }
}