@extends('layouts.app')

@section('title', 'إضافة قضية جديدة')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="card-modern">
                <h2 class="text-center mb-4">
                    <i class="fas fa-plus-circle me-2"></i>إضافة قضية جديدة
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

                <form action="{{ route('jugement.store') }}" method="POST">
                    @csrf

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
                            <label for="نوع_العملية" class="form-label">نوع العملية:</label>
                            <input type="text" 
                                   id="نوع_العملية" 
                                   name="نوع_العملية" 
                                   class="form-control" 
                                   value="{{ old('نوع_العملية') }}"
                                   placeholder="أدخل نوع العملية">
                        </div>

                        <div class="col-md-6">
                            <label for="الفترة" class="form-label">الفترة:</label>
                            <input type="text" 
                                   id="الفترة" 
                                   name="الفترة" 
                                   class="form-control" 
                                   value="{{ old('الفترة') }}"
                                   placeholder="أدخل الفترة">
                        </div>

                        <div class="col-md-6">
                            <label for="ملاحظات" class="form-label">ملاحظات:</label>
                            <input type="text" 
                                   id="ملاحظات" 
                                   name="ملاحظات" 
                                   class="form-control" 
                                   value="{{ old('ملاحظات') }}"
                                   placeholder="أدخل الملاحظات">
                        </div>

                        <div class="col-md-6">
                            <label for="Aref" class="form-label">Aref:</label>
                            <input type="text" 
                                   id="Aref" 
                                   name="Aref" 
                                   class="form-control" 
                                   value="{{ old('Aref') }}"
                                   placeholder="أدخل Aref">
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
                            <label for="ملاحظات1" class="form-label">ملاحظات1:</label>
                            <input type="text" 
                                   id="ملاحظات1" 
                                   name="ملاحظات1" 
                                   class="form-control" 
                                   value="{{ old('ملاحظات1') }}"
                                   placeholder="أدخل ملاحظات إضافية">
                        </div>

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

                        <div class="col-md-6">
                            <label for="تاريخ_الالتحاق" class="form-label">تاريخ الالتحاق:</label>
                            <input type="date" 
                                   id="تاريخ_الالتحاق" 
                                   name="تاريخ_الالتحاق" 
                                   class="form-control" 
                                   value="{{ old('تاريخ_الالتحاق') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="التسوية_النهائية" class="form-label">التسوية النهائية:</label>
                            <input type="text" 
                                   id="التسوية_النهائية" 
                                   name="التسوية_النهائية" 
                                   class="form-control" 
                                   value="{{ old('التسوية_النهائية') }}"
                                   placeholder="أدخل التسوية النهائية">
                        </div>

                        <div class="col-md-6">
                            <label for="منفذة_أو_غير_منفذة" class="form-label">منفذة أو غير منفذة:</label>
                            <select id="منفذة_أو_غير_منفذة" 
                                    name="منفذة_أو_غير_منفذة" 
                                    class="form-control">
                                <option value="1" {{ old('منفذة_أو_غير_منفذة') == '1' ? 'selected' : '' }}>منفذة</option>
                                <option value="0" {{ old('منفذة_أو_غير_منفذة') == '0' ? 'selected' : '' }}>غير منفذة</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <a href="{{ route('jugement.index') }}" class="btn btn-secondary">
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
@endsection
