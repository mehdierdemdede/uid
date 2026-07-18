@extends('layouts.site')

@section('title', 'Hakkımızda — UID Bosna Hersek')

@section('content')
    <section class="relative h-[240px] w-full overflow-hidden bg-uid-navy md:h-[360px]">
        <img src="{{ asset('images/hakkimizda.jpg') }}" alt="Hakkımızda" class="h-full w-full object-cover object-center">
        <div class="absolute inset-0 bg-gradient-to-r from-uid-navy/85 via-uid-navy/55 to-uid-navy/20"></div>
        <div class="absolute inset-0 flex items-center">
            <div class="mx-auto w-full max-w-7xl px-4 md:px-8">
                <div class="flex items-center gap-4 border-l-4 border-white pl-4 md:pl-6">
                    <h1 class="text-4xl font-bold text-white md:text-5xl">Hakkımızda</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-white py-16 md:py-24">
        <div class="mx-auto max-w-4xl px-4 md:px-8">
            <h1 class="mb-10 text-3xl font-bold text-uid-navy md:text-5xl">Hakkımızda</h1>
            
            <div class="space-y-6 text-lg leading-relaxed text-slate-700">
                <p>
                    UID, 2004 yılında Almanya'nın Köln şehrinde “Avrupalı Türk Demokratlar Birliği” (UETD) olarak kurulmuş, daha sonra tüm dünyadan gelen taleplere cevap verebilmek adına 20 Mayıs 2018’de Bosna Hersek’te gerçekleşen 6. Olağan Genel Kurulu ile ismini Union of International Democrats (UID) olarak güncelleyerek faaliyet alanını genişletmiş bir sivil toplum kuruluşudur. UID, başta Avrupa olmak üzere yurt dışında yaşayan Türk toplumu ve akraba topluluklarının karşılaştığı sosyal, siyasi ve kültürel sorunlara çözümler üretmeyi amaçlar.
                </p>

                <p>
                    Göçmen kökenli bireylerin yaşadıkları toplumlara entegre olmalarını desteklerken, ırkçılık, İslam düşmanlığı, yabancı düşmanlığı ve her türlü ırk ve din ayrımına dayalı düşmanlıklar gibi toplumsal sorunlarla mücadele eder. Eşit yurttaşlık, demokratik katılım ve çokkültürlülük gibi değerleri savunur.
                </p>

                <p>
                    Kadınların ve gençlerin toplumsal yaşamda daha güçlü ve etkin bir şekilde yer almasını sağlayan projelere özel önem verir.
                </p>

                <h2 class="mt-14 mb-6 text-3xl font-bold text-uid-navy">Kurumsal Kimlik ve Misyon</h2>
                <div class="rounded-xl border border-slate-100 bg-slate-50 p-6 md:p-8">
                    <p class="mb-4">
                        UID, kurulduğu günden bu yana, başta Avrupa olmak üzere dünya çapındaki Türk ve göçmen kökenli bireylerin kendi kültürel kimliklerini korurken aynı zamanda yaşadıkları toplumların asli bir parçası olarak sosyal, siyasi ve kültürel hayata aktif katılımlarını arttırma çabası içinde olan bir sivil toplum kuruluşudur.
                    </p>
                    <p class="mb-4">
                        Bu süreçte, ayrımcılıkla mücadele, çokkültürlülüğün teşviki, eşit yurttaşlık hakkının savunulması ve demokratik katılımın artırılması temel amaçlar arasında yer almaktadır.
                    </p>
                    <p>
                        UID’nin çalışma alanları, toplumsal barış ve uyumu teşvik etmekten, çifte vatandaşlık haklarının tanınması, İslam’ın resmi din olarak tanınması, göçmenlerin topluma katılımının teşvik edilmesi gibi geniş bir yelpazeye yayılmaktadır.
                    </p>
                </div>

                <h2 class="mt-14 mb-6 text-3xl font-bold text-uid-navy">Vizyon</h2>
                <div class="rounded-xl border border-slate-100 bg-slate-50 p-6 md:p-8">
                    <p class="mb-4">
                        UID’nin vizyonu, farklı uluslar, kültürler veya dinlere mensup insanların, toplumsal yaşamın her alanına eşit haklarla katılım sağlayan ve toplumu şekillendiren bireyler olmasıdır.
                    </p>
                    <p>
                        Bu vizyona ulaşmak adına, UID, Türkler ve akraba toplulukların yaşadıkları ülkelerin toplumuna entegrasyonunu destekleyen projeler geliştirmekte, farklılıklara saygı ve karşılıklı anlayışın temel alındığı kurumsal faaliyetler yürütmektedir. UID, bu faaliyetlerle, temsil ettiği grupların ihtiyaçlarına ve haklarına duyarlı bir sivil toplum kuruluşu olmayı, önyargıları gidermeyi ve toplumun huzuru için dünya çapında farklı kurumlarla iş birliği içinde olmayı hedeflemektedir.
                    </p>
                </div>

                <h2 class="mt-14 mb-6 text-3xl font-bold text-uid-navy">Çalışma Alanları ve Projeler</h2>
                <p class="mb-8">
                    UID’nin faaliyetleri, toplumsal barışın teşvik edilmesi, ayrımcılıkla mücadele, çokkültürlülüğün desteklenmesi ve demokratik katılımın artırılması gibi geniş bir yelpazeye yayılmaktadır. Aşağıda, UID’nin temel çalışma alanları ve bu alanlardaki öncelikli projeleri detaylandırılmaktadır:
                </p>

                <div class="grid gap-6 md:grid-cols-2">
                    <div class="rounded-lg bg-uid-navy/5 p-6 hover:bg-uid-navy/10 transition">
                        <h3 class="mb-3 text-xl font-bold text-uid-navy">1. Toplumsal Barış ve Uyum</h3>
                        <p class="text-base">UID, farklı kültürler ve topluluklar arasında anlayış ve barışın teşvik edilmesine yönelik projeler geliştirir. Bu projeler, göçmen kökenli toplulukların yaşadıkları ülkelerdeki sosyal, siyasi ve kültürel entegrasyon süreçlerini güçlendirmeyi hedefler.</p>
                    </div>

                    <div class="rounded-lg bg-uid-navy/5 p-6 hover:bg-uid-navy/10 transition">
                        <h3 class="mb-3 text-xl font-bold text-uid-navy">2. Irkçılık ve Ayrımcılıkla Mücadele</h3>
                        <p class="text-base">Irkçılık, İslam düşmanlığı, yabancı düşmanlığı gibi her türlü ayrımcılık biçimlerine karşı mücadele, UID’nin öncelik verdiği bir diğer alandır. Bu kapsamda, bilinçlendirme kampanyaları, eğitim programları, hak ihlalleri tespiti ve halkla ilişkiler faaliyetleri düzenler.</p>
                    </div>

                    <div class="rounded-lg bg-uid-navy/5 p-6 hover:bg-uid-navy/10 transition">
                        <h3 class="mb-3 text-xl font-bold text-uid-navy">3. Çokkültürlülüğün Teşviki</h3>
                        <p class="text-base">UID, çokkültürlülüğün toplum içindeki öneminin vurgulanması ve farklı kültürel kimliklerin korunması ve kutlanmasına yönelik çalışmalar yapar. Çokkültürlülüğü destekleyici politikaların geliştirilmesine katkı sağlar.</p>
                    </div>

                    <div class="rounded-lg bg-uid-navy/5 p-6 hover:bg-uid-navy/10 transition">
                        <h3 class="mb-3 text-xl font-bold text-uid-navy">4. Eşit Yurttaşlık ve Demokratik Katılım</h3>
                        <p class="text-base">Bu alanda, bireylerin sosyal, siyasi ve ekonomik hayata eşit katılımının sağlanması için girişimlerde bulunulur. Genel ve yerel seçimlerde oy kullanma hakkı gibi konular öne çıkar.</p>
                    </div>

                    <div class="md:col-span-2 rounded-lg bg-uid-navy/5 p-6 hover:bg-uid-navy/10 transition">
                        <h3 class="mb-3 text-xl font-bold text-uid-navy">5. Göçmenlerin Toplumsal Hayata Katılımı</h3>
                        <p class="text-base">Göçmen kökenli bireylerin topluma katılımını artırmaya yönelik projeler, eğitim, istihdam ve sosyal entegrasyon alanlarında destekler sunar. Bu, hem bireylerin yaşam kalitesinin artırılması hem de toplumsal uyumun güçlendirilmesi açısından kritik öneme sahiptir.</p>
                    </div>

                    <div class="rounded-lg bg-uid-navy/5 p-6 hover:bg-uid-navy/10 transition">
                        <h3 class="mb-3 text-xl font-bold text-uid-navy">6. Çift Dilli Eğitim ve Kültürel Miras</h3>
                        <p class="text-base">Anadilin korunması ve geliştirilmesi, çift dilli eğitim programlarının desteklenmesi, kültürel mirasın gelecek nesillere aktarılması UID’nin önem verdiği diğer konulardandır.</p>
                    </div>

                    <div class="rounded-lg bg-uid-navy/5 p-6 hover:bg-uid-navy/10 transition">
                        <h3 class="mb-3 text-xl font-bold text-uid-navy">7. Koruyucu Aile Uygulaması</h3>
                        <p class="text-base">UID, koruma altına alınan çocukların güvenli ve sevgi dolu bir ortamda büyümelerini sağlamak amacıyla koruyucu ailelik sisteminin yaygınlaştırılmasına ve desteklenmesine özel önem verir. Bu konuda farkındalık oluşturmak ve daha fazla ailenin bu sisteme katılımını sağlamak amacıyla çalışmalar yürütmektedir.</p>
                    </div>
                </div>

                <div class="mt-14 border-l-4 border-uid-teal bg-white py-4 pl-6 opacity-95">
                    <p class="font-medium text-slate-800">
                        UID, tüm bu çalışma alanları ve projeler aracılığıyla, toplumun her kesiminden bireylerin eşit haklara sahip olması, kültürel çeşitliliğin korunması ve toplumsal barışın teşvik edilmesi yönünde çaba göstermektedir.
                    </p>
                    <p class="mt-4 font-medium text-slate-800">
                        Bu çabalar, aynı zamanda, göçmen kökenli toplulukların yaşadıkları ülkelerdeki sosyal, siyasi ve kültürel entegrasyon süreçlerine de katkı sağlamaktadır.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
