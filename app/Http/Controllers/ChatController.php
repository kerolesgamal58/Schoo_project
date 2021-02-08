<?php

namespace App\Http\Controllers;

use App\Events\newMessage;
use App\Models\ClassTeacher;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function App\Helper\getCurrentStudentID;
use function App\Helper\getCurrentTeacherID;

class ChatController extends Controller
{
    public function store(Request $request, $class_token){
        if (Auth::guard('student')->check()) {
            $student_id = getCurrentStudentID();
            $message_owner = $student_id;
            $data = [
                'message_owner' => $message_owner,
                'message' => $request->message,
            ];

            $student_class_id = Student::find($student_id)->class_room_id;
            DB::connection('mongodb')->collection('class_room_' . $student_class_id)->insert($data);

            $data['class_token'] = $class_token;

            newMessage::dispatch($data);
//            broadcast(new newMessage($data))->toOthers();

            return response()->json(['status' => true]);
        }
        elseif (Auth::guard('teacher')->check()){
        $teacher_id = getCurrentTeacherID();
        $message_owner = 100 + $teacher_id;
        $data = [
            'message_owner' => $message_owner,
            'message' => $request->message,
        ];

        $teacher_class_id = ClassTeacher::where('teacher_id', $teacher_id)->first()->class_room->id;
        DB::connection('mongodb')->collection('class_room_' . $teacher_class_id)->insert($data);

        $data['class_token'] = $class_token;

        newMessage::dispatch($data);
//            broadcast(new newMessage($data))->toOthers();

        return response()->json(['status' => true]);
        }
        else
            return response()->json([
                'status' => false,
                'message' => __('admin.unauthorized'),
            ]);
    }
}
