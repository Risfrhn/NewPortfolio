<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\LandingModel as Landing;
use Throwable;

class LandingController extends Controller
{
    public function showLanding(){
        try{
            $Data = Landing::first();
            return response()->json($Data);
        }catch (\Throwable $e){
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: '.$e->getMessage(),
                'errors' => $e instanceof \Illuminate\Validation\ValidationException 
                    ? $e->errors() 
                    : $e->getMessage(),
            ],500);
        }
    }
    public function createLanding(Request $request){
        try{
            $validated = $request->validate([
                'HeaderDesk' => 'nullable|string',
                'HeaderSkill' => 'nullable|array',
                'CV' => 'nullable|mimes:pdf|max:2048',
                'AboutDesk' => 'nullable|string',
            ]);
            $path = null;
            $Data = Landing::first();
            if(!$Data){
                $Data = new Landing();
                $Data->HeaderDesk = $validated['HeaderDesk'] ?? $Data->HeaderDesk;
                $Data->AboutDesk = $validated['AboutDesk'] ?? $Data->AboutDesk;
                $Data->HeaderSkill = $validated['HeaderSkill'] ?? $Data->HeaderSkill;
                if($request->hasFile('CV')){
                    if($Data->CV && \Storage::exist($Data->CV)){
                        \Storage::delete($Data->CV);
                    }
                    $path = $request->file('CV')->store('LandingData/CV');
                    $Data->CV = $path;
                } 
                $Data->save();
            }else{
                $Data->HeaderDesk = $validated['HeaderDesk'] ?? $Data->HeaderDesk;
                $Data->AboutDesk = $validated['AboutDesk'] ?? $Data->AboutDesk;
                $Data->HeaderSkill = $validated['HeaderSkill'] ?? $Data->HeaderSkill;
                if($request->hasFile('CV')){
                    if($Data->CV && \Storage::exists($Data->CV)){
                        \Storage::delete($Data->CV);
                    }
                    $path = $request->file('CV')->store('LandingData/CV');
                    $Data->CV = $path;
                } 
                $Data->save();
            }
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditambahkan/diubah',
                'data' => $Data
            ],200);
        }catch (\Throwable $e){
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: '.$e->getMessage(),
                'errors' => $e instanceof \Illuminate\Validation\ValidationException 
                    ? $e->errors() 
                    : $e->getMessage(),
            ],500);
        }
    }
}
