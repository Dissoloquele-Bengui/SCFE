<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CategoriaServico;
use App\Models\Logger;
use Illuminate\Http\Request;

class CategoriaServicoController extends Controller
{


       public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }



    public function index(){
        $data['categoria_servicos']=CategoriaServico::all();
        $this->loggerData("Listou Categoria Serviço");

        return view('admin.categoria_servico.index', $data);

    }



    public function create(){


        return view('admin.categoria_servico.create.index');
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


        ],[
            'vc_nome.required'=>'O nome é um campo obrigatório',


        ]);
        //dd($request);
        try{
            $categoria_servico=CategoriaServico::create([
                'vc_nome'=>$request->vc_nome,


            ]);

             $this->loggerData(" Cadastrou a categoria_servico " . $request->vc_nome);

            return redirect()->back()->with('categoria_servico.create.success',1);

         } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('categoria_servico.create.error',1);
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
        $data["categoria_servico"] = CategoriaServico::find($id);

        return view('admin.categoria_servico.edit.index',$data);
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
        ],[
            'vc_nome.required'=>'O nome é um campo obrigatório',

        ]);
          try {
             //code...
             $categoria_servico = CategoriaServico::find($id);

             $c =CategoriaServico::findOrFail($id)->update([
                'vc_nome'=>$request->vc_nome,

             ]);
            $this->loggerData("Editou a categoria_servico que possui o id $categoria_servico->id  e nome  $categoria_servico->vc_nome");
             return redirect()->back()->with('categoria_servico.update.success',1);
          } catch (\Throwable $th) {
             return redirect()->back()->with('categoria_servico.update.error',1);
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
            $categoria_servico =CategoriaServico::findOrFail( $id);

            CategoriaServico::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o categoria_servico , ($categoria_servico->vc_nome)");
            return redirect()->back()->with('categoria_servico.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('categoria_servico.destroy.error',1);
        }
    }

    public function purge(int $id)
    {
        //
        try {
            //code...
            $categoria_servico = CategoriaServico::findOrFail($id);
            CategoriaServico::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou a categoria_servico  ($categoria_servico->vc_nome)");
            return redirect()->back()->with('categoria_servico.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('categoria_servico.purge.error',1);
        }
    }


}
