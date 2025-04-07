@if ($items->count())
    <!-- Start Pagination Section -->
    <div class="pagination_sec row mt-5 mb-4">
        <div class="col-xl-12">
            <nav class="pagination-nav pdt-30">
                <ul class="pagination-list ">
                    {{-- Previous Page Link --}}
                    @if ($items->onFirstPage())
                        <li class="pagination-left-arrow disabled"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    @else
                        <li class="pagination-left-arrow">
                            <a href="{{ $items->previousPageUrl() }}"><i
                                    class="fa fa-angle-left"></i></a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($items->getUrlRange(1, $items->lastPage()) as $page => $url)
                        <li class="{{ $page == $items->currentPage() ? 'active' : '' }}">
                            <a href="{{ $url }}"><span>{{ $page }}</span></a>
                        </li>
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($items->hasMorePages())
                        <li class="pagination-right-arrow">
                            <a href="{{ $items->nextPageUrl() }}"><i
                                class="fa fa-angle-right"></i></a>
                        </li>
                    @else
                    <li class="pagination-right-arrow disabled">
                        <a href="#"><i
                                class="fa fa-angle-right"></i></a>
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
