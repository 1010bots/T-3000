<?php

use App\Models\Product;
use App\Models\Publisher;
use App\Models\Team;
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
        if (!Schema::hasTable('publishers')) Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->char('slug', 64)->unique();
            $table->timestamps();
            $table->text('name');
            $table->text('status');
            $table->foreignIdFor(Team::class, 'team_id')->nullable();
            $table->text('url');
            $table->unsignedInteger('images_schema_version')->nullable();
            $table->json('images')->nullable();
            $table->unsignedInteger('extras_schema_version')->nullable();
            $table->json('extras')->nullable();
        });

        if (!Schema::hasTable('products')) Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->char('slug', 64)->unique();
            $table->timestamps();
            $table->text('name');
            $table->text('type');
            $table->text('status');
            $table->text('description');
            $table->text('keywords');
            $table->unsignedInteger('images_schema_version')->nullable();
            $table->json('images')->nullable();
            $table->text('url')->nullable();
            $table->text('url_support')->nullable();
            $table->text('url_eula')->nullable();
            $table->text('url_privacy')->nullable();
            $table->unsignedInteger('extras_schema_version')->nullable();
            $table->json('extras')->nullable();
        });

        if (!Schema::hasTable('product_publishers')) Schema::create('product_publishers', function (Blueprint $table) {
            $table->foreignIdFor(Product::class);
            $table->foreignIdFor(Publisher::class);
            $table->timestamps();
            $table->primary(['product_id', 'publisher_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publishers');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_publishers');
    }
};
