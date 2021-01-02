<?php namespace NumenCode\BlogMedia\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddMediaFieldsToBlogPostTable extends Migration
{
    public function up()
    {
        Schema::table('rainlab_blog_posts', function ($table)
        {
            $table->string('picture')->nullable()->after('content_html');
            $table->text('gallery')->nullable()->after('picture');
            $table->text('files')->nullable()->after('gallery');
        });
    }

    public function down()
    {
        Schema::table('rainlab_blog_posts', function ($table)
        {
            $table->dropColumn('picture');
            $table->dropColumn('gallery');
            $table->dropColumn('files');
        });
    }
}
