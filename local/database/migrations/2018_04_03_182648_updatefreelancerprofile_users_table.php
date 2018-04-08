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
            $table->string('firstname', 50)->collation('utf8mb4_unicode_ci')->after('name');
            $table->string('lastname', 50)->collation('utf8mb4_unicode_ci')->after('firstname');
            $table->string('dob', 10)->collation('utf8mb4_unicode_ci')->after('lastname');
            $table->tinyInteger('address_id')->after('dob');
            $table->string('sia_licence', 50)->collation('utf8mb4_unicode_ci')->after('address_id');
            $table->string('sia_expirydate', 10)->collation('utf8mb4_unicode_ci')->after('sia_licence');
            $table->tinyInteger('work_category')->after('sia_expirydate');
            $table->tinyInteger('nation_id')->after('work_category');
            $table->string('visa_no', 50)->collation('utf8mb4_unicode_ci')->after('nation_id');
            $table->string('niutr_no', 50)->collation('utf8mb4_unicode_ci')->after('visa_no');
            $table->string('pass_page', 200)->collation('utf8mb4_unicode_ci')->after('visa_no');
            $table->string('visa_page', 200)->collation('utf8mb4_unicode_ci')->after('visa_no');
            $table->string('sia_doc', 200)->collation('utf8mb4_unicode_ci')->after('visa_page');
            $table->string('address_proof', 200)->collation('utf8mb4_unicode_ci')->after('sia_doc');
            $table->string('passphoto', 200)->collation('utf8mb4_unicode_ci')->after('address_proof');
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
        });
    }
}
