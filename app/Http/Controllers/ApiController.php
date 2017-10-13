<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{

    public function content()
    {
        $content = Content::content()->content;

        return view('api::content', compact('content'));
    }

    public function data()
    {
        $content = Content::data()->content;

        return view('api::content', compact('content'));
    }



    public function reset()
    {
        //$team = '팀4';
        /*if(Auth::user()->hasRole('팀1')) $team = '팀1';
        elseif(Auth::user()->hasRole('팀2')) $team = '팀2';
        elseif(Auth::user()->hasRole('팀3')) $team = '팀3';
        elseif(Auth::user()->hasRole('팀4')) $team = '팀4';*/




        // 조장들
        $teamLeaders = User::whereHas('roles', function($query){
            $query->where('name', '조장');
        })->orderBy('name')->get();





        // 멤버들
        $soonLeaders = User::whereHas('roles', function($query){
            $query->where('name', '순장');
        })->orderBy('name')->get();


        $users = collect();
        foreach($soonLeaders as $soonLeader){

            $soonName = $soonLeader->name . '순';
            $members = User::whereHas('roles', function($query) use ($soonName){
                $query->where('name', $soonName);
            })->orderBy('name')->get();

            $soon = collect();
            $soon->name = $soonName;
            $soon->leader = $soonLeader;
            $soon->members = $members;

            $users->push($soon);
        }


        $others = collect();
        $others->name = 'Others';
        $others->leader = null;
        $others->members = User::whereDoesntHave('roles', function($query) use ($soonLeaders){
            $query->where('name', '순장');
            foreach($soonLeaders as $soonLeader){
                $query->orWhere('name', $soonLeader->name . '순');
            }
        })->orderBy('name')->get();

        $users->push($others);



        $view = view()->make('api::list-all-users', compact('teamLeaders', 'users'))->render();



        $content = Content::content();
        $content->content = $view;
        $content->save();


        $data = Content::data();
        $data->content = json_encode([
            'leaders' => [],
            'members' => []
        ]);
        $data->save();

    }


    public function change(Request $request)
    {
        $leaders = $request->get('leaders');
        $members = $request->get('members');


        $data = Content::data();
        $data->content = json_encode([
            'leaders' => $leaders,
            'members' => $members
        ]);

        $data->save();
    }




    private function getGender($user)
    {
        return $user->hasRole('남자')? 1:0;
    }




    public function make(Request $request)
    {
        //$leaders = [52, 53, 54, 55];
        //$members = [1, 50, 51, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68];

        $leaders = $request->get('leaders');
        $members = array_diff($request->get('members'), $leaders);


        $leaders = collect($leaders);
        $members = collect($members);

        // make it users
        $leaders = $leaders->map(function($id){
            $user = User::find($id);
            $user->gender = $this->getGender($user);
            return $user;
        });

        $members = $members->map(function($id){
            $user = User::find($id);
            $user->gender = $this->getGender($user);
            return $user;
        });


        // make group
        $genderCheck = false;
        while(!$genderCheck){
            $leaders = $leaders->shuffle();
            $members = $members->shuffle();

            // make number of groups
            $groupCnt = count($leaders);
            $groups = [];
            for($i=0; $i<$groupCnt; $i++){
                $groups[] = [
                    'leader' => $leaders[$i],
                    'members' => [],
                    '_gender_cnt' => $leaders[$i]->gender
                ];
            }
            for($i=0; $i<count($members); $i++){
                $groupIndex = $i % $groupCnt;
                $groups[$groupIndex]['members'][] = $members[$i];
                $groups[$groupIndex]['_gender_cnt'] += $members[$i]->gender;
            }

            $genderCounts = array_map(function($group){
                return $group['_gender_cnt'];
            }, $groups);

            $min = min($genderCounts);
            $max = max($genderCounts);

            if(abs($min - $max) <= 1){
                $genderCheck = true;
            }
        }


        $view = view()->make('api::list-groups', compact('groups'))->render();

        $content = Content::content();
        $content->content = $view;
        $content->save();


    }
}
