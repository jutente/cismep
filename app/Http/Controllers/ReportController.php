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
        $setor  = Setor::findOrfail($request->setor_id);
        $unidade  = Unidade::findOrfail($request->unidade_id);
        $dividir = explode(' ', $request->mes);
        $mes = $dividir[1];
        $ano = $request->ano;
        $mesano = $mes.'/'.$ano;
        $wh =  $request->setor_id;
        $whu = $request->unidade_id;
        $whm = $dividir[0];
    
        //.' and u.id = '.$request->unidade_id.' and month(pg.created_at) ='.'02';
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
            ['setor'=>$setor->setor , 'unidade'=>$unidade->unidade , 'mesano'=> $mesano,'wh'=>$wh, 'whu'=>$whu, 'whm'=>$whm],
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