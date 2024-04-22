


<li>
    <a class="flex items-center gap-x-3.5 py-2 px-2.5 @if (request()->route()->getName() == $routeSelf) bg-gray-100 text-blue-700 @endif text-sm rounded-lg hover:bg-gray-100 dark:bg-gray-900 dark:text-white"
        href="{{ $route }}">

        {!! $iconSvg !!}

        {{ $title }}
    </a>
</li>