<?php

namespace App\Http\Controllers;
use App\Models\Account;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
public function store(Request $request)
{
    if ($request->input('type')==='deposito') {
       return $this->deposito(
        $request->input('destino'),
        $request->input('monto')
       );
    }
}

private function deposito($destino, $monto)
{
    $account = Account::firstOrCreate([
        'id'=>$destino
    ]);
    $account->balance += $monto;
    $account->save(); //hace un update

    return response()->json([
                'destino' => [
                    'id'=>$account->id,
                    'balance'=>$account->balance 
                ]
            ], 201);

}

    /*crear una cuenta con un balance inicial
POST /event {"type":"deposito","destino":"100","monto":10 }
201 {"destino":{"id":100,"balance":"20"}}*/
}//end class
