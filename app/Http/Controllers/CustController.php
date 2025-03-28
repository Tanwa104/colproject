<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAdd;
use Session;

class CustController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $items[]=null;
        $addresses=UserAdd::get();
        foreach($addresses as $address)
        {
            if(auth()->user()->id==$address->user_id)
            {
                $items[]=$address;
            }
        }
        $role=auth()->user()->role_id;
        if($role==2)
        {
           return view('help_dash'); 
        }
        
        $id = null;
        return view('user_dash',compact('items','id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $id=$request->input('dl1');
        $addresses=UserAdd::get();
        foreach($addresses as $add)
        {
            if($add->id==$id)
            {
                $addid=$add->id;
                $area=$add->area;
                $city=$add->city;
                $add1=$add->address_line_1;
                $add2=$add->address_line_2;
                $state=$add->state;
                $country=$add->country;
            }
        }
        $addstring=$add1." ".$add2." ".$area." ".$city." ".$state." ".$country;

        $request->session()->put('addstr', $addstring);
        $request->session()->put('addid', $addid);
        
        return redirect()->route('cust.view',['id'=>$id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
    }
    public function view($id)
    {
        // dd($id);
        $uid=auth()->user()->id;

        $uid=auth()->user()->id;
        
        $itemadd[]=null;
        $users=User::get();
        foreach($users as $user)
        {
            if($uid==$user->id)
            {
                $items[]=$user;
            }
            
        }
        $addresses=UserAdd::get();
        foreach($addresses as $address)
        {
            if(auth()->user()->id==$address->user_id)
            {
                $itemadd[]=$address;
            }
        }
        
// dd($items);
        return view('fliter',compact('itemadd','id','items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
