<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class TourController extends Controller
{
    /**
     * Display a listing of tours.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Number of records per page
        $perPage = $request->input('perPage', 5);

        // Get the pagination and sorting list of tours
        $tours = Tour::latest()->paginate($perPage);

        return view('tours.index', compact('tours'));
    }

    /**
     * Show the form for creating a new tour.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tours.create');
    }

    /**
     * Store a newly created tour.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'distance' => 'required|numeric',
                'price' => 'required|numeric',
                'max_group_size' => 'required|integer',
                'description' => 'required|string',
                'featured' => 'required|boolean',
            ]);

            if ($request->hasFile('cover_image')) {
                // Lưu hình ảnh mới vào thư mục 'public/images/tour/$tour->title'
                $coverImage = $request->file('cover_image');
                $coverImageName = $coverImage->getClientOriginalName();

                // Lấy title của tour và làm sạch nó để sử dụng làm đường dẫn thư mục
                $tourTitle = $request->input('title');
                $tourTitleSlug = Str::slug($tourTitle, '-');

                // Sử dụng $tourTitleSlug làm phần của đường dẫn thư mục
                $coverImage->storeAs("public/images/tour/$tourTitleSlug", $coverImageName);

                // Thêm trường "cover_image" vào dữ liệu với đường dẫn công cộng
                $data['cover_image'] = "storage/images/tour/$tourTitleSlug/$coverImageName";
            }


            // Tạo mới tour với dữ liệu
            Tour::create($data);

            return redirect()->route('tours.index');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Debug: Check for any exceptions
            return back()->withError('Có lỗi xảy ra khi tạo mới tour.');
        }
    }


    /**
     * Show the form for editing a tour.
     *
     * @param  int  $tourId
     * @return \Illuminate\View\View
     */
    public function edit($tourId)
    {
        $tour = Tour::findOrFail($tourId);
        $categories = Category::all();

        return view('tours.edit', compact('tour', 'categories'));
    }


    /**
     * Update the tour.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Tour $tour)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'distance' => 'required|numeric',
            'price' => 'required|numeric',
            'max_group_size' => 'required|integer',
            'description' => 'required|string',
            'featured' => 'required|boolean',
        ]);

        // Kiểm tra xem có hình ảnh mới được chọn hay không
        if ($request->hasFile('cover_image')) {
            // Lưu hình ảnh mới vào thư mục 'public/images/tour/$tour->title'
            $coverImage = $request->file('cover_image');
            $coverImageName = $coverImage->getClientOriginalName();

            // Lấy title của tour và làm sạch nó để sử dụng làm đường dẫn thư mục
            $tourTitle = $request->input('title');
            $tourTitleSlug = Str::slug($tourTitle, '-');

            // Sử dụng $tourTitleSlug làm phần của đường dẫn thư mục
            $coverImage->storeAs("public/images/tour/$tourTitleSlug", $coverImageName);

            // Thêm trường "cover_image" vào dữ liệu với đường dẫn công cộng
            $data['cover_image'] = "storage/images/tour/$tourTitleSlug/$coverImageName";
        }

        try {
            // Cập nhật tour với dữ liệu mới
            $tour->update($data);
        } catch (\Exception $e) {
            dd($e->getMessage()); // Debug: Check for any exceptions
            return back()->withError('Có lỗi xảy ra khi cập nhật tour.');
        }

        return redirect()->route('tours.index')->withSuccess('Tour đã được cập nhật thành công.');
    }

    /**
     * Remove the tour.
     *
     * @param  int  $tourId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($tourId)
    {
        $tour = Tour::findOrFail($tourId);

        // Lấy đường dẫn của thư mục chứa ảnh của tour
        $coverImagePath = public_path("storage/images/tour/{$tour->title}");

        // Xóa thư mục và tất cả các file bên trong
        Storage::deleteDirectory($coverImagePath);

        // Xóa dữ liệu tour từ cơ sở dữ liệu
        $tour->delete();

        return redirect()->route('tours.index');
    }


    public function show($tourId)
    {
        $tour = Tour::findOrFail($tourId);
        return view('tours.show', compact('tour'));
    }
}
