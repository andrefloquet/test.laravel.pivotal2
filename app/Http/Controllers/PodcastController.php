<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StorePodcastRequest;
use App\Http\Requests\UpdatePodcastRequest;
use App\Http\Resources\PodcastCollection;
use App\Http\Resources\PodcastResource;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\PodcastCollection
     */
    public function index()
    {
        return new PodcastCollection(Podcast::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePodcastRequest  $request
     * @return App\Http\Resources\PodcastResource
     */
    public function store(StorePodcastRequest $request)
    {
        try {
    
            $podcast = Podcast::create([
                'name'          => trim($request->name),
                'description'   => trim($request->description),
                'marketing_url' => trim($request->marketing_url),
                'feed_url'      => trim($request->feed_url)
            ]);

            return new PodcastResource($podcast);
            
        } catch(QueryException $exception) {

            return response()->json(['message' => 'An Error has occurred when inserting a Podcast: ' . $exception->getSql()], 400);

        } catch(\Exception $exception) {

            return response()->json(['message' => 'An Error has occurred: ' . $exception->getMessage()], 400);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return App\Http\Resources\PodcastResource
     */
    public function show(Request $request, Podcast $podcast)
    {
        if(isset($request['comments']) && intval($request['comments']) === 1) {

            $podcast = Podcast::with('comments')->findOrFail($podcast->id)->first();

            return response()->json(['data' => $podcast]);
        }

        return new PodcastResource($podcast); 
    }

    /**
     * Display podcasts by status.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return App\Http\Resources\PodcastCollection
     */
    public function showByStatus($status)
    {
        $podcast = Cache::remember('key', now()->addHour(), fn() => Podcast::where('status', $status)->paginate(12)); 

        return new PodcastCollection($podcast);
    }    

    /**
     * Update Status by specified resource
     *
     * @param  \App\Models\Podcast  $podcast
     * @return App\Http\Resources\PodcastResource or error message
     */
    public function approval(Podcast $podcast)
    {
        if($podcast->status == 'published') {

            return response()->json(['message' => 'This Podcast is already approved!'], 400);

        } elseif($podcast->status == 'review') {

            $podcast->status = 'published';
            $podcast->save();

            return new PodcastResource($podcast); 

        } else {

            return response()->json(['message' => 'Podcast has an undefined status! Can not be approved!'], 400);
        }
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePodcastRequest  $request
     * @param  \App\Models\Podcast  $podcast
     * @return App\Http\Resources\PodcastResource
     */
    public function update(UpdatePodcastRequest $request, Podcast $podcast)
    {
        try {

            $podcast->name          = trim($request->name);
            $podcast->description   = trim($request->description);
            $podcast->marketing_url = trim($request->marketing_url);
            $podcast->feed_url      = trim($request->feed_url);
            $podcast->save();
            
            return new PodcastResource($podcast);
            
        } catch(QueryException $exception) {

            return response()->json(['message' => 'An Error has occurred when Updating a Podcast: ' . $exception->getSql()], 400);

        } catch(\Exception $exception) {

            return response()->json(['message' => 'An Error has occurred: ' . $exception->getMessage()], 400);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return null, 204 status
     */
    public function destroy(Podcast $podcast)
    {
        try {

            $podcast->delete();

            return response(null, 204);
            
        } catch(QueryException $exception) {

            return response()->json(['message' => 'An Error has occurred when deleting a Podcast: ' . $exception->getSql()], 400);

        } catch(\Exception $exception) {

            return response()->json(['message' => 'An Error has occurred: ' . $exception->getMessage()], 400);
        }         
    }
}
