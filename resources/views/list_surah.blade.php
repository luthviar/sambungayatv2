@extends('layouts.layout')

@section('content')

    <script type="text/javascript">
        $(document).ready(function() {
            $(".js-example-basic-single").select2();
        });
    </script>

    <section class="box">
        <h3>Pilih surah:</h3>
        <form method="post" action="{{ url(action('GameController@selected_surat')) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div class="row uniform 50%">
                <div class="12u">
                    <div class="select-wrapper">

                        <select class="js-example-basic-single" name="listSurah" id="category" required>


                            <option value="">- Daftar surah -</option>

                            <option value="114">114.Surah Al-Nas</option>
                            <option value="113">113.Surah Al-Falaq</option>
                            <option value="112">112.Surat Al-Ikhlas</option>
                            <option value="111">111.Surat Al-Lahab</option>
                            <option value="110">110.Surat An-Nashr</option>
                            <option value="109">109.Surat Al-Kafirun</option>
                            <option value="108">108.Surat Al-Kautsar</option>
                            <option value="107">107.Surat Al-Ma'un</option>
                            <option value="106">106.Surah Quraish</option>
                            <option value="105">105.Surat Al-Fil</option>
                            <option value="104">104.Surat Al-Humaza</option>
                            <option value="103">103.Surat Al-Asr</option>
                            <option value="102">102.Surah At-Takathur</option>
                            <option value="101">101.Surat Al-Qari'a</option>
                            <option value="100">100.Surat Al-Adiyat</option>
                            <option value="99">99.Surat Al-Zalzalah</option>
                            <option value="98">98.Surah Al-Baiyina</option>
                            <option value="97">97.Surat Al-Qadr</option>
                            <option value="96">96.Surat Al-Alaq</option>
                            <option value="95">95.Surah At-Tin</option>
                            <option value="94">94.Surat Al-Syarh</option>
                            <option value="93">93.Surah Adz-Dhuha</option>
                            <option value="92">92.Surat Al-Lail</option>
                            <option value="91">91.Surah Ash-Shams</option>
                            <option value="90">90.Surat Al-Balad</option>
                            <option value="89">89.Surat Al-Fajr</option>
                            <option value="88">88.Surat Al-Gashiya</option>
                            <option value="87">87.Surat Al-A'la</option>
                            <option value="86">86.Surah At-Tariq</option>
                            <option value="85">85.Surat Al-Buruj</option>
                            <option value="84">84.Surat Al-Inshiqaq</option>
                            <option value="83">83.Surah Al-Mutaffife</option>
                            <option value="82">82.Surat Al-Infitar</option>
                            <option value="81">81.Surah At-Takwir</option>
                            <option value="80">80.Surat Abasa</option>
                            <option value="79">79.Surah An-Nazi'at</option>
                            <option value="78">78.Surah An-Nabaa</option>
                            <option value="77">77.Surat Al-Mursalat</option>
                            <option value="76">76.Surah Ad-Dahr</option>
                            <option value="75">75.Surat Al-Qiyamat</option>
                            <option value="74">74.Surah Al-Muddathth</option>
                            <option value="73">73.Surah Al-Muzzammil</option>
                            <option value="72">72.Surat Al-Jinn</option>
                            <option value="71">71.Surah Nuh</option>
                            <option value="70">70.Surat Al-Ma'arij</option>
                            <option value="69">69.Surat Al-aqqa</option>
                            <option value="68">68.Surat Al-Qalam</option>
                            <option value="67">67.Surat Al-Mulk</option>
                            <option value="66">66.Surah At-Tahrim</option>
                            <option value="65">65.Surah At-talaq</option>
                            <option value="64">64.Surah At-Tagabun</option>
                            <option value="63">63.Surat Al-munafik</option>
                            <option value="62">62.Surat Al-jumu'ah</option>
                            <option value="61">61.Surah As-Shaff</option>
                            <option value="60">60.Surat Al-Mumtahana</option>
                            <option value="59">59.Surat Al-Hasyr</option>
                            <option value="58">58.Surat Al-Mujadila</option>
                            <option value="57">57.Surat Al-Hadid</option>
                            <option value="56">56.Surat Al-Waaqi'ah</option>
                            <option value="55">55.Surah Ar-Rahman</option>
                            <option value="54">54.Surat Al-Qamar</option>
                            <option value="53">53.Surat An-Najm</option>
                            <option value="52">52.Surah At-Tur</option>
                            <option value="51">51.Surah Az-Zariyat</option>
                            <option value="50">50.Surah Qaaf</option>
                            <option value="49">49.Surah Al-Hujurat</option>
                            <option value="48">48.Surah Al-Fat-h</option>
                            <option value="47">47.Surah Muhammad</option>
                            <option value="46">46.Surat Al-Ahqaf</option>
                            <option value="45">45.Surat Al-Jathiya</option>
                            <option value="44">44.Surat Ad-Dukhan</option>
                            <option value="43">43.Surah Az-Zukhruf</option>
                            <option value="42">42.Surah Ash-Shura</option>
                            <option value="41">41.Surah Ha-Mim</option>
                            <option value="40">40.Surat Al-Mu'min</option>
                            <option value="39">39.Surah Az-Zumar</option>
                            <option value="38">38.Surah Sad</option>
                            <option value="37">37.Surah QS. Ash-Shaffat</option>
                            <option value="36">36.Surat Ya-Sin</option>
                            <option value="35">35.Surah Faathir</option>
                            <option value="34">34.Surah Saba</option>
                            <option value="33">33.Surat Al-Ahzab</option>
                            <option value="32">32.Surah As-Sajdah</option>
                            <option value="31">31.Surat Luqman</option>
                            <option value="30">30.Surah Ar-Rum</option>
                            <option value="29">29.Surah Al-Ankabut</option>
                            <option value="28">28.Surat Al-Qashash</option>
                            <option value="27">27.Surat An-Naml</option>
                            <option value="26">26.Surah Ash-Shu'araa</option>
                            <option value="25">25.Surat Al-Furqan</option>
                            <option value="24">24.Surah An-Nur</option>
                            <option value="23">23.Surat Al-Muminun</option>
                            <option value="22">22.Surat Al-Hajj</option>
                            <option value="21">21.Surat Al-Anbiyaa</option>
                            <option value="20">20.Surah Ta-ha</option>
                            <option value="19">19.Surah Maryam</option>
                            <option value="18">18.Surat Al-Kahfi</option>
                            <option value="17">17.Surat Al-Isra</option>
                            <option value="16">16.Surah An-Nahl</option>
                            <option value="15">15.Surat Al-Hijr</option>
                            <option value="14">14.Surah Ibrahim</option>
                            <option value="13">13.Surah Ar-Ra'd</option>
                            <option value="12">12.Surah Yusuf</option>
                            <option value="11">11.Surah Hud</option>
                            <option value="10">10.Surah Yunus</option>
                            <option value="9">9.Surah At-Tauba</option>
                            <option value="8">8.Surat Al-Anfal</option>
                            <option value="7">7.Surat Al-A'raf</option>
                            <option value="6">6.Surat Al-An'am</option>
                            <option value="5">5.Surat Al-Maidah</option>
                            <option value="4">4.Surah An-Nisaa</option>
                            <option value="3">3.Surah Al-i'Imran</option>
                            <option value="2">2.Surat Al-Baqarah</option>
                            <option value="1">1.Surat Al-Fatihah</option>





                        </select>
                    </div>
                </div>
            </div>



            <div class="row uniform">
                <div class="12u">
                    <ul class="actions">
                        <li><input type="submit" value="Mulai" /></li>
                        <li><a href="{{ url(action('GameController@index')) }}"
                               value="Kembali" class="button alt icon fa-chevron-left">Kembali</a></li>
                    </ul>
                </div>
            </div>
        </form>


    </section>


@endsection