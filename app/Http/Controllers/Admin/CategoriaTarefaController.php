<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\categoriaTarefa;
use App\Models\tarefa;

use App\Models\Logger;




class CategoriaTarefaController extends Controller
{
      public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }



    public function index(){
        $data['tarefas']=tarefa::all();

        $data['categoria_tarefas']=categoriaTarefa::join('tarefas','categoria_tarefas.it_id_nome','=', 'tarefas.id')
        ->select('categoria_tarefas.*','tarefas.vc_nome as nome_categoria_tarefas')
        ->get();
        $this->loggerData("Listou  Categorias Tarefas");

        return view('admin.categoriaTarefa.index', $data);

    }



    public function create(){


        return view('admin.categoriaTarefa.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request){
        $request->validate([
            'it_id_nome'=>'required',
            'dt_descricao'=>'required',
            'vc_prioridade'=>'required',
            'it_tempo_estimado'=>'required',
            'vc_tipo'=>'required',




        ],[
            'it_id_nome.required'=>'O nome é um campo obrigatório',




        ]);
        //dd($request);
        try{
            $categoriaTarefa=categoriaTarefa::create([
                'it_id_nome'=>$request->it_id_nome,
                'dt_descricao'=>$request->dt_descricao,
                'vc_prioridade'=>$request->vc_prioridade,
                'it_tempo_estimado'=>$request->it_tempo_estimado,
                'vc_tipo'=>$request->vc_tipo,




            ]);

             $this->loggerData(" Cadastrou a categoria tarefa " . $request->it_id_nome);



            return redirect()->back()->with('categoriaTarefa.create.success',1);

         } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('categoriaTarefa.create.error',1);
        }


     }


      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    public function edit(int $id)
    {
        //
        $data["categoriaTarefa"] = categoriaTarefa::find($id);

        return view('admin.categoriaTarefa.edit.index',$data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



     public function update(Request $request, int $id)
     {
        $request->validate([
            'it_id_nome'=>'required',
            'dt_descricao'=>'required',
            'vc_prioridade'=>'required',
            'it_tempo_estimado'=>'required',
            'vc_tipo'=>'required',


        ],[
            'it_id_nome.required'=>'O nome é um campo obrigatório',



        ]);
          try {
             //code...
             $categoriaTarefa = categoriaTarefa::find($id);

             $c =categoriaTarefa::findOrFail($id)->update([
                'it_id_nome'=>$request->it_id_nome,
                'dt_descricao'=>$request->dt_descricao,
                'vc_prioridade'=>$request->vc_prioridade,
                'it_tempo_estimado'=>$request->it_tempo_estimado,
                'vc_tipo'=>$request->vc_tipo,



             ]);
            $this->loggerData("Editou a tarefa que possui o id $categoriaTarefa->id  e nome  $categoriaTarefa->it_id_nome");


             return redirect()->back()->with('categoriaTarefa.update.success',1);
          } catch (\Throwable $th) {
             return redirect()->back()->with('categoriaTarefa.update.error',1);
          }
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        try {
            //code...
            $categoriaTarefa =categoriaTarefa::findOrFail( $id);

            categoriaTarefa::findOrFail($id)->delete();
            $this->loggerData(" Eliminou Categoria Tarefa , ($categoriaTarefa->it_id_nome)");


            return redirect()->back()->with('categoriaTarefa.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('categoriaTarefa.destroy.error',1);
        }
    }

    public function purge(int $id)
    {
        //
        try {
            //code...
            $categoriaTarefa = categoriaTarefa::findOrFail($id);
            categoriaTarefa::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou a Categoria Tarefa  ($categoriaTarefa->it_id_nome)");


            return redirect()->back()->with('categoriaTarefa.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('categoriaTarefa.purge.error',1);
        }
    }

}
