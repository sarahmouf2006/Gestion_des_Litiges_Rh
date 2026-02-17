@extends('layouts.app')

@section('title', 'إضافة نزاع جديد')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="card-modern">
                <h2 class="text-center mb-4">
                    <i class="fas fa-plus-circle me-2"></i>
                    @if(request('type') == 'منازعة' || !request('type'))
                        إضافة منازعة
                    @elseif(request('type') == 'التظلم')
                        إضافة تظلم
                    @elseif(request('type') == 'حكم قضائي')
                        إضافة حكم قضائي
                    @endif
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

                <form action="{{ route('litiges.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="{{ request('type', 'منازعة') }}">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="رقم_تأجير" class="form-label">رقم تأجير:</label>
                            <input type="text"
                                   id="رقم_تأجير"
                                   name="رقم_تأجير"
                                   class="form-control"
                                   value="{{ old('رقم_تأجير') }}"
                                   required
                                   placeholder="أدخل رقم التأجير">
                        </div>

                        <div class="col-md-6">
                            <label for="الاسم_و_النسب" class="form-label">الاسم و النسب:</label>
                            <input type="text"
                                   id="الاسم_و_النسب"
                                   name="الاسم_و_النسب"
                                   class="form-control"
                                   value="{{ old('الاسم_و_النسب') }}"
                                   required
                                   placeholder="أدخل الاسم الكامل">
                        </div>

                        <div class="col-md-6">
                            <label for="الإطار" class="form-label">الإطار:</label>
                            <input type="text"
                                   id="الإطار"
                                   name="الإطار"
                                   class="form-control"
                                   value="{{ old('الإطار') }}"
                                   placeholder="أدخل الإطار">
                        </div>

                        <div class="col-md-6">
                            <label for="المديرية_الإقليمية" class="form-label">المديرية الإقليمية:</label>
                            <input type="text"
                                   id="المديرية_الإقليمية"
                                   name="المديرية_الإقليمية"
                                   class="form-control"
                                   value="{{ old('المديرية_الإقليمية') }}"
                                   placeholder="أدخل المديرية الإقليمية">
                        </div>

                        <div class="col-md-6">
                            <label for="الاكاديمية" class="form-label">الاكاديمية:</label>
                            <input type="text"
                                   id="الاكاديمية"
                                   name="الاكاديمية"
                                   class="form-control"
                                   value="{{ old('الاكاديمية') }}"
                                   placeholder="أدخل الاكاديمية">
                        </div>

                        @if(request('type') == 'منازعة' || request('type') == 'حكم قضائي' || !request('type'))
                        <div class="col-md-6">
                            <label for="نوع_الملف" class="form-label">نوع الملف:</label>
                            <select id="نوع_الملف"
                                    name="نوع_الملف"
                                    class="form-control">
                                <option value="">اختر نوع الملف</option>
                                <option value="العزل" {{ old('نوع_الملف') == 'العزل' ? 'selected' : '' }}>العزل</option>
                                <option value="الترقية" {{ old('نوع_الملف') == 'الترقية' ? 'selected' : '' }}>الترقية</option>
                                <option value="الشؤون التاديبية" {{ old('نوع_الملف') == 'الشؤون التاديبية' ? 'selected' : '' }}>الشؤون التاديبية</option>
                                <option value="التعويضات" {{ old('نوع_الملف') == 'التعويضات' ? 'selected' : '' }}>التعويضات</option>
                            </select>
                        </div>

                        <div class="col-md-6" id="فترة_field" style="display: none;">
                            <label for="ادخل_الفترة" class="form-label">ادخل الفترة:</label>
                            <input type="text"
                                   id="ادخل_الفترة"
                                   name="ادخل_الفترة"
                                   class="form-control"
                                   value="{{ old('ادخل_الفترة') }}"
                                   placeholder="أدخل الفترة">
                        </div>
                        @endif

                        <div class="col-md-6">
                            <label for="تاريخ_التسوية" class="form-label">تاريخ التسوية:</label>
                            <input type="date"
                                   id="تاريخ_التسوية"
                                   name="تاريخ_التسوية"
                                   class="form-control"
                                   value="{{ old('تاريخ_التسوية') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="مبلغ_التعويض" class="form-label">مبلغ التعويض:</label>
                            <input type="number"
                                   id="مبلغ_التعويض"
                                   name="مبلغ_التعويض"
                                   class="form-control"
                                   value="{{ old('مبلغ_التعويض') }}"
                                   step="0.01"
                                   placeholder="0.00">
                        </div>

                        <div class="col-md-6" id="تاريخ_الالتحاق_field" style="display: none;">
                            <label for="تاريخ_الالتحاق" class="form-label">تاريخ الالتحاق:</label>
                            <input type="date"
                                   id="تاريخ_الالتحاق"
                                   name="تاريخ_الالتحاق"
                                   class="form-control"
                                   value="{{ old('تاريخ_الالتحاق') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="التسوية_النهائية" class="form-label">التسوية النهائية:</label>
                            <select id="التسوية_النهائية"
                                    name="التسوية_النهائية"
                                    class="form-control">
                                <option value="">اختر</option>
                                <option value="في طور" {{ old('التسوية_النهائية') == 'في طور' ? 'selected' : '' }}>في طور</option>
                                <option value="تمت" {{ old('التسوية_النهائية') == 'تمت' ? 'selected' : '' }}>تمت</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="منفذة_أو_غير_منفذة" class="form-label">منفذة أو غير منفذة:</label>
                            <select id="منفذة_أو_غير_منفذة"
                                    name="منفذة_أو_غير_منفذة"
                                    class="form-control">
                                <option value="">اختر</option>
                                <option value="1" {{ old('منفذة_أو_غير_منفذة') == '1' ? 'selected' : '' }}>منفذة</option>
                                <option value="0" {{ old('منفذة_أو_غير_منفذة') == '0' ? 'selected' : '' }}>غير منفذة</option>
                            </select>
                        </div>

                        @if(request('type') == 'حكم قضائي')
                        <div class="col-md-6">
                            <label for="تاريخ_صدور_الحكم_النهائي" class="form-label">تاريخ صدور الحكم النهائي:</label>
                            <input type="date"
                                   id="تاريخ_صدور_الحكم_النهائي"
                                   name="تاريخ_صدور_الحكم_النهائي"
                                   class="form-control"
                                   value="{{ old('تاريخ_صدور_الحكم_النهائي') }}">
                        </div>
                        @endif

                        @if(request('type') == 'التظلم')
                        <div class="col-md-6">
                            <label for="تاريخ_استلام_التظلم" class="form-label">تاريخ استلام التظلم:</label>
                            <input type="date"
                                   id="تاريخ_استلام_التظلم"
                                   name="تاريخ_استلام_التظلم"
                                   class="form-control"
                                   value="{{ old('تاريخ_استلام_التظلم') }}">
                        </div>
                        @endif

                        <div class="col-md-6">
                            <label for="ملاحظات" class="form-label">ملاحظات:</label>
                            <input type="text"
                                   id="ملاحظات"
                                   name="ملاحظات"
                                   class="form-control"
                                   value="{{ old('ملاحظات') }}"
                                   placeholder="أدخل الملاحظات">
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <a href="{{ route('litiges.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>إلغاء
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>حفظ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const rentalField = document.getElementById('رقم_تأجير');
    
    if (!rentalField) return;
    
    rentalField.addEventListener('blur', function() {
        const rentalNumber = this.value.trim();
        
        if (!rentalNumber || rentalNumber.length < 3) return;
        
        const originalValue = this.value;
        this.value = '⏳ جاري البحث...';
        this.disabled = true;
        
        fetch(`/load-data/${rentalNumber}`)
            .then(response => {
                if (!response.ok) throw new Error('Network error');
                return response.json();
            })
            .then(data => {
                if (data.success && data.data) {
                    const fields = {
                        'الاسم_و_النسب': data.data.الاسم_و_النسب,
                        'الإطار': data.data.الإطار,
                        'المديرية_الإقليمية': data.data.المديرية_الإقليمية,
                        'الاكاديمية': data.data.الاكاديمية,
                        'ملاحظات': data.data.ملاحظات
                    };
                    
                    Object.keys(fields).forEach(fieldId => {
                        const field = document.getElementById(fieldId);
                        const value = fields[fieldId];
                        if (field && value) {
                            field.value = value;
                        }
                    });
                    
                    const notification = document.createElement('div');
                    notification.className = 'alert alert-success alert-dismissible fade show mt-3';
                    notification.innerHTML = `
                        <i class="fas fa-check-circle me-2"></i>
                        تم تحميل بيانات الموظف تلقائياً
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    `;
                    rentalField.parentNode.parentNode.appendChild(notification);
                    
                    setTimeout(() => {
                        if (notification.parentNode) {
                            notification.remove();
                        }
                    }, 3000);
                }
            })
            .catch(error => {
                console.error('Error loading data:', error);
            })
            .finally(() => {
                rentalField.value = originalValue;
                rentalField.disabled = false;
            });
    });
});
</script>
@endpush
@endsection
