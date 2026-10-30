<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    private const DIR = '/img/upload/';

    public function index(Request $request)
    {
        $images = Image::orderBy('created_at', 'desc')->get();

        $session = $request->session();

        return view('admin/image/index', [
            'images' => $images,
            'status' => $session->get('status'),
            'error'  => $session->get('error'),
        ]);
    }

    public function store(Request $request)
    {
        $session = $request->session();

        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,gif,webp|max:5120',
        ]);

        if ($validator->fails()) {
            $session->flash('error', $validator->errors()->first());
            return redirect('/admin/images');
        }

        $file = $request->file('image');

        // безопасное имя файла: убираем всё, кроме букв, цифр, точки, дефиса и подчёркивания
        $fileName = preg_replace('/[^A-Za-z0-9._-]/', '_', basename($file->getClientOriginalName()));
        $path     = self::DIR . $fileName;

        if (Image::where('path', $path)->exists()) {
            $session->flash('status', 'Изображение с таким именем существует');
            return redirect('/admin/images');
        }

        $file->move(base_path('public' . self::DIR), $fileName);

        Image::create(['path' => $path]);

        $session->flash('status', 'Успешное добавление изображения');

        return redirect('/admin/images');
    }

    public function destroy(Request $request, $id)
    {
        $image = Image::findOrFail($id);

        // удаление файла с сервера (basename защищает от выхода за пределы папки)
        $filePath = base_path('public' . self::DIR . basename($image->path));
        if (is_file($filePath)) {
            unlink($filePath);
        }

        $image->delete();

        $request->session()->flash('status', 'Картинка успешно удалена');

        return redirect('/admin/images');
    }
}