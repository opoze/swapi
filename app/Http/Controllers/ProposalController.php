<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;
use App\Config;
use App\Http\Requests\StoreProposalRequest;
use App\Http\Requests\UpdateProposalRequest;
use App\Http\Requests\UpdateProposalTimeRequest;
use App\Http\Requests\UpdateProposalStatusRequest;
use Carbon\Carbon;
use \Response;

class ProposalController extends Controller
{

    public function getProposalTime() {
      return Config::find(1);
    }

    public function updateProposalTime(UpdateProposalTimeRequest $r) {
      try{
        $config = Config::find(1);
        $config->proposaltime = $r->get('proposaltime');
        $config->save();
      }
      catch(\Exception $e){
        return response()->json($e, 422);
      }
      return response()->json(true, 200);
    }

    public function index($id) {
      $proposals = Proposal::with('category', 'suplier', 'statuses')
      ->where('suplier', '=', $id)
      ->get();

      $ps=[];
      foreach ($proposals as $key => $proposal) {
        if(count($proposal->statuses) > 0){
          $proposal->status = $proposal->statuses[0];
        }
        else{
          $proposal->status = null;
        }
        unset($proposal->statuses);
        $ps[] = $proposal;
      }

      return response()->json($ps, 200);
    }

    public function getProposalStatusHistory($id){
      // @TODO: adicionar usuário
      $proposal = Proposal::with('statuses')->find($id);
      return response()->json($proposal->statuses, 200);
    }

    public function show($id) {
      $proposal = Proposal::with('category', 'suplier', 'statuses')
      ->find($id);

      $ps = null;
      if(!is_null($proposal)){
        if(count($proposal->statuses) > 0){
          $proposal->status = $proposal->statuses[0];
        }
        else{
          $proposal->status = null;
        }
        unset($proposal->statuses);
        $ps = $proposal;
      }

      return response()->json($ps, 200);

    }

    public function store(StoreProposalRequest $r) {
      try{
        $date = Carbon::now();
        $date = $date->format('Y-m-d H:i:s');
        $proposal = new Proposal();
        $proposal->name = $r->get('name');
        $proposal->category = $r->get('category');
        $proposal->suplier = $r->get('suplier');
        $proposal->value = $r->get('value');
        $proposal->description = $r->get('description');
        $proposal->save();
      }
      catch(\Exception $e){
        return response()->json($e, 422);
      }
      return response()->json(true, 200);
    }

    public function updateProposalStatusHistory($id, UpdateProposalStatusRequest $r) {
      try{

        $date = Carbon::now();
        $date = $date->format('Y-m-d H:i:s');
        $proposal = Proposal::with('statuses')->find($id);

        if(!is_null($proposal)){

          $firstStatus = '';
          if($proposal->statuses->count() > 0){
            $firstStatus = $proposal->statuses[0]->status;
          }

          // { id: '1', name: 'Analista De Compras'},
          // { id: '2', name: 'Analista Financeiro'},
          // { id: '3', name: 'Diretor Financeiro'}

          //  @TODO: simulando perfil de usuário
          $userPerfil = 1; //2 ou 3
          $userId = 1; //2 ou 3
          $st = $r->get('status');

          if($st == 'A' && $proposal->value >= 20000){
            if($userPerfil != 3){
              $st = 'PD';
            }
          }

            if($st != $firstStatus){
            $proposal->statuses()->create([
              'status' => $st,
              'user' => $userId,
              'created_at' => $date
            ]);
          }

        }
      }
      catch(\Exception $e){
        return Response::json($e, 422);
      }

      $proposal = Proposal::with('statuses')->find($id);
      return response()->json($proposal->statuses, 200);
    }

    // public function update($id, UpdateProposalRequest $r) {
    //   try{
    //     $date = Carbon::createFromFormat('d/m/Y', $r->get('birth_date'));
    //     $date = $date->format('Y-m-d H:i:s');
    //     $proposal = Proposal::find($id);
    //     if(!is_null($user)){
    //       $proposal->name = $r->get('name');
    //       $proposal->category = $r->get('category');
    //       $proposal->suplier = $r-.get('suplier');
    //       $proposal->value = $r->get('value');
    //       $proposal->status = null;
    //       $proposal->file = null;
    //       $proposal->save();
    //
    //     }
    //   }
    //   catch(\Exception $e){
    //     return Response::json($e, 422);
    //   }
    //   return Response::json(true, 200);
    // }
    //
    // public function destroy($id) {
    //   try {
    //     $proposal = Proposal::find($id);
    //     if(!is_null($proposal)){
    //       $proposal->delete();
    //       return response()->json(true);
    //     }
    //     return response()->json(false);
    //   } catch (\Exception $e) {
    //     return response()->json(false, 422);
    //   }
    //   return response()->json(true, 200);
    // }
    //
    // public function search($term){
    //   $proposals = Proposal::where('name', 'ILIKE', '%' . strtolower($term) . '%')->get();
    //   return response()->json($proposals, 200);
    // }

}
