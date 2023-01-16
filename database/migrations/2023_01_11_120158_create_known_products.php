<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('known_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('known_products')->insert(array('name' =>'Les Actions','created_at' => new DateTimeImmutable(),'updated_at' => new DateTimeImmutable()));
        DB::table('known_products')->insert(array('name' =>'Les Obligations','created_at' => new DateTimeImmutable(),'updated_at' => new DateTimeImmutable()));
        DB::table('known_products')->insert(array('name' =>'Les Produits Dérivés','created_at' => new DateTimeImmutable(),'updated_at' => new DateTimeImmutable()));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('known_products',function(Blueprint $table) {
            $table->dropForeign('user_id');
        });
        Schema::dropIfExists('user_known_products');
    }
};
