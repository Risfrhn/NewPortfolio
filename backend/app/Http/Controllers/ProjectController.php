<?php

namespace App\Http\Controllers;

use App\Models\ProjectModel as Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ProjectController extends Controller
{
    public function createProject(Request $request)
    {
        try {

            // VALIDATION
            $validated = $request->validate([
                'logo_project' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
                'flyer_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
                'project_name' => 'nullable|string',
                'Company' => 'nullable|string',
                'start_project' => 'nullable|date',
                'end_project' => 'nullable|date',
                'position'=>'nullable|in:Fullstack,Backend,Frontend,System analyst',
                'description_project'=> 'nullable|string',
                'type'=> 'nullable|in:portfolio,product',
                'type_project'=> 'nullable|in:Website, App mobile, UI/UX Design, App dekstop, Documentation',
                'Tech'=> 'nullable|array',
                'Price'=> 'nullable|decimal',
                'feature'=> 'nullable|string',
                'link_website'=> 'nullable|string',
                'link_app'=> 'nullable|string',
            ]);

            $Data = new Project();
            $Data->fill($validated);

            $path = null;
            $files = [
                'logo_project' => 'logo_project',
                'flyer_image' => 'flyer_image'
            ];
            foreach($files as $input => $column){
                if ($request->hasFile($input)) {
                    $file = $request->file($input);
                    $newFileName = $Data->project_name . "-" . $column;
                    $path = $file->storeAs('images/' . Str::slug($Data->project_name), $newFileName);
                    $Data->{$input} = $path ? 'storage/' . $path : null;
                }
            }
            $Data->save();

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditambahkan',
                'data' => $Data
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error',
                'errors' => $e instanceof \Illuminate\Validation\ValidationException 
                    ? $e->errors() 
                    : $e->getMessage(),
            ], 500);
        }
    }

    public function updateProject(Request $request, $id_Project){
        try{
            $Data = Project::findOrFail($id_Project);
        
            $validated = $request->validate([
                'logo_project' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
                'flyer_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
                'project_name' => 'nullable|string',
                'Company' => 'nullable|string',
                'start_project' => 'nullable|date',
                'end_project' => 'nullable|date',
                'position'=>'nullable|in:Fullstack,Backend,Frontend,System analyst',
                'description_project'=> 'nullable|string',
                'type'=> 'nullable|in:portfolio,product',
                'type_project'=> 'nullable|in:Website, App mobile, UI/UX Design, App dekstop, Documentation',
                'Tech'=> 'nullable|array',
                'price'=> 'nullable|numeric',
                'feature'=> 'nullable|string',
                'link_website'=> 'nullable|string',
                'link_app'=> 'nullable|string',
            ]);

            $Data->project_name = $validated['project_name'] ?? $Data->project_name;
            $Data->Company = $validated['Company'] ?? $Data->Company;
            $Data->start_project = $validated['start_project'] ?? $Data->start_project;
            $Data->end_project = $validated['end_project'] ?? $Data->end_project;
            $Data->position = $validated['position'] ?? $Data->position;
            $Data->description_project = $validated['description_project'] ?? $Data->description_project;
            $Data->type = $validated['type'] ?? $Data->type;
            $Data->type_project = $validated['type_project'] ?? $Data->type_project;
            $Data->Tech = $validated['Tech'] ?? $Data->Tech;
            $Data->price = $validated['price'] ?? $Data->price;
            $Data->feature = $validated['feature'] ?? $Data->feature;
            $Data->link_website = $validated['link_website'] ?? $Data->link_website;
            $Data->link_app = $validated['link_app'] ?? $Data->link_app;
            if($request->hasFile('logo_project')){
                if($Data->logo_project && Storage::exists($Data->logo_project)){
                    Storage::delete($Data->logo_project);
                }
                $path = $request->file('logo_project')->store('project/'. $Data->project_name . '/logo', 'public');
                $Data->logo_project = $path;
            }
            if($request->hasFile('flyer_image')){
                if($Data->flyer_image && Storage::exists($Data->flyer_image)){
                    Storage::delete($Data->flyer_image);
                }
                $path = $request->file('flyer_image')->store('project/'. $Data->project_name . '/flyer', 'public');
                $Data->flyer_image = $path;
            }
            
            // return response()->json($request->all());
            $Data->save();
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditambahkan',
                'data' => $Data
            ], 200);
        }catch(\Throwable $e){
             return response()->json([
                'status' => false,
                'message' => 'Error',
                'errors' => $e instanceof \Illuminate\Validation\ValidationException 
                    ? $e->errors() 
                    : $e->getMessage(),
            ], 500);
        }
    }

    public function deleteProject($id_project){
        try{
            $Data = Project::findOrFail($id_project);
            $fileProject = storage_path('app/private/images/' . Str::slug($Data->name));
            $fileProject = $this->deleteFolder($fileProject);
            $Data->delete();

            return response()->json([
                'status' => true,
                'message' => 'data berhasil dihapus',
            ], 200);
        }catch(\Throwable $e){
            return response()->json([
                'status' => false,
                'message' => 'Error',
                'errors' => $e instanceof \Illuminate\Validation\ValidationException 
                    ? $e->errors() 
                    : $e->getMessage(),
            ], 500);
        }
    }


    private function deleteFolder($filepath){
        if(!is_dir($filepath)) return false;
        $files = array_diff(scandir($filepath), ['.', '..']);

        foreach ($files as $file){
            $fileLoc = $filepath . DIRECTORY_SEPARATOR . $file;

            if (is_dir($fileLoc)) {
                $this->deleteFolder($fileLoc);
            }else{
                unlink($fileLoc); 
            }
        }
        rmdir($filepath);
    }

    public function showByType($Type){
        try{
            $data = Project::where('type', $Type)->paginate(12);
            return response()->json([
                'status' => true,
                'message' => 'data berhasil ditampilkan semua',
                'data' => $data
            ], 200);
        }catch(\Throwable $e){
            return response()->json([
                'status' => false,
                'message' => 'Error',
                'errors' => $e instanceof \Illuminate\Validation\ValidationException 
                    ? $e->errors() 
                    : $e->getMessage(),
            ], 500);
        }
    }

    public function searchPortfolio(Request $request, $type){
        try{
            $cari =  $request->search;
            $data = Project::where('type', $type)
                            ->where(function($query) use ($cari){
                                $query->whereRaw("LOWER(project_name) LIKE ?",["%".strtolower($cari)."%"])
                                ->orWhereRaw("LOWER(Company) LIKE ?",["%".strtolower($cari)."%"])
                                ->orWhereRaw("LOWER(Tech) LIKE ?",["%".strtolower($cari)."%"]);
                            })
                            ->get();
            return response()->json([
                'data' => $data
            ]);
        }catch (\Throwable $e){
            return response()->json([
                'status' => false,
                'message' => 'Error',
                'errors' => $e instanceof \Illuminate\Validation\ValidationException 
                    ? $e->errors() 
                    : $e->getMessage(),
            ], 500);
        }
    }

    public function filterByTech(Request $request, $type){
        try{
            $filter = $request->filter;
            $data = Project::where('type', $type)
            ->whereJsonContains('Tech', $filter)
            ->get();
            return response()->json([
                'data' => $data
            ]);

        }catch(\Throwable $e){
            return response()->json([
                'status' => false,
                'message' => 'Error',
                'errors' => $e instanceof \Illuminate\Validation\ValidationException 
                    ? $e->errors() 
                    : $e->getMessage(),
            ], 500);
        }
    }

    public function getTech($type){
        $data = Project::pluck('Tech')->toArray();

        $flat = [];
        foreach($data as $techs){
            if (is_array($techs)) {
                $flat = array_merge($flat, $techs);
            }
        }
        
        $unique = array_values(array_unique($flat));

        return response()->json([
            'status' => true,
            'data' => $unique
        ]);
    }
}




// $path = null;
            // $files = [
            //     'logo_project' => 'logo_project',
            //     'flyer_image' => 'flyer_image'
            // ];
            // foreach($files as $input => $column){
            //     if ($request->hasFile($input)) {
            //         $file = $request->file($input);
            //         $folder = 'images' . Str::slug($Data->project_name);
            //         if(!storage::exists($folder)){
            //             Storage::makeDirectory($folder);
            //         }
            //         if($Data->{$input} && Storage::exists($Data->{$input})){
            //             Storage::delete($Data->{$input});
            //         }
            //         $newFileName = $Data->project_name . $column;
            //         $path = $file->storeAs($folder, $newFileName);
            //         $Data->{$input} = $path ? 'storage/' . $path : null;
            //     }
            // }
            // $Data->fill($validated);
