<?php


namespace App\Services\Filters;


use Illuminate\Database\Eloquent\Builder;

class PropertyFilter extends QueryFilter
{
    private array $validationRules = [
        'name' => 'nullable|string',
        'price' => 'nullable|regex:/^\d+,\d+$/',
        'bedrooms' => 'nullable|integer',
        'bathrooms' => 'nullable|integer',
        'storeys' => 'nullable|integer',
        'garages' => 'nullable|integer',
    ];

    public function name(string $keyword): Builder
    {
        return $this->builder->where('name', 'like', '%' . $keyword . '%');
    }


    public function bedrooms(int $id): Builder
    {
        return $this->builder->where('bedrooms', '=', $id);
    }


    public function bathrooms(int $id): Builder
    {
        return $this->builder->where('bathrooms', '=', $id);
    }


    public function storeys(int $id): Builder
    {
        return $this->builder->where('storeys', '=', $id);
    }


    public function garages(int $id): Builder
    {
        return $this->builder->where('garages', '=', $id);
    }


    public function price(string $range): Builder
    {
        return $this->builder->whereBetween('price', explode(',', $range));
    }


    public function getValidationRules(): array
    {
        return $this->validationRules;
    }
}
