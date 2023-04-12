<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::withTrashed()->orderBy('updated_at', 'DESC')->get();
        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'sku' => 'required|string|unique:products,sku|max:50',
                'price' => 'required|numeric',
                'quantity' => 'required|integer',
            ]);
            
            $product = new Product([
                'name' => $request->input('name'),
                'category' => $request->input('category'),
                'sku' => $request->input('sku'),
                'price' => $request->input('price'),
                'quantity' => $request->input('quantity'),
                'status' => 1,
            ]);
            
            $product->save();
            
            if(!empty($product->id)) {
                $slug_update = Product::where("id",$product->id)->update(['slug' => clean($product->category.'-'.$product->name.'-'.$product->id)]);
                return redirect()->route('products.index')->with('success', 'Product created successfully.');
            } else {
                return redirect()->route('products.index')->with('error', 'Product not created successfully.');
            }
        } catch(\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Product not created successfully. Error: ' . $e->getMessage());
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        return view('backend.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        return view('backend.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'sku' => 'required|string|max:50|unique:products,sku,'.$id,
                'price' => 'required|numeric',
                'quantity' => 'required|integer',
            ]);
            $product = Product::withTrashed()->findOrFail($id);
            $product->name = $request->input('name');
            $product->category = $request->input('category');
            $product->sku = $request->input('sku');
            $product->price = $request->input('price');
            $product->quantity = $request->input('quantity');
            $product->status = $request->input('status', 1);
            $product->save();
    
            $slug_update = Product::where("id",$id)->update(['slug' => clean($product->category.'-'.$product->name.'-'.$id)]);
    
            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Product not updated. Error: ' . $e->getMessage());
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_data = Product::where('id','=',$id)->first();
        if(!empty($product_data)):
                $product = Product::find($id);
                $delete = $product->delete();
                
                if(!empty($delete)):
                    return response()->json([
                        'status'=>'success',
                    ],200);
                else:
                    return response()->json([
                        'status'=>'error',
                    ],200);
                endif;
        else:
            return response()->json([
                    'status'=>'error',
                ],200);
        endif;
    }

    /**
     * Chnage the status of resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        if($request->ajax())
        {
            if(!empty($request->id)):
                if($request->has('value')):
                   $id = $request->id;
                   $value = $request->value;
                   if($value==1):
                        $product = Product::where('id','=',$id)->update(['status'=>1]);
                        if(!empty($product)):
                            return response()->json([
                                'status'=>'success',
                                'val'=>1,
                            ],200);
                        else:
                            return response()->json([
                                'status'=>'error',
                            ],200);
                        endif;
                    else:
                        $product = Product::where('id','=',$id)->update(['status'=>0]);
                        if(!empty($product)):
                            return response()->json([
                                'status'=>'success',
                                'val'=>0,
                            ],200);
                        else:
                            return response()->json([
                                'status'=>'error',
                            ],200);
                        endif;
                    endif; 
                else:
                    return response()->json([
                        'status'=>'error',
                    ],200);
                endif;
            else:
                return response()->json([
                    'status'=>'error',
                ],200);
            endif;
        }
        else{
                return response()->json([
                'status'=>'error',
            ],200);
        }
    }

    /**
     * Restore product
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $product_restore = Product::where('id', $id)->restore();
        if($product_restore) {
            return redirect()->route('products.index')->with('success', 'Product restored successfully.');
        } else {
            return redirect()->route('products.index')->with('error', 'Product not restored successfully.');
        }
    }

}
