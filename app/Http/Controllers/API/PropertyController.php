<?php

namespace App\Http\Controllers\API;

use App\Models\Property;
use App\Services\Filters\PropertyFilter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertyController extends BaseController
{
    public function search(Request $request): JsonResponse
    {
        $filterObj = new PropertyFilter($request);
        $validator = Validator::make(
            $request->all(),
            $filterObj->getValidationRules()
        );

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $property = Property::query()->filter($filterObj)->get();

        return $this->sendResponse($property, 'Search result retrieved.');
    }
}
