<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Contracts\ServiceRepositoryInterface;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    protected $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }
    
    public function index(Request $request)
    {
        Log::channel('custom_log')->info('This is a custom log message.', ['key' => 'value']);

        $serviceArray = $this->serviceRepository->getAll();
        return view('admin.services.index', compact('serviceArray'));

    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        $this->serviceRepository->create($request->validated());
        return redirect()->route('admin.service.index')->with('success', 'Service created successfully.');
    }

    public function update($id, UpdateServiceRequest $request)
    {
        $this->serviceRepository->update($id, $request->validated());
        return redirect()->route('admin.service.index')->with('success', 'Service updated successfully.');
    }

    public function edit(Request $request, $id)
    {
        $service = $this->serviceRepository->getById($id);

        if (!$service) {
            return redirect()->route('admin.service.index')->with('error', 'Service not found.');
        }

        return view('admin.services.edit', compact('service'));
    }

    public function view(Request $request, $id)
    {
        $service = $this->serviceRepository->getById($id);

        if (!$service) {
            return redirect()->route('admin.service.index')->with('error', 'Service not found.');
        }

        return view('admin.services.view', compact('service'));
    }


    public function destroy(Request $request)
    {
        $itemId = $request->input('id');

        try {
            $isDeleted = $this->serviceRepository->delete($itemId);
            if ($isDeleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'Item deleted successfully!',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Item not found or could not be deleted.',
                ], 404);
            }
        } catch (\Exception $e) {
            \Log::error('Failed to delete item: ', [
                'error' => $e->getMessage(),
                'itemId' => $itemId,
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the item. Please try again.',
            ], 500);
        }
    }
}
