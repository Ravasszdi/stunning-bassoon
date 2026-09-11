<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("cost");
            $table->integer("time");
            $table->foreignId("manager_id")->constrained('users','id')->onDelete("cascade");
            $table->timestamps();
        });

        Project::create([
            "name" => "php adatbázis",
            "cost" => 100000000,
            "time" => 10,
            "manager_id" => 2,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
