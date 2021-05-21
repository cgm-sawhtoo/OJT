<?php

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            [
                'title' => 'Something Wrong',
                'message' => 'A typical essay contains many different kinds of information, often located in specialized parts or sections. Even short essays perform several different operations: introducing the argument, analyzing data, raising counterarguments, concluding. Introductions and conclusions have fixed places, but other parts dont. Counterargument, for example, may appear within a paragraph, as a free-standing section, as part of the beginning, or before the ending. Background material (historical context or biographical information, a summary of relevant theory or criticism, the definition of a key term) often appears at the beginning of the essay, between the introduction and the first analytical section, but might also appear near the beginning of the specific section to which its relevant.
                A typical essay contains many different kinds of information, often located in specialized parts or sections. Even short essays perform several different operations: introducing the argument, analyzing data, raising counterarguments, concluding. Introductions and conclusions have fixed places, but other parts dont. Counterargument, for example, may appear within a paragraph, as a free-standing section, as part of the beginning, or before the ending. Background material (historical context or biographical information, a summary of relevant theory or criticism, the definition of a key term) often appears at the beginning of the essay, between the introduction and the first analytical section, but might also appear near the beginning of the specific section to which its relevant.
                A typical essay contains many different kinds of information, often located in specialized parts or sections. Even short essays perform several different operations: introducing the argument, analyzing data, raising counterarguments, concluding. Introductions and conclusions have fixed places, but other parts dont. Counterargument, for example, may appear within a paragraph, as a free-standing section, as part of the beginning, or before the ending. Background material (historical context or biographical information, a summary of relevant theory or criticism, the definition of a key term) often appears at the beginning of the essay, between the introduction and the first analytical section, but might also appear near the beginning of the specific section to which its relevant.
                A typical essay contains many different kinds of information, often located in specialized parts or sections. Even short essays perform several different operations: introducing the argument, analyzing data, raising counterarguments, concluding. Introductions and conclusions have fixed places, but other parts dont. Counterargument, for example, may appear within a paragraph, as a free-standing section, as part of the beginning, or before the ending. Background material (historical context or biographical information, a summary of relevant theory or criticism, the definition of a key term) often appears at the beginning of the essay, between the introduction and the first analytical section, but might also appear near the beginning of the specific section to which its relevant.',
                'public_flag' => '1',
                'user_id' => '1',
                'created_at' => now(),
            ],
            [
                'title' => 'Flower',
                'message' => 'Flowers have inspired many influential people to discover meaning in their lives and improve the world. Many of these empowering quotes come from well-known individuals, so pick a handful to apply to your life!',
                'public_flag' => '1',
                'user_id' => '1',
                'created_at' => now(),
            ],
            [
                'title' => 'Waterfall',
                'message' => 'You don’t have the power to make rainbows or waterfalls, sunsets or roses, but you do have the power to bless people by your words and smiles. You carry within you the power to make the world better.',
                'public_flag' => '1',
                'user_id' => '1',
                'created_at' => now(),
            ],
            [
                'title' => 'Rainbow',
                'message' => 'Shine your soul with the same egoless humility as the rainbow and no matter where you go in this world or the next, love will find you, attend you, and bless you.',
                'public_flag' => '1',
                'user_id' => '1',
                'created_at' => now(),
            ],
            [
                'title' => 'Season',
                'message' => 'If we had no winter, the spring would not be so pleasant: if we did not sometimes taste of adversity, prosperity would not be so welcome.',
                'public_flag' => '1',
                'user_id' => '1',
                'created_at' => now(),
            ],
        ]);
    }
}
