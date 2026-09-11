<?php

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
            $table->foreignId("project_id")->constrained();
            $table->timestamps();
        });
        User::create([
            "name" => "admin",
            "email" => "admin@gugu.gaga.com",
            "password" => Hash::make("nem tetszik az arcod de nem mondom el"),
        ]);
        User::create([
            "name" => "Almáli Péter Tamás",
            "email" => "almasi@korp-orp.org",
            "password" => Hash::make("tetszik az arcod de nem mondom el"),
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
