<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManageUser;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        $roles = Role::all();
        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageUser $request)
    {
        $data = $request->all();
        User::create($data);
        $request->session()->flash('status', 'Thêm người dùng thành công!');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $data = $request->all();
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
            'yourname' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ],
        [
            'username.required' => 'Tên đăng nhập không được để trống',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
            'password.required' => 'Mật khẩu không được để trống',
            'yourname.required' => 'Họ và tên không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'address.required' => 'Địa chỉ không được để trống',        
        ]
        );
        $user->update($data);
        $request->session()->flash('status', 'Chỉnh sửa thành công!');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // $user->delete();
        // return redirect()->route('users.index');
        $user = User::findOrFail($request->user_id);
        $user->delete();
        $request->session()->flash('status', 'Xóa thành công!');
        return redirect()->route('users.index');
    }

    public function search(Request $request)
    {
        if($request->ajax()){
            $output="";
            $users = User::where('username','LIKE','%'.$request->search."%")->get();
            if($users) {
                foreach ($users as $key => $user) {
                $output.='<tr>'.
                '<td>'.$key.'</td>'.
                '<td>'.$user->username.'</td>'.
                '<td>'.$user->email.'</td>'.
                '<td>'.$user->role_id.'</td>'.
                '</tr>';
                }
            return Response($output);
           }
       }
    }
}
