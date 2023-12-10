@if ($items->count())
    <!-- Start Pagination Section -->
    <div class="pagination_sec row mt-5 mb-4">
        <div class="col-12">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($items->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link" aria-hidden="true">{{ __('pagination.previous') }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $items->previousPageUrl() }}"
                                aria-label="Previous">{{ __('pagination.previous') }}</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($items->getUrlRange(1, $items->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $items->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}"><span>{{ $page }}</span></a>
                        </li>
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($items->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $items->nextPageUrl() }}"
                                aria-label="Next">{{ __('pagination.next') }}</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link" aria-hidden="true">{{ __('pagination.next') }}</span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
    <!-- End Pagination Section -->
    <script>
        const pageItems = document.querySelectorAll(".pagination_sec .page-item-numbers");

        pageItems.forEach(item => {
            item.addEventListener("click", () => {
                pageItems.forEach(item => item.classList.remove("active"));
                item.classList.add("active");
            });
        });
    </script>

@endif
