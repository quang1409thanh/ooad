<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SSEController extends Controller
{
    //
    public function index()
    {
        return view('sse'); //for rendering sse blade file
    }


    public function getNewPrice()
    {

    }

    public function stream()
    {
        // Set the appropriate headers for SSE
        $response = new StreamedResponse(function () {
            while (true) {
                // Your server-side logic to get data
                $randomMessages = [
                    'Bid is going up!',
                    'Current bid is steady.',
                    'New bid received!',
                    'Keep an eye on the bids!',
                    'Someone just placed a new bid!',
                ];

                // Chọn một thông điệp ngẫu nhiên từ mảng
                $randomMessage = $randomMessages[array_rand($randomMessages)];

                // Tạo dữ liệu JSON với giá trị ending_bid và thông điệp ngẫu nhiên
                $data = json_encode([
                    'message' => $randomMessage
                ]);

                echo "data: $data\n\n";

                // Flush the output buffer
                ob_flush();
                flush();

                // Delay for 1 second
                sleep(1);
            }
        });

        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->headers->set('Connection', 'keep-alive');

        return $response;
    }

    public function stream1($product_id)
    {
        $response = new StreamedResponse(function () use ($product_id) {
            while (true) {
                $product = Product::find($product_id);
                dd($product);
                // Gửi dữ liệu SSE
                echo "data: " . json_encode(['ending_bid' => $product->ending_bid]) . "\n\n";
                ob_flush();
                flush();

                // Đợi 2 giây trước khi gửi cập nhật tiếp theo
                sleep(2);
            }
        });

        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->headers->set('Connection', 'keep-alive');

        return $response;
    }

}
