<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function list(){
       
        $data['lists']=User::all();
        $data['adminLists']=Admin::all();
        $data['agentLists']=Agent::all();
        
        // dd($data);
        return view('list', $data);
    }
}
