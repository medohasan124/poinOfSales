<?php

namespace Modules\Catigory\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Catigory\app\Http\Requests\addCatigory;
use Modules\Catigory\app\Http\Requests\updateCatigory;
use Modules\Catigory\app\Models\catigory;
use Modules\Product\app\Models\product;

class CatigoryController extends Controller
{

    public function __construct()
    {
       $this->middleware(['role:superAdmin']);

    }
   public function index()
   {
       $catigory = catigory::all() ;

       return view('catigory::index' , compact('catigory'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       return view('catigory::create');
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(addCatigory $q)
   {

       //get validation
      $data = $q->validated();

       //create catigory
       $catigory = catigory::create($data);

       //make notify
      notify()->success(__("addSuccess"));



      return redirect()->back() ;
   }

   /**
    * Show the specified resource.
    */
   public function show($id)
   {
       return view('catigory::show');
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($id)
   {
       $data = catigory::find($id);

       return view('catigory::edit' ,compact('data'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(updateCatigory $q, $id)
   {

       $catigory = catigory::findOrFail($id);
       $catigory->name = $q->name ;
       $catigory->name_en = $q->name_en ;
       $catigory->save() ;
        //update notify
      notify()->success(__("updateSuccess"));


      return redirect()->back() ;
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($id)
   {

       $catigory = catigory::find($id);

       $product = product::where('cat_id' , $id)->get();

       if($product){
        return redirect()->back()->withErrors(trans('cant_delete'));
       }

       $catigory->delete();
        //update notify
      notify()->success(__("deleteSuccess"));

      return redirect()->back() ;

   }
}
