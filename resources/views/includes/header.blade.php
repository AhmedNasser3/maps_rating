@php
use App\Models\Category;
$categories = Category::all();
@endphp
<form action="{{ route('search') }}" method="post">
    @csrf
    <div class="flex flex-row p-5">
        <div class="w-6/12">
            <input id="address" name="address" type="text" autocomplete="off" class="w-full p-2 bg-gray-200 rounded-md" placeholder="حدد العنوان">
            <div id="address-list"></div>
        </div>
        <div class="w-6/12">
            <select class="w-full p-1 mr-5 bg-gray-200 rounded-md" name="category">
                <option value="">حدد التصنيف </option>
                @include('includes\category_list')
            </select>
        </div>
        <div class="mr-5">
            <button type="submit" class="px-5 py-2 mr-5 text-white bg-gray-500 rounded-md hover:bg-gray-400">بحث</button>
        </div>
    </div>
    </form>
    <section class="m-auto text-center">
        <div class="mt-5 category">
            <ul>
            @foreach($categories as $category)
            <li>
                <a href="{{ route('category.show', $category->slug) }}" class="bg-blue-900 hover:bg-gray-400"> {{ $category->title }}</a>
            </li>
            @endforeach
            </ul>
        </div>
    </section>
