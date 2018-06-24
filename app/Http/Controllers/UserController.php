<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Carbon\Carbon;
use \Response;

class UserController extends Controller
{

    public function index() {
      return response()->json(User::get(), 200);
    }

    public function show($id) {
      return response()->json(User::find($id));
    }

    public function store(StoreUserRequest $r) {

      try{
        // converte birth date
        $date = Carbon::createFromFormat('d/m/Y', $r->get('birth_date'));
        $date = $date->format('Y-m-d');

        // converte cpf
        $cpf = preg_replace('/\D/', '', $r->get('cpf'));

        $user = new User();
        $user->name = $r->get('name');
        $user->cpf = $cpf;
        $user->birth_date = $date;
        $user->perfil = $r->get('perfil');
        $user->save();
      }
      catch(\Exception $e){
        return response()->json($e, 422);
      }
      return response()->json(true, 200);
    }

    public function update($id, UpdateUserRequest $r) {
      try{

        //converte birth date
        $date = Carbon::createFromFormat('d/m/Y', $r->get('birth_date'));
        $date = $date->format('Y-m-d');
        // converte cpf
        $cpf = preg_replace('/\D/', '', $r->get('cpf'));

        // dd($date);

        $user = User::find($id);
        if(!is_null($user)){
          $user->name = $r->get('name');
          $user->cpf = $cpf;
          $user->birth_date = $date;
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

    public function search($term){
      $users = User::where('name', 'ILIKE', '%' . strtolower($term) . '%')->get();
      return response()->json($users, 200);
    }

}
