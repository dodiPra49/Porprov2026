<?php

namespace Tests\Feature;

use App\Models\Contingent;
use App\Models\MedalTally;
use Tests\TestCase;

class MedalAccumulationTest extends TestCase
{
    public function test_medal_entry_accumulates_existing_tallies(): void
    {
        $this->withoutMiddleware();

        $contingent = Contingent::first();
        $this->assertNotNull($contingent);

        $initialTally = MedalTally::where('contingent_id', $contingent->id)->first();
        $startGold = $initialTally ? $initialTally->gold : 0;
        $startSilver = $initialTally ? $initialTally->silver : 0;
        $startBronze = $initialTally ? $initialTally->bronze : 0;

        $response = $this->post(route('admin.medals.store'), [
            'contingent_id' => $contingent->id,
            'gold' => 2,
            'silver' => 1,
            'bronze' => 3,
        ]);

        $response->assertRedirect(route('admin.medals.index'));
        $response->assertSessionHas('success');

        $updatedTally = MedalTally::where('contingent_id', $contingent->id)->first();
        $this->assertEquals($startGold + 2, $updatedTally->gold);
        $this->assertEquals($startSilver + 1, $updatedTally->silver);
        $this->assertEquals($startBronze + 3, $updatedTally->bronze);
        $this->assertEquals($startGold + $startSilver + $startBronze + 6, $updatedTally->total_medals);
    }
}
