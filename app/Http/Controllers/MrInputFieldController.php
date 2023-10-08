<?php

namespace App\Http\Controllers;
use App\Models\MrInputField;
use App\Models\MerchandiserReportType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFieldRequest;
use App\Http\Requests\UpdateFieldRequest;
use App\Services\FieldService;
use App\Exceptions\FieldException;

class MrInputFieldController extends Controller
{
    public function __construct(private FieldService $fieldService)
    {        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = MrInputField::all();

        return view('mr_input_fields.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $report_types = MerchandiserReportType::all();
         return view('mr_input_fields.create', compact('report_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFieldRequest $request)
    {
        try {
            $this->fieldService->storeField($request);
            return redirect()->route('mr_input_fields.index')->with("successMsg",'New Field was ADDED in your data');
        } catch (FieldException $e) {
            $errorMessage = $e->getMessage();
            return redirect()->back()->with('custom_error', $errorMessage);
        }
        
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
        $field = MrInputField::find($id);
        $report_types = MerchandiserReportType::all();
        return view('mr_input_fields.edit', compact('report_types', 'field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFieldRequest $request, $id)
    {
        $field = MrInputField::find($id);
        $this->fieldService->update($request, $field);
        return redirect()->route('mr_input_fields.index')->with("successMsg",'Existing Field was UPDATED in your data');
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
}
