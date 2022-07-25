<?php

namespace App\Actions\Arquivo;
 
use App\Arquivo;
use App\Actions\Arquivo\DestroyFile;

class ExcluirArquivo 
{
    private $destroyFile;

    public function __construct(DestroyFile $destroyFile )
    {
        $this->destroyFile = $destroyFile;
    }

    public function destroyGaleria($ref){
        $galeria        = Arquivo::where('ref', $ref);
        $listaArquivos  = $galeria->pluck('arquivo');
        foreach($listaArquivos as $img){
            $this->destroyFile->destroy($img);
        }
       
    }
    
}

?>