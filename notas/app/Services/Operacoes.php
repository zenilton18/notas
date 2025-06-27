<?php 
namespace App\Services;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Operacoes
{
    public static  function decryptId($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $erro) {
            return redirect()->route('home');
        }
        return $id;
    }
}

?>