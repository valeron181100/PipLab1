/// <reference path="../typings/globals/jquery/index.d.ts" />

$(document).ready(()=>{
    selectsFiling();
    $('.optionPanel').hide();
    $('.divOption').click(function (e){
        e.stopPropagation();
        let _select = $(this).parent().parent().parent().children().get(0);
        let _label = $(this).parent().parent();
        let _span = _label.children().get(1);
        $(_select).val(this.textContent);
        $(this).parent().hide();                   //hiding
        _span.textContent = this.textContent;
    });

    $('.fluentSelect label').click(function (e){
        e.stopPropagation();
        let _labelPanel = $(this).children(':first');
        _labelPanel.next().text('');
        let _select = _labelPanel.parent().parent().children(':first');
        _labelPanel.css('margin-top', '-' + 2*_select.prop('selectedIndex') + 'rem');
        _labelPanel.show();                  //showing
    });
    
    $(document.body).click(function (e) { 
        $('.optionPanel').hide();
        $('.fluentSelect select').each(function (i, el){
            console.log($(this).val());
            $(this).next().children().get(1).textContent = $(this).val();
        });
    });
});



function selectsFiling(){
    let _lable = $('.fluentSelect label');
    let _select = _lable.prev();
    let _optionPanel = _lable.children(':first');
    _select.children().each((i, el)=>{
        let divOption = document.createElement('div');
        divOption.className = 'divOption';
        divOption.textContent = el.textContent;
        _optionPanel.append($(divOption));
    });

    $('.fluentSelect select').each(function (i, el) {
        $(el).parent().children().get(1).children[1].textContent = $(el).children(':first').text();
    })
}