<?php

namespace Modules\Product\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Catigory\app\Models\catigory;
use Modules\Product\app\Http\Requests\addproduct;
use Modules\Product\app\Http\Requests\updateproduct;
use Modules\Product\app\Models\product;

class ProductController extends Controller
{
    public function __construct()
    {
       $this->middleware(['role:superAdmin']);

    }
   public function index()
   {
       $product = product::all() ;



       return view('product::index' , compact('product'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
        $catigoies = catigory::all() ;

        $lastId = $catigoies->last() ;

       return view('product::create' ,compact('catigoies' ,'lastId') );
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(addproduct $q)
   {

       //get validation
      $data = $q->validated();

       //create product
       $product = product::create($data);

       //make notify
      notify()->success(__("addSuccess"));

      return redirect()->back() ;
   }

   /**
    * Show the specified resource.
    */
   public function show($id)
   {
       return view('product::show');
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($id)
   {

    $catigoies = catigory::all() ;



       $data = product::find($id);

       return view('product::edit' ,compact('data' , 'catigoies'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(updateproduct $q, $id)
   {



       $product = product::findOrFail($id);
       $product->name = $q->name ;
       $product->name_en = $q->name_en ;
       $product->description = $q->description ;
       $product->first_price = $q->first_price ;
       $product->last_price = $q->last_price ;
       $product->sreialNumber = $q->sreialNumber ;
       $product->store = $q->store ;
       $product->cat_id = $q->cat_id ;
       $product->save() ;
        //update notify
      notify()->success(__("updateSuccess"));


      return redirect()->back() ;
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($id)
   {
       $product = product::find($id);
       $product->delete();
        //update notify
      notify()->success(__("deleteSuccess"));

      return redirect()->back() ;

   }
}
