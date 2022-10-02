@props(['name' => null])
@props(['type' => 'text'])
@props(['value' => null])
@props(['required' => false])
@props(['error' => false])

@if ($error)
    <div class="relative">
        <input type="{{ $type }}" name="{{ $name }}" value="{{ $value ? $value : '' }}" id="outlined_error"
            aria-describedby="outlined_error_help"
            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
            placeholder=" " {{ $required ? 'required' : '' }}>
        <label for="outlined_error"
            class="absolute text-sm text-red-600 dark:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">{{ $slot }}</label>
    </div>
    <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
        {{ $error }}
    </p>
@else
    <div class="relative">
        <input type="{{ $type }}" name="{{ $name }}" id="floating_outlined"
            value="{{ $value ? $value : '' }}"
            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " {{ $required ? 'required' : '' }}>
        <label for="floating_outlined"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">{{ $slot }}</label>
    </div>
@endif
