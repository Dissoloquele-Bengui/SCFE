<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\MotivoRevogacaoLicenca;
use App\Models\Logger;
use Illuminate\Http\Request;

class MotivoRevogacaoLicencaController extends Controller
{


       public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }



    public function index(){
        $data['motivo_revogacao_licencas']=MotivoRevogacaoLicenca::all();
        $this->loggerData("Listou Motivo revogação licença");
        return view('admin.motivo_regogacao_licenca.index', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request){

        try{
            $motivo_revogacao_licenca=MotivoRevogacaoLicenca::create([
                'vc_descricao'=>$request->vc_descricao,
            ]);

             $this->loggerData(" Revogou licença " . $request->vc_descricao);
            
            return redirect()->back()->with('success', ['status' => '1', 'sms' => 'Submetido com sucesso']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', ['status' => '1', 'sms' => 'Erro ao submeter']);
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
             $motivo_revogacao_licenca = MotivoRevogacaoLicenca::find($id);

             MotivoRevogacaoLicenca::findOrFail($id)->update([
                'vc_descricao'=>$request->vc_descricao,
             ]);
            
            $this->loggerData("Editou revogação $motivo_revogacao_licenca->vc_servico");
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
            $motivo_revogacao_licenca =MotivoRevogacaoLicenca::findOrFail( $id);

            MotivoRevogacaoLicenca::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o serviço , ($motivo_revogacao_licenca->vc_descricao)");
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
            $motivo_revogacao_licenca = MotivoRevogacaoLicenca::findOrFail($id);
            MotivoRevogacaoLicenca::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou o serviço , ($motivo_revogacao_licenca->vc_descricao)");
            return redirect()->back()->with('success', ['status' => '1', 'sms' => 'Purgou com sucesso']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', ['status' => '1', 'sms' => 'Erro ao purgar']);
        }
    }


}
