<?php

namespace App\Actions\Tabela;
 
use App\Tabela;
use Illuminate\Http\Request;
 
class SalvarTabela
{
    public function execute(Request $request)
    {
        $frmData['msg']         = 'Item salvo com sucesso';
        $frmData['destino']     = 'reload';
        $request['slug']        = slug($request->nome);

        Tabela::updateOrCreate(['id' => $request->id],$request->all());
 
        return $frmData;
        
    }
}

?>