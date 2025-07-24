{{-- Validation errors --}}
@if ($errors->any())
    <div role="alert" class="w-full py-[48px] px-[80px] bg-red-50 p-4">
        <div class="flex items-center gap-2 text-red-blue">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                <path fill-rule="evenodd"
                    d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                    clip-rule="evenodd" />
            </svg>

            <strong class="font-medium"> Something went wrong </strong>
        </div>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="mt-2 text-sm text-red-blue">
                    -> {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Edit Work Form --}}
<form id="post-edit-form" action="{{ route('dashboard.work.update', $work->slug) }}" method="POST"
    enctype="multipart/form-data" class="w-full py-[48px] px-[80px] flex flex-col items-center gap-[16px] ">
    @csrf
    @method('PATCH')
    <div class="w-full max-w-[720px]">
        <label for="title"
            class="w-fit max-w-[720px] block mb-2 text-sm font-medium @error('title') text-red-blue @else text-dark-first @enderror">Title
            :
        </label>
        <input id="title" name="title" placeholder="Type title..."
            class="w-full max-w-[720px] @error('title') bg-red-200 ring-red-300 focus:border-red-400 placeholder:text-red-400 text-red-700 border-red-200 hover:border-red-300 @else placeholder:text-slate-400 text-slate-700 focus:border-slate-400 hover:border-slate-300 border-slate-200 @enderror text-sm border-rounded-md px-3 py-2 transition duration-300 ease focus:outline-none shadow-sm focus:shadow"
            autofocus value="{{ old('title') ?? $work->title }}" />
        @error('title')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="w-full max-w-[720px]">
        <label for="category"
            class="w-fit max-w-[720px] block mb-2 text-sm font-medium @error('category') text-red-blue @else text-dark-first @enderror">Category
            :
        </label>
        <select id="category" name="category" placeholder="Type category..."
            class="w-full max-w-[720px] @error('category') bg-red-200 ring-red-300 focus:border-red-400 placeholder:text-red-400 text-red-700 border-red-200 hover:border-red-300 @else placeholder:text-slate-400 text-slate-700 focus:border-slate-400 hover:border-slate-300 border-slate-200 @enderror text-sm border-rounded-md px-3 py-2 transition duration-300 ease focus:outline-none shadow-sm focus:shadow">
            <option value="">Choose Category</option>
            @foreach (App\Models\Category::get() as $category)
                <option value="{{ $category->id }}" @selected((old('category') ?? $category->id) == $category->id)> {{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="w-full max-w-[720px]">
        <label for="thumbnail"
            class="w-fit max-w-[720px] block mb-2 text-sm font-medium @error('thumbnail') text-red-blue @else text-dark-first @enderror">Thumbnail
            : </label>
        <input type="hidden" name="old_thumbnail" value="{{ $work->thumbnail }}"> {{-- Isi Thumbnail Sebelumnya --}}
        <input type="hidden" name="thumbnail" id="thumbnail-path" value="{{ old('thumbnail', $work->thumbnail) }}">
        <input id="thumbnail" name="thumbnail" type="file" data-slug="{{ $work->slug }}"
            placeholder="Type thumbnail..." class="cursor-pointer" value="" />
        @error('thumbnail')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <div class="">
            <div class="mt-2 flex items-center gap-x-3">
                <img id="thumbnail-preview"
                    src="{{ $work->thumbnail ? asset('storage/' . $work->thumbnail) : asset('img/default-thumbnail.jpg') }}"
                    alt="{{ $work->title }}" class="w-full bg-gray-50 object-cover">
            </div>
        </div>
    </div>

    <div class="w-full max-w-[720px]">
        <label for="excerpt"
            class="w-fit max-w-[720px] block mb-2 text-sm font-medium @error('excerpt') text-red-blue @else text-dark-first @enderror">Excerpt
            :
        </label>
        <input id="excerpt" name="excerpt" placeholder="Type excerpt..."
            class="w-full max-w-[720px] @error('excerpt') bg-red-200 ring-red-300 focus:border-red-400 placeholder:text-red-400 text-red-700 border-red-200 hover:border-red-300 @else placeholder:text-slate-400 text-slate-700 focus:border-slate-400 hover:border-slate-300 border-slate-200 @enderror text-sm border-rounded-md px-3 py-2 transition duration-300 ease focus:outline-none shadow-sm focus:shadow"
            value="{{ old('excerpt') ?? $work->excerpt }}" />
        @error('excerpt')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="w-full max-w-[720px]">
        <label for="link"
            class="w-fit max-w-[720px] block mb-2 text-sm font-medium @error('link') text-red-blue @else text-dark-first @enderror">Link
            :
        </label>
        <input id="link" name="link" placeholder="Type link..."
            class="w-full max-w-[720px] @error('link') bg-red-200 ring-red-300 focus:border-red-400 placeholder:text-red-400 text-red-700 border-red-200 hover:border-red-300 @else placeholder:text-slate-400 text-slate-700 focus:border-slate-400 hover:border-slate-300 border-slate-200 @enderror text-sm border-rounded-md px-3 py-2 transition duration-300 ease focus:outline-none shadow-sm focus:shadow"
            value="{{ old('link') ?? $work->link }}" />
        @error('link')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="w-full max-w-[720px]">
        <label for="" class=" @error('has_page') text-red-blue @else text-dark-first @enderror">Has Detail Page
            Or Not : </label><br>
        <label><input type="radio" name="has_page" value="1" @checked((old('has_page') ?? $work->has_page) == '1')> Yes</label>
        <label><input type="radio" name="has_page" value="0" @checked((old('has_page') ?? $work->has_page) == '0')> No</label>
        @error('has_page')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="w-full max-w-[720px]">
        <label for="description"
            class=" @error('description') text-red-blue @else text-dark-first @enderror w-fit max-w-[720px] block mb-2 text-sm font-medium text-dark-first">Description
            : </label>
        <textarea id="description" name="description" placeholder="Type description..."
            class="hidden w-full max-w-[720px] @error('description') bg-red-200 ring-red-300 focus:border-red-400 placeholder:text-red-400 text-red-700 border-red-200 hover:border-red-300 @else placeholder:text-slate-400 text-slate-700 focus:border-slate-400 hover:border-slate-300 border-slate-200 @enderror text-sm border-rounded-md px-3 py-2 transition duration-300 ease focus:outline-none shadow-sm focus:shadow"> {!! old('description') ?? $work->description !!} </textarea>

        <div id="quillDescriptionEditor" class="bg-white-first text-dark-first">
            {!! old('description') ?? $work->description !!}
        </div>

        @error('description')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="flex gap-[16px]">
        <button type="submit" id="work-submit-button"
            class="flex items-center justify-center cursor-pointer bg-blue-second text-white-first bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none ">
            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
            </svg>
            Edit Project
        </button>
        <a href="{{ route('dashboard') }}" id="createProductModalButton" data-modal-target="createProductModal"
            data-modal-toggle="createProductModal"
            class="flex items-center justify-center cursor-pointer bg-red-blue text-white-first bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none ">
            Cancel
        </a>
    </div>
</form>

@push('scripts')
    <script>
        const input = document.getElementById('thumbnail');
        const previewPhoto = () => {
            const file = input.files;
            if (file) {
                const fileReader = new FileReader();
                const preview = document.getElementById('thumbnail-preview');
                fileReader.onload = function(event) {
                    preview.setAttribute('src', event.target.result);
                }
                fileReader.readAsDataURL(file[0]);
            }
        }
        input.addEventListener("change", previewPhoto);
    </script>

    @vite('resources/js/filepond.js')

    @vite('resources/js/quill.js')
@endpush
