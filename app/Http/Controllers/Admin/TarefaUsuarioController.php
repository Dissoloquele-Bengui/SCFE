<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Logger;
use App\Models\Tarefa;
use App\Models\User;
use App\Models\Tarefa_user;
use Illuminate\Http\Request;

class TarefaUsuarioController extends Controller
{
    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }

    public function index(){
        $dados['users'] = User::all();
        $dados['tarefas'] = Tarefa::all();
        $dados['tarefa_user'] = Tarefa_user::join('users', 'tarefa_user.it_id_usuario', '=', 'users.id')
        ->select('tarefa_user.*', 'users.vc_nome as nome_usuario')
        ->get();

        $dados['tarefa_user_t'] = Tarefa_user::join('tarefas', 'tarefa_user.it_id_tarefa', '=', 'tarefas.id')
        ->select('tarefa_user.*', 'tarefas.vc_nome as nome_tarefa')
        ->get();

        $this->loggerData("Listou o Tarefa");

        return view('admin.tarefa_Usuario.index', $dados);

    }



    public function create(){

        return view('admin.tarefa_Usuario.create.index');
    }

    public function store(Request $request){
        $request->validate([
            'it_id_usuario'=>'required',
            'it_id_tarefa'=>'required',
            'dt_data_inicio'=>'required',


        ],[
            'it_id_usuario.required'=>'O nome é um campo obrigatório',


        ]);
        //dd($request);
        @dd($request);
        try{
            $tarefauser=Tarefa_user::create([
                'it_id_usuario'=>$request->it_id_usuario,
                'it_id_tarefa'=>$request->it_id_tarefa,
                'it_data_atribuicao'=>$request->it_data_atribuicao,



            ]);

             $this->loggerData(" Cadastrou o tarefa " . $request->it_id_usuario);

            return redirect()->back()->with('tarefa_Usuario.create.success',1);

         } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('tarefa_Usuario.create.error',1);
        }


     }

     public function show(int $id)
     {
         //
     }

     public function edit(int $id)
     {
         //
         $dados["tarefa__usuarios"] = Tarefa_user::find($id);

         return view('admin.tarefa_Usuario.edit.index',$dados);
     }
     public function update(Request $request, int $id)
     {
        $request->validate([
            'it_id_usuario'=>'required',
            'it_id_tarefa'=>'required',
            'dt_data_inicio'=>'required',
        ],[
            'it_id_usuario.required'=>'O nome é um campo obrigatório',

        ]);
          try {
             //code...
             $tarefauser = Tarefa_user::find($id);

             $c =Tarefa_user::findOrFail($id)->update([
                'it_id_usuario'=>$request->it_id_usuario,
                'it_id_tarefa'=>$request->it_id_tarefa,
                'it_data_atribuicao'=>$request->it_data_atribuicao,

             ]);
            $this->loggerData("Editou o projecto que possui o id $tarefauser->id  e nome  $tarefauser->it_id_usuario");
             return redirect()->back()->with('tarefa_Usuario.update.success',1);
          } catch (\Throwable $th) {
             return redirect()->back()->with('tarefa_Usuario.update.error',1);
          }
     }

     public function destroy(int $id)
     {
         //
         try {
             //code...
             $tarefauser =Tarefa_user::findOrFail( $id);

             Tarefa_user::findOrFail($id)->delete();
             $this->loggerData(" Eliminou o projecto , ($tarefauser->it_id_usuario)");
             return redirect()->back()->with('tarefa_Usuario.destroy.success',1);
         } catch (\Throwable $th) {
             //throw $th;
             return redirect()->back()->with('tarefa_Usuario.destroy.error',1);
         }
     }
     public function purge(int $id)
     {
         //
         try {
             //code...
             $tarefauser = Tarefa_user::findOrFail($id);
             Tarefa_user::findOrFail($id)->forceDelete();
             $this->loggerData(" Purgou o projecto  ($tarefauser->it_id_usuario)");
             return redirect()->back()->with('tarefa_Usuario.purge.success',1);
         } catch (\Throwable $th) {
             //throw $th;
             return redirect()->back()->with('tarefa_Usuario.purge.error',1);
         }
     }


}
