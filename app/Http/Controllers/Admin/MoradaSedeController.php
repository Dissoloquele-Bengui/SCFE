<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\MoradaSede;
use App\Models\Logger;
use Illuminate\Http\Request;

class MoradaSedeController extends Controller
{


       public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }



    public function index(){
        $data['morada_sedes']=MoradaSede::all();
        $this->loggerData("Listou Morada sede");
        return view('admin.morada_sede.index', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request){
        try{
            $morada_sede=MoradaSede::create([
                'vc_rua'=>$request->vc_rua,
                'vc_provincia' =>$request->vc_provincia,
                'vc_municipio'=>$request->vc_municipio,
                'vc_bairro' =>$request->vc_bairro,
                'vc_complemento'=>$request->vc_complemento,
            ]);

             $this->loggerData(" Cadastrou morada sede " . $request->vc_rua.", ". $request->vc_bairro.". ". $request->vc_municipio.", ".$request->vc_provincia);

            return redirect()->back()->with('success', ['status' => '1', 'sms' => 'Cadastrado com sucesso']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', ['status' => '1', 'sms' => 'Erro ao cadastrar']);
        }


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
             $morada_sede = MoradaSede::find($id);

             MoradaSede::findOrFail($id)->update([
                'vc_rua'=>$request->vc_rua,
                'vc_provincia' =>$request->vc_provincia,
                'vc_municipio'=>$request->vc_municipio,
                'vc_bairro' =>$request->vc_bairro,
                'vc_complemento'=>$request->vc_complemento,
             ]);
            
            $this->loggerData("Editou morada sede " . $request->vc_rua.", ". $request->vc_bairro.". ". $request->vc_municipio.", ".$request->vc_provincia);
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
            $morada_sede =MoradaSede::findOrFail( $id);

            MoradaSede::findOrFail($id)->delete();
            $this->loggerData(" Eliminou a morada sede , (" . $morada_sede->vc_rua.", ". $morada_sede->vc_bairro.". ". $morada_sede->vc_municipio.", ".$morada_sede->vc_provincia." )");
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
            $morada_sede =MoradaSede::findOrFail( $id);
            MoradaSede::findOrFail($id)->forceDelete();
            $this->loggerData(" Eliminou a morada sede , (" . $morada_sede->vc_rua.", ". $morada_sede->vc_bairro.". ". $morada_sede->vc_municipio.", ".$morada_sede->vc_provincia." )");
            return redirect()->back()->with('success', ['status' => '1', 'sms' => 'Purgou com sucesso']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', ['status' => '1', 'sms' => 'Erro ao purgar']);
        }
    }


}
