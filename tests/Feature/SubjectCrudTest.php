<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubjectCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_a_new_subject()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->createOne();
        
        $this->actingAs($user)
            ->post('/subjects', [ 'description' => 'Matemática',])
            ->assertRedirectToRoute('subjects.show',['subject'=>1]);

        $this->assertDatabaseHas('subjects', ['description' => 'Matemática']);
    }

   
    public function test_it_requires_description_to_be_present()
    {
        $response = $this->post('/subjects', ['description' => '',]);

        $s  = app('session.store');
        echo '============='.PHP_EOL;
        var_dump($s->get('errors'));
        echo '============='.PHP_EOL;
        $response->assertSessionHasErrors('description');
    }

 
    public function it_requires_description_to_have_a_maximum_of_20_characters()
    {
        $response = $this->post('/subjects', [
            'description' => str_repeat('a', 21),
        ]);

        $response->assertSessionHasErrors('description');
    }

   
    public function it_updates_an_existing_subject()
    {
        $subject = Subject::factory()->create([
            'description' => 'Física',
        ]);

        $response = $this->put("/subjects/{$subject->id}", [
            'description' => 'Química',
        ]);

        $response->assertRedirect('/subjects');
        $this->assertDatabaseHas('subjects', ['description' => 'Química']);
        $this->assertDatabaseMissing('subjects', ['description' => 'Física']);
    }

    public function it_deletes_a_subject()
    {
        $subject = Subject::factory()->create([
            'description' => 'Biologia',
        ]);

        $response = $this->delete("/subjects/{$subject->id}");

        $response->assertRedirect('/subjects');
        $this->assertDatabaseMissing('subjects', ['id' => $subject->id]);
    }
}
