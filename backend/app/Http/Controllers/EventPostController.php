<?php

namespace App\Http\Controllers;

use App\Models\EventPost;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EventPostController extends Controller
{
    /**
     * Get all event posts.
     */
    public function index(): JsonResponse
    {
        $eventPosts = EventPost::all();

        return response()->json($eventPosts);
    }

    /**
     * Store a newly created event post.
     */
    public function store(Request $request): JsonResponse
    {
        $header = $request->input('header', 'Default Event Header');
        $description = $request->input('description', 'Default Event Description');
        $status = $request->input('status', 'UPCOMING');

        $eventPost = EventPost::create([
            'header' => $header,
            'description' => $description,
            'image_paths' => $request->input('image_paths', []),
            'status' => $status,
        ]);

        // Log the activity
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'created',
            'resource' => 'event_posts',
            'resource_id' => $eventPost->id,
        ]);

        return response()->json([
            'message' => 'Event post created successfully',
            'event_post' => $eventPost,
        ], 201);
    }

    /**
     * Show a specific event post, including comments, ratings, and navigation links.
     */
    public function show($id): JsonResponse
    {
        $eventPost = EventPost::find($id);

        if (!$eventPost) {
            return response()->json(['message' => 'Event post not found'], 404);
        }

        $comments = Comment::where('event_post_id', $id)->get();
        $ratings = Rating::where('event_post_id', $id)->get();
        $averageRating = $ratings->avg('rating');

        $previousEvent = EventPost::where('post_id', '<', $id)->orderBy('post_id', 'desc')->first();
        $nextEvent = EventPost::where('post_id', '>', $id)->orderBy('post_id', 'asc')->first();
        $otherEvents = EventPost::where('post_id', '!=', $id)->limit(5)->get();

        return response()->json([
            'event_post' => $eventPost,
            'comments' => $comments,
            'ratings' => [
                'all_ratings' => $ratings,
                'average_rating' => $averageRating,
            ],
            'navigation' => [
                'previous_event' => $previousEvent,
                'next_event' => $nextEvent,
            ],
            'other_events' => $otherEvents,
        ]);
    }

    /**
     * Add a comment to an event post.
     */
    public function addComment(Request $request, $eventPostId): JsonResponse
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
            'user_id' => 'required|exists:users,id',
        ]);

        $eventPost = EventPost::find($eventPostId);

        if (!$eventPost) {
            return response()->json(['message' => 'Event post not found'], 404);
        }

        $comment = Comment::create([
            'event_post_id' => $eventPostId,
            'comment_type' => 'event_post',
            'content' => $validated['content'],
            'user_id' => $validated['user_id'],
        ]);

        // Log the activity
        ActivityLog::create([
            'user_id' => $validated['user_id'],
            'action' => 'added_comment',
            'resource' => 'event_posts',
            'resource_id' => $eventPostId,
        ]);

        return response()->json([
            'message' => 'Comment added successfully',
            'comment' => $comment,
        ], 201);
    }

    /**
     * Retrieve comments for a specific event post.
     */
    public function getComments($eventPostId): JsonResponse
    {
        $comments = Comment::where('event_post_id', $eventPostId)->get();

        if ($comments->isEmpty()) {
            return response()->json(['message' => 'No comments found for this event post'], 404);
        }

        return response()->json([
            'message' => 'Comments retrieved successfully',
            'comments' => $comments,
        ], 200);
    }

    /**
     * Delete a specific event post along with its related data.
     */
    public function destroy($id): JsonResponse
    {
        $eventPost = EventPost::find($id);

        if (!$eventPost) {
            return response()->json(['message' => 'Event post not found'], 404);
        }

        Comment::where('event_post_id', $id)->delete();
        Rating::where('event_post_id', $id)->delete();
        $eventPost->delete();

        // Log the activity
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'deleted',
            'resource' => 'event_posts',
            'resource_id' => $id,
        ]);

        return response()->json(['message' => 'Event post and its related data deleted successfully'], 200);
    }
}
