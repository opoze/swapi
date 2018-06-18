<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreUserRequest;

use \Response;

class UserController extends Controller
{



    public function index() {
      return Response::json(User::get(), 200);
    }

    public function show($id) {
      return response()->json(User::find($id));
    }

    public function store(StoreUserRequest $r) {
      try{
        $user = new User();
        $user->name = $r->get('name');
        $user->cpf = $r->get('cpf');
        $user->birth_date = $r->get('birth_date');
        $user->perfil = $r->get('perfil');
        $user->email = $r->get('email');
        $user->save();
      }
      catch(\Exception $e){
        return response()->json(false, 422);
      }
      return response()->json(true, 200);
    }

    public function update($id, Request $r) {

      dd($r->json());


      try{
        $user = User::find($id);
        if(!is_null($user)){
          $user->name = $r->get('name');
          $user->cpf = $r->get('cpf');
          $user->birth_date = $r->get('birth_date');
          $user->perfil = $r->get('perfil');
          $user->email = $r->get('email');
          $user->save();
        }
      }
      catch(\Exception $e){
        return Response::json($e, 422);
      }
      return Response::json(true, 200);
    }

    public function destroy($id) {
      try {
        $user = User::find($id);
        if(!is_null($user)){
          $user->delete();
          return response()->json(true);
        }
        return response()->json(false);
      } catch (\Exception $e) {
        return response()->json(false, 422);
      }
      return response()->json(true, 200);
    }

    // public function edit() {
    // }
    //
    // public function create() {
    // }
}
