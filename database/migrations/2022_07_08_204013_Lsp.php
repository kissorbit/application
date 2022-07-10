<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lsp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Lsp";
    public function up()
    {
        if ( Schema::hasTable("Lsp") ) {
            $this->down();
            Schema::create("Lsp", function (Blueprint $table) {
                $table->increments('id');
                $table->string('compagny_name');$table->string('compagny_address');$table->string('name');$table->string('first_name');$table->string('email');$table->string('phone');$table->string('country');$table->string('city');$table->string('lsp_admin_file');$table->string('lsp_number_of_trucks');$table->string('lsp_trucks_files');$table->string('lsp_transport_license');$table->string('lsp_transport_countries');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Lsp", function (Blueprint $table) {
                $table->increments('id');
                $table->string('compagny_name');$table->string('compagny_address');$table->string('name');$table->string('first_name');$table->string('email');$table->string('phone');$table->string('country');$table->string('city');$table->string('lsp_admin_file');$table->string('lsp_number_of_trucks');$table->string('lsp_trucks_files');$table->string('lsp_transport_license');$table->string('lsp_transport_countries');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Lsp');
    }
}
