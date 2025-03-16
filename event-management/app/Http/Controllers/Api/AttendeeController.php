<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttendeeResource;
use App\Http\Traits\CanLoadRelationships;
use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AttendeeController extends BaseController
{

    use CanLoadRelationships,AuthorizesRequests;

    private  $relations = ["user"];

    public function __construct()
    {
        $this->middleware("auth:sanctum")->except(["index","show","update"]);
        $this->authorizeResource(Attendee::class, 'attendee');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
        $attendees = $this->loadRelationShips($event->attendees()->latest());

        return AttendeeResource::collection(
            $attendees->paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Event $event)
    {
        $attendee = $event->attendees()->create([
            "user_id" => 1
        ]);
        return new AttendeeResource($this->loadRelationShips($attendee));
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event, Attendee $attendee)
    {
        return new AttendeeResource($this->loadRelationShips($attendee));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event, Attendee $attendee)
    {

        // if(Gate::denies("delete-attendee", [$event, $attendee])){
        //     abort(403,"You are not authorized to delete this attendee");
        // }
        // 等价于上面3行
        $this->authorize("delete-attendee", [$event, $attendee]);

        $attendee->delete();

        return response(status:204);
    }
}
