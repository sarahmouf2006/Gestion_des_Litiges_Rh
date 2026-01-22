@extends('layouts.app')

@section('title', 'Gestion des Jugements')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Search Form Card -->
            <div class="card-modern mb-4">
                <h2 class="text-center mb-4">
                    <i class="fas fa-search me-2"></i>بحث في القضايا
                </h2>
                <form action="{{ route('jugement.index') }}" method="GET" class="search-form">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="رقم_تأجير" class="form-label">رقم تأجير:</label>
                            <input type="text" name="رقم تأجير" id="رقم_تأجير" 
                                   class="form-control" 
                                   value="{{ $inputs['رقم تأجير'] ?? '' }}"
                                   placeholder="أدخل رقم التأجير">
                        </div>
                        <div class="col-md-4">
                            <label for="الاسم_و_النسب" class="form-label">الاسم و النسب:</label>
                            <input type="text" name="الاسم و النسب" id="الاسم_و_النسب" 
                                   class="form-control" 
                                   value="{{ $inputs['الاسم و النسب'] ?? '' }}"
                                   placeholder="أدخل الاسم الكامل">
                        </div>
                        <div class="col-md-4">
                            <label for="التسوية_النهائية" class="form-label">التسوية النهائية:</label>
                            <input type="text" name="التسوية النهائية" id="التسوية_النهائية" 
                                   class="form-control" 
                                   value="{{ $inputs['التسوية النهائية'] ?? '' }}"
                                   placeholder="أدخل التسوية النهائية">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search me-2"></i>بحث
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <a href="{{ route('jugement.create') }}" class="btn btn-success" title="إضافة قضية جديدة">
                    <i class="fas fa-plus-circle me-2"></i>إضافة قضية جديدة
                </a>
                <button type="button" onclick="clearTableAndInputs()" class="btn btn-secondary">
                    <i class="fas fa-eraser me-2"></i>مسح
                </button>
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
                            @if(isset($jugements) && $jugements->count() > 0)
                                @foreach($jugements as $jugement)
                                <tr>
                                    <td>{{ $jugement->{'رقم تأجير'} }}</td>
                                    <td>{{ $jugement->{'الاسم و النسب'} }}</td>
                                    <td>{{ $jugement->{'الإطار'} }}</td>
                                    <td>{{ $jugement->{'نوع العملية'} }}</td>
                                    <td>{{ $jugement->{'الفترة'} }}</td>
                                    <td>{{ $jugement->{'ملاحظات'} }}</td>
                                    <td>{{ $jugement->Aref }}</td>
                                    <td>{{ $jugement->{'المديرية الإقليمية'} }}</td>
                                    <td>{{ $jugement->{'ملاحظات1'} }}</td>
                                    <td>{{ $jugement->{'تاريخ التسوية'} }}</td>
                                    <td>{{ $jugement->{'مبلغ التعويض'} }}</td>
                                    <td>{{ $jugement->{'تاريخ الالتحاق'} }}</td>
                                    <td>{{ $jugement->{'التسوية النهائية'} }}</td>
                                    <td>
                                        @if($jugement->{'منفذة أو غير منفذة'})
                                            <span class="badge bg-success">منفذة</span>
                                        @else
                                            <span class="badge bg-danger">غير منفذة</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="{{ route('jugement.edit', $jugement->id) }}" 
                                               class="btn btn-warning btn-sm" 
                                               title="تعديل">
                                                <i class="fas fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('jugement.destroy', $jugement->id) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('هل أنت متأكد من حذف هذه القضية؟');"
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

    // Clear table tbody
    const tbody = document.querySelector('table tbody');
    tbody.innerHTML = `<tr>
        <td colspan="15" class="text-center py-5">
            <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
            <p class="text-muted fw-bold">لا توجد نتائج للعرض</p>
        </td>
    </tr>`;
}
</script>
@endpush
@endsection
