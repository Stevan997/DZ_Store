<?php

namespace App\Repositories;

use App\Models\Proizvodi;


class ProizvodiRepository 
{
    public static function pregledProiz($sort = 'JSP', $way='asc'){
        $proizvodi = \App\Proizvodi::orderBy($sort, $way)->get();

        return $proizvodi;
    }

    public static function jedanProizvod($jsp){
        $p = \App\Proizvodi::findOrFail($jsp);

        return $p;
    }


}