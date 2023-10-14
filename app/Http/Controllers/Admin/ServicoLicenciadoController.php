<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ServicoLicenciado;
use App\Models\Logger;
use Illuminate\Http\Request;

class ServicoLicenciadoController extends Controller
{


       public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }



    public function index(){
        $data['servico_licenciados']=ServicoLicenciado::all();
        $this->loggerData("Listou Serviços Licenciados");
        return view('admin.servico_licenciado.index', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request){

        try{
            $servico_licenciado=ServicoLicenciado::create([
                'vc_servico'=>$request->vc_servico,
            ]);

             $this->loggerData(" Cadastrou Servico Licenciado " . $request->vc_servico);
            
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
             $servico_licenciado = ServicoLicenciado::find($id);

             ServicoLicenciado::findOrFail($id)->update([
                'vc_servico'=>$request->vc_servico,
             ]);
            
            $this->loggerData("Editou o serviço $servico_licenciado->vc_servico");
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
            $servico_licenciado =ServicoLicenciado::findOrFail( $id);

            ServicoLicenciado::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o serviço , ($servico_licenciado->vc_servico)");
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
            $servico_licenciado = ServicoLicenciado::findOrFail($id);
            ServicoLicenciado::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou o serviço , ($servico_licenciado->vc_servico)");
            return redirect()->back()->with('success', ['status' => '1', 'sms' => 'Purgou com sucesso']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', ['status' => '1', 'sms' => 'Erro ao purgar']);
        }
    }


}
