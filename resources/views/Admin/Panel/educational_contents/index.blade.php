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

            <div class="row flex-row-reverse">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">


                            <table class="table">
                                <thead>
                                <tr>
                                    <th>شناسه</th>
                                    <th>عنوان</th>
                                    <th>قیمت</th>
                                    <th>تخفیف</th>
                                    <th>وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($contents as $content)
                                    <tr>
                                        <td>{{ $content->id }}</td>
                                        <td>{{ $content->title }}</td>
                                        <td>{{ $content->price == 0 ? 'رایگان' : 'تومان ' . number_format($content->price) }}</td>
                                        <td>{{ number_format($content->discount) }}</td>
                                        <td>
                                            @if ($content->trashed())
                                                <span class="text-danger">حذف شده</span>
                                            @else
                                                <span class="text-success">فعال</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($content->trashed())
                                                <form action="{{ route('admin.educational_contents.restore', $content->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-info">بازیابی</button>
                                                </form>
                                                <form action="{{ route('admin.educational_contents.forceDelete', $content->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">حذف دائمی</button>
                                                </form>
                                            @else
                                                <a href="{{ route('admin.educational_contents.edit', $content->id) }}" class="btn btn-warning">ویرایش</a>
                                                <form action="{{ route('admin.educational_contents.destroy', $content->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>


                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <h1 class="mb-4 text-right">افزودن محتوای آموزشی جدید</h1>

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

                                <!-- Form to Create Educational Content -->
                                <form action="{{ route('admin.educational_contents.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf <!-- CSRF Token for form security -->

                                    <!-- Title -->
                                    <div class="form-group">
                                        <label for="title">عنوان</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                                    </div>

                                    <!-- Cover -->
                                    <div class="form-group">
                                        <label for="cover">تصویر نمایه (مربع)</label>
                                        <input type="file" name="cover" id="cover" class="form-control" value="{{ old('title') }}" required>
                                    </div>

                                    <!-- Description -->
                                    <div class="form-group">
                                        <label for="description">توضیحات</label>
                                        <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                                    </div>

                                    <!-- Price -->
                                    <div class="form-group">
                                        <label for="price">قیمت (۰ = رایگان)</label>
                                        <input type="number" name="price" id="price" class="form-control" value="{{ old('price', 0) }}" min="0" required>
                                    </div>

                                    <!-- Discount -->
                                    <div class="form-group">
                                        <label for="discount">تخفیف</label>
                                        <input type="number" step="0.01" name="discount" id="discount" class="form-control" value="{{ old('discount', 0) }}" min="0">
                                    </div>

                                    <!-- Discount Type -->
                                    <div class="form-group">
                                        <label for="discount_type">نوع تخفیف</label>
                                        <select name="discount_type" id="discount_type" class="form-control">
                                            <option value="amount" {{ old('discount_type') == 'amount' ? 'selected' : '' }}>مقدار ثابت</option>
                                            <option value="percent" {{ old('discount_type') == 'percent' ? 'selected' : '' }}>درصد</option>
                                        </select>
                                    </div>

                                    <!-- File Upload -->
                                    <div class="form-group">
                                        <label for="files">بارگذاری فایل‌ها</label>
                                        <input type="file" name="files[]" id="files" class="form-control" multiple>
                                        <small class="form-text text-muted">فرمت‌های مجاز: jpg, png, mp4, mp3, pdf, doc, docx</small>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary">ذخیره</button>
                                        <a href="{{ route('admin.educational_contents.index') }}" class="btn btn-secondary">بازگشت</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
