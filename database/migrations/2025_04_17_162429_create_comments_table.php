<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->timestamps();
            $table->foreignIdFor(\App\Models\User::class)
                ->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Article::class)
                ->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::create('users', function (Blueprint $table) {
            $table->dropForeignIdFor(Role::class);
        });
    }
};
