<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Get or update the 3x3 grid state.
     */
    public function index(Request $request)
    {
        if ($request->has('col') && $request->has('row') && $request->has('previous')) {
            return response()->json($this->updateGrid(
                $request->input('previous'),
                $request->input('row'),
                $request->input('col')
            ));
        }

        return response()->json($this->generateRandomGrid());
    }

    /**
     * Generate a random 3x3 grid.
     */
    private function generateRandomGrid(): array
    {
        $grid = [];
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $grid[$i][$j] = rand(0, 1); // 0 = Red, 1 = Blue
            }
        }
        return $grid;
    }

    /**
     * Update the grid based on the clicked square.
     */
    private function updateGrid(array $grid, int $row, int $col): array
    {
        $currentColor = $grid[$row][$col];
        $newColor = $currentColor === 0 ? 1 : 0;

        // Toggle the clicked square
        $grid[$row][$col] = $newColor;

        // Toggle adjacent squares of the opposite color
        $adjacentCoords = [
            [$row - 1, $col], // Up
            [$row + 1, $col], // Down
            [$row, $col - 1], // Left
            [$row, $col + 1], // Right
        ];

        foreach ($adjacentCoords as [$r, $c]) {
            if ($r >= 0 && $r < 3 && $c >= 0 && $c < 3 && $grid[$r][$c] !== $newColor) {
                $grid[$r][$c] = $newColor;
            }
        }

        return $grid;
    }
}
