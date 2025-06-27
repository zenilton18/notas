<?php 
namespace App\Services;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Operacoes
{
    public static  function decryptId($id)
    {
      // check if $value is encrypted
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return null;
        }
        return $id; 
    }
}

?>