<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('branch_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g., North Zone
            $table->string('code')->nullable(); // e.g., NZ
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            
            $table->foreignId('branch_type_id')->nullable()->constrained('branch_types')->nullOnDelete();
            $table->foreignId('region_id')->nullable()->constrained('regions')->nullOnDelete();
            $table->foreignId('manager_id')->nullable()->constrained('users')->nullOnDelete();
            
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('branches');
        Schema::dropIfExists('regions');
        Schema::dropIfExists('branch_types');
    }
};
