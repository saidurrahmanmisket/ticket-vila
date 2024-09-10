<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //gift table modify
        Schema::table('gifts', function (Blueprint $table) {
            $table->json('name')->nullable();
        });

        //campaign table modify
        Schema::table('campaigns', function (Blueprint $table) {
            $table->json('name')->nullable();
            $table->json('promotion_banner')->nullable();
            $table->json('mobile_promotion_banner')->nullable();
        });

        //faqs table modify
        Schema::table('f_a_q_s', function (Blueprint $table) {
            $table->json('question')->nullable();
            $table->json('answer')->nullable();
        });

        //CMS table modify
        Schema::table('c_m_s', function (Blueprint $table) {
            $table->json('title')->nullable();
            $table->json('sub_title')->nullable();
            $table->json('description')->nullable();
            $table->json('links')->nullable();
        });

        //gift featured items modify
        Schema::table('gift_featured_items', function (Blueprint $table) {
            $table->json('title')->nullable();
            $table->json('sub_title')->nullable();
        });

        //the processes table modify
        Schema::table('the_processes', function (Blueprint $table) {
            $table->json('title')->nullable();
            $table->json('description')->nullable();
            $table->json('video_url')->nullable();
            $table->json('icon_top_text')->nullable();
            $table->json('icon_bottom_text')->nullable();
        });

        //dynamic pages table modify
        Schema::table('dynamic_pages', function (Blueprint $table) {
            $table->json('title');
            $table->json('sub_title')->nullable();
            $table->json('description')->nullable();
        });

        //raffle rules modify
        Schema::table('raffle_rules', function (Blueprint $table) {
            $table->json('title')->nullable();
            $table->json('description')->nullable();
        });

        //key features
        Schema::table('key_features', function (Blueprint $table) {
            $table->json('title')->nullable();
        });
        //house files table modify
        Schema::table('house_files', function (Blueprint $table) {
            $table->json('file_name')->nullable();
        });

        //news table modify
        Schema::table('news', function (Blueprint $table) {
            $table->json('title')->nullable();
            $table->json('description')->nullable();
        });

        //ebook descriptions table modify
        Schema::table('ebook_descriptions', function (Blueprint $table) {
            $table->json('description')->nullable();
        });

        //affiliate files table modify
        Schema::table('affiliate_files', function (Blueprint $table) {
            $table->json('title')->nullable();
        });

        //affiliate trips table modify
        Schema::table('affiliate_trips', function (Blueprint $table) {
            $table->json('title');
            $table->json('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //drop all columns
        Schema::table('gifts', function (Blueprint $table) {
            $table->dropColumn(['name']);
        });
        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropColumn(['name', 'promotion_banner', 'mobile_promotion_banner']);
        });
        Schema::table('f_a_q_s', function (Blueprint $table) {
            $table->dropColumn(['question', 'answer']);
        });

        Schema::table('c_m_s', function (Blueprint $table) {
            $table->dropColumn(['title', 'sub_title', 'description', 'links']);
        });

        Schema::table('gift_featured_items', function (Blueprint $table) {
            $table->dropColumn(['title', 'sub_title']);
        });
        Schema::table('the_processes', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'video_url', 'icon_top_text', 'icon_bottom_text']);
        });
        Schema::table('dynamic_pages', function (Blueprint $table) {
            $table->dropColumn(['title', 'sub_title', 'description']);
        });
        Schema::table('raffle_rules', function (Blueprint $table) {
            $table->dropColumn(['title', 'description']);
        });
        Schema::table('key_features', function (Blueprint $table) {
            $table->dropColumn(['title']);
        });
        Schema::table('house_files', function (Blueprint $table) {
            $table->dropColumn(['file_name']);
        });
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn(['title', 'description']);
        });
        Schema::table('ebook_descriptions', function (Blueprint $table) {
            $table->dropColumn(['description']);
        });
        Schema::table('affiliate_files', function (Blueprint $table) {
            $table->dropColumn(['title']);
        });
        Schema::table('affiliate_trips', function (Blueprint $table) {
            $table->dropColumn(['title', 'description']);
        });
    }
};
