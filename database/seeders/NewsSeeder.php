<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure directory exists
        if (!is_dir(storage_path('app/public/news'))) {
            mkdir(storage_path('app/public/news'), 0777, true);
        }

        if (file_exists(public_path('images/map.png'))) {
            copy(public_path('images/map.png'), storage_path('app/public/news/dummy-map.png'));
        }
        if (file_exists(public_path('images/lightbulb.png'))) {
            copy(public_path('images/lightbulb.png'), storage_path('app/public/news/dummy-bulb.png'));
        }

        News::create([
            "title" => "Almanya’da Çifte Vatandaşlık 2024: Adım Adım Rehberiniz",
            "slug" => Str::slug("Almanya’da Çifte Vatandaşlık 2024: Adım Adım Rehberiniz"),
            "summary" => "Almanya'da Çifte Vatandaşlık 2024: Adım Adım Rehberiniz Haziran 2024'ten itibaren Almanya, vatandaşlık yasalarına büyük fırsatlar sunacak önemli değişiklikler yapıyor.",
            "content" => "Almanya hükûmeti yeni çifte vatandaşlık yasasıyla gurbetçi vatandaşlarımız için sayısız yasal kolaylık sağlıyor. Bu değişiklik sayesinde Avrupa'da yaşayan gurbetçilerin haklarını daha özgürce savunabilmesi hedefleniyor. \n\nYeni yasa detaylı rehberimiz yakında sitemizde ve kurumsal broşürlerimizde yayında olacak.",
            "image_path" => "news/germany-turkey.png",
            "is_published" => true,
            "published_at" => now()
        ]);

        News::create([
            "title" => "Avrupa Seçimleri 6-9 Haziran 2024",
            "slug" => Str::slug("Avrupa Seçimleri 6-9 Haziran 2024"),
            "summary" => "Union of International Democrats Avrupa seçimleri 6-9 Haziran 2024 Almanya'da nasıl oy kullanabilirim? Avrupa Parlamentosu seçimleri detayları...",
            "content" => "Avrupa seçimleri kapıda. Seçim bölgelerinde kurulacak olan sandıklarda göçmen asıllı vatandaşlarımızın oyları büyük bir önem teşkil etmektedir. UID olarak süreci yakından takip ediyoruz.\n\nDemokratik katılımımızı artırmak adına herkesi oy vermeye davet ediyoruz.",
            "image_path" => "news/germany-turkey.png",
            "is_published" => true,
            "published_at" => now()->subDays(2)
        ]);

        News::create([
            "title" => "Bosna Hersek'te UID'den Büyük Gençlik Buluşması",
            "slug" => Str::slug("Bosna Hersek'te UID'den Büyük Gençlik Buluşması"),
            "summary" => "UID Gençlik Kolları'nın Bosna Hersek'in başkenti Saraybosna'da düzenlediği kültür ve tarih gezisine farklı Avrupa ülkelerinden gençler katıldı.",
            "content" => "Tarihi ve kültürel bağların güçlendirilmesi amacıyla düzenlenen programda gençler Aliya İzzetbegoviç'in kabrini ziyaret etti, Mostar köprüsünde bir araya geldi. \n\nSaraybosna temsilciliğimizin bu organizasyonunda Avrupa'nın 9 farklı ülkesinden 150 gencimiz bir araya geldi.",
            "image_path" => "news/sarajevo.png",
            "is_published" => true,
            "published_at" => now()->subDays(5)
        ]);
        
        News::create([
            "title" => "Irkçılıkla Mücadelede Yeni Proje Tanıtıldı",
            "slug" => Str::slug("Irkçılıkla Mücadelede Yeni Proje Tanıtıldı"),
            "summary" => "Irkçılık, İslam düşmanlığı ve yabancı düşmanlığına karşı oluşturulan eylem planımız kamuoyuyla paylaşıldı.",
            "content" => "Irkçılık, İslam düşmanlığı ve yabancı düşmanlığına karşı oluşturulan eylem planımız kamuoyuyla paylaşıldı. \nAvrupa çapında okullarda ve sivil toplum kuruluşlarında verilecek eğitimlerle ön yargıların kırılması planlanıyor. \n\nEşit yurttaşlığın savunulması anlamında kritik önem taşıyan bu proje yakında tüm kollarımızla beraber faaliyete geçirilecek.",
            "image_path" => null,
            "is_published" => true,
            "published_at" => now()->subDays(10)
        ]);
    }
}
