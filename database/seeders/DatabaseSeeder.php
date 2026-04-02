<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Judith',
            'email' => 'hello@almond-blossoms.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // POST 1: Timelines
        Post::create([
            'title' => 'Crafting the Perfect Wedding Day Timeline.',
            'slug' => Str::slug('Crafting the Perfect Wedding Day Timeline'),
            'category' => 'Advice & Planning',
            'status' => 'published',
            'excerpt' => 'Everything comes together effortlessly once you have figured out the ceremony flow. Timelines are the quiet backbone of a perfect day.',
            'featured_image' => null, // Will use your frontend fallback image
            'views' => 1240,
            'seo_title' => 'Wedding Day Timeline Guide | Almond-Blossoms',
            'seo_description' => 'Learn how to craft the perfect wedding day timeline to ensure a relaxed and memorable celebration.',
            'created_at' => now()->subDays(5),
            'updated_at' => now()->subDays(5),
            'content' => '
                <p>Timelines are detailed, long, stressful, and a massive part of what we absolutely love to do when planning your wedding. It’s all in the details. Everything comes together beautifully and easily once you have completely figured out the flow of the ceremony.</p>
                <p>A smooth wedding day doesn\'t happen by accident. It requires meticulous foresight, an understanding of the venue\'s logistics, and most importantly, the ability to anticipate the unexpected. Whether you are hosting an intimate gathering or an epic celebration, your timeline is the quiet backbone of the entire event.</p>
                <h2>The Three Golden Rules of Timelines</h2>
                <p>When constructing your timeline, it is incredibly important to remember that this day is meant to be enjoyed, not rushed. We always encourage our couples to adhere to these three golden rules of planning:</p>
                <h3>1. Start Early, Book Early</h3>
                <p>As soon as you book the venue, begin drafting your outline. This allows ample time to include all aspects of your wedding while focusing heavily on the key highlights of the day. Booking vendors early ensures that you have the very best team surrounding you.</p>
                <h3>2. Plan for the Unexpected</h3>
                <p>Remember to leave generous buffers for the unexpected. Things like slight catering delays, a sudden weather change, or navigating travel to multiple locations can easily disrupt a tight schedule. A padded timeline helps to heavily reduce stress and keep the day flowing exactly as planned.</p>
                <blockquote>Make time to slow down and enjoy the day. It is your day, so create quiet memories to cherish amidst the celebration.</blockquote>
                <h3>3. Create Intentional Stillness</h3>
                <p>The day will fly by in a blur of love, laughter, and champagne. We always schedule 15 to 20 minutes of "intentional stillness" for our couples immediately following the ceremony. This gives you a private moment to breathe, share a glass of champagne together, and let the reality of the moment sink in before rejoining your guests.</p>
            ',
        ]);

        // POST 2: Photography
        Post::create([
            'title' => 'The Ultimate Wedding Day Shot List.',
            'slug' => Str::slug('The Ultimate Wedding Day Shot List'),
            'category' => 'Photography',
            'status' => 'published',
            'excerpt' => 'Getting ready, candid moments, shoes, the veil, the rings, and the unfolding magic of the First Look. Build a list that will completely wow you.',
            'featured_image' => null,
            'views' => 890,
            'seo_title' => 'Wedding Photography Shot List | Almond-Blossoms',
            'seo_description' => 'The ultimate checklist for your wedding photographer to ensure no detail is missed.',
            'created_at' => now()->subDays(12),
            'updated_at' => now()->subDays(12),
            'content' => '
                <p>It is all in the details. Your wedding photographs are the visual legacy of your celebration, capturing the fleeting moments and carefully curated aesthetics that made your day entirely your own.</p>
                <p>To ensure your photographer captures the true essence of your event, we always recommend creating a comprehensive, yet flexible, shot list.</p>
                <h2>Essential Moments to Capture</h2>
                <h3>The Preparations</h3>
                <p>The morning of your wedding is filled with nervous excitement, quiet reflection, and intimate moments with your closest friends and family. Ensure your photographer captures the hair and makeup process, the candid laughter, and the delicate details like your shoes, veil, gown, and rings.</p>
                <h3>The First Look</h3>
                <p>Whether you choose to see each other before the ceremony or wait for the traditional walk down the aisle, the "First Look" is a profoundly emotional moment. Have your photographer ready to capture the unfolding magic and raw reactions.</p>
                <blockquote>The options are endless, so create a list that will completely wow you when you look back years from now.</blockquote>
            ',
        ]);

        // POST 3: Styling
        Post::create([
            'title' => 'Vibrant: Styling with Colour and Tone.',
            'slug' => Str::slug('Vibrant Styling with Colour and Tone'),
            'category' => 'Styling & Design',
            'status' => 'published', // Setting to published so you can see it on the frontend!
            'excerpt' => 'There is something captivating about bold colours and tones that make a wedding day truly alive. A guide to palette, tone, and cohesive design.',
            'featured_image' => null,
            'views' => 432,
            'seo_title' => 'Vibrant Wedding Styling Ideas | Almond-Blossoms',
            'seo_description' => 'How to incorporate bold, vibrant colours into your luxury wedding aesthetic.',
            'created_at' => now()->subDays(20),
            'updated_at' => now()->subDays(20),
            'content' => '
                <p>There is something completely captivating about bold colours and rich tones that make a wedding day truly unique. While classic white and ivory will always remain timeless, incorporating vibrant hues adds a layer of depth, personality, and sheer joy to your celebration.</p>
                <p>Here is how we love to incorporate vibrant aesthetics into our couples\' designs.</p>
                <h2>Mastering the Palette</h2>
                <h3>Floral Installations</h3>
                <p>Flowers are the most organic way to introduce dramatic colour. Instead of safe pastels, consider deep burgundies, burnt oranges, bright fuchsias, and lush, dark greenery. A vibrant floral arch or a cascading table runner instantly transforms a space from standard to spectacular.</p>
                <blockquote>Colour tells a story — choose yours with fearless intention.</blockquote>
                <h3>Tablescapes & Linens</h3>
                <p>Don\'t be afraid to use coloured velvet linens, tinted glassware, or boldly patterned napkins. When grounded by elegant, minimalist stationery and classic flatware, a vibrant table setting feels incredibly luxurious rather than overwhelming.</p>
            ',
        ]);
    }
}
