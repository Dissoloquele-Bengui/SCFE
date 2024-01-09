<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Logger;
use App\Models\Projecto;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ProjectoController extends Controller
{
    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }

    public function index(){
        $dados['usuarios']=Usuario::where('vc_tipo',"Supervisor")->orWhere('vc_tipo',"Coordenador")->get();
        $dados['projectos']= Projecto::join('usuarios','projectos.it_id_usuario', '=','usuarios.id')
        ->select('projectos.*','usuarios.vc_nome as nome_usuario')
        ->get();


        $this->loggerData("Listou o projecto");

        return view('admin.projecto.index', $dados);

    }



    public function create(){

        return view('admin.projecto.create.index');
    }

    public function store(Request $request){
        $request->validate([
            'vc_nome'=>'required',
            'dt_data_inicio'=>'required',
            'dt_data_conclusao'=>'required',
            'it_estado'=>'required',
            'vc_prioridade'=>'required',
            'it_id_usuario'=>'required',

        ],[
            'vc_nome.required'=>'O nome é um campo obrigatório',


        ]);
        //dd($request);
        //@dd($request);
        try{
            $project=Projecto::create([
                'vc_nome'=>$request->vc_nome,
                'dt_data_inicio'=>$request->dt_data_inicio,
                'dt_data_conclusao'=>$request->dt_data_conclusao,
                'it_estado'=>$request->it_estado,
                'vc_prioridade'=>$request->vc_prioridade,
                'it_id_usuario'=>$request->it_id_usuario,


            ]);

             $this->loggerData(" Cadastrou o projecto " . $request->vc_nome);

            return redirect()->back()->with('projecto.create.success',1);

         } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('projecto.create.error',1);
        }


     }

     public function show(int $id)
     {
         //
     }

     public function edit(int $id)
     {
         //
         $dados["projectos"] = Projecto::find($id);

         return view('admin.projecto.edit.index',$dados);
     }
     public function update(Request $request, int $id)
     {
        $request->validate([
            'vc_nome'=>'required',
            'dt_data_inicio'=>'required',
            'dt_data_conclusao'=>'required',
            'it_estado'=>'required',
            'vc_prioridade'=>'required',
            'it_id_usuario'=>'required',

        ],[
            'vc_nome.required'=>'O nome é um campo obrigatório',

        ]);
          try {
             //code...
             $project = Projecto::find($id);

             $c =Projecto::findOrFail($id)->update([
                'vc_nome'=>$request->vc_nome,
                'dt_data_inicio'=>$request->dt_data_inicio,
                'dt_data_conclusao'=>$request->dt_data_conclusao,
                'it_estado'=>$request->it_estado,
                'vc_prioridade'=>$request->vc_prioridade,
                'it_id_usuario'=>$request->it_id_usuario,

             ]);
            $this->loggerData("Editou o projecto que possui o id $project->id  e nome  $project->vc_nome");
             return redirect()->back()->with('projecto.update.success',1);
          } catch (\Throwable $th) {
             return redirect()->back()->with('projecto.update.error',1);
          }
     }

     public function destroy(int $id)
     {
         //
         try {
             //code...
             $project =Projecto::findOrFail( $id);

             Projecto::findOrFail($id)->delete();
             $this->loggerData(" Eliminou o projecto , ($project->vc_nome)");
             return redirect()->back()->with('projecto.destroy.success',1);
         } catch (\Throwable $th) {
             //throw $th;
             return redirect()->back()->with('projecto.destroy.error',1);
         }
     }
     public function purge(int $id)
     {
         //
         try {
             //code...
             $project = Projecto::findOrFail($id);
             Projecto::findOrFail($id)->forceDelete();
             $this->loggerData(" Purgou o projecto  ($project->vc_nome)");
             return redirect()->back()->with('projecto.purge.success',1);
         } catch (\Throwable $th) {
             //throw $th;
             return redirect()->back()->with('projecto.purge.error',1);
         }
     }






}
