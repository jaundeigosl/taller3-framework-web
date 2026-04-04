<?php

namespace App\Http\Controllers;

use App\Models\PersonalData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Phone;
use App\Models\Email;
use Throwable;

class CrudController extends Controller
{
    public function index()
    {
        $datos = PersonalData::with(['phone', 'email'])->get();
        return view('pages/crud', ['datos' => $datos]);
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
            'cedula' => 'required|string|unique:personal_data,cedula',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer|min:15|max:90',
            'genero' => 'required|string|size:1',
            'estado_civil' => 'required|string',
            'direccion' => 'required|string',
            'cargo' => 'required|string|max:255',
            'telefono_principal' => ['required', 'string', 'regex:/^\d{4}-\d{7}$/'],
            'telefono_secundario' => ['nullable', 'string', 'regex:/^\d{4}-\d{7}$/'],
            'correo_principal' => 'required|email|max:255',
            'correo_secundario' => 'nullable|email|max:255',
        ]);

        try {
            DB::transaction(function () use ($validated) {
                $personalData = PersonalData::create([
                    'user_id' => Auth::id(),
                    'cedula' => $validated['cedula'],
                    'nombre' => $validated['nombre'],
                    'apellido' => $validated['apellido'],
                    'edad' => $validated['edad'],
                    'genero' => $validated['genero'],
                    'estado_civil' => $validated['estado_civil'],
                    'direccion' => $validated['direccion'],
                    'cargo' => $validated['cargo'],
                ]);

                Phone::create([
                    'data_id' => $personalData->id,
                    'telefono_principal' => $validated['telefono_principal'],
                    'telefono_secundario' => $validated['telefono_secundario'],
                ]);

                Email::create([
                    'data_id' => $personalData->id,
                    'correo_principal' => $validated['correo_principal'],
                    'correo_secundario' => $validated['correo_secundario'],
                ]);

            });

            return redirect()->route('crud.index')->with('success', 'Empleado registrado exitosamente.');

        } catch (Throwable $e) {
            return back()->withErrors(['error' => 'Hubo un problema al guardar: ' . $e->getMessage()])->withInput();
        }
    }
    public function put(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:personal_data,id',
            'cedula' => 'required|string|unique:personal_data,cedula,' . $request->id,
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer|min:15|max:90',
            'genero' => 'required|string|size:1',
            'estado_civil' => 'required|string',
            'direccion' => 'required|string',
            'cargo' => 'required|string|max:255',
            'telefono_principal' => ['required', 'string', 'regex:/^\d{4}-\d{7}$/'],
            'telefono_secundario' => ['nullable', 'string', 'regex:/^\d{4}-\d{7}$/'],
            'correo_principal' => 'required|email|max:255',
            'correo_secundario' => 'nullable|email|max:255',
        ]);

        try {
            DB::transaction(function () use ($validated, $request) {
                $persona = PersonalData::findOrFail($request->id);
                $persona->update([
                    'cedula' => $validated['cedula'],
                    'nombre' => $validated['nombre'],
                    'apellido' => $validated['apellido'],
                    'edad' => $validated['edad'],
                    'genero' => $validated['genero'],
                    'estado_civil' => $validated['estado_civil'],
                    'direccion' => $validated['direccion'],
                    'cargo' => $validated['cargo'],
                ]);

                Phone::updateOrCreate(
                    ['data_id' => $persona->id],
                    [
                        'telefono_principal' => $validated['telefono_principal'],
                        'telefono_secundario' => $validated['telefono_secundario'],
                    ]
                );

                Email::updateOrCreate(
                    ['data_id' => $persona->id],
                    [
                        'correo_principal' => $validated['correo_principal'],
                        'correo_secundario' => $validated['correo_secundario'],
                    ]
                );
            });

            return redirect()->route('crud.index')->with('success', 'Registro actualizado correctamente.');

        } catch (Throwable $e) {
            return back()->withErrors(['error' => 'Error al actualizar: ' . $e->getMessage()]);
        }
    }
    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:personal_data,id'
        ]);

        try {
            $persona = PersonalData::findOrFail($request->id);
            $persona->delete();
            return redirect()->route('crud.index')->with('success', 'Registro y sus datos de contacto eliminados correctamente.');
        } catch (Throwable $e) {
            return back()->withErrors(['error' => 'No se pudo eliminar el registro: ' . $e->getMessage()]);
        }
    }
}