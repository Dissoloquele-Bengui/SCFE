<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\Logger;
use Illuminate\Http\Request;

class EmailController extends Controller
{


       public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }



    public function index(){
        $data['emails']=Email::all();
        $this->loggerData("Listou Pontos Focais");
        return view('admin.email.index', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request){

        try{
            $email=Email::create([
                'vc_email'=>$request->vc_email,
            ]);

             $this->loggerData(" Cadastrou Email " . $request->vc_email);

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
             $email = Email::find($id);

             Email::findOrFail($id)->update([
                'vc_email'=>$request->vc_email,
             ]);
            
            $this->loggerData("Editou o email que possui o id $email->id  e email  $email->email");
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
            $email =Email::findOrFail( $id);

            Email::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o email , ($email->vc_email)");
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
            $email = Email::findOrFail($id);
            Email::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou o email , ($email->vc_email)");
            return redirect()->back()->with('success', ['status' => '1', 'sms' => 'Purgou com sucesso']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', ['status' => '1', 'sms' => 'Erro ao purgar']);
        }
    }


}
