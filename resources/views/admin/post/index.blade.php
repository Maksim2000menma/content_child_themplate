@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">Посты</div>

    <div class="card-body">
        <h2>Страница со списком всех постов</h2>
        <a class="btn btn-outline-secondary" href="/admin/posts/create">Создать новый пост</a>
        <br />
        <br />

        <label>Варианты статусов:</label>
        <ul>
            <li>custom - созданный вручную пост</li>
            <li>draft - черновик</li>
            <li>live - отображается на сайте</li>
        </ul>
        <hr />

        TODO - добавить поиск
        
        <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" style="width: 50px;">#ID</th>
                        <th scope="col" style="width: 400px;">Additional</th>
                        <th scope="col" style="width: 400px;">Content</th>
                        <th scope="col" style="width: 110px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>
                            Status: <b>{{ $post->status }}</b>
                            <br/>

                            <b>created_at:</b> {{$post->created_at}}
                            <br />
                            <b>updated_at:</b> {{$post->updated_at}}
                            <br />

                            <b>Title:</b> {{ $post->title }}
                            <br />

                            <b>Meta description:</b> {{ $post->description }}
                            <br />

                            <b>Slug:</b> {{ $post->slug }}
                            <hr />

                            <b>preview_img:</b> {{ $post->preview_img }}
                        </td>
                        <td>
                            {{ mb_substr($post->content, 0, 1500) }}...<br />
                        </td>
                        <td>
                            <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-outline-secondary m-1"
                                type="submit">Редактирование</a>
                            <br />

                            <form style="display:inline-block;" class="inblock" action="/admin/posts/{{ $post->id }}/delete"
                                method="post">
                                <input type="hidden" name="_token" value="{{ request()->session()->token() }}">

                                <button class="btn btn-outline-secondary m-1" type="submit">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        <div class="pagination-wrapper">
            {!! $posts->links() !!}
        </div>
    </div>
</div>
@endsection