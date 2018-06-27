<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\LoginRequest;
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
        $user->password = bcrypt($r->get('password'));
        $user->email = $r->get('email');
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


    public function authenticate(LoginRequest $r){
      try{
        $user = User::where('email', $r->get('login'))->first();
        if(!is_null($user)){
          //Hash on liber é MD5
          if(\Hash::check($r->get('password'), $user->password)){
            $apikey = base64_encode(str_random(40));
            $user->update(['token' => $apikey]);
            return response()->json([
              'token' => 'Bearer ' . $apikey,
              'name' => $user->name,
              'perfil' => $user->perfil
            ], 200);
          }
        }
        return response()->json( ['token' => null], 401 );
      }
      catch(\Exception $e){
        return response()->json( ['token' => null], 422 );
      }
    }

}
