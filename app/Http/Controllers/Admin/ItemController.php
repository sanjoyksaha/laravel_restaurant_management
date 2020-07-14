<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use App\Category;
//use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif,bmp',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);
        if(isset($image))
        {
            $current = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$current.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/items'))
            {
                mkdir('uploads/items', 0777, true);
            }
            $image->move('uploads/items', $imagename);
        }else
        {
            $imagename = 'default.png';
        }

        $item = new Item();
        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $imagename;
        $item->save();

        // Toastr::success('Reservation request sent successfully. We Will Confirm You Soon..', 'Success',["positionClass" => "toast-top-right"]);

        return redirect()->route('item.index')->with('successMsg', 'Item Created Successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all();

        return view('admin.item.edit', compact('item', 'categories'));
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
        $this->validate($request, [
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif,bmp',
        ]);

        $item = Item::find($id);
        $image = $request->file('image');
        $slug = Str::slug($request->name);
        if(isset($image))
        {
            $current = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$current.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/items'))
            {
                mkdir('uploads/items', 0777, true);
            }

            if(file_exists('uploads/items/'.$item->image))
            {
                unlink('uploads/items/'.$item->image);  
            }
            
            $image->move('uploads/items', $imagename);
        }else
        {
            $imagename = $item->image;
        }

        
        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $imagename;
        $item->save();

        return redirect()->route('item.index')->with('successMsg', 'Item Updated Successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        if(file_exists('uploads/items/'.$item->image))
        {
            unlink('uploads/items/'.$item->image);  
        }
        $item->delete();
        return redirect()->back()->with('successMsg', 'Item Deleted Successfully!!!');
    }
}
