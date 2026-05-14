<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Adjustment\ApproveAdjustmentAction;
use App\Actions\Adjustment\CancelAdjustmentAction;

class AdjustmentController extends Controller
{
    public function approve(Request $request)
    {
        $result = (new ApproveAdjustmentAction())->execute($request);

        return response()->json([
            'success' => true,
            'message' => 'Adjustment approved',
            'data' => $result ?? null
        ]);
    }

    public function cancel(Request $request)
    {
        $result = (new CancelAdjustmentAction())->execute($request);

        return response()->json([
            'success' => true,
            'message' => 'Adjustment cancelled'
        ]);
    }
}