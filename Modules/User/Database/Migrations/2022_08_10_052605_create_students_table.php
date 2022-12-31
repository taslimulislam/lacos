<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('student_code')->nullable();
            $table->string('student_roll_id')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('adm_no')->nullable(); // may auto generate and sent student application,student enquery table
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('ac_semester_id');
            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('academic_year_id');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('student_enquery_id');
            $table->unsignedBigInteger('admission_student_id');
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('sponsor_id')->nullable();
            $table->unsignedBigInteger('sp_operator_id')->nullable();
            $table->unsignedBigInteger('award_id')->nullable();
            $table->unsignedBigInteger('lead_source_id')->nullable();
            $table->unsignedBigInteger('shift_id')->nullable();
            $table->unsignedBigInteger('batch_time_id');
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->unsignedBigInteger('father_nationality')->nullable();
            $table->unsignedBigInteger('mother_nationality')->nullable();
            $table->string('student_first_name');
            $table->string('student_middle_name')->nullable();
            $table->string('student_last_name');
            $table->string('student_contact_no');
            $table->string('student_contact_no2')->nullable();
            $table->string('student_email')->nullable();
            $table->dateTime('dob')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->string('sp_contact_no');
            $table->string('sp_contact_no2')->nullable();
            $table->string('cc_email_invoice1')->nullable();
            $table->string('cc_email_invoice2')->nullable();
            $table->double('program_fee')->nullable();
            $table->integer('program_duration')->nullable();
            $table->dateTime('reg_date')->nullable();
            $table->dateTime('adm_date')->nullable();
            $table->boolean('is_registerd')->nullable();
            $table->boolean('is_admitted')->nullable();
            $table->string('last_qualification')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('id_proof_name')->nullable();
            $table->string('id_proof_location')->nullable();
            $table->string('pass_out_proof_name')->nullable();
            $table->string('pass_out_proof_location')->nullable();
            $table->string('parents_id_proof_name')->nullable();
            $table->string('parents_id_proof_location')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->double('father_annual_income')->nullable();
            $table->string('father_contact')->nullable();
            $table->string('father_contact2')->nullable();
            $table->string('father_email')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->double('mother_annual_income')->nullable();
            $table->string('mother_contact')->nullable();
            $table->string('mother_contact2')->nullable();
            $table->string('mother_email')->nullable();
            $table->text('current_address')->nullable();
            $table->text('parmanent_address')->nullable();
            $table->string('nid')->nullable();
            $table->boolean('is_eligible')->default(0);
            $table->dateTime('varification_datetime')->nullable();
            $table->integer('varification_by')->nullable();
            $table->longText('comments')->nullable();
            $table->boolean('is_replied')->default(0);
            $table->timestamp('replied_time')->nullable();
            $table->integer('replied_by')->nullable();
            $table->longText('replied_comments')->nullable();

            $table->unsignedBigInteger('marital_status_id')->nullable();
            $table->boolean('is_disable')->default(0);
            $table->string('disabilities_desc')->nullable();
            $table->string('region')->nullable();

            $table->string('indexnumber')->nullable();
            $table->integer('totalcertificate')->nullable();

            $table->updateCreatedBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
