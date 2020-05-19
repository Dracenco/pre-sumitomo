<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
@extends('layout.header-site')
@section('title', 'Biorazionale')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Biorazionale</li>
                    </ul>
                </nav>
            </div>
        </div>

        <!---->
        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Slider biorazionale</h2></div></div>
        </div>

        <div class="expanded row">
            <div class="medium-12 large-12 columns">
               <div class="scheda-nuovo-prodotto formFile">
                 <form class="hp_slider_1" method="post">
                     <div class="row">
                         <div class="large-6 columns end">
                             <label style="font-size:19px">Slider 1</label>
                         </div>
                     </div>
                     <div class="expanded row">
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorTitoloSlider1" style="margin:0"></div>
                        </div>
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorTestoSlider1" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Titolo</label><input type="text" name="slider_1_titolo" id="slider_1_titolo">
                         </div>
                         <div class="large-6 columns">
                             <label>Testo</label><textarea name="slider_1_testo" id="slider_1_testo" style="height:100px"></textarea>
                         </div>                         
                     </div>
                     <div class="expanded row">                        
                        <div class="medium-6 large-6 columns end">
                            <div id="error" class="errorImgSlider1" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                       <div class="large-6 columns">
                            <div class="preload_img_slide_hp1"><label>Immagine attuale</label></div>
                       </div>
                       <div class="large-6 columns"> 
                            <label>Immagine</label>  
                                <label for="slider_1_immagine" class="filupp">
                                <span class="filupp-file-name valueSlide"></span>
                                <input type="file" name="slider_1_immagine" value="1" id="slider_1_immagine" class="img_slide"/>
                            </label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="large-12 columns">
                            <input type="submit" name="SALVA" value="SALVA" class="float-right" id="salva" style="margin-left:10px">
                            <input type="submit" name="CANCELLA" value="CANCELLA" class="float-right cancella" id="1">
                        </div>
                    </div>
                </form>

                <form class="hp_slider_2" method="post">
                     <div class="row">
                         <div class="large-6 columns end">
                             <label style="font-size:19px">Slider 2</label>
                         </div>
                    </div>
                    <div class="expanded row">
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorTitoloSlider2" style="margin:0"></div>
                        </div>
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorTestoSlider2" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Titolo</label><input type="text" name="slider_2_titolo" id="slider_2_titolo">
                         </div>
                         <div class="large-6 columns">
                             <label>Testo</label><textarea name="slider_2_testo" id="slider_2_testo" style="height:100px"></textarea>
                         </div>                         
                     </div>
                     <div class="expanded row">                        
                        <div class="medium-6 large-6 columns end">
                            <div id="error" class="errorImgSlider2" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                       <div class="large-6 columns">
                            <div class="preload_img_slide_hp2"><label>Immagine attuale</label></div>
                       </div>
                       <div class="large-6 columns"> 
                            <label>Immagine</label>  
                                <label for="slider_2_immagine" class="filupp">
                                <span class="filupp-file-name valueSlide"></span>
                                <input type="file" name="slider_2_immagine" value="2" id="slider_2_immagine" class="img_slide"/>
                            </label>
                        </div>
                     </div>
                     <div class="row">
                       <div class="large-12 columns">
                        <input type="submit" name="SALVA" value="SALVA" class="float-right" style="margin-left:10px">
                        <input type="submit" name="CANCELLA" value="CANCELLA" class="float-right cancella" id="2">
                       </div>
                     </div>
                </form>

                <form class="hp_slider_3" method="post">
                     <div class="row">
                        <div class="large-6 columns end">
                            <label style="font-size:19px">Slider 3</label>
                        </div>
                     </div>
                     <div class="expanded row">
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorTitoloSlider3" style="margin:0"></div>
                        </div>
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorTestoSlider3" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Titolo</label><input type="text" name="slider_3_titolo" id="slider_3_titolo">
                         </div>
                         <div class="large-6 columns">
                             <label>Testo</label><textarea name="slider_3_testo" id="slider_3_testo" style="height:100px"></textarea>
                         </div>                         
                     </div>
                     <div class="expanded row">                        
                        <div class="medium-6 large-6 columns end">
                            <div id="error" class="errorImgSlider3" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                     <div class="large-6 columns">
                            <div class="preload_img_slide_hp3"><label>Immagine attuale</label></div>
                       </div>
                       <div class="large-6 columns"> 
                            <label>Immagine</label>  
                                <label for="slider_3_immagine" class="filupp">
                                <span class="filupp-file-name valueSlide"></span>
                                <input type="file" name="slider_3_immagine" value="3" id="slider_3_immagine" class="img_slide"/>
                            </label>
                        </div>
                     </div>
                     <div class="row">
                       <div class="large-12 columns">
                        <input type="submit" name="SALVA" value="SALVA" class="float-right" style="margin-left:10px">
                        <input type="submit" name="CANCELLA" value="CANCELLA" class="float-right cancella" id="3">
                       </div>
                     </div>
                </form>

                <form class="hp_slider_4" method="post">
                     <div class="row">
                        <div class="large-6 columns end">
                            <label style="font-size:19px">Slider 4</label>
                        </div>
                     </div>
                     <div class="expanded row">
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorTitoloSlider4" style="margin:0"></div>
                        </div>
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorTestoSlider4" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Titolo</label><input type="text" name="slider_4_titolo" id="slider_4_titolo">
                         </div>
                         <div class="large-6 columns">
                             <label>Testo</label><textarea name="slider_4_testo" id="slider_4_testo" style="height:100px"></textarea>
                         </div>                         
                     </div>
                     <div class="expanded row">                        
                        <div class="medium-6 large-6 columns end">
                            <div id="error" class="errorImgSlider4" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                       <div class="large-6 columns">
                            <div class="preload_img_slide_hp4"><label>Immagine attuale</label></div>
                       </div>
                       <div class="large-6 columns"> 
                            <label>Immagine</label>  
                                <label for="slider_4_immagine" class="filupp">
                                <span class="filupp-file-name valueSlide"></span>
                                <input type="file" name="slider_4_immagine" value="4" id="slider_4_immagine" class="img_slide"/>
                            </label>
                        </div>
                     </div>
                     <div class="row">
                       <div class="large-12 columns">
                        <input type="submit" name="SALVA" value="SALVA" class="float-right" style="margin-left:10px">
                        <input type="submit" name="CANCELLA" value="CANCELLA" class="float-right cancella" id="4">
                       </div>
                     </div>
                </form>

                <form class="hp_slider_5" method="post">
                     <div class="row">
                        <div class="large-6 columns end">
                            <label style="font-size:19px">Slider 5</label>
                        </div>
                     </div>
                     <div class="expanded row">
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorTitoloSlider5" style="margin:0"></div>
                        </div>
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorTestoSlider5" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Titolo</label><input type="text" name="slider_5_titolo" id="slider_5_titolo">
                         </div>
                         <div class="large-6 columns">
                             <label>Testo</label><textarea name="slider_5_testo" id="slider_5_testo" style="height:100px"></textarea>
                         </div>                         
                     </div>
                     <div class="expanded row">                        
                        <div class="medium-6 large-6 columns end">
                            <div id="error" class="errorImgSlider5" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                       <div class="large-6 columns">
                            <div class="preload_img_slide_hp5"><label>Immagine attuale</label></div>
                       </div>
                       <div class="large-6 columns"> 
                            <label>Immagine</label>  
                                <label for="slider_5_immagine" class="filupp">
                                <span class="filupp-file-name valueSlide"></span>
                                <input type="file" name="slider_5_immagine" value="1" id="slider_5_immagine" class="img_slide"/>
                            </label>
                        </div>
                     </div>
                     <div class="row">
                       <div class="large-12 columns">
                            <input type="submit" name="SALVA" value="SALVA" class="float-right" style="margin-left:10px">
                            <input type="submit" name="CANCELLA" value="CANCELLA" class="float-right cancella" id="5">
                        </div>
                     </div>
                 </form>

                 <form class="hp_slider_6" method="post">
                     <div class="row">
                        <div class="large-6 columns end">
                            <label style="font-size:19px">Slider 6</label>
                        </div>
                     </div>
                     <div class="expanded row">
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorTitoloSlider6" style="margin:0"></div>
                        </div>
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorTestoSlider6" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Titolo</label><input type="text" name="slider_6_titolo" id="slider_6_titolo">
                         </div>
                         <div class="large-6 columns">
                             <label>Testo</label><textarea name="slider_6_testo" id="slider_6_testo" style="height:100px"></textarea>
                         </div>                         
                     </div>
                     <div class="expanded row">                        
                        <div class="medium-6 large-6 columns end">
                            <div id="error" class="errorImgSlider6" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                       <div class="large-6 columns">
                            <div class="preload_img_slide_hp6"><label>Immagine attuale</label></div>
                       </div>
                       <div class="large-6 columns"> 
                            <label>Immagine</label>  
                                <label for="slider_6_immagine" class="filupp">
                                <span class="filupp-file-name valueSlide"></span>
                                <input type="file" name="slider_6_immagine" value="6" id="slider_6_immagine" class="img_slide"/>
                            </label>
                        </div>
                     </div>
                     <div class="row">
                       <div class="large-12 columns">
                            <input type="submit" name="SALVA" value="SALVA" class="float-right" style="margin-left:10px">
                            <input type="submit" name="CANCELLA" value="CANCELLA" class="float-right cancella" id="6">
                        </div>
                     </div>
                 </form>
               </div>
            </div>
        </div>

        <!---->

      </section>

@endsection

@section('script')
<script type="text/javascript">
    $('.img_slide').change(function(){                
        var filename = $(this,"input[type='file']").val();
        $(this).prev('.valueSlide').html(filename);
    });
    
    var utente='';

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Users/GetUserInfo",
        async:false,
        success: function (result) {
            utente=result.firstName + ' ' + result.lastName;
        },
        error: function (request, status, errorThrown){}
    });

    CKEDITOR.replace('slider_1_testo');
    CKEDITOR.replace('slider_2_testo');
    CKEDITOR.replace('slider_3_testo');
    CKEDITOR.replace('slider_4_testo');
    CKEDITOR.replace('slider_5_testo');
    CKEDITOR.replace('slider_6_testo');

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=13",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){               
                if(value.id == 52){ $("#slider_1_titolo").val(value.description); }
                if(value.id == 53){ $("#slider_1_testo").val(value.description); }
                if(value.id == 54){ $("#slider_2_titolo").val(value.description); }
                if(value.id == 55){ $("#slider_2_testo").val(value.description); }
                if(value.id == 56){ $("#slider_3_titolo").val(value.description); }
                if(value.id == 57){ $("#slider_3_testo").val(value.description); }               
                if(value.id == 58){ $("#slider_4_titolo").val(value.description); }
                if(value.id == 59){ $("#slider_4_testo").val(value.description); }
                if(value.id == 60){ $("#slider_5_titolo").val(value.description); }
                if(value.id == 61){ $("#slider_5_testo").val(value.description); }                
                if(value.id == 62){ $("#slider_6_titolo").val(value.description); }
                if(value.id == 63){ $("#slider_6_testo").val(value.description); }                
            });
        }
    });

    $('.cancella').click(function (t) {
        t.preventDefault();

        var Idsezione = '';
        var Namesezione = '';
        var myId = $(this).attr('id');

        if(myId == 1){
            IdsezioneTitolo = 52;
            IdsezioneTesto = 53;
            NamesezioneTitolo = 'Titolo Slider 1';
            NamesezioneTesto = 'Testo Slider 1';
            CKEDITOR.instances.slider_1_testo.setData('');
        }
        if(myId == 2){
            IdsezioneTitolo = 54;
            IdsezioneTesto = 55;
            NamesezioneTitolo = 'Titolo Slider 2';
            NamesezioneTesto = 'Testo Slider 2';
            CKEDITOR.instances.slider_2_testo.setData('');
        }
        if(myId == 3){
            IdsezioneTitolo = 56;
            IdsezioneTesto = 57;
            NamesezioneTitolo = 'Titolo Slider 3';
            NamesezioneTesto = 'Testo Slider 3';
            CKEDITOR.instances.slider_3_testo.setData('');
        }
        if(myId == 4){
            IdsezioneTitolo = 58;
            IdsezioneTesto = 59;
            NamesezioneTitolo = 'Titolo Slider 4';
            NamesezioneTesto = 'Testo Slider 4';
            CKEDITOR.instances.slider_4_testo.setData('');
        }
        if(myId == 5){
            IdsezioneTitolo = 60;
            IdsezioneTesto = 61;
            NamesezioneTitolo = 'Titolo Slider 5';
            NamesezioneTesto = 'Testo Slider 5';
            CKEDITOR.instances.slider_5_testo.setData('');
        }
        if(myId == 6){
            IdsezioneTitolo = 62;
            IdsezioneTesto = 63;
            NamesezioneTitolo = 'Titolo Slider 6';
            NamesezioneTesto = 'Testo Slider 6';
            CKEDITOR.instances.slider_6_testo.setData('');
        }

        post_data_titolo='{ "ID" : "' + IdsezioneTitolo + '" , "Name" :  "' + NamesezioneTitolo + '" , "Description": "", "Visibile" : true , "IdPagina" : 13 }';
            $.ajax({
                type: "POST",
                    beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
                dataType: "json",
                data: JSON.parse(post_data_titolo),
                success: function(data){
                    if(data.returnCode == '-1'){
                        $(".errorSlider" + myId).html('Impossibile cancellare la sezione ');
                        
                    }else{
                        $(".errorSlider" + myId).html('Sezione correttamente aggiornata');
                        $("#slider_" + myId + "_titolo").val('');
                    }
                },
                error: function (request, status, errorThrown){
                    $(".errorSlider" + myId).html('Impossibile aggiornare il testo');
                }
            });

        post_data_testo='{ "ID" : "' + IdsezioneTesto + '" , "Name" :  "' + NamesezioneTesto + '" , "Description": "", "Visibile" : true , "IdPagina" : 13 }';
            $.ajax({
                type: "POST",
                    beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
                dataType: "json",
                data: JSON.parse(post_data_testo),
                success: function(data){
                    if(data.returnCode == '-1'){
                        $(".errorSlider" + myId).html('Impossibile cancellare la sezione ');
                        
                    }else{
                        $(".errorSlider" + myId).html('Sezione correttamente aggiornata');
                        $("#slider_" + myId + "_testo").val(' ');
                    }
                },
                error: function (request, status, errorThrown){
                    $(".errorSlider" + myId).html('Impossibile aggiornare il testo');
                }
            });

            $.ajax({
                type: "GET",
                beforeSend: function (request) {           
                  request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + IdsezioneTitolo,      
                async:false,
                success: function (result){
                    $.each(result.data, function(index, value){           
                            
                        post_data = '{ "id" : ' + value.id + '}';
                        $.ajax({
                            type: "POST",
                            beforeSend: function (request) {           
                                request.setRequestHeader("Authorization", "Bearer " + token );
                                request.setRequestHeader("lang", "it");
                                request.setRequestHeader("charset" , "utf-8");
                            },
                            url: "{{ config('constants.UrlWebService') }}api/Site/DeleteImmagine?IdSezione=" + IdsezioneTitolo,      
                            dataType: "json",
                            data: JSON.parse(post_data),
                            success: function (result){$(".preload_img_slide_hp" + myId).html('');},
                            error: function (request, status, errorThrown){}
                        });
                    });            
                },
                error: function (request, status, errorThrown){}
            });

            
    });


    $("form[class^='hp_slider_']").submit(function(e) {
        e.preventDefault();           
        var className = $(this).attr('class');
        var res = className.split("_");
        var number = res.slice(-1)[0];

        if(number == 1){
            IdsezioneTitolo = 52;
            IdsezioneTesto = 53;
            NamesezioneTitolo = 'Titolo Slider 1';
            NamesezioneTesto = 'Testo Slider 1';
            var testoSlide = CKEDITOR.instances.slider_1_testo.getData();
            testoSlide = testoSlide.replace(/(\r\n|\n|\r)/gm, "");
            testoSlide = testoSlide.replace(/"/g,"\\\"");
        }
        if(number == 2){
            IdsezioneTitolo = 54;
            IdsezioneTesto = 55;
            NamesezioneTitolo = 'Titolo Slider 2';
            NamesezioneTesto = 'Testo Slider 2';
            var testoSlide = CKEDITOR.instances.slider_2_testo.getData();
            testoSlide = testoSlide.replace(/(\r\n|\n|\r)/gm, "");
            testoSlide = testoSlide.replace(/"/g,"\\\"");
        }
        if(number == 3){
            IdsezioneTitolo = 56;
            IdsezioneTesto = 57;
            NamesezioneTitolo = 'Titolo Slider 3';
            NamesezioneTesto = 'Testo Slider 3';
            var testoSlide = CKEDITOR.instances.slider_3_testo.getData();
            testoSlide = testoSlide.replace(/(\r\n|\n|\r)/gm, "");
            testoSlide = testoSlide.replace(/"/g,"\\\"");
        }
        if(number == 4){
            IdsezioneTitolo = 58;
            IdsezioneTesto = 59;
            NamesezioneTitolo = 'Titolo Slider 4';
            NamesezioneTesto = 'Testo Slider 4';
            var testoSlide = CKEDITOR.instances.slider_4_testo.getData();
            testoSlide = testoSlide.replace(/(\r\n|\n|\r)/gm, "");
            testoSlide = testoSlide.replace(/"/g,"\\\"");
        }
        if(number == 5){
            IdsezioneTitolo = 60;
            IdsezioneTesto = 61;
            NamesezioneTitolo = 'Titolo Slider 5';
            NamesezioneTesto = 'Testo Slider 5';
            var testoSlide = CKEDITOR.instances.slider_5_testo.getData();
            testoSlide = testoSlide.replace(/(\r\n|\n|\r)/gm, "");
            testoSlide = testoSlide.replace(/"/g,"\\\"");
        }
        if(number == 6){
            IdsezioneTitolo = 62;
            IdsezioneTesto = 63;
            NamesezioneTitolo = 'Titolo Slider 6';
            NamesezioneTesto = 'Testo Slider 6';
            var testoSlide = CKEDITOR.instances.slider_6_testo.getData();
            testoSlide = testoSlide.replace(/(\r\n|\n|\r)/gm, "");
            testoSlide = testoSlide.replace(/"/g,"\\\"");
        }

            /*immagine */

            var slider_uno_immagine = '';
            var validazionecampi = true;
            var error ='';

            var myObj ;
            var data = new FormData();
                       
            var files = $("#slider_" + number + "_immagine").get(0).files;

            myObj = { "Name": utente , "IdSezione": IdsezioneTitolo, "Visibile": true };
            myJSON = JSON.stringify(myObj);
            data.append("data", myJSON);

            if(files.length > 0){  
                $.ajax({
                    type: "GET",
                    beforeSend: function (request) {           
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + IdsezioneTitolo,      
                    async:false,
                    success: function (result){
                        $.each(result.data, function(index, value){           
                            
                            post_data = '{ "id" : ' + value.id + '}';
                            $.ajax({
                                type: "POST",
                                beforeSend: function (request) {           
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                    request.setRequestHeader("charset" , "utf-8");
                                },
                                url: "{{ config('constants.UrlWebService') }}api/Site/DeleteImmagine?IdSezione=" + IdsezioneTitolo,      
                                dataType: "json",
                                data: JSON.parse(post_data),
                                success: function (result){},
                                error: function (request, status, errorThrown){}
                            });
                        });
                        
                    },
                    error: function (request, status, errorThrown){}
                });

                $(".preload_img_slide_hp" + number).html('');
                data.append("UploadedImage", files[0]);                         
                var ajaxRequest = $.ajax({
                      type: "POST",
                      beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                      },
                      url: "{{ config('constants.UrlWebService') }}api/Site/UploadImmagine",
                      contentType: false,
                      processData: false,
                      data: data,
                      async:false,
                      success: function (result) {
                        $(".errorImgSlider" + number ).html('Immagine correttamente caricata');
                            $.ajax({
                                type: "GET",
                                beforeSend: function (request) {           
                                    request.setRequestHeader("lang", "it");
                                },
                                url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + IdsezioneTitolo,      
                                async:false,
                                success: function (result){
                                    $.each(result.data, function(index, value){           
                                        fielIdImgX = value.id; 
                                    });
                                    var srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                                    $(".preload_img_slide_hp" + number).append("<img src='" + srcX + "' /> <br />");
                                },
                                error: function (request, status, errorThrown){}
                            });
                      },
                      error: function (request, status, errorThrown) {
                        $(".errorImgSlider" + number).html('Impossibile caricare l\'immagine');
                      }
                });                
            }

            var titoloSlide = $('#slider_' + number + '_titolo').val();
        
            post_data='{ "ID" : ' + IdsezioneTitolo + ' , "Name" :  "' + NamesezioneTitolo + '" , "Description": "' + titoloSlide + '", "Visibile" : true , "IdPagina" : 13 }';
            $.ajax({
                type: "POST",
                    beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
                dataType: "json",
                data: JSON.parse(post_data),
                async:false,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $(".errorTitoloSlider" + number).html('Impossibile aggiornare il testo');
                    }else{
                        $(".errorTitoloSlider" + number).html('Titolo correttamente aggiornato');
                    }
                },
                error: function (request, status, errorThrown){
                    $(".errorTitoloSlider" + number).html('Impossibile aggiornare il testo');
                }
            });            

            post_data='{ "ID" : ' + IdsezioneTesto + ' , "Name" :  "' + NamesezioneTesto + '" , "Description": "' + testoSlide + '", "Visibile" : true , "IdPagina" : 13 }';
            $.ajax({
                type: "POST",
                    beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
                dataType: "json",
                data: JSON.parse(post_data),
                async:false,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $(".errorTestoSlider" + number).html('Impossibile aggiornare il testo');
                    }else{
                        $(".errorTestoSlider" + number).html('Testo correttamente aggiornato');
                    }
                },
                error: function (request, status, errorThrown){
                    $(".errorTestoSlider" + number).html('Impossibile aggiornare il testo');
                }
            }); 

    });

    var fielIdImg1 = '';
    var fielIdImg2 = '';
    var fielIdImg3 = '';
    var fielIdImg4 = '';
    var fielIdImg5 = '';
    var fielIdImg6 = '';
    
    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=52",      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdImg1 = value.id; 
            });
            if(fielIdImg1 != ''){
                var src1 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg1;
                $(".preload_img_slide_hp1").append("<img src='" + src1 + "' /> <br />");
            }
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=54",      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdImg2 = value.id; 
            });
            if(fielIdImg2 != ''){
                var src2 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg2;
                $(".preload_img_slide_hp2").append("<img src='" + src2 + "' /> <br />");
            }
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=56",      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdImg3 = value.id; 
            });
            if(fielIdImg3 != ''){
                var src3 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg3;
                $(".preload_img_slide_hp3").append("<img src='" + src3 + "' /> <br />");
            }
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=58",      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdImg4 = value.id; 
            });
            if(fielIdImg4 != ''){
                var src4 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg4;
                $(".preload_img_slide_hp4").append("<img src='" + src4 + "' /> <br />");
            }
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=60",      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdImg5 = value.id; 
            });
            if(fielIdImg5 != ''){
                var src5 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg5;
                $(".preload_img_slide_hp5").append("<img src='" + src5 + "' /> <br />");
            }
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=62",      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdImg6 = value.id; 
            });
            if(fielIdImg6 != ''){
                var src6 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg6;
                $(".preload_img_slide_hp6").append("<img src='" + src6 + "' /> <br />");
            }
        },
        error: function (request, status, errorThrown){}
    });
</script>
@stop
