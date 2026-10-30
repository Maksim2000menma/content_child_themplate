@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">Изображения</div>
    <div class="card-body">
        @if ($status)
            <div class="alert alert-success" role="alert">
                {{ $status }}
            </div>
        @endif

        @if ($error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endif
        
        <div class="container-fluid">
            <h1>Список всех изображений</h1>

            <hr />

            <div class="mb-2">
                <form method="post" action="/admin/images" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ request()->session()->token() }}">

                    <div class="form-group">
                        <label for="file">Выбрать картинку</label>
                        <input type="file" class="form-control-file" name="image" id="file" accept="image/jpeg,image/png,image/gif,image/webp" required />
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>

            @foreach ($images as $image)
                <div style="width:300px; display:inline-block">
                    <img src="{{ url($image->path) }}" style="width:290px; height:190px; object-fit:cover;" />
                    <p style="height:30px;">{{ url($image->path) }}</p>

                    <form style="display:inline-block;" action="{{ url('/admin/images/' . $image->id . '/delete') }}" method="post">
                        <input type="hidden" name="_token" value="{{ request()->session()->token() }}">
                        <button class="btn btn-outline-secondary m-1" type="submit">Удалить</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
    @endsection