<?php

namespace App\Http\Controllers;
use App\Http\Models\Events; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
 

class EventsController extends Controller
{
    //Para mostrar a tela adm
    public function ShowAdm() 
    {
        return view('homeAdm');
    }

    //Para mostrar tela de cadastro
    public function ShowRegisterEvent() 
    {
        return view('registerEvent');
    }

    //Para salvar os registro na tabela events
    public function RegisterEvent() 
    {
        $registers = $request->Validator([
            'nameEvent'=>'string|required',
            'dateEvent'=>'date|required',
            'locationEvent'=>'string|required',
            'imageEvent'=>'string|required'
        ]);

        Events::create($registers);
        return Redirect::route('routeHomeAdm');
    }

    //Para apagar os registros na tabela de eventos
    public function DeleteEvent(Events  $id) 
    {
        $id->delete();
        return Redirect::route('routeHomeAdm');
    }

    //Para alterar os registros na tebela de eventos
    public function ChangeEvente(Events $id, Request $request) 
    {
        $registers = $request->Validator([
            'nameEvent'=>'string|required',
            'dateEvent'=>'date|required',
            'locationEvent'=>'string|required',
            'imageEvent'=>'string|required'
        ]);

        $id->fill($registers);
        $id->save($registers);

        return Redirect::route('routeHomeAdm');
    }

    //Para mostrar somente os eventos por codigo
    public function ShowIdEvent(Events $id)
    {
        return view('changEvent', ['registerEvent'=>$id]);
    }

    //Para buscar os eventos por nome
    public function ShowEventName(Resquest $resquest)
    {
        $registers = Events::query();
        $registers->when($request->nameEvent, function($query, $value) {
            $query->where('nameEvent', 'like', '%'.$valor.'%');
        });

        $allRegisters = $registers->get();
        return view('listEvents', ['registerEvent'=>$allRegisters]);
    }
}
