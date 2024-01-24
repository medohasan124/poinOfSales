<?php

namespace Modules\Order\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Catigory\app\Models\catigory;
use Modules\Order\app\Models\order;
use Modules\Product\app\Models\product;

class OrderController extends Controller
{
    /**
     *
     * Display a listing of the resource.
     */

     public function __construct()
     {
        $this->middleware(['role:superAdmin']);

     }
    public function index()
    {
        $order = order::all() ;

        return view('order::index' , compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catigory = catigory::all() ;
        $product = product::all() ;
        return view('order::create' ,compact('catigory' , 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(addorder $q)
    {

        //get validation
       $data = $q->validated();

        //create order
        $order = order::create($data);

        //make notify
       notify()->success(__("addSuccess"));



       return redirect()->back() ;
    }

    /**
     * Show the specified resource.
     */
    public function show($code)
    {
       $product =  product::where('sreialNumber' , $code)->get();
        return response($product);
        //return view('order::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = order::find($id);

        return view('order::edit' ,compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateorder $q, $id)
    {

        $order = order::findOrFail($id);
        $order->name = $q->name ;
        $order->mobile = $q->mobile ;
        $order->save() ;
         //update notify
       notify()->success(__("updateSuccess"));


       return redirect()->back() ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $order = order::find($id);

        $order->delete();
         //update notify
       notify()->success(__("deleteSuccess"));

       return redirect()->back() ;

    }
 }
