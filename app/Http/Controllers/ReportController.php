<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use JasperPHP\JasperPHP;

use App\Setor;
use App\Unidade;

use Response;
use Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Validation\Rule;


class ReportController extends Controller
{
/**
     * Reporna um array com os parametros de conexão
     * @return Array
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDatabaseConfig()
    {
        return [
            'driver'   => env('DB_CONNECTION'),
            'host'     => env('DB_HOST'),
            'port'     => env('DB_PORT'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'database' => env('DB_DATABASE'),
            'jdbc_dir' => base_path() . env('JDBC_DIR', '/vendor/lavela/phpjasper/src/JasperStarter/jdbc'),
        ];
    }
    
    public function index(Request $request)
    {

        // receber parametros
       
        $dividir = explode(' ', $request->mes);
        $mes = $dividir[1];
        $whano = $ano = $request->ano;
        $mesano = $mes.'/'.$ano;
        
        $setor = Setor::find($request->setor_id);

        if (isset($setor)) {

            $nomesetor= $setor->setor;
            $wh = $whsfim = $request->setor_id ;  

        } else {

            $nomesetor = 'geral';
            $wh = 0;
            $whsfim = 99999;
        }

        $unidade = Unidade::find($request->unidade_id);

        if (isset($unidade)) {

            $nomeunidade = $unidade->unidade;
            $whu = $whufim = $request->unidade_id ;  

        } else {
            
            $nomeunidade = 'geral';
            $whu = 0;
            $whufim = 99999;
        }          
    
        $whm = mb_strtoupper($dividir[1]);
    
       
     // coloca na variavel o caminho do novo relatório que será gerado
        $output = public_path() . '/reports/' . time() . '_Clientes';
// instancia um novo objeto JasperPHP
         
        $report = new JasperPHP;
// chama o método que irá gerar o relatório
        // passamos por parametro:
        // o arquivo do relatório com seu caminho completo
        // o nome do arquivo que será gerado
        // o tipo de saída
        // parametros ( nesse caso não tem nenhum)         
        $report->process(
            public_path() . '/reports/relpagamento.jrxml',
            $output,
            ['pdf'],
            ['setor'=>$nomesetor , 'unidade'=>$nomeunidade , 'mesano'=> $mesano,
             'wh'=>$wh,'whsfim'=>$whsfim, 'whu'=>$whu, 'whufim'=>$whufim, 'whm'=>$whm,'whano'=>$whano],
            $this->getDatabaseConfig()
        )->execute();
        
        $file = $output . '.pdf';
        $path = $file;
        
        // caso o arquivo não tenha sido gerado retorno um erro 404
        if (!file_exists($file)) {
            abort(404);
        }
//caso tenha sido gerado pego o conteudo
        $file = file_get_contents($file);
//deleto o arquivo gerado, pois iremos mandar o conteudo para o navegador
        unlink($path);
// retornamos o conteudo para o navegador que íra abrir o PDF
        return response($file, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="cismep.pdf"');
     
    }
}