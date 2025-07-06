<div class="modal fade" tabindex="-1" id="kt_modal_scrollable_2">
    <div class="modal-dialog  modal-dialog-centered">
        <form class="modal-content" action="{{ route('notificacao.alertas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="modal-header">
                <h5 class="modal-title">Criar alerta</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">

                <div class="form-check form-switch form-check-custom form-check-solid mb-6">
                    <input class="form-check-input" type="checkbox" value="1" id="anonima" name="anonima"/>
                    <label class="form-check-label" for="anonima">
                        Anonima
                    </label>
                </div>

                <div class="mb-6 form-control" id="nomeContainer" style="display: none; margin-top: 0.5rem;">
                    <label for="nomeInput" class="form-label">Nome:</label>
                    <input
                        id="nomeInput"
                        name="nome_denuciante"
                        type="text"
                        class="form-control form-control-solid"
                        placeholder="Insira seu nome"
                    />
                </div>

                <div class="mb-6 form-control">
                    <label for="exampleFormControlInput1" class="required form-label">Titulo</label>
                    <input type="text" name="titulo" class="form-control form-control-solid" placeholder="Escreva algo para destacar..."/>
                </div>

                <div class="mb-6 form-control">
                    <label for="exampleFormControlInput1" class="required form-label">Data do ocorrido</label>
                    <input type="date" name="data_ocorrido" class="form-control form-control-solid"/>
                </div>

                <!--begin::Input group-->
                <div class="fv-row mb-6 form-control">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Tipo de alerta</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="tipo_alerta" data-placeholder="Select..." name="settings_customer">
                        <option selected disabled>Tipo de alerta</option>
                        <option value="1">Furto</option>
                        <option value="2">Acidente</option>
                        <option value="3">Assalto</option>
                        <option value="4">Roubo</option>
                        <option value="6">Outro</option>
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