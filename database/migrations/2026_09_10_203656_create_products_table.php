<?php

use App\Models\User;
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
        /* Why don't we do something like :
              $table = new Schema;
              $table->name = 'products'
              $table->fields([
                         productname => [string, varchar]
                         productprice =>  [],
                         productdescription => [],
                         productimage => [],
                      ])
                         well we have to create $table if we use Schema::create().
        */
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_image');
            $table->string('description');
            $table->decimal('price', 10, 2);
            $table->foreignIdFor(User::class, 'created_by')->nullable();
            $table->foreignIdFor(User::class, 'updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignIdFor(User::class, 'deleted_by')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
