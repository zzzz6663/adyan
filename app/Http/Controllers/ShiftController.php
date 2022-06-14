<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\Duty;
use App\Models\User;
use App\Models\Group;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user= auth()->user();
        $shifts=Shift::query();
        if ($request->search){
            $search=$request->search;
            $shifts->whereHas('user',function($query) use ($search){
                $query->  where('name','LIKE',"%{$search}%")
                ->orWhere('family','LIKE',"%{$search}%")
                ->orWhere('mobile','LIKE',"%{$search}%")
                ->orWhere('code','LIKE',"%{$search}%");
            });
            $shifts->orWhereHas('expert',function($query) use ($search){
                $query->  where('name','LIKE',"%{$search}%")
                ->orWhere('family','LIKE',"%{$search}%")
                ->orWhere('mobile','LIKE',"%{$search}%")
                ->orWhere('code','LIKE',"%{$search}%");
            });
            $shifts->orWhereHas('master',function($query) use ($search){
                $query->  where('name','LIKE',"%{$search}%")
                ->orWhere('family','LIKE',"%{$search}%")
                ->orWhere('mobile','LIKE',"%{$search}%")
                ->orWhere('code','LIKE',"%{$search}%");
            });
            // $shifts->orWhereHas('expert',function($query) use ($search){
            //     $query->  orWhere('name','LIKE',"%{$search}%")
            //     ->orWhere('family','LIKE',"%{$search}%")
            //     ->orWhere('mobile','LIKE',"%{$search}%")
            //     ->orWhere('code','LIKE',"%{$search}%");
            // });
            // $shifts->orWhereHas('master',function($query) use ($search){
            //     $query->  orWhere('name','LIKE',"%{$search}%")
            //     ->orWhere('family','LIKE',"%{$search}%")
            //     ->orWhere('mobile','LIKE',"%{$search}%")
            //     ->orWhere('code','LIKE',"%{$search}%");
            // });
        }
        $shifts=  $shifts->latest()->paginate(10);
        return view('admin.shift.all',compact(['shifts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user= auth()->user();

        return view('admin.shift.create',compact(['user']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user= auth()->user();

        if($user->shifts()->where('down','0')->count() >0){
            alert()->error(__('alert.a68')) ;
            return redirect()->route('user.note');
        }
        $data=$request->validate([
            'change_group' => 'required_without_all:change_master,change_guid,change_title',
            'change_master' => 'required_without_all:change_group,change_guid,change_title',
            'change_guid' => 'required_without_all:change_group,change_master,change_title',
            'change_title' => 'required_without_all:change_group,change_master,change_guid',
            'request' =>'required'
        ]);
        $shift=$user->shifts()->create($data);
        $user->save_log(['admin', 'expert'],['type'=>'submit_new_shift','shift_id'=>$shift->id] , true);
        $user->save_duty([ 'expert'],['type'=>'confirm_expert_shift','shift_id'=>$shift->id] );
        alert()->success(__('alert.a49'));
        return redirect()->route('user.note');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {  $user= auth()->user();
        return view('admin.shift.show',compact(['user','shift']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        $user= auth()->user();
        $masters= User::whereLevel('master')->get();
        $groups= Group::all();
        return view('admin.shift.edit',compact(['user','shift','masters','groups']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Shift $shift)
    {
        if($shift->down){
            alert()->error(__('alert.a67')) ;
            return redirect()->route('user.note');
        }
        if(!$shift->user->curt()){
            alert()->error(__('alert.a62')) ;
            return redirect()->route('user.note');
        }
        $group=$shift->user->curt()->group;
      if (!$group){
        alert()->error(__('alert.a63')) ;
        return redirect()->route('user.note');
      }

      $user= auth()->user();


      if($user->level=='expert'){
        if ($shift->expert_id){
            alert()->error(__('alert.a67')) ;
            return redirect()->route('user.note');
          }
        $duty= $shift->duties()->whereType('confirm_expert_shift')->first();
        $duty->update([
            'time'=>Carbon::now(),
        ]);
        $shift->update([
            'expert_id'=>$user->id
        ]);

        if($request->reject){
            $user->save_log(['admin', 'expert'],['type'=>'reject_expert_shift','shift_id'=>$shift->id] , true);
            $shift->update([
                'confirm_expert' =>'0',
                'down' =>'1',
            ]);
        }
        if($request->accept){
            $user->save_log(['admin', 'expert'],['type'=>'confirm_expert_shift','shift_id'=>$shift->id] , true);
            $user->save_duty([ 'group'],['type'=>'verify_group_shift','shift_id'=>$shift->id ,'curt_id'=>$shift->user->curt()->id] );
            $shift->update([
                'confirm_expert' =>'1',
            ]);
        }
        alert()->success(__('alert.a7')) ;
        return redirect()->route('user.note');
      }
      if($user->level=='master'){

        $curt=$shift->user->curt();
        $plan=$shift->user->plan;
        $shift->update([
            'old_group_id' => $curt->group_id,
        ]);
        if($request->reject){
            $user->save_log(['admin', 'expert'],['type'=>'reject_group_shift','shift_id'=>$shift->id] , true);
            $shift->update([
                'master_id' =>$user->id,
                'confirm_master' =>'0',
                'down' =>'1',
            ]);
        }
        if($request->accept){
            $shift->update([
                'master_id' =>$user->id,
                'confirm_master' =>'1',
                'down' =>'1',
            ]);

            if($shift->change_title){
               foreach  ($curt->sessions as $session){
                $session->curts()->detach($curt->id);
               }
              Log::where('curt_id', $curt->id)->where('curt_id', $curt->id)->delete();
              Duty::where('curt_id', $curt->id)->delete();
              $curt->user->logs()->where('curt_id', $curt->id)->delete();
              $curt->user->duties()->delete();
              $curt->user->save_duty([],['type'=>'submit_curt'] , true);
              $curt->user->update_status('curt');
              $curt->user->curts()->whereType('secondary')->delete();
              $curt->delete();
              if($plan){
                foreach  ($plan->sessions as $session){
                    $session->plans()->detach($plan->id);
                   }
                $plan->user->logs()->where('plan_id', $plan->id)->delete();
                Log::where('plan_id', $plan->id)->delete();
                Duty::where('plan_id', $plan->id)->delete();
                $plan->user->plans()->whereType('secondary')->delete();
                $plan->delete();
              }
              $shift->user->save_log(['admin', 'expert'],['type'=>'confirm_group_shift','shift_id'=>$shift->id] , true);
              alert()->success(__('alert.a7')) ;
              return redirect()->route('user.note');
            }



            $data= $request->validate([
                'master_id' => Rule::requiredIf(function () use ($shift) {
                      return $shift->change_master;
                  }),
                'group_id' => Rule::requiredIf(function () use ($shift) {
                      return $shift->change_group;
                  }),
                'guid_id' => Rule::requiredIf(function () use ($shift) {
                      return $shift->change_guid;
                  }),
              ]);
              $shift->user->save_log(['admin', 'expert'],['type'=>'confirm_group_shift','shift_id'=>$shift->id] , true);

               if($request->master_id){
                if($curt){
                    foreach($curt->duties()->whereNull('time')->whereNotIn('type',['verify_group_shift','confirm_expert_shift'])->get() as $cduty){
                        if( $cduty->side==0){
                            $cduty->users()->detach($curt->master_id);
                            $cduty->users()->attach($request->master_id);
                        }

                    }
                    $shift->update([
                        'oldmaster_id'=>$curt->master_id,
                        'newmaster_id'=>$request->master_id
                    ]);
                    $curt->update([
                        'master_id'=>$request->master_id
                    ]);
                }

                if($plan){
                    foreach($plan->duties()->whereNull('time')->whereNotIn('type',['verify_group_shift','confirm_expert_shift'])->get() as $pduty){
                        if( $pduty->side==0){
                            $pduty->users()->detach($plan->master_id);
                            $pduty->users()->attach($request->master_id);
                        }
                    }
                    $plan->update([
                        'master_id'=>$request->master_id
                    ]);
                }
               }

               if($request->group_id){
                   $old_admin_group=$curt->group->admin();
                   $new_admin_group=Group::find($request->group_id)->admin();
                if($curt){
                    foreach($curt->duties()->whereNull('time')->whereNotIn('type',['verify_group_shift','confirm_expert_shift'])->get() as $cduty){
                        if( $cduty->side==0){
                            $cduty->users()->detach($old_admin_group->id);
                            $cduty->users()->attach($new_admin_group->id);
                        }
                    }
                    $shift->update([
                        'oldgroup_id'=>$curt->group_id,
                        'newgroup_id'=>$request->group_id
                    ]);
                    $curt->update([
                        'group_id'=>$request->group_id
                    ]);
                }
                if($plan){
                    foreach($plan->duties()->whereNull('time')->whereNotIn('type',['verify_group_shift','confirm_expert_shift'])->get() as $pduty){
                        if( $pduty->side==0){
                            $pduty->users()->detach($old_admin_group->id);
                            $pduty->users()->attach($new_admin_group->id);
                        }
                    }
                    $plan->update([
                        'group_id'=>$request->group_id
                    ]);
                }
                if($request->guid_id){
                    $plan->update([
                        'guid_id'=>$request->guid_id
                    ]);
                }
               }

          $shift->update([
              'master_id'=>$user->id
          ]);
        }

        $duty= $shift->duties()->whereType('verify_group_shift')->first();
        $duty->update([
            'time'=>Carbon::now(),
        ]);
        alert()->success(__('alert.a7')) ;
        return redirect()->route('user.note');



      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
