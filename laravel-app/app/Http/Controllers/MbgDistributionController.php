<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\MbgDistribution;
use Illuminate\Http\JsonResponse;

class MbgDistributionController extends Controller
{
    public function getBySchool(School $school): JsonResponse
    {
        $distributions = MbgDistribution::query()
            ->where('school_id', $school->id)
            ->orderByDesc('distribution_date')
            ->get([
                'id',
                'school_id',
                'distribution_date',
                'meal_time',
                'menu_description',
                'provider_name',
            ]);

        return response()->json([
            'status' => 'success',
            'school_name' => $school->name,
            'data' => $distributions,
        ]);
    }
}