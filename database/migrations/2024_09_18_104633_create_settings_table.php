<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('settings', function (Blueprint $table) {
            $table->UUID('id')->primary();

            $table->string('name')->default('LaraAi');
            $table->string('url')->default('https://first-script.local');
            $table->string('email')->default('admin@gmail.com');

            $table->string('google_analytics_active')->default(0);
            $table->text('google_analytics_code')->nullable();

            $table->string('default_country')->default('United States');
            $table->string('default_language')->default('en');
            $table->string('installed_languages')->default('en, de, fr, da');
            $table->string('languages')->default('en, de');

            $table->string('default_currency')->default('2');
            $table->string('tax_rate')->nullable();
            $table->string('stripe_active')->default(0);
            $table->string('stripe_key')->nullable();
            $table->string('stripe_secret')->nullable();
            $table->string('stripe_base_url')->default('https://api.stripe.com');

            $table->string('bank_transfer_active')->default(0);
            $table->string('bank_transfer_instructions')->nullable();
            $table->string('bank_transfer_informations')->nullable();

            //SMTP
            $table->string('smtp_host')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('smtp_username')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('smtp_email')->nullable();
            $table->string('smtp_sender_name')->nullable();
            $table->string('smtp_encryption')->default('tls');

            //SOCIAL LOGIN
            $table->boolean('facebook_active')->default(0);
            $table->text('facebook_api_key')->nullable();
            $table->text('facebook_api_secret')->nullable();
            $table->text('facebook_redirect_url')->nullable();

            $table->boolean('github_active')->default(0);
            $table->text('github_api_key')->nullable();
            $table->text('github_api_secret')->nullable();
            $table->text('github_redirect_url')->nullable();

            $table->boolean('google_active')->default(0);
            $table->text('google_api_key')->nullable();
            $table->text('google_api_secret')->nullable();
            $table->text('google_redirect_url')->nullable();

            $table->boolean('twitter_active')->default(0);
            $table->text('twitter_api_key')->nullable();
            $table->text('twitter_api_secret')->nullable();
            $table->text('twitter_redirect_url')->nullable();

            $table->string('registration')->default(1);
            $table->string('on_boarding')->default(0);

            $table->string('status')->default(1);

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
        Schema::dropIfExists('settings');
    }
};
