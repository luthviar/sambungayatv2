@extends('layouts.layout')

@section('content')

    <script type="text/javascript">
        $(document).ready(function() {
            $(".js-example-basic-single").select2();
        });
    </script>

    <section class="box">
        <h3>Hasil Anda:</h3>
        <form method="post" action="{{ url(action('GameController@selected_surat')) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div class="row uniform 50%">
                <div class="12u">
                    <div class="select-wrapper">
                        <h1>
                            Total Jawaban Benar: {{ $total_benar }}
                        </h1>
                        <h1>
                            Total Jawaban Salah: {{ $total_salah }}
                        </h1>
                        <h1>
                            Total Pertanyaan: {{ $total_pertanyaan}}
                        </h1>
                            <br/>
                            <br/>
                        <h1>
                            Total Semua Pertanyaan Sejak Pertama Kali Main di Sini: {{ $total_all }} pertanyaan.
                        </h1>
                    </div>
                </div>
            </div>



            <div class="row uniform">
                <div class="12u">
                    <ul class="actions">
                        <li>
                            <a href="{{ url(action('GameController@index')) }}"
                               value="Kembali" class="button alt icon fa-home"
                               style="text-decoration: none;"
                            >Halaman Utama</a>
                        </li>
                    </ul>
                </div>
            </div>
        </form>


    </section>


@endsection