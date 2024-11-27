<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Http\Controllers\Controller;
use App\Models\AgentProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class AgentController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $agents = Agent::where('parent_id', 0)->orderBy('id', 'desc')->paginate(10);
        $parent_id = 0;
        return view('agent.index', compact('agents', 'parent_id', 'products'));
    }


    public function storeBy(Request $request, int $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'product' => 'required',
            'price' => 'required',
        ]);

        $product['product_id'] = $data['product'];
        $product['price'] = $data['price'];

        unset($data['product'], $data['price']);

        $data['parent_id'] = $id;
        $agent = Agent::create($data);

        AgentProduct::create([
            'agent_id' => $agent->id,
            'product_id' => $product['product_id'],
            'price' => $product['price'],
        ]);

        return back()->with(['message' => 'Agent is successfully created', 'status' => 'success']);
    }

    public function update(Request $request, Agent $agent)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'price' => 'required'
        ]);
        $price = ['price' => $data['price']];
        unset($data['price']);
        $agent->update($data);
        return back()->with(['message' => 'Agent is successfully updated', 'status' => 'warning']);
    }

    public function deleteBy(Agent $agent)
    {

        if ($agent->children->count() > 0) {
            foreach ($agent->children as $child) {
                $this->deleteBy($child);
                $child->delete();
            }
        }
    }


    public function destroy(Agent $agent)
    {
        $this->deleteBy($agent);
        $agent->delete();
        return back()->with(['message' => 'Agent is successfully deleted', 'status' => 'danger']);
    }

    public function subs(Agent $agent)
    {
        $agents = Agent::where('parent_id', $agent->id)->orderBy('id', 'desc')->paginate(10);
        $parent_id = $agent->id;
        return view('agent.index', compact('agents', 'parent_id'));
    }
}
