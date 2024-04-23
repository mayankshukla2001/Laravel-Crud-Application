<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ApiController extends Controller
{
    public function deleteMultiple(Request $request)
    {
        // dd($request);
        // Validate the request data
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:users,id', // Ensure each ID exists in the items table
        ]);

        // Extract the IDs from the request
        $ids = $request->input('ids');

        // Delete the items
        $deleted = User::whereIn('id', $ids)->delete();

        if ($deleted) {
            return response()->json(['message' => 'Items deleted successfully']);
        } else {
            return response()->json(['message' => 'Failed to delete items'], 500);
        }
    }
}
