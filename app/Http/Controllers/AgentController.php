<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Agent::where('parent_id',0)->orderBy('id','desc')->paginate(10);
        $parent_id = 0;
        return view('agent.index',compact('agents','parent_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //  
    }

    public function storeBy(Request $request,int $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
        $data['parent_id'] = $id;
        Agent::create($data);
        return back()->with(['message' => 'Agent is successfully created','status' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agent $agent)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
        $agent->update($data);
        return back()->with(['message' => 'Agent is successfully updated','status' => 'warning']);
    }

    public function deleteBy(Agent $agent){

        if($agent->children->count() > 0){
            foreach ($agent->children as $child) {
                $this->deleteBy($child);
                $child->delete();
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
        $this->deleteBy($agent);
        $agent->delete();
        return back()->with(['message' => 'Agent is successfully deleted','status' => 'danger']);
    }

    public function subs(Agent $agent){
        $agents = Agent::where('parent_id',$agent->id)->orderBy('id','desc')->paginate(10);
        $parent_id = $agent->id;
        return view('agent.index',compact('agents','parent_id'));
    }
}
