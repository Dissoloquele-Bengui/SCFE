<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frequencia;
use App\Models\Logger;
use App\Models\Justificativa;
use Illuminate\Http\Request;

class JustificativaController extends Controller
{
    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }

    public function index(){
        $dados['frequencias']=Frequencia::all();
        $dados['justificativas']= Justificativa::join('frequencias','justificativas.it_id_frequencia', '=','frequencias.id')
        ->select('justificativas.*','frequencias.id as id_justificativas')
        ->get();


        $this->loggerData("Listou a Justificativa de falta");

        return view('admin.justificativa.index', $dados);

    }



    public function create(){

        return view('admin.justificativa.create.index');
    }

    public function store(Request $request){

        $request->validate([

            'it_id_frequencia'=>'required',
            'vc_descricao'=>'required',

        ],[
            'vc_descricao.required'=>'Este campo é obrigatório',


        ]);
// dd($request);

        try{
            $justificativa=Justificativa::create([

                'it_id_frequencia'=>$request->it_id_frequencia,
                'vc_descricao'=>$request->vc_descricao,


            ]);

             $this->loggerData(" Registrou a sua frequêcia" . $request->it_id_frequencia);

            return redirect()->back()->with('justificativa.create.success',1);

         } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('justificativa.create.error',1);
        }


     }

     public function show(int $id)
     {
         //
     }

     public function edit(int $id)
     {
         //
         $dados["justificativas"] = Justificativa::find($id);

         return view('admin.justificativa.edit.index',$dados);
     }
     public function update(Request $request, int $id)
     {
        $request->validate([

            'it_id_frequencia'=>'required',
            'vc_descricao'=>'required',

        ],[
            'vc_descricao.required'=>'Este campo é obrigatório',

        ]);
          try {
             //code...
             $justificativa = Justificativa::find($id);

             $c =Justificativa::findOrFail($id)->update([

                'it_id_frequencia'=>$request->it_id_frequencia,
                'vc_descricao'=>$request->vc_descricao,

             ]);
            $this->loggerData("Editou o dados que possui o id $justificativa->id ");
             return redirect()->back()->with('justificativa.update.success',1);
          } catch (\Throwable $th) {
             return redirect()->back()->with('justificativa.update.error',1);
          }
     }

     public function destroy(int $id)
     {
         //
         try {
             //code...
             $frequencia =Frequencia::findOrFail( $id);

             Frequencia::findOrFail($id)->delete();
             $this->loggerData(" Eliminou o Frequencia , ($frequencia ->id)");
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
             $justificativa = Justificativa::findOrFail($id);
             Justificativa::findOrFail($id)->forceDelete();
             $this->loggerData(" Purgou a justificativa  ($justificativa->id)");
             return redirect()->back()->with('justificativa.purge.success',1);
         } catch (\Throwable $th) {
             //throw $th;
             return redirect()->back()->with('justificativa.purge.error',1);
         }
     }
}
