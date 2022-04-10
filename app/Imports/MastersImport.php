<?php

namespace App\Imports;

use App\Models\Code;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class MastersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

    $user=User::whereCode($row[2])->orWhere('mobile',$row[3])->first();
        if( $user){
            $user->assignRole('master');
        }else{
            $data =[
                'name' =>$row[0],
                'family' =>$row[1],
                'code' =>$row[2],
                'mobile' =>$row[3],
                'email' =>$row[4],
                'password' =>$row[5],
                'group' =>null,
                'course' =>$row[6],
                'level' =>$row[7],
                'expert' =>$row[8],
            ];

            $mastr = User::create($data);
            $mastr->assignRole('master');
            dump($mastr);

        }
        // return new Code([
        //     'name'=>$row[0],
        //     'family'=>$row[1],
        //     'code'=>$row[2],
        // ]);
        // alert()->success('ok');
        // return back();
    }
}
