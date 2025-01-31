@extends('Admin.Panel.Layouts.NewPanel')

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="page-header">
                <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-format-list-bulleted"></i>
                </span>
                    محتوای آموزشی
                </h3>
            </div>

            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <h1 class="mb-4">ویرایش محتوای آموزشی</h1>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <!-- Display Validation Errors -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!-- Form to Edit Educational Content -->
                                <form action="{{ route('admin.educational_contents.update', $educationalContent->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf <!-- CSRF Token for form security -->
                                    @method('PUT') <!-- Use PUT method for updates -->

                                    <!-- Title -->
                                    <div class="form-group">
                                        <label for="title">عنوان</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $educationalContent->title) }}" required>
                                    </div>

                                    <!-- Description -->
                                    <div class="form-group">
                                        <label for="description">توضیحات</label>
                                        <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $educationalContent->description) }}</textarea>
                                    </div>

                                    <!-- Price -->
                                    <div class="form-group">
                                        <label for="price">قیمت (۰ = رایگان)</label>
                                        <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $educationalContent->price) }}" min="0" required>
                                    </div>

                                    <!-- Discount -->
                                    <div class="form-group">
                                        <label for="discount">تخفیف</label>
                                        <input type="number" step="0.01" name="discount" id="discount" class="form-control" value="{{ old('discount', $educationalContent->discount) }}" min="0">
                                    </div>

                                    <!-- Discount Type -->
                                    <div class="form-group">
                                        <label for="discount_type">نوع تخفیف</label>
                                        <select name="discount_type" id="discount_type" class="form-control">
                                            <option value="amount" {{ old('discount_type', $educationalContent->discount_type) == 'amount' ? 'selected' : '' }}>مقدار ثابت</option>
                                            <option value="percent" {{ old('discount_type', $educationalContent->discount_type) == 'percent' ? 'selected' : '' }}>درصد</option>
                                        </select>
                                    </div>

                                    <!-- File Upload -->
                                    <div class="form-group">
                                        <label for="files">بارگذاری فایل‌ها</label>
                                        <input type="file" name="files[]" id="files" class="form-control" multiple>
                                        <small class="form-text text-muted">فرمت‌های مجاز: jpg, png, mp4, mp3, pdf, doc, docx</small>
                                    </div>

                                    <!-- Existing Files -->
                                    @if ($educationalContent->files->isNotEmpty())
                                        <div class="form-group">
                                            <label>فایل‌های موجود:</label>
                                            <ul>
                                                @foreach ($educationalContent->files as $file)
                                                    <li>
                                                        <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">{{ $file->file_name }}</a>
                                                        <!-- Delete Button -->
                                                        <form action="{{ route('admin.educational_contents.files.destroy', $file->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید که می‌خواهید این فایل را حذف کنید؟')">حذف</button>
                                                        </form>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <!-- Submit Button -->
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                                        <a href="{{ route('admin.educational_contents.index') }}" class="btn btn-secondary">بازگشت</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div></div>
    </div>

@endsection
