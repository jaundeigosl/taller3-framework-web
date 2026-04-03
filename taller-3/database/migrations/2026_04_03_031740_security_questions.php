<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('security_questions', function(Blueprint $table){
            $table->id();
            $table->string("pregunta");
            $table->timestamps();
        });

        SChema::create("security_responses", function(Blueprint $table){
            $table->id();
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
            $table->foreignId("question_id")->constrained(("security_questions"))->onDelete("cascade");
            $table->string("respuesta");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('security_response');
        Schema::dropIfExists('security_questions');
    }
};
