<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function posts()
    {
        return response('test', 200)->header('Content-Type', 'text/plain');
    }

    public function addPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slug'         => 'required|string|unique:posts,slug|max:255',
            'title'        => 'required|nullable|string',
            'description'  => 'required|nullable|string',
            'content'      => 'required',
            'preview_img'  => 'required|nullable|string',
            'status'       => 'required'
        ]);

        // Если валидация не прошла, возвращаем ошибки
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        //Создание записи в базе данных
        $post = Post::create($validator->validated());

        //Возврат успешного ответа с созданным постом
        return response()->json([
            'success' => true,
            'message' => 'Post created successfully',
            'data'    => $post
        ], 211);
    }
}