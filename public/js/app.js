
// $('#store_list_form').on('submit', function (e) {
//     e.preventDefault();
    
//     $.ajax({
//         type: 'POST',
//         url: '/create-list',
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
//         },
//         data: new FormData(this),
//         dataType: "json",
//         contentType: false,
//         cache: false,
//         processData: false,
//         success: function (response) {
//             $('.list-content-home').empty();
//             getLists()
            
//             closeGuideWrapperPanels()
//         },
//         error: function(data){
//             //console.log(data)
//         }
//     });
// });

$(window).on('load', function () {
    getTodo()
    getList()
});

function getTodo(){
    $.ajax({
        type: 'GET',
        url: "/get-all-todo",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function (response) {

            $('.load-task').remove();
            
            $.each(response.tasks, function (indexInArray, valueOfElement) { 
                $('.section-todo-content').append(renderTask(valueOfElement))
            });
        },
        beforeSend: function(){
            $('.section-todo-content').html(renderLoadTask())
        },
        error: function(data){
            console.log(data)
        }
    });
}


function renderTask(todo){
    var render = `
            <div class="todo" onclick="openTodo()">
                <div class="todo-header">
                    <div class=""><input type="checkbox"> <span>${todo.task_name}</span>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="todo-body">

                ${todo.task_due_date != null ? `<div class="todo-due-date todo-body-child"><i class="fas fa-calendar-alt"></i><span>${todo.task_due_date}</span></div>` : ``}

                ${todo.subtasks_count != 0 ? `<div class="todo-subtask todo-body-child"><p>${todo.subtasks_count}</p><span>Subtasks</span></div>` : ``}

                    <div class="todo-list todo-body-child">
                        <div class="todo-list-color" style="background-color:${todo.list.list_color};"></div>
                        <span>${todo.list.list_name}</span>
                    </div>
                </div>
            </div>
    `
 
    return render
}

function renderLoadTask(){
    var render = `
            <div class="load-task">
                Loading...
            </div>
    `
 
    return render
}
/** TASK END */

/**LIST START */
function getList(){
    $.ajax({
        type: 'GET',
        url: "/get-all-list",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function (response) {
            console.log(response.lists)
            $('.load-list').remove();
            
            $.each(response.lists, function (indexInArray, valueOfElement) { 
                $('.aside-menu-menu-lists').append(renderList(valueOfElement))
            });
        },
        beforeSend: function(){
            $('.aside-menu-menu-lists').html(renderLoadList())
        },
        error: function(data){
            console.log(data)
        }
    });
}
function renderList(list){
    var render = `
        <li><a href="" class="click">
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

function openTodo(){
    $('.todo-view').css('display', 'flex');
    //$('.todo-view').toggle();
}

$('#closeTask').click(function (e) { 
    e.preventDefault();
    $('.todo-view').css('display', 'none');
});

