<?php

namespace App\Actions\Arquivo;
 
use App\Arquivo;
use File;
 
class DestroyFile
{
    
    public function destroy($item)
    {
        dd('aki');
        $prefixos = ['mini','max','square','thumb','original'];
        foreach($prefixos as $prefixo){
            $urlFile = 'uploads/'.$prefixo.'-'.$item; 
            if(File::exists(public_path($urlFile))) File::delete(public_path($urlFile));
        }
        Arquivo::where('arquivo', $item)->delete();
    }
    
}

?>