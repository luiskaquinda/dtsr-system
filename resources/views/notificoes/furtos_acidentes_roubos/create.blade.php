<div class="modal fade" tabindex="-1" id="kt_modal_scrollable_2">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Criar alerta</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form class="">
                    <!--begin::Input group-->
                    <div class="d-flex flex-stack w-lg-50 mb-6 form-control">

                        <!--begin::Switch-->
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" checked="checked"/>
                            <span class="form-check-label fw-semibold text-muted">
                                Anonima
                            </span>
                        </label>
                        <!--end::Switch-->
                    </div>
                    <!--end::Input group-->

                    <div class="mb-6 form-control">
                        <label for="exampleFormControlInput1" class="required form-label">Titulo</label>
                        <input type="email" class="form-control form-control-solid" placeholder="Escreva algo para destacar..."/>
                    </div>

                    <!--begin::Input group-->
                    <div class="fv-row mb-6 form-control">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-semibold mb-2">Tipo de alerta</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select..." name="settings_customer">
                            <option selected disabled>Tipo de alerta</option>
                            <option value="1">Furto</option>
                            <option value="2">Acidente</option>
                            <option value="3">Roubo</option>
                            <option value="3">Outro</option>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-6 form-control">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-semibold mb-2">Descrição</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control form-control-solid" rows="3" placeholder="Digite aqui uma descrição detalhada sobre o que está a acontecer ou aconteceu..." name="descricao"></textarea>
                        <!--end::Input-->
                    </div>

                    <!--end::Input group-->
                    <div class="mb-3 form-control">
                        <label for="formFile" class="form-label">Carregar imagem</label>
                        <input class="form-control form-control-solid" type="file" id="imagem" name="imagem">
                    </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Notificar</button>
            </div>

            </form>
        </div>
    </div>
</div>