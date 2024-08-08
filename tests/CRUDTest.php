<?php

namespace Tests;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\View\Composers\WeatherComposer;
use App\Models\Event;
use App\Models\User;
use App\Models\Venue;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class CRUDTest extends TestCase
{
    use RefreshDatabase;
    public function test_CRUD_non_admin_cannot_create_venue()
    {
        $user = User::factory()->create(['usertype' => 'user']);
        $this->actingAs($user);
        $data = ['name' => 'New Venue'];
        $this->post(route('venues.store'), $data);
        $this->assertDatabaseMissing('venues', $data);
    }
    public function test_CRUD_admin_can_create_venue()
    {
        $admin = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($admin);
        $data = ['name' => 'New Venue'];
        $response = $this->post(route('venues.store'), $data);
        $this->assertDatabaseHas('venues', $data);
        $response->assertRedirect(route('venues.index'));
    }

    public function test_CRUD_read_view_venue()
    {
        $user = User::factory()->create(['usertype' => 'user']);
        $this->actingAs($user);
        $search = Venue::where('name', 'New Venue')->first();
        $search_id = $search->id;
        $response = $this->get(route('venues.show', $search_id));
        $response->assertStatus(200);
    }

    public function test_CRUD_non_admin_cannot_create_event()
    {
        $user = User::factory()->create(['usertype' => 'user']);
        $this->actingAs($user);
        $search = Venue::where('name', 'New Venue')->first();
        $data = [
            'title' => 'New Event',
            'poster'=> UploadedFile::fake()->image('photo.jpg'),
            'event_date' => '2024-12-12',
            'venue_id' => $search->id,
        ];
        $this->post(route('events.store'), $data);
        $this->assertDatabaseMissing('events', $data);
    }
    public function test_CRUD_admin_can_create_event()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($user);
        $search = Venue::where('name', 'New Venue')->first();
        $fakeImage = UploadedFile::fake()->image('photo.jpg', 800, 800);
        $eventDate = new DateTime('2024-12-12');
        $title = 'new test event';
        $data = [
            'title' => $title,
            'poster'=> $fakeImage,
            'event_date' => $eventDate->format('Y-m-d'),
            'venue_id' => $search->id,
        ];
        $testdata = [
            'title' => $title,
            'event_date' => $eventDate->format('Y-m-d'),
            'venue_id' => $search->id,
        ];
        $response = $this->post(route('events.store'), $data);
        $response->assertStatus(302);
        $this->assertDatabaseHas('events', $testdata);
        $response->assertRedirect(route('events.index'));
    }

    public function test_CRUD_read_view_event()
    {
        $user = User::factory()->create(['usertype' => 'user']);
        $this->actingAs($user);
        $search = Event::where('title', 'new test event')->first();
        $search_id = $search->id;
        $response = $this->get(route('events.show', $search_id));
        $response->assertStatus(200);
    }

    public function test_CRUD_non_admin_cannot_update_event(){
        $user = User::factory()->create(['usertype' => 'user']);
        $this->actingAs($user);

        $searchEvent = Event::where('title', 'new test event')->first();
        $search = Venue::where('name', 'New Venue')->first();

        $eventDate = new DateTime('2024-12-12');
        $fakeImage = UploadedFile::fake()->image('updated_photo.jpg', 800, 800);
        $title = 'updated test event';
        $data = [
            'title' => $title,
            'poster'=> $fakeImage,
            'event_date' => $eventDate->format('Y-m-d'),
            'venue_id' => $search->id,
        ];

        $testdata = [
            'title' => $title,
            'event_date' => $eventDate->format('Y-m-d'),
            'venue_id' => $search->id,
        ];
        $this->put(route('events.update', $searchEvent->id), $data);
        $this->assertDatabaseMissing('events', $testdata);
    }

    public function test_CRUD_admin_can_update_event(){
        $user = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($user);

        $searchEvent = Event::where('title', 'new test event')->first();
        $search = Venue::where('name', 'New Venue')->first();

        $eventDate = new DateTime('2024-12-12');
        $fakeImage = UploadedFile::fake()->image('updated_photo.jpg', 800, 800);
        $title = 'updated test event';
        $data = [
            'title' => $title,
            'poster'=> $fakeImage,
            'event_date' => $eventDate->format('Y-m-d'),
            'venue_id' => $search->id,
        ];

        $testdata = [
            'title' => $title,
            'event_date' => $eventDate->format('Y-m-d'),
            'venue_id' => $search->id,
        ];
        $this->put(route('events.update', $searchEvent->id), $data);
        $this->assertDatabaseHas('events', $testdata);
    }
    public function test_CRUD_non_admin_cannot_delete_event()
    {
        $user = User::factory()->create(['usertype' => 'user']);
        $this->actingAs($user);
        $search = Event::where('title', 'updated test event')->first();
        $this->delete(route('events.destroy', $search->id));
        $this->assertDatabaseHas('events', ['id' => $search->id, 'title' => 'updated test event']);
    }

    public function test_CRUD_admin_can_delete_event()
    {
        $user = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($user);
        $search = Event::where('title', 'updated test event')->first();
        $this->delete(route('events.destroy', $search->id));
        $this->assertDatabaseMissing('events', ['id' => $search->id, 'title' => 'updated test event']);
    }

    public function test_CRUD_non_admin_cannot_update_venue(){
        $user = User::factory()->create(['usertype' => 'user']);
        $this->actingAs($user);
        $search = Venue::where('name', 'New Venue')->first();
        $data = [
            'name' => 'Updated New Venue',
        ];
        $this->put(route('venues.update', $search->id), $data);
        $this->assertDatabaseMissing('venues', $data);
    }

    public function test_CRUD_admin_can_update_venue(){
        $user = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($user);
        $search = Venue::where('name', 'New Venue')->first();
        $data = [
            'name' => 'Updated New Venue',
        ];
        $this->put(route('venues.update', $search->id), $data);
        $this->assertDatabaseHas('venues', $data);
    }

    public function test_CRUD_non_admin_cannot_delete_venue()
    {
        $user = User::factory()->create(['usertype' => 'user']);
        $this->actingAs($user);
        $search = Venue::where('name', 'Updated New Venue')->first();
        $this->delete(route('venues.destroy', $search->id));
        $this->assertDatabaseHas('venues', ['id' => $search->id, 'name' => 'Updated New Venue']);
    }

    public function test_CRUD_admin_can_delete_venue()
    {
        $user = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($user);
        $search = Venue::where('name', 'Updated New Venue')->first();
        $this->delete(route('venues.destroy', $search->id));
        $this->assertDatabaseMissing('venues', ['id' => $search->id, 'name' => 'Updated New Venue']);
    }
    /*public function test_CRUD_admin_can_create_event()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);
        $data = ['id' => 999,
            'title' => 'new',
            'poster' => 'testimage.jpg',
            'event_date' => '2025-07-05',
            'venue_id' => 999,];
        $response = $this->post(route('events.store'), $data);
        $this->assertDatabaseHas('venues', $data);
        $response->assertRedirect(route('venues.index'));
    }

    public function test_CRUD_non_admin_cannot_create_event()
    {
        $user = User::factory()->create(['role' => 'user']);
        $this->actingAs($user);
        $data = ['name' => 'New Venue'];
        $response = $this->post(route('venues.store'), $data);
        $this->assertDatabaseMissing('venues', $data);
        $response->assertViewIs('venues.index');
    }
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_CRUD_read_event_show(): void
    {
        $response = $this->get(route('events.show', 999));

        $response->assertStatus(200);
    }
    public function test_CRUD_read_venue_show(): void
    {
        $response = $this->get(route('venues.show', 999));

        $response->assertStatus(200);
    }*/
}
