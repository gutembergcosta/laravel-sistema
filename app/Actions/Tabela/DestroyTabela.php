<?php

namespace App\Actions\Tabela;
 
use App\Tabela;
use App\Actions\Arquivo\ExcluirArquivo;
 
class DestroyTabela
{

    private $excluirArquivo;

    public function __construct(ExcluirArquivo $excluirArquivo )
    {
        $this->excluirArquivo = $excluirArquivo;
    }

    public function delete($id)
    {
        $data['msg'] = 'Item excluído com sucesso';
 
        $item       = Tabela::find($id);
        $this->excluirArquivo->destroyGaleria($item->ref);
        //$item->delete();

        return $data;
        
    }
}

?>