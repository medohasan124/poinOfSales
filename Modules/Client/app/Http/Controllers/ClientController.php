<?php

namespace Modules\Client\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\client\app\Http\Requests\addclient;
use Modules\client\app\Http\Requests\updateclient;
use Modules\Client\app\Models\client;

class ClientController extends Controller
{

    public function __construct()
    {
       $this->middleware(['role:superAdmin']);

    }
   public function index()
   {
       $client = client::all() ;

       return view('client::index' , compact('client'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       return view('client::create');
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(addclient $q)
   {

       //get validation
      $data = $q->validated();

       //create client
       $client = client::create($data);

       //make notify
      notify()->success(__("addSuccess"));



      return redirect()->back() ;
   }

   /**
    * Show the specified resource.
    */
   public function show($id)
   {
       return view('client::show');
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($id)
   {
       $data = client::find($id);

       return view('client::edit' ,compact('data'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(updateclient $q, $id)
   {

       $client = client::findOrFail($id);
       $client->name = $q->name ;
       $client->mobile = $q->mobile ;
       $client->save() ;
        //update notify
      notify()->success(__("updateSuccess"));


      return redirect()->back() ;
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($id)
   {

       $client = client::find($id);

       $client->delete();
        //update notify
      notify()->success(__("deleteSuccess"));

      return redirect()->back() ;

   }
}
