<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatefreelancerprofileUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->string('dob', 10);
            $table->tinyInteger('address_id');
            $table->string('sia_licence', 50);
            $table->string('sia_expirydate', 10);
            $table->tinyInteger('work_category');
            $table->tinyInteger('nation_id');
            $table->string('visa_no', 50);
            $table->string('niutr_no', 50);
            $table->string('pass_page', 200);
            $table->string('visa_page', 200);
            $table->string('sia_doc', 200);
            $table->string('address_proof', 200);
            $table->string('passphoto', 200);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('dob');
            $table->dropColumn('address_id');
            $table->dropColumn('sia_licence');
            $table->dropColumn('sia_expirydate');
            $table->dropColumn('work_category');
            $table->dropColumn('nation_id');
            $table->dropColumn('visa_no');
            $table->dropColumn('niutr_no');
            $table->dropColumn('pass_page');
            $table->dropColumn('visa_page');
            $table->dropColumn('sia_doc');
            $table->dropColumn('address_proof');
            $table->dropColumn('passphoto');
        });
    }
}
