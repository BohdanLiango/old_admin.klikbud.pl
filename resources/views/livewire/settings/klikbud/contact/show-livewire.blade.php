<div>
    @include('livewire.settings.klikbud.contact.delete-modal')
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-chat-1 text-primary"></i>
                </span>
                <h3 class="card-label">{{ $contact->user_name }} | {{ trans('admin_klikbud/settings/klikbud/contact.show.date') }}: {{ date("H:i:s d/m/Y", strtotime($contact->created_at)) }}</h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('settings.klikbud.contact.index') }}" class="btn btn-sm btn-light-primary font-weight-bold">
                    <i class="flaticon2-left-arrow"></i>{{ trans('admin_klikbud/settings/klikbud/contact.show.back') }}</a>
            </div>
        </div>
        <div class="card-body">
            <div data-scroll="true" data-height="200">
                <p>{{ $contact->message }}</p>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="#" class="btn btn-light-danger font-weight-bold" wire:click="selectItem('delete')"><i class="flaticon2-delete"></i>{{ trans('admin_klikbud/settings/klikbud/contact.show.delete') }}</a>
            <a href="#" class="btn btn-outline-secondary font-weight-bold">{{trans('admin_klikbud/settings/klikbud/contact.show.read')}}:  {{ $contact->user_details->name }} {{ $contact->user_details->surname }}</a>
        </div>
    </div>
    <script type="text/javascript">

        window.addEventListener('openDeleteModal', event => {
            $("#deleteModal").modal('show')
        })

        window.addEventListener('closeDeleteModal', event => {
            $("#deleteModal").modal('hide')
        })
    </script>
</div>
