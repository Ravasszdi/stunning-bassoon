<?php

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("tasks", function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("desctiption")->nullable();
            $table->date("end_date")->nullable();
            $table->boolean("status")->default(false);
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->foreignId("project_id")->default(null)->constrained();
            $table->timestamps();
        });

        Task::create([
            "title" => "táblák",
            "description" => "tetszik a workbanch",
            "end_date" => null,
            "user_id" => 2,
            "project_id" => 1
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("tasks");
    }
};
