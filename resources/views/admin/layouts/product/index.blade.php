@extends('admin.app')
@section('title', 'Products List')
@section('header_title')
    Product List
@endsection

@push('style')
    <style>
        .highlight {
            background: #f7e7d3;
            display: flex;
            justify-content: space-between;
        }
    </style>
@endpush

@section('content')
    <section class="app--content--main">
        <div class="tickets--area users--area">
            <h4 class="common--title">Filter</h4>
            <!-- filter--and--search  -->
            <div class="filter--and--search d-flex justify-content-between align-items-center">
                <form action="{{route('admin.products.index')}}" method="GET">
                    <!-- search  -->
                    <div class="search">
                        <input type="search" name="search" value="{{request('search')}}"
                               placeholder="Search a product by title"/>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19"
                                 fill="none">
                                <ellipse cx="8.80687" cy="8.80592" rx="7.49047" ry="7.45533" stroke="#868A9B"
                                         stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.0156 14.3789L16.9523 17.2942" stroke="#868A9B" stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <button class="btn btn-primary" type="submit">Filter</button>
                </form>
                @can('product create')
                    <div class="">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-success">
                            Add new
                        </a>
                    </div>
                @endcan
            </div>
            <!-- users table  -->
            <div class="users--table--wrapper campaign default--scrollbar">
                <h4 class="common--title">Products List</h4>
                <div class="users--table">
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Ebook</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>@index($products)</td>
                                <td>{{ strlen($product->title) > 30 ? substr($product->title,0,30).'...' : $product->title}}</td>
                                <td>
                                    @if(!empty($product->thumbnail))
                                        <img src="{{ asset($product->thumbnail) }}" style="max-height: 100px;"
                                             alt="Product thumbnail image">
                                    @else
                                        <span>No Image Available</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.products.download',$product->id)}}"
                                       class="btn btn-secondary">Download</a>
                                </td>
                                <td>
                                    @can('product status')
                                        <div class="form-check form-switch">
                                            <input onclick="statusChange({{ $product->id }}, this)"
                                                   class="form-check-input"
                                                   @if($product->status == 'active') checked @endif type="checkbox">
                                        </div>
                                    @endcan
                                </td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 align-items-center justify-content-center">
                                        @can('product edit')
                                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                               style="color: #4b5563">
                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                     height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                          d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                                          clip-rule="evenodd"/>
                                                    <path fill-rule="evenodd"
                                                          d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                            </a>
                                        @endcan
                                        @can('product delete')
                                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="color: #dc2626"
                                                        onclick="return confirm('Are you sure you want to delete?')">
                                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                         width="24"
                                                         height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                              d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No product found!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                {{ $products->links() }}
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        function statusChange(id, element) {
            var url = '{{ route('admin.products.status', ':id') }}';
            $.ajax({
                type: "POST",
                url: url.replace(':id', id),
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function (resp) {
                    flasher.success('Product Status Changed Successfully');
                },
                error: function (error) {
                    flasher.error('Something went wrong.');
                }
            })
        }
    </script>
@endpush
