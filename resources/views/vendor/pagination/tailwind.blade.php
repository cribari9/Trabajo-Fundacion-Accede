@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="navbar-center flex items-center justify-between text-center">

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            

            <div>
                <span class="relative z-0 inline-flex rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <a class="u-pagination-v1__item g-rounded-50 g-pa-7-16" aria-hidden="true">
                                
                                <span aria-hidden="true">
                                  <i class="fa fa-angle-left g-mr-5"></i>
                                  Anterior
                                </span>
                            </a>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="u-pagination-v1__item u-pagination-v1-4 g-rounded-50 g-pa-7-16" aria-label="{{ __('pagination.previous') }}">
                            <span aria-hidden="true">
                              <i class="fa fa-angle-left g-mr-5"></i>
                              Anterior
                            </span>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="g-pa-7-14">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <a class="u-pagination-v1__item u-pagination-v1-4--active g-rounded-50 g-pa-7-14 g-color-white">{{ $page }}</a>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="u-pagination-v1__item u-pagination-v1-4 u-pagination-v1-4 g-rounded-50 g-pa-7-14" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="u-pagination-v1__item u-pagination-v1-4 g-rounded-50 g-pa-7-16" aria-label="{{ __('pagination.next') }}">
                            <span aria-hidden="true">
                              Siguiente
                              <i class="fa fa-angle-right g-ml-5"></i>
                            </span>
                         
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <a class="u-pagination-v1__item g-rounded-50 g-pa-7-16" aria-hidden="true">
                                <span aria-hidden="true">
                              Siguiente
                              <i class="fa fa-angle-right g-ml-5"></i>
                            </span>
                            </a>
                        </span>
                    @endif
                </span>
            </div>
     <!--      <div>
                <p class="text-sm text-gray-700 leading-5">
                    {!! __('Mostrando desde') !!}
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('a') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    {!! __('de') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('resultados') !!}
                </p>
            </div> -->
        </div>
    </nav>
@endif
