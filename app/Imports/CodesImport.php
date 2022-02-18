<?php

namespace App\Imports;

use App\Models\Code;
use Maatwebsite\Excel\Concerns\ToModel;

class CodesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Code([
            'name'=>$row[0],
            'family'=>$row[1],
            'code'=>$row[2],
        ]);
        alert()->success('ok');
        return back();
    }
}
