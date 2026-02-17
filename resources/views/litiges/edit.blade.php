@extends('layouts.app')

@section('title', 'تعديل النزاع')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="card-modern">
                <h2 class="text-center mb-4">
                    <i class="fas fa-edit me-2"></i>تعديل النزاع
                </h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>تم اكتشاف أخطاء:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('litiges.update', $litige->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="type" value="{{ $litige->{'نوع السجل'} }}">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="رقم_تأجير" class="form-label">رقم تأجير:</label>
                            <input type="text"
                                   id="رقم_تأجير"
                                   name="رقم_تأجير"
                                   class="form-control"
                                   value="{{ old('رقم_تأجير', $litige->{'رقم تأجير'}) }}"
                                   required
                                   placeholder="أدخل رقم التأجير">
                        </div>

                        <div class="col-md-6">
                            <label for="الاسم_و_النسب" class="form-label">الاسم و النسب:</label>
                            <input type="text"
                                   id="الاسم_و_النسب"
                                   name="الاسم_و_النسب"
                                   class="form-control"
                                   value="{{ old('الاسم_و_النسب', $litige->{'الاسم و النسب'}) }}"
                                   required
                                   placeholder="أدخل الاسم الكامل">
                        </div>

                        <div class="col-md-6">
                            <label for="الإطار" class="form-label">الإطار:</label>
                            <input type="text"
                                   id="الإطار"
                                   name="الإطار"
                                   class="form-control"
                                   value="{{ old('الإطار', $litige->{'الإطار'}) }}"
                                   placeholder="أدخل الإطار">
                        </div>

                        <div class="col-md-6">
                            <label for="نوع_العملية" class="form-label">نوع العملية:</label>
                            <input type="text"
                                   id="نوع_العملية"
                                   name="نوع_العملية"
                                   class="form-control"
                                   value="{{ old('نوع_العملية', $litige->{'نوع العملية'}) }}"
                                   placeholder="أدخل نوع العملية">
                        </div>

                        <div class="col-md-6">
                            <label for="الفترة" class="form-label">الفترة:</label>
                            <input type="text"
                                   id="الفترة"
                                   name="الفترة"
                                   class="form-control"
                                   value="{{ old('الفترة', $litige->{'الفترة'}) }}"
                                   placeholder="أدخل الفترة">
                        </div>

                        <div class="col-md-6">
                            <label for="ملاحظات" class="form-label">ملاحظات:</label>
                            <input type="text"
                                   id="ملاحظات"
                                   name="ملاحظات"
                                   class="form-control"
                                   value="{{ old('ملاحظات', $litige->{'ملاحظات'}) }}"
                                   placeholder="أدخل الملاحظات">
                        </div>

                        <div class="col-md-6">
                            <label for="المديرية_الإقليمية" class="form-label">المديرية الإقليمية:</label>
                            <input type="text"
                                   id="المديرية_الإقليمية"
                                   name="المديرية_الإقليمية"
                                   class="form-control"
                                   value="{{ old('المديرية_الإقليمية', $litige->{'المديرية الإقليمية'}) }}"
                                   placeholder="أدخل المديرية الإقليمية">
                        </div>



                        @if($litige->{'نوع السجل'} == 'التظلم')
                        <div class="col-md-6">
                            <label for="تاريخ_استلام_التظلم" class="form-label">تاريخ استلام التظلم:</label>
                            <input type="date"
                                   id="تاريخ_استلام_التظلم"
                                   name="تاريخ_استلام_التظلم"
                                   class="form-control"
                                   value="{{ old('تاريخ_استلام_التظلم', $litige->{'تاريخ استلام التظلم'}) }}">
                        </div>
                        @endif

                        @if($litige->{'نوع السجل'} == 'منازعة' || $litige->{'نوع السجل'} == 'حكم قضائي')
                        <div class="col-md-6">
                            <label for="ملاحظات1" class="form-label">ملاحظات1:</label>
                            <input type="text"
                                   id="ملاحظات1"
                                   name="ملاحظات1"
                                   class="form-control"
                                   value="{{ old('ملاحظات1', $litige->{'ملاحظات1'}) }}"
                                   placeholder="أدخل ملاحظات إضافية">
                        </div>

                        <div class="col-md-6">
                            <label for="تاريخ_التسوية" class="form-label">تاريخ التسوية:</label>
                            <input type="date"
                                   id="تاريخ_التسوية"
                                   name="تاريخ_التسوية"
                                   class="form-control"
                                   value="{{ old('تاريخ_التسوية', $litige->{'تاريخ التسوية'}) }}">
                        </div>

                        <div class="col-md-6">
                            <label for="تاريخ_بداية_المنازعة" class="form-label">تاريخ بداية المنازعة:</label>
                            <input type="date"
                                   id="تاريخ_بداية_المنازعة"
                                   name="تاريخ_بداية_المنازعة"
                                   class="form-control"
                                   value="{{ old('تاريخ_بداية_المنازعة', $litige->{'تاريخ بداية المنازعة'}) }}">
                        </div>

                        <div class="col-md-6">
                            <label for="مبلغ_التعويض" class="form-label">مبلغ التعويض:</label>
                            <input type="number"
                                   id="مبلغ_التعويض"
                                   name="مبلغ_التعويض"
                                   class="form-control"
                                   value="{{ old('مبلغ_التعويض', $litige->{'مبلغ التعويض'}) }}"
                                   step="0.01"
                                   placeholder="0.00">
                        </div>

                        <div class="col-md-6">
                            <label for="تاريخ_الالتحاق" class="form-label">تاريخ الالتحاق:</label>
                            <input type="date"
                                   id="تاريخ_الالتحاق"
                                   name="تاريخ_الالتحاق"
                                   class="form-control"
                                   value="{{ old('تاريخ_الالتحاق', $litige->{'تاريخ الالتحاق'}) }}">
                        </div>

                        <div class="col-md-6">
                            <label for="التسوية_النهائية" class="form-label">التسوية النهائية:</label>
                            <select id="التسوية_النهائية"
                                    name="التسوية_النهائية"
                                    class="form-control">
                                <option value="">اختر</option>
                                <option value="في طور" {{ old('التسوية_النهائية', $litige->{'التسوية النهائية'}) == 'في طور' ? 'selected' : '' }}>في طور</option>
                                <option value="تمت" {{ old('التسوية_النهائية', $litige->{'التسوية النهائية'}) == 'تمت' ? 'selected' : '' }}>تمت</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="منفذة_أو_غير_منفذة" class="form-label">منفذة أو غير منفذة:</label>
                            <select id="منفذة_أو_غير_منفذة"
                                    name="منفذة_أو_غير_منفذة"
                                    class="form-control">
                                <option value="1" {{ old('منفذة_أو_غير_منفذة', $litige->{'منفذة أو غير منفذة'}) == 1 ? 'selected' : '' }}>منفذة</option>
                                <option value="0" {{ old('منفذة_أو_غير_منفذة', $litige->{'منفذة أو غير منفذة'}) == 0 ? 'selected' : '' }}>غير منفذة</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="نوع_الملف" class="form-label">نوع الملف:</label>
                            <select id="نوع_الملف"
                                    name="نوع_الملف"
                                    class="form-control">
                                <option value="">اختر نوع الملف</option>
                                <option value="العزل" {{ old('نوع_الملف', $litige->{'نوع الملف'}) == 'العزل' ? 'selected' : '' }}>العزل</option>
                                <option value="الترقية" {{ old('نوع_الملف', $litige->{'نوع الملف'}) == 'الترقية' ? 'selected' : '' }}>الترقية</option>
                                <option value="الشؤون التاديبية" {{ old('نوع_الملف', $litige->{'نوع الملف'}) == 'الشؤون التاديبية' ? 'selected' : '' }}>الشؤون التاديبية</option>
                                <option value="التعويضات" {{ old('نوع_الملف', $litige->{'نوع الملف'}) == 'التعويضات' ? 'selected' : '' }}>التعويضات</option>
                            </select>
                        </div>

                        <div class="col-md-6" id="فترة_field" style="display: none;">
                            <label for="ادخل_الفترة" class="form-label">ادخل الفترة:</label>
                            <input type="text"
                                   id="ادخل_الفترة"
                                   name="ادخل_الفترة"
                                   class="form-control"
                                   value="{{ old('ادخل_الفترة', $litige->{'ادخل الفترة'}) }}"
                                   placeholder="أدخل الفترة">
                        </div>

                        @if($litige->{'نوع السجل'} == 'حكم قضائي')
                        <div class="col-md-6">
                            <label for="تاريخ_صدور_الحكم_النهائي" class="form-label">تاريخ صدور الحكم النهائي:</label>
                            <input type="date"
                                   id="تاريخ_صدور_الحكم_النهائي"
                                   name="تاريخ_صدور_الحكم_النهائي"
                                   class="form-control"
                                   value="{{ old('تاريخ_صدور_الحكم_النهائي', $litige->{'تاريخ صدور الحكم النهائي'}) }}">
                        </div>
                        @endif
                        @endif
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <a href="{{ route('litiges.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>إلغاء
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save me-2"></i>تحديث
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileTypeField = document.getElementById('نوع_الملف');

    function toggleFields() {
        if (!fileTypeField) return;
        
        const selectedValue = fileTypeField.value;
        const periodField = document.getElementById('فترة_field');
        const dateField = document.getElementById('تاريخ_الالتحاق_field');

        if (selectedValue === 'العزل' || selectedValue === 'الشؤون التاديبية') {
            if (periodField) periodField.style.display = 'block';
            if (dateField) dateField.style.display = 'block';
        } else {
            if (periodField) periodField.style.display = 'none';
            if (dateField) dateField.style.display = 'none';
            
            const periodInput = document.getElementById('ادخل_الفترة');
            const dateInput = document.getElementById('تاريخ_الالتحاق');
            if (periodInput) periodInput.value = '';
            if (dateInput) dateInput.value = '';
        }
    }

    if (fileTypeField) {
        fileTypeField.addEventListener('change', toggleFields);
        toggleFields();
    }

    function fetchData(url, target) {
        fetch(url)
    }

    if (fileTypeField) {
        fileTypeField.addEventListener('change', toggleFields);
        toggleFields();
    }

    function fetchData(url, target) {
        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const targetField = document.getElementById(target.name);
                    const frameField = document.getElementById('الإطار');
                    const dirField = document.getElementById('المديرية_الإقليمية');
                    const acadField = document.getElementById('الاكاديمية');
                    
                    if (targetField && data.data[target.value]) {
                        targetField.value = data.data[target.value];
                    }
                    if (frameField && data.data.الإطار) {
                        frameField.value = data.data.الإطار;
                    }
                    if (dirField && data.data.المديرية_الإقليمية) {
                        dirField.value = data.data.المديرية_الإقليمية;
                    }

                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    const rentalField = document.getElementById('رقم_تأجير');
    if (rentalField) {
        rentalField.addEventListener('input', function() {
            const rentalNumber = this.value.trim();
            if (rentalNumber !== '') {
                fetchData(`/litiges/fetch-by-rental-number/${encodeURIComponent(rentalNumber)}`, { name: 'الاسم_و_النسب', value: 'الاسم_و_النسب' });
            }
        });
    }

    const nameField = document.getElementById('الاسم_و_النسب');
    if (nameField) {
        nameField.addEventListener('input', function() {
            const name = this.value.trim();
            if (name !== '') {
                fetchData(`/litiges/fetch-by-name/${encodeURIComponent(name)}`, { name: 'رقم_تأجير', value: 'رقم_تأجير' });
            }
        });
    }
});
</script>
@endpush
