@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">Создание поста</div>
    <div class="card-body">
        <div class="col-md-12">
            <form method="post" id="formEditor" action="{{ url('/admin/posts') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ request()->session()->token() }}">

                <div class="form-group">
                    <label for="preview_img">preview_img</label>
                    <input type="text" class="form-control" name="preview_img" placeholder="https://..." />
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" value="" required />
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="" required />
                </div>

                <div class="form-group">
                    <label for="h1_title">H1 Title</label>
                    <input type="text" class="form-control" name="h1_title" value="" required />
                </div>

                <div class="form-group">
                    <label for="content">Контент записи</label>
                    <textarea id="summernote" class="form-control" rows="30" name="content"></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea contenteditable="true" class="form-control" rows="3" name="description"></textarea>
                </div>

                <div class="form-group">
                    <label for="status">Статус</label>
                    <select class="form-select" name="status">
                        <option vlaue="custom" selected>custom</option>
                        <option value="draft">draft</option>
                        <option value="live">live</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="referrer_url">referrer_url</label>
                    <input type="text" class="form-control" name="referrer_url" value="" />
                </div>

                <br />

                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
</div>

@endsection