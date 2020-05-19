@extends('layout.container')

@section('title', "Sumitomo Chemical Italia: agrochimica e prodotti per l'agricoltura")

@section('metatagSeo')
    <meta name="description" content="Sumitomo Chemical Italia è specializzata nella produzione e distribuzione di agrofarmaci e prodotti per l'agricoltura.">
    <meta name="keywords" content="">
@endsection

@section('slider')
<section class="teaser_wrap">
    <div id="teaser-carousel" class="owl-carousel owl-theme"></div>
</section>
@endsection

@section('script')
<script type="text/javascript">
var fielIdText1 = '';
var fielIdText2 = '';
var fielIdText3 = '';
var fielIdText4 = '';
var fielIdText5 = '';
var linkSlide1 = '';
var linkSlide2 = '';
var linkSlide3 = '';
var linkSlide4 = '';
var linkSlide5 = '';
var url_bio = '';
$.ajax({
    type: "GET",
        beforeSend: function (request) {
        request.setRequestHeader("lang", "it");
    },
    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=10",
    async:false,
    success: function (results){
        $.each(results.data, function(index, value){
            if(value.id == 10){
                fielIdText1 = value.description;
                linkSlide1 = value.img_link;
            }
            if(value.id == 11){
                fielIdText2 = value.description;
                linkSlide2 = value.img_link;
            }
            if(value.id == 12){
                fielIdText3 = value.description;
                linkSlide3 = value.img_link;
            }
            if(value.id == 13){
                fielIdText4 = value.description;
                linkSlide4 = value.img_link;
            }
            if(value.id == 14){
                fielIdText5 = value.description;
                linkSlide5 = value.img_link;
            }

            if(value.id == 15){ $(".box-uno").html(value.description); }
            if(value.id == 16){ $(".box-due").html(value.description); }
            if(value.id == 17){ $(".box-tre").html(value.description); }
            if(value.id == 18){ $(".box-quattro").html(value.description); }

            if(value.id == 19){ $("#sumitomo_italia_1_testo_nero").html(value.description); }
            if(value.id == 20){ $("#sumitomo_italia_1_testo_rosso").html(value.description); }
            if(value.id == 21){ $("#sumitomo_italia_2_testo_nero").html(value.description); }
            if(value.id == 22){ $("#sumitomo_italia_2_testo_rosso,#sumitomo_italia_2_testo_rosso_bis").html(value.description); }
            if(value.id == 23){ $("#sumitomo_italia_3_testo_nero").html(value.description); }
            if(value.id == 24){ $("#sumitomo_italia_3_testo_rosso").html(value.description); }

            if(value.id == 28){ url_bio = value.description; }
            if(value.id == 29){ $("#sumitomo_biorazionale_titolo").html(value.description); }
            if(value.id == 32){ $("#sumitomo_biorazionale_testo").html(value.description + '<a href="' + url_bio + '" class="button">Vai</a>'); }
        });
    }
});
    var fielIdImg1 = '';
    var fielIdImg2 = '';
    var fielIdImg3 = '';
    var fielIdImg4 = '';
    var fielIdImg5 = '';
    var fielIdBio = '';
    var slide = '';

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("lang", "it");
        },
        url: "https://pre.sumitomo-chem.it/proxy/api?id=32",
        async:false,
        success: function (result){
            var bio = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + result;
            $('#biorazionale').css('background-image', 'url(' + bio+  ')');
        },

          /*  $.each(result.data, function(index, value){
                fielIdBio = value.id;
            });
            if(fielIdBio != ''){
            }
      */
        error: function (request, status, errorThrown){}
    });

$.ajax({
    type: "GET",
    beforeSend: function (request) {
        request.setRequestHeader("lang", "it");
    },
    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=10",
    async:false,
    success: function (result){
        $.each(result.data, function(index, value){
            fielIdImg1 = value.id;
        });
        if(fielIdImg1 != ''){
            var src1 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg1;
            var link_href = linkSlide1 != undefined && linkSlide1.length > 0 ? linkSlide1 : 'javascript:void(0);';
            slide = slide + '<div class="item"><a href="'+link_href+'"><img class="owl-lazy" data-src="' + src1 + '" alt="' + fielIdText1 + '"><div class="item-content"><p class="item-title">' + fielIdText1 + '</p></div></a></div>';
        }
    },

    error: function (request, status, errorThrown){}
});

$.ajax({
    type: "GET",
    beforeSend: function (request) {
        request.setRequestHeader("lang", "it");
    },
    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=11",
    async:false,
    success: function (result){
        $.each(result.data, function(index, value){
            fielIdImg2 = value.id;
        });
        if(fielIdImg2 != ''){
            var src2 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg2;
            var link_href = linkSlide2 != undefined && linkSlide2.length > 0 ? linkSlide2 : 'javascript:void(0);';
            slide = slide + '<div class="item"><a href="'+link_href+'"><img class="owl-lazy" data-src="' + src2 + '" alt="' + fielIdText2 + '"><div class="item-content"><p class="item-title">' + fielIdText2 + '</p></div></a></div>'
        }
    },


    error: function (request, status, errorThrown){}
});

$.ajax({
    type: "GET",
    beforeSend: function (request) {
        request.setRequestHeader("lang", "it");
    },
    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=12",
    async:false,
    success: function (result){
        $.each(result.data, function(index, value){
            fielIdImg3 = value.id;
        });
        if(fielIdImg3 != ''){
            var src3 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg3;
            var link_href = linkSlide3 != undefined && linkSlide3.length > 0 ? linkSlide3 : 'javascript:void(0);';
            slide = slide + '<div class="item"><a href="'+link_href+'"><img class="owl-lazy" data-src="' + src3 + '" alt="' + fielIdText3 + '"><div class="item-content"><p class="item-title">' + fielIdText3 + '</p></div></a></div>'
        }
    },

    error: function (request, status, errorThrown){}
});

$.ajax({
    type: "GET",
    beforeSend: function (request) {
        request.setRequestHeader("lang", "it");
    },
    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=13",
    async:false,
    success: function (result){
        $.each(result.data, function(index, value){
            fielIdImg4 = value.id;
        });
        if(fielIdImg4 != ''){
            var src4 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg4;
            var link_href = linkSlide4 != undefined && linkSlide4.length > 0 ? linkSlide4 : 'javascript:void(0);';
            slide = slide + '<div class="item"><a href="'+link_href+'"><img class="owl-lazy" data-src="' + src4 + '" alt="' + fielIdText4 + '"><div class="item-content"><p class="item-title">' + fielIdText4 + '</p></div></a></div>'
        }
    },


    error: function (request, status, errorThrown){}
});

$.ajax({
    type: "GET",
    beforeSend: function (request) {
        request.setRequestHeader("lang", "it");
    },
    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=14",
    async:false,
    success: function (result){
        $.each(result.data, function(index, value){
            fielIdImg5 = value.id;
        });
        if(fielIdImg5 != ''){
            var src5 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg5;
            var link_href = linkSlide5 != undefined && linkSlide5.length > 0 ? linkSlide5 : 'javascript:void(0);';
            slide = slide + '<div class="item"><a href="'+link_href+'"><img class="owl-lazy" data-src="' + src5 + '" alt="' + fielIdText5 + '"><div class="item-content"><p class="item-title">' + fielIdText5 + '</p></div></a></div>';
        }
    },

    error: function (request, status, errorThrown){}
});

    $("#teaser-carousel").append(slide);

</script>
@stop

@section('content')
    @include('layout.fascia-prodotti')
    @include('layout.ricerca-tecnica')
    @include('layout.fascia-news')
    @include('layout.rete-vendita')
    @include('layout.sumitomo-mondo')
    @include('layout.sumitomo-italia')
    @include('layout.fascia-biorazionale')
    @include('layout.link-utili')
    @include('layout.disclaimer')
@stop

