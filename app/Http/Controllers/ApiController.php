<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function content()
    {
        $content = Content::content()->content;

        return view('api::content', compact('content'));
    }



    public function reset()
    {
        $leaders = [];
        $members = [];

        $users = User::orderBy('name')->get();
        foreach($users as $user){
            if($user->hasAllRoles(['팀4', '그룹장'])){
                $leaders[] = $user;
            }
            elseif($user->hasRole('팀4')){
                $members[] = $user;
            }
        }


        $view = view()->make('api::list-all-users', compact('leaders', 'members'))->render();

        $content = Content::content();
        $content->content = $view;
        $content->save();


    }




    public function make(Request $request)
    {
        //$leaders = [5,36,26,3];
        //$members = [9,33,2,14,22,17,30,29,25,10,4,16,23,32,11,12,28];

        $leaders = $request->get('leaders');
        $members = $request->get('members');


        shuffle($leaders);
        shuffle($members);

        $groupCnt = count($leaders);
        $groups = [];
        for($i=0; $i<$groupCnt; $i++){
            $groups[] = [
                'leader' => $leaders[$i],
                'members' => []
            ];
        }

        for($i=0; $i<count($members); $i++){
            $groupIndex = $i % $groupCnt;
            $groups[$groupIndex]['members'][] = $members[$i];
        }


        $users = User::all();
        $groups = array_map(function($group) use($users){
            $group['leader'] = $users->find($group['leader']);
            $group['members'] = array_map(function($member) use($users){
                return $users->find($member);
            }, $group['members']);
            return $group;
        }, $groups);


        $view = view()->make('api::list-groups', compact('groups'))->render();

        $content = Content::content();
        $content->content = $view;
        $content->save();


    }
}
