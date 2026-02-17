<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JugementController extends Controller
{
    public function index(Request $request)
    {
        $results = DB::table('jugement')->get();
        return view('jugement.index', compact('results'));
    }

    public function create()
    {
        return view('jugement.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'رقم_تأجير' => 'required',
            'الاسم_و_النسب' => 'required',
            // Add other validations as needed
        ]);

        DB::table('jugement')->insert($data);

        return redirect()->route('jugement.index')->with('success', 'تمت إضافة الحكم بنجاح');
    }

    public function edit($id)
    {
        $jugement = DB::table('jugement')->where('id', $id)->first();
        return view('jugement.edit', compact('jugement'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'رقم_تأجير' => 'required',
            'الاسم_و_النسب' => 'required',
            // Add other validations as needed
        ]);

        DB::table('jugement')->where('id', $id)->update($data);

        return redirect()->route('jugement.index')->with('success', 'تم تحديث الحكم بنجاح');
    }

    public function destroy($id)
    {
        DB::table('jugement')->where('id', $id)->delete();
        return redirect()->route('jugement.index')->with('success', 'تم حذف الحكم');
    }
}
