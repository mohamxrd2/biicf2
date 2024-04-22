<?php

namespace Database\Factories;

use App\Models\Consommation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsommationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'type_prov' => $this->faker->randomElement(['produits', 'services']),
            'cond_cons' => $this->faker->words(4, true), // Limite de 4 mots
            'format_cons' => $this->faker->randomElement(['Format A', 'Format B', 'Format C']),
            'qte' => $this->faker->numberBetween(1, 100),
            'prix_cons' => $this->faker->randomFloat(2, 1, 1000),
            'frqce_conse' => $this->faker->randomElement(['Quotidienne', 'Hebdomadaire', 'Mensuelle']),
            'jourAch_cons' => $this->faker->dayOfWeek,
            'qualif-serv' => $this->faker->randomElement(['Qualif A', 'Qualif B', 'Qualif C']),
            'spetialite' => $this->faker->randomElement(['Specialite A', 'Specialite B', 'Specialite C']),
            'description' => $this->faker->words(4, true), // Limite de 4 mots
            'zoneAct' => $this->faker->words(4, true), // Limite de 4 mots
            'villeCons' => $this->faker->city,
        ];
    }
}
