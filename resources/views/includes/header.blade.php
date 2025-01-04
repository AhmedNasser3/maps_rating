@php
use App\Models\Category;
$categories = Category::all();
@endphp
<form action="{{ route('search') }}" method="post">
@csrf
<div class="flex flex-row p-5">
    <div class="w-6/12">
        <input id="address" name="address" type="text" autocomplete="off" class="p-2 w-full bg-gray-200 rounded-md" placeholder="{{ __('Select the address') }}">
        <div id="address-list"></div>
    </div>
    <div class="w-6/12 pl-2 pr-2">
        <select class="p-2 mr-5 bg-gray-200 w-full rounded-md pr-10" name="category">
            <option value="">{{ __('Select the category') }} </option>
            @include('includes\category_list')
        </select>
    </div>
    <div class="mr-5">
        <button type="submit" class="py-2 px-5 bg-gray-500 hover:bg-gray-400 text-white mr-5 rounded-md">{{ __('Search') }}</button>
    </div>
</div>
</form>
<section class="m-auto text-center">
    <div class="category mt-5">
        <ul>
        @foreach($categories as $category)
        <li>
            <a href="{{ route('category.show', $category->slug) }}" class="bg-blue-900 hover:bg-gray-400"> {{ $category->title }}</a>
        </li>
        @endforeach
        </ul>
    </div>
</section>
