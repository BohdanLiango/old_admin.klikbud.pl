<div>
    <div class="row">
        <div class="col-xl-3">
            {{--            <!--begin::Stats Widget 25-->--}}
            <div class="card card-custom bg-light-success card-stretch gutter-b">
                {{--                <!--begin::Body-->--}}
                <div class="card-body">
                    <span
                        class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ $count_new }}</span>
                    <span
                        class="font-weight-bold text-muted font-size-sm">{{ trans('admin_klikbud/settings/klikbud/contact.index.widget.new') }}</span>
                </div>
                {{--                <!--end::Body-->--}}
            </div>
            {{--            <!--end::Stats Widget 25-->--}}
        </div>
        <div class="col-xl-3">
            {{--            <!--begin::Stats Widget 26-->--}}
            <div class="card card-custom bg-light-primary card-stretch gutter-b">
                {{--                <!--begin::ody-->--}}
                <div class="card-body">
                    <span
                        class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ $count_all }}</span>
                    <span
                        class="font-weight-bold text-muted font-size-sm">{{ trans('admin_klikbud/settings/klikbud/contact.index.widget.all') }}</span>
                </div>
                {{--                <!--end::Body-->--}}
            </div>
            {{--            <!--end::Stats Widget 26-->--}}
        </div>
        <div class="col-xl-3">
            {{--            <!--begin::Stats Widget 27-->--}}
            <div class="card card-custom bg-light-warning card-stretch gutter-b">
                {{--                <!--begin::Body-->--}}
                <div class="card-body">
                    <span
                        class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ $count_read }}</span>
                    <span
                        class="font-weight-bold text-muted font-size-sm">{{ trans('admin_klikbud/settings/klikbud/contact.index.widget.read') }}</span>
                </div>
                {{--                <!--end::Body-->--}}
            </div>
            {{--            <!--end::Stats Widget 27-->--}}
        </div>
        <div class="col-xl-3">
            {{--            <!--begin::Stats Widget 28-->--}}
            <div class="card card-custom bg-light-danger card-stretch gutter-b">
                {{--                <!--begin::Body-->--}}
                <div class="card-body">
                    <span
                        class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ $count_deleted }}</span>
                    <span
                        class="font-weight-bold text-muted font-size-sm">{{ trans('admin_klikbud/settings/klikbud/contact.index.widget.delete') }}</span>
                </div>
                {{--                <!--end::Body-->--}}
            </div>
            {{--            <!--end::Stat: Widget 28-->--}}
        </div>
    </div>
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{ trans('admin_klikbud/settings/klikbud/contact.index.title') }}
                    <span
                        class="d-block text-muted pt-2 font-size-sm">{{ trans('admin_klikbud/settings/klikbud/contact.index.subtitle') }}</span>
                </h3>
            </div>
        </div>
        @if(count($contacts))
            <div class="card-body">
                <div class="mb-7"></div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/contact.index.name') }}</th>
                        <th scope="col">{{ trans('admin_klikbud/settings/klikbud/contact.index.email') }}</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $contact->id }}</th>
                            <td>
                                @empty($contact->user_name)-@else
                                    @if((int)$contact->status_id === (int)config('klikbud.klikbud.status_contact.new'))
                                        <b> {{ $contact->user_name }}</b>
                                    @else
                                        {{ $contact->user_name }}
                                    @endif
                                @endempty
                            </td>
                            <td>
                                @empty($contact->email)-@else
                                    @if((int)$contact->status_id === (int)config('klikbud.klikbud.status_contact.new'))
                                        <b>{{ $contact->email }}</b>
                                    @else
                                        {{ $contact->email }}
                                    @endif
                                @endempty
                            </td>
                            <td>
                                <a href="{{ route('settings.klikbud.contact.show', $contact->id) }}"
                                   class="btn btn-icon">
                                    @if((int)$contact->status_id === (int)config('klikbud.klikbud.status_contact.new'))
                                        <i class="flaticon2-black-back-closed-envelope-shape"></i>
                                    @else
                                        <i class="flaticon2-email"></i>
                                    @endif
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
                <h3>{{ trans('admin_klikbud/settings/klikbud/contact.index.zeroItems') }}</h3>
            </div>
        @endif
    </div>
    {{ $contacts->links() }}
</div>
