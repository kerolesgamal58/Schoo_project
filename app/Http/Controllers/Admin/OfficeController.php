<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfficeRequest;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index(){
        $offices = Office::paginate(PAGINATION_COUNT);
        return view('admin.office.index', compact('offices'));
    }

    public function add(){
        return view('admin.office.add');
    }

    public function store(OfficeRequest $request){
        $data = $request->except(['_token']);
        Office::create( $data );
        return redirect()->route('office.index')->with(['success' => __('admin.office_added_successfully')]);
    }

    public function edit($id){
        $office = Office::find($id);

        if ( !$office ){
            return redirect()->route('office.index')->with(['error' => __('admin.office_edit_error')]);
        }

        return view('admin.office.edit', compact('office'));
    }

    public function update($id, OfficeRequest $request){
        $office = Office::find($id);

        if ( !$office ){
            return redirect()->route('office.index')->with(['error' => __('admin.office_edit_error')]);
        }

        $data = $request->except(['_token']);

        $office->update($data);
        return redirect()->route('office.index')->with(['success' => __('admin.office_edit_successfully')]);
    }

    public function delete($id){
        $office = Office::find($id);

        if ( !$office ){
            return redirect()->route('office.index')->with(['error' => __('admin.office_edit_error')]);
        }

        $office->delete();
        return redirect()->route('office.index')->with(['success' => __('admin.office_deleted_successfully')]);
    }
}
