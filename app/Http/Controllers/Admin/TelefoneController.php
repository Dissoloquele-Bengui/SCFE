<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Telefone;
use App\Models\Logger;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{


       public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }



    public function index(){
        $data['telefones']=Telefone::all();
        $this->loggerData("Listou Telefones");

        return view('admin.telefone.index', $data);

    }



    public function create(){


        return view('admin.telefone.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request){

        try{
            $telefone=Telefone::create([
                'vc_numero'=>$request->vc_numero,
            ]);

             $this->loggerData(" Cadastrou telefone " . $request->vc_numero);

            return redirect()->back()->with('success', ['status' => '1', 'sms' => 'Cadastrado com sucesso']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', ['status' => '1', 'sms' => 'Erro ao cadastrar']);
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
        $data["operador"] = Operador::find($id);

        return view('admin.operador.edit.index',$data);
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
       try {
             //code...
             $telefone = Telefone::find($id);

             Telefone::findOrFail($id)->update([
                'vc_numero'=>$request->vc_numero,
             ]);
            
            $this->loggerData("Editou o telefone que possui o id $telefone->id  e nome  $telefone->vc_numero");
            return redirect()->back()->with('success', ['status' => '1', 'sms' => 'Editado com sucesso']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', ['status' => '1', 'sms' => 'Erro ao editar']);
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
            $telefone =Telefone::findOrFail( $id);

            Telefone::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o telefone , ($telefone->vc_numero)");
            return redirect()->back()->with('success', ['status' => '1', 'sms' => 'Eliminado com sucesso']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', ['status' => '1', 'sms' => 'Erro ao eliminar']);
        }
    }

    public function purge(int $id)
    {
        //
        try {
            //code...
            $telefone = Telefone::findOrFail($id);
            Telefone::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou o telefone ($telefone->vc_numero)");
            return redirect()->back()->with('success', ['status' => '1', 'sms' => 'Purgou com sucesso']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', ['status' => '1', 'sms' => 'Erro ao purgar']);
        }
    }


}
