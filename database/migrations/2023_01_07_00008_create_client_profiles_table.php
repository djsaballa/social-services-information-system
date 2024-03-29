<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_profiles', function (Blueprint $table) {
            $table->id();
            $table->binary('picture')->nullable();
            $table->boolean('privacy_consent');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('address');
            $table->string('gender');
            $table->string('contact_number');
            $table->integer('age');
            $table->date('birth_date');
            $table->string('occupation');
            $table->string('height');
            $table->string('weight');
            $table->string('baptism_date')->nullable();
            $table->string('philhealth_member');
            $table->string('health_card')->nullable();
            $table->string('contact_person1_name');
            $table->string('contact_person1_contact_number');
            $table->string('contact_person2_name');
            $table->string('contact_person2_contact_number');
            $table->string('background_info');
            $table->binary('background_info_attachment')->nullable();
            $table->string('action_taken');
            $table->binary('action_taken_attachment')->nullable();
            $table->string('locale_servant_remark')->nullable();
            $table->string('zone_servant_remark')->nullable();
            $table->string('district_servant_remark')->nullable();
            $table->string('social_worker_recommendation')->nullable();
            $table->string('status');
            $table->foreignId('user_encoder_id')
                  ->constrained('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('locale_id')
                  ->constrained('locales')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('assigned_doctor_id')
                  ->nullable()
                  ->constrained('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('medical_category_id')
            ->nullable()
            ->constrained('medical_categories')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('client_profiles');
    }
}
