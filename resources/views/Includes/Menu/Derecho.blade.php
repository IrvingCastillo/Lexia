<aside id="side-overlay" class="font-size-sm">
        <div class="content-header border-bottom">
            <a class="img-link mr-1" href="javascript:void(0)">
                <img class="img-avatar img-avatar32" src="{{ asset('images/usuario.png') }}" alt="">
            </a>
            <div class="ml-2">
                <a class="link-fx text-dark font-w600" href="javascript:void(0)"><span>@</span>Irving</a>
            </div>
            <a class="ml-auto btn btn-sm btn-dual" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                <i class="fa fa-fw fa-times text-danger"></i>
            </a>
        </div>

        <div class="content-side">
            <div class="block block-transparent pull-x pull-t">
                <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#so-overview">
                            <i class="fa fa-list fa-2x text-gray mr-1"></i>
                        </a>
                    </li>
                </ul>
                <div class="block-content tab-content overflow-hidden">
                    <div class="tab-pane pull-x fade fade-left show active" id="so-overview" role="tabpanel">
                        <div class="block">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Actividad Reciente</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                        <i class="si si-refresh"></i>
                                    </button>
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                </div>
                            </div>
                            <div class="block-content">
                                <ul class="nav-items mb-0">
                                    {{-- @foreach($data['Actividad'] as $act)
                                    <?php $Type = explode('\\', $act->Registro_type); ?>
                                    <li>
                                        <a class="text-dark media py-2" href="javascript:void(0)">
                                            <div class="mr-3 ml-2">
                                                <i class="fa fa-history fa-2x text-info"></i>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-w600 ActividadTipo">{{ $act->Tipo }}</div>
                                                <div class="text-info ActividadRuta">
                                                    {{ $act->Modulo }}
                                                </div>
                                                <small class="text-muted">{{ $act->created_at }}</small>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach --}}
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="block">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Online Friends</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                        <i class="si si-refresh"></i>
                                    </button>
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                </div>
                            </div>
                            <div class="block-content">
                                <!-- Users Navigation -->
                                <ul class="nav-items mb-0">
                                    <li>
                                        <a class="media py-2" href="javascript:void(0)">
                                            <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar3.jpg" alt="">
                                                <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-w600">Barbara Scott</div>
                                                <div class="font-w400 text-muted">Copywriter</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="media py-2" href="javascript:void(0)">
                                            <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar11.jpg" alt="">
                                                <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-w600">David Fuller</div>
                                                <div class="font-w400 text-muted">Web Developer</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="media py-2" href="javascript:void(0)">
                                            <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar6.jpg" alt="">
                                                <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-w600">Andrea Gardner</div>
                                                <div class="font-w400 text-muted">Web Designer</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="media py-2" href="javascript:void(0)">
                                            <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar4.jpg" alt="">
                                                <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-warning"></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-w600">Susan Day</div>
                                                <div class="font-w400 text-muted">Photographer</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="media py-2" href="javascript:void(0)">
                                            <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar11.jpg" alt="">
                                                <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-warning"></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-w600">Ralph Murray</div>
                                                <div class="font-w400 text-muted">Graphic Designer</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <!-- END Users Navigation -->
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </aside>
