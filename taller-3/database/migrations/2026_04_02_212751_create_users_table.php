<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("username")->unique();
            $table->string("password");
            $table->timestamps();
        });

        Schema::create('personal_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
            $table->string("cedula")->unique();
            $table->string("nombre");
            $table->string("apellido");
            $table->integer("edad")->unsigned();
            $table->char("genero",1);
            $table->string("estado_civil");
            $table->text("direccion");
            $table->string("cargo");
            $table->timestamps();
        });

        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->foreignId("data_id")->constrained("personal_data")->onDelete("cascade");
            $table->string("telefono_principal", 12);
            $table->string("telefono_secundario", 12)->nullable();
            $table->timestamps();
        });

        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->foreignId("data_id")->constrained("personal_data")->onDelete("cascade");
            $table->string("correo_principal");
            $table->string("correo_secundario")->nullable();
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('phones');
        Schema::dropIfExists('emails');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('personal_data');
        Schema::dropIfExists('users');
    }
};
