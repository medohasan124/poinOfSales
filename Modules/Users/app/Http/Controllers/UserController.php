<?php

namespace Modules\Users\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Modules\Users\app\Models\Users ;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Users\app\Http\Requests\addUser;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Users = Users::all() ;

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

       // $data = $q->validated() ;

       $data = $q->validated();

        dd($data);
       // Users::create($data);
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
        return view('users::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
