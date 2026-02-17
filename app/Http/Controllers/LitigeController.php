<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LitigeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $رقم_تأجير = $request->input('رقم_تأجير');
        $الاسم_و_النسب = $request->input('الاسم_و_النسب');
        $التسوية_النهائية = $request->input('التسوية_النهائية');
        $الإطار = $request->input('الإطار');
        $نوع_العملية = $request->input('نوع_العملية');
        $الفترة = $request->input('الفترة');
        $المديرية_الإقليمية = $request->input('المديرية_الإقليمية');
        $الاكاديمية = $request->input('الاكاديمية');
        $تاريخ_التسوية = $request->input('تاريخ_التسوية');
        $مبلغ_التعويض = $request->input('مبلغ_التعويض');
        $منفذة_أو_غير_منفذة = $request->input('منفذة_أو_غير_منفذة');
        $نوع_السجل = $request->input('نوع_السجل');
        $تاريخ_الالتحاق = $request->input('تاريخ_الالتحاق');
        $ملاحظات = $request->input('ملاحظات');
        $ملاحظات1 = $request->input('ملاحظات1');

        // Debug: Log search parameters
        \Log::info('Search parameters:', $request->all());

        $query = DB::table('jugement');
        
        // Debug: Log table count
        $totalCount = DB::table('jugement')->count();
        \Log::info('Total records in jugement table: ' . $totalCount);

        // Global search across all fields
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('رقم تأجير', 'like', "%{$search}%")
                  ->orWhere('الاسم و النسب', 'like', "%{$search}%")
                  ->orWhere('الإطار', 'like', "%{$search}%")
                  ->orWhere('نوع العملية', 'like', "%{$search}%")
                  ->orWhere('الفترة', 'like', "%{$search}%")
                  ->orWhere('المديرية الإقليمية', 'like', "%{$search}%")
                  ->orWhere('التسوية النهائية', 'like', "%{$search}%")
                  ->orWhere('ملاحظات', 'like', "%{$search}%")
                  ->orWhere('ملاحظات1', 'like', "%{$search}%")
                  ->orWhere('نوع السجل', 'like', "%{$search}%")
                  ->orWhere('نوع الملف', 'like', "%{$search}%");
            });
        }

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

        if (!empty($نوع_السجل)) {
            $query->where('نوع السجل', $نوع_السجل);
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

        // Debug: Log the SQL query
        \Log::info('SQL Query: ' . $query->toSql());
        \Log::info('Query bindings: ', $query->getBindings());

        // Get all data for export functionality
        $allData = $query->get();
        
        // Get paginated results (10 per page)
        $paginatedResults = $query->paginate(10)->appends($request->all());
        
        // Debug: Log result counts
        \Log::info('Total results count: ' . $allData->count());
        \Log::info('Paginated results count on current page: ' . $paginatedResults->count());

        return view('litiges.index', [
            'litiges' => $paginatedResults,
            'allData' => $allData,
            'inputs' => $request->all()
        ]);
    }

    public function create()
    {
        return view('litiges.create');
    }

    public function store(Request $request)
    {
        $type = $request->input('type', 'منازعة');

        if ($type == 'منازعة') {
            $data = $request->validate([
                'رقم_تأجير' => 'required',
                'الاسم_و_النسب' => 'required',
                'الإطار' => 'nullable',
                'نوع_العملية' => 'nullable',
                'الفترة' => 'nullable',
                'ملاحظات' => 'nullable',
                'المديرية_الإقليمية' => 'nullable',
                'الاكاديمية' => 'nullable',
                'ملاحظات1' => 'nullable',
                'تاريخ_التسوية' => 'nullable|date',
                'مبلغ_التعويض' => 'nullable|numeric',
                'تاريخ_الالتحاق' => 'nullable|date',
                'التسوية_النهائية' => 'nullable',
                'منفذة_أو_غير_منفذة' => 'nullable|boolean',
                'نوع_الملف' => 'nullable',
                'ادخل_الفترة' => 'nullable',
            ]);
        } elseif ($type == 'التظلم') {
            $data = $request->validate([
                'رقم_تأجير' => 'required',
                'الاسم_و_النسب' => 'required',
                'الإطار' => 'nullable',
                'نوع_العملية' => 'nullable',
                'الفترة' => 'nullable',
                'ملاحظات' => 'nullable',
                'المديرية_الإقليمية' => 'nullable',
                'الاكاديمية' => 'nullable',
                'تاريخ_استلام_التظلم' => 'nullable|date',
            ]);
        } elseif ($type == 'حكم قضائي') {
            $data = $request->validate([
                'رقم_تأجير' => 'required',
                'الاسم_و_النسب' => 'required',
                'الإطار' => 'nullable',
                'نوع_العملية' => 'nullable',
                'الفترة' => 'nullable',
                'ملاحظات' => 'nullable',
                'المديرية_الإقليمية' => 'nullable',
                'الاكاديمية' => 'nullable',
                'ملاحظات1' => 'nullable',
                'تاريخ_التسوية' => 'nullable|date',
                'مبلغ_التعويض' => 'nullable|numeric',
                'تاريخ_الالتحاق' => 'nullable|date',
                'التسوية_النهائية' => 'nullable',
                'منفذة_أو_غير_منفذة' => 'nullable|boolean',
                'تاريخ_صدور_الحكم_النهائي' => 'nullable|date',
                'نوع_الملف' => 'nullable',
                'ادخل_الفترة' => 'nullable',
            ]);
        }

        $insertData = [
            'رقم تأجير' => $data['رقم_تأجير'],
            'الاسم و النسب' => $data['الاسم_و_النسب'],
            'الإطار' => $data['الإطار'] ?? null,
            'نوع العملية' => $data['نوع_العملية'] ?? null,
            'الفترة' => $data['الفترة'] ?? null,
            'ملاحظات' => $data['ملاحظات'] ?? null,
            'المديرية الإقليمية' => $data['المديرية_الإقليمية'] ?? null,
            'الاكاديمية' => $data['الاكاديمية'] ?? null,
            'ملاحظات1' => $data['ملاحظات1'] ?? null,
            'تاريخ التسوية' => $data['تاريخ_التسوية'] ?? null,
            'تاريخ بداية المنازعة' => $data['تاريخ_بداية_المنازعة'] ?? null,
            'مبلغ التعويض' => $data['مبلغ_التعويض'] ?? null,
            'تاريخ الالتحاق' => $data['تاريخ_الالتحاق'] ?? null,
            'التسوية النهائية' => $data['التسوية_النهائية'] ?? null,
            'منفذة أو غير منفذة' => $data['منفذة_أو_غير_منفذة'] ?? null,
            'نوع السجل' => $type,
            'تاريخ استلام التظلم' => $data['تاريخ_استلام_التظلم'] ?? null,
            'تاريخ صدور الحكم النهائي' => $data['تاريخ_صدور_الحكم_النهائي'] ?? null,
            'نوع الملف' => $data['نوع_الملف'] ?? null,
            'ادخل الفترة' => $data['ادخل_الفترة'] ?? null,
        ];

        DB::table('jugement')->insert($insertData);

        return redirect()->route('litiges.index')->with('success', 'تمت إضافة النزاع بنجاح');
    }

    public function edit($id)
    {
        $litige = DB::table('jugement')->where('id', $id)->first();
        if (!$litige) {
            return redirect()->route('litiges.index')->with('error', 'النزاع غير موجود');
        }
        return view('litiges.edit', compact('litige'));
    }

    public function update(Request $request, $id)
    {
        $litige = DB::table('jugement')->where('id', $id)->first();
        $type = $litige->{'نوع السجل'} ?? 'منازعة';

        if ($type == 'منازعة') {
            $data = $request->validate([
                'رقم_تأجير' => 'required',
                'الاسم_و_النسب' => 'required',
                'الإطار' => 'nullable',
                'نوع_العملية' => 'nullable',
                'الفترة' => 'nullable',
                'ملاحظات' => 'nullable',
                'المديرية_الإقليمية' => 'nullable',
                'الاكاديمية' => 'nullable',
                'ملاحظات1' => 'nullable',
                'تاريخ_التسوية' => 'nullable|date',
                'تاريخ_بداية_المنازعة' => 'nullable|date',
                'مبلغ_التعويض' => 'nullable|numeric',
                'تاريخ_الالتحاق' => 'nullable|date',
                'التسوية_النهائية' => 'nullable',
                'منفذة_أو_غير_منفذة' => 'nullable|boolean',
            ]);
        } elseif ($type == 'التظلم') {
            $data = $request->validate([
                'رقم_تأجير' => 'required',
                'الاسم_و_النسب' => 'required',
                'الإطار' => 'nullable',
                'نوع_العملية' => 'nullable',
                'الفترة' => 'nullable',
                'ملاحظات' => 'nullable',
                'المديرية_الإقليمية' => 'nullable',
                'الاكاديمية' => 'nullable',
                'تاريخ_استلام_التظلم' => 'nullable|date',
            ]);
        } elseif ($type == 'حكم قضائي') {
            $data = $request->validate([
                'رقم_تأجير' => 'required',
                'الاسم_و_النسب' => 'required',
                'الإطار' => 'nullable',
                'نوع_العملية' => 'nullable',
                'الفترة' => 'nullable',
                'ملاحظات' => 'nullable',
                'المديرية_الإقليمية' => 'nullable',
                'الاكاديمية' => 'nullable',
                'ملاحظات1' => 'nullable',
                'تاريخ_التسوية' => 'nullable|date',
                'مبلغ_التعويض' => 'nullable|numeric',
                'تاريخ_الالتحاق' => 'nullable|date',
                'التسوية_النهائية' => 'nullable',
                'منفذة_أو_غير_منفذة' => 'nullable|boolean',
                'تاريخ_صدور_الحكم_النهائي' => 'nullable|date',
            ]);
        }

        $updateData = [
            'رقم تأجير' => $data['رقم_تأجير'],
            'الاسم و النسب' => $data['الاسم_و_النسب'],
            'الإطار' => $data['الإطار'] ?? null,
            'نوع العملية' => $data['نوع_العملية'] ?? null,
            'الفترة' => $data['الفترة'] ?? null,
            'ملاحظات' => $data['ملاحظات'] ?? null,
            'المديرية الإقليمية' => $data['المديرية_الإقليمية'] ?? null,
            'الاكاديمية' => $data['الاكاديمية'] ?? null,
            'ملاحظات1' => $data['ملاحظات1'] ?? null,
            'تاريخ التسوية' => $data['تاريخ_التسوية'] ?? null,
            'تاريخ بداية المنازعة' => $data['تاريخ_بداية_المنازعة'] ?? null,
            'مبلغ التعويض' => $data['مبلغ_التعويض'] ?? null,
            'تاريخ الالتحاق' => $data['تاريخ_الالتحاق'] ?? null,
            'التسوية النهائية' => $data['التسوية_النهائية'] ?? null,
            'منفذة أو غير منفذة' => $data['منفذة_أو_غير_منفذة'] ?? null,
            'نوع السجل' => $type,
            'تاريخ استلام التظلم' => $data['تاريخ_استلام_التظلم'] ?? null,
            'تاريخ صدور الحكم النهائي' => $data['تاريخ_صدور_الحكم_النهائي'] ?? null,
            'نوع الملف' => $data['نوع_الملف'] ?? null,
            'ادخل الفترة' => $data['ادخل_الفترة'] ?? null,
        ];

        $updated = DB::table('jugement')->where('id', $id)->update($updateData);

        if (!$updated) {
            return redirect()->route('litiges.index')->with('error', 'لم يتم تحديث النزاع');
        }

        return redirect()->route('litiges.index')->with('success', 'تم تحديث النزاع بنجاح');
    }

    public function destroy($id)
    {
        DB::table('jugement')->where('id', $id)->delete();
        return redirect()->route('litiges.index')->with('success', 'تم حذف النزاع');
    }

    public function fetchByRentalNumber($rentalNumber)
    {
        $litige = DB::table('jugement')
            ->where('رقم تأجير', $rentalNumber)
            ->orderBy('id', 'desc')
            ->first();

        if ($litige) {
            return response()->json([
                'success' => true,
                'data' => [
                    'الاسم_و_النسب' => $litige->{'الاسم و النسب'},
                    'الإطار' => $litige->{'الإطار'},
                    'المديرية_الإقليمية' => $litige->{'المديرية الإقليمية'},
                    'الاكاديمية' => $litige->{'الاكاديمية'} ?? '',
                ]
            ]);
        }

        return response()->json(['success' => false, 'message' => 'No data found for this rental number']);
    }

    public function fetchByName($name)
    {
        $decodedName = urldecode($name);
        
        $litige = DB::table('jugement')
            ->where('الاسم و النسب', 'like', "%{$decodedName}%")
            ->orderBy('id', 'desc')
            ->first();

        if ($litige) {
            return response()->json([
                'success' => true,
                'data' => [
                    'رقم_تأجير' => $litige->{'رقم تأجير'} ?? '',
                    'الإطار' => $litige->{'الإطار'} ?? '',
                    'المديرية_الإقليمية' => $litige->{'المديرية الإقليمية'} ?? '',
                    'الاكاديمية' => $litige->{'الاكاديمية'} ?? '',
                ]
            ]);
        }

        return response()->json([
            'success' => false, 
            'message' => 'No data found for this name'
        ]);
    }

    public function export(Request $request)
    {
        $search = $request->input('search');
        $رقم_تأجير = $request->input('رقم_تأجير');
        $الاسم_و_النسب = $request->input('الاسم_و_النسب');
        $التسوية_النهائية = $request->input('التسوية_النهائية');
        $الإطار = $request->input('الإطار');
        $نوع_العملية = $request->input('نوع_العملية');
        $الفترة = $request->input('الفترة');
        $المديرية_الإقليمية = $request->input('المديرية_الإقليمية');
        $الاكاديمية = $request->input('الاكاديمية');
        $تاريخ_التسوية = $request->input('تاريخ_التسوية');
        $مبلغ_التعويض = $request->input('مبلغ_التعويض');
        $منفذة_أو_غير_منفذة = $request->input('منفذة_أو_غير_منفذة');
        $نوع_السجل = $request->input('نوع_السجل');
        $تاريخ_الالتحاق = $request->input('تاريخ_الالتحاق');
        $ملاحظات = $request->input('ملاحظات');
        $ملاحظات1 = $request->input('ملاحظات1');

        $query = DB::table('jugement');

        // Global search across all fields
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('رقم تأجير', 'like', "%{$search}%")
                  ->orWhere('الاسم و النسب', 'like', "%{$search}%")
                  ->orWhere('الإطار', 'like', "%{$search}%")
                  ->orWhere('نوع العملية', 'like', "%{$search}%")
                  ->orWhere('الفترة', 'like', "%{$search}%")
                  ->orWhere('المديرية الإقليمية', 'like', "%{$search}%")
                  ->orWhere('التسوية النهائية', 'like', "%{$search}%")
                  ->orWhere('ملاحظات', 'like', "%{$search}%")
                  ->orWhere('ملاحظات1', 'like', "%{$search}%")
                  ->orWhere('نوع السجل', 'like', "%{$search}%")
                  ->orWhere('نوع الملف', 'like', "%{$search}%");
            });
        }

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

        if (!empty($نوع_السجل)) {
            $query->where('نوع السجل', $نوع_السجل);
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

        $filename = 'litiges_' . date('Y-m-d_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($results) {
            $file = fopen('php://output', 'w');

            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            fputcsv($file, [
                'رقم تأجير',
                'الاسم و النسب',
                'الإطار',
                'نوع العملية',
                'الفترة',
                'ملاحظات',
                'الاكاديمية',
                'المديرية الإقليمية',
                'ملاحظات1',
                'تاريخ التسوية',
                'تاريخ بداية المنازعة',
                'مبلغ التعويض',
                'تاريخ الالتحاق',
                'التسوية النهائية',
                'منفذة أو غير منفذة',
                'نوع السجل',
                'تاريخ استلام التظلم',
                'تاريخ صدور الحكم النهائي',
                'نوع الملف',
                'ادخل الفترة'
            ], ';');

            foreach ($results as $litige) {
                fputcsv($file, [
                    $litige->{'رقم تأجير'} ?? '',
                    $litige->{'الاسم و النسب'} ?? '',
                    $litige->{'الإطار'} ?? '',
                    $litige->{'نوع العملية'} ?? '',
                    $litige->{'الفترة'} ?? '',
                    $litige->{'ملاحظات'} ?? '',
                    $litige->{'الاكاديمية'} ?? '',
                    $litige->{'المديرية الإقليمية'} ?? '',
                    $litige->{'ملاحظات1'} ?? '',
                    $litige->{'تاريخ التسوية'} ?? '',
                    $litige->{'تاريخ بداية المنازعة'} ?? '',
                    $litige->{'مبلغ التعويض'} ?? '',
                    $litige->{'تاريخ الالتحاق'} ?? '',
                    $litige->{'التسوية النهائية'} ?? '',
                    $litige->{'منفذة أو غير منفذة'} ? 'منفذة' : 'غير منفذة',
                    $litige->{'نوع السجل'} ?? '',
                    $litige->{'تاريخ استلام التظلم'} ?? '',
                    $litige->{'تاريخ صدور الحكم النهائي'} ?? '',
                    $litige->{'نوع الملف'} ?? '',
                    $litige->{'ادخل الفترة'} ?? ''
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
