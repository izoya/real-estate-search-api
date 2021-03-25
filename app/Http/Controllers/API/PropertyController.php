<?php

namespace App\Http\Controllers\API;

use App\Models\Property;
use App\Services\Filters\PropertyFilter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertyController extends BaseController
{
    /**
     * Return a filtered list of the properties.
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        $filterObj = new PropertyFilter($request);
        $validator = Validator::make(
            $request->all(),
            $filterObj->getValidationRules()
        );

        if ($validator->fails()) {

            return $this->sendError('Validation Error.', $validator->errors(), 202);
        }

        $property = Property::query()->filter($filterObj)->get();

        return $this->sendResponse($property, 'Search result retrieved.');
    }

    /**
     * Return a list of parameters for search form options.
     * @param Property $property
     * @return JsonResponse
     */
    public function getOptions(Property $property)
    {
        $options = [
            'priceMin'  => (int)$property->min('price'),
            'priceMax'  => (int)$property->max('price'),
            'bedrooms'  => $property->max('bedrooms'),
            'bathrooms' => $property->max('bathrooms'),
            'storeys'   => $property->max('storeys'),
            'garages'   => $property->max('garages'),
        ];

        return $this->sendResponse($options, 'Options retrieved.');
    }
}
