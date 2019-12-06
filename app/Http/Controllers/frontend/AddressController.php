<?php

namespace App\Http\Controllers\frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $address = Address::where('user_id',Auth()->user()->id)
                ->latest()->paginate($perPage);
        } else {
            $address = Address::where('user_id',Auth()->user()->id)->latest()->paginate($perPage);
        }

        return view('frontend.address.index', compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('frontend.address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fullname'=>'required',
            'country'=>'alpha|required',
            'state'=>'alpha|required',
            'address1'=>'required',
            'pincode'=>'required|digits:6|integer',

           
        ]);
  
        $address=new Address;
        $address->fullname=$request->fullname;
        $address->country=$request->country;
        $address->address1=$request->address1;
        $address->address2=$request->address2;
        $address->state=$request->state;
        $address->pincode=$request->pincode;
        $address->user_id=auth()->user()->id;
        $address->save();
        return redirect('address')->with('flash_message', 'Address added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $address = Address::findOrFail($id);

        return view('frontend.address.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $address = Address::findOrFail($id);

        return view('frontend.address.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $address = Address::findOrFail($id);
        $address->update($requestData);

        return redirect('address')->with('flash_message', 'Address updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Address::destroy($id);

        return redirect('address')->with('flash_message', 'Address deleted!');
    }
}
