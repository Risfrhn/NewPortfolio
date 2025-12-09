<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\LandingModel as Landing;
use Throwable;

class LandingController extends Controller
{
    public function showLanding(){
        try{
            $Data = Landing::all();
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
                'HeaderDesk' => 'required|string',
                'HeaderSkill' => 'required|array',
                'CV' => 'nullable|mimes:pdf|max:2048',
                'AboutDesk' => 'required|string',
            ]);
            $path = null;
            $Data = Landing::first();
            if(!$Data){
                $Data = new Landing();
                $Data->fill($validated);
                if($request->hasFile('CV')){
                    $path = $request->file('CV')->store('images/LandingData/');
                } 
                $Data->CV = $path;
                $Data->save();
            }else{
                if($request->hasFile('CV')){
                    $path = $request->file('CV')->store('images/LandingData/');
                }
                $Data->update([
                    'HeaderDesk' => $request->HeaderDesk ?? $Data->HeaderDesk, 
                    'HeaderSkill' => $request->HeaderSkill?? $Data->HeaderSkill, 
                    'CV' => $path ?? $Data->CV,
                    'AboutDesk' => $request->AboutDesk?? $Data->AboutDesk,
                ]);
                
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
