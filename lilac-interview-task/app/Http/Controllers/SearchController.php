<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function getAllUsers(Request $request)
    {
        $datas = User::with(['designation', 'department'])->get();

        return view('index', ['datas' => $datas]);
    }

    public function searchByUserDesignationDepartment(Request $request)
    {

        $query = $request->input('query');

        // Log::info($query);

        $datas = User::with(['designation', 'department'])
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhereHas('designation', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('department', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->get();

        // Log::info($datas);

        return response($datas);
    }
}
