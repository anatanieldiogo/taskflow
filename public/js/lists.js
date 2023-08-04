$(window).on('load', function () {
    getList()
});
/**LIST START */
function getList(){
    $.ajax({
        type: 'GET',
        url: "/get-all-list",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function (response) {

            //console.log(response.lists)
            $('.aside-menu-menu-lists').empty();
            $('.load-list').remove();
            $('#task_list option').remove();

            if(response.lists.length != 0){

                $('.empty-list').css('display', 'none');
                $.each(response.lists, function (indexInArray, valueOfElement) { 
                    $('.aside-menu-menu-lists').prepend(renderList(valueOfElement))
                    $('#task_list').append(renderListFromTaskInfo(valueOfElement))
                });
            }else{
                $('.empty-list').css('display', 'flex');
            }
        },
        beforeSend: function(){
            //$('.aside-menu-menu-lists').html(renderLoadList())
        },
        error: function(data){
            alert('Detetamos um erro do sistema(List)')
            console.log(data)
        }
    });
}

function renderListFromTaskInfo(list){
    var render = `
    <option value="${list.id}">${list.list_name}</option>
    `
    return render
}


function renderList(list){
    var render = `
        <li><a href="/list/${list.id}" class="click">
            <div class="aside-list-color" style="background-color:${list.list_color};"></div> ${list.list_name} <span>${list.tasks_count}</span>
        </a></li>
    `
    return render
}

function renderLoadList(){
    var render = `
        <li class="load-list">Loading...</li>
    `
    return render
}
/**LIST END */

/** CREATE LIST */
$('#showe-list-form').click(function (e) { 
    e.preventDefault();
    $('.list-form').toggle();
    $('#list_name').focus();
});

$('#list_name').keypress(function(event) {
    if (event.which == 13) {
        event.preventDefault();

        if($(this).val() != ''){
            $('#store_list_form').submit()
            $(this).val('')
        }else{
            event.preventDefault();
        }
    }
});

$('#store_list_form').on('submit', function (e) {
    e.preventDefault();
    
    $.ajax({
        type: 'POST',
        url: '/store-list',
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            getList()
        },
        error: function(data){
            //console.log(data)
        }
    });
});

/**PUT COLOR ON LIST BUTTON */
var colorsButtons = document.querySelectorAll('.list-form-list-color label');
$(colorsButtons[0]).css('border-color', 'var(--text-color)')

$.each(colorsButtons, function (indexInArray, valueOfElement) {
     $(valueOfElement).css('background-color', $(valueOfElement).attr('data-color'));

     $(valueOfElement).click(function (e) {
        //e.preventDefault();

        $(".list-form-list-color label").css('border-color', '')
        //$(this).css('border-color', 'red')

        if( $(this).is(':checked') ){
            $(this).css('border-color', '')
        }
        else{
            $(this).css('border-color', 'var(--text-color)')
        }
        
     });
});

// function storeList(list_name, list_color){
//     $.ajax({
//         type: 'POST',
//         url: "/store-subtask",
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
//         },
//         data: {
//             list_name: list_name,
//             list_color: list_color,
//         },
//         success: function (response) {
//             $('#task_subtask').val('')
//             $('.todo-view-body-subtasks-content').prepend(renderSubtasks(response.subtask))

//             /**SO PRA ATUALIZAR A SUBTASK NA LISTAS DAS TASKS */
//             //getTask()
//             //console.log(response.subtask)
//         },
//         beforeSend: function(){
//             //
//         },
//         error: function(data){
//             alert('Detetamos um erro do sistema(Store subtask)')
//             console.log(data)
//         }
//     });
// }

