<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ReportAuthorBookCount;
use App\Models\ReportAuthorCountSubject;
use App\Models\ReportBookSummary;
use App\Models\ReportSubjectBookCount;
use App\Models\ReportSubjectByYear;

class ReportController extends Controller
{


    public function bookSummary()
    {
        $summary = ReportBookSummary::orderBy('year_publication')->get();

        return response()->json([
            'message' => 'Operação realizada com sucesso',
            'status' => 'success',
            'data' => $summary
        ]);
    }

    public function authorBookCount()
    {
        $count = ReportAuthorBookCount::orderBy('name')->get();
        return response()->json([
            'message' => 'Operação realizada com sucesso',
            'status' => 'success',
            'data' => $count
        ]);
    }
    public function subjectBookCount()
    {
        $count = ReportSubjectBookCount::orderBy('description')->get();
        return response()->json([
            'message' => 'Operação realizada com sucesso',
            'status' => 'success',
            'data' => $count
        ]);
    }

    public function authorCountSubject()
    {
        $countSubject = ReportAuthorCountSubject::orderBy('name')->get();
        return response()->json([
            'message' => 'Operação realizada com sucesso',
            'status' => 'success',
            'data' => $countSubject
        ]);
    }

    public function subjectByYear()
    {
        $countSubject = ReportSubjectByYear::orderBy('year_publication')->get();
        return response()->json([
            'message' => 'Operação realizada com sucesso',
            'status' => 'success',
            'data' => $countSubject
        ]);
    }
}
