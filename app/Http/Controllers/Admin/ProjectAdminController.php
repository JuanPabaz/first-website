<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Branding;
use App\Models\Image;
use App\Models\Project;
use App\Models\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectAdminController extends Controller
{
    public function index()
    {
        $projects = Project::with(['type', 'branding'])->orderBy('date', 'desc')->paginate(12);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $types = ProjectType::all();
        return view('admin.projects.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'date'            => 'required|date',
            'description'     => 'required|string',
            'img'             => 'required|image|max:5120',
            'project_type_id' => 'nullable|exists:project_types,id',
            'images.*'        => 'nullable|image|max:5120',
            'branding_name'   => 'nullable|string|max:255',
            'branding_images.*' => 'nullable|image|max:5120',
        ]);

        // Main image upload
        $mainImageName = $this->uploadImage($request->file('img'));

        $project = Project::create([
            'name'            => $request->name,
            'date'            => $request->date,
            'description'     => $request->description,
            'img'             => $mainImageName,
            'tipo'            => $request->boolean('destacado') ? 'Destacado' : null,
            'project_type_id' => $request->project_type_id,
        ]);

        // Gallery images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                if (!$file->isValid()) continue;
                $filename = $this->uploadImage($file);
                $image = new Image();
                $image->project_id = $project->id;
                $image->path = $filename;
                $image->branding_id = null;
                $image->save();
            }
        }

        // Branding
        if ($request->filled('branding_name') || $request->filled('branding_description')) {
            $branding = Branding::create([
                'project_id'  => $project->id,
                'name'        => $request->branding_name,
                'description' => $request->branding_description,
            ]);

            if ($request->hasFile('branding_images')) {
                foreach ($request->file('branding_images') as $file) {
                    if (!$file->isValid()) continue;
                    $filename = $this->uploadImage($file);
                    $image = new Image();
                    $image->project_id = null;
                    $image->branding_id = $branding->id;
                    $image->path = $filename;
                    $image->save();
                }
            }
        }

        AuditLog::registrar('proyecto_creado', 'Project', $project->id, $project->name, [
            'tipo'            => $project->tipo,
            'project_type_id' => $project->project_type_id,
        ]);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyecto creado exitosamente.');
    }

    public function edit(Project $project)
    {
        $project->load(['images', 'branding.images', 'type']);
        $types = ProjectType::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'date'            => 'required|date',
            'description'     => 'required|string',
            'img'             => 'nullable|image|max:5120',
            'project_type_id' => 'nullable|exists:project_types,id',
            'images.*'        => 'nullable|image|max:5120',
            'branding_name'   => 'nullable|string|max:255',
            'branding_images.*' => 'nullable|image|max:5120',
        ]);

        $data = [
            'name'            => $request->name,
            'date'            => $request->date,
            'description'     => $request->description,
            'tipo'            => $request->boolean('destacado') ? 'Destacado' : null,
            'project_type_id' => $request->project_type_id,
        ];

        // Replace main image if a new one was uploaded
        if ($request->hasFile('img')) {
            $this->deleteImageFile($project->img);
            $data['img'] = $this->uploadImage($request->file('img'));
        }

        $project->update($data);

        // New gallery images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                if (!$file->isValid()) continue;
                $filename = $this->uploadImage($file);
                $image = new Image();
                $image->project_id = $project->id;
                $image->path = $filename;
                $image->branding_id = null;
                $image->save();
            }
        }

        // Branding
        if ($request->filled('branding_name') || $request->filled('branding_description')) {
            $branding = $project->branding ?? Branding::create(['project_id' => $project->id, 'name' => '', 'description' => '']);

            $branding->update([
                'name'        => $request->branding_name,
                'description' => $request->branding_description,
            ]);

            if ($request->hasFile('branding_images')) {
                foreach ($request->file('branding_images') as $file) {
                    if (!$file->isValid()) continue;
                    $filename = $this->uploadImage($file);
                    $image = new Image();
                    $image->project_id = null;
                    $image->branding_id = $branding->id;
                    $image->path = $filename;
                    $image->save();
                }
            }
        }

        AuditLog::registrar('proyecto_editado', 'Project', $project->id, $project->name, [
            'tipo'            => $project->tipo,
            'project_type_id' => $project->project_type_id,
        ]);

        return redirect()->route('admin.projects.edit', $project->id)
            ->with('success', 'Proyecto actualizado exitosamente.');
    }

    public function destroy(Project $project)
    {
        // Delete gallery images files
        foreach ($project->images as $image) {
            $this->deleteImageFile($image->path);
        }

        // Delete branding images files
        if ($project->branding) {
            foreach ($project->branding->images as $image) {
                $this->deleteImageFile($image->path);
            }
        }

        // Delete main image file
        $this->deleteImageFile($project->img);

        $projectName = $project->name;
        $projectId   = $project->id;
        $project->delete();

        AuditLog::registrar('proyecto_eliminado', 'Project', $projectId, $projectName);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyecto eliminado exitosamente.');
    }

    public function destroyImage(Project $project, Image $image)
    {
        $this->deleteImageFile($image->path);
        $image->delete();

        AuditLog::registrar('imagen_eliminada', 'Image', $image->id, $project->name, [
            'imagen' => $image->path,
        ]);

        return back()->with('success', 'Imagen eliminada.');
    }

    public function destroyBranding(Project $project)
    {
        if ($project->branding) {
            foreach ($project->branding->images as $image) {
                $this->deleteImageFile($image->path);
            }
            $project->branding->delete();

            AuditLog::registrar('branding_eliminado', 'Branding', $project->id, $project->name);
        }

        return back()->with('success', 'Branding eliminado.');
    }

    public function destroyBrandingImage(Project $project, Image $image)
    {
        $this->deleteImageFile($image->path);
        $image->delete();

        AuditLog::registrar('imagen_branding_eliminada', 'Image', $image->id, $project->name, [
            'imagen' => $image->path,
        ]);

        return back()->with('success', 'Imagen de branding eliminada.');
    }

    private function uploadImage($file): string
    {
        $filename = uniqid('proj_') . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);
        return $filename;
    }

    private function deleteImageFile(string $filename): void
    {
        $path = public_path('images/' . $filename);
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}