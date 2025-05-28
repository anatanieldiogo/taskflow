<?php

namespace Tests\Feature;

use App\Models\Lists;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_should_return_all_tasks(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertViewIs('welcome')
            ->assertViewHas('tasks');
    }

    public function test_it_should_return_a_task(): void
    {
        $task = Task::factory()->create([
            'task_name' => 'Tarefa de Teste',
            'task_list_id' => $this->createList()->id,
        ])->first();

        $response = $this->get('/get-task/' . $task->id);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'task' => [
                    '*' => [
                        'id',
                        'task_name',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }

    public function test_it_should_create_a_task(): void
    {
        $data = [
            'task_name' => 'Nova tarefa',
            'task_list_id' => null,
        ];

        $response = $this->post('/store-task', $data);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'task' => [
                    'id',
                    'task_name',
                    'created_at',
                    'updated_at',
                ],
            ]);

        $this->assertDatabaseHas('tasks', [
            'task_name' => 'Nova tarefa',
        ]);
    }

    public function createList(): Lists
    {
        return Lists::factory()->create([
            'list_name' => 'Lista de Tarefas',
            'list_color' => '#FF5733',
        ])->first();
    }

    public function test_it_should_update_a_task(): void
    {

        $task = Task::factory()->create([
            'task_name' => 'Tarefa original',
            'task_list_id' => $this->createList()->id,
            'task_description' => 'Descrição original',
        ])->first();

        $data = [
            'task_id' => $task->id,
            'task_name' => 'Tarefa atualizada',
            'task_list' => $task->task_list_id,
            'task_description' => 'Descrição atualizada',
            'task_due_date' => '2023-12-31',
        ];

        $response = $this->post('/task-update', $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'task_name' => 'Tarefa atualizada',
            'task_description' => 'Descrição atualizada',
            'task_list_id' => $task->task_list_id,
            'task_due_date' => '2023-12-31',
        ]);
    }

    public function test_it_should_delete_a_task(): void
    {
        $task = Task::factory()->create([
            'task_name' => 'Tarefa original',
            'task_list_id' => $this->createList()->id,
            'task_description' => 'Descrição original',
        ])->first();

        $response = $this->get('/delete-task/' . $task->id);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
            'task_name' => 'Tarefa para deletar',
        ]);
    }
}
