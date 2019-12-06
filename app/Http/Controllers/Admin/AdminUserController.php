<?php

namespace App\Http\Controllers\Admin;
use Spatie\Permission\Models\Role;
use App\Http\Requests\AdminUserRequest;
use App\Http\Requests\AdminUserUpdateRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Category;

class AdminUserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
    
        $this->middleware('auth');
    }
   

    public function dashboard(Request $request)
    {
   
        return view('admin.dashboard');
    }
  
     public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $adminuser = User::all()
                ->latest()->paginate($perPage);
        } else {
            $adminuser = User::latest()->paginate($perPage);
        }

        return view('admin.user.index', compact('adminuser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles=Role::all();
      
        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AdminUserRequest $request)
    {
       



     
 

       $user=new User;
            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->status=$request->status;
            $user->assignRole($request->roles);
            $user->save();
      
        return redirect('admin/user')->with('flash_message', 'AdminUser added!');
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
        $adminuser = User::findOrFail($id);

        return view('admin.user.show', compact('adminuser'));
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
        $adminuser = User::findOrFail($id);
        $roles=Role::all();
      
        return view('admin.user.edit', compact('adminuser','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(AdminUserUpdateRequest $request, $id)
    {
       
        $adminuser = User::findOrFail($id);
   if(isset($adminuser->getRoleNames()[0]))
        $adminuser->removeRole($adminuser->getRoleNames()[0]);

        $adminuser->assignRole($request->roles);
      

        if(!empty($request['password'])){
            $request['password'] = Hash::make($request['password']);
        }else{
            $request = array_except($request,array('password'));
        }

        $adminuser->update($request->all());

        return redirect('admin/user')->with('flash_message', 'AdminUser updated!');
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
        User::destroy($id);

        return redirect('admin/user')->with('flash_message', 'AdminUser deleted!');
    }   




    public function getSubcategory($id)
    {
       $category=Category::where('parent_id','=',$id)->get();
       return $category;
    
    }




}
