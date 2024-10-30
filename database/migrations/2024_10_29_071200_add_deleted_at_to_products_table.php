<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->softDeletes(); // This will add a nullable deleted_at column
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropSoftDeletes(); // This will drop the deleted_at column
        });
    }
}
