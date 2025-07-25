<?php

namespace Database\Seeders;

use App\Models\Work;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Work::create([
            'title' => 'Portfolio Project',
            'slug' => Str::slug('Portfolio Project'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-malano-labilo-portfolio.png',
            'excerpt' => 'Adalah Template UI Portfolio Pertamaku',
            'link' => 'https://www.behance.net/gallery/225098101/Malano-Labilo-Portfolio',
            'has_page' => false,
            'description' => '',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'UI Website Warung',
            'slug' => Str::slug('Website warung'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-first-project.png',
            'excerpt' => 'Website untuk keperluan berbagai hal yang berkenaan dengan penjualan.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website untuk keperluan berbagai hal yang berkenaan dengan penjualan. UI website ini adalah project pertama saya. dengan berbagai kekurangan UX nya, website ini bisa digunakan dengan benar dan simpel. sudah mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Flowers Sell',
            'slug' => Str::slug('Flowers Sell'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p2-flowers.png',
            'excerpt' => 'Web tentang Bunga-bunga dan tanaman-tanaman indah',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website untuk keperluan berbagai hal yang berkenaan dengan jual beli, komunitas, berita dan artikel. UI website ini adalah project kedua ku yang resmi aku publish atau aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Flowers juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Mothero',
            'slug' => Str::slug('Mothero'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        

        Work::create([
            'title' => 'qq',
            'slug' => Str::slug('Motddhero'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Mqothero',
            'slug' => Str::slug('Modthero'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Mothfsero',
            'slug' => Str::slug('Mofdsfthero'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'dfd',
            'slug' => Str::slug('dfd'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'sd4',
            'slug' => Str::slug('sd4'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Msdf4othero',
            'slug' => Str::slug('Motsd3hero'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Moewxcthero',
            'slug' => Str::slug('Mosdvthero'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Motewrhero',
            'slug' => Str::slug('MoXCvthero'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Motsdfhero',
            'slug' => Str::slug('Motsdfhero'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Motherosdf',
            'slug' => Str::slug('erMothero'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Motjgfhero',
            'slug' => Str::slug('Mashothero'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'M asdfothero',
            'slug' => Str::slug('Mosd fthero'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Mocccthero',
            'slug' => Str::slug('Mccccothero'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Motfgdfhersdfo',
            'slug' => Str::slug('Motd gsdhero'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Motherosdfs',
            'slug' => Str::slug('Motherosdfs'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Moqweqeqweqeqwethero',
            'slug' => Str::slug('Motqweqweqweqwhero'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Mothefsgdfhdgn ro',
            'slug' => Str::slug('Moth asfgag a sasg aero'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Mot asdf asfhero',
            'slug' => Str::slug('M asdf asfd asdfothero'),
            'user_id' => 1,
            'category_id' => 1,
            'thumbnail' => '/img/thumbnail-p3-mothero.png',
            'excerpt' => 'Website Edukasi dan berbagai hal tentang Parenting.',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website ini membantu parenting para orang tua dan juga membangun hubungan yang baik dengan anak. komunitas, berita dan artikel di website ini juga bertujuan untuk lebih membantu lagi dan memperlengkap fitur. UI website ini adalah project ketiga ku secara beruntun dari sebelumnya yang resmi aku publish dan aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Mothero juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'qqPortfolio Project',
            'slug' => Str::slug('qqPortfolio Project'),
            'user_id' => 1,
            'category_id' => 2,
            'thumbnail' => '/img/thumbnail-malano-labilo-portfolio.png',
            'excerpt' => 'Adalah Template UI Portfolio Pertamaku',
            'link' => 'https://www.behance.net/gallery/225098101/Malano-Labilo-Portfolio',
            'has_page' => false,
            'description' => '',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Pqqortfolio Project',
            'slug' => Str::slug('Pqqortfolio Project'),
            'user_id' => 1,
            'category_id' => 3,
            'thumbnail' => '/img/thumbnail-malano-labilo-portfolio.png',
            'excerpt' => 'Adalah Template UI Portfolio Pertamaku',
            'link' => 'https://www.behance.net/gallery/225098101/Malano-Labilo-Portfolio',
            'has_page' => false,
            'description' => '',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Porqqtfolio Project',
            'slug' => Str::slug('Porqqtfolio Project'),
            'user_id' => 1,
            'category_id' => 4,
            'thumbnail' => '/img/thumbnail-malano-labilo-portfolio.png',
            'excerpt' => 'Adalah Template UI Portfolio Pertamaku',
            'link' => 'https://www.behance.net/gallery/225098101/Malano-Labilo-Portfolio',
            'has_page' => false,
            'description' => '',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'wwPortfolio Project',
            'slug' => Str::slug('wwPortfolio Project'),
            'user_id' => 1,
            'category_id' => 2,
            'thumbnail' => '/img/thumbnail-malano-labilo-portfolio.png',
            'excerpt' => 'Adalah Template UI Portfolio Pertamaku',
            'link' => 'https://www.behance.net/gallery/225098101/Malano-Labilo-Portfolio',
            'has_page' => false,
            'description' => '',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Pwwortfwolio Project',
            'slug' => Str::slug('Pwworwtfolio Project'),
            'user_id' => 1,
            'category_id' => 2,
            'thumbnail' => '/img/thumbnail-malano-labilo-portfolio.png',
            'excerpt' => 'Adalah Template UI Portfolio Pertamaku',
            'link' => 'https://www.behance.net/gallery/225098101/Malano-Labilo-Portfolio',
            'has_page' => false,
            'description' => '',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Flowers Sell1',
            'slug' => Str::slug('Flowers Sell1'),
            'user_id' => 1,
            'category_id' => 3,
            'thumbnail' => '/img/thumbnail-p2-flowers.png',
            'excerpt' => 'Web tentang Bunga-bunga dan tanaman-tanaman indah',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website untuk keperluan berbagai hal yang berkenaan dengan jual beli, komunitas, berita dan artikel. UI website ini adalah project kedua ku yang resmi aku publish atau aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Flowers juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Flowers Sell231231',
            'slug' => Str::slug('Flowers Sell12313'),
            'user_id' => 1,
            'category_id' => 3,
            'thumbnail' => '/img/thumbnail-p2-flowers.png',
            'excerpt' => 'Web tentang Bunga-bunga dan tanaman-tanaman indah',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website untuk keperluan berbagai hal yang berkenaan dengan jual beli, komunitas, berita dan artikel. UI website ini adalah project kedua ku yang resmi aku publish atau aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Flowers juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'Flosfsf',
            'slug' => Str::slug('Flosdfsf'),
            'user_id' => 1,
            'category_id' => 2,
            'thumbnail' => '/img/thumbnail-p2-flowers.png',
            'excerpt' => 'Web tentang Bunga-bunga dan tanaman-tanaman indah',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website untuk keperluan berbagai hal yang berkenaan dengan jual beli, komunitas, berita dan artikel. UI website ini adalah project kedua ku yang resmi aku publish atau aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Flowers juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'BBBBB',
            'slug' => Str::slug('BBBBB'),
            'user_id' => 1,
            'category_id' => 2,
            'thumbnail' => '/img/thumbnail-p2-flowers.png',
            'excerpt' => 'Web tentang Bunga-bunga dan tanaman-tanaman indah',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website untuk keperluan berbagai hal yang berkenaan dengan jual beli, komunitas, berita dan artikel. UI website ini adalah project kedua ku yang resmi aku publish atau aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Flowers juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);

        Work::create([
            'title' => 'XDC',
            'slug' => Str::slug('XDC'),
            'user_id' => 1,
            'category_id' => 2,
            'thumbnail' => '/img/thumbnail-p2-flowers.png',
            'excerpt' => 'Web tentang Bunga-bunga dan tanaman-tanaman indah',
            // 'link' => '',
            'has_page' => true,
            'description' => 'Website untuk keperluan berbagai hal yang berkenaan dengan jual beli, komunitas, berita dan artikel. UI website ini adalah project kedua ku yang resmi aku publish atau aku perkenalkan. Dengan perbenahan-perbenahan menjadikan UI UX website ini lebih baik dibanding sebelumnya. Website Flowers juga sudah responsive mendukung di berbagai layar, dari layar mobile, tablet, desktop, hingga yang lebih besar lagi sampai kurang lebih dengan lebar 1600 px',
            'published_at' => now(),
        ]);
    }
}
