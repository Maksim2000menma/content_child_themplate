@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">Страницы</div>

    <div class="card-body">
        <h2>Страница со списком всех страниц</h2>
        <a class="btn btn-outline-secondary" href="/admin/pages/create">Создать новую страницу</a>
        <br />
        <br />

        <label>Варианты статусов:</label>
        <ul>
            <li>draft - черновик</li>
            <li>live - отображается на сайте</li>
        </ul>
        <hr />

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
                    @foreach($pages as $page)
                    <tr>
                        <th scope="row">{{ $page->id }}</th>
                        <td>
                            Status: <b>{{ $page->status }}</b>
                            <br/>

                            <b>created_at:</b> {{$page->created_at}}
                            <br />
                            <b>updated_at:</b> {{$page->updated_at}}
                            <br />

                            <b>Title:</b> {{ $page->title }}
                            <br />

                            <b>Meta description:</b> {{ $page->description }}
                            <br />

                            <b>Slug:</b> {{ $page->slug }}
                            <hr />

                            <b>preview_img:</b> {{ $page->preview_img }}
                        </td>
                        <td>
                            {{ mb_substr($page->content, 0, 1500) }}...<br />
                        </td>
                        <td>
                            <a href="/admin/pages/{{ $page->id }}/edit" class="btn btn-outline-secondary m-1"
                                type="submit">Редактирование</a>
                            <br />

                            <form style="display:inline-block;" class="inblock" action="/admin/pages/{{ $page->id }}/delete"
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
            {!! $pages->links() !!}
        </div>
    </div>
</div>
@endsection