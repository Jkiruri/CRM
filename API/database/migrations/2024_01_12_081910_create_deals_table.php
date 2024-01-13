<?php

use App\Models\Company;
use App\Models\Contact;
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
        Schema::create('deals', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->decimal('amount', 10, 2);
        $table->foreignIdFor(Company::class)->constrained()->onDelete('cascade');
        $table->foreignIdFor(Contact::class)->constrained()->onDelete('cascade');
        $table->date('closed_date')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};