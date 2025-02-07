<?php

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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->on('companies');
            $table->string('title');
            $table->string('description');
            $table->json('tags');
            $table->foreignId('category_id')->constrained()->cascadeOnDelete(); 
            $table->string('location');
            $table->integer('salary_range');
            $table->enum('job_type', ['Full Time', 'Remote', 'Contract', 'Freelance']);
            $table->string('application_link');
            $table->date('expire_date');
            $table->integer('views')->default(0);
            $table->enum('status', ['active', 'inactive', 'expired'])->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
