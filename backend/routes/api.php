<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Comment;
use App\Models\Rating;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EventPostController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/comments', function (Request $request) {
    return Comment::all();
});

// Route to create a comment
Route::post('/comments', [CommentController::class, 'store']);

Route::post('comments/{id}/like', [CommentController::class, 'like']);

Route::post('comments/{id}/dislike', [CommentController::class, 'dislike']);

// GET route to retrieve event posts
Route::get('/event-posts', [EventPostController::class, 'index']);

// POST route to create a new event post
Route::post('/event-posts', [EventPostController::class, 'store']);

Route::get('/event-posts/{id}', [EventPostController::class, 'show']);   