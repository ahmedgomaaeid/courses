<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $teachers = Teacher::where('approved', 0)->get();
        $unapp_teachers = Teacher::where('approved', 0)->count();
        $app_teachers = Teacher::where('approved', 1)->count();
        $students = Student::all()->count();
        $price = Purchase::all()->sum('course_price');
        return view('admin.index', compact('teachers', 'unapp_teachers', 'app_teachers', 'students', 'price'));
    }
}
