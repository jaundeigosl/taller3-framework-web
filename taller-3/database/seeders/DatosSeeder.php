<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\PersonalData;
use App\Models\Phone;
use App\Models\Email;
use Illuminate\Support\Facades\DB;

class DatosSeeder extends Seeder
{
    public function run(): void
    {

        $creador = User::firstOrCreate(
            ['username' => 'admin'], 
            ['password' => '123456']
        );

        $json = '{
          "personas": [
            {"cedula": "20111222", "nombre": "Juan", "apellido": "Perez", "edad": 25, "genero": "masculino", "estadoCivil": "soltero", "direccion": "Av. Bolivar Norte, Valencia", "cargo": "Analista"},
            {"cedula": "18333444", "nombre": "Maria", "apellido": "Gonzalez", "edad": 30, "genero": "femenino", "estadoCivil": "casado", "direccion": "Naguanagua, Calle 190", "cargo": "Contador Senior"},
            {"cedula": "22555666", "nombre": "Alex", "apellido": "Rivas", "edad": 22, "genero": "otros", "estadoCivil": "soltero", "direccion": "San Diego, Urb. El Remanso", "cargo": "Web Designer"},
            {"cedula": "15777888", "nombre": "Carlos", "apellido": "Lopez", "edad": 45, "genero": "masculino", "estadoCivil": "divorciado", "direccion": "Guacara, Centro", "cargo": "Gerente"},
            {"cedula": "12999000", "nombre": "Ana", "apellido": "Martinez", "edad": 55, "genero": "femenino", "estadoCivil": "viudo", "direccion": "Prebo, Edif. Los Pinos", "cargo": "Director"},
            {"cedula": "25111333", "nombre": "Luis", "apellido": "Sanchez", "edad": 21, "genero": "masculino", "estadoCivil": "concubinato", "direccion": "Los Guayos, Sector 3", "cargo": "Asistente"},
            {"cedula": "19444555", "nombre": "Elena", "apellido": "Torres", "edad": 38, "genero": "femenino", "estadoCivil": "casado", "direccion": "Trigal Norte, Calle Tulipanes", "cargo": "Especialista SEO"},
            {"cedula": "23666777", "nombre": "Pedro", "apellido": "Ramirez", "edad": 27, "genero": "masculino", "estadoCivil": "soltero", "direccion": "Tocuyito, El Libertador", "cargo": "Tecnico"},
            {"cedula": "10888999", "nombre": "Carmen", "apellido": "Diaz", "edad": 62, "genero": "femenino", "estadoCivil": "divorciado", "direccion": "Mañongo, Res. El Parral", "cargo": "Secretaria"},
            {"cedula": "26000111", "nombre": "Sofia", "apellido": "Herrera", "edad": 19, "genero": "femenino", "estadoCivil": "soltero", "direccion": "Naguanagua, La Granja", "cargo": "Pasante"},
            {"cedula": "14222333", "nombre": "Roberto", "apellido": "Castro", "edad": 50, "genero": "masculino", "estadoCivil": "casado", "direccion": "San Joaquin, Urb. La Pradera", "cargo": "Supervisor"},
            {"cedula": "21444666", "nombre": "Laura", "apellido": "Suarez", "edad": 33, "genero": "femenino", "estadoCivil": "concubinato", "direccion": "Lomas del Este, Edif. A1", "cargo": "Comprador"},
            {"cedula": "17555777", "nombre": "Miguel", "apellido": "Blanco", "edad": 41, "genero": "masculino", "estadoCivil": "divorciado", "direccion": "San Diego, Tulipanes", "cargo": "Jefe de Area"},
            {"cedula": "24666888", "nombre": "Gabriela", "apellido": "Mendoza", "edad": 24, "genero": "femenino", "estadoCivil": "soltero", "direccion": "Prebo III, Calle 4", "cargo": "Programador"},
            {"cedula": "11777999", "nombre": "Fernando", "apellido": "Gil", "edad": 68, "genero": "masculino", "estadoCivil": "casado", "direccion": "Naguanagua, Quintas del Norte", "cargo": "Oficial"},
            {"cedula": "27888000", "nombre": "Daniela", "apellido": "Rojas", "edad": 18, "genero": "femenino", "estadoCivil": "soltero", "direccion": "Valencia, El Socorro", "cargo": "Recepcionista"},
            {"cedula": "13999111", "nombre": "Jorge", "apellido": "Vargas", "edad": 52, "genero": "masculino", "estadoCivil": "viudo", "direccion": "San Diego, Urb. La Esmeralda", "cargo": "Abogado"},
            {"cedula": "16111223", "nombre": "Patricia", "apellido": "Flores", "edad": 44, "genero": "femenino", "estadoCivil": "casado", "direccion": "Naguanagua, Mañonguito", "cargo": "Analista Contable"},
            {"cedula": "28222444", "nombre": "Ricardo", "apellido": "Mora", "edad": 20, "genero": "masculino", "estadoCivil": "soltero", "direccion": "Valencia, Av. Lara", "cargo": "Despachador"},
            {"cedula": "11333555", "nombre": "Beatriz", "apellido": "Acosta", "edad": 75, "genero": "femenino", "estadoCivil": "viudo", "direccion": "Trigal Centro, Edif. Park", "cargo": "Archivista"}
          ]
        }';

        $datos = json_decode($json, true);

        foreach ($datos['personas'] as $persona) {
            
            $generoFormateado = strtoupper(substr($persona['genero'], 0, 1));

            $nuevoRegistro = PersonalData::create([
                'user_id'      => $creador->id,
                'cedula'       => $persona['cedula'],
                'nombre'       => $persona['nombre'],
                'apellido'     => $persona['apellido'],
                'edad'         => $persona['edad'],
                'genero'       => $generoFormateado,
                'estado_civil' => $persona['estadoCivil'],
                'direccion'    => $persona['direccion'],
                'cargo'        => $persona['cargo'],
            ]);

            Phone::create([
                'data_id' => $nuevoRegistro->id,
                'telefono_principal' => '0414-' . str_pad(rand(1, 9999999), 7, '0', STR_PAD_LEFT),
                'telefono_secundario' => '0241-' . str_pad(rand(1, 9999999), 7, '0', STR_PAD_LEFT),
            ]);

            $emailBase = strtolower($persona['nombre'] . '.' . $persona['apellido'] . '@example.com');
            Email::create([
                'data_id' => $nuevoRegistro->id,
                'correo_principal' => $emailBase,
                'correo_secundario' => 'backup.' . $emailBase,
            ]);
        }
    }
}