<!--begin:: Global Mandatory Vendors -->
<script src="vendors/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="vendors/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="vendors/moment/min/moment.min.js" type="text/javascript"></script>
<script src="vendors/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="vendors/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="vendors/wnumb/wNumb.js" type="text/javascript"></script>

<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="vendors/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="vendors/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="vendors/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="vendors/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="vendors/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="vendors/js/framework/components/plugins/forms/bootstrap-datepicker.init.js" type="text/javascript"></script>
<script src="vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="vendors/js/framework/components/plugins/forms/bootstrap-timepicker.init.js" type="text/javascript"></script>
<script src="vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="vendors/js/framework/components/plugins/forms/bootstrap-daterangepicker.init.js" type="text/javascript"></script>
<script src="vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="vendors/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="vendors/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="vendors/js/framework/components/plugins/forms/bootstrap-switch.init.js" type="text/javascript"></script>
<script src="vendors/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
<script src="vendors/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="vendors/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="vendors/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="vendors/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="vendors/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="vendors/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
<script src="vendors/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="vendors/inputmask/dist/inputmask/inputmask.phone.extensions.js" type="text/javascript"></script>
<script src="vendors/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="vendors/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="vendors/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="vendors/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="vendors/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="vendors/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="vendors/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="vendors/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="vendors/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="vendors/js/framework/components/plugins/forms/bootstrap-markdown.init.js" type="text/javascript"></script>
<script src="vendors/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="vendors/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="vendors/js/framework/components/plugins/forms/jquery-validation.init.js" type="text/javascript"></script>
<script src="vendors/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="vendors/js/framework/components/plugins/base/bootstrap-notify.init.js" type="text/javascript"></script>
<script src="vendors/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="vendors/jstree/dist/jstree.js" type="text/javascript"></script>
<script src="vendors/raphael/raphael.js" type="text/javascript"></script>
<script src="vendors/morris.js/morris.js" type="text/javascript"></script>
<script src="vendors/chartist/dist/chartist.js" type="text/javascript"></script>
<script src="vendors/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="vendors/js/framework/components/plugins/charts/chart.init.js" type="text/javascript"></script>
<script src="vendors/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
<script src="vendors/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="vendors/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="vendors/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="vendors/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="vendors/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="vendors/js/framework/components/plugins/base/sweetalert2.init.js" type="text/javascript"></script>

<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle -->
<script src="assets/demo/base/scripts.bundle.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--end::Page Scripts -->
<script type="text/javascript">
function displayNotes(i, j){
    if(i == ""){
        document.getElementById("notes-display").innerHTML = "";
        return;
    }else{
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("notes-display").innerHTML = this.responseText;
            }
        };
        if(j == true && ordering == true){
            xmlhttp.open("GET", "inc/ajax/notes.php?idmatiere="+i+"&asc", true);
            ordering = false;
        }else if(j == true && ordering == false){   
            xmlhttp.open("GET", "inc/ajax/notes.php?idmatiere="+i+"&desc", true);
            ordering = true;
        }else if( j == false){
            xmlhttp.open("GET", "inc/ajax/notes.php?idmatiere="+i, true);
        }
        xmlhttp.send();
    }
}


$(document).ready(function(){
    var ordering = true;
    $('#note-order').on('click', function(){
        var selectValue = $('#matieres-select').val();
        displayNotes(selectValue, true);
    });

    $("#addnews").click(function(){
        var newsTitle = $('#news-title').val();
        var newsContent = $('#news-content').val();
        $.post("inc/ajax/add-news.php",
        {
            news_title: newsTitle,
            news_content: newsContent
        },
        function(data,status){
            alert(data);
            $('#m_modal_1').modal('hide');
        });
    });
});
/* 
if(navigator.geolocation) {

// Fonction de callback en cas de succès
function affichePosition(position) {

    var infopos = "Position déterminée : <br>";
    infopos += "Latitude : "+position.coords.latitude +"<br>";
    infopos += "Longitude: "+position.coords.longitude+"<br>";
    infopos += "Altitude : "+position.coords.altitude +"<br>";
    document.getElementById("maposition").innerHTML = infopos;

    // On instancie un nouvel objet LatLng pour Google Maps
    var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

    // Ajout d'un marqueur à la position trouvée
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title:"Vous êtes ici"
    });
    
    map.panTo(latlng);

}

// Fonction de callback en cas d’erreur
function erreurPosition(error) {
    var info = "Erreur lors de la géolocalisation : ";
    switch(error.code) {
    case error.TIMEOUT:
        info += "Timeout !";
    break;
    case error.PERMISSION_DENIED:
        info += "Vous n’avez pas donné la permission";
    break;
    case error.POSITION_UNAVAILABLE:
        info += "La position n’a pu être déterminée";
    break;
    case error.UNKNOWN_ERROR:
        info += "Erreur inconnue";
    break;
    }
    document.getElementById("maposition").innerHTML = info;
}

navigator.geolocation.getCurrentPosition(affichePosition,erreurPosition);

} else {

alert("Ce navigateur ne supporte pas la géolocalisation");

} */
</script>