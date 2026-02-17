@extends('layouts.app')

@section('title', 'إضافة حكم قضائي')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="card-modern">
                <h2 class="text-center mb-4">
                    <i class="fas fa-plus-circle me-2"></i>إضافة حكم قضائي
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
                            <input type="text" id="رقم_تأجير" name="رقم_تأجير" class="form-control" value="{{ old('رقم_تأجير') }}" required placeholder="أدخل رقم التأجير">
                        </div>

                        <div class="col-md-6">
                            <label for="الاسم_و_النسب" class="form-label">الاسم و النسب:</label>
                            <input type="text" id="الاسم_و_النسب" name="الاسم_و_النسب" class="form-control" value="{{ old('الاسم_و_النسب') }}" required placeholder="أدخل الاسم الكامل">
                        </div>

                        <!-- Add other fields as needed -->

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
