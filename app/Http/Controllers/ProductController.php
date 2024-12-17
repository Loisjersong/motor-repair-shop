<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use SimpleXMLElement;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        if ($request->header('Accept') == 'application/xml') {
            $xml = new SimpleXMLElement('<response/>');

            foreach ($products as $product) {
                $productNode = $xml->addChild('product');
                $productNode->addChild('id', $product->id);
                $productNode->addChild('photo', $product->photo);
                $productNode->addChild('title', $product->title);
                $productNode->addChild('brand', $product->brand);
                $productNode->addChild('category_id', $product->category_id);
                $productNode->addChild('in_stock', $product->in_stock);
                $productNode->addChild('price', $product->price);
                $productNode->addChild('created_at', $product->created_at);
                $productNode->addChild('updated_at', $product->updated_at);
                $productNode->addChild('deleted_at', $product->deleted_at);
            }

            return response($xml->asXML(), 200)->header('Content-Type', 'application/xml');
        }

        // Fallback JSON response
        return response()->json($products);
    }

    public function store(Request $request)
{
    try {
        // Parse the incoming request content
        $data = $this->parseRequest($request);

        // Validate the incoming data
        $validatedData = $this->validateData($data);

        // Create the product
        $product = Product::create($validatedData);

        // Check if the request wants JSON or XML response based on the Accept header
        if ($request->acceptsJson()) {
            return $this->respond($product, 201, $request);
        }

        // If the request accepts XML, return XML response
        if ($request->accepts('application/xml')) {
            $xml = new \SimpleXMLElement('<product/>');

            // Convert the product data to an array and then add it to the XML
            $productData = $product->toArray();
            foreach ($productData as $key => $value) {
                $xml->addChild($key, $value);
            }

            return response($xml->asXML(), 201)->header('Content-Type', 'application/xml');
        }

        // Default to JSON if no specific content type is accepted
        return $this->respond($product, 201, $request);

    } catch (\Exception $e) {
        // Error response handling based on the Accept header
        if ($request->acceptsJson()) {
            return $this->respondError('Failed to create product', $e->getMessage(), 500, $request);
        }

        // Return XML error response
        if ($request->accepts('application/xml')) {
            $errorXml = new \SimpleXMLElement('<error/>');
            $errorXml->addChild('message', 'Failed to create product');
            $errorXml->addChild('details', $e->getMessage());

            return response($errorXml->asXML(), 500)->header('Content-Type', 'application/xml');
        }

        // Default to JSON error response if no specific content type is accepted
        return $this->respondError('Failed to create product', $e->getMessage(), 500, $request);
    }
}




    public function show(Request $request, Product $product)
    {
        try {
            // Check if the request accepts JSON
            if ($request->acceptsJson()) {
                return $this->respond($product, 200, $request);
            }

            // If the request accepts XML, return XML response
            if ($request->accepts('application/xml')) {
                $xml = new \SimpleXMLElement('<product/>');

                // Convert the product data to an array and add it to the XML
                $productData = $product->toArray();
                foreach ($productData as $key => $value) {
                    $xml->addChild($key, $value);
                }

                return response($xml->asXML(), 200)->header('Content-Type', 'application/xml');
            }

            // Default to JSON response if no specific content type is accepted
            return $this->respond($product, 200, $request);

        } catch (\Exception $e) {
            // Error handling for both JSON and XML formats
            if ($request->acceptsJson()) {
                return $this->respondError('Failed to retrieve product', $e->getMessage(), 500, $request);
            }

            // Return XML error response if requested
            if ($request->accepts('application/xml')) {
                $errorXml = new \SimpleXMLElement('<error/>');
                $errorXml->addChild('message', 'Failed to retrieve product');
                $errorXml->addChild('details', $e->getMessage());

                return response($errorXml->asXML(), 500)->header('Content-Type', 'application/xml');
            }

            // Default to JSON error response if no specific content type is accepted
            return $this->respondError('Failed to retrieve product', $e->getMessage(), 500, $request);
        }
    }


    public function update(Request $request, Product $product)
{
    try {
        // Parse the incoming request content
        $data = $this->parseRequest($request);

        // Validate the incoming data
        $validatedData = $this->validateData($data);

        // Update the product
        $product->update($validatedData);

        // Check if the request wants JSON
        if ($request->acceptsJson()) {
            return $this->respond($product, 200, $request);
        }

        // If the request accepts XML, return XML response
        if ($request->accepts('application/xml')) {
            $xml = new \SimpleXMLElement('<product/>');

            // Convert the product data to an array and add it to the XML
            $productData = $product->toArray();
            foreach ($productData as $key => $value) {
                $xml->addChild($key, $value);
            }

            return response($xml->asXML(), 200)->header('Content-Type', 'application/xml');
        }

        // Default to JSON response if no specific content type is accepted
        return $this->respond($product, 200, $request);

    } catch (\Exception $e) {
        // Error handling for both JSON and XML formats
        if ($request->acceptsJson()) {
            return $this->respondError('Failed to update product', $e->getMessage(), 500, $request);
        }

        // Return XML error response if requested
        if ($request->accepts('application/xml')) {
            $errorXml = new \SimpleXMLElement('<error/>');
            $errorXml->addChild('message', 'Failed to update product');
            $errorXml->addChild('details', $e->getMessage());

            return response($errorXml->asXML(), 500)->header('Content-Type', 'application/xml');
        }

        // Default to JSON error response if no specific content type is accepted
        return $this->respondError('Failed to update product', $e->getMessage(), 500, $request);
    }
}


    public function destroy(Request $request, Product $product)
    {
        try {
            $product->delete();

            return $this->respond(null, 204, $request);
        } catch (\Exception $e) {
            return $this->respondError('Failed to delete product', $e->getMessage(), 500, $request);
        }
    }

    /**
     * Parse the request content to handle XML or JSON.
     */
    private function parseRequest(Request $request)
    {
        if ($request->header('Content-Type') === 'application/xml') {
            $xml = simplexml_load_string($request->getContent(), 'SimpleXMLElement', LIBXML_NOCDATA);
            return json_decode(json_encode($xml), true); // Convert to an associative array
        }
        return $request->all();
    }

    /**
     * Validate incoming data.
     */
    private function validateData(array $data)
    {
        return validator($data, [
            'photo' => 'nullable|string',
            'title' => 'required|string',
            'brand' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'in_stock' => 'required|integer',
            'price' => 'required|numeric',
        ])->validate();
    }

    /**
     * Return the appropriate response format (JSON or XML).
     */
    private function respond($data, $status, Request $request)
    {
        if ($request->header('Accept') === 'application/xml') {
            return Response::make($this->toXml($data), $status, ['Content-Type' => 'application/xml']);
        }

        return response()->json($data, $status);
    }

    /**
     * Return an error response in the requested format.
     */
    private function respondError($error, $message, $status, Request $request)
    {
        $data = ['error' => $error, 'message' => $message];

        if ($request->header('Accept') === 'application/xml') {
            return Response::make($this->toXml($data), $status, ['Content-Type' => 'application/xml']);
        }

        return response()->json($data, $status);
    }

    /**
     * Convert array data to XML string.
     */
    private function toXml($data, $rootElement = 'response', $xml = null)
    {
        if (is_null($xml)) {
            $xml = new \SimpleXMLElement("<{$rootElement}/>");
        }

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $this->toXml($value, $key, $xml->addChild($key));
            } else {
                $xml->addChild($key, htmlspecialchars($value));
            }
        }

        return $xml->asXML();
    }
}
