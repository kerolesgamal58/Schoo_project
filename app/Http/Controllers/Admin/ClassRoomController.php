<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRoomRequest;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function index(){
        $class_rooms = ClassRoom::paginate(PAGINATION_COUNT);
        return view('admin.class_room.index', compact('class_rooms'));
    }

    public function add(){
        return view('admin.class_room.add');
    }

    public function store(ClassRoomRequest $request){
        $data = $request->except(['_token']);
        ClassRoom::create( $data );
        return redirect()->route('class_room.index')->with(['success' => __('admin.class_room_added_successfully')]);
    }

    public function edit($id){
        $class_room = ClassRoom::find($id);

        if ( !$class_room ){
            return redirect()->route('class_room.index')->with(['error' => __('admin.class_room_edit_error')]);
        }

        return view('admin.class_room.edit', compact('class_room'));
    }

    public function update($id, ClassRoomRequest $request){
        $class_room = ClassRoom::find($id);

        if ( !$class_room ){
            return redirect()->route('class_room.index')->with(['error' => __('admin.class_room_edit_error')]);
        }

        $data = $request->except(['_token']);

        $class_room->update($data);
        return redirect()->route('class_room.index')->with(['success' => __('admin.class_room_edit_successfully')]);
    }

    public function delete($id){
        $class_room = ClassRoom::find($id);

        if ( !$class_room ){
            return redirect()->route('class_room.index')->with(['error' => __('admin.class_room_edit_error')]);
        }

        $class_room->delete();
        return redirect()->route('class_room.index')->with(['success' => __('admin.class_room_deleted_successfully')]);
    }
}
