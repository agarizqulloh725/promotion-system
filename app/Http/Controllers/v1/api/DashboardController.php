<?php

namespace App\Http\Controllers\v1\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Exception;
use App\Models\Branch;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DashboardController extends Controller
{
    public function dataAll()
    {
        try {
            $branches = Branch::all();
            $totalBranches = $branches->count(); 
            return response()->json([
                'total' => $totalBranches, 
                'data' => $branches 
            ], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred while retrieving the branches'], 500);
        }
    }


}
