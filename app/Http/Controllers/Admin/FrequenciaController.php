<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frequencia;
use App\Models\Logger;
use App\Models\User;
use Illuminate\Http\Request;

class FrequenciaController extends Controller
{
    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }

    public function index(){
        $dados['users']=User::all();
        $dados['frequencias']= Frequencia::join('users','frequencias.it_id_usuario', '=','users.id')
        ->select('frequencias.*','users.vc_nome as nome_users')
        ->get();


        $this->loggerData("Listou a frequência");

        return view('admin.frequencia.index', $dados);

    }



    public function create(){

        return view('admin.frequencia.create.index');
    }

    public function store(Request $request){

        $request->validate([
            'dt_data'=>'required',
            'tm_hora_entrada'=>'required',
            'tm_hora_saida'=>'required',
            'it_id_usuario'=>'required',
            'vc_tipo'=>'required',

        ],[
            'dt_data.required'=>'Este campo é obrigatório',


        ]);
// dd($request);

        try{
            $frequencia=Frequencia::create([
                'dt_data'=>$request->dt_data,
                'tm_hora_entrada'=>$request->tm_hora_entrada,
                'tm_hora_saida'=>$request->tm_hora_saida,
                'it_id_usuario'=>$request->it_id_usuario,
                'vc_tipo'=>$request->vc_tipo,


            ]);

             $this->loggerData(" Registrou a sua frequêcia" . $request->it_id_usuario);

            return redirect()->back()->with('frequencia.create.success',1);

         } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('frequencia.create.error',1);
        }


     }

     public function show(int $id)
     {
         //
     }

     public function edit(int $id)
     {
         //
         $dados["frequencias"] = Frequencia::find($id);

         return view('admin.frequencia.edit.index',$dados);
     }
     public function update(Request $request, int $id)
     {
        $request->validate([
            'dt_data'=>'required',
            'tm_hora_entrada'=>'required',
            'tm_hora_saida'=>'required',
            'it_id_usuario'=>'required',
            'vc_tipo'=>'required',

        ],[
            'it_id_usuario.required'=>'Este campo é obrigatório',

        ]);
          try {
             //code...
             $frequencia = Frequencia::find($id);

             $c =Frequencia::findOrFail($id)->update([
                'dt_data'=>$request->dt_data,
                'tm_hora_entrada'=>$request->tm_hora_entrada,
                'tm_hora_saida'=>$request->tm_hora_saida,
                'it_id_usuario'=>$request->it_id_usuario,
                'vc_tipo'=>$request->vc_tipo,

             ]);
            $this->loggerData("Editou o dados que possui o id $frequencia->id  e nome  $frequencia->vc_nome");
             return redirect()->back()->with('frequencia.update.success',1);
          } catch (\Throwable $th) {
             return redirect()->back()->with('frequencia.update.error',1);
          }
     }

     public function destroy(int $id)
     {
         //
         try {
             //code...
             $frequencia =Frequencia::findOrFail( $id);

             Frequencia::findOrFail($id)->delete();
             $this->loggerData(" Eliminou o Frequencia , ($frequencia ->it_id_usuario)");
             return redirect()->back()->with('frequencia.destroy.success',1);
         } catch (\Throwable $th) {
             //throw $th;
             return redirect()->back()->with('frequencia.destroy.error',1);
         }
     }
     public function purge(int $id)
     {
         //
         try {
             //code...
             $frequencia = Frequencia::findOrFail($id);
             Frequencia::findOrFail($id)->forceDelete();
             $this->loggerData(" Purgou a frequencia  ($frequencia->vc_nome)");
             return redirect()->back()->with('frequencia.purge.success',1);
         } catch (\Throwable $th) {
             //throw $th;
             return redirect()->back()->with('frequencia.purge.error',1);
         }
     }

}
