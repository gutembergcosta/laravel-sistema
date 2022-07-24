<?php

namespace App\Actions\Tabela;
 
use App\Tabela;
 
class DataFormTabela
{
    public function getData($action, $id = null)
    {
        $item = ($action ==  'edit') ? Tabela::find($id) : '';

        $img  = ($action ==  'edit') ? $item->arquivos->where('tipo', 'tabela')->last() : '';
        $ref  = ($action ==  'edit') ? $item->ref : uniqid();

        $data['ref']            = $ref;
        $data['actionForm']     = 'admin/salvar-tabela';
        $data['item']           = $item ;
        $data['img']            = $img;
        $data['action']         = $action;
        $data['arquivoDestaque']    = ['ref' => $ref, 'img' => $img, 'tipo' => 'tabela','titulo' => 'Tabela'];
    
        return $data;
    
    }
}

?>