@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">Редактирование поста</div>
    <div class="card-body">
        <div class="col-md-12">
            <form method="post" id="formEditor" action="/admin/posts/{{ $post->id }}/update" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ request()->session()->token() }}">
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                    <label for="preview_img">preview_img</label>
                    <input type="text" class="form-control" name="preview_img" placeholder="https://..." value="{{ $post->preview_img}}" />
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" required value="{{ $post->slug}}"/>
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" required value="{{ $post->title}}"/>
                </div>

                <div class="form-group">
                    <label for="h1_title">H1 Title</label>
                    <input type="text" class="form-control" name="h1_title" required value="{{ $post->h1_title}}"/>
                </div>

                <div class="form-group">
                    <label for="content">Контент записи</label>
                    <textarea id="summernote" class="form-control" rows="30" name="content">{{ $post->content}}</textarea>
                </div>

                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea contenteditable="true" class="form-control" rows="3" name="description">{{ $post->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Статус</label>
                    <select class="form-select" name="status">
                        <option value="{{ $post->status}}" selected>{{ $post->status}}</option>
                        <option vlaue="custom">custom</option>
                        <option value="draft">draft</option>
                        <option value="live">live</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="referrer_url">referrer_url</label>
                    <input type="text" class="form-control" name="referrer_url" value="{{ $post->referrer_url}}" />
                </div>

                <br />

                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
</div>

@endsection