<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Merchandiser;
use Illuminate\Http\Request;
use App\Http\Resources\AssignCustomerListsResource;
use App\Traits\ResponserTraits;
use App\Http\Requests\MerchandiserRequest;
use App\Http\Resources\MerchandiserResource;
use App\Models\MrLeader;
use Illuminate\Pagination\LengthAwarePaginator;

class MerchandiserController extends Controller
{
    use ResponserTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MerchandiserRequest $request)
    {
        $leaders = MrLeader::where('supervisor_id',$request->supervisor_id)->get();
        $merchandisers = collect();
        foreach($leaders as $leader){
            $merchandiserByLeader = Merchandiser::where('leader_id', $leader->id)->when(isset($request['name']), function ($q) use ($request) {
                $q->where('name', 'like', "%{$request['name']}%");
            })->get();
            $merchandisers = $merchandisers->concat($merchandiserByLeader);
        }
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 15;

        // Paginate the merged collection
        $merchandisersPaginated = new LengthAwarePaginator(
            $merchandisers->forPage($currentPage, $perPage),
            $merchandisers->count(),
            $perPage,
            $currentPage
        );

        $merchandisersPaginated->withQueryString();
        return $this->responseSuccessWithPaginate('Success', MerchandiserResource::collection($merchandisersPaginated));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function assignCustomerLists(Request $request){
        $merchandiser = Merchandiser::Find(auth()->user()->id);
        if($request->date){
            $assign_customer_lists = $merchandiser->customers()->wherePivot('assign_date', '=', $request->date)->get();
        }else{
            $assign_customer_lists = $merchandiser->customers;
        }
        return $this->responseSuccess('success', AssignCustomerListsResource::collection($assign_customer_lists));
    }
}
