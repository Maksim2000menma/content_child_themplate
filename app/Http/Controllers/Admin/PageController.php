<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('created_at', 'desc')->paginate(15);

        return view('admin/page/index', compact('pages'));
    }

    public function create()
    {
        return view('admin/page/create');
    }

    public function store(Request $request)
    {
        Page::create($request->all());

        return redirect('/admin/pages');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);

        return view('admin/page/edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $page = Page::findOrFail($id);
        $page->update($request->all());

        return redirect('/admin/pages/');
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect('/admin/pages');
    }
}