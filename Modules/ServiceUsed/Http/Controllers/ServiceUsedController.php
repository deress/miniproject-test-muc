<?php

namespace Modules\ServiceUsed\Http\Controllers;

use App\Models\marketing\ProposalModel;
use App\Models\marketing\ServiceusedModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ServiceUsedController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $services = ServiceusedModel::with('proposal')->get();
        return view('serviceused::index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $proposals = ProposalModel::all();
        return view('serviceused::create', compact('proposals'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'proposal_id' => 'required',
            'service_name' => 'required',
            'status' => 'required|in:pending,agreed,rejected',
        ]);
        ServiceusedModel::create($validatedData);
        return redirect()->route('serviceused.index')->with('success', 'Service baru berhasil ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('serviceused::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('serviceused::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
