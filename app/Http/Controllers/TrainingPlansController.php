<?php

namespace App\Http\Controllers;

use App\Exports\TrainingsExport;
use App\Services\Interfaces\ICrudService;
use App\Services\Interfaces\ITrainingPlanner;
use App\Sport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class TrainingPlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ICrudService $crudService
     * @return \Illuminate\Http\Response
     */
    public function index(ICrudService $crudService)
    {
        if (!\Auth::check()) {
            return redirect()->route('login');
        }

        $sports = $crudService->GetAllSports();

        return view('trainingplan.index', ['sports' => $sports]);
    }


    public function export(Request $request, ITrainingPlanner $trainingPlanner)
    {

        $export = new TrainingsExport($request->input('experience'), Sport::find($request->input('sport')), $trainingPlanner);

        return \Maatwebsite\Excel\Facades\Excel::download($export,
            'tp.xlsx', Excel::XLSX);

    }
}
