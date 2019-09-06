/// <reference path="../typings/globals/jquery/index.d.ts" />

var isSidePanelOpened = false;
var historyLoaded = false;
var x_coord = 10;
var y_coord = 10;
var r_coord = 10;

var cur_width = window.innerWidth;

$(window).resize(event=>{
    if(isSidePanelOpened){
        if(window.innerWidth < cur_width){
            document.getElementById("sidePanel").className = "flyInAnimClass";
            document.getElementById("mainTable").className = "flyInMainAnimClass"
            isSidePanelOpened = false;   
            if(window.innerWidth > 1000) $('#graphContainer .acrylic-high').width((100 - (50 * 100 / window.innerWidth))/2 + 'vw');
            else $('#graphContainer .acrylic-high').width((100 - (50 * 100 / window.innerWidth)) + 'vw');         
        }
        else{
            if(window.innerWidth > 1000) $('#graphContainer .acrylic-high').width((100 - parseInt($(':root').css('--sidePanelWidth')))/2 + 'vw');
            else $('#graphContainer .acrylic-high').width((100 - parseInt($(':root').css('--sidePanelWidth'))) + 'vw')
        }
        
    }
    else{
        if(window.innerWidth > 1000) $('#graphContainer .acrylic-high').width((100 - (50 * 100 / window.innerWidth))/2 + 'vw');
        else $('#graphContainer .acrylic-high').width((100 - (50 * 100 / window.innerWidth)) + 'vw');
    }
    cur_width = window.innerWidth;
});

$(window).scroll((event)=>{
    const scrolled = window.scrollY;
    // console.log($('#historyContent').offset().top + "           " + scrolled);
    $('.polygon-shape').css('margin-top', '-' + scrolled + 'px');
    if(!historyLoaded && scrolled >= $('#historyContent').offset().top / 2){
        $.ajax({
            url: 'history.php',
            type: 'POST',
            dataType: 'html',
            beforeSend: function () {
                $('#historyContent').html('<div class="windows8"><div class="wBall" id="wBall_1"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_2"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_3"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_4"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_5"><div class="wInnerBall"></div></div></div>');
            },
            success: function (data) {
                $('#historyContent').html('');
                if(data !== 'null'){
                    // $('#history').html($('#history').html() + '<ol class="historyList"></ol>');
                    var json_arr = JSON.parse(data);
                    json_arr.forEach(p=>{
                        // console.log(p);
                        $('#historyContent').html($('#historyContent').html() + 
                        '<li><pre>' + p +'</pre></li>'); 
                    });
                }
                else{
                    $('#history').html($('#history').html() + '<div class="empty-history"><img src="images/history-big.png" alt="Empty history"/><span>Здесь пока ничего нет(</span></div>');
                }
            }
        });
        historyLoaded = true;
    }
});

$(document).ready(()=>{
    $('input[name="x-radio"]').change((e)=>{ 
        x_coord = $(e.target).val();
    });

    if(window.innerWidth > 1000) $('#graphContainer .acrylic-high').width((100 - (50 * 100 / window.innerWidth))/2 + 'vw');
        else $('#graphContainer .acrylic-high').width((100 - (50 * 100 / window.innerWidth)) + 'vw');    

    $('#submitButton').click(event=>{
        event.stopPropagation();
        event.preventDefault();
        if(isvalid()){
            document.getElementById('coordform').submit();
        }
    });

});

function contactusBtnClick() {
    if($('.contactRow').css('display') === 'none'){
        $('.contactRow').show();
    }
    $('.mainRow').hide();

}

function mainPageBtnClick() {
    if($('.mainRow').css('display') === 'none'){
        $('.mainRow').show();
    }
    $('.contactRow').hide();
}

function isvalid() {
    var $yInput = $('input[name="y-input"]');

    if(x_coord == 10){
        alert('Ошибка: X-координата не была выбрана!')
        return false;
    }else
        if(/^((-?[1-5])|0)$/.test($yInput.val())){
            y_coord = $yInput.val();
            return true;
        }
        else{
            if($yInput.val().length == 0)
                alert('Ошибка: Y-координата не была введена!')
            else
                alert('Ошибка: Y-координата была введена неверно!')
            return false;
        }
    return false;
}

function menuButtonClick() {
    
    if(!isSidePanelOpened){
        if(window.innerWidth > 800){
            $('#sidePanel').css('background', 'none');
            $('#sidePanel').css('box-shadow', 'none');
            $('.sidePanelSize').show();
            if(window.innerWidth > 1000) $('#graphContainer .acrylic-high').width((100 - parseInt($(':root').css('--sidePanelWidth')))/2 + 'vw');
            else $('#graphContainer .acrylic-high').width((100 - parseInt($(':root').css('--sidePanelWidth'))) + 'vw')
            document.getElementById("mainTable").className = "flyOutMainAnimClass";
        }
        else{
            $('.sidePanelSize').hide();
            $('#sidePanel').css('background', '#ffcdd2');
            $('#sidePanel').css('box-shadow', '21px 13px 58px -16px rgba(0,0,0,0.75)');
        }
        document.getElementById("sidePanel").className = "flyOutAnimClass";
        isSidePanelOpened = true;
    }
    else{
        if(window.innerWidth > 800){
            $('#sidePanel').css('background', 'none');
            $('#sidePanel').css('box-shadow', 'none');
            $('.sidePanelSize').show();
            if(window.innerWidth > 1000) $('#graphContainer .acrylic-high').width((100 - (50 * 100 / window.innerWidth))/2 + 'vw');
            else $('#graphContainer .acrylic-high').width((100 - (50 * 100 / window.innerWidth)) + 'vw');
            document.getElementById("mainTable").className = "flyInMainAnimClass";
        }
        else{
            $('.sidePanelSize').show();
            $('#sidePanel').css('box-shadow', 'none');
            $('#sidePanel').css('background', 'none');
        }
        document.getElementById("sidePanel").className = "flyInAnimClass";
        isSidePanelOpened = false;
    }
}

function playButtonAnimation(element){
    element.classList.remove("buttonAnim2Class");
    element.classList.add("buttonAnimClass");

    element.addEventListener('animationend', ()=> { 
        element.classList.remove("buttonAnimClass");
        element.classList.add("buttonAnim2Class");
        element.addEventListener('animationend', ()=>{
            element.classList.remove("buttonAnim2Class");
        })
    }, false);
}

function sendDevMessage() {
    let name = $('#contactName').val();
    let email = $('#contactEmail').val();
    let msg = $('#contactMsg').val();
    if(!/^\s+$/.test(name)){
        
        if(/^[-a-z0-9!#$%&'*+/=?^_`{|}~]+(?:\.[-a-z0-9!#$%&'*+/=?^_`{|}~]+)*@(?:[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])?\.)*(?:aero|arpa|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|[a-z][a-z])$/
        .test(email)){

            if(!/^\s+$/.test(msg)){
                //Sending
                // window.open(`mailto:${email}?subject=Сообщение от пользователя&body=${msg}`);
                sendMail(name, email, msg);
                return true;
            }
            else{
                alert('Неверно введено сообщение!')
                return false;
            }

        }
        else{
            alert('Неверно введён Email!')
            return false;
        }

    }else{
        alert('Неверно введено имя!');
        return false;
    }
}


function sendMail(name, email, msg) {
    $.ajax({
        url: 'mail.php',
        type: 'POST',
        data: {name: name, email: email, message: msg},
        dataType: 'html',
        beforeSend: function () {
            console.log('Отправка...');
        },
        success: function (data) {
            // alert('Отправлено');
            if(parseInt(data)){
                let audio = new Audio("https://zvukipro.com/uploads/files/2019-03/1551856604_every-iphone-6-7-8-sound-e.mp3");
                audio.volume = 0.2;
                audio.play();
                audio.onended = ()=>{
                    alert('Отправлено');
                };
            }
            else{
                alert('Упс! При отправке произошли какие-то ошибки(');
            }
            console.log('Отправлено');
        }
    });
}