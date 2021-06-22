@extends('backend.layouts.app')

@section('title','Subscribers')

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item link" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
        <span class="breadcrumb-item active">{{ __('Subscribers') }}</span>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">{{ __('Subscribers') }}</h5>
                </div>
                <div class="card-body">
                    @if(session()->has('msg'))
                        <div class="alert alert-success">{{ session()->get('msg') }}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{ __('#') }}</th>
                            <th scope="col">{{ __('Email') }}</th>
                            <th scope="col">{{ __('Device') }}</th>
                            <th scope="col">{{ __('Browser') }}</th>
                            <th scope="col">{{ __('Join Time') }}</th>
                            <th scope="col">{{ __('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($subscribers as $key=>$subscriber)
                            <tr>
                                <th scope="row">{{ $subscribers->firstItem() + $loop->index }}</th>
                                <td>{{ $subscriber->email ?? __('default@yourmail.com') }}</td>
                                <td>{{ $subscriber->device ?? __('Default') }}</td>
                                <td>{{ $subscriber->browser ?? __('Default') }}</td>
                                <td>{{ $subscriber->created_at->format('d-m-Y') ?? __('Default') }}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm rounded"
                                            onclick="event.preventDefault(); deleteData({{ $subscriber->id }})">{{ __('Remove') }}</button>
                                    <form id="delete-data-{{ $subscriber->id }}"
                                          action="{{ route('admin.subscribers.destroy',$subscriber) }}" class="d-none"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <p class="m-0">{{ __('No Data Found!!') }}</p>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $subscribers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/vendor_components/sweetalert2/sweetalert2.js') }}"></script>
    <script>
        function deleteData(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-data-'+id).submit();
                }
            })
        }
    </script>
@endpush
