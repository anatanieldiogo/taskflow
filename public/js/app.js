
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
    getTask()
    getList()
});

function getTask(){
    $.ajax({
        type: 'GET',
        url: "/get-all-task",
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
            alert('Detetamos um erro do sistema(Task)')
            console.log(data)
        }
    });
}


function renderTask(task){
    var render = `
            <div class="todo" onclick="openTaskView(${task.id})">
                <div class="todo-header">
                    <div class=""><input type="checkbox"> <span>${task.task_name}</span>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="todo-body">

                ${task.task_due_date != null ? `<div class="todo-due-date todo-body-child"><i class="fas fa-calendar-alt"></i><span>${task.task_due_date}</span></div>` : ``}

                ${task.subtasks_count != 0 ? `<div class="todo-subtask todo-body-child"><p>${task.subtasks_count}</p><span>Subtasks</span></div>` : ``}

                    <div class="todo-list todo-body-child">
                        <div class="todo-list-color" style="background-color:${task.list.list_color};"></div>
                        <span>${task.list.list_name}</span>
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
            //console.log(response.lists)
            $('.load-list').remove();
            
            $.each(response.lists, function (indexInArray, valueOfElement) { 
                $('.aside-menu-menu-lists').append(renderList(valueOfElement))
                $('#task_list').append(renderListFromTaskInfo(valueOfElement))
            });
        },
        beforeSend: function(){
            $('.aside-menu-menu-lists').html(renderLoadList())
        },
        error: function(data){
            alert('Detetamos um erro do sistema(List)')
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

function renderListFromTaskInfo(list){
    var render = `
    <option value="${list.id}">${list.list_name}</option>
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

function openTaskView(task_id){
    $('.todo-view').css('display', 'flex');
    //$('.todo-view').toggle();

    viewTaskInfo(task_id);
}

function viewTaskInfo(task_id){
    $.ajax({
        type: 'GET',
        url: "/get-task/" + task_id,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function (response) {

            $('#task_id').val(response.task[0].id);
            $('#task_name').val(response.task[0].task_name);
            $('#task_description').val(response.task[0].task_description);

            $('#task_list option').prop('selected', false)
            $('#task_list option[value="'+response.task[0].list.id+'"]').prop('selected', true)

            //moment().format('YYYY-MM-DD')
            //$('#task_due_date').val(response.task[0].task_due_date);
            $('#task_due_date_lbl').html(response.task[0].task_due_date == null ? 'Due date' : 'Due date - '+response.task[0].task_due_date);

            $('.todo-view-body-subtasks-content').empty();
            $.each(response.task[0].subtasks, function (indexInArray, valueOfElement) { 
                $('.todo-view-body-subtasks-content').append(renderSubtasks(valueOfElement))
            });

            //$("#task_list option").each(function(index, values){

                // Number($(values).attr('value')) == response.task[0].list.id ? $(this).attr('selected', true) : $(values).attr('selected', false)

                // if(Number($(v).attr('value')) === response.task[0].list.id){
                    
                //     $(this).attr('selected', true);
                // }else{
                //     $(this).attr('selected', false);
                // }
                
            //});
        },
        beforeSend: function(){
            //$('.section-todo-content').html(renderLoadTask())
        },
        error: function(data){
            alert('Detetamos um erro do sistema(Taskinfo)')
            console.log(data)
        }
    });
}

function renderSubtasks(subtask){
    var render = `
        <div class="subtask">
            <input type="checkbox" name="subtask[]" ${subtask.subtask_status == 1 ? `checked` : ``}>
            <span ${subtask.subtask_status == 1 ? `style="text-decoration: line-through;"` : ``}>${subtask.subtask_name}</span>
        </div>
    `
    return render
}

$('#closeTask').click(function (e) { 
    e.preventDefault();
    $('.todo-view').css('display', 'none');
});

