@extends('Admin.Panel.Layouts.NewPanel')

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
            <td>{{ $content->price == 0 ? 'رایگان' : 'تومان ' . $content->price }}</td>
            <td>{{ $content->discount }}</td>
            <td>
                @if ($content->trashed())
                    <span class="text-danger">حذف شده</span>
                @else
                    <span class="text-success">فعال</span>
                @endif
            </td>
            <td>
                @if ($content->trashed())
                    <form action="{{ route('educational_contents.restore', $content->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-info">بازیابی</button>
                    </form>
                    <form action="{{ route('educational_contents.forceDelete', $content->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">حذف دائمی</button>
                    </form>
                @else
                    <a href="{{ route('educational_contents.edit', $content->id) }}" class="btn btn-warning">ویرایش</a>
                    <form action="{{ route('educational_contents.destroy', $content->id) }}" method="POST" style="display:inline;">
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
