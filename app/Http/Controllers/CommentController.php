<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        try {
    
            $comment = Comment::create([

                'podcast_id' => intval($request->podcast_id),
                'name'       => trim($request->name),
                'email'      => trim($request->email),
                'body'       => trim($request->body),
            ]);

            return new CommentResource($comment);
            
        } catch(QueryException $exception) {

            return response()->json(['message' => 'An Error has occurred when inserting a Comment: ' . $exception->getSql()], 400);

        } catch(\Exception $exception) {

            return response()->json(['message' => 'An Error has occurred: ' . $exception->getMessage()], 400);
        } 
    }

    /**
     * Update Status by specified resource
     *
     * @param  \App\Models\Comment  $comment
     * @return null, 204
     */
    public function flag(Comment $comment)
    {    
        try {

            $comment->delete();

            return response(null, 204);
            
        } catch(QueryException $exception) {

            return response()->json(['message' => 'An Error has occurred when Flaging a Comment: ' . $exception->getSql()], 400);

        } catch(\Exception $exception) {

            return response()->json(['message' => 'An Error has occurred: ' . $exception->getMessage()], 400);
        }          
    }
}
