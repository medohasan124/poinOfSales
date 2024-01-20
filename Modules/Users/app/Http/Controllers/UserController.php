<?php

namespace Modules\Users\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User ;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Users\app\Http\Requests\addUser;
use Modules\Users\app\Http\Requests\updateUser;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Users = User::all() ;

        return view('users::index' , compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $role = Role::all();

        return view('users::create' , compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(addUser $q)
    {

        //get validation
       $data = $q->validated();

        //create User
        $user = User::create($data);

        //add Role
        $role = Role::find($data['role']);
        $user->addRole($role->name);

        //make notify
       notify()->success(__("addSuccess"));


       return redirect()->back() ;
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('users::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = User::find($id);
        $role = Role::all();
        return view('users::edit' ,compact('data' , 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateUser $q, $id)
    {



        $user = User::findOrFail($id);



        $user->name = $q->name ;
        $user->email = $q->email ;
        $user->password = $q->password ;
        $user->mobile = $q->mobile ;
        $user->save() ;

        //update Role
        $user->syncRoles([$q->role]);
        // $role = Role::find($q->role);
        // $user->addRole($role->name);

         //update notify
       notify()->success(__("updateSuccess"));


       return redirect()->back() ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
