<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JugementController extends Controller
{
    public function index(Request $request)
    {
        $رقم_تأجير = $request->input('رقم تأجير');
        $الاسم_و_النسب = $request->input('الاسم و النسب');
        $التسوية_النهائية = $request->input('التسوية النهائية');
        $الإطار = $request->input('الإطار');
        $نوع_العملية = $request->input('نوع العملية');
        $الفترة = $request->input('الفترة');
        $المديرية_الإقليمية = $request->input('المديرية الإقليمية');
        $تاريخ_التسوية = $request->input('تاريخ التسوية');
        $مبلغ_التعويض = $request->input('مبلغ التعويض');
        $منفذة_أو_غير_منفذة = $request->input('منفذة أو غير منفذة');
        $Aref = $request->input('Aref');
        $تاريخ_الالتحاق = $request->input('تاريخ الالتحاق');
        $ملاحظات = $request->input('ملاحظات');
        $ملاحظات1 = $request->input('ملاحظات1');

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

        if (!empty($الإطار)) {
            $query->where('الإطار', 'like', "%{$الإطار}%");
        }

        if (!empty($نوع_العملية)) {
            $query->where('نوع العملية', 'like', "%{$نوع_العملية}%");
        }

        if (!empty($الفترة)) {
            $query->where('الفترة', 'like', "%{$الفترة}%");
        }

        if (!empty($المديرية_الإقليمية)) {
            $query->where('المديرية الإقليمية', 'like', "%{$المديرية_الإقليمية}%");
        }

        if (!empty($تاريخ_التسوية)) {
            $query->whereDate('تاريخ التسوية', $تاريخ_التسوية);
        }

        if (!empty($مبلغ_التعويض)) {
            $query->where('مبلغ التعويض', '>=', $مبلغ_التعويض);
        }

        if ($منفذة_أو_غير_منفذة !== null && $منفذة_أو_غير_منفذة !== '') {
            $query->where('منفذة أو غير منفذة', $منفذة_أو_غير_منفذة);
        }

        if (!empty($Aref)) {
            $query->where('Aref', 'like', "%{$Aref}%");
        }

        if (!empty($تاريخ_الالتحاق)) {
            $query->whereDate('تاريخ الالتحاق', $تاريخ_الالتحاق);
        }

        if (!empty($ملاحظات)) {
            $query->where('ملاحظات', 'like', "%{$ملاحظات}%");
        }

        if (!empty($ملاحظات1)) {
            $query->where('ملاحظات1', 'like', "%{$ملاحظات1}%");
        }

        $results = $query->get();

        return view('jugement.index', [
            'jugements' => $results,
            'inputs' => $request->all()
        ]);
    }

    // return the create forum page
    public function create()
    {
        return view('jugement.create');
    }

    // stores the data in the table
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

        return redirect()->route('jugements.index')->with('success', 'تمت إضافة القضية بنجاح');
    }

    // ترجع صفحة تعديل القضية
    public function edit($id)
    {
        $jugement = DB::table('jugement')->where('id', $id)->first();
        if (!$jugement) {
            return redirect()->route('jugements.index')->with('error', 'القضية غير موجودة');
        }
        return view('jugement.edit', compact('jugement'));
    }

    //  update in the db
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
            return redirect()->route('jugements.index')->with('error', 'لم يتم تحديث القضية');
        }

        return redirect()->route('jugements.index')->with('success', 'تم تحديث القضية بنجاح');
    }

//  removes fro the db
    public function destroy($id)
    {
        DB::table('jugement')->where('id', $id)->delete();
        return redirect()->route('jugements.index')->with('success', 'تم حذف القضية');
    }

    // export to the csv
    public function export(Request $request)
    {
        // uses the same searching logic from the index
        $رقم_تأجير = $request->input('رقم تأجير');
        $الاسم_و_النسب = $request->input('الاسم و النسب');
        $التسوية_النهائية = $request->input('التسوية النهائية');
        $الإطار = $request->input('الإطار');
        $نوع_العملية = $request->input('نوع العملية');
        $الفترة = $request->input('الفترة');
        $المديرية_الإقليمية = $request->input('المديرية الإقليمية');
        $تاريخ_التسوية = $request->input('تاريخ التسوية');
        $مبلغ_التعويض = $request->input('مبلغ التعويض');
        $منفذة_أو_غير_منفذة = $request->input('منفذة أو غير منفذة');
        $Aref = $request->input('Aref');
        $تاريخ_الالتحاق = $request->input('تاريخ الالتحاق');
        $ملاحظات = $request->input('ملاحظات');
        $ملاحظات1 = $request->input('ملاحظات1');

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

        if (!empty($الإطار)) {
            $query->where('الإطار', 'like', "%{$الإطار}%");
        }

        if (!empty($نوع_العملية)) {
            $query->where('نوع العملية', 'like', "%{$نوع_العملية}%");
        }

        if (!empty($الفترة)) {
            $query->where('الفترة', 'like', "%{$الفترة}%");
        }

        if (!empty($المديرية_الإقليمية)) {
            $query->where('المديرية الإقليمية', 'like', "%{$المديرية_الإقليمية}%");
        }

        if (!empty($تاريخ_التسوية)) {
            $query->whereDate('تاريخ التسوية', $تاريخ_التسوية);
        }

        if (!empty($مبلغ_التعويض)) {
            $query->where('مبلغ التعويض', '>=', $مبلغ_التعويض);
        }

        if ($منفذة_أو_غير_منفذة !== null && $منفذة_أو_غير_منفذة !== '') {
            $query->where('منفذة أو غير منفذة', $منفذة_أو_غير_منفذة);
        }

        if (!empty($Aref)) {
            $query->where('Aref', 'like', "%{$Aref}%");
        }

        if (!empty($تاريخ_الالتحاق)) {
            $query->whereDate('تاريخ الالتحاق', $تاريخ_الالتحاق);
        }

        if (!empty($ملاحظات)) {
            $query->where('ملاحظات', 'like', "%{$ملاحظات}%");
        }

        if (!empty($ملاحظات1)) {
            $query->where('ملاحظات1', 'like', "%{$ملاحظات1}%");
        }

        $results = $query->get();

        $filename = 'jugements_' . date('Y-m-d_His') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($results) {
            $file = fopen('php://output', 'w');
            
            // BOM pour UTF-8 (Excel)
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // En-têtes
            fputcsv($file, [
                'رقم تأجير',
                'الاسم و النسب',
                'الإطار',
                'نوع العملية',
                'الفترة',
                'ملاحظات',
                'Aref',
                'المديرية الإقليمية',
                'ملاحظات1',
                'تاريخ التسوية',
                'مبلغ التعويض',
                'تاريخ الالتحاق',
                'التسوية النهائية',
                'منفذة أو غير منفذة'
            ], ';');
            
            // Données
            foreach ($results as $jugement) {
                fputcsv($file, [
                    $jugement->{'رقم تأجير'} ?? '',
                    $jugement->{'الاسم و النسب'} ?? '',
                    $jugement->{'الإطار'} ?? '',
                    $jugement->{'نوع العملية'} ?? '',
                    $jugement->{'الفترة'} ?? '',
                    $jugement->{'ملاحظات'} ?? '',
                    $jugement->Aref ?? '',
                    $jugement->{'المديرية الإقليمية'} ?? '',
                    $jugement->{'ملاحظات1'} ?? '',
                    $jugement->{'تاريخ التسوية'} ?? '',
                    $jugement->{'مبلغ التعويض'} ?? '',
                    $jugement->{'تاريخ الالتحاق'} ?? '',
                    $jugement->{'التسوية النهائية'} ?? '',
                    $jugement->{'منفذة أو غير منفذة'} ? 'منفذة' : 'غير منفذة'
                ], ';');
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
