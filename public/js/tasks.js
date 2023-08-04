// $(window).on('load', function () {
//     getTask()
// });

// function getTask(){
//     $.ajax({
//         type: 'GET',
//         url: "/get-all-task",
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
//         },
//         success: function (response) {

//             $('.load-task').remove();
//             //console.log(response.tasks)

//             $('#all-task').html(response.tasks.length)

//             if(response.tasks.length != 0){
//                 $('.empty-task').css('display', 'none');
//                 $.each(response.tasks, function (indexInArray, valueOfElement) { 
//                     $('.section-todo-content').prepend(renderTask(valueOfElement))
//                 });
//             }else{
//                 $('.empty-task').css('display', 'flex');
//             }
//         },
//         beforeSend: function(){
//             //$('.section-todo-content').html(renderLoadTask())
//         },
//         error: function(data){
//             alert('Detetamos um erro do sistema(Task)')
//             console.log(data)
//         }
//     });
// }

// function renderLoadTask(){
//     var render = `
//             <div class="load-task">
//                 Loading...
//             </div>
//     `
 
//     return render
// }
/** TASK END */

