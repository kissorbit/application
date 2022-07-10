<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Trucksregistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Trucksregistration";
    public function up()
    {
        if ( Schema::hasTable("Trucksregistration") ) {
            $this->down();
            Schema::create("Trucksregistration", function (Blueprint $table) {
                $table->increments('id');
                $table->integer('lsp_name_reference');$table->string('lsp_trucks_immatriculation');$table->string('lsp_truck_type');$table->string('lsp_truck_picture');$table->string('lsp_truck_insurance');$table->string('lsp_truck_insurance_strdate');$table->string('lsp_truck_insurance_expdate');$table->string('lsp_truck_patent');$table->string('lsp_truck_registration_doc');$table->string('lsp_truck_availability');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Trucksregistration", function (Blueprint $table) {
                $table->increments('id');
                $table->integer('lsp_name_reference');$table->string('lsp_trucks_immatriculation');$table->string('lsp_truck_type');$table->string('lsp_truck_picture');$table->string('lsp_truck_insurance');$table->string('lsp_truck_insurance_strdate');$table->string('lsp_truck_insurance_expdate');$table->string('lsp_truck_patent');$table->string('lsp_truck_registration_doc');$table->string('lsp_truck_availability');
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
        Schema::drop('Trucksregistration');
    }
}
