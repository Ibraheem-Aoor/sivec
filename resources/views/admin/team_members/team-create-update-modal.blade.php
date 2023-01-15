<div class="modal fade" id="team-create-update-modal.blade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>{{ __('custom.Project Name') }} : <span id="modal-project-name"></span></h6>

                        </div>
                        <div class="col-sm-6">
                            <h6>{{ __('custom.project_budget') }}: <span id="modal-project-budget">
                                </span></h6>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>{{ __('custom.Budget') }} : <span id="modal-phase-budget"></span></h6>

                        </div>
                        <div class="col-sm-6">
                            <h6>{{ __('custom.Budget Rate') }} : <span id="modal-phase-budget-rate"></span>%</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>{{ __('custom.payment_status') }} : <span id="modal-phase-payment-status"></span></h6>

                        </div>
                        <div class="col-sm-6">
                            <h6>{{ __('custom.progress_status') }} : <span id="modal-phase-progress-status"></span>
                            </h6>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-stripped table-responsive">
                                <tr>
                                    <th>
                                        {{ __('custom.Title') }}
                                    </th>
                                    <th>
                                        {{ __('custom.Budget') }}
                                    </th>
                                    <th>
                                        {{ __('custom.Budget Rate') }}
                                    </th>
                                    <th>
                                        {{ __('custom.payment_status') }}
                                    </th>
                                    <th>
                                        {{ __('custom.progress_status') }}
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{__('custom.close')}}</button>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
