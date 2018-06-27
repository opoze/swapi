<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Suplier;
use App\Http\Requests\StoreSuplierRequest;
use App\Http\Requests\UpdateSuplierRequest;
use \Response;

class SuplierController extends Controller
{

    public function index() {
      return response()->json(Suplier::get(), 200);
    }

    public function show($id) {
      return response()->json(Suplier::find($id));
    }

    public function store(StoreSuplierRequest $r) {
      try{
        $suplier = new Suplier();
        if($r->get('cpf')){
          $cpf = preg_replace('/\D/', '', $r->get('cpf'));
          $suplier->cpf = $cpf;
        }
        if($r->get('cnpj')){
          $cnpj = preg_replace('/\D/', '', $r->get('cnpj'));
          $suplier->cnpj = $cnpj;
        }

        $suplier->name = $r->get('name');
        $suplier->fone = $r->get('fone');
        $suplier->email = $r->get('email');

        $suplier->save();
      }
      catch(\Exception $e){
        return response()->json($e, 422);
      }
      return response()->json(true, 200);
    }

    public function update($id, UpdateSuplierRequest $r) {
      try{
        $suplier = Suplier::find($id);
        if(!is_null($suplier)){
          if($r->get('cpf')){
            $cpf = preg_replace('/\D/', '', $r->get('cpf'));
            $suplier->cpf = $cpf;
            $suplier->cnpj = null;
          }
          else if($r->get('cnpj')){
            $cnpj = preg_replace('/\D/', '', $r->get('cnpj'));
            $suplier->cnpj = $cnpj;
            $suplier->cpf = null;
          }

          $suplier->name = $r->get('name');
          $suplier->fone = $r->get('fone');
          $suplier->email = $r->get('email');

          $suplier->save();
        }
      }
      catch(\Exception $e){
        return Response::json($e, 422);
      }
      return Response::json(true, 200);
    }

    public function search($term){
      $categories = Suplier::where('name', 'ILIKE', '%' . strtolower($term) . '%')->get();
      return response()->json($categories, 200);
    }

    public function destroy($id) {
      try {
        $suplier = Suplier::find($id);
        if(!is_null($suplier)){
          $suplier->delete();
          return response()->json(true);
        }
        return response()->json(false);
      } catch (\Exception $e) {
        return response()->json(false, 422);
      }
      return response()->json(true, 200);
    }

}
