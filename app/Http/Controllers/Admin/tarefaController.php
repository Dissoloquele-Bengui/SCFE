<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tarefa;
use App\Models\Projecto;
use App\Models\Logger;




class tarefaController extends Controller
{
    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }



    public function index(){

        $data['projectos']=Projecto::all();

        $data['tarefas']=tarefa::join('projectos','tarefas.it_id_projecto','=', 'projectos.id')
        ->select('tarefas.*','projectos.dt_data_conclusao as date_projectos')
        ->get();
        
        $this->loggerData("Listou Tarefas");



        return view('admin.tarefa.index', $data);

    }



    public function create(){


        return view('admin.tarefa.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request){
        $request->validate([
            'vc_nome'=>'required',
            'it_id_projecto' =>'required',


        ],[
            'vc_nome.required'=>'O nome é um campo obrigatório',
            'it_id_projecto.required'=>'A data de entrega é um campo obrigatório',




        ]);
        //dd($request);


        try{
            $tarefa=tarefa::create([
                'vc_nome'=>$request->vc_nome,
                'it_id_projecto'=>$request->it_id_projecto,




            ]);

             $this->loggerData(" Cadastrou a tarefa " . $request->vc_nome);




            return redirect()->back()->with('tarefa.create.success',1);

         } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('tarefa.create.error',1);
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
        $data["tarefa"] = tarefa::find($id);

        return view('admin.tarefa.edit.index',$data);
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
            'vc_nome'=>'required',
            'it_id_projecto'=>'required',
        ],[
            'vc_nome.required'=>'O nome é um campo obrigatório',
            'it_id_projecto.required'=>'A data de entrega é um campo obrigatório',



        ]);
          try {
             //code...
             $tarefa = tarefa::find($id);

             $c =tarefa::findOrFail($id)->update([
                'vc_nome'=>$request->vc_nome,
                'it_id_projecto'=>$request->it_id_projecto,



             ]);
            $this->loggerData("Editou a tarefa que possui o id $tarefa->id  e nome  $tarefa->vc_nome");


             return redirect()->back()->with('tarefa.update.success',1);
          } catch (\Throwable $th) {
             return redirect()->back()->with('tarefa.update.error',1);
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
            $tarefa =tarefa::findOrFail( $id);

            tarefa::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o tarefa , ($tarefa->vc_nome)");



            return redirect()->back()->with('tarefa.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('tarefa.destroy.error',1);
        }
    }

    public function purge(int $id)
    {
        //
        try {
            //code...
            $tarefa = tarefa::findOrFail($id);
            tarefa::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou a tarefa  ($tarefa->vc_nome)");



            return redirect()->back()->with('tarefa.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('tarefa.purge.error',1);
        }
    }

}
