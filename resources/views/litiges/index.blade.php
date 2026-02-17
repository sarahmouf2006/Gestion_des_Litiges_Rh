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
                    <div class="col-12 mb-3">
                        <label for="search" class="form-label">بحث عام (في جميع الحقول):</label>
                        <input type="text" name="search" id="search" 
                               class="form-control form-control-lg" 
                               value="{{ $inputs['search'] ?? '' }}"
                               placeholder="أدخل كلمة للبحث في جميع الحقول...">
                    </div>
                    <div class="col-md-3">
                        <label for="رقم_تأجير" class="form-label">رقم تأجير:</label>
                        <input type="text" name="رقم_تأجير" id="رقم_تأجير" 
                               class="form-control" 
                               value="{{ $inputs['رقم_تأجير'] ?? '' }}"
                               placeholder="أدخل رقم التأجير">
                    </div>

                    <div class="col-md-3">
                        <label for="الاسم_و_النسب" class="form-label">الاسم و النسب:</label>
                        <input type="text" name="الاسم_و_النسب" id="الاسم_و_النسب" 
                               class="form-control" 
                               value="{{ $inputs['الاسم_و_النسب'] ?? '' }}"
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
                            <input type="text" name="نوع_العملية" id="نوع_العملية" 
                                   class="form-control" 
                                   value="{{ $inputs['نوع_العملية'] ?? '' }}"
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
                        <input type="text" name="المديرية_الإقليمية" id="المديرية_الإقليمية" 
                               class="form-control" 
                               value="{{ $inputs['المديرية_الإقليمية'] ?? '' }}"
                               placeholder="أدخل المديرية الإقليمية">
                    </div>

                        <div class="col-md-3">
                            <label for="الاكاديمية" class="form-label">الاكاديمية:</label>
                            <input type="text" name="الاكاديمية" id="الاكاديمية"
                                   class="form-control"
                                   value="{{ $inputs['الاكاديمية'] ?? '' }}"
                                   placeholder="أدخل الاكاديمية">
                        </div>
                    <div class="col-md-3">
                        <label for="تاريخ_التسوية" class="form-label">تاريخ التسوية:</label>
                        <input type="date" name="تاريخ_التسوية" id="تاريخ_التسوية" 
                               class="form-control" 
                               value="{{ $inputs['تاريخ_التسوية'] ?? '' }}">
                    </div>

                    <div class="col-md-3">
                        <label for="مبلغ_التعويض" class="form-label">مبلغ التعويض (من):</label>
                        <input type="number" name="مبلغ_التعويض" id="مبلغ_التعويض" 
                               class="form-control" 
                               value="{{ $inputs['مبلغ_التعويض'] ?? '' }}"
                               placeholder="أدخل الحد الأدنى">
                    </div>

                    <div class="col-md-3">
                        <label for="التسوية_النهائية" class="form-label">التسوية النهائية:</label>
                        <input type="text" name="التسوية_النهائية" id="التسوية_النهائية" 
                               class="form-control" 
                               value="{{ $inputs['التسوية_النهائية'] ?? '' }}"
                               placeholder="أدخل التسوية النهائية">
                    </div>

                    <div class="col-md-3">
                        <label for="منفذة_أو_غير_منفذة" class="form-label">منفذة أو غير منفذة:</label>
                        <select name="منفذة_أو_غير_منفذة" id="منفذة_أو_غير_منفذة" class="form-control">
                            <option value="">الكل</option>
                            <option value="1" {{ isset($inputs['منفذة_أو_غير_منفذة']) && $inputs['منفذة_أو_غير_منفذة'] == '1' ? 'selected' : '' }}>منفذة</option>
                            <option value="0" {{ isset($inputs['منفذة_أو_غير_منفذة']) && $inputs['منفذة_أو_غير_منفذة'] == '0' ? 'selected' : '' }}>غير منفذة</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="نوع_السجل" class="form-label">نوع السجل:</label>
                        <select name="نوع_السجل" id="نوع_السجل" class="form-control">
                            <option value="">الكل</option>
                            <option value="منازعة" {{ isset($inputs['نوع_السجل']) && $inputs['نوع_السجل'] == 'منازعة' ? 'selected' : '' }}>منازعة</option>
                            <option value="التظلم" {{ isset($inputs['نوع_السجل']) && $inputs['نوع_السجل'] == 'التظلم' ? 'selected' : '' }}>تظلم</option>
                            <option value="حكم قضائي" {{ isset($inputs['نوع_السجل']) && $inputs['نوع_السجل'] == 'حكم قضائي' ? 'selected' : '' }}>حكم قضائي</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="تاريخ_الالتحاق" class="form-label">تاريخ الالتحاق:</label>
                        <input type="date" name="تاريخ_الالتحاق" id="تاريخ_الالتحاق"
                               class="form-control"
                               value="{{ $inputs['تاريخ_الالتحاق'] ?? '' }}">
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
                <div class="d-flex gap-2 flex-wrap">
                    <a href="{{ route('litiges.create', ['type' => 'منازعة']) }}" class="btn btn-success" title="إضافة منازعة">
                        <i class="fas fa-plus-circle me-2"></i>إضافة منازعة
                    </a>
                    <a href="{{ route('litiges.create', ['type' => 'التظلم']) }}" class="btn btn-warning" title="إضافة تظلم">
                        <i class="fas fa-plus-circle me-2"></i>إضافة تظلم
                    </a>
                    <a href="{{ route('litiges.create', ['type' => 'حكم قضائي']) }}" class="btn btn-info" title="إضافة حكم قضائي">
                        <i class="fas fa-plus-circle me-2"></i>إضافة حكم قضائي
                    </a>
                </div>
                <div class="d-flex gap-2">
                    @if(isset($litiges) && $litiges->count() > 0)
                        <a href="{{ route('litiges.export', request()->query()) }}" class="btn btn-info" title="تصدير القائمة">
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
                <!-- Pagination Top -->
                @if(isset($litiges) && $litiges->count() > 0)
                <div class="pagination-container-top d-flex justify-content-between align-items-center p-3 border-bottom">
                    <div class="pagination-info">
                        <span class="text-muted">
                            عرض <strong>{{ $litiges->firstItem() }}</strong> إلى <strong>{{ $litiges->lastItem() }}</strong> من <strong>{{ $litiges->total() }}</strong> نتيجة
                        </span>
                    </div>
                    <div class="pagination-nav d-flex align-items-center gap-2">
                        <!-- Previous Button -->
                        @if($litiges->onFirstPage())
                            <button class="btn btn-outline-secondary btn-sm" disabled>
                                <i class="fas fa-chevron-right me-1"></i>السابق
                            </button>
                        @else
                            <a href="{{ $litiges->previousPageUrl() }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-chevron-right me-1"></i>السابق
                            </a>
                        @endif
                        
                        <!-- Page Numbers -->
                        <div class="pagination-numbers">
                            {{ $litiges->links('pagination::bootstrap-4') }}
                        </div>
                        
                        <!-- Next Button -->
                        @if($litiges->hasMorePages())
                            <a href="{{ $litiges->nextPageUrl() }}" class="btn btn-outline-primary btn-sm">
                                التالي<i class="fas fa-chevron-left ms-1"></i>
                            </a>
                        @else
                            <button class="btn btn-outline-secondary btn-sm" disabled>
                                التالي<i class="fas fa-chevron-left ms-1"></i>
                            </button>
                        @endif
                    </div>
                    <div class="export-btn">
                        <a href="{{ route('litiges.export', request()->query()) }}" class="btn btn-success btn-sm" title="تصدير">
                            <i class="fas fa-file-export me-1"></i>تصدير ({{ $allData->count() }})
                        </a>
                    </div>
                </div>
                @endif
                
                <div class="table-container">
                    <table class="table table-hover table-striped" id="litigesTable">
                        <thead>
                            <tr>
                                <th>رقم تأجير</th>
                                <th>الاسم و النسب</th>
                                <th>الإطار</th>
                                <th>نوع العملية</th>
                                <th>الفترة</th>
                                <th>ملاحظات</th>
                                <th>الاكاديمية</th>
                                <th>المديرية الإقليمية</th>
                                <th>ملاحظات1</th>
                                <th>تاريخ التسوية</th>
                                <th>مبلغ التعويض</th>
                                <th>تاريخ الالتحاق</th>
                                <th>التسوية النهائية</th>
                                <th>نوع السجل</th>
                                <th>منفذة أو غير منفذة</th>
                                <th>تاريخ استلام التظلم</th>
                                <th>تاريخ صدور الحكم النهائي</th>
                                <th>نوع الملف</th>
                                <th>ادخل الفترة</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($litiges) && $litiges->count() > 0)
                                @foreach($litiges as $index => $litige)
                                <tr>
                                    <td>{{ $litige->{'رقم تأجير'} }}</td>
                                    <td>{{ $litige->{'الاسم و النسب'} }}</td>
                                    <td>{{ $litige->{'الإطار'} }}</td>
                                    <td>{{ $litige->{'نوع العملية'} }}</td>
                                    <td>{{ $litige->{'الفترة'} }}</td>
                                    <td>{{ $litige->{'ملاحظات'} }}</td>
                                    <td>{{ $litige->{'الاكاديمية'} ?? '' }}</td>
                                    <td>{{ $litige->{'المديرية الإقليمية'} }}</td>
                                    <td>{{ $litige->{'ملاحظات1'} }}</td>
                                    <td>{{ $litige->{'تاريخ التسوية'} }}</td>
                                    <td>{{ $litige->{'مبلغ التعويض'} }}</td>
                                    <td>{{ $litige->{'تاريخ الالتحاق'} }}</td>
                                    <td>{{ $litige->{'التسوية النهائية'} }}</td>
                                    <td>{{ $litige->{'نوع السجل'} }}</td>
                                    <td>
                                        @if($litige->{'منفذة أو غير منفذة'})
                                            <span class="badge bg-success">منفذة</span>
                                        @else
                                            <span class="badge bg-danger">غير منفذة</span>
                                        @endif
                                    </td>
                                    <td>{{ $litige->{'تاريخ استلام التظلم'} }}</td>
                                    <td>{{ $litige->{'تاريخ صدور الحكم النهائي'} }}</td>
                                    <td>{{ $litige->{'نوع الملف'} }}</td>
                                    <td>{{ $litige->{'ادخل الفترة'} }}</td>
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
                                    <td colspan="20" class="text-center py-5">
                                        <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                                        <p class="text-muted fw-bold">لا توجد نتائج للعرض</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination Bottom -->
                @if(isset($litiges) && $litiges->count() > 0 && $litiges->hasPages())
                <div class="pagination-container-bottom d-flex justify-content-center align-items-center p-3 border-top">
                    <div class="pagination-nav d-flex align-items-center gap-2">
                        <!-- Previous Button -->
                        @if($litiges->onFirstPage())
                            <button class="btn btn-outline-secondary btn-sm" disabled>
                                <i class="fas fa-chevron-right me-1"></i>السابق
                            </button>
                        @else
                            <a href="{{ $litiges->previousPageUrl() }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-chevron-right me-1"></i>السابق
                            </a>
                        @endif
                        
                        <!-- Page Numbers -->
                        <div class="pagination-numbers">
                            {{ $litiges->links('pagination::bootstrap-4') }}
                        </div>
                        
                        <!-- Next Button -->
                        @if($litiges->hasMorePages())
                            <a href="{{ $litiges->nextPageUrl() }}" class="btn btn-outline-primary btn-sm">
                                التالي<i class="fas fa-chevron-left ms-1"></i>
                            </a>
                        @else
                            <button class="btn btn-outline-secondary btn-sm" disabled>
                                التالي<i class="fas fa-chevron-left ms-1"></i>
                            </button>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function clearTableAndInputs() {
    window.location.href = '{{ route("litiges.index") }}';
}

// Auto-fill functionality for رقم تأجير in search form from localStorage
document.getElementById('رقم_تأجير').addEventListener('input', function(e) {
    // Don't prevent default - let the form submit normally
    var rentalNumber = this.value.trim();
    if (rentalNumber !== '') {
        const stored = localStorage.getItem('litige_' + rentalNumber);
        if (stored) {
            const data = JSON.parse(stored);
            const fields = {
                'الاسم_و_النسب': data.الاسم_و_النسب,
                'الإطار': data.الإطار,
                'المديرية_الإقليمية': data.المديرية_الإقليمية,
                'الاكاديمية': data.الاكاديمية,
                'نوع_العملية': data.نوع_العملية,
                'الفترة': data.الفترة,
                'تاريخ_التسوية': data.تاريخ_التسوية,
                'مبلغ_التعويض': data.مبلغ_التعويض,
                'التسوية_النهائية': data.التسوية_النهائية,
                'منفذة_أو_غير_منفذة': data.منفذة_أو_غير_منفذة,
                'تاريخ_الالتحاق': data.تاريخ_الالتحاق,
                'ملاحظات': data.ملاحظات,
                'ملاحظات1': data.ملاحظات1
            };
            
            Object.keys(fields).forEach(function(fieldId) {
                const field = document.getElementById(fieldId);
                const value = fields[fieldId];
                if (field && value) {
                    field.value = value;
                }
            });
        }
    }
});

// Ensure form submits properly
document.querySelector('.search-form').addEventListener('submit', function(e) {
    // Form will submit normally - no preventDefault
    console.log('Search form submitting...');
});
</script>
@endpush
@endsection
