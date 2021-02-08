<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use function App\Helper\getCurrentAdminID;

class AdminController extends Controller
{
    public function index(){
        $admins = Admin::paginate(PAGINATION_COUNT);
        return view('admin.admins.index', compact('admins'));
    }

    public function add(){
        return view('admin.admins.add');
    }

    public function store(AdminRequest $request){
        $data = $request->except(['_token', 'password']);
        $data['password'] = Hash::make($request->password);
        Admin::create( $data );
        return redirect()->route('admin.index')->with(['success' => __('admin.admin_added_successfully')]);
    }

    public function edit($id){
        $current_adminID = getCurrentAdminID();
        $current_admin = Admin::find($current_adminID);
        $admin = Admin::find($id);

        if ( !$admin ){
            return redirect()->route('admin.index')->with(['error' => __('admin.admin_edit_error')]);
        }

        if ( ! Gate::forUser($current_admin)->allows('edit_admin', $admin) )
            return redirect()->route('admin.index')->with(['error' => __('admin.unauthorized')]);

        return view('admin.admins.edit', compact('admin'));
    }

    public function update($id, AdminRequest $request){
        $current_adminID = getCurrentAdminID();
        $current_admin = Admin::find($current_adminID);
        $admin = Admin::find($id);

        if ( !$admin ){
            return redirect()->route('admin.index')->with(['error' => __('admin.admin_edit_error')]);
        }

        if ( ! Gate::forUser($current_admin)->allows('edit_admin', $admin) )
            return redirect()->route('admin.index')->with(['error' => __('admin.unauthorized')]);

        $data = $request->except(['_token', 'password']);
        if ( !is_null($request->password) ){
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);
        return redirect()->route('admin.index')->with(['success' => __('admin.admin_edit_successfully')]);
    }

    public function delete($id){
        $current_adminID = getCurrentAdminID();
        $current_admin = Admin::find($current_adminID);
        $admin = Admin::find($id);

        if ( !$admin ){
            return redirect()->route('admin.index')->with(['error' => __('admin.admin_edit_error')]);
        }

        if ( ! Gate::forUser($current_admin)->allows('edit_admin', $admin) )
            return redirect()->route('admin.index')->with(['error' => __('admin.unauthorized')]);

        $admin->delete();
        return redirect()->route('admin.index')->with(['success' => __('admin.admin_deleted_successfully')]);
    }

}
