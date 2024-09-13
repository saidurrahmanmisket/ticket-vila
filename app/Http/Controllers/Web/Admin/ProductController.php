<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        //permission check
        if (! has_permission('product menu')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $products = Product::when($request->search, function ($query, $value) {
            $query->where('title', 'like', '%'.$value.'%');
        })->paginate(20);

        return view('admin.layouts.product.index', compact('products'));
    }

    public function create()
    {
        //permission check
        if (! has_permission('product create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }

        return view('admin.layouts.product.create');
    }

    // Store method to create a new record
    public function store(Request $request)
    {
        //permission check
        if (! has_permission('product create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        // Validate input data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ebook' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,odt,txt|max:102400',
        ]);

        if ($request->hasFile('ebook')) {
            $validatedData['ebook'] = $request->file('ebook')->storeAs('product/ebook', time().'_'.$request->file('ebook')->getClientOriginalName());
        } else {
            flash()->addError('Ebook not found.');

            return redirect()->back()->withInput();
        }

        // Handle the file upload using the custom helper
        if ($request->hasFile('thumbnail')) {
            $validatedData['thumbnail'] = Helper::fileUpload(
                $request->file('thumbnail'),
                'product/thumbnail',
                getFileName($request->file('thumbnail'))
            );
        } else {
            $validatedData['thumbnail'] = '/uploads/product/thumbnail/default.png';
        }
        $validatedData['user_id'] = \Auth::id();
        // Efficiently create a new record using mass assignment
        Product::create($validatedData);

        // Use flash message
        flash()->addSuccess('Product created successfully!');

        return redirect()->route('admin.products.index');
    }

    // Edit method to load the edit form
    public function edit(Product $product)
    {
        //permission check
        if (! has_permission('product edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }

        return view('admin.layouts.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        //permission check
        if (! has_permission('product edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        // Validate input data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ebook' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,odt,txt|max:102400',
        ]);

        $product = Product::findOrFail($id);

        // Handle the file upload if a new image is provided
        if ($request->hasFile('ebook')) {
            if (\Storage::fileExists($product->ebook)) {
                \Storage::delete($product->ebook);
            }
            $validatedData['ebook'] = $request->file('ebook')->storeAs('product/ebook', time().'_'.$request->file('ebook')->getClientOriginalName());
        } else {
            $validatedData['ebook'] = $product->ebook;
        }

        // Handle the file upload using the custom helper
        if ($request->hasFile('thumbnail')) {
            Helper::deleteFile(public_path($product->thumbnail));
            $validatedData['thumbnail'] = Helper::fileUpload(
                $request->file('thumbnail'),
                'product/thumbnail',
                getFileName($request->file('thumbnail'))
            );
        } else {
            $validatedData['thumbnail'] = $product->thumbnail;
        }
        $validatedData['user_id'] = \Auth::id();

        // Efficiently update the record using mass assignment
        $product->update($validatedData);

        // Use flash message
        flash()->addSuccess('Product updated successfully!');

        return redirect()->route('admin.products.index');
    }

    public function destroy(string $id)
    {

        //permission check
        if (! has_permission('product delete')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $product = Product::findOrFail($id);
        if (empty($product)) {
            flash()->addError('Product fail not found.');

            return redirect()->back();
        }
        Helper::deleteFile(public_path($product->thumbnail));
        if (\Storage::fileExists($product->ebook)) {
            \Storage::delete($product->ebook);
        }
        $product->delete();
        flash()->addSuccess('Product deleted successfully.');

        return redirect()->route('admin.products.index');
    }

    public function status(string $id)
    {
        //permission check
        if (! has_permission('product status')) {
            return response()->json([
                'success' => false,
                'message' => 'Permission denied: You do not have permission access this page',

            ]);
        }
        try {
            $product = Product::findOrFail($id);
            if (empty($product)) {
                abort('404', 'Not found.');
            }
            if ($product->status == Status::ACTIVE) {
                $product->status = Status::INACTIVE;
            } else {
                $product->status = Status::ACTIVE;
            }
            $product->save();

            return response()->json([
                'success' => true,
                'message' => 'Product status has been updated successfully.',
                'data' => $product,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!',
            ]);
        }
    }

    public function downloadEbook(string $id)
    {
        if (! has_permission('product menu')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $product = Product::findOrFail($id);
        if (empty($product)) {
            flash()->addError('Product fail not found.');

            return redirect()->back();
        }
        if (\Storage::fileExists($product->ebook)) {
            return \Storage::download($product->ebook);
        } else {
            flash()->addError('Ebook not found.');

            return redirect()->back();
        }
    }
}
