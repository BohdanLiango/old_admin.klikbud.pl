<div class="tab-pane active" id="kt_apps_contacts_view_tab_1" role="tabpanel">
    <div class="container">
        <form class="form">
            <div class="form-group">
                <textarea class="form-control form-control-lg form-control-solid" id="exampleTextarea" rows="3" placeholder="{{ trans('admin_klikbud/clients.one.notes.type_notes') }}"></textarea>
            </div>
            <div class="row">
                <div class="col">
                    <a href="#" class="btn btn-light-primary font-weight-bold">{{ trans('admin_klikbud/clients.one.notes.add_notes') }}</a>
                    <a href="#" class="btn btn-clean font-weight-bold">{{ trans('admin_klikbud/clients.one.notes.cancel') }}</a>
                </div>
            </div>
        </form>
        <div class="separator separator-dashed my-10"></div>
        <div class="timeline timeline-3">
            <div class="timeline-items">
                <div class="timeline-item">
                    <div class="timeline-media">
                        <img alt="Pic" src="assets/media/users/300_25.jpg" />
                    </div>
                    <div class="timeline-content">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="mr-2">
                                <span class="text-muted ml-2">Today</span>
                            </div>
                            <div class="dropdown ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
                                <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                    <ul class="navi navi-hover">
                                        <li class="navi-header font-weight-bold py-4">
                                            <span class="font-size-lg">{{ trans('admin_klikbud/clients.one.notes.option') }}:</span>
                                            <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                                        </li>
                                        <li class="navi-separator mb-3 opacity-70"></li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-text">
                                                    <span class="label label-xl label-inline label-light-danger">{{ trans('admin_klikbud/clients.one.notes.delete') }}</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <p class="p-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
