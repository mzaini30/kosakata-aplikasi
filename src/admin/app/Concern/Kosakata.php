<?php
namespace App\Concern;

use App\Models\Kosakata as ModelKosakata;
use Illuminate\Support\Facades\Storage;

class Kosakata {
    public static function generateJson(): void {
        $kosakata = ModelKosakata::all()
            ->toJson();
        Storage::disk('local')
            ->put('kosakata.json', $kosakata);
    }
}
