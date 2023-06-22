@extends('layouts.main')
@include('layouts.aside_menu')

@section('title', 'Taskflow')
@section('content')
    <main class="main-container">
        <section class="section-todo">
            <div class="section-todo-header">
                <h1>Today</h1>
                <div class="aside-menu-header-form">
                    <form action="">
                        <i class="fas fa-plus"></i>
                        <input type="text" name="" id="" placeholder="Add New Task">
                    </form>
                </div>
            </div>
            <div class="section-todo-body">

                <div class="section-todo-content">
                    {{-- <div class="todo">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Research content idea</span></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="todo" onclick="openTodo()">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Create a database of guest authors</span>
                            </div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="todo-body">
                            <div class="todo-due-date todo-body-child">
                                <i class="fas fa-calendar-alt"></i>
                                <span>22-03-11</span>
                            </div>
                            <div class="todo-subtask todo-body-child">
                                <p>2</p>
                                <span>Subtask</span>
                            </div>
                            <div class="todo-list todo-body-child">
                                <div class="todo-list-color"></div>
                                <span>Personal</span>
                            </div>
                        </div>
                    </div>
                    <div class="todo">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Todo name</span></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="todo">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Print business card</span></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="todo-body">
                            <div class="todo-subtask todo-body-child">
                                <p>2</p>
                                <span>Subtask</span>
                            </div>
                            <div class="todo-list todo-body-child">
                                <div class="todo-list-color"></div>
                                <span>Personal</span>
                            </div>
                        </div>
                    </div>
                    <div class="todo">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Create a website single page</span></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="todo-body">
                            <div class="todo-list todo-body-child">
                                <div class="todo-list-color"></div>
                                <span>Personal</span>
                            </div>
                        </div>
                    </div>
                    <div class="todo">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Research content idea</span></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="todo" onclick="openTodo()">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Create a database of guest authors</span>
                            </div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="todo-body">
                            <div class="todo-due-date todo-body-child">
                                <i class="fas fa-calendar-alt"></i>
                                <span>22-03-11</span>
                            </div>
                            <div class="todo-subtask todo-body-child">
                                <p>2</p>
                                <span>Subtask</span>
                            </div>
                            <div class="todo-list todo-body-child">
                                <div class="todo-list-color"></div>
                                <span>Personal</span>
                            </div>
                        </div>
                    </div>
                    <div class="todo">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Todo name</span></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="todo">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Print business card</span></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="todo-body">
                            <div class="todo-subtask todo-body-child">
                                <p>2</p>
                                <span>Subtask</span>
                            </div>
                            <div class="todo-list todo-body-child">
                                <div class="todo-list-color"></div>
                                <span>Personal</span>
                            </div>
                        </div>
                    </div>
                    <div class="todo">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Create a website single page</span></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="todo-body">
                            <div class="todo-list todo-body-child">
                                <div class="todo-list-color"></div>
                                <span>Personal</span>
                            </div>
                        </div>
                    </div>
                    <div class="todo">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Research content idea</span></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="todo" onclick="openTodo()">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Create a database of guest authors</span>
                            </div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="todo-body">
                            <div class="todo-due-date todo-body-child">
                                <i class="fas fa-calendar-alt"></i>
                                <span>22-03-11</span>
                            </div>
                            <div class="todo-subtask todo-body-child">
                                <p>2</p>
                                <span>Subtask</span>
                            </div>
                            <div class="todo-list todo-body-child">
                                <div class="todo-list-color"></div>
                                <span>Personal</span>
                            </div>
                        </div>
                    </div>
                    <div class="todo">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Todo name</span></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="todo">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Print business card</span></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="todo-body">
                            <div class="todo-subtask todo-body-child">
                                <p>2</p>
                                <span>Subtask</span>
                            </div>
                            <div class="todo-list todo-body-child">
                                <div class="todo-list-color"></div>
                                <span>Personal</span>
                            </div>
                        </div>
                    </div>
                    <div class="todo">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Create a website single page</span></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="todo-body">
                            <div class="todo-list todo-body-child">
                                <div class="todo-list-color"></div>
                                <span>Personal</span>
                            </div>
                        </div>
                    </div>
                    <div class="todo">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Research content idea</span></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="todo" onclick="openTodo()">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Create a database of guest authors</span>
                            </div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="todo-body">
                            <div class="todo-due-date todo-body-child">
                                <i class="fas fa-calendar-alt"></i>
                                <span>22-03-11</span>
                            </div>
                            <div class="todo-subtask todo-body-child">
                                <p>2</p>
                                <span>Subtask</span>
                            </div>
                            <div class="todo-list todo-body-child">
                                <div class="todo-list-color"></div>
                                <span>Personal</span>
                            </div>
                        </div>
                    </div>
                    <div class="todo">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Todo name</span></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="todo">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Print business card</span></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="todo-body">
                            <div class="todo-subtask todo-body-child">
                                <p>2</p>
                                <span>Subtask</span>
                            </div>
                            <div class="todo-list todo-body-child">
                                <div class="todo-list-color"></div>
                                <span>Personal</span>
                            </div>
                        </div>
                    </div>
                    <div class="todo">
                        <div class="todo-header">
                            <div class=""><input type="checkbox"> <span>Create a website single page</span></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="todo-body">
                            <div class="todo-list todo-body-child">
                                <div class="todo-list-color"></div>
                                <span>Personal</span>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <aside class="todo-view">
            <form action="" id="task-form">
                <div class="aside-menu-header">
                    <div class="aside-menu-header-label">
                        <h2>Task</h2>
                        <button class="click" id="closeTask"><i class="fas fa-times"></i></button>
                    </div>
                </div>

                <div class="todo-view-body">

                    <div class="input-control">
                        <input type="text" name="" id="" placeholder="Task">
                    </div>
                    <div class="input-control">
                        <textarea name="" id="" cols="30" rows="6" placeholder="Description"></textarea>
                    </div>
                    <div class="input-control input-control-columns">
                        <label for="">List</label>
                        <select name="" id="">
                            <option value="">Personal</option>
                            <option value="">Work</option>
                            <option value="">List1</option>
                        </select>
                    </div>
                    <div class="input-control input-control-columns">
                        <label for="">Due date</label>
                        <input type="date" name="" id="">
                    </div>

                    <div class="input-control input-control-columns">
                        <label for="">Subtasks:</label>
                        <div class="input-control-icon">
                            <i class="fas fa-plus"></i>
                            <input type="text" name="" id="" placeholder="Add New Subtask">
                        </div>
                    </div>

                    <div class="todo-view-body-subtasks-content">
                        <div class="subtask">
                            <input type="checkbox">
                            <span>Subtask name</span>
                        </div>
                        <div class="subtask">
                            <input type="checkbox">
                            <span>Subtask name</span>
                        </div>
                        <div class="subtask">
                            <input type="checkbox">
                            <span>Subtask name</span>
                        </div>
                    </div>
                </div>
            </form>

            <div class="task-form-option">
                <button class="click">Delete task</button>
                <button class="click">Save changes</button>
            </div>
        </aside>
    </main>
@endsection
