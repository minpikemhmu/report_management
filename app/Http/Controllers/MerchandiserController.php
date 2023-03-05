<?php

namespace App\Http\Controllers;

use App\Models\Merchandiser;
use App\Models\Region;
use App\Models\MerchantTeam;
use App\Models\MerchantArea;
use App\Models\Channel;
use Illuminate\Http\Request;
use App\Services\MerchandiserService;
use App\Http\Requests\StoreMerchandiserRequest;
use App\Http\Requests\UpdateMerchandiserRequest;

class MerchandiserController extends Controller
{
    public function __construct(private MerchandiserService $service)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchandiser = Merchandiser::all();
        return view('merchandiser.index',compact('merchandiser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions= Region::all();
        $teams = MerchantTeam::all();
        $areas = MerchantArea::all();
        $channels = Channel::all();
        return view('merchandiser.create',compact('regions', 'teams', 'areas', 'channels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerchandiserRequest $request)
    {
        $this->service->storeMerchandiser($request);
        return redirect()->route('merchandiser.index')->with("successMsg",'New Merchandiser is ADDED in your data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchandiser  $merchandiser
     * @return \Illuminate\Http\Response
     */
    public function show(Merchandiser $merchandiser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchandiser  $merchandiser
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchandiser $merchandiser)
    {
        $regions= Region::all();
        $teams = MerchantTeam::all();
        $areas = MerchantArea::all();
        $channels = Channel::all();
        return view('merchandiser.edit',compact('regions', 'teams', 'areas', 'channels', 'merchandiser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchandiser  $merchandiser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMerchandiserRequest $request, Merchandiser $merchandiser)
    {
        $this->service->update($request, $merchandiser);
        return redirect()->route('merchandiser.index', $merchandiser->id)->with("successMsg",'Existing Mrchandiser is UPDATED in your data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchandiser  $merchandiser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchandiser $merchandiser)
    {
        //
    }
}
