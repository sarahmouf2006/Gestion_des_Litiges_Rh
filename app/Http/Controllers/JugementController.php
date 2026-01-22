<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JugementController extends Controller
{
    public function index(Request $request)
    {
        $رقم_تأجير = $request->input('رقم_تأجير');
        $الاسم_و_النسب = $request->input('الاسم_و_النسب');
        $التسوية_النهائية = $request->input('التسوية_النهائية');

        $query = DB::table('jugement');

        if (!empty($رقم_تأجير)) {
            $query->where('رقم تأجير', 'like', "%{$رقم_تأجير}%");
        }

        if (!empty($الاسم_و_النسب)) {
            $query->where('الاسم و النسب', 'like', "%{$الاسم_و_النسب}%");
        }

        if (!empty($التسوية_النهائية)) {
            $query->where('التسوية النهائية', 'like', "%{$التسوية_النهائية}%");
        }

        $results = $query->get();

        return view('jugement.index', [
            'jugements' => $results,
            'inputs' => $request->all()
        ]);
    }

    // ترجع صفحة الفورم ديال الإضافة
    public function create()
    {
        return view('jugement.create');
    }

    // تخزن البيانات في الجدول
    public function store(Request $request)
    {
        $data = $request->validate([
            'رقم_تأجير' => 'required',
            'الاسم_و_النسب' => 'required',
            'الإطار' => 'nullable',
            'نوع_العملية' => 'nullable',
            'الفترة' => 'nullable',
            'ملاحظات' => 'nullable',
            'Aref' => 'nullable',
            'المديرية_الإقليمية' => 'nullable',
            'ملاحظات1' => 'nullable',
            'تاريخ_التسوية' => 'nullable|date',
            'مبلغ_التعويض' => 'nullable|numeric',
            'تاريخ_الالتحاق' => 'nullable|date',
            'التسوية_النهائية' => 'nullable',
            'منفذة_أو_غير_منفذة' => 'nullable|boolean',
        ]);

        // إذا كانت أسماء الأعمدة في DB فيها فراغات، هنا لازم نعيد بناء الـ array باش يدخلوها بالشكل الصحيح
        $insertData = [
            'رقم تأجير' => $data['رقم_تأجير'],
            'الاسم و النسب' => $data['الاسم_و_النسب'],
            'الإطار' => $data['الإطار'] ?? null,
            'نوع العملية' => $data['نوع_العملية'] ?? null,
            'الفترة' => $data['الفترة'] ?? null,
            'ملاحظات' => $data['ملاحظات'] ?? null,
            'Aref' => $data['Aref'] ?? null,
            'المديرية الإقليمية' => $data['المديرية_الإقليمية'] ?? null,
            'ملاحظات1' => $data['ملاحظات1'] ?? null,
            'تاريخ التسوية' => $data['تاريخ_التسوية'] ?? null,
            'مبلغ التعويض' => $data['مبلغ_التعويض'] ?? null,
            'تاريخ الالتحاق' => $data['تاريخ_الالتحاق'] ?? null,
            'التسوية النهائية' => $data['التسوية_النهائية'] ?? null,
            'منفذة أو غير منفذة' => $data['منفذة_أو_غير_منفذة'] ?? null,
        ];

        DB::table('jugement')->insert($insertData);

        return redirect()->route('jugement.index')->with('success', 'تمت إضافة القضية بنجاح');
    }

    // ترجع صفحة تعديل القضية
    public function edit($id)
    {
        $jugement = DB::table('jugement')->where('id', $id)->first();
        if (!$jugement) {
            return redirect()->route('jugement.index')->with('error', 'القضية غير موجودة');
        }
        return view('jugement.edit', compact('jugement'));
    }

    // تحدّث القضية في DB
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'رقم_تأجير' => 'required',
            'الاسم_و_النسب' => 'required',
            'الإطار' => 'nullable',
            'نوع_العملية' => 'nullable',
            'الفترة' => 'nullable',
            'ملاحظات' => 'nullable',
            'Aref' => 'nullable',
            'المديرية_الإقليمية' => 'nullable',
            'ملاحظات1' => 'nullable',
            'تاريخ_التسوية' => 'nullable|date',
            'مبلغ_التعويض' => 'nullable|numeric',
            'تاريخ_الالتحاق' => 'nullable|date',
            'التسوية_النهائية' => 'nullable',
            'منفذة_أو_غير_منفذة' => 'nullable|boolean',
        ]);

        $updateData = [
            'رقم تأجير' => $data['رقم_تأجير'],
            'الاسم و النسب' => $data['الاسم_و_النسب'],
            'الإطار' => $data['الإطار'] ?? null,
            'نوع العملية' => $data['نوع_العملية'] ?? null,
            'الفترة' => $data['الفترة'] ?? null,
            'ملاحظات' => $data['ملاحظات'] ?? null,
            'Aref' => $data['Aref'] ?? null,
            'المديرية الإقليمية' => $data['المديرية_الإقليمية'] ?? null,
            'ملاحظات1' => $data['ملاحظات1'] ?? null,
            'تاريخ التسوية' => $data['تاريخ_التسوية'] ?? null,
            'مبلغ التعويض' => $data['مبلغ_التعويض'] ?? null,
            'تاريخ الالتحاق' => $data['تاريخ_الالتحاق'] ?? null,
            'التسوية النهائية' => $data['التسوية_النهائية'] ?? null,
            'منفذة أو غير منفذة' => $data['منفذة_أو_غير_منفذة'] ?? null,
        ];

        $updated = DB::table('jugement')->where('id', $id)->update($updateData);

        if (!$updated) {
            return redirect()->route('jugement.index')->with('error', 'لم يتم تحديث القضية');
        }

        return redirect()->route('jugement.index')->with('success', 'تم تحديث القضية بنجاح');
    }

    // تحذف القضية من DB
    public function destroy($id)
    {
        DB::table('jugement')->where('id', $id)->delete();
        return redirect()->route('jugement.index')->with('success', 'تم حذف القضية');
    }
}
