<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{

    public function index() {
      return response()->json(User::get());
    }

    public function show($id) {
      return response()->json(User::find($id));
    }

    public function store(StoreUserRequest $r) {
      dd($r->all());
    }

    public function update(Request $r) {
      $user = User::find($id);
      if(!is_null($user)){
        $user->update();
        return response()->json(true);
      }
      return response()->json(false);
    }

    public function destroy() {
      $user = User::find($id);
      if(!is_null($user)){
        $user->delete();
        return response()->json(true);
      }
      return response()->json(false);
    }

    // public function edit() {
    // }
    //
    // public function create() {
    // }
}
