<?php

namespace App\Http\Controllers;

use App\Http\Resources\DefaultTableResource;
use App\Models\Data;
use Illuminate\Http\Request;

class DefaultTableController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->input('search');
            $table = Data::where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%');
            })->paginate(20);
        } else {
            $table = Data::paginate(20);
        }

        return  new DefaultTableResource($table);
    }
}
