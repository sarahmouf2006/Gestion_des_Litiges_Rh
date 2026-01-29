@extends('layouts.app')

@section('title', 'Gestion des Litiges')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Search Form Card -->
            <div class="card-modern mb-4">
                <h2 class="text-center mb-4">
                    <i class="fas fa-search me-2"></i>بحث في النزاعات
                </h2>
                <form action="{{ route('litiges.index') }}" method="GET" class="search-form">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="رقم_تأجير" class="form-label">رقم تأجير:</label>
                            <input type="text" name="رقم تأجير" id="رقم_تأجير" 
                                   class="form-control" 
                                   value="{{ $inputs['رقم تأجير'] ?? '' }}"
                                   placeholder="أدخل رقم التأجير">
                        </div>
                        <div class="col-md-3">
                            <label for="الاسم_و_النسب" class="form-label">الاسم و النسب:</label>
                            <input type="text" name="الاسم و النسب" id="الاسم_و_النسب" 
                                   class="form-control" 
                                   value="{{ $inputs['الاسم و النسب'] ?? '' }}"
                                   placeholder="أدخل الاسم الكامل">
                        </div>
                        <div class="col-md-3">
                            <label for="الإطار" class="form-label">الإطار:</label>
                            <input type="text" name="الإطار" id="الإطار" 
                                   class="form-control" 
                                   value="{{ $inputs['الإطار'] ?? '' }}"
                                   placeholder="أدخل الإطار">
                        </div>
                        <div class="col-md-3">
                            <label for="نوع_العملية" class="form-label">نوع العملية:</label>
                            <input type="text" name="نوع العملية" id="نوع_العملية" 
                                   class="form-control" 
                                   value="{{ $inputs['نوع العملية'] ?? '' }}"
                                   placeholder="أدخل نوع العملية">
                        </div>
                        <div class="col-md-3">
                            <label for="الفترة" class="form-label">الفترة:</label>
                            <input type="text" name="الفترة" id="الفترة" 
                                   class="form-control" 
                                   value="{{ $inputs['الفترة'] ?? '' }}"
                                   placeholder="أدخل الفترة">
                        </div>
                        <div class="col-md-3">
                            <label for="المديرية_الإقليمية" class="form-label">المديرية الإقليمية:</label>
                            <input type="text" name="المديرية الإقليمية" id="المديرية_الإقليمية" 
                                   class="form-control" 
                                   value="{{ $inputs['المديرية الإقليمية'] ?? '' }}"
                                   placeholder="أدخل المديرية الإقليمية">
                        </div>
                        <div class="col-md-3">
                            <label for="تاريخ_التسوية" class="form-label">تاريخ التسوية:</label>
                            <input type="date" name="تاريخ التسوية" id="تاريخ_التسوية" 
                                   class="form-control" 
                                   value="{{ $inputs['تاريخ التسوية'] ?? '' }}">
                        </div>
                        <div class="col-md-3">
                            <label for="مبلغ_التعويض" class="form-label">مبلغ التعويض (من):</label>
                            <input type="number" name="مبلغ التعويض" id="مبلغ_التعويض" 
                                   class="form-control" 
                                   value="{{ $inputs['مبلغ التعويض'] ?? '' }}"
                                   placeholder="أدخل الحد الأدنى">
                        </div>
                        <div class="col-md-3">
                            <label for="التسوية_النهائية" class="form-label">التسوية النهائية:</label>
                            <input type="text" name="التسوية النهائية" id="التسوية_النهائية" 
                                   class="form-control" 
                                   value="{{ $inputs['التسوية النهائية'] ?? '' }}"
                                   placeholder="أدخل التسوية النهائية">
                        </div>
                        <div class="col-md-3">
                            <label for="منفذة_أو_غير_منفذة" class="form-label">منفذة أو غير منفذة:</label>
                            <select name="منفذة أو غير منفذة" id="منفذة_أو_غير_منفذة" class="form-control">
                                <option value="">الكل</option>
                                <option value="1" {{ isset($inputs['منفذة أو غير منفذة']) && $inputs['منفذة أو غير منفذة'] == '1' ? 'selected' : '' }}>منفذة</option>
                                <option value="0" {{ isset($inputs['منفذة أو غير منفذة']) && $inputs['منفذة أو غير منفذة'] == '0' ? 'selected' : '' }}>غير منفذة</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="Aref" class="form-label">Aref:</label>
                            <input type="text" name="Aref" id="Aref"
                                   class="form-control"
                                   value="{{ $inputs['Aref'] ?? '' }}"
                                   placeholder="أدخل Aref">
                        </div>
                        <div class="col-md-3">
                            <label for="تاريخ_الالتحاق" class="form-label">تاريخ الالتحاق:</label>
                            <input type="date" name="تاريخ الالتحاق" id="تاريخ_الالتحاق"
                                   class="form-control"
                                   value="{{ $inputs['تاريخ الالتحاق'] ?? '' }}">
                        </div>
                        <div class="col-md-3">
                            <label for="ملاحظات" class="form-label">ملاحظات:</label>
                            <input type="text" name="ملاحظات" id="ملاحظات"
                                   class="form-control"
                                   value="{{ $inputs['ملاحظات'] ?? '' }}"
                                   placeholder="أدخل الملاحظات">
                        </div>
                        <div class="col-md-3">
                            <label for="ملاحظات1" class="form-label">ملاحظات1:</label>
                            <input type="text" name="ملاحظات1" id="ملاحظات1"
                                   class="form-control"
                                   value="{{ $inputs['ملاحظات1'] ?? '' }}"
                                   placeholder="أدخل الملاحظات1">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search me-2"></i>بحث
                            </button>
                            <a href="{{ route('litiges.index') }}" class="btn btn-secondary">
                                <i class="fas fa-redo me-2"></i>إعادة تعيين
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <a href="{{ route('jugement.create') }}" class="btn btn-success" title="إضافة قضية جديدة">
                    <i class="fas fa-plus-circle me-2"></i>إضافة قضية جديدة
                </a>
                <div class="d-flex gap-2">
                    @if(isset($jugements) && $jugements->count() > 0)
                        <a href="{{ route('jugement.export', request()->query()) }}" class="btn btn-info" title="تصدير القائمة">
                            <i class="fas fa-file-export me-2"></i>تصدير القائمة
                        </a>
                    @endif
                    <button type="button" onclick="clearTableAndInputs()" class="btn btn-secondary">
                        <i class="fas fa-eraser me-2"></i>مسح
                    </button>
                </div>
            </div>

            <!-- Table Card -->
            <div class="card-modern">
                <div class="table-container">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>رقم تأجير</th>
                                <th>الاسم و النسب</th>
                                <th>الإطار</th>
                                <th>نوع العملية</th>
                                <th>الفترة</th>
                                <th>ملاحظات</th>
                                <th>Aref</th>
                                <th>المديرية الإقليمية</th>
                                <th>ملاحظات1</th>
                                <th>تاريخ التسوية</th>
                                <th>مبلغ التعويض</th>
                                <th>تاريخ الالتحاق</th>
                                <th>التسوية النهائية</th>
                                <th>منفذة أو غير منفذة</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($litiges) && $litiges->count() > 0)
                                @foreach($litiges as $litige)
                                <tr>
                                    <td>{{ $litige->{'رقم تأجير'} }}</td>
                                    <td>{{ $litige->{'الاسم و النسب'} }}</td>
                                    <td>{{ $litige->{'الإطار'} }}</td>
                                    <td>{{ $litige->{'نوع العملية'} }}</td>
                                    <td>{{ $litige->{'الفترة'} }}</td>
                                    <td>{{ $litige->{'ملاحظات'} }}</td>
                                    <td>{{ $litige->Aref }}</td>
                                    <td>{{ $litige->{'المديرية الإقليمية'} }}</td>
                                    <td>{{ $litige->{'ملاحظات1'} }}</td>
                                    <td>{{ $litige->{'تاريخ التسوية'} }}</td>
                                    <td>{{ $litige->{'مبلغ التعويض'} }}</td>
                                    <td>{{ $litige->{'تاريخ الالتحاق'} }}</td>
                                    <td>{{ $litige->{'التسوية النهائية'} }}</td>
                                    <td>
                                        @if($litige->{'منفذة أو غير منفذة'})
                                            <span class="badge bg-success">منفذة</span>
                                        @else
                                            <span class="badge bg-danger">غير منفذة</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="{{ route('litiges.edit', $litige->id) }}"
                                               class="btn btn-warning btn-sm"
                                               title="تعديل">
                                                <i class="fas fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('litiges.destroy', $litige->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('هل أنت متأكد من حذف هذا النزاع؟');"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-danger btn-sm"
                                                        title="حذف">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="15" class="text-center py-5">
                                        <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                                        <p class="text-muted fw-bold">لا توجد نتائج للعرض</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function clearTableAndInputs() {
    // Clear search inputs
    document.getElementById('رقم_تأجير').value = '';
    document.getElementById('الاسم_و_النسب').value = '';
    document.getElementById('التسوية_النهائية').value = '';
    document.getElementById('الإطار').value = '';
    document.getElementById('نوع_العملية').value = '';
    document.getElementById('الفترة').value = '';
    document.getElementById('المديرية_الإقليمية').value = '';
    document.getElementById('تاريخ_التسوية').value = '';
    document.getElementById('مبلغ_التعويض').value = '';
    document.getElementById('منفذة_أو_غير_منفذة').value = '';

    // Redirect to clear filters
    window.location.href = '{{ route("jugement.index") }}';
}
</script>
@endpush
@endsection
