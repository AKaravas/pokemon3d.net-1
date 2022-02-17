<x-guest-layout>
    <div class="p-4">
        <div class="flex flex-col items-center min-h-screen pt-6 sm:pt-0">
            <div>
                <a href="{{ route('home') }}">
                    <x-logo-small />
                </a>
            </div>

            <div class="w-full p-6 pt-4 mt-6 mb-10 overflow-hidden bg-white rounded-lg shadow-md sm:max-w-3xl dark:bg-gray-800">
                
                <ul class="flex mb-8 text-sm text-gray-500 lg:text-base">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}">Home</a>
                        <svg class="w-auto h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </li>
                    <li class="inline-flex items-center">
                        <a href="{{ route('blog.index') }}">Blog</a>
                        <svg class="w-auto h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </li>
                    <li class="inline-flex items-center">
                        <p class="text-gray-300 truncate">{{ $post->title }}</p>
                    </li>
                </ul>

                <h1 class="text-5xl text-center text-gray-800 dark:text-gray-200 break-word">{{ $post->title }}</h1>

                <p class="my-3 text-sm leading-5 text-center text-gray-700 dark:text-gray-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg> <a href="#" class="hover:underline">{{ $post->user->username }}</a>
                    &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg> {{ $post->published_at ? $post->published_at->diffForHumans() : $post->created_at->diffForHumans() }}
                    &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg> {{ $post->updated_at->diffForHumans() }}
                    &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg> {{ read_time($post->body)}}
                    &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg> {{ App\Helpers\NumberHelper::nearestK(views($post)->count()) }}
                </p>

                <div class="flex items-center justify-center pb-8 mt-4 text-xs leading-5 text-center border-b border-gray-100 dark:border-gray-700">
                    @livewire('blog.like-button', ['post' => $post])
                    @if($post->sticky)
                        <span class="inline-flex items-center justify-center px-2 py-1 mr-1 font-bold leading-none uppercase bg-gray-500 rounded text-gray-50 dark:text-gray-800 dark:bg-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-3 h-3 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd" />
                            </svg>
                            {{ __('Sticky') }}
                        </span>
                    @endif
                    @foreach ($post->tags as $tag)
                        <span class="inline-flex items-center justify-center px-2 py-1 mr-1 font-bold leading-none uppercase bg-gray-500 rounded text-gray-50 dark:text-gray-800 dark:bg-gray-300">{{ $tag->name }}</span>
                    @endforeach
                </div>

                <article class="mt-8 prose dark:prose-invert dark:text-gray-100 prose-a:text-green-600">
                    @markdown($post->body)
                </article>
            </div>
        </div>
    </div>
</x-guest-layout>
