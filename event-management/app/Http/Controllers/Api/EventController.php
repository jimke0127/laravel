<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Http\Traits\CanLoadRelationships;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use function Illuminate\Log\log;

class EventController extends BaseController
{
    use CanLoadRelationships,AuthorizesRequests;

    private  $relations = ["user","attendees","attendees.user"];

    public function __construct()
    {
        $this->middleware("auth:sanctum")->except(["index","show"]);
        $this->authorizeResource(Event::class, 'event');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = $this->loadRelationShips(Event::query());
        // foreach($relations as $relation){
        //     $query->when(
        //         $this->shouldIncludeRelation($relation),
        //         fn($q) => $q->with($relation)
        //     );
        // }
        return EventResource::collection($query->byUserAttend(6)->latest()->paginate());
    }

    // public function shouldIncludeRelation(string $relation):bool
    // {
    //     $includes = request()->query("include");

    //     if(!$includes){
    //         return false;
    //     }
    //     $relations = array_map("trim", explode(",", $includes));

    //     return in_array($relation, $relations);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = Event::create([
            ...$request->validate([
                "name" => "required|string|max:255",
                "description" => "nullable|string",
                "start_time" => "required|date",
                "end_time" => "required|date|after:start_time"
            ]),
            "user_id" => $request->user()->id
        ]);
        return new EventResource($this->loadRelationShips($event));
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //$event->load("user","attendees");
        return new EventResource($this->loadRelationShips($event));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // if(Gate::denies("update-event", $event)){
        //     abort(403,"You are not authorized to update this event");
        // }
        // 等价于上面3行
        $this->authorize("update-event", $event);

        $event->update(
            $request->validate([
                "name" => "sometimes|string|max:255",
                "description" => "nullable|string",
                "start_time" => "sometimes|date",
                "end_time" => "sometimes|date|after:start_time"
            ])
        );
        return new EventResource($this->loadRelationShips($event));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
         $event->delete();

         return response(status:204);
    }
}
