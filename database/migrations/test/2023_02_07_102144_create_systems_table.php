<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            // $table->string('last_name');
            $table->string('email')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('nif_number')->nullable()->unique();
            $table->string('phone')->nullable()->unique();
            $table->string('img_url')->nullable();
            $table->string('paypal_client_id')->nullable();
            $table->string('paypal_client_secret')->nullable();
            $table->boolean('paypal_mode')->default(true);
            $table->string('paypal_current')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systems');
    }
}
