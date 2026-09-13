@extends('layouts.app')

@section('title', 'ASISTENTE VIRTUAL')

@section('content')
<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-white py-3">
            <h3 class="m-0 text-primary">
                <i class="bi bi-robot me-2"></i>Asistente Virtual (ISTABot)
            </h3>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre del asistente</label>
                        <input type="text" name="bot_name" form="chat-settings-form" class="form-control" maxlength="50"
                               value="{{ old('bot_name', $settings->bot_name) }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Texto al pasar el mouse sobre el ícono</label>
                        <input type="text" name="tooltip_text" form="chat-settings-form" class="form-control" maxlength="120"
                               value="{{ old('tooltip_text', $settings->tooltip_text) }}"
                               placeholder="¿Tienes una pregunta? ¡Chatea con nosotros!">
                        <small class="text-muted">Se muestra al pasar el mouse sobre el ícono del chat en el sitio.</small>
                    </div>

                    <div class="text-center">
                        <p class="fw-bold mb-2">Ícono del botón de chat</p>
                        <form action="{{ route('admin.chat.icon') }}" method="POST" enctype="multipart/form-data" id="chat-icon-form">
                            @csrf
                            <div id="chat-icon-dropzone" class="chat-icon-dropzone" title="Haz clic o arrastra una imagen para cambiar el ícono">
                                <img id="chat-icon-preview"
                                     src="{{ $settings->icon_path ? asset($settings->icon_path) : asset('assets/img/chatbot-icon.png') }}"
                                     alt="Ícono actual">
                                <div class="chat-icon-overlay">
                                    <i class="bi bi-camera-fill"></i>
                                </div>
                                <input type="file" id="chat-icon-input" name="icon" accept=".png,.jpg,.jpeg,.webp,.svg" hidden required>
                            </div>
                            <small class="text-muted d-block mt-2">PNG, JPG, WEBP o SVG. Máx 2MB.<br>Arrastra una imagen aquí o haz clic para cambiarla.</small>
                        </form>
                    </div>
                </div>

                <div class="col-md-8 d-flex">
                    <form action="{{ route('admin.chat.settings') }}" method="POST" id="chat-settings-form" class="d-flex flex-column w-100">
                        @csrf
                        <div class="mb-3 flex-grow-1 d-flex flex-column">
                            <label class="form-label fw-bold">Instrucciones (system prompt)</label>
                            <textarea name="system_prompt" class="form-control flex-grow-1" style="min-height: 220px;" maxlength="4000">{{ old('system_prompt', $settings->system_prompt) }}</textarea>
                            <small class="text-muted">Define el tono y el rol del asistente. Se envía en cada conversación.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Memoria de la conversación</label>
                            <select name="history_message_limit" class="form-select" style="max-width: 260px;">
                                @foreach([4 => 'Corta (4 mensajes)', 6 => 'Normal (6 mensajes)', 10 => 'Media (10 mensajes)', 20 => 'Larga (20 mensajes)'] as $value => $label)
                                    <option value="{{ $value }}" {{ (int) $settings->history_message_limit === $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Cuántos mensajes recientes recuerda el asistente en cada turno. Más memoria = más contexto, pero también más costo por mensaje.</small>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" id="is_enabled" name="is_enabled" value="1"
                                       {{ $settings->is_enabled ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_enabled">Chat visible en el sitio</label>
                            </div>

                            <button type="submit" id="chat-settings-save-btn" class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i> Guardar cambios
                            </button>
                        </div>
                    </form>
                    <script>
                    document.getElementById('chat-settings-form').addEventListener('submit', () => {
                        const btn = document.getElementById('chat-settings-save-btn');
                        btn.disabled = true;
                        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Guardando...';
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-white py-3">
            <h3 class="m-0 text-primary">
                <i class="bi bi-globe me-2"></i>Actualización automática desde el sitio web
            </h3>
        </div>
        <div class="card-body">
            <p class="text-muted mb-1">
                Agrega páginas específicas del instituto (por ejemplo <code>/admisiones</code>, <code>/carreras</code>,
                <code>/aranceles</code>), no el dominio completo. El sistema <strong>no rastrea el sitio ni sigue enlaces</strong>:
                solo lee el contenido de cada URL exacta que registres aquí. Cada una se procesa por separado y puedes
                actualizarla o eliminarla individualmente.
            </p>
            <p class="text-muted">
                Registra una entrada por cada página con información real que el asistente deba conocer.
            </p>

            <form id="website-add-form" action="{{ route('admin.chat.website.store') }}" method="POST" class="d-none">
                @csrf
            </form>
            <form id="website-freq-form" action="{{ route('admin.chat.settings') }}" method="POST" class="d-none">
                @csrf
                <input type="hidden" name="bot_name" value="{{ $settings->bot_name }}">
                <input type="hidden" name="tooltip_text" value="{{ $settings->tooltip_text }}">
                <input type="hidden" name="system_prompt" value="{{ $settings->system_prompt }}">
                <input type="hidden" name="is_enabled" value="{{ $settings->is_enabled ? 1 : 0 }}">
            </form>

            <div class="mb-4 d-flex gap-2">
                <input type="url" name="url" form="website-add-form" class="form-control chat-website-control flex-grow-1" required maxlength="2048"
                       placeholder="https://www.istae.edu.ec/admisiones">
                <select name="scrape_frequency_hours" form="website-freq-form" class="form-select chat-website-control" style="max-width: 160px;" onchange="this.form.submit()">
                    @foreach([24 => 'Cada día', 168 => 'Cada semana'] as $hours => $label)
                        <option value="{{ $hours }}" {{ (int) $settings->scrape_frequency_hours === $hours ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                <button type="submit" id="website-add-btn" form="website-add-form" class="btn btn-primary text-nowrap chat-website-control">
                    <i class="bi bi-plus-circle me-1"></i> Agregar
                </button>
            </div>

            <script>
            (function () {
                const form = document.getElementById('website-add-form');
                const btn = document.getElementById('website-add-btn');
                form.addEventListener('submit', () => {
                    btn.disabled = true;
                    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Agregando...';
                });
            })();
            </script>

            <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
                <div class="input-group" style="max-width: 300px;">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                    <input type="text" id="website-search" class="form-control" placeholder="Buscar por URL...">
                </div>
                <div class="ms-auto d-flex gap-2">
                    <button type="button" id="website-bulk-refresh-btn" class="btn btn-outline-primary" disabled>
                        <i class="bi bi-arrow-repeat me-1"></i> Actualizar selección (<span id="website-selected-count-refresh">0</span>)
                    </button>
                    <button type="button" id="website-bulk-delete-btn" class="btn btn-outline-danger" disabled>
                        <i class="bi bi-trash me-1"></i> Eliminar selección (<span id="website-selected-count-delete">0</span>)
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle" id="website-table">
                    <thead>
                        <tr>
                            <th style="width:36px;">
                                <input type="checkbox" id="website-select-all" class="form-check-input">
                            </th>
                            <th>Página</th>
                            <th>Estado</th>
                            <th style="min-width:170px;">Frecuencia</th>
                            <th>Última actualización</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($websiteSources as $source)
                        <tr data-url="{{ strtolower($source->url) }}">
                            <td>
                                <input type="checkbox" class="form-check-input website-row-checkbox" value="{{ $source->id }}">
                            </td>
                            <td class="text-break"><i class="bi bi-link-45deg me-1"></i>{{ $source->url }}</td>
                            <td>
                                @php
                                    $sourceStatusLabels = ['ready' => 'Listo', 'pending' => 'Pendiente', 'error' => 'Error'];
                                    $sourceStatusColors = ['ready' => 'bg-success', 'pending' => 'bg-warning', 'error' => 'bg-danger'];
                                @endphp
                                <span class="badge {{ $sourceStatusColors[$source->status] ?? 'bg-secondary' }}"
                                      title="{{ $source->status === 'error' ? $source->error_message : '' }}">
                                    {{ $sourceStatusLabels[$source->status] ?? ucfirst($source->status) }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('admin.chat.website.frequency', $source->id) }}" method="POST">
                                    @csrf
                                    <select name="frequency_hours" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="" {{ is_null($source->frequency_hours) ? 'selected' : '' }}>
                                            Global ({{ (int) $settings->scrape_frequency_hours === 24 ? 'diaria' : 'semanal' }})
                                        </option>
                                        <option value="24" {{ $source->frequency_hours === 24 ? 'selected' : '' }}>Diaria</option>
                                        <option value="168" {{ $source->frequency_hours === 168 ? 'selected' : '' }}>Semanal</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                @if($source->last_scraped_at)
                                    <span class="local-datetime" data-utc="{{ $source->last_scraped_at->toIso8601String() }}">{{ $source->last_scraped_at->format('d/m/Y H:i') }}</span>
                                @else
                                    —
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="knowledge-action-btns">
                                    <button type="submit" form="website-refresh-{{ $source->id }}" class="knowledge-action-btn knowledge-action-view website-refresh-btn" title="Actualizar ahora">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </button>
                                    <button type="submit" form="website-delete-{{ $source->id }}" class="knowledge-action-btn knowledge-action-delete" title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Aún no se ha agregado ninguna página.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <p id="website-no-results" class="text-center text-muted py-4" hidden>
                    No se encontraron páginas con esa URL.
                </p>
            </div>

            @foreach($websiteSources as $source)
            <form id="website-refresh-{{ $source->id }}" action="{{ route('admin.chat.website.refresh', $source->id) }}" method="POST" class="d-none">
                @csrf
            </form>
            <form id="website-delete-{{ $source->id }}" action="{{ route('admin.chat.website.destroy', $source->id) }}" method="POST"
                  data-confirm="¿Eliminar «{{ $source->url }}» de la base de conocimiento? Esta acción no se puede deshacer." class="d-none">
                @csrf
                @method('DELETE')
            </form>
            @endforeach

            <form id="website-bulk-delete-form" action="{{ route('admin.chat.website.bulk-destroy') }}" method="POST"
                  data-confirm="¿Eliminar las páginas seleccionadas de la base de conocimiento? Esta acción no se puede deshacer." class="d-none">
                @csrf
            </form>
            <form id="website-bulk-refresh-form" action="{{ route('admin.chat.website.bulk-refresh') }}" method="POST" class="d-none">
                @csrf
            </form>

            <script>
            (function () {
                const search = document.getElementById('website-search');
                const table = document.getElementById('website-table');
                const tbody = table.querySelector('tbody');
                const rows = Array.from(tbody.querySelectorAll('tr[data-url]'));
                const noResults = document.getElementById('website-no-results');
                const selectAll = document.getElementById('website-select-all');
                const refreshBtn = document.getElementById('website-bulk-refresh-btn');
                const deleteBtn = document.getElementById('website-bulk-delete-btn');
                const refreshCount = document.getElementById('website-selected-count-refresh');
                const deleteCount = document.getElementById('website-selected-count-delete');

                function visibleRows() {
                    return rows.filter((r) => r.style.display !== 'none');
                }

                function checkedIds() {
                    return rows
                        .filter((r) => r.querySelector('.website-row-checkbox')?.checked)
                        .map((r) => r.querySelector('.website-row-checkbox').value);
                }

                function updateBulkButtons() {
                    const count = checkedIds().length;
                    refreshCount.textContent = count;
                    deleteCount.textContent = count;
                    refreshBtn.disabled = count === 0;
                    deleteBtn.disabled = count === 0;
                }

                search.addEventListener('input', () => {
                    const term = search.value.trim().toLowerCase();
                    let visibleCount = 0;
                    rows.forEach((row) => {
                        const match = row.dataset.url.includes(term);
                        row.style.display = match ? '' : 'none';
                        if (match) visibleCount++;
                    });
                    noResults.hidden = !(rows.length > 0 && visibleCount === 0);
                });

                selectAll.addEventListener('change', () => {
                    visibleRows().forEach((row) => {
                        const cb = row.querySelector('.website-row-checkbox');
                        if (cb) cb.checked = selectAll.checked;
                    });
                    updateBulkButtons();
                });

                tbody.addEventListener('change', (e) => {
                    if (e.target.classList.contains('website-row-checkbox')) {
                        updateBulkButtons();
                    }
                });

                function submitBulk(formEl, ids) {
                    formEl.querySelectorAll('input[name="ids[]"]').forEach((el) => el.remove());
                    ids.forEach((id) => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'ids[]';
                        input.value = id;
                        formEl.appendChild(input);
                    });
                    formEl.requestSubmit();
                }

                refreshBtn.addEventListener('click', () => {
                    refreshBtn.disabled = true;
                    refreshBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Actualizando...';
                    submitBulk(document.getElementById('website-bulk-refresh-form'), checkedIds());
                });
                deleteBtn.addEventListener('click', () => submitBulk(document.getElementById('website-bulk-delete-form'), checkedIds()));

                document.querySelectorAll('form[id^="website-refresh-"]').forEach((form) => {
                    form.addEventListener('submit', () => {
                        const btn = document.querySelector('[form="' + form.id + '"]');
                        if (btn) {
                            btn.disabled = true;
                            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
                        }
                    });
                });
            })();
            </script>
        </div>
    </div>

    <style>
        .chat-website-control {
            height: 38px;
            padding-top: .375rem;
            padding-bottom: .375rem;
        }
        .chat-icon-dropzone {
            position: relative;
            width: 110px;
            height: 110px;
            margin: 0 auto;
            border-radius: 50%;
            cursor: pointer;
            border: 2px dashed transparent;
            transition: border-color 0.2s ease;
        }
        .chat-icon-dropzone img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 50%;
        }
        .chat-icon-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: #fff;
            font-size: 1.5rem;
            background-color: rgba(0,0,0,0);
            opacity: 0;
            transition: opacity 0.2s ease, background-color 0.2s ease;
        }
        .chat-icon-dropzone:hover .chat-icon-overlay,
        .chat-icon-dropzone.is-dragover .chat-icon-overlay {
            opacity: 1;
            background-color: rgba(0,0,0,0.45);
        }
        .chat-icon-dropzone.is-dragover {
            border-color: var(--accent-color, #0d6efd);
        }
    </style>

    <script>
    (function () {
        const dropzone = document.getElementById('chat-icon-dropzone');
        const input = document.getElementById('chat-icon-input');
        const form = document.getElementById('chat-icon-form');
        const preview = document.getElementById('chat-icon-preview');

        dropzone.addEventListener('click', () => input.click());

        input.addEventListener('change', () => {
            if (input.files && input.files[0]) {
                preview.src = URL.createObjectURL(input.files[0]);
                form.submit();
            }
        });

        ['dragenter', 'dragover'].forEach((evt) => {
            dropzone.addEventListener(evt, (e) => {
                e.preventDefault();
                e.stopPropagation();
                dropzone.classList.add('is-dragover');
            });
        });

        ['dragleave', 'drop'].forEach((evt) => {
            dropzone.addEventListener(evt, (e) => {
                e.preventDefault();
                e.stopPropagation();
                dropzone.classList.remove('is-dragover');
            });
        });

        dropzone.addEventListener('drop', (e) => {
            const file = e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files[0];
            if (!file) return;

            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            input.files = dataTransfer.files;

            preview.src = URL.createObjectURL(file);
            form.submit();
        });
    })();
    </script>

    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h3 class="m-0 text-primary">
                <i class="bi bi-database me-2"></i>Base de Conocimiento
            </h3>
        </div>
        <div class="card-body">
            <p class="text-muted">
                Sube documentos (PDF, TXT, DOC, DOCX, MD) con información institucional. El asistente los
                consultará automáticamente para responder preguntas de los estudiantes.
            </p>

            <form action="{{ route('admin.chat.knowledge.store') }}" method="POST" enctype="multipart/form-data" class="mb-4" id="knowledge-upload-form">
                @csrf
                <div id="knowledge-dropzone" class="knowledge-dropzone">
                    <input type="file" id="knowledge-file-input" accept=".pdf,.txt,.doc,.docx,.md" multiple hidden>
                    <i class="bi bi-cloud-arrow-up-fill knowledge-dropzone-icon"></i>
                    <p class="mb-1 fw-bold">Arrastra tus archivos aquí</p>
                    <p class="text-muted small mb-0">o haz clic para seleccionarlos desde tu equipo</p>
                    <p class="text-muted small mb-0">PDF, TXT, DOC, DOCX o MD &middot; máx. 15MB por archivo</p>
                </div>

                <ul id="knowledge-file-list" class="list-group my-3"></ul>

                <button type="submit" class="btn btn-primary" id="knowledge-upload-btn" disabled>
                    <i class="bi bi-upload me-1"></i> Subir <span id="knowledge-file-count"></span>
                </button>
            </form>

            <style>
                .knowledge-dropzone {
                    border: 2px dashed #ced4da;
                    border-radius: 10px;
                    padding: 2.5rem 1rem;
                    text-align: center;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    background: #f8f9fa;
                }
                .knowledge-dropzone:hover,
                .knowledge-dropzone.is-dragover {
                    border-color: var(--accent-color, #0d6efd);
                    background: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 92%);
                }
                .knowledge-dropzone-icon {
                    font-size: 2.5rem;
                    color: var(--accent-color, #0d6efd);
                    display: block;
                    margin-bottom: 0.5rem;
                }
                #knowledge-file-list:empty { margin: 0; }
                #knowledge-file-list .list-group-item {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }

                .knowledge-action-btns {
                    display: inline-flex;
                    align-items: center;
                    gap: 6px;
                }
                .knowledge-action-btn {
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    width: 34px;
                    height: 34px;
                    border-radius: 50%;
                    border: none;
                    font-size: 0.95rem;
                    cursor: pointer;
                    transition: transform 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
                }
                .knowledge-action-btn:hover { transform: translateY(-2px); box-shadow: 0 3px 10px rgba(0,0,0,0.15); }
                .knowledge-action-view { background: #e7f1ff; color: #0d6efd; }
                .knowledge-action-view:hover { background: #0d6efd; color: #fff; }
                .knowledge-action-download { background: #e6f7ec; color: #198754; }
                .knowledge-action-download:hover { background: #198754; color: #fff; }
                .knowledge-action-delete { background: #fdecea; color: #dc3545; }
                .knowledge-action-delete:hover { background: #dc3545; color: #fff; }
                .knowledge-action-disabled { background: #f1f3f5; color: #adb5bd; cursor: not-allowed; }
                .knowledge-action-disabled:hover { transform: none; box-shadow: none; }

                .knowledge-remove-btn {
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    width: 34px;
                    height: 34px;
                    border-radius: 50%;
                    border: none;
                    background: #f1f3f5;
                    color: #868e96;
                    font-size: 0.95rem;
                    cursor: pointer;
                    flex-shrink: 0;
                    transition: background-color 0.15s ease, color 0.15s ease;
                }
                .knowledge-remove-btn:hover { background: #e9ecef; color: #495057; }

                .knowledge-sortable {
                    cursor: pointer;
                    user-select: none;
                    transition: background-color 0.15s ease;
                }
                .knowledge-sortable:hover { filter: brightness(0.85); }
                .knowledge-sort-icon {
                    font-size: 0.75rem;
                    color: rgba(255,255,255,0.45);
                    transition: color 0.15s ease;
                }
                .knowledge-sortable-active { background-color: rgba(255,255,255,0.08); }
                .knowledge-sortable-active .knowledge-sort-icon { color: #fff; }
                .knowledge-sortable-active span { border-bottom: 2px solid #fff; padding-bottom: 2px; }
            </style>

            <script>
            (function () {
                const dropzone = document.getElementById('knowledge-dropzone');
                const input = document.getElementById('knowledge-file-input');
                const list = document.getElementById('knowledge-file-list');
                const form = document.getElementById('knowledge-upload-form');
                const uploadBtn = document.getElementById('knowledge-upload-btn');
                const countLabel = document.getElementById('knowledge-file-count');

                let selectedFiles = [];

                function formatSize(bytes) {
                    if (bytes >= 1024 * 1024) return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
                    return Math.round(bytes / 1024) + ' KB';
                }

                function render() {
                    list.innerHTML = '';
                    selectedFiles.forEach((file, index) => {
                        const li = document.createElement('li');
                        li.className = 'list-group-item';
                        li.innerHTML = '<span><i class="bi bi-file-earmark-text me-2"></i>' +
                            file.name.replace(/</g, '&lt;') + ' <span class="text-muted">(' + formatSize(file.size) + ')</span></span>';
                        const removeBtn = document.createElement('button');
                        removeBtn.type = 'button';
                        removeBtn.className = 'knowledge-remove-btn';
                        removeBtn.title = 'Quitar';
                        removeBtn.innerHTML = '<i class="bi bi-x-lg"></i>';
                        removeBtn.addEventListener('click', () => {
                            selectedFiles.splice(index, 1);
                            render();
                        });
                        li.appendChild(removeBtn);
                        list.appendChild(li);
                    });

                    uploadBtn.disabled = selectedFiles.length === 0;
                    countLabel.textContent = selectedFiles.length > 0
                        ? '(' + selectedFiles.length + (selectedFiles.length === 1 ? ' archivo)' : ' archivos)')
                        : '';
                }

                function addFiles(fileList) {
                    Array.from(fileList).forEach((file) => {
                        const exists = selectedFiles.some((f) => f.name === file.name && f.size === file.size);
                        if (!exists) selectedFiles.push(file);
                    });
                    render();
                }

                dropzone.addEventListener('click', () => input.click());

                input.addEventListener('change', () => {
                    addFiles(input.files);
                    input.value = '';
                });

                ['dragenter', 'dragover'].forEach((evt) => {
                    dropzone.addEventListener(evt, (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        dropzone.classList.add('is-dragover');
                    });
                });

                ['dragleave', 'drop'].forEach((evt) => {
                    dropzone.addEventListener(evt, (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        dropzone.classList.remove('is-dragover');
                    });
                });

                dropzone.addEventListener('drop', (e) => {
                    if (e.dataTransfer && e.dataTransfer.files) {
                        addFiles(e.dataTransfer.files);
                    }
                });

                form.addEventListener('submit', () => {
                    const dataTransfer = new DataTransfer();
                    selectedFiles.forEach((file) => dataTransfer.items.add(file));

                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'file';
                    hiddenInput.name = 'knowledge_file[]';
                    hiddenInput.multiple = true;
                    hiddenInput.hidden = true;
                    hiddenInput.files = dataTransfer.files;
                    form.appendChild(hiddenInput);

                    uploadBtn.disabled = true;
                    uploadBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Subiendo...';
                });
            })();
            </script>

            <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
                <div class="input-group" style="max-width: 300px;">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                    <input type="text" id="knowledge-search" class="form-control" placeholder="Buscar por nombre...">
                </div>
                <button type="submit" form="knowledge-bulk-delete-form" id="knowledge-bulk-delete-btn"
                        class="btn btn-outline-danger ms-auto" disabled>
                    <i class="bi bi-trash me-1"></i> Eliminar selección (<span id="knowledge-selected-count">0</span>)
                </button>
            </div>

            <form id="knowledge-bulk-delete-form" action="{{ route('admin.chat.knowledge.bulk-destroy') }}" method="POST"
                  data-confirm="¿Eliminar los archivos seleccionados de la base de conocimiento? Esta acción no se puede deshacer.">
                @csrf
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="knowledge-table">
                        <thead>
                            <tr>
                                <th style="width:36px;">
                                    <input type="checkbox" id="knowledge-select-all" class="form-check-input">
                                </th>
                                <th class="knowledge-sortable" data-sort="name" role="button">
                                    <span>Archivo</span> <i class="bi bi-arrow-down-up knowledge-sort-icon"></i>
                                </th>
                                <th class="knowledge-sortable text-end" data-sort="size" role="button">
                                    <span>Tamaño</span> <i class="bi bi-arrow-down-up knowledge-sort-icon"></i>
                                </th>
                                <th>Estado</th>
                                <th class="knowledge-sortable" data-sort="date" role="button">
                                    <span>Fecha</span> <i class="bi bi-arrow-down-up knowledge-sort-icon"></i>
                                </th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($files as $file)
                            <tr data-name="{{ strtolower($file->original_name) }}"
                                data-size="{{ $file->size_bytes ?? 0 }}"
                                data-date="{{ $file->created_at->timestamp }}">
                                <td>
                                    <input type="checkbox" class="form-check-input knowledge-row-checkbox" name="ids[]" value="{{ $file->id }}">
                                </td>
                                <td><i class="bi bi-file-earmark-text me-1"></i>{{ $file->original_name }}</td>
                                <td class="text-end">{{ $file->size_bytes ? number_format($file->size_bytes / 1024, 0) . ' KB' : '—' }}</td>
                                <td>
                                    @php
                                        $statusLabels = [
                                            'ready' => 'Listo',
                                            'uploading' => 'Subiendo',
                                            'failed' => 'Falló',
                                        ];
                                    @endphp
                                    <span class="badge {{ $file->status === 'ready' ? 'bg-success' : 'bg-warning' }}">
                                        {{ $statusLabels[$file->status] ?? ucfirst($file->status) }}
                                    </span>
                                </td>
                                <td><span class="local-datetime" data-utc="{{ $file->created_at->toIso8601String() }}">{{ $file->created_at->format('d/m/Y H:i') }}</span></td>
                                <td class="text-center">
                                    <div class="knowledge-action-btns">
                                        @if($file->stored_path)
                                            @php $ext = strtolower(pathinfo($file->stored_path, PATHINFO_EXTENSION)); @endphp
                                            @if(in_array($ext, ['pdf', 'txt', 'md']))
                                            <a href="{{ route('chat.knowledge.view', $file->id) }}" target="_blank"
                                               class="knowledge-action-btn knowledge-action-view" title="Ver archivo">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            @endif
                                            <a href="{{ route('chat.knowledge.download', $file->id) }}"
                                               class="knowledge-action-btn knowledge-action-download" title="Descargar archivo">
                                                <i class="bi bi-download"></i>
                                            </a>
                                        @else
                                        <button type="button" class="knowledge-action-btn knowledge-action-disabled" disabled
                                                title="No disponible: subido antes de esta función">
                                            <i class="bi bi-eye-slash"></i>
                                        </button>
                                        @endif
                                        <button type="submit" form="knowledge-delete-{{ $file->id }}" class="knowledge-action-btn knowledge-action-delete" title="Eliminar">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <p id="knowledge-empty-message" class="text-center text-muted py-4" {{ $files->isNotEmpty() ? 'hidden' : '' }}>
                        Aún no se han subido archivos a la base de conocimiento.
                    </p>
                    <p id="knowledge-no-results" class="text-center text-muted py-4" hidden>
                        No se encontraron archivos con ese nombre.
                    </p>
                </div>
            </form>

            @foreach($files as $file)
            <form id="knowledge-delete-{{ $file->id }}" action="{{ route('admin.chat.knowledge.destroy', $file->id) }}" method="POST"
                  data-confirm="¿Eliminar «{{ $file->original_name }}» de la base de conocimiento? Esta acción no se puede deshacer." class="d-none">
                @csrf
                @method('DELETE')
            </form>
            @endforeach

            <div id="confirmDeleteBackdrop" class="knowledge-confirm-backdrop"></div>
            <div id="confirmDeleteModal" class="knowledge-confirm-modal" role="alertdialog" aria-modal="true">
                <div class="knowledge-confirm-box">
                    <div class="knowledge-confirm-icon"><i class="bi bi-exclamation-triangle-fill"></i></div>
                    <p id="confirmDeleteMessage" class="mb-4"></p>
                    <div class="d-flex justify-content-center gap-2">
                        <button type="button" id="confirmDeleteCancel" class="btn btn-outline-secondary">Cancelar</button>
                        <button type="button" id="confirmDeleteAccept" class="btn btn-danger">
                            <i class="bi bi-trash me-1"></i> Eliminar
                        </button>
                    </div>
                </div>
            </div>

            <style>
                .knowledge-confirm-backdrop, .knowledge-confirm-modal { display: none; }
                .knowledge-confirm-backdrop.is-open, .knowledge-confirm-modal.is-open { display: flex; }
                .knowledge-confirm-backdrop {
                    position: fixed; inset: 0;
                    background: rgba(0,0,0,0.5);
                    z-index: 1055;
                }
                .knowledge-confirm-modal {
                    position: fixed; inset: 0;
                    z-index: 1056;
                    align-items: center;
                    justify-content: center;
                    padding: 20px;
                }
                .knowledge-confirm-box {
                    background: #fff;
                    border-radius: 12px;
                    padding: 28px 24px;
                    max-width: 420px;
                    width: 100%;
                    text-align: center;
                    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
                }
                .knowledge-confirm-icon {
                    width: 56px; height: 56px;
                    margin: 0 auto 16px;
                    border-radius: 50%;
                    background: #fdecea;
                    color: #dc3545;
                    font-size: 1.5rem;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
            </style>

            <script>
            (function () {
                const backdrop = document.getElementById('confirmDeleteBackdrop');
                const modal = document.getElementById('confirmDeleteModal');
                const message = document.getElementById('confirmDeleteMessage');
                const cancelBtn = document.getElementById('confirmDeleteCancel');
                const acceptBtn = document.getElementById('confirmDeleteAccept');
                let pendingForm = null;

                function openConfirm(form) {
                    pendingForm = form;
                    message.textContent = form.dataset.confirm;
                    backdrop.classList.add('is-open');
                    modal.classList.add('is-open');
                }

                function closeConfirm() {
                    pendingForm = null;
                    backdrop.classList.remove('is-open');
                    modal.classList.remove('is-open');
                }

                cancelBtn.addEventListener('click', closeConfirm);
                backdrop.addEventListener('click', closeConfirm);
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && modal.classList.contains('is-open')) closeConfirm();
                });

                acceptBtn.addEventListener('click', () => {
                    if (pendingForm) {
                        const form = pendingForm;
                        cancelBtn.disabled = true;
                        acceptBtn.disabled = true;
                        acceptBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Eliminando...';
                        HTMLFormElement.prototype.submit.call(form);
                    }
                });

                document.querySelectorAll('form[data-confirm]').forEach((form) => {
                    form.addEventListener('submit', (e) => {
                        e.preventDefault();
                        openConfirm(form);
                    });
                });
            })();
            </script>

            <script>
            (function () {
                const search = document.getElementById('knowledge-search');
                const table = document.getElementById('knowledge-table');
                const tbody = table.querySelector('tbody');
                const rows = Array.from(tbody.querySelectorAll('tr'));
                const noResults = document.getElementById('knowledge-no-results');
                const selectAll = document.getElementById('knowledge-select-all');
                const bulkBtn = document.getElementById('knowledge-bulk-delete-btn');
                const selectedCount = document.getElementById('knowledge-selected-count');

                function visibleRows() {
                    return rows.filter((r) => r.style.display !== 'none');
                }

                function updateBulkButton() {
                    const checked = rows.filter((r) => r.querySelector('.knowledge-row-checkbox')?.checked);
                    selectedCount.textContent = checked.length;
                    bulkBtn.disabled = checked.length === 0;
                }

                search.addEventListener('input', () => {
                    const term = search.value.trim().toLowerCase();
                    let visibleCount = 0;
                    rows.forEach((row) => {
                        const match = row.dataset.name.includes(term);
                        row.style.display = match ? '' : 'none';
                        if (match) visibleCount++;
                    });
                    noResults.hidden = !(rows.length > 0 && visibleCount === 0);
                });

                selectAll.addEventListener('change', () => {
                    visibleRows().forEach((row) => {
                        const cb = row.querySelector('.knowledge-row-checkbox');
                        if (cb) cb.checked = selectAll.checked;
                    });
                    updateBulkButton();
                });

                tbody.addEventListener('change', (e) => {
                    if (e.target.classList.contains('knowledge-row-checkbox')) {
                        updateBulkButton();
                    }
                });

                const sortableHeaders = table.querySelectorAll('.knowledge-sortable');
                // Rows already arrive from the server sorted newest-first; reflect that as the initial state.
                let sortState = { key: 'date', dir: -1 };

                function updateSortIndicators() {
                    sortableHeaders.forEach((th) => {
                        const icon = th.querySelector('.knowledge-sort-icon');
                        const isActive = th.dataset.sort === sortState.key;
                        th.classList.toggle('knowledge-sortable-active', isActive);
                        icon.className = 'bi knowledge-sort-icon ' + (isActive
                            ? (sortState.dir === 1 ? 'bi-sort-up' : 'bi-sort-down')
                            : 'bi-arrow-down-up');
                    });
                }

                function sortRowsBy(key, dir) {
                    const sorted = rows.slice().sort((a, b) => {
                        let va = a.dataset[key], vb = b.dataset[key];
                        if (key === 'size' || key === 'date') { va = Number(va); vb = Number(vb); }
                        if (va < vb) return -1 * dir;
                        if (va > vb) return 1 * dir;
                        return 0;
                    });
                    sorted.forEach((row) => tbody.appendChild(row));
                }

                sortableHeaders.forEach((th) => {
                    th.addEventListener('click', () => {
                        const key = th.dataset.sort;
                        sortState.dir = (sortState.key === key) ? -sortState.dir : 1;
                        sortState.key = key;
                        sortRowsBy(key, sortState.dir);
                        updateSortIndicators();
                    });
                });

                updateSortIndicators();
            })();
            </script>
        </div>
    </div>

    <script>
    (function () {
        document.querySelectorAll('.local-datetime[data-utc]').forEach((el) => {
            const date = new Date(el.dataset.utc);
            if (isNaN(date.getTime())) return;

            el.textContent = new Intl.DateTimeFormat(undefined, {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                hour12: false,
            }).format(date);
        });
    })();
    </script>
</div>
@endsection
