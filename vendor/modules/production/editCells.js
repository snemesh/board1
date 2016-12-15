//при нажатии на ячейку таблицы с классом edit
$(document).on('click', 'td.edit', function(){
    //находим input внутри элемента с классом ajax и вставляем вместо input его значение
    $('.ajax').html($('.ajax input').val());
    //удаляем все классы ajax
    $('.ajax').removeClass('ajax');
    //Нажатой ячейке присваиваем класс ajax
    $(this).addClass('ajax');
    //внутри ячейки создаём input и вставляем текст из ячейки в него
    $(this).html('<input id="editbox"  size="'+ $(this).text().length+'" value="' + $(this).text() + '" type="text">');
//     $(this).html('<input id="editbox" value="' + $(this).text() + '" type="text">');
    //устанавливаем фокус на созданном элементе
    var el=document.getElementById("editbox");
    el.focus();
    el.setSelectionRange(el.value.length,el.value.length);
});


//определяем нажатие кнопки на клавиатуре
$(document).on('keydown', 'td.edit', function(event){
    //получаем значение класса и разбиваем на массив
    //в итоге получаем такой массив - arr[0] = edit, arr[1] = наименование столбца, arr[2] = id строки
    arr = $(this).attr('class').split( " " );
    //проверяем какая была нажата клавиша и если была нажата клавиша Enter (код 13)
    if(event.which == 13)
    {
        //получаем наименование таблицы, в которую будем вносить изменения
        var table = $('table').attr('id');
        var curdata = $('.x_content span').html();
        var ms = Date.parse(curdata);
        var date = new Date(ms);
        var month = date.getMonth()+1;
        var sMonth="";
        var year = date.getFullYear();
        if (month<10) {
            sMonth = '0'+ month.toString();
        } else {
            sMonth = month.toString();
        }
        var sYear = year.toString();
        var fData = sYear + sMonth;
        curdata = fData;


        //alert(curdata);
        //выполняем ajax запрос методом POST
        $.ajax({ type: "POST",
            //в файл update_cell.php
            url:"ajax-edit.php",
            //создаём строку для отправки запроса
            //value = введенное значение
            //id = номер строки
            //field = название столбца
            //table = собственно название таблицы
            data: "value="+$('.ajax input').val()+"&id="+arr[2]+"&field="+arr[1]+"&table="+table+"&date="+curdata,
            //при удачном выполнении скрипта, производим действия
            success: function(data){
                //находим input внутри элемента с классом ajax и вставляем вместо input его значение
                $('.ajax').html($('.ajax input').val());
                //удаялем класс ajax
                $('.ajax').removeClass('ajax');
            }});
    }

});

//Сохранение при нажатии вне поля
$(document).on('blur', '#editbox', function(){

    var arr = $('td.edit').attr('class').split( " " );
    //получаем наименование таблицы, в которую будем вносить изменения
    var table = $('table').attr('id');
    var curdata = $('.x_content span').html();
    var ms = Date.parse(curdata);
    var date = new Date(ms);
    var month = date.getMonth()+1;
    var year = date.getFullYear();
    var sMonth = month.toString();
    var sYear = year.toString();
    var fData = sYear + sMonth;
    curdata = fData;
    //выполняем ajax запрос методом POST
    $.ajax({ type: "POST",
        //в файл update_cell.php
        url:"ajax-edit.php",
        //создаём строку для отправки запроса
        //value = введенное значение
        //id = номер строки
        //field = название столбца
        //table = собственно название таблицы
        data: "value="+$('.ajax input').val()+"&id="+arr[2]+"&field="+arr[1]+"&table="+table+"&date="+curdata,
        //при удачном выполнении скрипта, производим действия
        success: function(data){
            //находим input внутри элемента с классом ajax и вставляем вместо input его значение
            $('.ajax').html($('.ajax input').val());
            //удаялем класс ajax
            $('.ajax').removeClass('ajax');
        }});
});

