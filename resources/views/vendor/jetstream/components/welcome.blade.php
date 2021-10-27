<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="flex justify-center">
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 text-2xl">
        {{ __('Welcome to MaroVision!') }}
    </div>

    <div class="mt-6 text-gray-500">
        {{ 
            __('This is a flexible and growing platform for web apps.') 
        }}
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    
    <a class="p-6 transition ease-in-out duration-300 hover:bg-blue-200 hover:text-blue-700 flex justify-center" href="{{ route('elite') }}">
        <div class="text-3xl">{{ __('WoodElite') }}</div>
    </a>
    
    <!-- here there may be more app starting buttons -->
    <a class="p-6 border-t border-gray-200 md:border-t-0 md:border-l transition ease-in-out duration-300 hover:bg-yellow-200 hover:text-yellow-700 flex justify-center" 
    href="/#">
        <div class="text-3xl">{{ __('free slot') }}</div>
    </a>

    <a class="p-6 border-t border-gray-200 transition ease-in-out duration-300 hover:bg-green-200 hover:text-green-700 flex justify-center" 
    href="/#">
        <div class="text-3xl">{{ __('free slot') }}</div>
    </a>

    <a class="p-6 border-t border-gray-200 md:border-l transition ease-in-out duration-300 hover:bg-red-200 hover:text-red-700 flex justify-center" 
    href="/#">
        <div class="text-3xl">{{ __('free slot') }}</div>
    </a>
</div>