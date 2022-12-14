<?php

namespace App\Http\Controllers;

use App\Interfaces\PaymentRepositoryInterface;
use App\Models\Service;
use App\Services\GiftOffers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ServiceController extends Controller
{
    private PaymentRepositoryInterface $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function index(string $search = '', string $sub = '')
    {
        $response = Service::where('category', 'like', '%' . $search . '%')->where('title', 'like', '%' . $sub . '%')->paginate(50);

        return view('services.index', ['services' => $response, 'balance' => $this->paymentRepository->getPaymentBalanceByUserId(Auth::user()->id)]);
    }

    public function search(Request $request)
    {
        $response = Service::where('title', 'like', '%' . $request->_s . '%')->paginate(50);

        return view('services.index', ['services' => $response, 'balance' => $this->paymentRepository->getPaymentBalanceByUserId(Auth::user()->id), 'request' => $request]);
    }

    public function deleteService(string $id)
    {
        try {
            Service::where('id', $id)->delete();
            return redirect()->back()->with('msg', 'Service successfully deleted.');
        } catch (\Throwable $th) {
            return abort('500', 'Error! Something is wrong please contact to developer.');
        }
    }
}
