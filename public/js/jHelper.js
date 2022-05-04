$(document).ajaxError(function (q, request, e, r) {

    var $rand = Math.floor(Math.random() * 1000) + 1;
    if (request.status === 0 && request.statusText === "error") {

        if(e.crossDomain){
            return;
        }
        let mvfg = "you don't have a working internet  connection";

        console.log(arguments);
        toastr.error(mvfg,"Abort");


    }else if (request.status === 0 && request.statusText === "abort") {


        // let mvf = "last request was aborted";
        // swal({
        //     title: "Abort",
        //     text: mvf,
        //     type: "error"
        // }, function () {
        //     // //console.log('abort hkgjhghj');
        // });


    }else if (request.status === 330 ) {
        //console.log(q);
        //console.log(request);
        //console.log(e);
        //console.log(r);


        toastr.options = {
            "timeOut": 0,
            "extendedTimeOut": 0,
            "tapToDismiss": false
        };
        var $take1 = "take_1_"+$rand;
        var $temp1 = toastr.info(request.responseJSON.message+'<br><br><button type="button" class="btn '+$take1+'">dismiss</button>',"Notice");
        toastr.options = {};
        $temp1.delegate('.'+$take1, 'click', function () {
            document.location = request.responseJSON.url;
            toastr.clear($temp1, { force: true });
        });

        // swal({
        //         title: ,
        //         text: request.responseJSON.message,
        //         type: "info"
        //     },
        //
        //     function () {
        //         document.location = request.responseJSON.url;
        //
        //     }
        // )
        // ;


    } else if (request.status === 340 ) {
        //console.log(q);
        //console.log(request);
        //console.log(e);
        //console.log(r);
        var selector = $(request.responseJSON.selector).html('Loading');
        //
        // swal({
        //         title: "Notice",
        //         text: request.responseJSON.message,
        //         type: "info"
        //     },
        //     function () {
        //         $.get(request.responseJSON.url, function (data) {
        //             selector.html(data)
        //         });
        //     });


        toastr.options = {
            "timeOut": 0,
            "extendedTimeOut": 0,
            "tapToDismiss": false
        };
        var $take2 = "take_2_"+$rand;
        var $temp2 = toastr.info(request.responseJSON.message+'<br><br><button type="button" class="btn '+$take2+'">dismiss</button>',"Notice");
        toastr.options = {};
        $temp2.delegate('.'+$take2, 'click', function () {
            $.get(request.responseJSON.url, function (data) {
                selector.html(data)
            });
            toastr.clear($temp2, { force: true });
        });


        // document.location=request.responseJSON.url;
    } else if (request.status === 350 ) {
        //console.log(q);
        //console.log(request);
        //console.log(e);
        //console.log(r);
        var selectorTwo = $(request.responseJSON.selector);
        // swal({
        //     title: "Notice",
        //     text: request.responseJSON.message,
        //     type: "info"
        // }, function () {
        //     selectorTwo.html(request.responseJSON.content);
        //
        // });


        toastr.options = {
            "timeOut": 3000,
            "extendedTimeOut": 2000,
            "tapToDismiss": true
        };

        var $take3 = "take_3_"+$rand;
        var $temp3 = toastr.info(request.responseJSON.message,"Notice");
        toastr.options = {};
        // $temp3.delegate('.'+$take3, 'click', function () {
        //     selectorTwo.html(request.responseJSON.content);
        //     toastr.clear($temp3, { force: true });
        // });

        selectorTwo.html(request.responseJSON.content);

        // document.location=request.responseJSON.url;


    }else if(request.status === 360){
        var $datum = request.responseJSON;
        toastr.options = {
            "timeOut": 3000,
            "extendedTimeOut": 2000,
            "tapToDismiss": true
        };

        if ($datum.level){
            toastr[$datum.level]($datum.message,$datum.title);
        } else {
            toastr.info($datum.message,$datum.title);

        }
        toastr.options = {};


    } else if (request.status === 401 /*||*/ /*request.statusText === "Unauthorized"*/) {
        //console.log(q);
        //console.log(request);
        //console.log(e);
        //console.log(r);

        // swal({
        //     title: request.statusText,
        //     text: request.responseJSON.message,
        //     type: "error"
        // }, function () {
        //     window.location = window.location.href;
        // });


        toastr.options = {
            "timeOut": 2000,
            "extendedTimeOut": 2000,
            "tapToDismiss": true
        };
        var $take4 = "take_4_"+$rand;
        var $temp4 = toastr.error(request.responseJSON.message+'<br><br><button type="button" class="btn '+$take4+'">dismiss</button>',request.statusText);
        toastr.options = {};
        window.location = window.location.href;
        $temp4.delegate('.'+$take4, 'click', function () {
            window.location = window.location.href;
            toastr.clear($temp4, { force: true });
        });

        // document.location=request.responseJSON.url;


    } else if (request.status === 403 && request.statusText === "Forbidden") {

        //console.log(q);
        //console.log(request);
        //console.log(e);
        //console.log(r);
        if (request.responseJSON.message === "Your email address is not verified.") {
            //
            // swal({
            //     title: request.statusText,
            //     text: request.responseJSON.message,
            //     type: "warning"
            // }, function () {
            //     document.location = q.currentTarget.URL;
            // });


            toastr.options = {
                "timeOut": 0,
                "extendedTimeOut": 0,
                "tapToDismiss": false
            };
            var $take5 = "take_5_"+$rand;

            var $temp5 = toastr.warning(request.responseJSON.message+
                '<br><br><button type="button" class="btn '+$take5+'">dismiss</button>',
                request.statusText);

            toastr.options = {};
            $temp5.delegate('.'+$take5, 'click', function () {
                document.location = q.currentTarget.URL;
                toastr.clear($temp5, { force: true });
            });

        } else if (request.responseJSON.message === "This action is unauthorized.") {
            var msgr = 'request Not Allowed';
            // swal(request.statusText, msgr, "warning");
            toastr.options = {
                "timeOut": 0,
                "extendedTimeOut": 0,
                "tapToDismiss": true,
            };
            toastr.warning(msgr, request.statusText);
            toastr.options = {};
        } else {
            toastr.options = {
                "timeOut": 0,
                "extendedTimeOut": 0,
                "tapToDismiss": true,
            };
            toastr.warning(request.responseJSON.message, request.statusText);
            toastr.options = {};
            // swal(request.statusText, request.responseJSON.message, "warning");

        }

    } else if (request.status === 404 /*||*/ /*request.statusText === "Not Found"*/) {
       var mily = "not found";



        toastr.options = {
            "timeOut": 0,
            "extendedTimeOut": 0,
            "tapToDismiss": true,
        };
        toastr.error(mily, request.statusText);
        toastr.options = {};


    }else if (request.status === 405 /*||*/ /*request.statusText === "Method Not Allowed"*/) {
       var milka = "wrong request action made";




        toastr.options = {
            "timeOut": 0,
            "extendedTimeOut": 0,
            "tapToDismiss": true,
        };
        toastr.error(milka, request.statusText);
        toastr.options = {};

        }else if (request.status === 413 /*||*/ /*request.statusText === "Payload Too Large"*/) {
        var mia = "huge Upload size detected";




        toastr.options = {
            "timeOut": 0,
            "extendedTimeOut": 0,
            "tapToDismiss": true,
        };
        toastr.error(mia, request.statusText);
        toastr.options = {};

    } else if (request.status === 419 ) {
            //console.log(q);
            //console.log(request);
            //console.log(e);
            //console.log(r);

            var msqb = "token expired due to page inactivity";
            // swal({
            //     title: 'invalid request',
            //     text: msqb,
            //     type: "error"
            // }, function () {
            //     document.location = q.currentTarget.URL;
            // });

        toastr.options = {
            "timeOut": 0,
            "extendedTimeOut": 0,
            "tapToDismiss": false
        };
        var $take6 = "take_6_"+$rand;

        var $temp6 = toastr.error(msqb+
            '<br><br><button type="button" class="btn '+$take6+'">dismiss</button>',
            'invalid request');

        toastr.options = {};
        $temp6.delegate('.'+$take6, 'click', function () {
            document.location = q.currentTarget.URL;
            toastr.clear($temp6, { force: true });
        });

        } else if (request.status === 422 /*||*/ /*request.statusText === "Unprocessable Entity"*/) {
            // //console.log(request.status);
            // //console.log(request.statusText);
            //console.log(request);
            //console.log(request.responseJSON);
            $.each(request.responseJSON.errors, function (index, value) {
                var txt = " ";
                // var txt = index+": ";
                $.each(value, function (index2, value2) {
                    txt += value2 + "<br>";
                });
                var elem = $('.' + index + '-error');
                $(`input[name="${index}"`).removeClass("is-valid").addClass("is-invalid");
                if (elem.length) {
                    elem.html(txt);
                    // swal({
                    //     title: "<b>validation error</b>",
                    //     text: txt,
                    //     html: true,
                    //     type:"warning"
                    // });

                } else {

                    toastr.options = {
                        "timeOut": 5000,
                        "extendedTimeOut": 3,
                        "tapToDismiss": true,
                    };
                    toastr.warning(txt,"<b>Form Validation</b>");

                    toastr.options = {};

                }

            });

        } else if (request.status === 429 /*||*/ /*request.statusText === "Too Many Requests"*/) {
            //console.log(q);
            //console.log(request);
            //console.log(e);
            //console.log(r);

            var msbh = "Too Much Request";
            // swal({
            //     title: request.statusText,
            //     text: msbh,
            //     type: "error"
            // }, function () {
            //     document.location = document.location.href;
            // });



        toastr.options = {
            "timeOut": 0,
            "extendedTimeOut": 0,
            "tapToDismiss": false
        };
        var $take7 = "take_7_"+$rand;

        var $temp7 = toastr.error(msbh+
            '<br><br><button type="button" class="btn '+$take7+'">dismiss</button>',
            request.statusText);

        toastr.options = {};
        $temp7.delegate('.'+$take7, 'click', function () {
            document.location = document.location.href;
            toastr.clear($temp7, { force: true });
        });
        } else if (request.status === 500 /*||*/ /*request.statusText === "Internal Server Error"*/) {

            console.log(q);
            console.log(request);
            console.log(e);
            console.log(r);
            // //alert(request.statusText + " : " + request.responseJSON.message);
            var msbhd = "Unknown error, try refreshing Your page";
            // swal({
            //     title: request.statusText,
            //     text: msbhd,
            //     type: "error"
            // }, function () {
            //     document.location = document.location.href;
            // });

        toastr.options = {
            "timeOut": 0,
            "extendedTimeOut": 0,
            "tapToDismiss": true,
        };
        toastr.error(msbhd,request.statusText);

        toastr.options = {};

    } else {
            console.log(q);
            console.log(request);
            console.log(e);
            console.log(r);
            var mcfc = "Well it might sound crazy but we do sometimes make mistakes ";
            var mcf = "damm!! :(    Try Reloading the page";
            // swal({
            //     title: "unknown Error",
            //     text: mcf,
            //     type: "error"
            // }, function () {
            //     document.location = document.location.href;
            // });

        toastr.options = {
            "timeOut": 0,
            "extendedTimeOut": 0,
            "tapToDismiss": true,
        };
        toastr.error(mcf,"unknown Error");

        toastr.options = {};
        }
    }
);
// <!-- Wait Me Plugin Js --> note this pluging must be required
// <script src="{{asset('dash/plugins/waitme/waitMe.js')}}"></script>
function LoadingEffect(element, effect = "", text = "Loading...") {
    if (effect === "") {
        effect = random(['bounce', 'rotateplane', 'stretch', 'orbit', 'roundBounce', 'win8', 'win8_linear', 'ios', 'facebook', 'rotation', 'timer', 'pulse', 'progressBar', 'bouncePulse', 'img']);
    }
    return $(element).waitMe({
        effect: effect,
        text: text,
        bg: 'rgba(255,255,255,0.90)',
        color: '#555'
    });
}


var bodyloader = 0;
var $bodyme = $('body');
var req =[];
$(document).ajaxSend(function (event, jq, setting) {
    $(".error-form").html('');
    // //console.log(event);
    // //console.log(jq);
    // //console.log(setting);
    // //console.log(88);
    // //console.log(jq.abort());
    // //console.log(88);

    if(req[setting.url]){
        jq.abort();
        return;
    }
    req[setting.url]=2;

    // if (!bodyloader && $bodyme.hasClass('waitMe_loader')) {
    //     $bodyme.addClass('waitMe_body');
    //     $bodyme.find('.waitMe_container:not([data-waitme_id])').show();
    // }
    // ++bodyloader;
});


$(document).ajaxComplete(function (event, jq, setting) {

    // console.log(jq);
    // if (jq.loader) {
    //     $.each(jq.loader, function (index, value) {
    //         toastr.clear(value, { force: true });
    //
    //     });
    //
    // }else{
    //     alert("hhjjhjh  jghhj");
    // }

    if (jq.status === 0 && jq.statusText === "abort") {
        //console.log('jhhgf');
        return;
    }




    delete req[setting.url];
    //console.log(req);


    //console.log('start');
    //console.log(event);
    //console.log(jq);
    //console.log(setting);
    //console.log('stop');


    // --bodyloader;
    // if (!bodyloader && $bodyme.hasClass('waitMe_loader')) {
    //     $bodyme.find('.waitMe_container:not([data-waitme_id])').hide();
    //     $bodyme.removeClass('waitMe_body');
    // }


});

function random(items) {
    return items[Math.floor(Math.random() * items.length)];
}


function randomAnimation() {
    $.fn.extend({
        animateCss: function (animationName) {
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            $(this).addClass('animated ' + animationName).one(animationEnd, function () {
                $(this).removeClass('animated ' + animationName);
            });
        }
    });

    var anime = ['bounce', '	flash', '	pulse', '	rubberBand'
        , 'shake', '	headShake', '	swing', '	tada'
        , 'wobble', '	jello', '	bounceIn', 'bounceInDown'
        , 'bounceInLeft', '	bounceInRight', '	bounceInUp', '	bounceOut'
        , 'bounceOutDown', '	bounceOutLeft', '	bounceOutRight', '	bounceOutUp'
        , 'fadeIn', '	fadeInDown', '	fadeInDownBig', '	fadeInLeft'
        , 'fadeInLeftBig', '	fadeInRight', '	fadeInRightBig', '	fadeInUp'
        , 'fadeInUpBig', '	fadeOut', '	fadeOutDown', '	fadeOutDownBig'
        , 'fadeOutLeft', '	fadeOutLeftBig', '	fadeOutRight', '	fadeOutRightBig'
        , 'fadeOutUp', '	fadeOutUpBig', '	flipInX', '	flipInY'
        , 'flipOutX', '	flipOutY', '	lightSpeedIn', '	lightSpeedOut'
        , 'rotateIn', '	rotateInDownLeft', '	rotateInDownRight', '	rotateInUpLeft'
        , 'rotateInUpRight', '	rotateOut', '	rotateOutDownLeft', '	rotateOutDownRight'
        , 'rotateOutUpLeft', '	rotateOutUpRight', '	hinge', '	jackInTheBox'
        , 'rollIn', '	rollOut', '	zoomIn', '	zoomInDown'
        , 'zoomInLeft', '	zoomInRight', '	zoomInUp', '	zoomOut'
        , 'zoomOutDown', '	zoomOutLeft', '	zoomOutRight', '	zoomOutUp'
        , 'slideInDown', '	slideInLeft', '	slideInRight', '	slideInUp'
        , 'slideOutDown', '	slideOutLeft', '	slideOutRight', '	slideOutUp'
        , 'heartBeat'];
    $('.rand_animate').click(function () {
        var animation = random(anime);
        $("#" + this.name).animateCss(animation);
    });


}


function timer(elem) {


    // Set the date we're counting down to
    var countDownDate = new Date(elem.dataset.time).getTime();

    // Get todays date and time
    var now = new Date().getTime();


    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    var daysT = "";
    if (days > 0) {
        daysT = days + "d ";

    }

    var hoursT = hours + "h ";
    if (!daysT && (hours <= 0)) {
        hoursT = "";
    }
    var minutesT = minutes + "m ";
    if ((!daysT) && (!hoursT) && (minutes <= 0)) {
        minutesT = "";
    }
    // Display the result in the element with id="demo"
    elem.innerHTML = daysT + hoursT
        + minutesT + seconds + "s ";

    // If the count down is finished, write some text
    if (distance < 0) {
        // clearInterval(x);
        elem.innerHTML = "EXPIRED";
    }
}
