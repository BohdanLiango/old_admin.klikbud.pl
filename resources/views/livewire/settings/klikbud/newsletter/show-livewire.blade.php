<div>
    {{--<!--begin::Card-->--}}
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{ trans('admin_klikbud/settings/klikbud/newsletter.title')  }} | {{ $count_all_active }}
                    <span class="d-block text-muted pt-2 font-size-sm">{{ trans('admin_klikbud/settings/klikbud/newsletter.subtitle') }}</span></h3>
            </div>
            <div class="card-toolbar">
            </div>
        </div>
        @include('livewire.settings.klikbud.newsletter.delete-modal')
        @if(count($newsletters))
            <div class="card-body">
                <div class="mb-7"></div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/newsletter.email') }}</th>
                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/newsletter.date') }}</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($newsletters as $newsletter)
                        <tr>
                            <th scope="row">{{ $newsletter->id }}</th>
                            <td>{{ $newsletter->email }}</td>
                            <td>{{ date("H:i:s d/m/Y", strtotime($newsletter->created_at)) }}</td>
                            <td>
                                <a href="#" class="btn btn-icon btn-danger"
                                   wire:click="selectItem('delete',{{$newsletter->id}})">
                                    <i class="flaticon2-delete"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="card-body">
                <div class="mb-7"></div>
                <h3>{{ trans('admin_klikbud/settings/klikbud/newsletter.zeroItem') }}</h3>
            </div>
        @endif
    </div>
    {{--<!--end::Card-->--}}
    <script type="text/javascript">
        window.addEventListener('openDeleteModal', event => {
            $("#deleteModal").modal('show')
        })

        window.addEventListener('closeDeleteModal', event => {
            $("#deleteModal").modal('hide')
        })
    </script>
</div>
